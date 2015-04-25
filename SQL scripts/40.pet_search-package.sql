CREATE OR REPLACE PACKAGE pet_search_package AS  
		FUNCTION find_myPets(user_id person.person_id%type)
       	RETURN SYS_REFCURSOR; 
END pet_search_package; 


CREATE OR REPLACE PACKAGE BODY pet_search_package AS 

       FUNCTION find_myPets(user_id person.person_id%type)
       RETURN SYS_REFCURSOR
       IS 
          my_pets SYS_REFCURSOR;
       BEGIN 
        OPEN my_pets FOR select pet_type_name, pet_race_name, pet_cond_name, pet_energy_level, pet_learn_skill, vet_name, person_name, petlocation, petnotes, petabandondescription, pet_space, pet_treatment, pet_color, pet_sickness_name, pet_med_name
		from pet, pettype, petrace, petCondition, petSize,petEnergy, petlearningskill, veterinary, person, petSpace, pettreatments, petcolor, petsickness, petmedicine
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
		AND pet.pet_medicine_code = petmedicine.pet_med_code;  
        RETURN my_pets; 

      EXCEPTION 
        WHEN NO_DATA_FOUND THEN 
          RETURN null;
      END;  

END pet_search_package; 


DECLARE 
	test_variable SYS_REFCURSOR;
BEGIN 
	test_variable := pet_search_package.find_myPets(2);
END;