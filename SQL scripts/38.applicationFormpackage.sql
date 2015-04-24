/* Made by Miuyin Yong Wong 23/4/2015 */  
/* PACKAGE FOR PETS*/
/* This package contains the procedure to insert, delete and edit quetions from the application  

/*------------------------------------------------------------------------------------------------------------*/
/*SEQUENCES */
CREATE SEQUENCE question_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	

/* -----------------------------------------------PACKAGE FOR APPLICATION----------------------------------*/

CREATE OR REPLACE PACKAGE application_package AS

PROCEDURE CREATE_NEW_QUESTION
  (QUESTION IN VARCHAR2); 


PROCEDURE EDIT_QUESTION 
  (QUESTION_ID IN NUMBER, NEW_QUESTION IN VARCHAR2);  

PROCEDURE DELETE_QUESTION 
  (QUESTION_ID IN NUMBER); 

END application_package; 


/* -----------------------------------------------PACKAGE BODY FOR APPLICATION----------------------------------*/

CREATE OR REPLACE PACKAGE BODY application_package AS

PROCEDURE CREATE_NEW_QUESTION
  (QUESTION IN VARCHAR2) IS 
     BEGIN 
   		INSERT INTO APPLICATIONFORM(QUESTIONID, QUESTION) 
   			VALUES(question_id_generator.nextval, QUESTION);   
   	COMMIT; 
END CREATE_NEW_QUESTION; 


PROCEDURE EDIT_QUESTION 
  (QUESTION_ID IN NUMBER, NEW_QUESTION IN VARCHAR2) IS 
  	 BEGIN 
  	 	UPDATE APPLICATIONFORM
      	SET QUESTION = NEW_QUESTION
      	WHERE QUESTIONID = QUESTION_ID;  
  	 COMMIT;  
END EDIT_QUESTION;  


PROCEDURE DELETE_QUESTION 
  (QUESTION_ID IN NUMBER) IS 
      BEGIN 
        DELETE FROM APPLICATIONFORM
        WHERE QUESTIONID = QUESTION_ID; 
      COMMIT;  
END DELETE_QUESTION;   

END CREATE_NEW_QUESTION; 