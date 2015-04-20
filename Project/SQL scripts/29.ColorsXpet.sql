/*
Script to create a table of the relationship between the colors and pets
By Miuyin Yong
*/

CREATE TABLE ColorsXPet
( 
       Pet_Code_FK NUMBER(10),  /*Pets Primary key*/
       Color_Code_FK NUMBER(10) /* Color Primary Key*/ 
       
); 
 
ALTER TABLE ColorsXPet
      ADD CONSTRAINT ColorsXPet_pk PRIMARY KEY (Pet_Code_FK, Color_Code_FK); 

ALTER TABLE ColorsXPet 
      ADD CONSTRAINT fk_CPet_Code FOREIGN KEY (Pet_code_FK) REFERENCES pet(pet_code); 

ALTER TABLE ColorsXPet 
      ADD CONSTRAINT fk_Color_Code FOREIGN KEY (Color_Code_FK) REFERENCES PetColor(pet_color_code);

