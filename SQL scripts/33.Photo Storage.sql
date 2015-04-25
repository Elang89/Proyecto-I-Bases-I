CREATE TABLE PHOTO_STORAGE
(
  photo_id NUMBER(8),
  photo_name VARCHAR2(10),
  person_id NUMBER(10),
  image VARCHAR2(1000)
);


ALTER TABLE PHOTO_STORAGE
      ADD CONSTRAINT pk_photo_id PRIMARY KEY (photo_id)
      USING INDEX
      TABLESPACE PetLovers_Indexes PCTFREE 20
      STORAGE (initial 10k next 10k pctincrease 0);
      

CREATE OR REPLACE PACKAGE image_package AS
       PROCEDURE add_user_image
         (p_id photo_storage.person_id%type,
          p_image photo_storage.image%type);
          
       FUNCTION return_image (p_id photo_storage.person_id%type)
       RETURN VARCHAR2;
END image_package;

CREATE OR REPLACE PACKAGE BODY image_package AS
        PROCEDURE add_user_image
         (p_id photo_storage.person_id%type,
          p_image photo_storage.image%type)
         IS
          check_result NUMBER;
         BEGIN
           SELECT COUNT(*) INTO check_result
           FROM photo_storage
           WHERE p_id = person_id;

           IF check_result = 0 THEN
             INSERT INTO photo_storage (person_id,image)
             VALUES(image_id_generator.nextval, p_id, p_image);
           ELSIF check_result <= 1 THEN
             UPDATE photo_storage
             SET image = p_image
             WHERE p_id = person_id;
           END IF;
         END;

       FUNCTION return_image(p_id photo_storage.person_id%type)
       RETURN VARCHAR2
       IS
         image_result VARCHAR2(1000);
       BEGIN
         SELECT image INTO image_result
         FROM photo_storage
         WHERE p_id = person_id;
         RETURN image_result;
       EXCEPTION
         WHEN NO_DATA_FOUND THEN
           RETURN null;
       END;
END image_package;