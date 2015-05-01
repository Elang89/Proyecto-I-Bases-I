/*Sequences for adoption, answer and question Group 
Created By ernesto Lang*/ 

CREATE SEQUENCE question_group_id_generator 
  START WITH 1
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	
  
CREATE SEQUENCE adoption_form_id_generator 
  START WITH 1
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	

  
CREATE SEQUENCE answer_group_id_generator 
  START WITH 1
  INCREMENT BY 1
  MINVALUE 0
  MAXVALUE 1000000000
  NOCACHE
  NOCYCLE;	