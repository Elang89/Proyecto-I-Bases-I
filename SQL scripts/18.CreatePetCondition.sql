/* Made by Miuyin Yong

Script for creating Pet Condition table
*/

CREATE TABLE PetCondition
(
		pet_cond_name VARCHAR(20) CONSTRAINT pet_cond_name_nn NOT NULL,
		pet_cond_code NUMBER(10) /*PRIMARY KEY*/
);