/* Made by Adrian Diaz Azofeifa on 03/31/2015
Edited by Ernesto Lang Oreamuno on 04/04/2015

Script for adding foreign key references and primary key constraints to Person table
And to related tables Phone and Email
*/

ALTER TABLE Person
  ADD CONSTRAINT pk_cedula PRIMARY KEY (person_id)
  USING INDEX
  TABLESPACE PetLovers_Indexes PCTFREE 20
  STORAGE (initial 10k next 10k pctincrease 0);

/*
Foreign key in Person Table for User Primary Key
*/

ALTER TABLE Person
      ADD CONSTRAINT fk_user FOREIGN KEY (username) REFERENCES usuario(username);

/*
Foreign keys in Phone and Email tables for Person Primary Key
*/

ALTER TABLE Phone
      ADD CONSTRAINT fk_person_phone FOREIGN KEY (person_id) REFERENCES person(person_id); 

ALTER TABLE Email
      ADD CONSTRAINT fk_person_email FOREIGN KEY (person_id) REFERENCES person(person_id);
