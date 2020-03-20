################################################################################	
##########################################################Remplir la table user#
################################################################################
INSERT INTO `user`
(`user_type`, 	`user_pwd`, 	`user_nom`, 	`user_prenom`, 	`user_pseudo`, 	`user_email`, 		`user_lang`, 	`user_pref_cat`) VALUES
('N', 		'nidhal', 	'NIDHAL', 	'nidhal', 	'nidhal', 	'nidhal@ejournal.ch', 	'AR', 		1);

INSERT INTO `user`
(`user_type`, 	`user_pwd`, 	`user_nom`, 	`user_prenom`, 	`user_pseudo`, 	`user_email`, 		`user_lang`, 	`user_pref_cat`) VALUES
('N', 		'luca', 	'LUCA', 	'luca', 	'luca', 	'luca@ejournal.ch', 	'EN', 		2);

INSERT INTO `user`
(`user_type`, 	`user_pwd`, 	`user_nom`, 	`user_prenom`, 	`user_pseudo`, 	`user_email`, 		`user_lang`, 	`user_pref_cat`) VALUES
('E', 		'aline', 	'ALINE', 	'aline', 	'aline', 	'aline@ejournal.ch', 	'EN', 		3);

INSERT INTO `user`
(`user_type`, 	`user_pwd`, 	`user_nom`, 	`user_prenom`, 	`user_pseudo`, 	`user_email`, 		`user_lang`, 	`user_pref_cat`) VALUES
('E', 		'julia', 	'JULIA', 	'julia', 	'julia', 	'julia@ejournal.ch', 	'AR', 		4);

INSERT INTO `user`
(`user_type`, 	`user_pwd`, 	`user_nom`, 	`user_prenom`, 	`user_pseudo`, 	`user_email`, 		`user_lang`, 	`user_pref_cat`) VALUES
('N', 		'monica', 	'MONICA', 	'monica', 	'monica', 	'monica@ejournal.ch', 	'FR', 		1);

INSERT INTO `user`
(`user_type`, 	`user_pwd`, 	`user_nom`, 	`user_prenom`, 	`user_pseudo`, 	`user_email`, 		`user_lang`, 	`user_pref_cat`) VALUES
('E', 		'anita', 	'ANITA', 	'anita', 	'anita', 	'anita@ejournal.ch', 	'FR', 		2);

################################################################################	
#####################################################Remplir la table categorie#
################################################################################
INSERT INTO `categorie` 
(`user_id`, 	`cat_libelle`, 	`cat_desc`) VALUES 
(1,		'STIC',		'STIC');

INSERT INTO `categorie` 
(`user_id`, 	`cat_libelle`, 	`cat_desc`) VALUES 
(2,		'COSYS',	'COSYS');

INSERT INTO `categorie` 
(`user_id`, 	`cat_libelle`, 	`cat_desc`) VALUES 
(1,		'COFOR',	'COFOR');

INSERT INTO `categorie` 
(`user_id`, 	`cat_libelle`, 	`cat_desc`) VALUES 
(2,		'EIAH',		'EIAH');

INSERT INTO `categorie` 
(`user_id`, 	`cat_libelle`, 	`cat_desc`) VALUES 
(1,		'METHODO',	'METHODO');

################################################################################	
#######################################################Remplir la table message#
################################################################################
INSERT INTO `message`
(`cat_id`, 	`user_id`, 	`message_creadt`,	`message_upddt`,		`message_titre`, 	`message_content`) VALUES 
(1,		1,		'2006-10-08 13:55:55',	'2006-10-08 13:55:55',	'My first message',	'My first message');

INSERT INTO `message`
(`cat_id`, 	`user_id`, 	`message_creadt`,	`message_upddt`,		`message_titre`, 	`message_content`) VALUES 
(2,		2,		'2006-10-09 13:55:55',	'2006-10-09 13:55:55',	'My second message',	'My second message');

INSERT INTO `message`
(`cat_id`, 	`user_id`, 	`message_creadt`,	`message_upddt`,		`message_titre`, 	`message_content`) VALUES 
(3,		1,		'2006-10-10 13:55:55',	'2006-10-10 13:55:55',	'My last message',	'My last message');

################################################################################	
#######################################################Remplir la table comment#
################################################################################
INSERT INTO `comment`
(`message_id`, 	user_id,	`comment_titre`, 	`comment_content`,	`comment_dt`) VALUES 
(1,		1,		'Un petit commentaire',	'No comment !',		'2006-10-10 13:55:55');