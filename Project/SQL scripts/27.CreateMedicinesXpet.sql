/*
Script to create a table of the relationship between the medicines per pet 
By Miuyin Yong
*/

CREATE TABLE MedicinesXPet
( 
       Pet_Code_FK NUMBER(10),  /*Pets Primary key*/
       Medicine_Code_FK NUMBER(10) /* Medicines Primary Key*/ 
       
); 
 
ALTER TABLE MedicinesXPet
      ADD CONSTRAINT MedicinesXPet_pk PRIMARY KEY (Pet_Code_FK, Medicine_Code_FK); 

ALTER TABLE MedicinesXPet 
      ADD CONSTRAINT fk_Pet_Code FOREIGN KEY (Pet_code_FK) REFERENCES pet(pet_code); 

ALTER TABLE MedicinesXPet 
      ADD CONSTRAINT fk_Medicine_Code FOREIGN KEY (Medicine_Code_FK) REFERENCES petmedicine(pet_med_code);
