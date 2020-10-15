CREATE TABLE feed
(
    number INT unsigned not null primary key auto_increment,
    title VARCHAR(150) not null,
    content TEXT not null,
    id VARCHAR(20) not null,
    password VARCHAR(20) not null,
    date DATETIME not null,
);

