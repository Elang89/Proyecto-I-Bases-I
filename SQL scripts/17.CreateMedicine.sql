/* Made by Miuyin 

Script for creating Pet Medicament table
*/

CREATE TABLE PetMedicine
(
		pet_med_name VARCHAR(20) CONSTRAINT pet_med_name_nn NOT NULL, 
		pet_med_code NUMBER(10) /*PRIMARY KEY*/
);