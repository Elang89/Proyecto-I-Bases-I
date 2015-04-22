CREATE TABLE petTreatments 
(
    pet_Treatment VARCHAR(20) CONSTRAINT pet_Treatment_nn NOT NULL, 
    pet_treatment_code NUMBER(10) /*PRIMARY KEY*/
);   

ALTER TABLE PetTreatments

ADD CONSTRAINT pk_pet_code PRIMARY KEY (pet_treatment_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);
