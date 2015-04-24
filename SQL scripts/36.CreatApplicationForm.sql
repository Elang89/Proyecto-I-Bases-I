CREATE TABLE applicationForm
(
       questionID NUMBER(10), /* The questions ID*/
       question VARCHAR2(100)  /*El password*/      
       
);

ALTER TABLE applicationForm
ADD CONSTRAINT pk_applicationForm PRIMARY KEY (questionID)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);