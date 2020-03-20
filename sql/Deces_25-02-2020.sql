-- ----------------------
-- dump de la base framework au 25-02-2020
-- ----------------------


-- -----------------------------
-- Structure de la table deceshosp
-- -----------------------------
CREATE TABLE `deceshosp` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `WILAYAD` int(20) NOT NULL,
  `COMMUNED` int(20) NOT NULL,
  `STRUCTURED` int(50) NOT NULL,
  `NOM` varchar(100) NOT NULL,
  `PRENOM` varchar(100) NOT NULL,
  `FILSDE` varchar(100) NOT NULL,
  `ETDE` varchar(100) NOT NULL,
  `SEX` varchar(10) NOT NULL,
  `DATENAISSANCE` varchar(30) NOT NULL,
  `Days` int(50) NOT NULL,
  `Weeks` int(50) NOT NULL,
  `Months` int(50) NOT NULL,
  `Years` int(50) NOT NULL,
  `WILAYA` int(40) NOT NULL,
  `WILAYAR` int(20) NOT NULL,
  `COMMUNE` int(40) NOT NULL,
  `COMMUNER` int(40) NOT NULL,
  `ADRESSE` varchar(50) NOT NULL,
  `CD` varchar(20) NOT NULL,
  `LD` varchar(20) NOT NULL,
  `AUTRES` varchar(20) NOT NULL,
  `OMLI` varchar(20) NOT NULL,
  `MIEC` varchar(20) NOT NULL,
  `EPFP` varchar(20) NOT NULL,
  `CIM1` varchar(150) NOT NULL,
  `CIM2` varchar(150) NOT NULL,
  `CIM3` varchar(150) NOT NULL,
  `CIM4` varchar(150) NOT NULL,
  `CIM5` varchar(150) NOT NULL,
  `NDLM` varchar(20) NOT NULL,
  `NDLMAAP` varchar(50) NOT NULL,
  `GM` varchar(10) NOT NULL,
  `MN` varchar(10) NOT NULL,
  `AGEGEST` int(10) NOT NULL,
  `POIDNSC` float NOT NULL,
  `AGEMERE` int(20) NOT NULL,
  `DPNAT` varchar(10) NOT NULL,
  `EMDPNAT` varchar(20) NOT NULL,
  `DECEMAT` int(10) NOT NULL,
  `GRS` varchar(20) NOT NULL,
  `POSTOPP` varchar(20) NOT NULL,
  `DATEHOSPI` varchar(50) NOT NULL,
  `HEURESHOSPI` varchar(50) NOT NULL,
  `SERVICEHOSPIT` int(10) NOT NULL,
  `DUREEHOSPIT` int(10) NOT NULL,
  `MEDECINHOSPIT` varchar(50) NOT NULL,
  `CODECIM0` int(11) NOT NULL,
  `CODECIM` int(20) NOT NULL,
  `CRS` int(50) NOT NULL COMMENT 'CENTRE REGIONALE DUSANG',
  `WRS` int(50) NOT NULL COMMENT 'WILAYA REGIONAL DU SANG',
  `SRS` int(50) NOT NULL COMMENT 'STRUCTURE DU SANG',
  `USER` varchar(50) NOT NULL COMMENT 'UTILISATEUR STRUCTURE',
  `DINS` varchar(50) NOT NULL COMMENT 'date inscription',
  `HINS` varchar(50) NOT NULL COMMENT 'heure inscription',
  `NOMAR` varchar(50) NOT NULL,
  `PRENOMAR` varchar(50) NOT NULL,
  `FILSDEAR` varchar(50) NOT NULL,
  `ETDEAR` varchar(50) NOT NULL,
  `NOMPRENOMAR` varchar(50) NOT NULL,
  `PROAR` varchar(50) NOT NULL,
  `ADAR` varchar(50) NOT NULL,
  `Profession` int(10) NOT NULL,
  `aprouve` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cust_name_idx` (`NOM`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



-- -----------------------------
-- Contenu de la table deceshosp
-- -----------------------------
INSERT INTO deceshosp VALUES(1, 17000, 948, 4, 'TIBA', 'REDHA', 'ATHMANE', 'AICHA', 'M', '1970-05-03', 18192, 2598, 597, 49, 25000, 17000, 1381, 948, '', 'CN', 'SSP', '', '', '', '', 'Amibiase (A06)', '', '', '', '', 'NAT', 'x', '', '', 0, 0, 0, '', '', 0, 'IDETER', '', '2020-02-23', '21:58', 20, 0, 'ZOUBIR_HAMID', 1, 7, 0, 17000, 4, 'tibaredha', '2020-02-23', '21:58', 'نتانتانتانت', 'تلتتال', 'تاللتال', 'تالتلال', 'تلتلال', 'jhgjhghgggg', 'لللللل', 11, 0);

