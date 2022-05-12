create database if not exists bike_db;
use bike_db;


drop table if exists bike_categorys;
create table bike_categorys(
	id int(10) primary key auto_increment,
	category_name varchar(50)
);
insert into bike_categorys(category_name)values('Hero');
insert into bike_categorys(category_name)values('Bajaj');
insert into bike_categorys(category_name)values('Honda');
insert into bike_categorys(category_name)values('Sujuki');
insert into bike_categorys(category_name)values('TVS');
insert into bike_categorys(category_name)values('Runner');
insert into bike_categorys(category_name)values('Yamaha');
insert into bike_categorys(category_name)values('Lifan');



drop table if exists bike_products;
create table bike_products(
id int(10) primary key auto_increment,
product_name varchar(50),
category_id int(10),
color varchar(20),
model varchar(20),
brand varchar(20),
price float,
img_name varchar(50)
);
insert into bike_products(product_name,category_id,color,model,brand,price,img_name)values('Yamaha FZ Fi Version 3',1,'White','160R','Yamaha',145044,'1.jpg');
insert into bike_products(product_name,category_id,color,model,brand,price,img_name)values('Hero Xtreme 160R',2,'Black','110BS6','Hero',145024,'2.jpg');
insert into bike_products(product_name,category_id,color,model,brand,price,img_name)values('Pulsar NS160 FI BS-VI',3,'navey','X38','Bajaj',224245,'3.jpg');
insert into bike_products(product_name,category_id,color,model,brand,price,img_name)values('Runner Bolt 165R',4,'yellow','LOC42','Runner',142750,'4.jpg');
insert into bike_products(product_name,category_id,color,model,brand,price,img_name)values('Apache RTR 160 4V ',4,'black','BS-VI','Runner',178750,'5.jpg');
insert into bike_products(product_name,category_id,color,model,brand,price,img_name)values('Bajaj Pulsar  ',4,'black','V-125','Runner',136750,'6.jpg');



drop table if exists bike_suppliers;
create table bike_suppliers(
  id int(10) primary key auto_increment,
  supplier_name varchar(50),
  phone varchar(20),
  email varchar(30),
  address text,
  city varchar(20)
);
insert into bike_suppliers(supplier_name,phone,email,address,city)values('Altura Associates','01753454836','altura45@gmail.com','Panthopoth','Dhaka');
insert into bike_suppliers(supplier_name,phone,email,address,city)values('C.A.R. Transport, Inc.','01844533436','transport@gmail.com','Tonge','Gazipur');
insert into bike_suppliers(supplier_name,phone,email,address,city)values('MullenLowe','01753402035','mullenLowe@gmail.com','Mordern More','Rangpur');
insert into bike_suppliers(supplier_name,phone,email,address,city)values('Targetbase ','01855588502','targetbase@gmail.com','Dhanmondi','Dhaka');
insert into bike_suppliers(supplier_name,phone,email,address,city)values('T. V. Sundaram Iyengar','01855555044','sundaram@gmail.com','Mirpur','Dhaka');
insert into bike_suppliers(supplier_name,phone,email,address,city)values('Suzuki Motor Corporation','01855555250','suzuki@gmail.com','Sahabag','Dhaka');



drop table if exists bike_purchase;
create table bike_purchase(
  id int(10) primary key auto_increment,
  supplier_id int(10),
  purchase_date varchar(20),
  purchase_due_date varchar(20),
  total_amount varchar(30),
  payment varchar(30),
  due varchar(30),
  reference text
);
insert into bike_purchase(supplier_id,purchase_date,purchase_due_date,total_amount,payment,due,reference)values('1','10/11/20','11/11/20','300000','150000','150000','215');
insert into bike_purchase(supplier_id,purchase_date,purchase_due_date,total_amount,payment,due,reference)values('2','11/08/20','12/09/20','250000','200000','50000','no');
insert into bike_purchase(supplier_id,purchase_date,purchase_due_date,total_amount,payment,due,reference)values('3','12/09/20','12/09/20','220000','200000','20000','336');
insert into bike_purchase(supplier_id,purchase_date,purchase_due_date,total_amount,payment,due,reference)values('4','01/11/20','01/11/20','250000','150000','100000','no');



drop table if exists bike_purchase_details;
create table bike_purchase_details(
  id int(10) primary key auto_increment,
  purchase_id int(10),
  product_id int(10),
  quentity float,
  Per_price float
);
insert into bike_purchase_details(purchase_id,product_id,quentity,Per_price)values(1,2,'3','150000');
insert into bike_purchase_details(purchase_id,product_id,quentity,Per_price)values(2,3,'2','240000');
insert into bike_purchase_details(purchase_id,product_id,quentity,Per_price)values(3,1,'1','170000');
insert into bike_purchase_details(purchase_id,product_id,quentity,Per_price)values(4,4,'4','140000');




drop table if exists bike_roles;
create table bike_roles(
	id int(10) primary key auto_increment,
	role_name varchar(50) not null
);
insert into bike_roles(role_name)values('Admin');
insert into bike_roles(role_name)values('Editor');
insert into bike_roles(role_name)values('Memeber');




drop table if exists bike_users;
create table bike_users(
	id int(10) primary key auto_increment,
	username varchar(20) not null,
	password varchar(50),
	role_id int(10),
	inactive int(1) default 0

);
insert into bike_users(username,password,role_id,inactive)values('habib',md5('111111'),1,0);
insert into bike_users(username,password,role_id,inactive)values('admin',md5('123456'),1,0);
insert into bike_users(username,password,role_id,inactive)values('yasin',md5('3'),2,0);
insert into bike_users(username,password,role_id,inactive)values('shihab',md5('4'),3,0);
insert into bike_users(username,password,role_id,inactive)values('milon',md5('5'),3,0);
insert into bike_users(username,password,role_id,inactive)values('razzak',md5('6'),3,0);
