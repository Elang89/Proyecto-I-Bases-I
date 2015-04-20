/*
Script to create a table of the relationship between the Sickness per pet 
By Miuyin Yong
*/

CREATE TABLE SicknessXPet
( 
       Pet_Code NUMBER(10),  /*Pets Primary key*/
       Sickness_Code NUMBER(10) /* Sickness Primary Key*/ 
       
); 
 
ALTER TABLE SicknessXPet
      ADD CONSTRAINT pk_SicknessXpet PRIMARY KEY (Pet_Code, Sickness_Code); 

ALTER TABLE SicknessXPet 
      ADD CONSTRAINT fk_SicknesXPET_Pet_Code FOREIGN KEY (Pet_code) REFERENCES pet(pet_code); 

ALTER TABLE SicknessXPet 
      ADD CONSTRAINT fk_SicknesXPET_Sickness_Code FOREIGN KEY (Sickness_Code) REFERENCES petsickness(pet_sickness_code);
