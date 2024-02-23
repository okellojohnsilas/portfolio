drop database if exists oj49;
create database if not exists oj49;
use oj49;

-- Navigation table
drop table if exists navigation;
create table if not exists navigation(    
    id text,
    item text,
    link text,
    status text default '1',
	deleted text default '0',
    affected text,
    added timestamp not null default current_timestamp(),
    last_updated timestamp not null default current_timestamp() on update current_timestamp()
);

-- Navigation ID generator trigger
drop trigger if exists generate_navigation_id; 
-- Generate navigation id 
delimiter //
create trigger generate_navigation_id before insert on navigation
for each row
begin
   if new.id is null then
        set new.id = lower(left(md5(rand()), 15));
    end if;
end;
// delimiter ;

-- navigation table mirror
drop table if exists mrr_navigation;
create table if not exists mrr_navigation(    
    mirror_id int(30) not null auto_increment primary key,
    item text,
    old_item text,
    link text,
    old_link text,
    affected text,
    `status` text,
	`old_status` text,
	`deleted` text,
	`old_deleted` text,
	`who` text,
	`what` text,
	`when` timestamp not null default current_timestamp()
);

-- Trigger to log insert into `navigation` 
drop trigger if exists TRG_log_navigation_insert; 
delimiter $$
create trigger TRG_log_navigation_insert after insert on `navigation` 
for each row
begin
	insert into mrr_navigation (item,old_item,link,old_link,status,old_status,deleted,old_deleted,who,what) values
	(new.item,null,new.link,null,new.status,null,new.deleted,null,new.affected,'insert');
end$$
delimiter ;

-- Trigger to log after update into `navigation` 
drop trigger if exists TRG_log_navigation_update;
delimiter $$
create trigger `TRG_log_navigation_update` after update on `navigation` 
for each row 
begin
    if new.deleted = 1 then	
		insert into mrr_navigation (item,old_item,link,old_link,status,old_status,deleted,old_deleted,who,what) values
		(new.item,old.item,new.link,old.link,new.status,old.status,new.deleted,old.deleted,new.affected,'delete');
	else		
		insert into mrr_navigation (item,old_item,link,old_link,status,old_status,deleted,old_deleted,who,what) values
		(new.item,old.item,new.link,old.link,new.status,old.status,new.deleted,old.deleted,new.affected,'update');
	 end if;
end$$
delimiter ;

-- Trigger to log after delete into `navigation` 
drop trigger if exists TRG_log_navigation_delete;
delimiter $$
create trigger TRG_log_navigation_delete after delete on `navigation` 
for each row
begin
    insert into mrr_navigation (item,old_item,link,old_link,status,old_status,deleted,old_deleted,who,what) values
	(null,old.item,null,old.link,null,old.status,null,old.deleted,old.affected,'delete');
end$$
delimiter ;