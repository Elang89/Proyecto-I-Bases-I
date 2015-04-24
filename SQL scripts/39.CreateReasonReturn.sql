
CREATE TABLE REASONRETURNED
(
       reason_code NUMBER(10) CONSTRAINT reason_code_nn NOT NULL, /* Reason code id */
       reason VARCHAR2(100)       
); 

ALTER TABLE REASONRETURNED
ADD CONSTRAINT pk_reason_code PRIMARY KEY (reason_code);