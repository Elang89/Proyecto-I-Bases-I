/* Made by Miuyin Yong Wong 11/4/2015 */  
/* PACKAGE FOR PETS*/
/* This package contains the procedure to insert a new pet  

/*------------------------------------------------------------------------------------------------------------*/
/*SEQUENCES */

CREATE SEQUENCE pet_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	

 CREATE SEQUENCE Adopt_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	 

 CREATE SEQUENCE Return_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	



/* -----------------------------------------------PACKAGE FOR PETS----------------------------------*/

CREATE OR REPLACE PACKAGE pet_package AS

PROCEDURE CREATE_NEW_PET
  (pet_type in VARCHAR2, breed in VARCHAR2, color in VARCHAR2, pet_size_param in VARCHAR2, TrainningSkills in VARCHAR2, vet in VARCHAR2, treatment in VARCHAR2,
    sickness in VARCHAR2, medicine in VARCHAR2, energy in VARCHAR2, space in VARCHAR2, pet_condition in VARCHAR2, petName in VARCHAR2, address in VARCHAR2,
    reasonAbandoned in VARCHAR2, notes in VARCHAR2, username in NUMBER);

END pet_package;



/* ------------------------------------------------PACKAGE BODY FOR PETS ----------------------------*/

CREATE OR REPLACE PACKAGE BODY pet_package AS

PROCEDURE CREATE_NEW_PET
  (pet_type in VARCHAR2, breed in VARCHAR2, color in VARCHAR2, pet_size_param in VARCHAR2, TrainningSkills in VARCHAR2, vet in VARCHAR2, treatment in VARCHAR2,
    sickness in VARCHAR2, medicine in VARCHAR2, energy in VARCHAR2, space in VARCHAR2, pet_condition in VARCHAR2, petName in VARCHAR2, address in VARCHAR2,
    reasonAbandoned in VARCHAR2, notes in VARCHAR2, username in NUMBER) IS

    type_id NUMBER;
    breed_id NUMBER;
    color_id NUMBER;
    size_id NUMBER;
    TS_id NUMBER;
    vet_id NUMBER;
    treatment_id NUMBER;
    sickness_id NUMBER;
    medicine_id NUMBER;
    energy_id NUMBER;
    space_id NUMBER;
    condition_id NUMBER;

  BEGIN
     select TP.pet_type_code into type_id
     from dbadmin.petType TP
     where TP.pet_type_name = pet_type;

     select B.pet_race_code into breed_id
     from dbadmin.petRace B
     where B.pet_race_name = breed;

    select PC.pet_color_code into color_id
    from dbadmin.PetColor PC
    where PC.pet_color = color;

    select PS.pet_size_code into size_id
    from dbadmin.PetSize PS
    where PS.pet_size = pet_size_param;

    select LS.pet_learn_code into TS_id
    from dbadmin.petlearningskill LS
    where LS.pet_learn_skill = TrainningSkills;

    select VT.vet_code into vet_id
     from dbadmin.veterinary VT
     where VT.vet_name = vet;

    select TM.pet_treatment_code into treatment_id
     from dbadmin.pettreatments TM
     where TM.pet_treatment = treatment;

     select SK.pet_sickness_code into sickness_id
     from dbadmin.petsickness SK
     where SK.pet_sickness_name = sickness;

    select MD.pet_med_code into medicine_id
    from dbadmin.Petmedicine MD
    where MD.pet_med_name = medicine;

     select EN.pet_energy_code into energy_id
     from dbadmin.petEnergy EN
     where EN.pet_energy_level = energy;

     select SP.pet_space_code into space_id
     from dbadmin.petSpace SP
     where SP.pet_space = space;

     SELECT PC.pet_cond_code into condition_id
     FROM dbadmin.petCondition PC
     WHERE PC.pet_Cond_name = pet_condition;


    INSERT INTO PET(PET_NAME, PET_CODE, PET_TYPE_CODE, PET_RACE_CODE, PET_COND_CODE, PET_SIZE_CODE, PET_ENERGY_CODE, PET_LEARN_CODE, VET_CODE, OWNER_ID, PETLOCATION, PETNOTES, PETABANDONDESCRIPTION, PETSPACE_ID, PETTREATMENTS_ID)
    VALUES(petName, pet_id_generator.nextval, type_id, breed_id, condition_id, size_id, energy_id, TS_id, vet_id, username, address, notes, reasonAbandoned, space_id, treatment_id);

    INSERT INTO COLORSXPET(pet_code_fk, color_code_fk)
    VALUES(pet_id_generator.currval, color_id);

    INSERT INTO SICKNESSXPET(PET_CODE, SICKNESS_CODE)
    VALUES(pet_id_generator.currval, sickness_id);

    INSERT INTO MEDICINESXPET(PET_CODE_FK, MEDICINE_CODE_FK)
    VALUES(pet_id_generator.currval, medicine_id);

    COMMIT;
  END CREATE_NEW_PET;
END pet_package;