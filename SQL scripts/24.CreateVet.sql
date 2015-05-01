/* Made by Miuyin Yong 

Script for creating Pet Color table
*/

CREATE TABLE Veterinary
(
		vet_name VARCHAR(20) CONSTRAINT vet_name_nn NOT NULL, 
		vet_code NUMBER(10), /*PRIMARY KEY*/
		vet_phone_number NUMBER(8) CONSTRAINT vet_phone_number_nn NOT NULL
);