/*More alters to return pets 
Created By Ernesto Lang*/ 

ALTER TABLE PETRETURN
      ADD RETURN_REASON VARCHAR2(50); 
ALTER TABLE PETRETURN
      ADD adoptant_id NUMBER(10);
ALTER TABLE PETRETURN
     ADD CONSTRAINT fk_returner_id FOREIGN KEY (adoptant_id) REFERENCES person(person_id);
ALTER TABLE PETRETURN
      ADD pet_id NUMBER(10); 
ALTER TABLE PETRETURN
     ADD CONSTRAINT fk_pet_id FOREIGN KEY (pet_id) REFERENCES pet(pet_code);
ALTER TABLE PETRETURN
	   ADD CONSTRAINT fk_returner_id FOREIGN KEY (adoptant_id) REFERENCES person(person_id);