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
  id INT UNSIGNED NOT NULL primary key,
  firstname VARCHAR(32) DEFAULT NULL,
  lastname VARCHAR(32) DEFAULT NULL,
  password VARCHAR(32) NOT NULL,
  email VARCHAR(256) NOT NULL,
  date_joined DATETIME NOT NULL
);

INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 0001, 'First', 'Admin','password123', 'admin@project2.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 1977, 'Tom', 'Brady', 'superQB44', 'goldenarm@nfl.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 1234, 'Jan', 'Brady', 'tinyJan', 'smalljan@jazz.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 4321, 'Marsha', 'Brady', 'marshaBear20', 'theMbear@treehouse.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 0987, 'Mike', 'Brady', 'sonOfTom32', 'youngblud@newkid.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 7890, 'Marcia', 'Brady', 'princessQB23', 'royalty22@queen.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 3453, 'Terrance', 'Matthews', 'sirMatt43', 'kingpin12@regal.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 6565, 'Brandon', 'Murphy', 'silksonic', 'smoothking980@music.com', SYSDATE());
INSERT INTO users (id, firstname, lastname, password, email, date_joined) VALUES ( 3215, 'Amanda', 'Sykes', 'crazygirl82', 'harleyquinn@dc.com', SYSDATE());






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
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#100 XSS Vulnerability in Add User Form', 'The Submit button does not work when clicked', 'Bug', 'Major', 'Open', 1977, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#23 Location Service isnt working', 'I cannot locate my issue', 'Bug', 'Critical', 'Open', 1234, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#16 Setup Logger', 'Trouble logging into my account after creating one', 'Proposal', 'Minor', 'Closed', 4321, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#50 Create API Documentation', 'API Documentation needs to be better', 'Proposal', 'Critical', 'In Progress', 0987, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#24 Allow results to be sorted', 'Sort the results in either asce or desc order', 'Proposal', 'Major', 'In Progress', 7890, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#12 Random text flashing on screen', 'When the submit button is clicked random text is displayed on the screen', 'Bug', 'Minor', 'Closed', 3453, 0001, SYSDATE(), SYSDATE());
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('#67 Add a button to create new users without admin credentials', 'Allow me to enter my own stuff', 'Task', 'Critical', 'In Progress', 6565, 0001, SYSDATE(), SYSDATE());