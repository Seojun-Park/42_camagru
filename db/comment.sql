CREATE TABLE comment (
    number INT unsigned not null primary key auto_increment,
    feed_number Int unsigned not null,
    id VARCHAR(20) not null,
    content text not null,
    date datetime not null,
    parent_number int unsigned not null DEFAULT 0
);