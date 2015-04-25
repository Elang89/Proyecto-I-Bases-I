 /* Made by Miuyin Yong Wong 25/4/2015 */  
/* PACKAGE FOR PETS*/
/* This package contains the procedure to insert, delete and edit reasons for returning the pet  

/*------------------------------------------------------------------------------------------------------------*/
/*SEQUENCES */
 CREATE SEQUENCE ReasonReturn_id_generator 
  START WITH 0
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE; 

/* -----------------------------------------------PACKAGE FOR APPLICATION----------------------------------*/

CREATE OR REPLACE PACKAGE returnReason_package AS

PROCEDURE CREATE_NEW_REASON
  (REASON IN VARCHAR2); 

PROCEDURE EDIT_REASON
  (REASON_ID IN NUMBER, NEW_REASON IN VARCHAR2) ;  

PROCEDURE DELETE_REASON
  (REASON_ID IN NUMBER); 

END returnReason_package;  
  
/* -----------------------------------------------PACKAGE BODY FOR APPLICATION----------------------------------*/
CREATE OR REPLACE PACKAGE BODY returnReason_package AS

PROCEDURE CREATE_NEW_REASON
  (REASON IN VARCHAR2) IS
     BEGIN
       INSERT INTO REASONRETURNED(REASON_CODE, REASON)
         VALUES(Return_id_generator.nextval, REASON);
     COMMIT;
END CREATE_NEW_REASON;


PROCEDURE EDIT_REASON
  (REASON_ID IN NUMBER, NEW_REASON IN VARCHAR2) IS
     BEGIN
       UPDATE REASONRETURNED
        SET REASON = NEW_REASON
        WHERE REASON_CODE = REASON_ID;
     COMMIT;
END EDIT_REASON;


PROCEDURE DELETE_REASON
  (REASON_ID IN NUMBER) IS
      BEGIN
        DELETE FROM REASONRETURNED
        WHERE REASON_CODE = REASON_ID;
      COMMIT;
END DELETE_REASON;

END returnReason_package;