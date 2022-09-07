CREATE DATABASE Form;
CREATE TABLE users(
  id int AUTO_INCREMENT PRIMARY KEY not null,
  firstName VARCHAR(255) not null,
  lastName VARCHAR(255) not null,
  email VARCHAR(255) not null,
  gender VARCHAR(255) not null, 
  age VARCHAR(255) not null, 
  editor VARCHAR(255) not null, 
);

INSERT INTO users (id, firstName, lastName, email, gender, age, editor)
  VALUES ('rau', 'chpinde', 'admin@gmail.com', 'Male', 23, 'Vim');