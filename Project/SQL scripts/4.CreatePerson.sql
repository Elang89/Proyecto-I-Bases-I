/*
Script para crear la tabla de persona
por Adrian Diaz Azofeifa
*/

CREATE TABLE Person
(
       person_name VARCHAR2(20) CONSTRAINT person_name_nn NOT NULL, /* El nombre de la persona*/
       first_last_name VARCHAR2(16) CONSTRAINT first_last_name_nn NOT NULL, /* El primer apellido*/
       second_last_name VARCHAR2(16),
       person_id NUMBER(10),
	   blacklist NUMBER(1);
       username VARCHAR2(12)
       
);

/*
Script para crear la tabla de numeros de telefono asociados a persona
por Adrian Diaz Azofeifa
*/

CREATE TABLE Phone
(
	   phone_number NUMBER(8) CONSTRAINT phone_nn NOT NULL,
	   person_id NUMBER(10)

);

/*
Script para crear la tabla de correos electronicos asociados a persona
por Adrian Diaz Azofeifa
*/
CREATE TABLE Email
(
       email VARCHAR2(30) CONSTRAINT email_nn NOT NULL,
       person_id NUMBER(10)
);
