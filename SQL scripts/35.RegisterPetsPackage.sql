/* Made by Miuyin Yong Wong 11/4/2015 */  
/* PACKAGE FOR PETS*/
/* This package contains the procedure to insert, adopt and return pet  

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

PROCEDURE ADOPT_APPLICATION_PET 
  (adoptant_id in NUMBER, A_pet_id in NUMBER, first_answer in VARCHAR2, second_answer in VARCHAR2, third_answer in VARCHAR2, fourth_answer in VARCHAR2, fifth_answer in VARCHAR2, sixth_answer in VARCHAR2, seventh_answer in VARCHAR2);  


PROCEDURE ACEPT_ADOPTION 
  (P_adoption_id in NUMBER);   


PROCEDURE RETURN_PET 
  (adoption_id in NUMBER);  

PROCEDURE EDIT_PET
  (pet_id in NUMBER, pet_type in VARCHAR2, breed in VARCHAR2, color in VARCHAR2, pet_size_param in VARCHAR2, TrainningSkills in VARCHAR2, vet in VARCHAR2, treatment in VARCHAR2,
    sickness in VARCHAR2, medicine in VARCHAR2, energy in VARCHAR2, space in VARCHAR2, pet_condition in VARCHAR2, petName in VARCHAR2, address in VARCHAR2,
    reasonAbandoned in VARCHAR2, notes in VARCHAR2); 
  
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


    INSERT INTO PET(PET_NAME, PET_CODE, PET_TYPE_CODE, PET_RACE_CODE, PET_COND_CODE, PET_SIZE_CODE, PET_ENERGY_CODE, PET_LEARN_CODE, VET_CODE, OWNER_ID, PETLOCATION, PETNOTES, PETABANDONDESCRIPTION, PETSPACE_ID, PETTREATMENTS_ID, PET_COLOR_CODE, PET_SICKNESS_CODE, PET_MEDICINE_CODE)
    VALUES(petName, pet_id_generator.nextval, type_id, breed_id, condition_id, size_id, energy_id, TS_id, vet_id, username, address, notes, reasonAbandoned, space_id, treatment_id, color_id, sickness_id, medicine_id);
    
    COMMIT;

END CREATE_NEW_PET;

PROCEDURE ADOPT_APPLICATION_PET 
  (adoptant_id in NUMBER, A_pet_id in NUMBER, first_answer in VARCHAR2, second_answer in VARCHAR2, third_answer in VARCHAR2, fourth_answer in VARCHAR2, fifth_answer in VARCHAR2, sixth_answer in VARCHAR2, seventh_answer in VARCHAR2) IS  

  giving_adoption_id NUMBER; 

  BEGIN   

    SELECT PP.OWNER_ID into giving_adoption_id
    FROM dbadmin.PET PP  
    WHERE PP.pet_code = A_pet_id; 

    INSERT INTO PETADOPTION(adoption_code, adoption_date, pet_id, giving_for_adoption, adoptant, acceptance_state) 
      VALUES(Adopt_id_generator.nextval, sysdate, A_pet_id, giving_adoption_id, adoptant_id, 0); 

    INSERT INTO answersxapplication(questionid, adoptionid, answer) 
      VALUES(0, Adopt_id_generator.currval, first_answer);

    INSERT INTO answersxapplication(questionid, adoptionid, answer) 
      VALUES(4, Adopt_id_generator.currval, second_answer); 

    INSERT INTO answersxapplication(questionid, adoptionid, answer) 
      VALUES(5, Adopt_id_generator.currval, third_answer); 

    INSERT INTO answersxapplication(questionid, adoptionid, answer)
      VALUES(6, Adopt_id_generator.currval, fourth_answer); 

    INSERT INTO answersxapplication(questionid, adoptionid, answer) 
      VALUES(7, Adopt_id_generator.currval, fifth_answer); 

    INSERT INTO answersxapplication(questionid, adoptionid, answer) 
      VALUES(9, Adopt_id_generator.currval, sixth_answer); 

    INSERT INTO answersxapplication(questionid, adoptionid, answer) 
      VALUES(10, Adopt_id_generator.currval, seventh_answer); 

    COMMIT;  

END ADOPT_APPLICATION_PET;  


PROCEDURE ACEPT_ADOPTION 
  (P_adoption_id in NUMBER) IS 

  p_pet_id NUMBER;  
  newAdoptant_id NUMBER;

  BEGIN  
      select PA.pet_id into p_pet_id
      FROM dbadmin.PETADOPTION PA
      WHERE PA.adoption_code = P_adoption_id; 

      select PA.adoptant into newAdoptant_id
      FROM dbadmin.PETADOPTION PA
      WHERE PA.adoption_code = P_adoption_id;

      UPDATE PET
      SET ADOPTION_ID = P_adoption_id
      WHERE PET_CODE = p_pet_id;    

      UPDATE PET
      SET OWNER_ID = newAdoptant_id
      WHERE PET_CODE = p_pet_id; 

      UPDATE PETADOPTION
      SET acceptance_state = 1 
      WHERE ADOPTION_CODE = P_adoption_id;  

    COMMIT;  

END ACEPT_ADOPTION;  


PROCEDURE RETURN_PET 
  (adoption_id in NUMBER) IS 

  r_pet_id NUMBER;  
  oldOwner_id NUMBER;  

  BEGIN 
      select PA.pet_id into r_pet_id
      FROM dbadmin.PETADOPTION PA
      WHERE PA.adoption_code = adoption_id;  

      select PA.giving_for_adoption into oldOwner_id
      FROM dbadmin.PETADOPTION PA
      WHERE PA.adoption_code = adoption_id; 

      UPDATE PETADOPTION
      SET acceptance_state = 0
      WHERE ADOPTION_CODE = adoption_id;   

      UPDATE PET
      SET OWNER_ID = oldOwner_id
      WHERE PET_CODE = r_pet_id;  

      UPDATE PET
      SET ADOPTION_ID = null
      WHERE PET_CODE = r_pet_id;   


END RETURN_PET;   

PROCEDURE EDIT_PET
  (pet_id in NUMBER, pet_type in VARCHAR2, breed in VARCHAR2, color in VARCHAR2, pet_size_param in VARCHAR2, TrainningSkills in VARCHAR2, vet in VARCHAR2, treatment in VARCHAR2,
    sickness in VARCHAR2, medicine in VARCHAR2, energy in VARCHAR2, space in VARCHAR2, pet_condition in VARCHAR2, petName in VARCHAR2, address in VARCHAR2,
    reasonAbandoned in VARCHAR2, notes in VARCHAR2) IS 

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


      UPDATE PET
      SET PET_NAME = petName, 
          PET_TYPE_CODE = type_id, 
          PET_RACE_CODE = breed_id, 
          PET_COND_CODE = condition_id, 
          PET_SIZE_CODE = size_id, 
          PET_ENERGY_CODE = energy_id, 
          PET_LEARN_CODE = TS_id, 
          VET_CODE = vet_id,  
          PETLOCATION = address, 
          PETNOTES = notes, 
          PETABANDONDESCRIPTION = reasonAbandoned, 
          PETSPACE_ID = space_id,
          PETTREATMENTS_ID = treatment_id,
          PET_COLOR_CODE = color_id, 
          PET_SICKNESS_CODE = sickness_id,
          PET_MEDICINE_CODE = medicine_id
      WHERE PET_CODE = pet_id;  
    
    COMMIT;

END EDIT_PET;

END pet_package;


