/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  17/03/2025 14:43:56                      */
/*==============================================================*/

DROP TABLE IF EXISTS LINK;
DROP TABLE IF EXISTS QUESTION;
DROP TABLE IF EXISTS QUIZ;
DROP TABLE IF EXISTS RESPONSE;
DROP TABLE IF EXISTS THROUGH_TABLE;

/*==============================================================*/
/* Table : QUIZ                                                 */
/*==============================================================*/
CREATE TABLE QUIZ (
      ID_QUIZ INT PRIMARY KEY AUTO_INCREMENT,
      NAME_QUIZ VARCHAR(50) NOT NULL,
      USER_QUIZ INT NOT NULL
);

/*==============================================================*/
/* Table : QUESTION                                             */
/*==============================================================*/
CREATE TABLE QUESTION (
      ID_QUESTION INT PRIMARY KEY AUTO_INCREMENT,
      QUIZ_QUESTION INT NOT NULL,
      NUMBER_QUESTION INT NOT NULL,
      NAME_QUESTION VARCHAR(50) NOT NULL,
      RESPONSE_QUESTION INT NOT NULL
);

/*==============================================================*/
/* Table : RESPONSE                                             */
/*==============================================================*/
CREATE TABLE RESPONSE (
      ID_RESPONSE INT PRIMARY KEY AUTO_INCREMENT,
      NAME_RESPONSE VARCHAR(250) NOT NULL,
      GOOD_RESPONSE BOOLEAN NOT NULL,
      POSITION_RESPONSE VARCHAR(10) NOT NULL
);

/*==============================================================*/
/* Table : LINK (Association entre QUIZ et QUESTION)           */
/*==============================================================*/
CREATE TABLE LINK (
      ID_QUIZ INT NOT NULL,
      ID_QUESTION INT NOT NULL,
      PRIMARY KEY (ID_QUIZ, ID_QUESTION)
);

/*==============================================================*/
/* Table : THROUGH_TABLE (Association entre QUESTION et RESPONSE) */
/*==============================================================*/
CREATE TABLE THROUGH_TABLE (
       ID_QUESTION INT NOT NULL,
       ID_RESPONSE INT NOT NULL,
       PRIMARY KEY (ID_QUESTION, ID_RESPONSE)
);

alter table LINK add constraint FK_LINK foreign key (ID_QUESTION)
    references QUESTION (ID_QUESTION) on delete restrict on update restrict;

alter table LINK add constraint FK_LINK2 foreign key (ID_QUIZ)
    references QUIZ (ID_QUIZ) on delete restrict on update restrict;

alter table THROUGH_TABLE add constraint FK_THROUGH foreign key (ID_RESPONSE)
    references RESPONSE (ID_RESPONSE) on delete restrict on update restrict;

alter table THROUGH_TABLE add constraint FK_THROUGH2 foreign key (ID_QUESTION)
    references QUESTION (ID_QUESTION) on delete restrict on update restrict;