/* Made by Adrian Diaz Azofeifa 04/07/2015

Script for creating Pet Race table
*/

CREATE TABLE PetRace
(
		pet_race_name VARCHAR(20) CONSTRAINT pet_race_name_nn NOT NULL, 
		pet_race_code NUMBER(10), /*PRIMARY KEY*/
		pet_type NUMBER(10) /*FOREIGN KEY REFERENCES PETTYPECODE*/
); 

ALTER TABLE PetRace
      ADD CONSTRAINT fk_petType FOREIGN KEY (pet_type) REFERENCES PetType(Pet_type_code);