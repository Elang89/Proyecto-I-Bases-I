/* Script that creates the table PetReturn with all its primary keys and foreign keys 
Created by Enresto Lang*/

CREATE TABLE PetReturn
(
       return_code NUMBER(10) CONSTRAINT return_code_nn NOT NULL, /* Return code id */
       return_date DATE DEFAULT SYSDATE CONSTRAINT return_date_nn NOT NULL, /* Return date*/ 
       adoption_code NUMBER(10),
       reason_code NUMBER(10)       
);  


ALTER TABLE PetReturn
ADD CONSTRAINT pk_return_code PRIMARY KEY (return_code);


ALTER TABLE petreturn
      ADD CONSTRAINT fk_adoption_code FOREIGN KEY (ADOPTION_CODE) REFERENCES PetAdoption(adoption_code); 
      

ALTER TABLE petreturn
      ADD CONSTRAINT fk_reason_code FOREIGN KEY (REASON_CODE) REFERENCES REASONRETURNED(reason_code);