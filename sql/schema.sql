CREATE TABLE FrontEndDevs (
	developerID  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	firstName VARCHAR(30),
	lastName VARCHAR(30),
	email VARCHAR(100),
	username VARCHAR(30),
    yearGraduated INT,
	yearsOfExperience INT,
	skills VARCHAR(100),
	favoriteTool VARCHAR(100),
    frameworksUsed VARCHAR(100),
    projects VARCHAR (255),
	dateRegistered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
