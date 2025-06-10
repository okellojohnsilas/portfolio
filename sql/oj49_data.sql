-- Insert a random user into the users table
insert into
    users (id, name, email)
values
    (
        'ef376bea40a50be',
        'Okello John Silas',
        'johnsilasokello49@gmail.com'
    );

-- Insert  user credentials into the users table
insert into
    user_auth (user, password)
values
    (
        'ef376bea40a50be',
        '$2y$10$u6g1F8nXfKiOB0kvSCNUmeE0kVRHJdneGAde3CIwzRlIflLLvCiMi'
    );

-- Insert website data into the website_data table
insert into
    website_data (hero_tag, hero_sub_tag, hero_sub_tag_words, about,contact_email)
values
    (
        'Welcome, am Okello John Silas',
        'I am many things. You can call me a',
        'developer, freelancer, creative, part-time software engineer',
        'I am a self-motivated and adaptable software engineer known for translating complex business needs into innovative technical solutions. Known for collaboration and adaptability, I excel in team environments, working closely with data and operations teams to meet customer needs. My expertise includes Machine Learning, Deep Learning, web, mobile and desktop application development with competencies in both frontend and backend. I am also proficient in handling technical issues, creating system documentation, and conducting quality assurance, I bring efficiency to project development and prioritize user experience optimization. Backed by a strong academic and technical background, I am committed to delivering cuttingedge solutions in any dynamic field and working environment.',
        'johnsilasokello49@gmail.com'
    );