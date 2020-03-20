<?php

class clsig  {
	
	public $db_host;
	public $db_name;   
	public $db_user;
	public $db_pass;
	public $userListviewm ;
	public $userListviewa ;
	public $urlx ;
	public $cnx;
	public $db;
	public $valeur;
	
	
	
	function __construct() {
	$this->db_host=DB_HOST;
	$this->db_name=DB_NAME;   
	$this->db_user=DB_USER;
	$this->db_pass=DB_PASS;
	}
	
	function mysqlconnectx()
	{
	$this->cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$this->db  = mysql_select_db($this->db_name,$this->cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $this->db;
	}
	function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
		if (is_numeric($colonevalue) and $colonevalue!=='0') 
		{ 
		$this->mysqlconnectx();
		$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
		$row=mysql_fetch_object($result);
		$resultat=$row->$resultatstring;
		return $resultat;
		}
        else
        {
		return $resultat2='??????';
		}		
	} 
	function colorsig($x) 
	{	
		if($x < 1){$this->valeur= "#b9b9b9";}
		if($x >= 1 and $x<10){$this->valeur= "#00ffff";}
		if($x >= 10 and $x<100){$this->valeur= "#66ff66";}
		if($x >= 100 and $x<1000){$this->valeur= "#992038";}
		if($x >= 1000){$this->valeur= "#60000e";}
		return $this->valeur;
	}
	
	function valsigwc($tbl,$col,$val,$datejour1,$datejour2,$structure) 
	{
	$this->mysqlconnectx();
	mysql_query("SET NAMES 'UTF8' ");
	$sql = " select * from $tbl where $col=$val and DINS BETWEEN '$datejour1' AND '$datejour2' and STRUCTURED $structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function sigwilaya($wilayar,$datejour1,$datejour2,$structure) 
	{
	$this->mysqlconnectx();
	mysql_query("SET NAMES 'UTF8' ");
	$sql = " select * from deceshosp where WILAYAR=$wilayar and (DINS BETWEEN '$datejour1' AND '$datejour2') and STRUCTURED $structure ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function sigcommune($WILAYAR,$COMMUNER,$datejour1,$datejour2,$structure) 
	{
	$this->mysqlconnectx();
	$sql = " select * from deceshosp where WILAYAR=$WILAYAR  and  COMMUNER=$COMMUNER and (DINS BETWEEN '$datejour1' AND '$datejour2') and STRUCTURED $structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
		
}

?>
