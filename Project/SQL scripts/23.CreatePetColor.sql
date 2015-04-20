/* Made by Adrian Diaz Azofeifa 04/07/2015

Script for creating Pet Color table
*/

CREATE TABLE PetColor
(
		pet_color VARCHAR(20) CONSTRAINT pet_color_nn NOT NULL, 
		pet_color_code NUMBER(10) /*PRIMARY KEY*/
);