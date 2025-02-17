create table users (
    id int not null auto_increment primary key,
    username varchar(120),
    email varchar(255) not null unique
);
-- create table images (
--     id int not null auto_increment primary key,
--     pat VARCHAR(255) NOT NULL,
--     constraint user_fk foreign key (user_id) references users (id) on delete cascade
-- );
CREATE TABLE IF NOT EXISTS image (
    id INT AUTO_INCREMENT PRIMARY KEY,
    path VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

insert into users (username, email) values
 ('mara', 'mara@gmail.com'),
 ('nisa', 'nisa@gmail.com');
 