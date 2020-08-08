<?php
class Database extends PDO
{
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
		
	}
	
	//1-SQL (Structured Query Language):
		//1-1-DDL(Data Definition Langage):
				// -SHOW DATABASES ,CREATE DATABASE xxxx,CREATE DATABASE IF NOT EXISTS xxx, USE xxxx , DROP DATABASE xxx:
				// -SHOW TABLES, CREATE TABLE xxx ('id' INT,'nom' varchar(50),'prenom' varchar(50),'age' INT),CREATE TABLE IF NOT EXISTS xxx, ALTER TABLE, RENAME TABLE, DROP TABLE,DESCRIBE TABLE     
				// -CREATE INDEX, DROP INDEX
                // -la création d’objets comme les procédures stockées, les vues, et
		
           //Index: peuvent être créés de deux manières : soit directement lors de la création de la table ou soit en les ajoutant par la suite
				   // *index 
				   // *index UNIQUE
				   // *index FULLTEXT
				   // *index SPATIAL
			
					// CREATE TABLE Animal (
					// id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
					// espece VARCHAR(40) NOT NULL,
					// sexe CHAR(1),
					// date_naissance DATETIME NOT NULL,
					// nom VARCHAR(30),
					// commentaires TEXT,
					// PRIMARY KEY (id),
					// INDEX ind_date_naissance (date_naissance),
					// INDEX ind_nom (nom(10)),
					// UNIQUE INDEX ind_uni_nom_espece (nom, espece) -- Index sur le
					// nom et l'espece
					// )E
					// NGINE=INNODB;
			
					// ALTER TABLE Test_tuto
					// ADD INDEX ind_nom (nom);
						
					// CREATE INDEX nom_index
					// ON nom_table (colonne_index [, colonne2_index ...]); -- Crée un index simple
					
					// CREATE UNIQUE INDEX nom_index
					// ON nom_table (colonne_index [, colonne2_index ...]); -- Crée un index UNIQUE
				 
					// CREATE FULLTEXT INDEX nom_index
					// ON nom_table (colonne_index [, colonne2_index ...]); -- Crée un index FULLTEXT	
			
					// ALTER TABLE nom_table
					// DROP INDEX nom_index;
	       //les clés : les clés font partie de ce qu'on appelle les contraintes
                    //***La clé primaire d'une table : PRIMARY KEY : est un index UNIQUE sur une colonne qui ne peut pas être NULL (NOT NULL).
                    //***Les clés étrangères
					// CREATE TABLE Commande (
					// numero INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
					// client INT UNSIGNED NOT NULL,
					// produit VARCHAR(40),
					// quantite SMALLINT DEFAULT 1,
					// CONSTRAINT fk_client_numero -- On donne un nom à notre clé 
					// FOREIGN KEY (client)        -- Colonne sur laquelle on crée la clé
					// REFERENCES Client(numero)   -- Colonne de référence
					// )
					// ENGINE=InnoDB;              -- MyISAM interdit, je le rappelle encore une fois !
				    // ALTER TABLE Commande ADD CONSTRAINT fk_client_numero FOREIGN KEY client REFERENCES Client(numero);
                    // ALTER TABLE nom_table DROP FOREIGN KEY symbole_contrainte
		   
		            // ON DELETE, qui permet de déterminer le comportement de MySQL en cas de suppression d'une référence ;
                    // ON UPDATE, qui permet de déterminer le comportement de MySQL en cas de modification d'une référence.
		   
		   //A-jointure sera toujours au moins aussi rapide que la même requête faite avec une sous-requête  
				//1:jointure externe:LEFTT JOIN:toutes les lignes de la table de gauche (sauf restrictions dans une clause WHERE bien sûr), même si certaines n'ont pas de correspondance avec une ligne de la table de droite.
				//2:jointure externe:RIGHT JOIN:toutes les lignes de la table de droite qui sont sélectionnées même s'il n'y a pas de correspondance dans la table de gauche                                  
				//3:jointure interne:INNER JOIN:qu'on exige qu'il y ait des données de part et d'autre de la jointure
			    
			// Union de plusieurs requêtes
				// SELECT ...
				// UNION
				// SELECT ...
		   
		   //B-sous-requête Dans le  (FROM/CONDITION)
				//***************FROM*****************//
				// SELECT XSDFSFSDF
				// FROM 
				//(
					// SELECT *
					// FROM Y 
					// INNER JOIN X
					// ON S.id = D.id
					// WHERE sexe = 'F' AND Espece.nom_courant IN ('Tortue d''Hermann','Perroquet amazone')
				// ) AS DDDDDDDDDD;
				//***************CONDITION*****************//
				// SELECT id, sexe, nom, commentaires, espece_id, race_id
				// FROM Animal
				// WHERE race_id = (SELECT id FROM Race WHERE nom = 'Berger Allemand');
 
		    //C-Sécuriser et automatiser ses actions
				// -les transactions:la table doit être transactionnelle : défini par le moteur de stockage:MyISAM et InnoDB., ;
				     // — les tables MyISAM sont non-transactionnelles ;
                     // — les tables InnoDB sont transactionnelles
				         //commite= pour valider les requêtes d’une transaction:MySQL est donc en mode ”autocommit”par defaut Pour //quitter ce mode: SET autocommit=0;.
				         //rollback=pour annuler les requêtes d’une transaction:
				
				// -les verrous ;
				// -les requêtes préparées.
				// -procédures stockées 
				// -triggers
			//D-Vues	
				//CREATE [OR REPLACE] VIEW nom_vue
				//AS requete_select;
				//SELECT * FROM V_Animal_details;
			//E-Tables temporaires
			
			//1-2-*DML(DATA MANIPUALTION LAGUAGE)://Create, Read, Update, Delete).//INSERT:SELECT:UPDATE:DELETE
	        //1-3-*DCL (Data Control Language):	   
			//-Gestion des utilisateurs DB:mysql avec plusieur tables:
				// mysql.user.
				// mysql.db, 
				// mysql.tables_priv, 
				// mysql.columns_priv 
				// mysql.procs_priv.
				//utilisateur
					//CREATE USER 'tibaredha'@'localhost' IDENTIFIED BY '030570';
					//RENAME USER 'max'@'localhost' TO 'maxime'@'localhost';
					//SET PASSWORD FOR 'thibault'@'194.28.12.%' = PASSWORD('basket8');
					//DROP USER 'amranemimi'@'localhost';
				//prvilaige des utilistaeurs
					//GRANT SELECT,UPDATE,DELETE,INSERT ON framework.deceshosp TO 'yahia'@'localhost' IDENTIFIED BY '030570';
					//REVOKE DELETE ON elevage.Animal FROM 'john'@'localhost';
					//GRANT ALL   ON elevage.Client TO 'john'@'localhost';
					//GRANT USAGE ON *.*            TO 'john'@'localhost' IDENTIFIED BY 'test2012usage';						
	
	        //1-4-* LCT (Transaction Control Language):
	
		   
		   
	
	//2-DBMS RDBMS : MYSQL
	    //mysql -h localhost -u root -p
		//SET NAMES 'utf8';
		//Interclassement
	//3-DATABASE/TABLES
	

	
	//**********************************************************************************************************//
	
	public function createdb($nomdb){
		$sql = "CREATE DATABASE IF NOT EXISTS $nomdb";
		$sth = $this->db->prepare($sql);
		$sth->execute();
		
	}
	
	public function createtbl($nomtbl){
		$sql = "CREATE TABLE IF NOT EXISTS  $nomtbl (
				id INT(6) UNSIGNED    AUTO_INCREMENT PRIMARY KEY, 
				firstname VARCHAR(30) NOT NULL,
				lastname  VARCHAR(30) NOT NULL,
				email     VARCHAR(50),
				reg_date  TIMESTAMP
				)";
		$sth = $this->db->prepare($sql);
		$sth->execute();
		
	}
	//**********************************************************************************************************//
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC){
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value) {$sth->bindValue("$key", $value);}
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	
	public function insert($table, $data){
		ksort($data);
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
		foreach ($data as $key => $value) {$sth->bindValue(":$key", $value);}
		$sth->execute();
	}
	
	public function update($table, $data, $where){
		ksort($data);
		$fieldDetails = NULL;
		foreach($data as $key=> $value) {$fieldDetails .= "`$key`=:$key,";}
		$fieldDetails = rtrim($fieldDetails, ',');
		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		foreach ($data as $key => $value) {$sth->bindValue(":$key", $value);}
		$sth->execute();
	}
	
	public function delete($table, $where, $limit = 1){
		return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
	}
	
	public function deletem($table, $where) {
        return $this->exec("DELETE FROM $table WHERE $where ");
    }
	//**********************************************************************************************************//
	public function CHECK($table) {
        return $this->exec("CHECK TABLE $table ");
    }
	
	public function ANALYZE($table) {
        return $this->exec("ANALYZE TABLE $table ");
    }
	
	public function REPAIR($table) {
        return $this->exec("REPAIR TABLE $table ");
    }
	
	public function OPTIMIZE($table) {
        return $this->exec("OPTIMIZE TABLE $table ");
    }
	
	public function FLUSH($table) {
        return $this->exec("FLUSH TABLE $table ");
    }
		
}