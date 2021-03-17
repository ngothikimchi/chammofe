drop database if exists antigaspi ;
create database antigaspi; 
	use antigaspi ;

-- #table association

create table association 
(
	idassoc int(10) not null auto_increment,
	numSIREN varchar(10),
	nomassoc varchar(35) not null,
	objetassoc varchar(35) not null, 
	rpzassoc varchar(35) not null,
	telassoc varchar(10) not null,
	emailassoc varchar(50) not null, 
	siegesocialassoc varchar(50),
	adresseassoc varchar(80) not null,
	cpassoc varchar(5) not null, 
	villeassoc varchar(30) not null, 

	primary key (idassoc)	
);

-- #table enseigne

create table enseigne 
(
	numSIRET varchar(10) not null, 
	nomens varchar(35) not null,
	statutens varchar(35) not null, 
	typeens varchar(35) not null, 				
	-- #boulangerie, epicerie, hypermarché,...
	directeur varchar(70) not null,
	siegesocialens varchar(50),
	adresseens varchar(80) not null,
	villeens varchar(30) not null,
	cpens varchar(5) not null,
	responsable varchar(35),		 			
	-- #responsable des échanges

	primary key (numSIRET)		
);

-- #table catégorie 

create table categorie 
(
	idcat int(10) not null auto_increment, 
	nomcat varchar(35) not null,
	souscat varchar(35), 

	primary key (idcat)		
);

-- #table produit 

create table produit  
(
	codeprod varchar(10) not null, 
	nomprod varchar(35) not null,
	marque varchar(35) not null, 
	idcat int(10) not null,  
	primary key (codeprod),
	foreign key (idcat) references categorie(idcat)
);

-- #table offre

create table offre 
(
	idoffre int(10) not null auto_increment, 
	objetoffre varchar(35) not null,
	qteoffre int(10) not null, 
	dateoffre date not null, 
	datefinoffre date, 				
	-- #date jusqu'à laquelle l'offre sera valide
	numSIRET varchar(10) not null, 
	codeprod varchar(10) not null, 


	primary key (idoffre),
	foreign key (codeprod) references produit(codeprod),
	foreign key (numSIRET) references enseigne(numSIRET) 		
);


-- #table demande 

create table demande 
(
	iddem int(10) not null auto_increment, 
	datedem date not null, 
	qtedem int(10) not null, 
	idassoc int(10) not null,
	idoffre int(10) not null,
	statut varchar(10) not null DEFAULT 'en cours',
	-- statut varchar(10) not null DEFAULT 'encours', -- encours/valide/refuse
	primary key (iddem),
	foreign key (idassoc) references association(idassoc),
	foreign key (idoffre) references offre(idoffre) 	
);


-- #table rdv livraison

create table rdv  
(
	idrdv int(10) not null auto_increment, 
	daterdv datetime not null, 
	adresserdv varchar(35) not null,
	cprdv varchar(5) not null, 
	villerdv varchar(30) not null, 
    iddem int(10) not null,
	primary key (idrdv),
	foreign key (iddem) references demande(iddem) 
);

-- #table fixer
-- create table fixer
-- (	
-- 	idrdv int(10) not null, 
-- 	iddem int(10) not null, 

-- 	primary key (iddem,idrdv),
-- 	foreign key (iddem) references demande(iddem),
-- 	foreign key (idrdv) references rdv(idrdv)
-- );