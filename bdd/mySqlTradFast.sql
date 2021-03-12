#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        id_role Int  Auto_increment  NOT NULL ,
        role    Varchar (100) NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: restaurent 
#------------------------------------------------------------

CREATE TABLE restaurent(
        id_restaurent Int  Auto_increment  NOT NULL ,
        nom           Varchar (50) NOT NULL ,
        pseudo        Varchar (50) NOT NULL ,
        adresse       Varchar (100) NOT NULL ,
        tel           Int NOT NULL ,
        email         Varchar (100) NOT NULL ,
        code_postal   Varchar (100) NOT NULL ,
        mdp           Varchar (100) NOT NULL ,
        image         Varchar (1000) NOT NULL ,
        id_role       Int NOT NULL
	,CONSTRAINT restaurent_PK PRIMARY KEY (id_restaurent)

	,CONSTRAINT restaurent_role_FK FOREIGN KEY (id_role) REFERENCES role(id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type_cuisine
#------------------------------------------------------------

CREATE TABLE type_cuisine(
        id_cuisine Int  Auto_increment  NOT NULL ,
        cuisine    Varchar (100) NOT NULL
	,CONSTRAINT type_cuisine_PK PRIMARY KEY (id_cuisine)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
        id_client     Int  Auto_increment  NOT NULL ,
        nom_client    Varchar (100) NOT NULL ,
        prenom_client Varchar (100) NOT NULL ,
        adresse       Varchar (500) NOT NULL ,
        code_postal   Varchar (100) NOT NULL ,
        client_email  Varchar (100) NOT NULL ,
        tel           Int NOT NULL ,
        mdp_client    Varchar (1000) NOT NULL ,
        id_role       Int NOT NULL
	,CONSTRAINT client_PK PRIMARY KEY (id_client)

	,CONSTRAINT client_role_FK FOREIGN KEY (id_role) REFERENCES role(id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commande
#------------------------------------------------------------

CREATE TABLE commande(
        id_commande       Int  Auto_increment  NOT NULL ,
        date_de_commande  Date NOT NULL ,
        quantite          Numeric NOT NULL ,
        date_de_livraison Date NOT NULL ,
        id_client         Int NOT NULL
	,CONSTRAINT commande_PK PRIMARY KEY (id_commande)

	,CONSTRAINT commande_client_FK FOREIGN KEY (id_client) REFERENCES client(id_client)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: menue
#------------------------------------------------------------

CREATE TABLE menue(
        id_menue      Int  Auto_increment  NOT NULL ,
        entree        Varchar (200) NOT NULL ,
        main          Varchar (200) NOT NULL ,
        dessert       Varchar (200) NOT NULL ,
        id_restaurent Int NOT NULL
	,CONSTRAINT menue_PK PRIMARY KEY (id_menue)

	,CONSTRAINT menue_restaurent_FK FOREIGN KEY (id_restaurent) REFERENCES restaurent(id_restaurent)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: plat
#------------------------------------------------------------

CREATE TABLE plat(
        id_plat    Int  Auto_increment  NOT NULL ,
        plat       Varchar (200) NOT NULL ,
        ingredient Varchar (1000) NOT NULL ,
        prix       Numeric NOT NULL ,
        id_menue   Int NOT NULL
	,CONSTRAINT plat_PK PRIMARY KEY (id_plat)

	,CONSTRAINT plat_menue_FK FOREIGN KEY (id_menue) REFERENCES menue(id_menue)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: specialite
#------------------------------------------------------------

CREATE TABLE specialite(
        id_cuisine    Int NOT NULL ,
        id_restaurent Int NOT NULL
	,CONSTRAINT specialite_PK PRIMARY KEY (id_cuisine,id_restaurent)

	,CONSTRAINT specialite_type_cuisine_FK FOREIGN KEY (id_cuisine) REFERENCES type_cuisine(id_cuisine)
	,CONSTRAINT specialite_restaurent0_FK FOREIGN KEY (id_restaurent) REFERENCES restaurent(id_restaurent)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commander
#------------------------------------------------------------

CREATE TABLE commander(
        id_commande Int NOT NULL ,
        id_plat     Int NOT NULL
	,CONSTRAINT commander_PK PRIMARY KEY (id_commande,id_plat)

	,CONSTRAINT commander_commande_FK FOREIGN KEY (id_commande) REFERENCES commande(id_commande)
	,CONSTRAINT commander_plat0_FK FOREIGN KEY (id_plat) REFERENCES plat(id_plat)
)ENGINE=InnoDB;

