CREATE TABLE PHOTO_STORAGE
(
  photo_id NUMBER(8),
  photo_name VARCHAR2(10),
  person_id NUMBER(10),
  image BLOB
);


ALTER TABLE PHOTO_STORAGE
      ADD CONSTRAINT pk_photo_id PRIMARY KEY (photo_id)
      USING INDEX
      TABLESPACE PetLovers_Indexes PCTFREE 20
      STORAGE (initial 10k next 10k pctincrease 0);
      
      ADD CONSTRAINT fk_person_id FOREIGN KEY (person_id) REFERENCES Person(Person_Id);
      
