/* Made by Adrian Diaz Azofeifa on 03/31/2015

Script for creating the Pet table
*/

CREATE TABLE Pet
(
       pet_name VARCHAR2(20) CONSTRAINT pet_name_nn NOT NULL, /* El nombre de la mascota*/
	   pet_code NUMBER(10)  /*PRIMARY KEY*/ 
	   ADOPT_STATE NUMBER(1); --  False(0) and True(1) 
       
);