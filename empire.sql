drop database empire;
create database empire;

use empire

create table users(
id int auto_increment primary key,
user varchar(25),
pass varchar(25),
fullname varchar(25) ,
age int,
email varchar(40),
prpic varchar(800),
isadmin boolean default false
);
insert into users(user,pass,isadmin) values ("ouadie","nous2022",1);
insert into users(id) values (99999);
create table categorie(
cid int auto_increment primary key,
categorie varchar(20)
);

create table color(
coid int auto_increment primary key,
color varchar(20)
);

create table size(
sid int auto_increment primary key,
size varchar(20)
);

create table product(
pid int auto_increment primary key,
name varchar(25),
description varchar(200),
priceb int,
prices int,
quantity_s int,
quantity_n int
);

create table promotion(
prid int auto_increment primary key,
promotion varchar(20)
);

create table sizes(
pid int,
sid int,
constraint sizes_size foreign key(sid) references size(sid) on delete cascade,
constraint sizes_product foreign key(pid) references product(pid) on delete cascade
);

create table categories(
cid int ,
pid int ,
constraint categorie foreign key(cid) references categorie(cid) on delete cascade,
constraint product foreign key(pid) references product(pid) on delete cascade
);


create table images(
pid int ,
image varchar(500),
constraint product1 foreign key(pid) references product(pid) on delete cascade
);

create table colors(
pid int ,
cid int,
constraint product_colors foreign key(pid) references product(pid) on delete cascade,
constraint color_colors foreign key(cid) references color(coid) on delete cascade
);

create table disponible(
pid int ,
coid int,
sid int,
quantity int,
constraint dispo_product foreign key(pid) references product(pid) on delete cascade,
constraint dispo_colors foreign key(coid) references color(coid) on delete cascade,
constraint dispo_size foreign key(sid) references size(sid) on delete cascade
);

create table cart(
cartid int auto_increment primary key,
pid int ,
id int,
quantity int,
coid int,
sid int,
pic varchar(500),
constraint product_cart foreign key(pid) references product(pid) on delete cascade,
constraint user_cart foreign key(id) references users(id) on delete cascade,
constraint color_cart foreign key(coid) references color(coid) on delete cascade,
constraint size_cart foreign key(sid) references size(sid) on delete cascade
);

create table command(
commandid int auto_increment primary key,
cid int,
id int,
fname varchar(200),
adresse varchar(200),
code varchar(50),
pays varchar(50),
numero varchar(100),
date date,
paytype boolean,
constraint command_cart foreign key(cid) references cart(cartid) on delete cascade,
constraint prd foreign key(id) references users(id) on delete cascade
);

create table deliver(
cid int,
done boolean,
constraint command_deliverd foreign key(cid) references command(commandid) on delete cascade
);

create table shipping(
shipid int auto_increment primary key,
country varchar(100),
price int
);

create table checkout(
id int auto_increment primary key,
uid int,
fprice int,
cid int,
constraint check_user foreign key(uid) references users(id) on delete cascade,
constraint check_cart foreign key(cid) references cart(cartid) on delete cascade
);



create table promotions(
prid int ,
pid int ,
constraint prom foreign key(prid) references promotion(prid) on delete cascade,
constraint product2 foreign key(pid) references product(pid) on delete cascade
);

create table msg(
mid int auto_increment primary key,
uid int ,
name varchar(100),
email varchar(200),
number varchar(20),
msg varchar(800),
time date,
constraint msguid foreign key(uid) references users(id) on delete cascade
);
