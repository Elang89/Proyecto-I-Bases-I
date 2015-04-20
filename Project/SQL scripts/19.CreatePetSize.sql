/* Made by Adrian Diaz Azofeifa 04/07/2015

Script for creating Pet Size table
*/

CREATE TABLE PetSize
(
		pet_size VARCHAR(20) CONSTRAINT pet_size_nn NOT NULL, 
		pet_size_code NUMBER(10) /*PRIMARY KEY*/
);