/* Made by Adrian Diaz Azofeifa 04/18/2015

Script for adding constraints and keys to Veterinary table
*/

/*Alter Veterinary table
Adds constraint for primary key
Adds primary key to index
*/
ALTER TABLE Veterinary
ADD CONSTRAINT pk_vet_code PRIMARY KEY (vet_code)
USING INDEX
TABLESPACE PetLovers_Indexes PCTFREE 20
STORAGE (initial 10k next 10k pctincrease 0);