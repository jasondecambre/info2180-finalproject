-- MySQL dump 10.11
--
-- to install this database, from a terminal, type:
-- mysql -u USERNAME -p -h SERVERNAME world < world.sql
--
-- Host: localhost    Database: bugme
-- ------------------------------------------------------
-- Server version   5.0.45-log

DROP DATABASE IF EXISTS bugme;
CREATE DATABASE bugme;
USE bugme;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT UNSIGNED NOT NULL primary key AUTO_INCREMENT,
  firstname VARCHAR(32) DEFAULT NULL,
  lastname VARCHAR(32) DEFAULT NULL,
  password VARCHAR(100) NOT NULL,
  email VARCHAR(256) NOT NULL,
  date_joined DATETIME NOT NULL
);

INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 1, 'First', 'Admin','$2y$10$Lx.nlvDKDJI1HIV61vrjL.u8OK.DnujigJKsVteUUF9sTZ6fvnQtK', 'admin@project2.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 2, 'Tom', 'Brady', '$2y$10$0SldGfSzUDHvEHjDplpB4OlByxJJbRHJ4UYd2I9nyrm3elPNhAVqy', 'goldenarm@nfl.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 3, 'Jan', 'Brady', '$2y$10$0pXmlqqdDaNolC5CyEWnGu7KgaPLDRgBvzedldEpy1buef6tz2rSe', 'smalljan@jazz.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 4, 'Marsha', 'Brady', '$2y$10$CdFXT6otX9zHzp5344W1lOW3bDZuOlNhANYJ2QuaBmqBagskKv91', 'theMbear@treehouse.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 5, 'Mike', 'Brady', '$2y$10$xjbaBbFb/jTbWSS0MSKPxeNDiHlyLhDPRASnOIq.xptjj0gNiugPi', 'youngblud@newkid.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 6, 'Marcia', 'Brady', '$2y$10$b700VefaufE28Q.e3R6FZeWcfMZg3qQxvbdEO6bcBXN3uj2fhW2Ry', 'royalty22@queen.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 7, 'Terrance', 'Matthews', '$2y$10$z1VgFdLq.8QJP2RV3umcceQt4D69XBN1m2.8m/6BIxImfJ2NSi.22', 'kingpin12@regal.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 8, 'Brandon', 'Murphy', '$2y$10$iNPXXj37yOw0SX8koIYm5uz4TYECISeIhQLfz7TR03V1M4ZDuot1q', 'smoothking980@music.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 9, 'Amanda', 'Sykes', '$2y$10$n3iillwdxlM.3x3Q3kyf4euMY5CyZY0gRJaWpz1LB2pC4cidOGvju', 'harleyquinn@dc.com', SYSDATE());






DROP TABLE IF EXISTS issues;
CREATE TABLE issues(
  id INT UNSIGNED auto_increment,
  title VARCHAR(32) DEFAULT NULL,
  description TEXT(256) DEFAULT NULL,
  type VARCHAR(32) DEFAULT NULL,
  priority VARCHAR(32) DEFAULT NULL,
  status VARCHAR(32) DEFAULT NULL,
  assigned_to INT UNSIGNED NOT NULL,
  created_by INT UNSIGNED NOT NULL,
  created DATETIME NOT NULL,
  updated DATETIME NOT NULL,
  primary key(id)

);
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#100 XSS Vulnerability in Add User Form', 'The Submit button does not work when clicked', 'Bug', 'Major', 'Open', 2, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#23 Location Service isnt working', 'I cannot locate my issue', 'Bug', 'Critical', 'Open', 3, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#16 Setup Logger', 'Trouble logging into my account after creating one', 'Proposal', 'Minor', 'Closed', 5, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#50 Create API Documentation', 'API Documentation needs to be better', 'Proposal', 'Critical', 'In Progress', 7, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#24 Allow results to be sorted', 'Sort the results in either asce or desc order', 'Proposal', 'Major', 'In Progress', 6, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#12 Random text flashing on screen', 'When the submit button is clicked random text is displayed on the screen', 'Bug', 'Minor', 'Closed', 4, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#67 Add a button to create new users without admin credentials', 'Allow me to enter my own stuff', 'Task', 'Critical', 'In Progress', 5, 0001, SYSDATE(), SYSDATE());