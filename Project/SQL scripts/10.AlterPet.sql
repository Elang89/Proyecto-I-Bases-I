/* Made by Adrian Diaz Azofeifa on 04/07/2015

Script for adding foreign key related columns and references, and primary key constraints to Pet table
*/


/*
Adds PRIMARY KEY CONSTRAINT to TABLE Pet
*/
ALTER TABLE Pet

ADD CONSTRAINT pk_pet_code PRIMARY KEY (pet_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);

/*
Adds Colums to TABLE Pet
*/

ALTER TABLE Pet 
ADD pet_type_code NUMBER(10);

ALTER TABLE Pet 
ADD pet_race_code NUMBER(10);

ALTER TABLE Pet 
ADD pet_cond_code NUMBER(10);

ALTER TABLE Pet 
ADD pet_size_code NUMBER(10);

ALTER TABLE Pet 
ADD pet_energy_code NUMBER(10);

ALTER TABLE Pet 
ADD pet_learn_code NUMBER(10);

ALTER TABLE Pet
ADD vet_code NUMBER(10);

ALTER TABLE Pet
ADD owner_id NUMBER(10);



/*
Add Foreign Key constraints to TABLE Pet
*/
ALTER TABLE Pet
      ADD CONSTRAINT fk_pet_type_code FOREIGN KEY (pet_type_code) REFERENCES PetType(pet_type_code);

ALTER TABLE Pet
      ADD CONSTRAINT fk_pet_race_code FOREIGN KEY (pet_race_code) REFERENCES PetRace(pet_race_code);

ALTER TABLE Pet
      ADD CONSTRAINT fk_pet_cond_code FOREIGN KEY (pet_cond_code) REFERENCES PetCondition(pet_cond_code);

ALTER TABLE Pet
      ADD CONSTRAINT fk_pet_size_code FOREIGN KEY (pet_size_code) REFERENCES PetSize(pet_size_code);

ALTER TABLE Pet
      ADD CONSTRAINT fk_pet_energy_code FOREIGN KEY (pet_energy_code) REFERENCES PetEnergy(pet_race_code);

ALTER TABLE Pet
      ADD CONSTRAINT fk_vet_code FOREIGN KEY (vet_code) REFERENCES Veterinary(vet_code);

ALTER TABLE Pet
      ADD CONSTRAINT fk_pet_learn_code FOREIGN KEY (pet_learn_code) REFERENCES PetLearningSkill(pet_learn_code);                        

ALTER TABLE Pet
      ADD CONSTRAINT fk_owner_id FOREIGN KEY (owner_id) REFERENCES Person(Person_id);


