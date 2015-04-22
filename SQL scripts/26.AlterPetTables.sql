/* Made by Adrian Diaz Azofeifa 10/07/2015

Script for adding constraints and keys to Pet table related tables
*/

/*Alter Pet Type table
Adds constraint for primary key
Adds primary key to index
*/
ALTER TABLE PetType
ADD CONSTRAINT pk_pet_type_code PRIMARY KEY (pet_type_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);

/*Alter Pet Race table
Adds constraint for primary key
Adds primary key to index*/
ALTER TABLE PetRace
ADD CONSTRAINT pk_pet_race_code PRIMARY KEY (pet_race_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);

/*Alter Pet Medicine table
Adds constraint for primary key
Adds primary key to index*/
ALTER TABLE PetMedicine
ADD CONSTRAINT pk_pet_med_code PRIMARY KEY (pet_med_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);

/*Alter Pet Condition table
Adds constraint for primary key
Adds primary key to index*/
ALTER TABLE PetCondition
ADD CONSTRAINT pk_pet_cond_code PRIMARY KEY (pet_cond_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);

/*Alter Pet Size table
Adds constraint for primary key
Adds primary key to index*/
ALTER TABLE PetSize
ADD CONSTRAINT pk_pet_size_code PRIMARY KEY (pet_size_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);

/*Alter Pet Learning Skill table
Adds constraint for primary key
Adds primary key to index*/
ALTER TABLE PetLearningSkill
ADD CONSTRAINT pk_pet_learn_code PRIMARY KEY (pet_learn_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);

/*Alter Pet Energy table
Adds constraint for primary key
Adds primary key to index*/
ALTER TABLE PetEnergy
ADD CONSTRAINT pk_pet_energy_code PRIMARY KEY (pet_energy_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);

/*Alter Pet Sickness table
Adds constraint for primary key
Adds primary key to index*/
ALTER TABLE PetSickness
ADD CONSTRAINT pk_pet_sickness_code PRIMARY KEY (pet_sickness_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);

/*Alter Pet Color table
Adds constraint for primary key
Adds primary key to index*/
ALTER TABLE PetColor
ADD CONSTRAINT pk_pet_color_code PRIMARY KEY (pet_color_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);