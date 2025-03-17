/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  17/03/2025 13:52:27                      */
/*==============================================================*/


drop table if exists CREATED;

drop table if exists "IN";

drop table if exists LINK;

drop table if exists QUESTION;

drop table if exists QUIZ;

drop table if exists RESPONSE;

drop table if exists USER;

/*==============================================================*/
/* Table : CREATED                                              */
/*==============================================================*/
create table CREATED
(
   ID_QUIZ              int not null,
   ID_USER              int not null,
   primary key (ID_QUIZ, ID_USER)
);

/*==============================================================*/
/* Table : "IN"                                                 */
/*==============================================================*/
create table "IN"
(
   ID_QUESTION          int not null,
   ID_RESPONSE          int not null,
   primary key (ID_QUESTION, ID_RESPONSE)
);

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
/* Table : USER                                                 */
/*==============================================================*/
create table USER
(
   ID_USER              int not null,
   USERNAME_USER        varchar(75) not null,
   EMAIL_USER           varchar(75) not null,
   PASSWORD_USER        varchar(250) not null,
   ROLE_USER            int not null,
   QUIZ_USER            int not null,
   primary key (ID_USER)
);

alter table CREATED add constraint FK_CREATED foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table CREATED add constraint FK_CREATED2 foreign key (ID_QUIZ)
      references QUIZ (ID_QUIZ) on delete restrict on update restrict;

alter table "IN" add constraint FK_IN foreign key (ID_RESPONSE)
      references RESPONSE (ID_RESPONSE) on delete restrict on update restrict;

alter table "IN" add constraint FK_IN2 foreign key (ID_QUESTION)
      references QUESTION (ID_QUESTION) on delete restrict on update restrict;

alter table LINK add constraint FK_LINK foreign key (ID_QUESTION)
      references QUESTION (ID_QUESTION) on delete restrict on update restrict;

alter table LINK add constraint FK_LINK2 foreign key (ID_QUIZ)
      references QUIZ (ID_QUIZ) on delete restrict on update restrict;

