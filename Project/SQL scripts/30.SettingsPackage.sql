/* Made by Miuyin Yong Wong 11/4/2015 */  
/* PACKAGE FOR PETS*/
/* This package contains the procedure to do all the inserts an administrator can do 

/*------------------------------------------------------------------------------------------------------------*/
/*SEQUENCES*/

CREATE SEQUENCE medicine_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	  

 CREATE SEQUENCE condition_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	 

CREATE SEQUENCE vet_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE; 

 CREATE SEQUENCE size_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	 	  

  CREATE SEQUENCE LS_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE; 

  CREATE SEQUENCE Color_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	 

  CREATE SEQUENCE Type_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	  	

  CREATE SEQUENCE Breed_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	   

  CREATE SEQUENCE Energy_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	  

  CREATE SEQUENCE Sickness_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	  

  CREATE SEQUENCE Treatment_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;  

  CREATE SEQUENCE Space_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;   
/* -----------------------------------------------DECLARACION PACKAGE FOR SETTINGS----------------------------------*/

CREATE OR REPLACE PACKAGE setting_package AS 

PROCEDURE SET_MEDICINE 
	(name in VARCHAR2); 

PROCEDURE SET_CONDITION 
	(name in VARCHAR2);

PROCEDURE SET_VET 
	(name in VARCHAR2, telephone in VARCHAR2);

PROCEDURE SET_SIZE 
	(name in VARCHAR2);

PROCEDURE SET_LEARNING_SKILL 
	(name in VARCHAR2); 

PROCEDURE SET_COLOR 
	(name in VARCHAR2);  

PROCEDURE SET_Type 
	(name in VARCHAR2);

PROCEDURE SET_BREED 
	(name in VARCHAR2, type in VARCHAR2); 

PROCEDURE SET_ENERGY 
	(name in VARCHAR2);

PROCEDURE SET_Sickness 
	(name in VARCHAR2); 

PROCEDURE SET_Treatment 
  (name in VARCHAR2); 

PROCEDURE SET_Space 
  (name in VARCHAR2);  

END setting_package;

/* ------------------------------------------------PACKAGE BODY FOR SETTINGS ----------------------------*/

CREATE OR REPLACE PACKAGE BODY setting_package AS   

PROCEDURE SET_MEDICINE 
	(name in VARCHAR2) IS

		BEGIN 
			INSERT INTO PETMEDICINE(pet_med_name, pet_med_code) 
				VALUES(name, medicine_id_generator.nextval);  
	COMMIT; 

END SET_MEDICINE;

PROCEDURE SET_CONDITION 
	(name in VARCHAR2) IS

	 	BEGIN 
			INSERT INTO PETCONDITION(PET_COND_NAME, PET_COND_CODE)
				VALUES(name, condition_id_generator.nextval); 
	COMMIT; 

END SET_CONDITION; 

PROCEDURE SET_VET 
	(name in VARCHAR2, telephone in VARCHAR2) IS

		BEGIN 
			INSERT INTO VETERINARY(Vet_Name, Vet_Code, Vet_Phone_Number)
				VALUES(name, vet_id_generator.nextval, telephone); 
	COMMIT; 

END SET_VET;


PROCEDURE SET_SIZE 
	(name in VARCHAR2)  IS
		BEGIN 
			INSERT INTO PETSIZE(PET_SIZE, PET_SIZE_CODE) 
				VALUES(name, size_id_generator.nextval); 
	COMMIT;  

END SET_SIZE;

PROCEDURE SET_LEARNING_SKILL 
	(name in VARCHAR2)  IS
		BEGIN 
			INSERT INTO Petlearningskill(Pet_Learn_Skill, Pet_Learn_Code) 
				VALUES(NAME, LS_id_generator.nextval); 
	
	COMMIT;  

END SET_LEARNING_SKILL; 


PROCEDURE SET_COLOR 
	(name in VARCHAR2) IS  
		BEGIN 
			INSERT INTO Petcolor(Pet_Color, Pet_Color_Code) 
				VALUES(name, Color_id_generator.nextval); 
	COMMIT; 

END SET_COLOR; 


PROCEDURE SET_Type 
	(name in VARCHAR2) IS 
		BEGIN 
			INSERT INTO Pettype(Pet_Type_Name, Pet_Type_Code) 
				values(name, Type_id_generator.nextval); 
	
	COMMIT; 

END SET_Type; 


PROCEDURE SET_BREED 
	(name in VARCHAR2, type in VARCHAR2) IS

  type_id NUMBER;

  BEGIN  
      SELECT PT.Pet_Type_Code INTO type_id
      FROM dbadmin.Pettype PT
      WHERE PT.Pet_Type_Name = type; 

      INSERT INTO PETRACE(PET_RACE_NAME, PET_RACE_CODE, PET_TYPE) 
        VALUES(name, Breed_id_generator.nextval,type_id)  

      COMMIT;

END SET_BREED;

PROCEDURE SET_ENERGY 
	(name in VARCHAR2)  IS
		BEGIN 
			INSERT INTO PetEnergy(Pet_Energy_Level, Pet_Energy_Code)
				VALUES(name, Energy_id_generator.nextval); 

	COMMIT; 

END SET_ENERGY; 

PROCEDURE SET_Sickness 
	(name in VARCHAR2) IS
		BEGIN 
			INSERT INTO Petsickness(Pet_Sickness_Name, Pet_Sickness_Code) 
				VALUES(name,  Sickness_id_generator.nextval); 
	
	COMMIT; 

END SET_Sickness; 

PROCEDURE SET_Treatment 
  (name in VARCHAR2) IS 
    BEGIN 
      INSERT INTO PETTREATMENTS(PET_TREATMENT, PET_TREATMENT_CODE)
        VALUES(name, Treatment_id_generator.nextval);  

  COMMIT; 

END SET_Treatment;
  
PROCEDURE SET_Space 
  (name in VARCHAR2) IS
    BEGIN 
      INSERT INTO PETSPACE(PET_SPACE, PET_SPACE_CODE)
        VALUES(name, Space_id_generator.nextval); 
  COMMIT;  

END SET_Space;
END setting_package  







