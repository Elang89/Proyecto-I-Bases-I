
/*
Creates primary key for user 
Created by Ernesto Lang
*/
ALTER TABLE Usuario
ADD CONSTRAINT pk_username PRIMARY KEY (username)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);

