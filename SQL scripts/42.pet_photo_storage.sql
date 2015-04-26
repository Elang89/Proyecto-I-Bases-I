CREATE TABLE PET_PHOTO_STORAGE 
( 
	pet_image_id NUMBER(8), 
	pet_code NUMBER(10),
	image VARCHAR(1000);
);



ALTER TABLE PET_PHOTO_STORAGE
  ADD CONSTRAINT pk_pet_image_id PRIMARY KEY (pet_image_id)
  USING INDEX
  TABLESPACE PetLovers_Indexes PCTFREE 20
  STORAGE (initial 10k next 10k pctincrease 0);

  
CREATE SEQUENCE pet_image_id_generator 
  START WITH 1
  INCREMENT BY 1
  MINVALUE 1
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	 
  
  
 /*------------------------------------------------------------*/
 /*PACKAGES*/
 
 CREATE OR REPLACE PACKAGE pet_image_package AS
       PROCEDURE add_pet_image
       (p_image pet_photo_storage.image%type);

       FUNCTION return_pet_image(p_id pet_photo_storage.pet_code%type)
       RETURN VARCHAR2;
END pet_image_package;


CREATE OR REPLACE PACKAGE BODY pet_image_package AS
       PROCEDURE add_pet_image
        (p_image pet_photo_storage.image%type)
        IS
        BEGIN
          INSERT INTO pet_photo_storage (pet_image_id,pet_code,image)
          VALUES(pet_image_id_generator.nextval,pet_id_generator.currval,p_image);
        END;


       FUNCTION return_pet_image(p_id pet_photo_storage.pet_code%type)
       RETURN VARCHAR2
       IS
         r_image VARCHAR2(1000);
       BEGIN
         SELECT image INTO r_image
         FROM pet_photo_storage
         WHERE p_id = pet_code;
         RETURN r_image;
       EXCEPTION
         WHEN NO_DATA_FOUND THEN
           RETURN null;
       END;
END pet_image_package;