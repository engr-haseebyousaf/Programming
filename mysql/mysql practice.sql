CREATE TABLE Personal(
id INT auto_increment UNIQUE,
name VARCHAR(20),
class VARCHAR(10),
section VARCHAR(1),
ag int);

use Students;
CREATE database Students;
select * from students.Personal;
use students;
insert into Personal(name,class,section,ag)
values("Sami","BS","B",30000);
select * from Personal;
insert into Personal(name,class,section,ag)
values
("dawood","10","C",29),
("Mujahid","9","D",1),
("Rehman","BCom","E",30),
("Hamza","CMA","A",12);
drop table teachers;
create table teachers(
tid int ,
name tinytext,
qualification ENUM('IT','CS','SE','BI'),
personal_id int);
insert into teachers(tid,name,qualification,personal_id)
values 
(1,'Yousaf',1,2233),
(2,'Ahsan',2,33),
(3,'Ali',3,44),
(4,'Hassan',4,99);
select * from teachers;
drop table ITpersonals;
create table ITpersonals(
iid int auto_increment unique,
name varchar(25),
skills enum('DBMS','Backend','Frontend','Full stack','cyber security'));

insert into ITpersonals(name,skills) 
values
('Aneeqa', 1 ),
('Majid', 2 ),
('Saleem', 3 ),
('None', 4 ),
('Master', 5 );
select * from ITpersonals;

drop table newAdmission;
create table newAdmission(
naid int auto_increment unique,
name varchar(25),
city tinytext,
institute text,
numbers int(10),
prv_roll_no int primary key);
select * from students.newadmission;
insert into students.newAdmission(name,city,institute,numbers,prv_roll_no)
values 
('Ali','Multan','KIPS',660,222),
('Ali But','Shaikha pura','Al Halim',962,323),
('Baba','Faisalabad','Aspire',1100,3212);

select * from students.newadmission where numbers in (1080,1089);
select * from students.newadmission where numbers between 900 and 1080;
select * from students.newadmission order by prv_roll_no desc;
select distinct city from students.newAdmission limit 1,2;
select count(city) from students.newAdmission where numbers <= 1060;
update students.newAdmission set city = "DJ cort" where naid = 4;
select * from students.newAdmission;
alter table students.teachers add primary key(personal_id);
create table students.guards(
id int,
name varchar(25) not null,
position varchar(20),
foreign key(position) references positions(position),
gid int primary key);
alter table students.positions add primary key(id);

create table students.positions(
id int primary key auto_increment unique,
position varchar(20));
insert into students.positions (position)
values
('defence'),
('assault'),
('sniper'),
('attack');