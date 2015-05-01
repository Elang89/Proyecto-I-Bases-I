/*
Script to create alter the table PetAdoption
created by Ernesto Lang
*/

ALTER TABLE PetAdoption
ADD CONSTRAINT pk_adoption_code PRIMARY KEY (adoption_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);
ALTER TABLE 
	ADD owner_id NUMBER(10);

ALTER TABLE PetAdoption
	ADD CONSTRAINT fk_Apet_code FOREIGN KEY (PET_ID) REFERENCES Pet(pet_code);  

ALTER TABLE petadoption
	ADD CONSTRAINT fk_application_creator_id FOREIGN KEY (owner_id) REFERENCES person(person_id)