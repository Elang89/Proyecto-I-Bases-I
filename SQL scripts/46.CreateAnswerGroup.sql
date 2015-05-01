/*Creates a table witha all the answers 
Created By Ernesto Lang */
CREATE TABLE ANSWER_GROUP 
(	
	person_id NUMBER(10),
	question_group_id NUMBER(10),
	answer_group_id NUMBER(10),
	date_answered DATE,
	answer_1 VARCHAR(100),
	answer_2 VARCHAR(100),
	answer_3 VARCHAR(100),
	answer_4 VARCHAR(100),
	answer_5 VARCHAR(100)
	
);

ALTER TABLE ANSWER_GROUP
	ADD CONSTRAINT pk_answer_group_id PRIMARY KEY (answer_group_id)
	USING INDEX
	TABLESPACE PetLovers_Indexes PCTFREE 20
	STORAGE (initial 10k next 10k pctincrease 0);

ALTER TABLE ANSWER_GROUP
	ADD CONSTRAINT fk_question_group_id FOREIGN KEY (question_group_id) REFERENCES question_group(question_group_id);