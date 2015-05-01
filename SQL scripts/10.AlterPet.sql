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

ALTER TABLE PET
ADD PetLocation VARCHAR2(100); 

ALTER TABLE PET
ADD PetNotes VARCHAR2(300);  

ALTER TABLE PET
ADD PetAbandonDescription VARCHAR2(300); 

ALTER TABLE PET 
ADD PetSpace_ID Number(10); 

ALTER TABLE PET 
ADD PetTreatments_ID Number(10);  

ALTER TABLE PET 
ADD adoption_id NUMBER(20); 

ALTER TABLE PET 
ADD Pet_Color_code NUMBER(10); 

ALTER TABLE PET 
ADD Pet_Sickness_code NUMBER(10);  

ALTER TABLE PET 
ADD Pet_Medicine_code NUMBER(10);   

ALTER TABLE PET 
ADD RETURN_COUNT Number(10) default 0; 

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


ALTER TABLE Pet
      ADD CONSTRAINT fk_pet_Space_code FOREIGN KEY (PetSpace_ID) REFERENCES PetSpace(pet_space_code); 
      
ALTER TABLE Pet
      ADD CONSTRAINT fk_pet_Treatment_code FOREIGN KEY (PetTreatments_ID) REFERENCES petTreatments(pet_treatment_code);

ALTER TABLE Pet
      ADD CONSTRAINT fk_adoption_id FOREIGN KEY (adoption_id) REFERENCES Petadoption(ADOPTION_CODE);

ALTER TABLE Pet
      ADD CONSTRAINT fk_Color_id FOREIGN KEY (Pet_Color_code) REFERENCES PetColor(PET_COLOR_CODE); 
      
ALTER TABLE Pet
      ADD CONSTRAINT fk_Sickness_id FOREIGN KEY (Pet_Sickness_code) REFERENCES PetSickness(Pet_Sickness_code); 
      
      ALTER TABLE Pet
      ADD CONSTRAINT fk_medicine_id FOREIGN KEY (Pet_medicine_code) REFERENCES PetMedicine(Pet_Med_code);
