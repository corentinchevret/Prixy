#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: FORMATION
#------------------------------------------------------------

CREATE TABLE FORMATION(
        ref_form    Varchar (4) NOT NULL ,
        nom_from    Varchar (50) NOT NULL ,
        tarif       Float NOT NULL ,
        duree_form  Float NOT NULL ,
        type_public Varchar (50) NOT NULL ,
        PRIMARY KEY (ref_form )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: SESSION
#------------------------------------------------------------

CREATE TABLE SESSION(
        id_session         Varchar (4) NOT NULL ,
        date_debut_session Date NOT NULL ,
        ref_form           Varchar (4) NOT NULL ,
        PRIMARY KEY (id_session ,ref_form )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CERTIFICATION
#------------------------------------------------------------

CREATE TABLE CERTIFICATION(
        id_certif  Varchar (4) NOT NULL ,
        lib_certif Varchar (50) NOT NULL ,
        PRIMARY KEY (id_certif )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CATEGORIE
#------------------------------------------------------------

CREATE TABLE CATEGORIE(
        id_categ  Varchar (4) NOT NULL ,
        nom_categ Varchar (25) NOT NULL ,
        PRIMARY KEY (id_categ )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: OBJECTIF
#------------------------------------------------------------

CREATE TABLE OBJECTIF(
        id_objectif  Varchar (5) NOT NULL ,
        lib_objectif Varchar (200) NOT NULL ,
        ref_form     Varchar (4) NOT NULL ,
        PRIMARY KEY (id_objectif ,ref_form )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PROG_ETAPE
#------------------------------------------------------------

CREATE TABLE PROG_ETAPE(
        id_etape  Varchar (5) NOT NULL ,
        lib_etape Varchar (100) NOT NULL ,
        ref_form  Varchar (4) NOT NULL ,
        PRIMARY KEY (id_etape ,ref_form )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PROG_SOUS_ETAPE
#------------------------------------------------------------

CREATE TABLE PROG_SOUS_ETAPE(
        id_sous_etape  Varchar (5) NOT NULL ,
        lib_sous_etape Varchar (100) NOT NULL ,
        id_etape       Varchar (5) NOT NULL ,
        ref_form       Varchar (4) NOT NULL ,
        PRIMARY KEY (id_sous_etape ,id_etape ,ref_form )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MEMBRE
#------------------------------------------------------------

CREATE TABLE MEMBRE(
        id_membre      Varchar (25) NOT NULL ,
        nom_membre     Varchar (25) NOT NULL ,
        prenom_membre  Varchar (25) NOT NULL ,
        tel_membre     Varchar (25) NOT NULL ,
        adresse_membre Varchar (50) NOT NULL ,
        PRIMARY KEY (id_membre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DELIVRER
#------------------------------------------------------------

CREATE TABLE DELIVRER(
        ref_form  Varchar (4) NOT NULL ,
        id_certif Varchar (4) NOT NULL ,
        PRIMARY KEY (ref_form ,id_certif )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: NECESSITER
#------------------------------------------------------------

CREATE TABLE NECESSITER(
        ref_form           Varchar (4) NOT NULL ,
        ref_form_FORMATION Varchar (4) NOT NULL ,
        PRIMARY KEY (ref_form ,ref_form_FORMATION )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: APPARTENIR
#------------------------------------------------------------

CREATE TABLE APPARTENIR(
        ref_form Varchar (4) NOT NULL ,
        id_categ Varchar (4) NOT NULL ,
        PRIMARY KEY (ref_form ,id_categ )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: INSCRIRE
#------------------------------------------------------------

CREATE TABLE INSCRIRE(
        etat_inscription    Char (25) ,
        session_inscription Varchar (25) ,
        id_membre           Varchar (25) NOT NULL ,
        ref_form            Varchar (4) NOT NULL ,
        PRIMARY KEY (id_membre ,ref_form )
)ENGINE=InnoDB;

ALTER TABLE SESSION ADD CONSTRAINT FK_SESSION_ref_form FOREIGN KEY (ref_form) REFERENCES FORMATION(ref_form);
ALTER TABLE OBJECTIF ADD CONSTRAINT FK_OBJECTIF_ref_form FOREIGN KEY (ref_form) REFERENCES FORMATION(ref_form);
ALTER TABLE PROG_ETAPE ADD CONSTRAINT FK_PROG_ETAPE_ref_form FOREIGN KEY (ref_form) REFERENCES FORMATION(ref_form);
ALTER TABLE PROG_SOUS_ETAPE ADD CONSTRAINT FK_PROG_SOUS_ETAPE_id_etape FOREIGN KEY (id_etape) REFERENCES PROG_ETAPE(id_etape);
ALTER TABLE PROG_SOUS_ETAPE ADD CONSTRAINT FK_PROG_SOUS_ETAPE_ref_form FOREIGN KEY (ref_form) REFERENCES FORMATION(ref_form);
ALTER TABLE DELIVRER ADD CONSTRAINT FK_DELIVRER_ref_form FOREIGN KEY (ref_form) REFERENCES FORMATION(ref_form);
ALTER TABLE DELIVRER ADD CONSTRAINT FK_DELIVRER_id_certif FOREIGN KEY (id_certif) REFERENCES CERTIFICATION(id_certif);
ALTER TABLE NECESSITER ADD CONSTRAINT FK_NECESSITER_ref_form FOREIGN KEY (ref_form) REFERENCES FORMATION(ref_form);
ALTER TABLE NECESSITER ADD CONSTRAINT FK_NECESSITER_ref_form_FORMATION FOREIGN KEY (ref_form_FORMATION) REFERENCES FORMATION(ref_form);
ALTER TABLE APPARTENIR ADD CONSTRAINT FK_APPARTENIR_ref_form FOREIGN KEY (ref_form) REFERENCES FORMATION(ref_form);
ALTER TABLE APPARTENIR ADD CONSTRAINT FK_APPARTENIR_id_categ FOREIGN KEY (id_categ) REFERENCES CATEGORIE(id_categ);
ALTER TABLE INSCRIRE ADD CONSTRAINT FK_INSCRIRE_id_membre FOREIGN KEY (id_membre) REFERENCES MEMBRE(id_membre);
ALTER TABLE INSCRIRE ADD CONSTRAINT FK_INSCRIRE_ref_form FOREIGN KEY (ref_form) REFERENCES FORMATION(ref_form);
