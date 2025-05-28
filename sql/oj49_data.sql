-- Insert a random user into the users table
insert into users (id, name, email)
values (
    'ef376bea40a50be',
    'Okello John Silas',
    'johnsilasokello49@gmail.com'
);

-- Insert  user credentials into the users table
insert into user_auth (user, password)
values (
    'ef376bea40a50be',
    '$2y$10$u6g1F8nXfKiOB0kvSCNUmeE0kVRHJdneGAde3CIwzRlIflLLvCiMi'
);
