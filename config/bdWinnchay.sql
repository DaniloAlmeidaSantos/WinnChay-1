CREATE DATABASE WINNCHAY;
	USE WINNCHAY;

CREATE TABLE CATEGORIES(
	IDCATEGORY INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	CATEGORY VARCHAR(25) NOT NULL,

	CONSTRAINT UQ_CATEGORY UNIQUE (CATEGORY)
);

CREATE TABLE HISTORIC(
	IDHISTORIC INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	TEAM1 VARCHAR(16) NOT NULL,
	TEAM2 VARCHAR(16) NOT NULL,
	T1VICTORY CHAR(8) NOT NULL,
	T2VICTORY CHAR(8) NOT NULL
);

CREATE TABLE ESPORTS(
	ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	GAME VARCHAR(25) NOT NULL,

	CONSTRAINT UQ_GAME UNIQUE (GAME)
);

CREATE TABLE PLATFORMS(
	IDPLATFORM INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	PLATFORM VARCHAR(20) NOT NULL,

	CONSTRAINT UQ_PLATFORM UNIQUE (PLATFORM)
);

CREATE TABLE PICTURES(
	IDPICTURE INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	PICTURE VARCHAR(10) NOT NULL
);

CREATE TABLE PLAYERS(
	IDPLAYER INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	FIRST_NAME VARCHAR(20) NOT NULL,
	LAST_NAME VARCHAR(20) NOT NULL,
	USERNAME VARCHAR(16) NOT NULL,
	EMAIL VARCHAR(30) NOT NULL,
	PASSWORD VARCHAR(16) NOT NULL,
	TEAM VARCHAR(16),
	CPF INT(11) NOT NULL,
	PHONE CHAR(14) NOT NULL,
	AVALIACAO DECIMAL(2,1),
	FOLLOWERS INT(11) NOT NULL DEFAULT 0,
	WINS INT(11) NOT NULL DEFAULT 0,
	LOSES INT(11) NOT NULL DEFAULT 0,
	DRAWS INT(11) NOT NULL DEFAULT 0,

	CONSTRAINT UQ_EMAIL_PLAYERS UNIQUE (EMAIL),
	CONSTRAINT UQ_CPF_PLAYERS UNIQUE (CPF),
	CONSTRAINT UQ_USERNAME_PLAYERS UNIQUE (USERNAME)
);

CREATE TABLE TEAM(
	IDTEAM INT(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	NAME VARCHAR(16) NOT NULL,
	IDPICTURE INT(11),
	IDPLAYER INT(11),
	BIOGRAPHY VARCHAR(120),

	CONSTRAINT UQ_NAME_TEAMS UNIQUE (NAME),
	CONSTRAINT FK_IDPLAYER_TEAMS FOREIGN KEY (IDPLAYER) REFERENCES PLAYERS (IDPLAYER),
	CONSTRAINT FK_IDPICTURE_TEAMS FOREIGN KEY (IDPICTURE) REFERENCES PICTURES (IDPICTURE)
);


CREATE TABLE PROFILE_PICTURES(
	IDPROFILE INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	IDPLAYER INT(11) NOT NULL,
	PICTURE VARCHAR(10) NOT NULL,

	CONSTRAINT FK_IDPLAYER_PROFILE FOREIGN KEY (IDPLAYER) REFERENCES PLAYERS (IDPLAYER)
);

CREATE TABLE RANKING_FIFA(
	IDRKG_FIFA INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	IDPLAYER INT(11) NOT NULL,
	IDPLATFORM INT(11) NOT NULL,
	USERNAME VARCHAR(16) NOT NULL,

	CONSTRAINT FK_IDPLATFORM_RKGFIFA FOREIGN KEY (IDPLATFORM) REFERENCES PLATFORMS (IDPLATFORM)
);

CREATE TABLE NUMPLAYERS(
	IDNUMPLAYERS INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	NAME_CHAMP VARCHAR(50) NOT NULL,
	IDADM INT(11) NOT NULL,
	NUMPLAYERS INT(11) NOT NULL,

	CONSTRAINT UQ_NAMECHAMP_NPLAYERS UNIQUE (NAME_CHAMP),
	CONSTRAINT FK_IDADM_NPLAYERS FOREIGN KEY (IDADM) REFERENCES PLAYERS (IDPLAYER)
);

CREATE TABLE CHAMPIONSHIPS (
	IDCHAMP INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	IDADM INT(11) NOT NULL,
	NAME VARCHAR(50) NOT NULL,
	IDPICTURE INT(11) DEFAULT 1,
	THOPHY VARCHAR(16),
	START_DATE VARCHAR(10) NOT NULL,
	IDPLATFORM INT(11) NOT NULL,
	AWARDS VARCHAR(50),
	DESCRIPTION VARCHAR(160) NOT NULL,
	IDNUMPLAYERS INT(11) NOT NULL,

	CONSTRAINT UQ_NAMECHAMP_CHAMP UNIQUE (NAME),
	CONSTRAINT FK_IDADM_CHAMP FOREIGN KEY (IDADM) REFERENCES PLAYERS (IDPLAYER),
	CONSTRAINT FK_NUMPLAYERS_CHAMP  FOREIGN KEY (IDNUMPLAYERS) REFERENCES NUMPLAYERS (IDNUMPLAYERS),
	CONSTRAINT FK_IDPLATFORM_CHAMP FOREIGN KEY (IDPLATFORM) REFERENCES PLATFORMS (IDPLATFORM),
	CONSTRAINT FK_PICTURES_CHAMP FOREIGN KEY (IDPICTURE) REFERENCES PICTURES (IDPICTURE)
);

INSERT INTO PICTURES (PICTURE) VALUES('uploads/up_pictures/default.png');

INSERT INTO PLATFORMS (PLATFORM) VALUES ('PC');
INSERT INTO PLATFORMS (PLATFORM) VALUES ('PS4');
INSERT INTO PLATFORMS (PLATFORM) VALUES ('XBOX');

INSERT INTO PLAYERS (FIRST_NAME, LAST_NAME, USERNAME, EMAIL, PASSWORD, CPF, PHONE, WINS, LOSES, DRAWS) VALUES ('DANILO', 'ALMEIDA', 'DAN', 'DANILO8ALMEIDA@HOTMAIL.COM', '12345', '42409149812', '11963273155',  8, 2, 0);
