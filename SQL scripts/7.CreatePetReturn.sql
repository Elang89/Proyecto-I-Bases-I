/*
Script para crear la tabla de devolucion
por Adrian Diaz Azofeifa
*/

CREATE TABLE PetReturn
(
       return_code VARCHAR2(20) CONSTRAINT return_code_nn NOT NULL, /* El codigo de la devolucion*/
       return_date DATE DEFAULT SYSDATE CONSTRAINT return_date_nn NOT NULL /* La fecha de la adopcion*/ 
       pet_id NUMBER(10) 
       RECEIVER NUMBER(10)
       RETURNER NUMBER(10);
       
);