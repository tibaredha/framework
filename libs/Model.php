<?php

class Model {

    public $key = "tiba";  // Clé de 8 caractères max
	
	public $db = null; //*nouvelle facon d'instancier la PDO
	
	
	function __construct() {
		
		try {
		
		//instalation automatique de la base en cas de non existance 
		// $this->db0 = new PDO("mysql:host=localhost", DB_USER, DB_PASS);
		// $this->db0->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $requete = "CREATE DATABASE IF NOT EXISTS `".DB_NAME."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
        // $this->db0->prepare($requete)->execute();
		// $this->createdb(DB_NAME);
		// PDO::ATTR_DEFAULT_FETCH_MODE PDO::FETCH_BOTH (défaut)
		//connection automatique de la base en cas de non existance 
		
		
		if($this->db === null){$this->db=new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);} //*nouvelle facon d'instancier la PDO
		// $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		
		//Par défaut PDO n'affiche pas les différentes erreurs liées au code ou aux requêtes. 
		//Pour les faire apparaitre, vous devez activer l'option lors de la connexion.
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// error_reporting(E_ALL); 
		// ini_set('display_errors', TRUE); 
		// ini_set('display_startup_errors', TRUE);
		
		
		$this->db->exec("SET CHARACTER SET utf8");
		$this->db->exec("RESET MASTER");//pour suprimer les bin logs 	
		
		
		
		
		//instalation automatique des tables en cas de non existance 
		$this->tableExists($this->db, 'users');
		$this->tableExists($this->db, 'deceshosp');
		$this->tableExists($this->db, 'activation');
		$this->tableExists($this->db, 'niveau');
		} 
		catch (PDOException $e) 
		{
		Session::init();	
		Session::set('error','Echec de connexion : '. $e->getMessage());
		}	
	}
	
	
	// public function createdb($nomdb){
		// $sql = "CREATE DATABASE IF NOT EXISTS $nomdb";
		// $sth = $this->db->prepare($sql);
		// $sth->execute();
		
	// }
	
	function tableExists($pdo, $table) 
	{
		try 
		{	
			$result = $pdo->query("SELECT 1 FROM $table LIMIT 1");
		} 
		catch (Exception $e) 
		{
			$this->create_table($table);
		}
    }
	
	function create_table($table) 
	{
		switch($table) 
		{
			case 'users' : $this->users($table);break;	
			case 'deceshosp' : $this->deceshosp($table);break;
			case 'activation' : $this->activation($table);break;
            case 'niveau' : $this->activation($table);break;


			
		}  
	}
	
	
	public function niveau ($table)
	{
		$strSQL = " CREATE TABLE `".$table."` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
        `nom_niveau` varchar(150) NOT NULL,
		PRIMARY KEY (`id`)
		)   ENGINE=MyISAM DEFAULT CHARSET=utf8;
		";
		$sth = $this->db->prepare($strSQL);
		$sth->execute();
        $this->db->insert($table, array('id' => 1,'nom_niveau' => 'Administrateur'));	
		$this->db->insert($table, array('id' => 2,'nom_niveau' => 'Moderateur'));
		$this->db->insert($table, array('id' => 3,'nom_niveau' => 'Membre'));	
		
	}
	
	public function activation ($table)
	{
		$strSQL = " CREATE TABLE `".$table."` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`mode` varchar(150) NOT NULL,
		`activation` int(1) NOT NULL,
		PRIMARY KEY (`id`)
		)   ENGINE=MyISAM DEFAULT CHARSET=utf8;
		";
		$sth = $this->db->prepare($strSQL);
		$sth->execute();
        $this->db->insert($table, array('id' => 1,'mode' => 'aucune','activation' => '1'));	
		$this->db->insert($table, array('id' => 2,'mode' => 'mail','activation' => '0'));
		$this->db->insert($table, array('id' => 3,'mode' => 'manuel','activation' => '0'));	
		
	}
	
	public function users ($table)
	{
		$strSQL = " CREATE TABLE `".$table."` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`login` varchar(200) NOT NULL,
		`password` varchar(200) NOT NULL,
		`role` int(11) NOT NULL,
		`Email` varchar(100) NOT NULL,
		`wilaya` int(50) NOT NULL,
		`structure` int(50) NOT NULL,
		`lang` varchar(10) NOT NULL,
		`token` varchar(60) NOT NULL,
		`confirmed_at` date NOT NULL,
		`reset_token` varchar(60) NOT NULL,
		`reset_at` date NOT NULL,
		`remember_token` varchar(50) NOT NULL,
		`activation` int(11) NOT NULL,
		`Nom` varchar(50) NOT NULL,
		`Prenom` varchar(50) NOT NULL,
		`Telephone` varchar(50) NOT NULL,
		`Facebook` varchar(50) NOT NULL, 
		PRIMARY KEY (`id`) 
		)   ENGINE=MyISAM DEFAULT CHARSET=utf8;
		";
		$sth = $this->db->prepare($strSQL);
		$sth->execute();//sadmin
        $this->db->insert($table, array('id' => 1,'login' => 'sadmin','password' => md5('sadmin'),'role' => 1,'Email' => 'sadmin@yahoo.fr','wilaya' => 17000,'structure' => 1,'lang' => 'fr','token' => '','confirmed_at' => '2020-01-26','reset_token' => '','reset_at' => '2020-01-26','remember_token' => 'rltBL3jedSir3faFp90y','activation' => '1','Nom' => 'sadmin','Prenom' => 'sadmin','Telephone' => '0772718059','Facebook' => 'tibaredha'));	
		$this->db->insert($table, array('id' => 2,'login' => 'admin', 'password' => md5('admin'), 'role' => 2,'Email' => 'admin@yahoo.fr', 'wilaya' => 17000,'structure' => 1,'lang' => 'fr','token' => '','confirmed_at' => '2020-01-26','reset_token' => '','reset_at' => '2020-01-26','remember_token' => '45gF5GGbTluJNEbyaIoO','activation' => '1','Nom' => 'admin','Prenom'  => 'admin', 'Telephone' => '0772718059','Facebook' => 'tibaredha'));	
		
	}
	public function deceshosp ($table)
	{
		$strSQL = " CREATE TABLE `".$table."` (
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
		`CRS` int(50) NOT NULL COMMENT 'CENTRE REGIONALE ',
		`WRS` int(50) NOT NULL COMMENT 'WILAYA REGIONAL ',
		`SRS` int(50) NOT NULL COMMENT 'STRUCTURE ',
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
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		";
		$sth = $this->db->prepare($strSQL);
		$sth->execute();		
	}
	
	public function check_empty($data, $fields)
	{
		$msgr = null;
		foreach ($fields as $value) {
			if (empty($data[$value])) {
				$msgr .= "$value field empty <br />";
			}
		} 
		return $msgr;
	}
	
	
	
	public function affichage($data) {
		echo '<pre>';print_r ($data);echo '</pre>';
	}
	function str_random($length)
	{
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }
	
    function dateFR2US($date){$J = substr($date,0,2);$M = substr($date,3,2);$A = substr($date,6,4);$dateFR2US =  $A."-".$M."-".$J ;return $dateFR2US;}
	
	function dateUS2FR($date){$J = substr($date,8,2);$M = substr($date,5,2);$A = substr($date,0,4);$dateUS2FR =  $J."-".$M."-".$A ;return $dateUS2FR;}
	
	
	// calculate date difference 1
	function CalculateTimestampFromCurrDatetime($DateTime = -1) 
    {
	if ($DateTime == -1 || $DateTime == '' || $DateTime == '0000-00-00 00:00:00' || $DateTime == '0000-00-00') 
	{
		$DateTime = date("Y-m-d H:i:s");
	}
	$NewDate['year']   = substr($DateTime,0,4);
	$NewDate['month']  = substr($DateTime,5,2);
	$NewDate['day']    = substr($DateTime,8,2);
	$NewDate['hour']   = substr($DateTime,11,2);
	$NewDate['minute'] = substr($DateTime,14,2);
	$NewDate['second'] = substr($DateTime,17,2);
	return mktime($NewDate['hour'], $NewDate['minute'], $NewDate['second'], $NewDate['month'], $NewDate['day'], $NewDate['year']);
   }
   
   // calculate date difference 2
	function CalculateDateDifference($TimestampFirst, $TimestampSecond = -1)	
	{
		if ($TimestampSecond == -1) 
		{
			$TimestampSecond = CalculateTimestampFromCurrDatetime();
		}

		if ($TimestampSecond < $TimestampFirst) 
		{
			$TempTimestamp = $TimestampFirst;
			$TimestampFirst = $TimestampSecond;
			$TimestampSecond = $TempTimestamp;
			
			$NegativeDifference = true;
		}
		else 
		{
			$NegativeDifference = false;
		}

		list($Year1, $Month1, $Day1) = explode('-', date('Y-m-d', $TimestampFirst));
		list($Year2, $Month2, $Day2) = explode('-', date('Y-m-d', $TimestampSecond));
		$Time1 = (date('H',$TimestampFirst)*3600) + (date('i',$TimestampFirst)*60) + (date('s',$TimestampFirst));
		$Time2 = (date('H',$TimestampSecond)*3600) + (date('i',$TimestampSecond)*60) + (date('s',$TimestampSecond));

		$YearDiff = $Year2 - $Year1;
		$MonthDiff = ($Year2 * 12 + $Month2) - ($Year1 * 12 + $Month1);

		if($Month1 > $Month2)
		{
			$YearDiff -= 1;
		}
		elseif($Month1 == $Month2)
		{
			if($Day1 > $Day2) 
			{
				$YearDiff -= 1;
			}
			elseif($Day1 == $Day2) 
			{
				if($Time1 > $Time2) 
				{
					$YearDiff -= 1;
				}
			}
		}

		// handle over flow of month difference
		if($Day1 > $Day2) 
		{
			$MonthDiff -= 1;
		}
		elseif($Day1 == $Day2) 
		{
			if($Time1 > $Time2) 
			{
				$MonthDiff -= 1;
			}
		}

		$DateDifference = Array();
		$TotalSeconds = $TimestampSecond - $TimestampFirst;

		$WeekDiff = floor(($TotalSeconds / 604800));
		$DayDiff = floor(($TotalSeconds / 86400));

		if ($NegativeDifference == true) 
		{
			$DateDifference['years'] = ($YearDiff == 0) ? $YearDiff : -($YearDiff);
			$DateDifference['months'] = ($MonthDiff == 0) ? $MonthDiff : -($MonthDiff);
			$DateDifference['weeks'] = ($WeekDiff == 0) ? $WeekDiff : -($WeekDiff);
			$DateDifference['days'] = ($DayDiff == 0) ? $DayDiff : -($DayDiff);
		}
		else 
		{
			$DateDifference['years'] = $YearDiff;
			$DateDifference['months'] = $MonthDiff;
			$DateDifference['weeks'] = $WeekDiff;
			$DateDifference['days'] = $DayDiff;
		}
		
		return $DateDifference;
	}
   
}