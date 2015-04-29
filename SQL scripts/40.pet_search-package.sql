CREATE OR REPLACE PACKAGE pet_search_package AS
    FUNCTION find_myPets(user_id person.person_id%type)
         RETURN SYS_REFCURSOR;  
    FUNCTION all_pets
       RETURN SYS_REFCURSOR;
    FUNCTION pet_detail(pet_id pet.pet_code%type)
         RETURN SYS_REFCURSOR; 
    FUNCTION pet_search(TYPE in VARCHAR2, BREED in VARCHAR2, COLOR in VARCHAR2, PETSIZE in VARCHAR2, TS in VARCHAR2, ENERGY in VARCHAR2, SPACE in VARCHAR2)
         RETURN SYS_REFCURSOR;
     FUNCTION find_myAdoptedPets(user_id person.person_id%type)
         RETURN SYS_REFCURSOR;  
END pet_search_package;

CREATE OR REPLACE PACKAGE BODY pet_search_package AS

       FUNCTION find_myPets(user_id person.person_id%type)
       RETURN SYS_REFCURSOR
       IS
          my_pets SYS_REFCURSOR;
       BEGIN
        OPEN my_pets FOR select pet.pet_code, pet_name, pet_type_name, pet_race_name, pet_cond_name, pet_energy_level, pet_learn_skill, vet_name, person_name, petlocation, petnotes, petabandondescription, pet_space, pet_treatment, pet_color, pet_sickness_name, pet_med_name, image
    from pet, pettype, petrace, petCondition, petSize,petEnergy, petlearningskill, veterinary, person, petSpace, pettreatments, petcolor, petsickness, petmedicine, pet_photo_storage
    where owner_id = user_id
    AND pettype.pet_type_code = pet.pet_type_code
    AND petrace.pet_race_code = pet.pet_race_code
    AND pet.pet_cond_code = petcondition.pet_cond_code
    AND pet.pet_size_code = petsize.pet_size_code
    AND pet.pet_energy_code = petEnergy.Pet_Energy_Code
    AND pet.pet_learn_code = petlearningskill.pet_learn_code
    AND pet.vet_code = veterinary.vet_code
    AND pet.owner_id = person.person_id
    AND pet.petspace_id = petSpace.Pet_Space_Code
    AND pet.pettreatments_id = pettreatments.pet_treatment_code
    AND pet.pet_color_code = petcolor.pet_color_code
    AND pet.pet_sickness_code = petsickness.pet_sickness_code
    AND pet.pet_medicine_code = petmedicine.pet_med_code
    AND pet.pet_code = pet_photo_storage.pet_code;
        RETURN my_pets;

      EXCEPTION
        WHEN NO_DATA_FOUND THEN
          RETURN null;
      END;  

       FUNCTION all_pets
       RETURN SYS_REFCURSOR
       IS
          allPets SYS_REFCURSOR;
       BEGIN
        OPEN allPets FOR select pet.pet_code,pet_name, pet_type_name, pet_race_name, pet_cond_name, pet_energy_level, pet_learn_skill, vet_name, person_name, petlocation, petnotes, petabandondescription, pet_space, pet_treatment, pet_color, pet_sickness_name, pet_med_name, image
    from pet, pettype, petrace, petCondition, petSize,petEnergy, petlearningskill, veterinary, person, petSpace, pettreatments, petcolor, petsickness, petmedicine, pet_photo_storage
    where pettype.pet_type_code = pet.pet_type_code
    AND petrace.pet_race_code = pet.pet_race_code
    AND pet.pet_cond_code = petcondition.pet_cond_code
    AND pet.pet_size_code = petsize.pet_size_code
    AND pet.pet_energy_code = petEnergy.Pet_Energy_Code
    AND pet.pet_learn_code = petlearningskill.pet_learn_code
    AND pet.vet_code = veterinary.vet_code
    AND pet.owner_id = person.person_id
    AND pet.petspace_id = petSpace.Pet_Space_Code
    AND pet.pettreatments_id = pettreatments.pet_treatment_code
    AND pet.pet_color_code = petcolor.pet_color_code
    AND pet.pet_sickness_code = petsickness.pet_sickness_code
    AND pet.pet_medicine_code = petmedicine.pet_med_code
    AND pet.pet_code = pet_photo_storage.pet_code;
        RETURN allPets;

      EXCEPTION
        WHEN NO_DATA_FOUND THEN
          RETURN null;
      END; 
      
      
       FUNCTION pet_detail(pet_id pet.pet_code%type)
       RETURN SYS_REFCURSOR
       IS 
          pet_detail SYS_REFCURSOR;
       BEGIN 
        OPEN pet_detail FOR select pet.pet_code,pet_name, pet_type_name, pet_race_name, pet_cond_name, pet_energy_level, pet_learn_skill, vet_name, person_name, petlocation, petnotes, petabandondescription, pet_space, pet_treatment, pet_color, pet_sickness_name, pet_med_name,image
    from pet, pettype, petrace, petCondition, petSize,petEnergy, petlearningskill, veterinary, person, petSpace, pettreatments, petcolor, petsickness, petmedicine, pet_photo_storage
    where pet.pet_code = pet_id 
    AND pettype.pet_type_code = pet.pet_type_code 
    AND petrace.pet_race_code = pet.pet_race_code 
    AND pet.pet_cond_code = petcondition.pet_cond_code 
    AND pet.pet_size_code = petsize.pet_size_code 
    AND pet.pet_energy_code = petEnergy.Pet_Energy_Code 
    AND pet.pet_learn_code = petlearningskill.pet_learn_code 
    AND pet.vet_code = veterinary.vet_code 
    AND pet.owner_id = person.person_id 
    AND pet.petspace_id = petSpace.Pet_Space_Code 
    AND pet.pettreatments_id = pettreatments.pet_treatment_code 
    AND pet.pet_color_code = petcolor.pet_color_code 
    AND pet.pet_sickness_code = petsickness.pet_sickness_code 
    AND pet.pet_medicine_code = petmedicine.pet_med_code;  
        RETURN pet_detail; 

      EXCEPTION 
        WHEN NO_DATA_FOUND THEN 
          RETURN null;
      END;   

       FUNCTION pet_search(TYPE in VARCHAR2, BREED in VARCHAR2, COLOR in VARCHAR2, PETSIZE in VARCHAR2, TS in VARCHAR2, ENERGY in VARCHAR2, SPACE in VARCHAR2)
       RETURN SYS_REFCURSOR
       IS 
          pet_search_result SYS_REFCURSOR; 
          type_id NUMBER;
          breed_id NUMBER;
          color_id NUMBER;
          size_id NUMBER;  
          TS_id NUMBER; 
          energy_id NUMBER; 
          space_id NUMBER;

       BEGIN  

       select TP.pet_type_code into type_id
       from dbadmin.petType TP
       where TP.pet_type_name = TYPE;

       select B.pet_race_code into breed_id
       from dbadmin.petRace B
       where B.pet_race_name = BREED;

      select PC.pet_color_code into color_id
      from dbadmin.PetColor PC
      where PC.pet_color = COLOR;

      select PS.pet_size_code into size_id
      from dbadmin.PetSize PS
      where PS.pet_size = PETSIZE;  

      select LS.pet_learn_code into TS_id
      from dbadmin.petlearningskill LS
      where LS.pet_learn_skill = TS;

      select EN.pet_energy_code into energy_id
       from dbadmin.petEnergy EN
       where EN.pet_energy_level = ENERGY;

       select SP.pet_space_code into space_id
       from dbadmin.petSpace SP
       where SP.pet_space = SPACE; 

      
      FUNCTION find_myAdoptedPets(user_id person.person_id%type)
       RETURN SYS_REFCURSOR
       IS
          my_pets SYS_REFCURSOR;
       BEGIN
        OPEN my_pets FOR select pet.pet_code, pet_name, pet_type_name, pet_race_name, pet_cond_name, pet_energy_level, pet_learn_skill, vet_name, person_name, petlocation, petnotes, petabandondescription, pet_space, pet_treatment, pet_color, pet_sickness_name, pet_med_name, image
        from pet, pettype, petrace, petCondition, petSize,petEnergy, petlearningskill, veterinary, person, petSpace, pettreatments, petcolor, petsickness, petmedicine, pet_photo_storage
        where adoptant_id = user_id
        AND pettype.pet_type_code = pet.pet_type_code
        AND petrace.pet_race_code = pet.pet_race_code
        AND pet.pet_cond_code = petcondition.pet_cond_code
        AND pet.pet_size_code = petsize.pet_size_code
        AND pet.pet_energy_code = petEnergy.Pet_Energy_Code
        AND pet.pet_learn_code = petlearningskill.pet_learn_code
        AND pet.vet_code = veterinary.vet_code
        AND pet.owner_id = person.person_id
        AND pet.petspace_id = petSpace.Pet_Space_Code
        AND pet.pettreatments_id = pettreatments.pet_treatment_code
        AND pet.pet_color_code = petcolor.pet_color_code
        AND pet.pet_sickness_code = petsickness.pet_sickness_code
        AND pet.pet_medicine_code = petmedicine.pet_med_code
        AND pet.pet_code = pet_photo_storage.pet_code;
        RETURN my_pets;
	   EXCEPTION
		WHEN NO_DATA_FOUND THEN 
			RETURN NULL;
       END;

END pet_search_package;