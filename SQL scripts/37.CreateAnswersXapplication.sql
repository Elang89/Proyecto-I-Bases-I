/*Script to create Table answersXapplication
created by Miuyin Yong*/ 
CREATE TABLE answersXapplication
(
       questionID NUMBER(10), /* Question code*/
       AdoptionID NUMBER(20),  /*Adoption Code*/  
       Answer VARCHAR2(100)     
       
);
   
      
ALTER TABLE answersXapplication
      ADD CONSTRAINT AXP_pk PRIMARY KEY (questionID, AdoptionID);  


ALTER TABLE answersXapplication 
      ADD CONSTRAINT fk_AdoptionID FOREIGN KEY (AdoptionID) REFERENCES petAdoption(Adoption_code); 

ALTER TABLE answersXapplication 
      ADD CONSTRAINT fk_questionID FOREIGN KEY (questionID) REFERENCES applicationform(questionID);
  