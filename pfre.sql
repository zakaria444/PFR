/*==============================================================*/
/* Nom de SGBD :  SAP SQL Anywhere 17                           */
/* Date de création :  12/07/2021 14:55:22                      */
/*==============================================================*/


if exists(select 1 from sys.sysforeignkey where role='FK_ADMIN_CREATE_PRODUCT') then
    alter table ADMIN
       delete foreign key FK_ADMIN_CREATE_PRODUCT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_ADMIN_LOGIN_USERS') then
    alter table ADMIN
       delete foreign key FK_ADMIN_LOGIN_USERS
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_CLIENT_LOG_USERS') then
    alter table CLIENT
       delete foreign key FK_CLIENT_LOG_USERS
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_COMMANDE_COMMANDE_CLIENT') then
    alter table COMMANDE
       delete foreign key FK_COMMANDE_COMMANDE_CLIENT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_CONCERNE_CONCERNE_PRODUCT') then
    alter table CONCERNE
       delete foreign key FK_CONCERNE_CONCERNE_PRODUCT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_CONCERNE_CONCERNE2_COMMANDE') then
    alter table CONCERNE
       delete foreign key FK_CONCERNE_CONCERNE2_COMMANDE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_USERS_TCHEK_ROLES') then
    alter table USERS
       delete foreign key FK_USERS_TCHEK_ROLES
end if;

drop index if exists ADMIN.LOGIN_FK;

drop index if exists ADMIN.CREATE_FK;

drop index if exists ADMIN.ADMIN_PK;

drop table if exists ADMIN;

drop index if exists CLIENT.LOG_FK;

drop index if exists CLIENT.CLIENT_PK;

drop table if exists CLIENT;

drop index if exists COMMANDE.COMMANDE_FK;

drop index if exists COMMANDE.COMMANDE_PK;

drop table if exists COMMANDE;

drop index if exists CONCERNE.CONCERNE_FK;

drop index if exists CONCERNE.CONCERNE2_FK;

drop index if exists CONCERNE.CONCERNE_PK;

drop table if exists CONCERNE;

drop index if exists PRODUCT.PRODUCT_PK;

drop table if exists PRODUCT;

drop index if exists ROLES.ROLES_PK;

drop table if exists ROLES;

drop index if exists USERS.TCHEK_FK;

drop index if exists USERS.USERS_PK;

drop table if exists USERS;

/*==============================================================*/
/* Table : ADMIN                                                */
/*==============================================================*/
create or replace table ADMIN 
(
   ID_ADMIN             integer                        not null,
   ID_PRODUCT           integer                        null,
   USER_ID              integer                        not null,
   NAME_ADMIN           varchar(50)                    null,
   constraint PK_ADMIN primary key clustered (ID_ADMIN)
);

/*==============================================================*/
/* Index : ADMIN_PK                                             */
/*==============================================================*/
create unique clustered index ADMIN_PK on ADMIN (
ID_ADMIN ASC
);

/*==============================================================*/
/* Index : CREATE_FK                                            */
/*==============================================================*/
create index CREATE_FK on ADMIN (
ID_PRODUCT ASC
);

/*==============================================================*/
/* Index : LOGIN_FK                                             */
/*==============================================================*/
create index LOGIN_FK on ADMIN (
USER_ID ASC
);

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create or replace table CLIENT 
(
   ID_CLIENT            integer                        not null,
   USER_ID              integer                        not null,
   ADRESS               long varchar                   null,
   NUM                  numeric(20,0)                  null,
   NAME_CLIENT          varchar(20)                    null,
   constraint PK_CLIENT primary key clustered (ID_CLIENT)
);

/*==============================================================*/
/* Index : CLIENT_PK                                            */
/*==============================================================*/
create unique clustered index CLIENT_PK on CLIENT (
ID_CLIENT ASC
);

/*==============================================================*/
/* Index : LOG_FK                                               */
/*==============================================================*/
create index LOG_FK on CLIENT (
USER_ID ASC
);

/*==============================================================*/
/* Table : COMMANDE                                             */
/*==============================================================*/
create or replace table COMMANDE 
(
   ID_COMMANDE          integer                        not null,
   ID_CLIENT            integer                        not null,
   CRATE_AT             date                           null,
   QUANTUTY             numeric(20,2)                  null,
   constraint PK_COMMANDE primary key clustered (ID_COMMANDE)
);

/*==============================================================*/
/* Index : COMMANDE_PK                                          */
/*==============================================================*/
create unique clustered index COMMANDE_PK on COMMANDE (
ID_COMMANDE ASC
);

/*==============================================================*/
/* Index : COMMANDE_FK                                          */
/*==============================================================*/
create index COMMANDE_FK on COMMANDE (
ID_CLIENT ASC
);

/*==============================================================*/
/* Table : CONCERNE                                             */
/*==============================================================*/
create or replace table CONCERNE 
(
   ID_COMMANDE          integer                        not null,
   ID_PRODUCT           integer                        not null,
   constraint PK_CONCERNE primary key clustered (ID_COMMANDE, ID_PRODUCT)
);

/*==============================================================*/
/* Index : CONCERNE_PK                                          */
/*==============================================================*/
create unique clustered index CONCERNE_PK on CONCERNE (
ID_COMMANDE ASC,
ID_PRODUCT ASC
);

/*==============================================================*/
/* Index : CONCERNE2_FK                                         */
/*==============================================================*/
create index CONCERNE2_FK on CONCERNE (
ID_COMMANDE ASC
);

/*==============================================================*/
/* Index : CONCERNE_FK                                          */
/*==============================================================*/
create index CONCERNE_FK on CONCERNE (
ID_PRODUCT ASC
);

/*==============================================================*/
/* Table : PRODUCT                                              */
/*==============================================================*/
create or replace table PRODUCT 
(
   ID_PRODUCT           integer                        not null,
   PROD_NAME            varchar(50)                    null,
   PROD_PRIX            numeric(20,2)                  null,
   PROD_DETAILS         long varchar                   null,
   PROD_TITLE           varchar(100)                   null,
   constraint PK_PRODUCT primary key clustered (ID_PRODUCT)
);

/*==============================================================*/
/* Index : PRODUCT_PK                                           */
/*==============================================================*/
create unique clustered index PRODUCT_PK on PRODUCT (
ID_PRODUCT ASC
);

/*==============================================================*/
/* Table : ROLES                                                */
/*==============================================================*/
create or replace table ROLES 
(
   ROLE_ID              integer                        not null,
   ROLE                 varchar(20)                    null,
   constraint PK_ROLES primary key clustered (ROLE_ID)
);

/*==============================================================*/
/* Index : ROLES_PK                                             */
/*==============================================================*/
create unique clustered index ROLES_PK on ROLES (
ROLE_ID ASC
);

/*==============================================================*/
/* Table : USERS                                                */
/*==============================================================*/
create or replace table USERS 
(
   USER_ID              integer                        not null,
   ROLE_ID              integer                        not null,
   EMAIL                varchar(20)                    null,
   PASSWORD             numeric(20,1)                  null,
   LOGIN_ATTEMPTS       date                           null,
   constraint PK_USERS primary key clustered (USER_ID)
);

/*==============================================================*/
/* Index : USERS_PK                                             */
/*==============================================================*/
create unique clustered index USERS_PK on USERS (
USER_ID ASC
);

/*==============================================================*/
/* Index : TCHEK_FK                                             */
/*==============================================================*/
create index TCHEK_FK on USERS (
ROLE_ID ASC
);

alter table ADMIN
   add constraint FK_ADMIN_CREATE_PRODUCT foreign key (ID_PRODUCT)
      references PRODUCT (ID_PRODUCT)
      on update restrict
      on delete restrict;

alter table ADMIN
   add constraint FK_ADMIN_LOGIN_USERS foreign key (USER_ID)
      references USERS (USER_ID)
      on update restrict
      on delete restrict;

alter table CLIENT
   add constraint FK_CLIENT_LOG_USERS foreign key (USER_ID)
      references USERS (USER_ID)
      on update restrict
      on delete restrict;

alter table COMMANDE
   add constraint FK_COMMANDE_COMMANDE_CLIENT foreign key (ID_CLIENT)
      references CLIENT (ID_CLIENT)
      on update restrict
      on delete restrict;

alter table CONCERNE
   add constraint FK_CONCERNE_CONCERNE_PRODUCT foreign key (ID_PRODUCT)
      references PRODUCT (ID_PRODUCT)
      on update restrict
      on delete restrict;

alter table CONCERNE
   add constraint FK_CONCERNE_CONCERNE2_COMMANDE foreign key (ID_COMMANDE)
      references COMMANDE (ID_COMMANDE)
      on update restrict
      on delete restrict;

alter table USERS
   add constraint FK_USERS_TCHEK_ROLES foreign key (ROLE_ID)
      references ROLES (ROLE_ID)
      on update restrict
      on delete restrict;

