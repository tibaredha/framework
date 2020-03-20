################################################################################
##############################################Suppression des tables existantes#
################################################################################

DROP TABLE IF EXISTS `categorie`, `comment`, `message`, `user`;

################################################################################
#################################################### Structure de la table user#
################################################################################
CREATE TABLE `user` (
`user_id` int(11) NOT NULL auto_increment,
`user_type` char(1) NOT NULL default '0',
`user_pwd` varchar(32) binary NOT NULL default '',
`user_nom` varchar(255) binary default NULL,
`user_prenom` varchar(255) binary default NULL,
`user_pseudo` varchar(255) binary default NULL,
`user_email` varchar(255) default NULL,
`user_lang` char(3) default NULL,
`user_pref_cat` int(11) default NULL,
UNIQUE KEY `user_pseudo` (`user_pseudo`),
PRIMARY KEY  (`user_id`)
) TYPE=INNODB;

################################################################################	
################################################Structure de la table categorie#
################################################################################
CREATE TABLE `categorie` (
`cat_id` int(11) NOT NULL auto_increment,
`user_id` int(11) NOT NULL default '0',
`cat_libelle` varchar(255) NOT NULL default '',
`cat_desc` longtext,
UNIQUE KEY `cat_libelle` (`cat_libelle`),
PRIMARY KEY  (`cat_id`)
) TYPE=INNODB;

################################################################################	
################################################# Structure de la table message#
################################################################################		
CREATE TABLE `message` (
`message_id` int(11) NOT NULL auto_increment,
`cat_id` int(11) NOT NULL default '0',
`user_id` int(11) NOT NULL default '0',
`message_creadt` datetime default NULL,
`message_upddt` datetime default NULL,
`message_titre` varchar(255) default NULL,
`message_content` longtext,
PRIMARY KEY  (`message_id`)
) TYPE=INNODB;

################################################################################	
################################################# Structure de la table comment#
################################################################################
CREATE TABLE `comment` (
`comment_id` int(11) NOT NULL auto_increment,
`message_id` int(11) NOT NULL default '0',
`user_id` int(11) NOT NULL default '0',
`comment_titre` varchar(255) default NULL,
`comment_content` longtext,
`comment_dt` datetime default NULL,
PRIMARY KEY  (`comment_id`)
) TYPE=INNODB;

################################################################################
#####################################################################INDEXES&FK#
################################################################################
ALTER TABLE `categorie` ADD INDEX fk_categorie_user(user_id);
ALTER TABLE `categorie` ADD FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE;

ALTER TABLE `message` ADD INDEX fk_message_categorie(cat_id);
ALTER TABLE `message` ADD FOREIGN KEY (cat_id) REFERENCES categorie(cat_id) ON DELETE CASCADE;

ALTER TABLE `message` ADD INDEX fk_message_user(user_id);
ALTER TABLE `message` ADD FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE;

ALTER TABLE `comment` ADD INDEX fk_comment_user(user_id);
ALTER TABLE `comment` ADD FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE;

ALTER TABLE `comment` ADD INDEX fk_comment_message(message_id);
ALTER TABLE `comment` ADD FOREIGN KEY (message_id) REFERENCES message(message_id) ON DELETE CASCADE;