create database blogdb;
use blogdb;

create table users(
   userID int AUTO_INCREMENT,
   username varchar(30) not null, index(username),
   lastname varchar(50),
   firstname varchar(30),
   password varchar(30),
   email varchar(255),
   role varchar(30),
   lastModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   primary key(userID)
)engine=innodb;

create table topics(
   topID int AUTO_INCREMENT,
   name varchar(50),
   description varchar(255),
   lastModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   primary key(topID)
)engine=innodb;

create table articles(
   artID int AUTO_INCREMENT,
   authorID int NOT NULL, index(authorID),
   catID int NOT NULL, index(catID),
   title varchar(255),
   image varchar(255),
   content text,
   lastModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   primary key(artID)
)engine=innodb;

create table comments(
   comID int AUTO_INCREMENT,
   authorID int NOT NULL, index(authorID),
   artID int NOT NULL, index(artID),
   content varchar(255),
   lastModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   primary key(comID)
)engine=innodb;

create user 'bloguser'@'localhost' identified by 'blogAssign3';
grant all privileges on blogdb.* to 'bloguser'@'localhost';

INSERT INTO users(username, lastname, firstname, password, email, role) VALUES ('jwitt','Witt','Jesse','abc123','jwitt00@g.uafs.edu','admin');

INSERT INTO users(username, lastname, firstname, password, email, role) VALUES ('bran','Geoates','Branigan','password','bgeao00@g.uafs.edu','admin');

INSERT INTO users(username, lastname, firstname, password, email, role) VALUES ('whitty','Whitlock','Garrett','password','gwhit00@g.uafs.edu','admin');

INSERT INTO users(username, lastname, firstname, password, email, role) VALUES ('dummy','Dummy','Test','password','dummy@g.uafs.edu','author');


INSERT INTO articles(authorID, catID, title, image, content) VALUES ('1','1','Test Article: Welcome!','image.png','This is content for the article. Enjoy your time on the website!');

INSERT INTO articles(authorID, catID, title, image, content) VALUES ('2','1','Test Article: Test Number 2','image.png','Another test article to fill up space on the website. I am going to type more content in here in order to make the website look more full. Okay that should be enough content right?');

INSERT INTO comments(authorID, artID, content) VALUES('3','1','Nice test article, looks great!');

INSERT INTO comments(authorID, artID, content) VALUES('1','2','Wow super great article dude!');

INSERT INTO comments(authorID, artID, content) VALUES('4','1','Test Dummy says hi.');









