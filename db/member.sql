create table member
(
    id varchar(16) not null,
    pw varchar(20) not null,
    email VARCHAR(100) not null,
    name VARCHAR(40) not null,
    permit tinyint(3) unsigned
    );