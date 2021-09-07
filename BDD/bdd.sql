#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        Users_id  Int  Auto_increment  NOT NULL ,
        pseudo    Varchar (50) NOT NULL ,
        email     Varchar (100) NOT NULL ,
        authlevel Int NOT NULL ,
        password  Varchar (100) NOT NULL
	,CONSTRAINT Users_PK PRIMARY KEY (Users_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Planets
#------------------------------------------------------------

CREATE TABLE Planets(
        Planets_id         Int  Auto_increment  NOT NULL ,
        name               Varchar (50) NOT NULL ,
        image              Longtext NOT NULL ,
        diameter           Int NOT NULL ,
        field_max          Int NOT NULL ,
        temp_max           Int NOT NULL ,
        metal              Int NOT NULL ,
        metal_per_hour     Int NOT NULL ,
        metal_max          Int NOT NULL ,
        cristal            Int NOT NULL ,
        cristal_per_hour   Int NOT NULL ,
        cristal_max        Int NOT NULL ,
        deuterium          Int NOT NULL ,
        deuterium_per_hour Int NOT NULL ,
        deuterium_max      Int NOT NULL ,
        Users_id           Int NOT NULL
	,CONSTRAINT Planets_PK PRIMARY KEY (Planets_id)

	,CONSTRAINT Planets_Users_FK FOREIGN KEY (Users_id) REFERENCES Users(Users_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Building
#------------------------------------------------------------

CREATE TABLE Building(
        Building_id     Int  Auto_increment  NOT NULL ,
        name            Varchar (150) NOT NULL ,
        level           Int NOT NULL ,
        metal_price     Int NOT NULL ,
        cristal_price   Int NOT NULL ,
        deuterium_price Int NOT NULL ,
        Users_id        Int NOT NULL
	,CONSTRAINT Building_PK PRIMARY KEY (Building_id)

	,CONSTRAINT Building_Users_FK FOREIGN KEY (Users_id) REFERENCES Users(Users_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Defense
#------------------------------------------------------------

CREATE TABLE Defense(
        Defense_id      Int  Auto_increment  NOT NULL ,
        name            Varchar (150) NOT NULL ,
        level           Int NOT NULL ,
        metal_price     Int NOT NULL ,
        cristal_price   Int NOT NULL ,
        deuterium_price Int NOT NULL ,
        Users_id        Int NOT NULL
	,CONSTRAINT Defense_PK PRIMARY KEY (Defense_id)

	,CONSTRAINT Defense_Users_FK FOREIGN KEY (Users_id) REFERENCES Users(Users_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Research
#------------------------------------------------------------

CREATE TABLE Research(
        Research_id     Int  Auto_increment  NOT NULL ,
        name            Varchar (150) NOT NULL ,
        level           Int NOT NULL ,
        metal_price     Int NOT NULL ,
        cristal_price   Int NOT NULL ,
        deuterium_price Int NOT NULL ,
        Users_id        Int NOT NULL
	,CONSTRAINT Research_PK PRIMARY KEY (Research_id)

	,CONSTRAINT Research_Users_FK FOREIGN KEY (Users_id) REFERENCES Users(Users_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Shipyard
#------------------------------------------------------------

CREATE TABLE Shipyard(
        Shipyard_id     Int  Auto_increment  NOT NULL ,
        name            Varchar (150) NOT NULL ,
        level           Int NOT NULL ,
        metal_price     Int NOT NULL ,
        cristal_price   Int NOT NULL ,
        deuterium_price Int NOT NULL ,
        Users_id        Int NOT NULL
	,CONSTRAINT Shipyard_PK PRIMARY KEY (Shipyard_id)

	,CONSTRAINT Shipyard_Users_FK FOREIGN KEY (Users_id) REFERENCES Users(Users_id)
)ENGINE=InnoDB;