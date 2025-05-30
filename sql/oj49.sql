drop database if exists oj49;
create database if not exists oj49;
use oj49;

-- Navigation table
drop table if exists navigation;
create table if not exists navigation(    
    id text,
    item text,
    link text,
    icon text,
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
    icon text,
    old_icon text,
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
	insert into mrr_navigation (item,old_item,link,old_link,icon,old_icon,status,old_status,deleted,old_deleted,who,what) values
	(new.item,null,new.link,null,new.icon,null,new.status,null,new.deleted,null,new.affected,'insert');
end$$
delimiter ;

-- Trigger to log after update into `navigation` 
drop trigger if exists TRG_log_navigation_update;
delimiter $$
create trigger `TRG_log_navigation_update` after update on `navigation` 
for each row 
begin
    if new.deleted = 1 then	
	    insert into mrr_navigation (item,old_item,link,old_link,icon,old_icon,status,old_status,deleted,old_deleted,who,what) values
		(new.item,old.item,new.link,old.link,new.icon,old.icon,new.status,old.status,new.deleted,old.deleted,new.affected,'delete');
	else		
	    insert into mrr_navigation (item,old_item,link,old_link,icon,old_icon,status,old_status,deleted,old_deleted,who,what) values
		(new.item,old.item,new.link,old.link,new.icon,old.icon,new.status,old.status,new.deleted,old.deleted,new.affected,'update');
	 end if;
end$$
delimiter ;

-- Trigger to log after delete into `navigation` 
drop trigger if exists TRG_log_navigation_delete;
delimiter $$
create trigger TRG_log_navigation_delete after delete on `navigation` 
for each row
begin
    insert into mrr_navigation (item,old_item,link,old_link,icon,old_icon,status,old_status,deleted,old_deleted,who,what) values
	(null,old.item,null,old.link,null,old.icon,null,old.status,null,old.deleted,old.affected,'delete');
end$$
delimiter ;

-- Users table
drop table if exists users;
create table if not exists users(    
    id text,
    name text,
    email text,
    telephone text,
    avatar text,
    address text,
    status text default '1',
	deleted text default '0',
    affected text,
    added timestamp not null default current_timestamp(),
    last_updated timestamp not null default current_timestamp() on update current_timestamp()
);

-- User Data ID generator trigger
drop trigger if exists generate_user_id; 
-- Generate navigation id 
delimiter //
create trigger generate_user_id before insert on users
for each row
begin
   if new.id is null then
        set new.id = lower(left(md5(rand()), 15));
    end if;
end;
// delimiter ;


-- Users table mirror
drop table if exists mrr_users;
create table if not exists mrr_users(
    mirror_id int(30) not null auto_increment primary key,
    name text,
    old_name text,
    email text,
    old_email text,
    telephone text,
    old_telephone text,
    avatar text,
    old_avatar text,
    address text,
    old_address text,
    status text,
    old_status text,
    deleted text,
    old_deleted text,
    who text,
    what text,
    `when` timestamp not null default current_timestamp()
);

-- Trigger to log insert into `users`
drop trigger if exists TRG_log_users_insert;
delimiter $$
create trigger TRG_log_users_insert after insert on `users`
for each row
begin
    insert into mrr_users (
        name, old_name,
        email, old_email,
        telephone, old_telephone,
        avatar, old_avatar,
        address, old_address,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        new.name, null,
        new.email, null,
        new.telephone, null,
        new.avatar, null,
        new.address, null,
        new.status, null,
        new.deleted, null,
        new.affected, 'insert'
    );
end$$
delimiter ;

-- Trigger to log after update into `users`
drop trigger if exists TRG_log_users_update;
delimiter $$
create trigger TRG_log_users_update after update on `users`
for each row
begin
    if new.deleted = 1 then
        insert into mrr_users (
            name, old_name,
            email, old_email,
            telephone, old_telephone,
            avatar, old_avatar,
            address, old_address,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.name, old.name,
            new.email, old.email,
            new.telephone, old.telephone,
            new.avatar, old.avatar,
            new.address, old.address,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'delete'
        );
    else
        insert into mrr_users (
            name, old_name,
            email, old_email,
            telephone, old_telephone,
            avatar, old_avatar,
            address, old_address,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.name, old.name,
            new.email, old.email,
            new.telephone, old.telephone,
            new.avatar, old.avatar,
            new.address, old.address,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'update'
        );
    end if;
end$$
delimiter ;

-- Trigger to log after delete into `users`
drop trigger if exists TRG_log_users_delete;
delimiter $$
create trigger TRG_log_users_delete after delete on `users`
for each row
begin
    insert into mrr_users (
        name, old_name,
        email, old_email,
        telephone, old_telephone,
        avatar, old_avatar,
        address, old_address,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        null, old.name,
        null, old.email,
        null, old.telephone,
        null, old.avatar,
        null, old.address,
        null, old.status,
        null, old.deleted,
        old.affected, 'delete'
    );
end$$
delimiter ; 

-- User auth table
drop table if exists user_auth;
create table if not exists user_auth(    
    id text,
    user text,
    password text,
    status text default '1',
	deleted text default '0',
    affected text,
    added timestamp not null default current_timestamp(),
    last_updated timestamp not null default current_timestamp() on update current_timestamp()
);

-- User Auth ID generator trigger
drop trigger if exists generate_user_auth_id; 
-- Generate User Auth id 
delimiter //
create trigger generate_user_auth_id before insert on user_auth
for each row
begin
   if new.id is null then
        set new.id = lower(left(md5(rand()), 15));
    end if;
end;
// delimiter ;

-- User Auth table mirror
drop table if exists mrr_user_auth;
create table if not exists mrr_user_auth(
    mirror_id int(30) not null auto_increment primary key,
    user text,
    old_user text,
    password text,
    old_password text,
    status text,
    old_status text,
    deleted text,
    old_deleted text,
    who text,
    what text,
    `when` timestamp not null default current_timestamp()
);

-- Trigger to log insert into `user_auth`
drop trigger if exists TRG_log_user_auth_insert;
delimiter $$
create trigger TRG_log_user_auth_insert after insert on `user_auth`
for each row
begin
    insert into mrr_user_auth (
        user, old_user,
        password, old_password,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        new.user, null,
        new.password, null,
        new.status, null,
        new.deleted, null,
        new.affected, 'insert'
    );
end$$
delimiter ;

-- Trigger to log after update into `user_auth`
drop trigger if exists TRG_log_user_auth_update;
delimiter $$
create trigger TRG_log_user_auth_update after update on `user_auth`
for each row
begin
    if new.deleted = 1 then
        insert into mrr_user_auth (
            user, old_user,
            password, old_password,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.user, old.user,
            new.password, old.password,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'delete'
        );
    else
        insert into mrr_user_auth (
            user, old_user,
            password, old_password,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.user, old.user,
            new.password, old.password,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'update'
        );
    end if;
end$$
delimiter ;

-- Trigger to log after delete into `user_auth`
drop trigger if exists TRG_log_user_auth_delete;
delimiter $$
create trigger TRG_log_user_auth_delete after delete on `user_auth`
for each row
begin
    insert into mrr_user_auth (
        user, old_user,
        password, old_password,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        null, old.user,
        null, old.password,
        null, old.status,
        null, old.deleted,
        old.affected, 'delete'
    );
end$$
delimiter ; 

-- Website Data table
drop table if exists website_data;
create table if not exists website_data(    
    id text,
    hero_tag text,
    hero_sub_tag text,
    about text,
    contact_email text,
    twitter text,
    instagram text,
    linkedin text,
    youtube text,
    status text default '1',
	deleted text default '0',
    affected text,
    added timestamp not null default current_timestamp(),
    last_updated timestamp not null default current_timestamp() on update current_timestamp()
);

-- Website Data ID generator trigger
drop trigger if exists generate_website_data_id; 
-- Generate navigation id 
delimiter //
create trigger generate_website_data_id before insert on website_data
for each row
begin
   if new.id is null then
        set new.id = lower(left(md5(rand()), 15));
    end if;
end;
// delimiter ;
-- Website Data mirror table
drop table if exists mrr_website_data;
create table if not exists mrr_website_data(
    mirror_id int(30) not null auto_increment primary key,
    hero_tag text,
    old_hero_tag text,
    hero_sub_tag text,
    old_hero_sub_tag text,
    about text,
    old_about text,
    contact_email text,
    old_contact_email text,
    twitter text,
    old_twitter text,
    instagram text,
    old_instagram text,
    linkedin text,
    old_linkedin text,
    youtube text,
    old_youtube text,
    status text,
    old_status text,
    deleted text,
    old_deleted text,
    who text,
    what text,
    `when` timestamp not null default current_timestamp()
);

-- Trigger to log insert into `website_data`
drop trigger if exists TRG_log_website_data_insert;
delimiter $$
create trigger TRG_log_website_data_insert after insert on `website_data`
for each row
begin
    insert into mrr_website_data (
        hero_tag, old_hero_tag,
        hero_sub_tag, old_hero_sub_tag,
        about, old_about,
        contact_email, old_contact_email,
        twitter, old_twitter,
        instagram, old_instagram,
        linkedin, old_linkedin,
        youtube, old_youtube,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        new.hero_tag, null,
        new.hero_sub_tag, null,
        new.about, null,
        new.contact_email, null,
        new.twitter, null,
        new.instagram, null,
        new.linkedin, null,
        new.youtube, null,
        new.status, null,
        new.deleted, null,
        new.affected, 'insert'
    );
end$$
delimiter ;

-- Trigger to log after update into `website_data`
drop trigger if exists TRG_log_website_data_update;
delimiter $$
create trigger TRG_log_website_data_update after update on `website_data`
for each row
begin
    if new.deleted = 1 then
        insert into mrr_website_data (
            hero_tag, old_hero_tag,
            hero_sub_tag, old_hero_sub_tag,
            about, old_about,
            contact_email, old_contact_email,
            twitter, old_twitter,
            instagram, old_instagram,
            linkedin, old_linkedin,
            youtube, old_youtube,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.hero_tag, old.hero_tag,
            new.hero_sub_tag, old.hero_sub_tag,
            new.about, old.about,
            new.contact_email, old.contact_email,
            new.twitter, old.twitter,
            new.instagram, old.instagram,
            new.linkedin, old.linkedin,
            new.youtube, old.youtube,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'delete'
        );
    else
        insert into mrr_website_data (
            hero_tag, old_hero_tag,
            hero_sub_tag, old_hero_sub_tag,
            about, old_about,
            contact_email, old_contact_email,
            twitter, old_twitter,
            instagram, old_instagram,
            linkedin, old_linkedin,
            youtube, old_youtube,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.hero_tag, old.hero_tag,
            new.hero_sub_tag, old.hero_sub_tag,
            new.about, old.about,
            new.contact_email, old.contact_email,
            new.twitter, old.twitter,
            new.instagram, old.instagram,
            new.linkedin, old.linkedin,
            new.youtube, old.youtube,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'update'
        );
    end if;
end$$
delimiter ;

-- Trigger to log after delete into `website_data`
drop trigger if exists TRG_log_website_data_delete;
delimiter $$
create trigger TRG_log_website_data_delete after delete on `website_data`
for each row
begin
    insert into mrr_website_data (
        hero_tag, old_hero_tag,
        hero_sub_tag, old_hero_sub_tag,
        about, old_about,
        contact_email, old_contact_email,
        twitter, old_twitter,
        instagram, old_instagram,
        linkedin, old_linkedin,
        youtube, old_youtube,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        null, old.hero_tag,
        null, old.hero_sub_tag,
        null, old.about,
        null, old.contact_email,
        null, old.twitter,
        null, old.instagram,
        null, old.linkedin,
        null, old.youtube,
        null, old.status,
        null, old.deleted,
        old.affected, 'delete'
    );
end$$
delimiter ;
-- Project Categories table
drop table if exists project_categories;
create table if not exists project_categories(    
    id text,
    category text,
    category_avatar text,
    status text default '1',
	deleted text default '0',
    affected text,
    added timestamp not null default current_timestamp(),
    last_updated timestamp not null default current_timestamp() on update current_timestamp()
);

-- Project Categories ID generator trigger
drop trigger if exists generate_project_category_id; 
-- Generate navigation id 
delimiter //
create trigger generate_project_category_id before insert on project_categories
for each row
begin
   if new.id is null then
        set new.id = lower(left(md5(rand()), 15));
    end if;
end;
// delimiter ;

-- Project Categories mirror table
drop table if exists mrr_project_categories;
create table if not exists mrr_project_categories(
    mirror_id int(30) not null auto_increment primary key,
    category text,
    old_category text,
    category_avatar text,
    old_category_avatar text,
    status text,
    old_status text,
    deleted text,
    old_deleted text,
    who text,
    what text,
    `when` timestamp not null default current_timestamp()
);

-- Trigger to log insert into `project_categories`
drop trigger if exists TRG_log_project_categories_insert;
delimiter $$
create trigger TRG_log_project_categories_insert after insert on `project_categories`
for each row
begin
    insert into mrr_project_categories (
        category, old_category,
        category_avatar, old_category_avatar,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        new.category, null,
        new.category_avatar, null,
        new.status, null,
        new.deleted, null,
        new.affected, 'insert'
    );
end$$
delimiter ;

-- Trigger to log after update into `project_categories`
drop trigger if exists TRG_log_project_categories_update;
delimiter $$
create trigger TRG_log_project_categories_update after update on `project_categories`
for each row
begin
    if new.deleted = 1 then
        insert into mrr_project_categories (
            category, old_category,
            category_avatar, old_category_avatar,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.category, old.category,
            new.category_avatar, old.category_avatar,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'delete'
        );
    else
        insert into mrr_project_categories (
            category, old_category,
            category_avatar, old_category_avatar,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.category, old.category,
            new.category_avatar, old.category_avatar,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'update'
        );
    end if;
end$$
delimiter ;

-- Trigger to log after delete into `project_categories`
drop trigger if exists TRG_log_project_categories_delete;
delimiter $$
create trigger TRG_log_project_categories_delete after delete on `project_categories`
for each row
begin
    insert into mrr_project_categories (
        category, old_category,
        category_avatar, old_category_avatar,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        null, old.category,
        null, old.category_avatar,
        null, old.status,
        null, old.deleted,
        old.affected, 'delete'
    );
end$$
delimiter ;

-- Projects table
drop table if exists projects;
create table if not exists projects(    
    id text,
    category text,
    project_name text,
    project_description text,
    project_thumbnail text,
    project_images text,
    project_link text,
    status text default '1',
    deleted text default '0',
    affected text,
    added timestamp not null default current_timestamp(),
    last_updated timestamp not null default current_timestamp() on update current_timestamp()
);

-- Portfolio Categories ID generator trigger
drop trigger if exists generate_project_id; 
-- Generate project id 
delimiter //
create trigger generate_project_id before insert on projects
for each row
begin
   if new.id is null then
        set new.id = lower(left(md5(rand()), 15));
    end if;
end;
// delimiter ;


-- Project table mirror
drop table if exists mrr_projects;
create table if not exists mrr_projects(
    mirror_id int(30) not null auto_increment primary key,
    category text,
    old_category text,
    project_name text,
    old_project_name text,
    project_description text,
    old_project_description text,
    project_thumbnail text,
    old_project_thumbnail text,
    project_images text,
    old_project_images text,
    project_link text,
    old_project_link text,
    status text,
    old_status text,
    deleted text,
    old_deleted text,
    who text,
    what text,
    `when` timestamp not null default current_timestamp()
);

-- Trigger to log insert into `projects`
drop trigger if exists TRG_log_project_insert;
delimiter $$
create trigger TRG_log_project_insert after insert on `projects`
for each row
begin
    insert into mrr_projects (
        category, old_category,
        project_name, old_project_name,
        project_description, old_project_description,
        project_thumbnail, old_project_thumbnail,
        project_images, old_project_images,
        project_link, old_project_link,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        new.category, null,
        new.project_name, null,
        new.project_description, null,
        new.project_thumbnail, null,
        new.project_images, null,
        new.project_link, null,
        new.status, null,
        new.deleted, null,
        new.affected, 'insert'
    );
end$$
delimiter ;

-- Trigger to log after update into `projects`
drop trigger if exists TRG_log_project_update;
delimiter $$
create trigger TRG_log_project_update after update on `projects`
for each row
begin
    if new.deleted = 1 then
        insert into mrr_projects (
            category, old_category,
            project_name, old_project_name,
            project_description, old_project_description,
            project_thumbnail, old_project_thumbnail,
            project_images, old_project_images,
            project_link, old_project_link,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.category, old.category,
            new.project_name, old.project_name,
            new.project_description, old.project_description,
            new.project_thumbnail, old.project_thumbnail,
            new.project_images, old.project_images,
            new.project_link, old.project_link,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'delete'
        );
    else
        insert into mrr_projects (
            category, old_category,
            project_name, old_project_name,
            project_description, old_project_description,
            project_thumbnail, old_project_thumbnail,
            project_images, old_project_images,
            project_link, old_project_link,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.category, old.category,
            new.project_name, old.project_name,
            new.project_description, old.project_description,
            new.project_thumbnail, old.project_thumbnail,
            new.project_images, old.project_images,
            new.project_link, old.project_link,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'update'
        );
    end if;
end$$
delimiter ;

-- Trigger to log after delete into `projects`
drop trigger if exists TRG_log_project_delete;
delimiter $$
create trigger TRG_log_project_delete after delete on `projects`
for each row
begin
    insert into mrr_projects (
        category, old_category,
        project_name, old_project_name,
        project_description, old_project_description,
        project_thumbnail, old_project_thumbnail,
        project_images, old_project_images,
        project_link, old_project_link,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        null, old.category,
        null, old.project_name,
        null, old.project_description,
        null, old.project_thumbnail,
        null, old.project_images,
        null, old.project_link,
        null, old.status,
        null, old.deleted,
        old.affected, 'delete'
    );
end$$
delimiter ;

-- User login table
drop table if exists user_login;
create table if not exists user_login(
    id text,
    user text,
    ip text,
    hostname text,
    location text,
    ISP text,
    city text,
    region text,
    country text,
    phone text,
    status text default '1',
    deleted text default '0',
    affected text,
    added timestamp not null default current_timestamp(),
    last_updated timestamp not null default current_timestamp() on update current_timestamp()
);

-- User login ID generator trigger
drop trigger if exists generate_user_login_id; 
delimiter //
create trigger generate_user_login_id before insert on user_login
for each row
begin
   if new.id is null then
        set new.id = lower(left(md5(rand()), 15));
    end if;
end;
// delimiter ;

-- User login mirror table
drop table if exists mrr_user_login;
create table if not exists mrr_user_login(
    mirror_id int(30) not null auto_increment primary key,
    user text,
    old_user text,
    ip text,
    old_ip text,
    hostname text,
    old_hostname text,
    location text,
    old_location text,
    ISP text,
    old_ISP text,
    city text,
    old_city text,
    region text,
    old_region text,
    country text,
    old_country text,
    phone text,
    old_phone text,
    status text,
    old_status text,
    deleted text,
    old_deleted text,
    who text,
    what text,
    `when` timestamp not null default current_timestamp()
);

-- Trigger to log insert into `user_login`
drop trigger if exists TRG_log_user_login_insert;
delimiter $$
create trigger TRG_log_user_login_insert after insert on `user_login`
for each row
begin
    insert into mrr_user_login (
        user, old_user,
        ip, old_ip,
        hostname, old_hostname,
        location, old_location,
        ISP, old_ISP,
        city, old_city,
        region, old_region,
        country, old_country,
        phone, old_phone,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        new.user, null,
        new.ip, null,
        new.hostname, null,
        new.location, null,
        new.ISP, null,
        new.city, null,
        new.region, null,
        new.country, null,
        new.phone, null,
        new.status, null,
        new.deleted, null,
        new.affected, 'insert'
    );
end$$
delimiter ;

-- Trigger to log after update into `user_login`
drop trigger if exists TRG_log_user_login_update;
delimiter $$
create trigger TRG_log_user_login_update after update on `user_login`
for each row
begin
    if new.deleted = 1 then
        insert into mrr_user_login (
            user, old_user,
            ip, old_ip,
            hostname, old_hostname,
            location, old_location,
            ISP, old_ISP,
            city, old_city,
            region, old_region,
            country, old_country,
            phone, old_phone,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.user, old.user,
            new.ip, old.ip,
            new.hostname, old.hostname,
            new.location, old.location,
            new.ISP, old.ISP,
            new.city, old.city,
            new.region, old.region,
            new.country, old.country,
            new.phone, old.phone,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'delete'
        );
    else
        insert into mrr_user_login (
            user, old_user,
            ip, old_ip,
            hostname, old_hostname,
            location, old_location,
            ISP, old_ISP,
            city, old_city,
            region, old_region,
            country, old_country,
            phone, old_phone,
            status, old_status,
            deleted, old_deleted,
            who, what
        ) values (
            new.user, old.user,
            new.ip, old.ip,
            new.hostname, old.hostname,
            new.location, old.location,
            new.ISP, old.ISP,
            new.city, old.city,
            new.region, old.region,
            new.country, old.country,
            new.phone, old.phone,
            new.status, old.status,
            new.deleted, old.deleted,
            new.affected, 'update'
        );
    end if;
end$$
delimiter ;

-- Trigger to log after delete into `user_login`
drop trigger if exists TRG_log_user_login_delete;
delimiter $$
create trigger TRG_log_user_login_delete after delete on `user_login`
for each row
begin
    insert into mrr_user_login (
        user, old_user,
        ip, old_ip,
        hostname, old_hostname,
        location, old_location,
        ISP, old_ISP,
        city, old_city,
        region, old_region,
        country, old_country,
        phone, old_phone,
        status, old_status,
        deleted, old_deleted,
        who, what
    ) values (
        null, old.user,
        null, old.ip,
        null, old.hostname,
        null, old.location,
        null, old.ISP,
        null, old.city,
        null, old.region,
        null, old.country,
        null, old.phone,
        null, old.status,
        null, old.deleted,
        old.affected, 'delete'
    );
end$$
delimiter ;

-- Newsletter table
drop table if exists newsletter_subscribers;
create table if not exists newsletter_subscribers(    
    id text,
    email text,
    status text default '1',
	deleted text default '0',
    affected text,
    added timestamp not null default current_timestamp(),
    last_updated timestamp not null default current_timestamp() on update current_timestamp()
);

-- Newsletter subscribers ID generator trigger
drop trigger if exists generate_newsletter_subscriber_id; 
-- Generate newsletter subscribers id 
delimiter //
create trigger generate_newsletter_subscriber_id before insert on newsletter_subscribers
for each row
begin
   if new.id is null then
        set new.id = lower(left(md5(rand()), 15));
    end if;
end;
// delimiter ;

-- navigation table mirror
drop table if exists mrr_newsletter_subscribers;
create table if not exists mrr_newsletter_subscribers(    
    mirror_id int(30) not null auto_increment primary key,
    email text,
    old_email text,
    affected text,
    `status` text,
	`old_status` text,
	`deleted` text,
	`old_deleted` text,
	`who` text,
	`what` text,
	`when` timestamp not null default current_timestamp()
);

-- Trigger to log insert into `newsletter_subscribers` 
drop trigger if exists TRG_log_newsletter_subscribers_insert; 
delimiter $$
create trigger TRG_log_newsletter_subscribers_insert after insert on `newsletter_subscribers` 
for each row
begin
	insert into mrr_newsletter_subscribers (email,old_email,status,old_status,deleted,old_deleted,who,what) values
	(new.email,null,new.status,null,new.deleted,null,new.affected,'insert');
end$$
delimiter ;

-- Trigger to log after update into `newsletter_subscribers` 
drop trigger if exists TRG_log_newsletter_subscribers_update;
delimiter $$
create trigger `TRG_log_newsletter_subscribers_update` after update on `newsletter_subscribers` 
for each row 
begin
    if new.deleted = 1 then	
		insert into mrr_newsletter_subscribers (email,old_email,status,old_status,deleted,old_deleted,who,what) values
		(new.email,old.email,new.status,old.status,new.deleted,old.deleted,new.affected,'delete');
	else		
		insert into mrr_newsletter_subscribers (email,old_email,status,old_status,deleted,old_deleted,who,what) values
		(new.email,old.email,new.status,old.status,new.deleted,old.deleted,new.affected,'update');
	 end if;
end$$
delimiter ;

-- Trigger to log after delete into `newsletter_subscribers` 
drop trigger if exists TRG_log_newsletter_subscribers_delete;
delimiter $$
create trigger TRG_log_newsletter_subscribers_delete after delete on `newsletter_subscribers` 
for each row
begin
    insert into mrr_newsletter_subscribers (email,old_email,status,old_status,deleted,old_deleted,who,what) values
	(null,old.email,null,old.status,null,old.deleted,old.affected,'delete');
end$$
delimiter ;

