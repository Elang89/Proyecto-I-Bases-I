CREATE TABLE PetSpace
(
    pet_Space VARCHAR(20) CONSTRAINT pet_Space_nn NOT NULL, 
    pet_space_code NUMBER(10) /*PRIMARY KEY*/
); 

ALTER TABLE PetSpace

ADD CONSTRAINT pk_pet_space_code PRIMARY KEY (pet_space_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);
