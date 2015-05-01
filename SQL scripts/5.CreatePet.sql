/* Made by Miuyin Yong

Script for creating the Pet table
*/

CREATE TABLE Pet
(
       pet_name VARCHAR2(20) CONSTRAINT pet_name_nn NOT NULL, /* El nombre de la mascota*/
	   pet_code NUMBER(10)  /*PRIMARY KEY*/ 
       
);