/* Made by Miuyin Yong Wong 11/4/2015 */  
/* PACKAGE FOR PETS*/
/* This package contains the procedure to do all the inserts, edits and deletes an administrator can do to the categories 

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
  (name in VARCHAR2);

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
/* ------------------------Edits-------------------*/  
PROCEDURE EDIT_MEDICINE
  (name in VARCHAR2, id in NUMBER);

PROCEDURE EDIT_CONDITION
  (name in VARCHAR2, id in NUMBER);

PROCEDURE EDIT_VET
  (name in VARCHAR2, id in NUMBER);

PROCEDURE EDIT_SIZE
  (name in VARCHAR2, id in NUMBER);

PROCEDURE EDIT_LEARNING_SKILL
  (name in VARCHAR2, id in NUMBER);

PROCEDURE EDIT_COLOR
  (name in VARCHAR2, id in NUMBER);

PROCEDURE EDIT_Type
  (name in VARCHAR2, id in NUMBER);

PROCEDURE EDIT_BREED
  (name in VARCHAR2, id in NUMBER);

PROCEDURE EDIT_ENERGY
  (name in VARCHAR2, id in NUMBER);

PROCEDURE EDIT_Sickness
  (name in VARCHAR2, id in NUMBER); 
  
PROCEDURE EDIT_Treatment 
  (name in VARCHAR2, id in NUMBER); 

PROCEDURE EDIT_Space 
  (name in VARCHAR2, id in NUMBER);  
/* ------------------------DELETES-------------------*/   

PROCEDURE DELETE_MEDICINE
  (id in NUMBER);

PROCEDURE DELETE_CONDITION
  (id in NUMBER);

PROCEDURE DELETE_VET
  (id in NUMBER);

PROCEDURE DELETE_SIZE
  (id in NUMBER);

PROCEDURE DELETE_LEARNING_SKILL
  (id in NUMBER);

PROCEDURE DELETE_COLOR
  (id in NUMBER);

PROCEDURE DELETE_Type
  (id in NUMBER);

PROCEDURE DELETE_BREED
  (id in NUMBER);

PROCEDURE DELETE_ENERGY
  (id in NUMBER);

PROCEDURE DELETE_Sickness
  (id in NUMBER); 
  
PROCEDURE DELETE_Treatment 
  (id in NUMBER); 

PROCEDURE DELETE_Space 
  (id in NUMBER);  

END setting_package;

/* ------------------------------------------------PACKAGE BODY FOR SETTINGS ----------------------------*/

 
CREATE OR REPLACE PACKAGE BODY setting_package AS 

/* ------------------------INSERTS-------------------*/ 
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
  (name in VARCHAR2) IS

    BEGIN
      INSERT INTO VETERINARY(Vet_Name, Vet_Code)
        VALUES(name, vet_id_generator.nextval);
  COMMIT;

END SET_VET;


PROCEDURE SET_SIZE
  (name in VARCHAR2) IS
    BEGIN
      INSERT INTO PETSIZE(PET_SIZE, PET_SIZE_CODE)
        VALUES(name, size_id_generator.nextval);
  COMMIT;

END SET_SIZE;

PROCEDURE SET_LEARNING_SKILL
  (name in VARCHAR2) IS
    BEGIN
      INSERT INTO Petlearningskill(Pet_Learn_Skill, Pet_Learn_Code)
        VALUES(name, LS_id_generator.nextval);

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
        VALUES(name, Breed_id_generator.nextval,type_id);

      COMMIT;

END SET_BREED;

PROCEDURE SET_ENERGY
  (name in VARCHAR2) IS
    BEGIN
      INSERT INTO PetEnergy(Pet_Energy_Level, Pet_Energy_Code)
        VALUES(name, Energy_id_generator.nextval);

  COMMIT;

END SET_ENERGY;

PROCEDURE SET_Sickness
  (name in VARCHAR2)IS
    BEGIN
      INSERT INTO Petsickness(Pet_Sickness_Name, Pet_Sickness_Code)
        VALUES(name, Sickness_id_generator.nextval);

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

/* ------------------------EDITS-------------------*/ 

PROCEDURE EDIT_MEDICINE
  (name in VARCHAR2, id in NUMBER) IS

    BEGIN
      UPDATE PETMEDICINE
      SET pet_med_name = name
      WHERE pet_med_code = id;

  COMMIT;

END EDIT_MEDICINE;

PROCEDURE EDIT_CONDITION
  (name in VARCHAR2, id in NUMBER) IS

     BEGIN
      UPDATE PETCONDITION
      SET PET_COND_NAME = name
      WHERE PET_COND_CODE = id; 

  COMMIT;

END EDIT_CONDITION;

PROCEDURE EDIT_VET
  (name in VARCHAR2, id in NUMBER) IS

    BEGIN
      UPDATE VETERINARY
      SET Vet_Name = name
      WHERE Vet_Code = id;  

  COMMIT;

END EDIT_VET;


PROCEDURE EDIT_SIZE
  (name in VARCHAR2, id in NUMBER) IS 

    BEGIN
      UPDATE PETSIZE
      SET PET_SIZE = name
      WHERE PET_SIZE_CODE = id;  

  COMMIT;

END EDIT_SIZE;

PROCEDURE EDIT_LEARNING_SKILL
  (name in VARCHAR2, id in NUMBER) IS

    BEGIN
      UPDATE Petlearningskill
      SET Pet_Learn_Skill = name
      WHERE Pet_Learn_Code = id;  

  COMMIT;

END EDIT_LEARNING_SKILL;


PROCEDURE EDIT_COLOR
  (name in VARCHAR2, id in NUMBER) IS 

    BEGIN
      UPDATE Petcolor
      SET Pet_Color = name
      WHERE Pet_Color_Code = id;  

  COMMIT;

END EDIT_COLOR;


PROCEDURE EDIT_Type
  (name in VARCHAR2, id in NUMBER) IS 

    BEGIN
      UPDATE Pettype
      SET Pet_Type_Name = name
      WHERE Pet_Type_Code = id;  

  COMMIT;

END EDIT_Type;


PROCEDURE EDIT_BREED
  (name in VARCHAR2, id in NUMBER) IS

  BEGIN
      UPDATE PETRACE
      SET PET_RACE_NAME = name
      WHERE PET_RACE_CODE = id;  

      COMMIT;

END EDIT_BREED;

PROCEDURE EDIT_ENERGY
  (name in VARCHAR2, id in NUMBER) IS 

    BEGIN
      UPDATE PetEnergy
      SET Pet_Energy_Level = name
      WHERE Pet_Energy_Code = id;  

  COMMIT;

END EDIT_ENERGY;

PROCEDURE EDIT_Sickness
  (name in VARCHAR2, id in NUMBER)IS 

    BEGIN
      UPDATE Petsickness
      SET Pet_Sickness_Name = name
      WHERE Pet_Sickness_Code = id;  

  COMMIT;

END EDIT_Sickness; 

PROCEDURE EDIT_Treatment 
  (name in VARCHAR2, id in NUMBER) IS  

    BEGIN 
      UPDATE PETTREATMENTS
      SET PET_TREATMENT = name
      WHERE PET_TREATMENT_CODE = id;  

  COMMIT; 

END EDIT_Treatment;
  
PROCEDURE EDIT_Space 
  (name in VARCHAR2, id in NUMBER) IS  

    BEGIN 
      UPDATE PETSPACE
      SET PET_SPACE = name
      WHERE PET_SPACE_CODE = id;  
  COMMIT;  
END EDIT_Space;   

/* ------------------------DELETES-------------------*/  

PROCEDURE DELETE_MEDICINE
  (id in NUMBER) IS

    BEGIN
      DELETE FROM PETMEDICINE
      WHERE pet_med_code = id;

  COMMIT;

END DELETE_MEDICINE;

PROCEDURE DELETE_CONDITION
  (id in NUMBER) IS
    BEGIN
      DELETE FROM PETCONDITION
      WHERE PET_COND_CODE = id;
  COMMIT;

END DELETE_CONDITION;

PROCEDURE DELETE_VET
  (id in NUMBER) IS
    BEGIN
      DELETE FROM VETERINARY
      WHERE Vet_Code = id;
  COMMIT;

END DELETE_VET;


PROCEDURE DELETE_SIZE
  (id in NUMBER) IS
    BEGIN
      DELETE FROM PETSIZE
      WHERE PET_SIZE_CODE = id;
  COMMIT;

END DELETE_SIZE;

PROCEDURE DELETE_LEARNING_SKILL
  (id in NUMBER) IS
    BEGIN
      DELETE FROM Petlearningskill
      WHERE Pet_Learn_Code = id;

  COMMIT;

END DELETE_LEARNING_SKILL;


PROCEDURE DELETE_COLOR
  (id in NUMBER) IS
    BEGIN
      DELETE FROM Petcolor
      WHERE Pet_Color_Code = id;
  COMMIT;

END DELETE_COLOR;


PROCEDURE DELETE_Type
  (id in NUMBER) IS
    BEGIN 
      DELETE FROM Pettype
      WHERE Pet_Type_Code = id;

  COMMIT;

END DELETE_Type;


PROCEDURE DELETE_BREED
  (id in NUMBER) IS
  BEGIN
      DELETE FROM PETRACE
      WHERE PET_RACE_CODE = id;

      COMMIT;

END DELETE_BREED;

PROCEDURE DELETE_ENERGY
  (id in NUMBER) IS
    BEGIN
        DELETE FROM PetEnergy
        WHERE Pet_Energy_Code = id;

  COMMIT;

END DELETE_ENERGY;

PROCEDURE DELETE_Sickness
  (id in NUMBER)IS
    BEGIN
        DELETE FROM Petsickness
        WHERE Pet_Sickness_Code = id;

  COMMIT;

END DELETE_Sickness; 

PROCEDURE DELETE_Treatment 
  (id in NUMBER) IS 
    BEGIN  
        DELETE FROM PETTREATMENTS
        WHERE PET_TREATMENT_CODE = id;

  COMMIT; 

END DELETE_Treatment;
  
PROCEDURE DELETE_Space 
  (id in NUMBER) IS 
    BEGIN 
        DELETE FROM PETSPACE
        WHERE PET_SPACE_CODE = id; 
  COMMIT;  
END DELETE_Space;  
END setting_package;






