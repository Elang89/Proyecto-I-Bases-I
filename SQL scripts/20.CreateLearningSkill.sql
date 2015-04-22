/* Made by Adrian Diaz Azofeifa 04/07/2015

Script for creating Pet's Learning Skill table
*/

CREATE TABLE PetLearningSkill
(
		pet_learn_skill varchar2(30) CONSTRAINT pet_learn_skill_nn NOT NULL, /*Pet's skill to learn from 0 to 5*/
		pet_learn_code NUMBER(10) /*PRIMARY KEY*/
);