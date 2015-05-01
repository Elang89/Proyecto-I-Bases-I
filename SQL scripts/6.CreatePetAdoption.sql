/*
Script to create table petAdoption 
Created By Ernesto Lang 
*/

CREATE TABLE PetAdoption
(
       adoption_code NUMBER(20) CONSTRAINT adoption_code_nn NOT NULL, /*  Adoprion code*/
       adoption_date DATE DEFAULT SYSDATE CONSTRAINT adoption_date_nn NOT NULL /* Adopted date*/ 
       pet_id NUMBER(10) 
	   Giving_for_adoption NUMBER(10); 
	   ADOPTANT NUMBER(10); 
	   ACCEPTANCE_STATE NUMBER(1); /* ACEPTED (1) DENIAL(0)*/
       
);