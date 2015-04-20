/* Made by Adrian Diaz Azofeifa 04/07/2015

Script for creating Pet's Sicknesses tables
*/

CREATE TABLE PetSickness
(
		pet_sickness_name VARCHAR(20) CONSTRAINT pet_sickness_name_nn NOT NULL, 
		pet_sickness_code NUMBER(10) /*PRIMARY KEY*/
);