create table MANAGER (
    num int not null auto_increment,
    id char(15) not null,
    pass char(15) not null,
    name char(10) not null,
    regist_day char(20),
    primary key(num)
);