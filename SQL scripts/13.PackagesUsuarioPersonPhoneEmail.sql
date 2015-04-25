/* Made by Ernesto Lang 3/31/2015 */

/* PACKAGE FOR USUARIO*/
/* This package contains a set of instructions for PHP to call 
whenever necessary to make any queries, if any other special queries are required they will 
be added to this package when it concerns USUARIO */

CREATE OR REPLACE PACKAGE usuario_package AS
       PROCEDURE add_user(user_username usuario.username%type, user_password usuario.user_password%type);
       FUNCTION findUsers (u_name usuario.username%type, u_pass usuario.user_password%type)
       RETURN NUMBER;
	   FUNCTION findAdminUsers (u_name usuario.username%type)
       RETURN NUMBER;
END usuario_package; 
  
CREATE OR REPLACE PACKAGE BODY usuario_package AS 
       PROCEDURE add_user(user_username usuario.username%type,user_password usuario.user_password%type)
       IS 
       BEGIN
         INSERT INTO usuario (username, user_password) VALUES (user_username, user_password);
       END add_user;
       
       FUNCTION findUsers (u_name usuario.username%type, u_pass usuario.user_password%type)
       RETURN NUMBER
       IS 
         counter NUMBER := 0;
       BEGIN 
         SELECT COUNT(*) INTO counter
         FROM usuario
         WHERE usuario.username = u_name
         AND usuario.user_password = u_pass;
         RETURN counter;
       END;
	   
	     
       FUNCTION findAdminUsers (u_name usuario.username%type)
       RETURN NUMBER 
       IS 
         bool_admin NUMBER := 0;
       BEGIN 
         SELECT user_type INTO bool_admin 
         FROM USUARIO 
         WHERE u_name = username;
         RETURN bool_admin;
       EXCEPTION 
         WHEN NO_DATA_FOUND THEN 
           RETURN 0;  
       END;
	   
END usuario_package;
        


/*------------------------------------------------------------------------------------------------------------*/
/*SEQUENCE FOR PERSON ID*/

CREATE SEQUENCE person_id_generator 
  START WITH 1
  INCREMENT BY 1
  MINVALUE 1
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	
/*-----------------------------------------------------------------------------------------------------------*/
/*PACKAGE FOR PERSON*/
/* This package is used to make queries through PHP whenever, data must be 
retrieved altered or inserted into PERSON */

CREATE OR REPLACE PACKAGE person_package AS
       PROCEDURE add_person
         (p_name person.person_name%type,
         p_first_ln person.first_last_name%type,
         p_second_ln person.second_last_name%type,
         p_username person.username%type);  
       FUNCTION find_person_id(u_name person.username%type)
       RETURN NUMBER;
       FUNCTION retrieve_user_details(p_id person.person_id%type)
       RETURN SYS_REFCURSOR;
       FUNCTION find_users(p_search_data  VARCHAR2)
       RETURN SYS_REFCURSOR; 
END person_package;


CREATE OR REPLACE PACKAGE BODY person_package AS
       PROCEDURE add_person
         (p_name person.person_name%type,
         p_first_ln person.first_last_name%type,
         p_second_ln person.second_last_name%type,
         p_username person.username%type,
         p_user_type person.normal_user_type%type)
        IS
        BEGIN
          INSERT INTO person(person_id, person_name,first_last_name,second_last_name,username,normal_user_type)
          VALUES (person_id_generator.nextval,p_name, p_first_ln, p_second_ln, p_username,p_user_type);
        END add_person;
        
        FUNCTION return_user_type(p_uname person.username%type)
        RETURN NUMBER
        IS 
          u_type NUMBER;
        BEGIN 
          SELECT normal_user_type INTO u_type
          FROM person 
          WHERE p_uname = username;
          RETURN u_type;
        EXCEPTION 
          WHEN NO_DATA_FOUND THEN 
            RETURN null;
        END; 
            
        
        FUNCTION find_person_id(u_name person.username%type)
        RETURN NUMBER
        IS 
          p_id NUMBER(10);
        BEGIN 
          SELECT person_id INTO p_id 
          FROM person 
          WHERE u_name = username;
          RETURN p_id;
        EXCEPTION 
          WHEN NO_DATA_FOUND THEN 
            RETURN 0;
        END;
        
       PROCEDURE add_blacklist_value(p_value person.blacklist%type, p_uname person.username%type) 
       IS 
         b_value NUMBER := p_value;
         b_column_value NUMBER;
       BEGIN 
         b_value := b_value - 3;
         SELECT blacklist INTO b_column_value
         FROM person 
         WHERE p_uname = username;
         
         IF b_column_value IS NULL THEN 
           UPDATE person
           SET blacklist = b_value
           WHERE p_uname = username;
         ELSE 
           UPDATE person
           SET blacklist = blacklist + b_value
           WHERE p_uname = username;
         END IF;
       END;
            
          
       FUNCTION retrieve_user_details(p_id person.person_id%type)
       RETURN SYS_REFCURSOR
       IS 
         c_details SYS_REFCURSOR;
       BEGIN 
          OPEN c_details FOR SELECT username, person_name, first_last_name, second_last_name, blacklist
          FROM person 
          WHERE P_id = person_id;
          RETURN c_details;
       EXCEPTION 
         WHEN NO_DATA_FOUND THEN 
           RETURN null;
       END;
       
       FUNCTION find_users(p_search_data VARCHAR2)
       RETURN SYS_REFCURSOR
       IS 
          c_users SYS_REFCURSOR;
       BEGIN 
         OPEN c_users FOR SELECT username, person_id, person_name, first_last_name, second_last_name, blacklist 
         FROM person 
         WHERE  username LIKE p_search_data || '%';
         RETURN c_users;
      EXCEPTION 
        WHEN NO_DATA_FOUND THEN 
          RETURN null;
      END;   
      
       FUNCTION return_blacklisted_users
       RETURN SYS_REFCURSOR
       IS 
         c_users_blacklist SYS_REFCURSOR;
       BEGIN 
         OPEN c_users_blacklist FOR SELECT username, person_id, person_name, first_last_name, second_last_name, blacklist
         FROM person 
         WHERE blacklist <= -8;
         RETURN c_users_blacklist;
       EXCEPTION 
         WHEN NO_DATA_FOUND THEN
           RETURN null;
       END;
END person_package;
/*----------------------------------------------------------------------------------------*/
/*PACKAGE FOR PHONE */
CREATE OR REPLACE PACKAGE phone_package AS
       PROCEDURE add_phone
         (p_number phone.phone_number%type,
          p_username person.username%type);
       FUNCTION retrieve_user_phones(p_id phone.person_id%type)
       RETURN SYS_REFCURSOR;
END phone_package;

CREATE OR REPLACE PACKAGE BODY phone_package AS
       PROCEDURE add_phone
         (p_number phone.phone_number%type,
          p_username person.username%type)
         IS
         BEGIN
           INSERT INTO phone(person_id, phone_number)
           VALUES ((SELECT person.person_id
                   FROM PERSON
                   WHERE p_username = person.username),
                   p_number);
         END add_phone;
         
        FUNCTION retrieve_user_phones(p_id phone.person_id%type)
        RETURN SYS_REFCURSOR
        IS
          c_phones SYS_REFCURSOR;
        BEGIN
          OPEN c_phones FOR SELECT phone_number
          FROM phone 
          WHERE p_id = person_id;
          RETURN c_phones;
        EXCEPTION 
          WHEN NO_DATA_FOUND THEN 
            RETURN null;
        END;
END phone_package;

/*------------------------------------------------------------------------*/
/*PACKAGE FOR EMAIL*/
CREATE OR REPLACE PACKAGE email_package AS
       PROCEDURE add_email
         (p_email email.email%type,
          p_username person.username%type);
       FUNCTION retrieve_user_emails(p_id email.person_id%type)
       RETURN SYS_REFCURSOR;
END email_package;

CREATE OR REPLACE PACKAGE BODY email_package AS
       PROCEDURE add_email
         (p_email email.email%type,
         p_username person.username%type)
         IS
         BEGIN
           INSERT INTO email(person_id, email)
           VALUES ((SELECT person.person_id
                   FROM PERSON
                   WHERE p_username = person.username),
                   p_email);
         END add_email;
         
         FUNCTION retrieve_user_emails(p_id email.person_id%type)
         RETURN SYS_REFCURSOR
         IS 
           c_emails SYS_REFCURSOR;
         BEGIN
           OPEN c_emails FOR SELECT email
           FROM email
           WHERE p_id = person_id;
           RETURN c_emails;
        EXCEPTION 
          WHEN NO_DATA_FOUND THEN 
           RETURN null;
        END;
END email_package;
  
