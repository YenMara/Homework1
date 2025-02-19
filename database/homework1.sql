create table users (
    id int not null auto_increment primary key,
    username varchar(120),
    email varchar(255) not null unique,
    avatar varchar(255)
);

create table images (
    id int auto_increment primary key,
    path varchar(255) not null,
    user_id int not null,
    foreign key (user_id) references users(id) on delete cascade
);
