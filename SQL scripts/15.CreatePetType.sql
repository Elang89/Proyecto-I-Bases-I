/* Made by Miuyin Yong 

Script for creating Pet Type table
*/

CREATE TABLE PetType
(
		pet_type_name VARCHAR(20) CONSTRAINT pet_type_name_nn NOT NULL, 
		pet_type_code NUMBER(10) /*PRIMARY KEY*/
);