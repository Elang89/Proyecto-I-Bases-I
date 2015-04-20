/*
Se crea la llave primaria codigo con su índice
en la tabla Adoption
por Adrian Diaz Azofeifa
*/

ALTER TABLE PetAdoption
ADD CONSTRAINT pk_adoption_code PRIMARY KEY (adoption_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);

ALTER TABLE PetAdoption
      ADD CONSTRAINT fk_Apet_code FOREIGN KEY (PET_ID) REFERENCES Pet(pet_code);  

ALTER TABLE PETADOPTION
      ADD CONSTRAINT fk_giving_adopt_code FOREIGN KEY (Giving_for_adoption) REFERENCES Person(person_id);
  
ALTER TABLE PETADOPTION
      ADD CONSTRAINT fk_adoptant_code FOREIGN KEY (ADOPTANT) REFERENCES Person(person_id);