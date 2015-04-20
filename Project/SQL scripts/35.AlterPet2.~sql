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

ALTER TABLE Pet
      ADD CONSTRAINT fk_pet_Space_code FOREIGN KEY (PetSpace_ID) REFERENCES PetSpace(pet_space_code); 
      
ALTER TABLE Pet
      ADD CONSTRAINT fk_pet_Treatment_code FOREIGN KEY (PetTreatments_ID) REFERENCES petTreatments(pet_treatment_code);
