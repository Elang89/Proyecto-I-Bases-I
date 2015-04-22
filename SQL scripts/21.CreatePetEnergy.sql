/* Made by Adrian Diaz Azofeifa 04/07/2015

Script for creating Pet's Energy Level table
*/

CREATE TABLE PetEnergy
(
		pet_energy_level varchar2(30) CONSTRAINT pet_energy_level_nn NOT NULL, /*Pet's energetic level from 0 to 5*/
		pet_energy_code NUMBER(10) /*PRIMARY KEY*/
);