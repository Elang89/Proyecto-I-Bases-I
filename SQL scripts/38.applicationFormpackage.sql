/* Made by Miuyin Yong Wong 23/4/2015 */  
/* PACKAGE FOR PETS*/
/* This package contains the procedure to insert, delete and edit quetions from the application  

/*------------------------------------------------------------------------------------------------------------*/
CREATE OR REPLACE PACKAGE applications_package AS
       PROCEDURE evaluate_application
         (p_application_id petadoption.adoption_code%type,
          p_adoptant_id pet.adoptant_id%type,
          p_pet_id pet.pet_code%type,
          p_approval_state NUMBER);
       PROCEDURE create_application
         (p_owner_id petadoption.owner_id%type);
       PROCEDURE create_question_group
         (p_question1 IN VARCHAR2,
          p_question2 IN VARCHAR2,
          p_question3 IN VARCHAR2,
          p_question4 IN VARCHAR2,
          p_question5 IN VARCHAR2);
       PROCEDURE create_answer_group
         (p_id answer_group.person_id%type,
          p_question_group answer_group.question_group_id%type,
          p_answer1 IN VARCHAR2,
          p_answer2 IN VARCHAR2,
          p_answer3 IN VARCHAR2,
          p_answer4 IN VARCHAR2,
          p_answer5 IN VARCHAR2);
       FUNCTION check_adoption_form_submission(p_id answer_group.person_id%type)
       RETURN NUMBER;
       FUNCTION retrieve_question_group(p_pet_code petadoption.pet_id%type)
       RETURN SYS_REFCURSOR;
       FUNCTION retrieve_application(p_owner_id petadoption.owner_id%type)
       RETURN SYS_REFCURSOR;
END applications_package;


CREATE OR REPLACE PACKAGE BODY applications_package AS
       PROCEDURE evaluate_application
          (p_application_id petadoption.adoption_code%type,
           p_adoptant_id pet.adoptant_id%type,
           p_pet_id pet.pet_code%type,
           p_approval_state NUMBER)
       IS
       BEGIN
          UPDATE petadoption
          SET acceptance_state = p_approval_state
          WHERE p_application_id = adoption_code;

          IF p_approval_state = 1 THEN
            UPDATE pet
            SET adoptant_id = p_adoptant_id
            WHERE p_pet_id = pet_code;
          END IF;
       END;

       PROCEDURE create_application
         (p_owner_id petadoption.owner_id%type)
       IS
       BEGIN
         INSERT INTO petadoption (adoption_code,owner_id,pet_id)
         VALUES (adoption_form_id_generator.nextval, p_owner_id, pet_id_generator.currval);
       END;

      PROCEDURE create_question_group
         (p_question1 IN VARCHAR2,
          p_question2 IN VARCHAR2,
          p_question3 IN VARCHAR2,
          p_question4 IN VARCHAR2,
          p_question5 IN VARCHAR2)
      IS
      BEGIN
        INSERT INTO question_group(question_group_id,adoption_form_id,question_1,question_2,question_3,question_4,question_5)
        VALUES(question_group_id_generator.nextval, adoption_form_id_generator.currval,p_question1,p_question2,p_question3,p_question4,p_question5);
      END;

     PROCEDURE create_answer_group
         (p_id answer_group.person_id%type,
          p_question_group answer_group.question_group_id%type,
          p_answer1 IN VARCHAR2,
          p_answer2 IN VARCHAR2,
          p_answer3 IN VARCHAR2,
          p_answer4 IN VARCHAR2,
          p_answer5 IN VARCHAR2)
    IS
    BEGIN
       INSERT INTO answer_group(question_group_id,answer_group_id,answer_1,answer_2,answer_3,answer_4,answer_5,person_id)
       VALUES(p_question_group,answer_group_id_generator.nextval,p_answer1,p_answer2,p_answer3,p_answer4,p_answer5,p_id);
    END;
    
     FUNCTION retrieve_question_group(p_pet_code petadoption.pet_id%type)
     RETURN SYS_REFCURSOR
     IS 
        q_list SYS_REFCURSOR;
     BEGIN 
       OPEN q_list FOR SELECT question_group_id,question_1,question_2,question_3,question_4,question_5
       FROM petadoption, question_group 
       WHERE pet_id = p_pet_code 
       AND petadoption.adoption_code = question_group.adoption_form_id;
       RETURN q_list;
     EXCEPTION 
       WHEN NO_DATA_FOUND THEN
         RETURN null;
     END;
     
     FUNCTION check_adoption_form_submission(p_id answer_group.person_id%type)
     RETURN NUMBER
     IS 
       a_result NUMBER;
     BEGIN 
       SELECT COUNT(*) INTO a_result 
       FROM answer_group
       WHERE p_id = person_id;
       RETURN a_result;
     EXCEPTION 
       WHEN NO_DATA_FOUND THEN
         RETURN 0;
     END;
     
     FUNCTION retrieve_application(p_owner_id petadoption.owner_id%type)
     RETURN SYS_REFCURSOR
     IS
       c_application SYS_REFCURSOR;
     BEGIN
       OPEN c_application FOR SELECT adoption_code, username,pet_id,answer_group.person_id,question_1,question_2,question_3,question_4,question_5,answer_1,answer_2,answer_3,answer_4,answer_5
       FROM petadoption,question_group,answer_group,pet,person
       WHERE petadoption.owner_id = p_owner_id
       AND pet.pet_code = petadoption.pet_id 
       AND petadoption.adoption_code = question_group.adoption_form_id
       AND answer_group.person_id = person.person_id
       AND answer_group.question_group_id = question_group.question_group_id
       AND petadoption.acceptance_state IS NULL
       RETURN c_application;
     EXCEPTION 
       WHEN NO_DATA_FOUND THEN
         RETURN null;
     END;      
END applications_package;