CREATE SCHEMA game;
USE game;

CREATE TABLE player(
	player_id int NOT NULL AUTO_INCREMENT,
	playername varchar (50),
	score int (11),
	life int (11),
	diamonds int (11),

	PRIMARY KEY (player_id)
);


CREATE TABLE questions(
	quest_id int NOT NULL AUTO_INCREMENT,
	quest_description varchar (200),
	quest_category ENUM('English','Math','Science'),

	PRIMARY KEY (quest_id)
);

CREATE TABLE choice(
	choice_id int NOT NULL AUTO_INCREMENT,
	choice_description varchar (100),
	quest_id int NOT NULL,
	status ENUM('0','1'),

	PRIMARY KEY (choice_id),
	FOREIGN KEY (quest_id) REFERENCES questions(quest_id)
);

INSERT INTO questions(quest_id,quest_description,quest_category) VALUES (1,"Every sentence must have a subject and ?","English"),(2,"A plural subject needs ?","English"),(3,"When two singular subjects are connected by or, use ?","English"),(4,"Adjectives usually come ?","English"),(5,"She cannot leave the table without ________ her dinner.","English"),(6,"Which number is equivalent to 3^(4)÷3^(2) ?","Math"),(7,"I am an odd number. Take away one letter and I become even. What number am I ?","Math"),(8,"Which 3 numbers have the same answer whether they’re added or multiplied together ?","Math"),(9,"If 72 x 96 = 6927, 58 x 87 = 7885, then 79 x 86 = ?","Math"),(10,"The day before yesterday I was 25. The next year I will be 28. This is true only one day in a year. What day is my Birthday? ","Math"),(11,"How many bones are in the human body ?","Science"),(12,"The concept of gravity was discovered by which famous physicist ?","Science"),(13,"What is the hardest natural substance on Earth ?","Science"),(14,"Which is the main gas that makes up the Earth’s atmosphere ?","Science"),(15,"Roughly how long does it take for the sun’s light to reach Earth ?","Science");

INSERT INTO choice(choice_id,choice_description,quest_id,status) VALUES (1,"a subject",1,'1'),(2,"a verb",1,'0'),(3,"an adverb",1,'1'),(4,"a singular verb",2,'0'),(5,"a plural verb",2,'1'),(6,"an adverb",2,'1'),(7,"a singular verb",3,'0'),(8,"a plural verb",3,'1'),(9,"an adverb",3,'1'),(10,"before a noun",4,'0'),(11,"before a pronoun",4,'1'),(12,"after a noun",4,'1'),(13,"to finish",5,'1'),(14,"finishing",5,'0'),(15,"finished",5,'1'),(16,"10",6,'1'),(17,"9",6,'0'),(18,"15",6,'1'),(19,"Seven",7,'0'),(20,"Nine",7,'1'),(21,"Eleven",7,'1'),(22,"1, 2 and 3",8,'0'),(23,"1, 6 and 7",8,'1'),(24,"2, 3 and 4",8,'1'),(25,"5897",9,'1'),(26,"6897",9,'0'),(27,"4596",9,'1'),(28,"December 31",10,'0'),(29,"January 30",10,'1'),(30,"February 14",10,'1'),(31,"206",11,'0'),(32,"303",11,'1'),(33,"260",11,'1'),(34,"Isaac Newton",12,'0'),(35,"Albert Einstein",12,'1'),(36,"Leonardo De Caprio",12,'1'),(37,"Gold",13,'1'),(38,"Ruby",13,'1'),(39,"Diamond",13,'0'),(40,"Oxygen",14,'1'),(41,"Nitrogen",14,'0'),(42,"Carbon Dioxide",14,'1'),(43,"8 minutes",15,'0'),(44,"8 seconds",15,'1'),(45,"1 minute",15,'1');




