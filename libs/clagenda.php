<?php

class clagenda  {
	
	public $db_host;
	public $db_name;   
	public $db_user;
	public $db_pass;
	public $userListviewm ;
	public $userListviewa ;
	public $urlx ;
	public $url;
	
	function __construct() 
	{
	$this->db_host=DB_HOST;
	$this->db_name=DB_NAME;   
	$this->db_user=DB_USER;
	$this->db_pass=DB_PASS;
	if (isset($_GET['url'])){$this->url=$_GET['url'];} 
	$this->urlx = explode('/',$this->url);
    if (isset($this->urlx[3])){$this->userListviewm = $this->urlx[3];} 
	if (isset($this->urlx[4])){$this->userListviewa = $this->urlx[4];} 
	}
	
	
	function mysqlconnectx()
	{
	$cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $db;
	}
	
	function nbrmois ($def_mois)
	{
		switch($def_mois)  
		{
			case '01':{return "Janvier";}
			case '02':{return "Fevrier";}	
			case '03':{return "Mars";}	
			case '04':{return "Avril";}	
			case '05':{return "Mai";}	
			case '06':{return "Juin";}	
			case '07':{return "Juillet";}	
			case '08':{return "Aout";}	
			case '09':{return "Septembre";}	
			case '10':{return "Octobre";}	
			case '11':{return "Novombre";}	
			case '12':{return "Decembre";}			
		}
	}

	function nbre ($month,$d,$year,$str)
	{
		$this->mysqlconnectx();
		$month1='';
		$d1='';
		if($month <= 9) {$month1='0'.$month;} else {$month1=$month;}
		if($d <= 9) {$d1='0'.$d;}else {$d1=$d;}
		$dateLa = $year.'-'.$month1.'-'.$d1;
		//$extraire = mysql_query("select * from rdv WHERE DATERDV='$dateLa' and   str='".$str."' ");
		$extraire = mysql_query("select * from deceshosp  WHERE DINS='$dateLa' and   STRUCTURED = $str");
		$nbrEvents = mysql_num_rows($extraire);
		if ($nbrEvents > 0) {$nbrEvents1='['.$nbrEvents.']';return $nbrEvents1;}else{$nbrEvents1='';return $nbrEvents1;}
	}

	function agenda ($controleur,$str)
	{
	if (isset($this->userListviewa))   { $an   = $this->userListviewa; }  else {$an   = date("Y");}
	if (isset($this->userListviewm))   { $mois = $this->userListviewm; }  else {$mois = date("n");}
	// if (isset($this->userListviewd))   { $jour = $this->userListviewd; }  else {$jour = date("d");}  ne pas utiliser  car il fait disparaitre la case verte du jour 
	$jour = date("d");
	$debut = mktime(0,0,0,$mois,1,$an);    
	$premJour = date("w" , $debut );    //1er jour dans la grille 
	$nbJours = date("t" , $debut);      //nb de jours dans le mois
	$numero_semaine=date("W");         //nbr de semaine 
	$jour_semaine=date("w",mktime(0,0,0,$mois,1,$an)); // Jour de la semaine au format numê³©que 0 (pour dimanche) à ¶ (pour samedi)
	$nbEmptyCells = ($premJour + 6)%7;

	//partie agendat 
	echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"9\" class=\"tableaux_centrer1\" ";
		if ($mois == 1)  {$prec = URL.$controleur.'/Agenda/1/12/'.($this->userListviewa-1);} else {$prec = URL.$controleur.'/Agenda/1/'.($this->userListviewm-1).'/'.$an;}
		if ($mois == 12) {$suiv = URL.$controleur.'/Agenda/1/1/'.($this->userListviewa+1);}  else {$suiv = URL.$controleur.'/Agenda/1/'.($this->userListviewm+1).'/'.$an;}
		echo "<tr class=\"calendar\"><td><a  title=\"Mois précedent\"  href=".$prec."><img src='".URL.'public/images/icons/b_firstpage.png'."' width='16' height='16' border='0' alt=''/></a></td><td colspan=\"5\">".$this->nbrmois ($mois)." ".$an."</td><td><a title=\"Mois suivant\"   href=".$suiv."><img src='".URL.'public/images/icons/b_lastpage.png'."' width='16' height='16' border='0' alt=''/></td></tr>\n";
		echo "<tr class=\"calendar1\"><td>Lundi</td><td>Mardi</td><td>Mercredi</td><td>Jeudi</td><td>Vendredi</td><td>Samedi</td><td>Dimanche</td></tr>\n";
		echo "<tr>" ;
			for ($i=1;$i<=$nbEmptyCells;$i++) 
			{
				echo "<td class=\"cell_vide\">&nbsp;***&nbsp;</td>\n";
			}
			for ($i=1;$i<=$nbJours;$i++) 
			{
				$joursw =($i+$jour_semaine-1)%7;
				// now 
				if ( $i==$jour && $mois == date("m") && $an == date("Y") ) 
				{
				   $day_link = "<a class=\"todaya\" title=\"today\"   href=\"".URL.$controleur.'/Agenda/'.$i.'/'.$mois.'/'.$an."\">$i</a> <font size=\"1\"><sup>".$this->nbre ($mois,$i,$an,$str)." </sup></font>  ";
				   echo "<td class=\"today\">".$day_link."</td>\n";
				}
				//autre joures  
				else if ($joursw==5)//1vendredi 
				{
					$day_link = "<a href=\"".URL.$controleur.'/Agenda/'.$i.'/'.$mois.'/'.$an."\"  title=\"Jour weekend Vendredi $i\">$i</a> <sup>".$this->nbre ($mois,$i,$an,$str)."</sup> ";
					echo "<td class=\"dimanche\">".$day_link."</td>\n";    
				}
				else if ($joursw==6)//2samedi
				{
					$day_link = "<a href=\"".URL.$controleur.'/Agenda/'.$i.'/'.$mois.'/'.$an."\"  title=\"Jour weekend Samedi $i\">$i</a> <sup>".$this->nbre ($mois,$i,$an,$str)."</sup> ";
					echo "<td class=\"dimanche\">".$day_link."</td>\n";    
				}
				else //3jours ouvrable
				{
					 $day_link = "<a href=\"".URL.$controleur.'/Agenda/'.$i.'/'.$mois.'/'.$an."\" title=\"Jour ouvrable $i\">$i</a> <font size=\"1\"><sup>".$this->nbre ($mois,$i,$an,$str)." </sup></font>   ";
					 echo "<td class=\"calendar\">".$day_link."</td>\n";
				}
				if ( ($i+$nbEmptyCells)%7 == 0 ) 
				{
		echo "</tr>";
		
		echo "\n<tr>";
				}
			}
		$nbEmptyCells = 7 - ($nbEmptyCells + $nbJours)%7;
		if ($nbEmptyCells < 7) 
		{
			for ($i=1;$i<=$nbEmptyCells;$i++) 
			{
				echo "<td class=\"cell_vide\">&nbsp;***&nbsp;</td>\n";
			}
		echo "</tr>\n";
		}
	echo "</table>\n";

	}		
	
}

?>
