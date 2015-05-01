/*
Script to create person, phone and email 
Created by Ernesto Lang
*/

CREATE TABLE Person
(
       person_name VARCHAR2(20) CONSTRAINT person_name_nn NOT NULL, /* Name of the person */
       first_last_name VARCHAR2(16) CONSTRAINT first_last_name_nn NOT NULL, /* First last name*/
       second_last_name VARCHAR2(16),
       person_id NUMBER(10),
	   blacklist NUMBER(1);
       username VARCHAR2(12)
       
);


CREATE TABLE Phone
(
	   phone_number NUMBER(8) CONSTRAINT phone_nn NOT NULL, /*Phone number*/
	   person_id NUMBER(10)  /*Foreign key person id r*/

);


CREATE TABLE Email
(
       email VARCHAR2(30) CONSTRAINT email_nn NOT NULL,   /*Email*/
       person_id NUMBER(10) /*Foreign key person id r*/
);
