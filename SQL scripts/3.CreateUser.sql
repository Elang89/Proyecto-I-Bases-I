/*
Script para crear la tabla de usuario
por Adrian Diaz Azofeifa
*/

CREATE TABLE Usuario
(
       username VARCHAR2(12), /* El nombre de usuario*/
       user_password VARCHAR2(16),  /*El password*/
       user_type NUMBER(1) /*El tipo de usuario: administrador(1) o normal(0)*/ 
       
       
);


