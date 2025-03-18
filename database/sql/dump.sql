/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  17/03/2025 14:43:56                      */
/*==============================================================*/


drop table if exists LINK;

drop table if exists QUESTION;

drop table if exists QUIZ;

drop table if exists RESPONSE;

drop table if exists `THROUGH`;

/*==============================================================*/
/* Table : LINK                                                 */
/*==============================================================*/
create table LINK
(
   ID_QUIZ              int not null,
   ID_QUESTION          int not null,
   primary key (ID_QUIZ, ID_QUESTION)
);

/*==============================================================*/
/* Table : QUESTION                                             */
/*==============================================================*/
create table QUESTION
(
   ID_QUESTION          int not null,
   QUIZ_QUESTION        int not null,
   NUMBER_QUESTION      int not null,
   NAME_QUESTION        varchar(50) not null,
   RESPONSE_QUESTION    int not null,
   primary key (ID_QUESTION)
);

/*==============================================================*/
/* Table : QUIZ                                                 */
/*==============================================================*/
create table QUIZ
(
   ID_QUIZ              int not null,
   NAME_QUIZ            varchar(50) not null,
   USER_QUIZ            int not null,
   primary key (ID_QUIZ)
);

/*==============================================================*/
/* Table : RESPONSE                                             */
/*==============================================================*/
create table RESPONSE
(
   ID_RESPONSE          int not null,
   NAME_RESPONSE        varchar(250) not null,
   GOOD_RESPONSE        bool not null,
   POSITION_RESPONSE    char(1) not null,
   primary key (ID_RESPONSE)
);

/*==============================================================*/
/* Table : THROUGH                                              */
/*==============================================================*/
create table THROUGH
(
   ID_QUESTION          int not null,
   ID_RESPONSE          int not null,
   primary key (ID_QUESTION, ID_RESPONSE)
);

alter table LINK add constraint FK_LINK foreign key (ID_QUESTION)
      references QUESTION (ID_QUESTION) on delete restrict on update restrict;

alter table LINK add constraint FK_LINK2 foreign key (ID_QUIZ)
      references QUIZ (ID_QUIZ) on delete restrict on update restrict;

alter table THROUGH add constraint FK_THROUGH foreign key (ID_RESPONSE)
      references RESPONSE (ID_RESPONSE) on delete restrict on update restrict;

alter table THROUGH add constraint FK_THROUGH2 foreign key (ID_QUESTION)
      references QUESTION (ID_QUESTION) on delete restrict on update restrict;

