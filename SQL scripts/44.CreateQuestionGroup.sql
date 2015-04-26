CREATE TABLE QUESTION_GROUP 
(
       adoption_form_id NUMBER(10),
       question_group_id NUMBER(10),
       question_1 VARCHAR2(100),
       question_2 VARCHAR2(100),
       question_3 VARCHAR2(100),
       question_4 VARCHAR2(100),
       question_5 VARCHAR2(100)
);

ALTER TABLE QUESTION_GROUP
  ADD CONSTRAINT pk_question_group PRIMARY KEY (question_group_id)
  USING INDEX
  TABLESPACE PetLovers_Indexes PCTFREE 20
  STORAGE (initial 10k next 10k pctincrease 0);
