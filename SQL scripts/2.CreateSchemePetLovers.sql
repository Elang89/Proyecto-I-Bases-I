--SCRIPT #2 PetLoversScheme(this is the main scheme) 
-- Created by Miuyin Yong 

CREATE USER DBadmin
       identified by dbadmin              --Password for this user
       DEFAULT TABLESPACE  PetLovers_Data
       QUOTA 10M ON  PetLovers_Data
       TEMPORARY TABLESPACE temp
       QUOTA 5M ON system;
       
       
CREATE ROLE DBadmin
       identified by dbadmin;
       
GRANT CONNECT TO DBadmin;
GRANT CREATE TABLE TO DBadmin;   
GRANT CREATE VIEW TO DBadmin;  
GRANT CREATE TRIGGER TO DBadmin;
GRANT CREATE PROCEDURE TO DBadmin; 
GRANT DBA TO DBadmin;
