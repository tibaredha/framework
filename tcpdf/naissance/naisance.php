<?php

require('../TCPDF.php');

class naisance extends TCPDF
{ 
	public $nomprenom ="tibaredha";
	public $db_host="localhost";
	public $db_name="framework"; 
	public $db_user="root";
	public $db_pass="";
	public $utf8 = "" ;
		
	public $repar="الجمـهوريـــة الجزائرية الديمقراطية الشعبيــــــــة";
	public $repfr="République algérienne démocratique et populaire";
	public $mspar="وزارة الصحــــــــة و السكـــــــــان وإصلاح المستشــــــفيات";
	public $mspfr="Ministère de la sante de la population et de la réforme hospitalière";
	public $dspfr="Direction de la sante et de la population de la wilaya de ";
	public $dspar="مـديريــــــة الصحــــة و الســـــكان لولايـــــة ";

	function mysqlconnect()
	{
	$this->db_host;
	$this->db_name;
	$this->db_user;
	$this->db_pass;
    $cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $db;
	}
	
	function rdm($IDF)
	{
	$this->mysqlconnect();
	$sql = " select * from trav where IDF=$IDF and  LA='C'  order by DHE2 desc limit 0,1 ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$result1 = mysql_fetch_array( $requete ) ;
	$valhb=$result1["DHE2"];
	return $valhb;
	}
	
	
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	
    function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."/".$M."/".$A ;
    return $dateUS2FR;//01/01/2013
    }	
	function datePlus($dateDo,$nbrJours)
	{
	$timeStamp = strtotime($dateDo); 
	$timeStamp += 24 * 60 * 60 * $nbrJours;
	$newDate = date("Y-m-d", $timeStamp);
	return  $newDate;
	}
	
	function heuresPlus($heuresDo,$nbrheures)
	{
	$timeStamp = strtotime($heuresDo); 
	$timeStamp += 60 * 60 * $nbrheures;
	$newDate = date("H:m", $timeStamp);
	return  substr($newDate,0,2);
	}
	
	function ta($tas,$tad,$heure) 
	{
	$difta=$tas-$tad;
	$a=array(180=>0,170=>1,160=>2,150=>3,140=>4,130=>5,120=>6,110=>7,100=>8,90=>9,80=>10,70=>11,60=>12);
	$b=array(0=>5*1,10=>5*2,20=>5*3,30=>5*4,40=>5*5,50=>5*6,60=>5*7,70=>5*8,80=>5*9,90=>5*10,100=>5*11,110=>5*12,120=>5*13);
	$c=array(0=>38,1=>38,2=>38+7,3=>38+14,4=>38+21,5=>38+28,6=>38+35,7=>38+42,8=>38+49,9=>38+56,10=>38+63,11=>38+70,12=>38+77,13=>38+84,14=>38+91,15=>38+98,16=>38+105,17=>38+112,18=>38+119,19=>38+126,20=>38+133,21=>38+140,22=>38+147,23=>38+154,24=>38+161);
	$this->SetFillColor(0);$this->SetXY($c[$heure],203+5*$a[$tas]);$this->cell(1,$b[$difta],"*",1,1,'C',1,1);$this->SetFillColor(255);
	}
	function POOLS($POOLS,$heure) 
	{
	$a=array(120=>0,110=>1,100=>2,90=>3,80=>4,70=>5,60=>6);
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', '', 20);$this->SetTextColor(0,0,225);$this->Text($c[$heure],231+(5*$a[$POOLS]),"O");$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	}
	
	function RCF($RCF,$heure) 
	{
	$a=array(180=>0,170=>1,160=>2,150=>3,140=>4,130=>5,120=>6,110=>7,100=>8);
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', '', 20);$this->SetTextColor(0,0,225);$this->Text($c[$heure],13+(5*$a[$RCF]),"X");$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	
	}
	
	function DIC($DIC,$heure) 
	{
	$a=array(10=>0,9=>1,8=>2,7=>3,6=>4,5=>5,4=>6,3=>7,2=>8,1=>9,0=>10,);
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', '', 20);$this->SetTextColor(0,0,225);$this->Text($c[$heure],72+(5*$a[$DIC]),"O");$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	}
	
	function DEP($DEP,$heure) 
	{
	$a=array(5=>0,4=>1,3=>2,2=>3,1=>4,0=>5,);
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', '', 20);$this->SetTextColor(0,0,225);$this->Text($c[$heure],97+(5*$a[$DEP]),"X");$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	}
	
	function TEMP($TEMP,$heure) 
	{
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', '', 12);$this->SetTextColor(0,0,225);$this->Text($c[$heure],269,$TEMP);$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	}
	
	function LA($LA,$heure) 
	{
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', '', 12);$this->SetTextColor(0,0,225);$this->Text($c[$heure],62,$LA);$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	}
	
	function DC($DC,$heure) 
	{
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', 'U', 10);$this->SetTextColor(0,0,225);$this->Text($c[$heure],67,$DC);$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	}
	
	function NDC($NDC,$heure,$DCU) 
	{
	$a=array(5=>5*5,4=>5*4,3=>5*3,2=>5*2,1=>5*1,0=>5*0);
	$b=array(5=>5*0,4=>5*1,3=>5*2,2=>5*3,1=>5*4,0=>5*5);
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	if($DCU==0) {$this->SetFillColor(250);$this->SetXY($c[$heure],145+$b[$NDC]);$this->cell(7,$a[$NDC],"",1,1,'C',1,1);$this->SetFillColor(255);}
	if($DCU==1) {$this->SetFillColor(200);$this->SetXY($c[$heure],145+$b[$NDC]);$this->cell(7,$a[$NDC],"+",1,1,'C',1,1);$this->SetFillColor(255);}
	if($DCU==2) {$this->SetFillColor(150);$this->SetXY($c[$heure],145+$b[$NDC]);$this->cell(7,$a[$NDC],"++",1,1,'C',1,1);$this->SetFillColor(255);}
	if($DCU==3) {$this->SetFillColor(100);$this->SetXY($c[$heure],145+$b[$NDC]);$this->cell(7,$a[$NDC],"+++",1,1,'C',1,1);$this->SetFillColor(255);}
	}
	function PRTU($PRTU,$heure) 
	{
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', '', 10);$this->SetTextColor(0,0,225);$this->Text($c[$heure],275,$PRTU);$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	}
	function ACU($ACU,$heure) 
	{
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', '', 10);$this->SetTextColor(0,0,225);$this->Text($c[$heure],280,$ACU);$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	}
	
	function VU($VU,$heure) 
	{
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', '', 10);$this->SetTextColor(0,0,225);$this->Text($c[$heure],285,$VU);$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	}
	
	function OXY($OXY,$heure) 
	{
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', '', 10);$this->SetTextColor(0,0,225);$this->Text($c[$heure],171,$OXY);$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	}
	
	function NOXY($NOXY,$heure) 
	{
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	$this->SetFont('aefurat', '', 10);$this->SetTextColor(0,0,225);$this->Text($c[$heure],176,$NOXY);$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	}
	
	
	
	function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
	if (is_numeric($colonevalue) and $colonevalue!=='0') 
	{ 
	$this->mysqlconnect();
	$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
	$row=mysql_fetch_object($result);
	$resultat=$row->$resultatstring;
	return $resultat;
	} 
	return $resultat2='??????';
	}
	
	function DATEPV($DATEINS) {
	
		$J      = substr($DATEINS,8,2);                  
		$M      = substr($DATEINS,5,2);
		$A      = substr($DATEINS,2,2); 
		//transformer une date donne en lettre
		$JOURS = array("الاول","الثانى","الثالث","الرابع","الخامس","السادس","السابع","الثامن","التاسع","العاشر","الحادي عشر","الثاني عشر","الثالث عشر"," الرابع عشر  "," الخامس عشر "," السادس عشر "," السابع عشر "," الثامن عشر "," التاسع عشر "," العشرين "," الواحد و العشرين"," الثاني و العشرين "," الثالث و العشرين "," الرابع و العشرين "," الخامس و العشرين "," السادس و العشرين "," السابع و العشرين "," الثامن و العشرين "," التاسع و العشرين "," الثلاثين "," الواحد و الثلاثين ");
	    //$JOURS1 = $JOURS[date("d")-1] ;
		$JOURS1 = $JOURS[$J-1] ;
		$MOIS = array("", "جانفى", "فيفري", "مارس", "افريل", "ماي", "جوان", "جويلية", "اوت", "سبتمبر", "اكتوبر", "نوفمبر", "ديسمبر");
		$MOIS1 =  $MOIS[ $M-0 ] ;
		//$MOIS1 =  $MOIS[date("n")] ;
		$ANNEE = array("ثلاثة عشر  ","أربعة عشر  ","خمسة عشر  ","ستة عشر  ","سبعة عشر  ","ثمانية عشر ","تسعة عشر  ","عشرين");
		//$ANNEE1 =  $ANNEE[date("y")-13] ;
		$ANNEE1 =  $ANNEE[ $A - 13] ;
		$DATEPV="في عـــام الفيــــن و ".$ANNEE1."وفي اليـــوم ".$JOURS1." من شهـــر ".$MOIS1;
		
		return $DATEPV;
       }


	   function arDate() {
			$Jour = array("الاحد", "الاثنين", "الثلثاء", "الاربعاء", "الخميس", "الجمعة", "السبت");
			$Mois = array("", "جانفى", "فيفري", "مارس", "افريل", "ماي", "جوان", "جويلية", "اوت", "سبتمبر", "اكتوبر", "نوفمبر", "ديسمبر");
			$Jour1 = array("الاحد", "الاثنين", "الثلثاء", "الاربعاء", "الخميس", "الجمعة", "السبت");
			$anne1 = array("الاحد", "الاثنين", "الثلثاء", "الاربعاء", "الخميس", "الجمعة", "السبت");
			$datear = $Jour[date("w")] . " " . date("d") . " " . $Mois[date("n")] . " " . date("Y");
			return $datear;
		}
	
		function ANNEEAR($DATEINS) {
			$A      = substr($DATEINS,2,2); 
			$ANNEE = array("ثلاثة عشر  ","أربعة عشر  ","خمسة عشر  ","ستة عشر  ","سبعة عشر  ","ثمانية عشر ","تسعة عشر  ","عشرين");
			$ANNEE1 =  $ANNEE[ $A - 13] ;
			$DATEPV=$ANNEE1;
			return $DATEPV;
		}
		function JOURAR($DATEINS) {
			$J      = substr($DATEINS,8,2);                  
			$JOURS = array("الاول","الثانى","الثالث","الرابع","الخامس","السادس","السابع","الثامن","التاسع","العاشر","الحادي عشر","الثاني عشر","الثالث عشر"," الرابع عشر  "," الخامس عشر "," السادس عشر "," السابع عشر "," الثامن عشر "," التاسع عشر "," العشرين "," الواحد و العشرين"," الثاني و العشرين "," الثالث و العشرين "," الرابع و العشرين "," الخامس و العشرين "," السادس و العشرين "," السابع و العشرين "," الثامن و العشرين "," التاسع و العشرين "," الثلاثين "," الواحد و الثلاثين ");
			$JOURS1 = $JOURS[$J-1] ;
			$DATEPV=$JOURS1;
			return $DATEPV;
		}	
	   function MOISAR($DATEINS) {             
			$M      = substr($DATEINS,5,2);
			$MOIS = array("", "جانفى", "فيفري", "مارس", "افريل", "ماي", "جوان", "جويلية", "اوت", "سبتمبر", "اكتوبر", "نوفمبر", "ديسمبر");
			$MOIS1 =  $MOIS[ $M-0 ] ;
			$DATEPV=$MOIS1;
			return $DATEPV;
		}		
		
		function HEURSAR($HINS) {
			$H      = substr($HINS,0,2);                  
			if($H>0){
			$HEURS = array("الاول","الثانى","الثالث","الرابع","الخامس","السادس","السابع","الثامن","التاسع","العاشر","الحادي عشر","الثاني عشر","الثالث عشر"," الرابع عشر  "," الخامس عشر "," السادس عشر "," السابع عشر "," الثامن عشر "," التاسع عشر "," العشرين "," الواحد و العشرين"," الثاني و العشرين "," الثالث و العشرين "," الرابع و العشرين ");
			$HEURS1 = $HEURS[$H-1] ;
			return $HEURS1;
			}
			else{
			return $HEURS1='???';
			}	
		}	
		function MINUTEAR($HINS) {
			$M      = substr(trim($HINS),3,2);                
			if($M>0){
			$MINUTE = array("الاولى","الثانية","الثالثة","الرابعة","الخامسة","السادسة","السابعة","الثامنة","التاسعة","العاشرة","الحادي عشرة","الثاني عشرة","الثالث عشرة"," الرابع عشرة  "," الخامس عشرة "," السادس عشرة "," السابع عشرة "," الثامن عشرة "," التاسع عشرة "," العشرين "," الواحد و العشرين"," الثاني و العشرين "," الثالث و العشرين "," الرابع و العشرين " ," الخامس و العشرين" ," السادس و العشرين" ," السابع و العشرين" ," الثامن  العشرين" ," التاسع و العشرين" ," الثلاثون" ," الواحدة و الثلاثين" ," الثانية و الثلاثين" ," الثالثة و الثلاثين" ," الرابعة و الثلاثين" ," الخامسة و الثلاثين" ,"السادسة و الثلاثين " ," السابعة و الثلاثين" ," الثامنة و الثلاثين" ," التاسعة و الثلاثين" ,"الأربعين " ," الواحدة و الأربعين" ," الثانية و الأربعين" ," الثالثة و الأربعين" ," الرابعة و الأربعين" ," الخامسة و الأربعين" ," السادسة و الأربعين" ," السابعة و الأربعين" ,"الثامنة و الأربعين " ,"التاسعة و الأربعين " ,"الخمسين " ," الواحدة و الخمسين" ," الثانية و الخمسين" ,"الثالثة و الخمسين " ," الرابعة و الخمسين" ," الخامسة و الخمسين" ," السادسة و الخمسين" ," السابعة و الخمسين" ,"الثامنة و الخمسين " ," التاسعة و الخمسين"  );
			$MINUTE1 = $MINUTE[$M-1];
			return $MINUTE1;
			}
			else{
			return $MINUTE1="الصفر";
			}
		}

	    function P0($y)//entete fiche navette
		{
		$this->SetXY(10,$y);$this->cell(40,6,"",1,0,'C',0);
		$this->SetXY(50,$y);$this->cell(40,6,"",1,0,'C',0);
		$this->SetXY(90,$y);$this->cell(40,6,"",1,0,'C',0);
		$this->SetXY(90+40,$y);$this->cell(30,6,"",1,0,'C',0);
		$this->SetXY(90+40+30,$y);$this->cell(40,6,"",1,0,'C',0);
		}
	    function P2($y)//entete fiche navette
		{
		$this->SetXY(10,$y);$this->cell(40,10,"",1,0,'C',0);
		$this->SetXY(50,$y);$this->cell(40,10,"",1,0,'C',0);
		$this->SetXY(90,$y);$this->cell(20,10,"",1,0,'C',0);
		$this->SetXY(90+20,$y);$this->cell(90,10,"",1,0,'C',0);
		$this->SetXY(90+20+90,$y);$this->cell(30,10,"",1,0,'C',0);
		$this->SetXY(90+20+90+30,$y);$this->cell(60,10,"",1,0,'C',0);
		}
		function P4($y)//entete fiche navette
		{
		$this->SetXY(10,$y);$this->cell(20,10,"",1,0,'C',0);
		$this->SetXY(30,$y);$this->cell(30,10,"",1,0,'C',0);
		$this->SetXY(60,$y);$this->cell(20,10,"",1,0,'C',0);
		$this->SetXY(60+20,$y);$this->cell(60,10,"",1,0,'C',0);
		$this->SetXY(60+20+60,$y);$this->cell(20,10,"",1,0,'C',0);
		$this->SetXY(160,$y);$this->cell(40,10," ",1,0,'C',0);
		}
	
	    function P5($y)//entete fiche navette
		{
		$this->SetXY(10,$y);$this->cell(20,10,"",1,0,'C',0);
		$this->SetXY(30,$y);$this->cell(30,10,"",1,0,'C',0);
		$this->SetXY(60,$y);$this->cell(20,10,"",1,0,'C',0);
		$this->SetXY(60+20,$y);$this->cell(90,10,"",1,0,'C',0);
		$this->SetXY(60+20+90,$y);$this->cell(30,10,"",1,0,'C',0); 	  
		$this->SetXY(60+20+90+30,$y);$this->cell(40,10,"",1,0,'C',0); 
		$this->SetXY(60+180,$y);$this->cell(50,10," ",1,0,'C',0); 
		}
		function P6($y)//entete fiche navette
		{
		$this->SetXY(10,$y);$this->cell(55,10,"",1,0,'C',0); 	  
        $this->SetXY(65,$y);$this->cell(30,10," ",1,0,'C',0); 	  
        $this->SetXY(95,$y);$this->cell(90,10," ",1,0,'C',0); 	  
        $this->SetXY(185,$y);$this->cell(25,10,"",1,0,'C',0); 	  
        $this->SetXY(185+25,$y);$this->cell(25,10,"",1,0,'C',0); 	  
        $this->SetXY(190+45,$y);$this->cell(55,10,"",1,0,'C',0); 
		}
	
        function fichenavette($id)//entete fiche navette
		{
		$this->mysqlconnect();
		$query = "select * from naissance WHERE  id = '$id'    ";
		$resultat=mysql_query($query);
		while($result=mysql_fetch_object($resultat))
		{
		$this->setPrintHeader(false);
        $this->setPrintFooter(false);
        $this->SetFont('aefurat', '', 12);
        $this->SetDisplayMode('fullpage','single');
		$this->SetFillColor(245);
        ////P1 FICHE NAVETTE
		$this->AddPage();
		$this->SetXY(5,5);$this->Cell(200,5,$this->repfr,0,1,'C');
        $this->SetXY(5,10);$this->Cell(200,5,$this->mspfr,0,1,'C');
        $this->SetXY(5,15);$this->Cell(200,5,$this->dspfr.$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
		$this->SetXY(5,20);$this->Cell(200,5,"Etablissement Public ".$this->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C');
        $this->SetXY(180,28);$this->Cell(20,8.5,"PAGE 1",0,1,'C',1,0);
		$this->SetFont('aefurat', '', 20);
		$this->SetXY(10,28);$this->Cell(168,5,"FICHE NAVETTE",0,1,'C',1,0);
		$this->SetFont('aefurat', '', 10);
		$this->Rect(10, 40, 190, 15 ,'D');
		$this->SetXY(10,40);$this->Cell(190,5,"IDENTIFICATION DE L'ASSURE :",0,1,'L',1,0);
		$this->Text(15,45,"Nom : ".$result->NOM3);$this->Text(105,45,"Prénom : ".$result->PRENOM2);
        $this->Text(15,50,"Date de Naissance : ". $this->dateUS2FR($result->DATENS2));$this->Text(105,50,"N°Immatriculation : ".$result->NSSMERE);
		$this->Rect(10, 40+18, 190, 15 ,'D');  
		$this->SetXY(10,58);$this->Cell(190,5,"IDENTIFICATION DU DEMUNI :",0,1,'L',1,0);
		$this->Text(15,45+18,"Nom : ");$this->Text(105,45+18,"Prénom : ");
		$this->Text(15,50+18,"Date de Naissance : ");$this->Text(105,50+18,"N°Immatriculation : ");
		$this->SetXY(10,88);$this->Cell(190,5,"IDENTIFICATION DU PATIENT : ",0,1,'L',1,0);
		$this->SetXY(140,40+18+18);$this->Cell(60,10,"N°SS : ".$result->NSSMERE,0,1,'L',1,0);
		$this->Rect(10, 40+18+18+18, 190, 20 ,'D'); 
		$this->Text(15,45+18+18+15,"1.N° D'ADMISSION : ");$this->Text(80,45+18+18+15,"2.GROUPAGE SANGUIN : ");$this->Text(150,45+18+18+15,"3.AGE : ");
		$this->SetXY(15,45+18+18+20);$this->cell(60,6,$result->MATRI,1,0,'C',0);
		$this->SetXY(80,45+18+18+20);$this->cell(60,6,$result->GROUPAGE.' RH '.$result->RH,1,0,'C',0);
		$this->SetXY(150,45+18+18+20);$this->cell(40,6,$result->AGE2,1,0,'C',0);
		$this->Rect(10,40+18+18+18+20, 190, 14 ,'D'); 
		$this->Text(15,40+18+18+18+23,"4.Nom : ".$result->NOM3);$this->Text(80,40+18+18+18+23,"5.Nom de jeune fille : ".$result->NOM2);$this->Text(150,40+18+18+18+23,"6.Prénom : ".$result->PRENOM2);
		$this->Rect(10,132, 190, 48 ,'D');
		$this->Text(10,133,"7.Service : ".$this->nbrtostring("servicedeces","id",$result->SERVI,"service") );
		$this->Text(100,133,"8.Nom et qualité du chef de Service : ");
		$this->Text(10,133+10,"9.Date d'entree : ".$this->dateUS2FR($result->HOSPI));
		$this->Text(100,133+10,"10.Heure d'entree : ".$result->HHOSP);
		$this->Text(10,133+20,"11.Nom de la Salle : ");//.$this->nbrtostring("grh","service","ids",$result->SERVICEHOSP,"servicefr")
		$this->Text(100,133+20,"12.N°lit : ".$this->nbrtostring("lit","id",$result->NLIT,"nlit"));
		$this->Text(10,133+30,"13.Nom Prénom et Qualite du medecin traitant : ");
		$this->Text(10,133+40,"14.Mode d'entree : ".$this->nbrtostring("modeent","id",$result->MODEE,"mods"));$this->Text(100,133+40,"15.Code entrée : ");
		$this->SetXY(10,188);$this->Cell(190,5,"HOSPITALISATION DANS UN AUTRE SERVICE (Mouvement du malade) : ",0,1,'L',1,0);
		$this->Rect(10,133+65, 190, 60 ,'D');
		$this->SetXY(10,133+65); $this->cell(40,6,"16.SERVICE",1,0,'L',1,0);
		$this->SetXY(50,133+65);$this->cell(40,6,"17.DATE D'ENTREE",1,0,'L',1,0); 
		$this->SetXY(90,133+65);$this->cell(40,6,"18.HEURE D'ENTREE",1,0,'L',1,0);
		$this->SetXY(90+40,133+65);$this->cell(30,6,"19.N° DU LIT",1,0,'L',1,0); 
		$this->SetXY(90+40+30,133+65);$this->cell(40,6,"20.Médecin Traitant ",1,0,'L',1,0); 	
		$this->SetXY(10,198+6);
		$this->mysqlconnect();
		$query11 = "SELECT * FROM  chaser where idn='".$id."'  ORDER BY id ASC limit 0,6 ";//
		$resultat11=mysql_query($query11);
		$totalmbr111=mysql_num_rows($resultat11);
		$this->SetFont('aefurat', '', 10);
		while($row11=mysql_fetch_object($resultat11))
		  {
		   $this->cell(40,6,$this->nbrtostring("servicedeces","id",$row11->schaser,"service"),1,0,'C',0);
		   $this->cell(40,6,$this->dateUS2FR($row11->datechaser),1,0,'C',0);
		   $this->cell(40,6,$row11->heurechaser,1,0,'C',0);
		   $this->cell(30,6,$this->nbrtostring("lit","id",$row11->nlitchaser,"nlit"),1,0,'C',0);
		   $this->cell(40,6,$this->nbrtostring("sagefemme","id",$row11->medecin,"Nom")."_".$this->nbrtostring("sagefemme","id",$row11->medecin,"Prenom"),1,0,'C',0);
		   $this->SetXY(10,$this->GetY()+6); 
		  }
		for ($x=204;$x<=252;$x+=6){$this->P0($x);}
		
		$this->SetFont('aefurat','B',9);
		$this->Text(5,270,"REF : CIRCULAIRE N° 3637 MSP/ DSS DU 23 / 12 / 1985 ");
		$this->SetFont('aefurat', '', 10);
		
		///P3
		$this->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
		$this->SetXY(10,5);$this->cell(258,5,"1.ACTES MEDICAUX CHIRURGICAUX ET EXAMENTS  PRATIQUES DANS L'ETABLISSEMENT D'HOSPITALISATION :",0,1,'L',1,0);
		$this->SetXY(10,10);$this->cell(258,5,"Y COMPRIS LES CONSULTATION EFFECTUEES PAR LES PRATICIENS EXTERNE AU SERVICE",0,1,'L',1,0);
		$this->SetXY(270,5);$this->Cell(20,10,"PAGE 3",0,1,'C',1,0);
		$this->SetXY(10,20);$this->cell(40,10,"1.1 DATE",1,0,'C',1,0);
		$this->SetXY(50,20);$this->cell(40,10,"1.2 SERVICE",1,0,'C',1,0);
		$this->SetXY(90,20);$this->cell(140,5,"ACTE ET EXAMENS ",1,0,'C',1,0);
		$this->SetXY(90,25);$this->cell(20,5,"1.3 Code",1,0,'C',1,0);
		$this->SetXY(90+20,25);$this->cell(90,5,"1.4 Nature",1,0,'C',1,0);
		$this->SetXY(90+20+90,25); $this->cell(30,5,"1.5 Cotation",1,0,'C',1,0);
		$this->SetXY(90+20+90+30,20);$this->cell(60,10,"1.6.Nom Prenom et Qualite du Praticien ",1,0,'C',1,0);
		for ($x=30;$x<=170;$x+=10){$this->P2($x);}
		
		///P5
		$this->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
		$this->SetXY(10,5);$this->cell(258,5,"3.ACTES MEDICAUX CHIRURGICAUX ET EXAMENTS EFFECTUES DANS UNE STRUCTURE EXTERNE  :",0,1,'L',1,0);
		$this->SetXY(10,10);$this->cell(258,5,"PUBLIC OU PRIVEE",0,1,'L',1,0);
		$this->SetXY(270,5);$this->Cell(20,10,"PAGE 5",0,1,'C',1,0);
		$this->SetXY(10,20);$this->cell(20,10,"3.1 DATE",1,0,'C',1,0);
		$this->SetXY(30,20);$this->cell(30,10,"3.2 SERVICE",1,0,'C',1,0);
		$this->SetXY(60,20);$this->cell(140,5,"ACTE ET EXAMENS ",1,0,'C',1,0);
		$this->SetXY(60,25);$this->cell(20,5,"3.3 Code",1,0,'C',1,0);
		$this->SetXY(60+20,25);$this->cell(90,5,"3.4 Nature",1,0,'C',1,0);
		$this->SetXY(60+20+90,25);$this->cell(30,5,"3.5 Cotation",1,0,'C',1,0);
		$this->SetXY(60+20+90+30,20);$this->cell(40,5,"3.6.Nom Prenom  ",1,0,'C',1,0);
		$this->SetXY(60+20+90+30,25);$this->cell(40,5,"et Qualite du paramedical ",1,0,'C',1,0);
		$this->SetXY(60+180,20);$this->cell(50,10,"3.7 N°Prise En Charge ",1,0,'C',1,0);
		for ($x=30;$x<=170;$x+=10){$this->P5($x);}
		
		///P7 MEDICAMENTS
		$this->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
		$this->SetXY(10,5);$this->cell(258,5,"4.MEDICAMENTS :",0,1,'L',1,0);
		$this->SetXY(10,10);$this->cell(258,5,"",0,1,'L',1,0);
		$this->SetXY(270,5);$this->Cell(20,10,"PAGE 7",0,1,'C',1,0);
		$this->SetXY(10,20);$this->cell(55,5,"4.1 DATE ",1,0,'C',1,0);
		$this->SetXY(10,25);$this->cell(55,5," DE LA PRESCRIPTION",1,0,'C',1,0); 	  
        $this->SetXY(65,20);$this->cell(30,5,"4.2 CODE ",1,0,'C',1,0); 	  
        $this->SetXY(65,25);$this->cell(30,5," DCI",1,0,'C',1,0); 	  
        $this->SetXY(95,20);$this->cell(90,5,"4.3 LIBELLE DCI   ",1,0,'C',1,0); 	  
        $this->SetXY(95,25);$this->cell(90,5," FORME ET DOSAGE  ",1,0,'C',1,0); 	  
        $this->SetXY(185,20); $this->cell(25,5,"4.4 QUANTITE ",1,0,'C',1,0); 	  
        $this->SetXY(185,25);$this->cell(25,5," PRESCRITE",1,0,'C',1,0); 	  
        $this->SetXY(185+25,20);$this->cell(25,5,"4.5 QUANTITE ",1,0,'C',1,0); 	  
        $this->SetXY(185+25,25);$this->cell(25,5," FOURNIE",1,0,'C',1,0); 	  
        $this->SetXY(190+45,20);$this->cell(55,5,"4.6.Nom Prenom  ",1,0,'C',1,0); 
		$this->SetXY(190+45,25);$this->cell(55,5,"Qualite du Praticien ",1,0,'C',1,0); 
		
		////********************************************************************************************//
		$this->SetXY(10,30); // marge sup 13
		$this->mysqlconnect();
		$query1 = "SELECT * FROM medfn where idp='".$id."' limit 15,15";
		$resultat1=mysql_query($query1);
		$totalmbr11=mysql_num_rows($resultat1);
		while($row1=mysql_fetch_object($resultat1))
		  {
		   $this->cell(55,10,$this->dateUS2FR($row1->DATE),1,0,'C',0);
		   $this->cell(30,10,$this->nbrtostring("pharmacie","id",$row1->MED1,"code"),1,0,'C',0);
		   $this->cell(90,10,$this->nbrtostring("pharmacie","id",$row1->MED1,"dci"),1,0,'L',0);
		   $this->cell(25,10,$row1->QUT1,1,0,'C',0);
		   $this->cell(25,10,$row1->QUT1,1,0,'C',0);
		   $this->cell(55,10,$row1->USER,1,0,'C',0);
		   $this->SetXY(10,$this->GetY()+10); 
		  }
		for ($x=30;$x<=170;$x+=10){$this->P6($x);}
		
		///P8 SORTIE
		$this->AddPage('P', 'mm', 'A4', true, 'UTF-8', false);$this->SetFont('aefurat', '', 20);
		$this->SetXY(10,5);$this->cell(168,10,"SORTIE",0,1,'C',1,0);$this->SetFont('aefurat', '', 10);
		$this->SetXY(180,5);$this->Cell(20,10,"PAGE 8",0,1,'C',1,0);
		$this->Rect(10, 25, 190, 55 ,'D');
        $this->Text(10,20,"CADRE RESERVE AU PRATICIEN");
        $this->Text(10,30,"1.Date de sortie : ".$this->dateUS2FR($result->SORT));
		$this->Text(100,30,"2.Heure de Sortie : ".$result->HSORT);
        $this->Text(10,40,"3.Mode de Sortie : ".$this->nbrtostring("modesrt","id",$result->MSORT,"mods"));
		$this->Text(100,40,"4.Code de Sortie : ");
		$this->Text(10,50,"5.Diagnostic ou Motif d'entrée : ".$result->DGCNS);//.$result->DGC
		$this->Text(10,60,"6.Diagnostic de Sortie : ".$result->DGCNS);//.$result->DGC
		$this->Text(10,70,"7.code CIM : ***");$this->Text(100,70,"8.Code GHM : ***");
		$this->Text(10,85,"NOM PRENOM ET GRADE DU PRATICIEN");$this->Text(150,85,"VISA DU CHEF DE SERVICE");//.$session
		$this->Text(30,92,"");
		$this->Text(25,100,"DATE ET CACHET");
		$this->Text(30,105,$this->dateUS2FR($result->SORT));
		$this->Text(29,110,"SIGNATURE");
		$this->Text(10,145,"CADRE RESERVE A L ADMINISTRATION DE LETABLISSEMENT");
		$this->Rect(10,150, 190, 55 ,'D'); 
		$this->Text(10,155,"9.N° Facture :");$this->Text(70,155,"10.Date : ");$this->Text(120,155,"11.Montant Total De La Prestation :");
        $this->Text(10,165,"12.N° quitance :");$this->Text(70,165,"13.part ss : ");$this->Text(120,165,"14.Part Patient :");
		$this->Text(10,175,"15.Nature Du Document De Sortie :");$this->Text(120,175,"16.Document :");
		$this->Text(10,185,"17.Etablissement d'acceuil :");$this->Text(120,185,"18.N°Prise En Charge :");
		$this->Text(10,195,"19.Mineur Accopagne A Sa Sortie Par : ");
		$this->Text(10,215,"NOM PRENOM ET FONCTION DU SIGNATAIRE");
		$this->Text(150,215,"DATE ET CACHET");
		$this->Text(155,220,$this->dateUS2FR($result->SORT));
		$this->Text(154,225,"SIGNATURE");
		
		///P6 MEDICAMENTS
		$this->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
		$this->SetXY(10,5);$this->cell(258,5,"4.MEDICAMENTS :",0,1,'L',1,0);
		$this->SetXY(10,10);$this->cell(258,5,"",0,1,'L',1,0);
		$this->SetXY(270,5);$this->Cell(20,10,"PAGE 6",0,1,'C',1,0);
		$this->SetXY(10,20);$this->cell(55,5,"4.1 DATE ",1,0,'C',1,0); 	  
        $this->SetXY(10,25); $this->cell(55,5," DE LA PRESCRIPTION",1,0,'C',1,0); 	  
        $this->SetXY(65,20);$this->cell(30,5,"4.2 CODE ",1,0,'C',1,0); 	  
        $this->SetXY(65,25);$this->cell(30,5," DCI",1,0,'C',1,0); 	  
        $this->SetXY(95,20); $this->cell(90,5,"4.3 LIBELLE DCI   ",1,0,'C',1,0); 	  
        $this->SetXY(95,25); $this->cell(90,5," FORME ET DOSAGE  ",1,0,'C',1,0); 	  
        $this->SetXY(185,20);$this->cell(25,5,"4.4 QUANTITE ",1,0,'C',1,0); 	  
        $this->SetXY(185,25);$this->cell(25,5," PRESCRITE",1,0,'C',1,0); 	  
        $this->SetXY(185+25,20);$this->cell(25,5,"4.5 QUANTITE ",1,0,'C',1,0); 	  
        $this->SetXY(185+25,25);$this->cell(25,5," FOURNIE",1,0,'C',1,0); 	  
        $this->SetXY(190+45,20);$this->cell(55,5,"4.6.Nom Prenom  ",1,0,'C',1,0); 
		$this->SetXY(190+45,25);$this->cell(55,5,"Qualite du Praticien ",1,0,'C',1,0); 
		
		////********************************************************************************************//
		$this->SetXY(10,30); // marge sup 13
		$this->mysqlconnect();
		$query1 = "SELECT * FROM medfn where idp='".$id."' limit 0,15";//
		$resultat1=mysql_query($query1);
		$totalmbr11=mysql_num_rows($resultat1);
		while($row1=mysql_fetch_object($resultat1))
		  {
		   $this->cell(55,10,$this->dateUS2FR($row1->DATE),1,0,'C',0);
		   $this->cell(30,10,$this->nbrtostring("pharmacie","id",$row1->MED1,"code"),1,0,'C',0);
		   $this->cell(90,10,$this->nbrtostring("pharmacie","id",$row1->MED1,"dci"),1,0,'L',0);
		   $this->cell(25,10,$row1->QUT1,1,0,'C',0);
		   $this->cell(25,10,$row1->QUT1,1,0,'C',0);
		   $this->cell(55,10,$row1->USER,1,0,'C',0);
		   $this->SetXY(10,$this->GetY()+10); 
		  }
		for ($x=30;$x<=170;$x+=10){$this->P6($x);}
		
		///P4
		$this->AddPage('P', 'mm', 'A4', true, 'UTF-8', false);
		$this->SetXY(10,5);$this->cell(168,5,"2.SOINS INFIRMIERS ACTES PARAMEDICAUX :",0,1,'L',1,0);
		$this->SetXY(10,10);$this->cell(168,5,"EFFECTUES DANS L'ETABLISSEMENT D'HOSPITALISATION",0,1,'L',1,0);
		$this->SetXY(180,5);$this->Cell(20,10,"PAGE 4",0,1,'C',1,0);
		$this->SetXY(10,20);$this->cell(20,10,"2.1 DATE",1,0,'C',1,0);
		$this->SetXY(30,20); $this->cell(30,10,"2.2 SERVICE",1,0,'C',1,0); 	  
        $this->SetXY(60,20); $this->cell(100,5,"ACTE ET EXAMENS ",1,0,'C',1,0); 	  
        $this->SetXY(60,25);$this->cell(20,5,"2.3 Code",1,0,'C',1,0); 	  
        $this->SetXY(60+20,25);$this->cell(60,5,"2.4 Nature",1,0,'C',1,0); 	  
        $this->SetXY(60+20+60,25); $this->cell(20,5,"2.5 Cotation",1,0,'C',1,0); 	  
        $this->SetXY(160,20);$this->cell(40,5,"2.6.Nom Prenom  ",1,0,'C',1,0); 
		$this->SetXY(160,25);$this->cell(40,5,"et Qualite du paramedical ",1,0,'C',1,0); 
		for ($x=30;$x<=260;$x+=10){$this->P4($x);}
		
		////P2
		$this->AddPage('L', 'mm', 'A4', true, 'UTF-8', false);
		$this->SetXY(10,5);$this->cell(258,5,"1.ACTES MEDICAUX CHIRURGICAUX ET EXAMENTS  PRATIQUES DANS L'ETABLISSEMENT D'HOSPITALISATION :",0,1,'L',1,0);
		$this->SetXY(10,10);$this->cell(258,5,"Y COMPRIS LES CONSULTATION EFFECTUEES PAR LES PRATICIENS EXTERNE AU SERVICE",0,1,'L',1,0);
		$this->SetXY(270,5);$this->Cell(20,10,"PAGE 2",0,1,'C',1,0);
		$this->SetXY(10,20);$this->cell(40,10,"1.1 DATE",1,0,'C',1,0); 	  
        $this->SetXY(50,20);$this->cell(40,10,"1.2 SERVICE",1,0,'C',1,0); 	  
        $this->SetXY(90,20);$this->cell(140,5,"ACTE ET EXAMENS ",1,0,'C',1,0); 	  
        $this->SetXY(90,25);$this->cell(20,5,"1.3 Code",1,0,'C',1,0); 	  
        $this->SetXY(90+20,25);$this->cell(90,5,"1.4 Nature",1,0,'C',1,0);
		$this->SetXY(90+20+90,25); $this->cell(30,5,"1.5 Cotation",1,0,'C',1,0);
		$this->SetXY(90+20+90+30,20); $this->cell(60,10,"1.6.Nom Prenom et Qualite du Praticien ",1,0,'C',1,0);
		for ($x=30;$x<=170;$x+=10){$this->P2($x);}
		} 
		}

        function cs($id)
		{
		$this-> mysqlconnect();
	    $sql = "SELECT * FROM naissance WHERE id = '".$id."' "; 
        $requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
        if( $result = mysql_fetch_object( $requete ) )
        {
        $this->AddPage();
		$this->SetFont('aefurat', '', 14);
		$this->SetXY(5,$this->GetY()+5);$this->Cell(200,6,$this->repfr,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,6,$this->mspfr,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,6,$this->dspfr.$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
		$this->SetFillColor(245);
		$this->SetXY(65+5,$this->GetY()+10);$this->Cell(140-10,10,"Certificat de séjour",0,1,'C',1,0);
		$this->SetXY(5+5,$this->GetY()-10);$this->Cell(50,10,'Etablissement public',0,1,'C',1,0);
		$this->SetXY(5+5,$this->GetY());$this->Cell(50,10,$this->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C',1,0);
		$this->SetFont('aefurat', '', 13);
		$this->Text(10,110," Je soussigné,directeur de l'Etablissement public ".$this->nbrtostring("structure","id",$result->STRUCTURED,"structure")." certifie que ");
		$this->Text(10,120,"La nommée : ".$result->NOM2."_".$result->PRENOM2);     $this->Text(120,120,"Matricule : ".$result->MATRI);
		$this->Text(10,130,"Agée de : ".$result->AGE2." Ans");
		$this->Text(10,140,"Est entrée le : ".$result->HOSPI);//	
		$this->Text(10,150,"Est sortie Le : ".$result->SORT);                      $this->Text(120,150,"Mode de sortie : ".$this->nbrtostring("modesrt","id",$result->MSORT,"mods"));
		$this->Text(10,160,"Service de : ".$this->nbrtostring("servicedeces","id",$result->SERVI,"service"));
		$this->Text(20,180,"Le medecin : ");$this->Text(20,190,"Dr ");
		$this->Text(110,200,"Le ".date("d-m-Y"));
		$this->Text(120,210,"LE DIRECTEUR");
		$this->Text(10,270,"Important : A garder dans le dossier médical");
		$this->SetFont('aefurat', '', 12);
		$style = array('position' => '','align' => 'L','stretch' => false,'fitwidth' => false,'cellfitalign' => '','border' => false,'hpadding' => 'auto','vpadding' => 'auto','fgcolor' => array(0,0,0),'bgcolor' => false, 'text' => true,'font' => 'helvetica','fontsize' => 8,'stretchtext' => 4);
        $this->SetXY(10,90);$this->write1DBarcode($result->id, 'C39', '', '', '', 18, 0.4, $style, 'N');$this->SetXY(10,70);$this->Cell(50,15,'N° : '.$result->id.'/'.date('Y'),0,1,'C',1,0);
        $this->Ln();
         }
		} 
        function ao($id)
		{
		$this-> mysqlconnect();
	    $sql = "SELECT * FROM naissance WHERE id = '".$id."' "; 
        $requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
        if( $result = mysql_fetch_object( $requete ) )
        {
		$this->setPrintHeader(false);
        $this->setPrintFooter(false);
        $this->SetFont('aefurat', '', 14);
        $this->SetDisplayMode('fullpage','single');//mode d affichage 
        $this->AddPage();
		$this->RoundedRect($x=5,  $y=5,   $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
		$this->SetFont('aefurat', '', 14);
		$this->SetXY(5,$this->GetY()+5);$this->Cell(200,6,$this->repfr,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,6,$this->mspfr,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,6,$this->dspfr.$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
		$this->SetFillColor(245);
		$this->SetXY(65+5,$this->GetY()+10);$this->Cell(140-10,10,"Autorisation d'opérer un patient",0,1,'C',1,0);
		$this->SetXY(5+5,$this->GetY()-10);$this->Cell(50,10,'Etablissement public',0,1,'C',1,0);
		$this->SetXY(5+5,$this->GetY());$this->Cell(50,10,$this->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C',1,0);
		$this->SetFont('aefurat', '', 14);
		$this->Text(70,80,"Nom : ".$result->NOM2);  
		$this->Text(70,90,"Prénom : ".$result->PRENOM2); 
		$this->Text(70,100,"Date de naissance : ". $this->dateUS2FR($result->DATENS2));
		$this->Text(10,110,"Je soussigné certifie ètre le representant légal de la patiente désignée si-dessus : ");
		$this->Text(10,120,"Autorise l'équipe médico-chirurgicale de l'établissement public ".$this->nbrtostring("structure","id",$result->STRUCTURED,"structure"));
		$this->Text(10,130,"à pratiquer une césarienne et/ ou hysterectomie en cas de complication foeto-maternelle .");
		$this->Text(10,140,"Et à utiliser tous les moyens necessaires à sa prise en charge y compris l'anesthesie générale");
		$this->Text(80,160,"Pére / marie / frère");
		$this->Text(10,170,"Nom : ...........................................");  $this->Text(110,170,"Signature et empreinte digitale");
		$this->Text(10,180,"Prénom : ......................................");    $this->Text(110,180,"......................................................");
		$this->Text(10,190,"Date de naissance : ....................");           $this->Text(110,190,"......................................................");
		$this->Text(10,200,"N° CIN/PC : ................................");
		$this->Text(20,220,"Le médecin : ");$this->Text(110,220," Le ".date("d-m-Y"));
		$this->Text(20,230,"");$this->Text(120,230,"LE DIRECTEUR");
		$this->Text(10,270,"Important : à garder dans le dossier médical");
		$this->SetFont('aefurat', '', 12); //0771218289 Dr mehalbi 
		}
		}
        function aoar($id)
		{
		$this-> mysqlconnect();
	    $sql = "SELECT * FROM naissance WHERE id = '".$id."' "; 
        $requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
        if( $result = mysql_fetch_object( $requete ) )
        {
		$this->setPrintHeader(false);
        $this->setPrintFooter(false);$this->setRTL(true);
        $this->SetFont('aefurat', '', 14);
        $this->SetDisplayMode('fullpage','single');//mode d affichage 
        $this->AddPage();
		$this->RoundedRect($x=5,  $y=5,   $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
		$this->SetFont('aefurat', '', 14);
		$this->SetXY(5,$this->GetY()+5);$this->Cell(200,6,$this->repar,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,6,$this->mspar,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,6,$this->dspar.$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYASAR"),0,1,'C');
		$this->SetFillColor(245);
		$this->SetXY(65+5,$this->GetY()+10);$this->Cell(140-10,10,"   إذن بإجراء عملية لمريض ",0,1,'C',1,0);
		$this->SetXY(5+5,$this->GetY()-10);$this->Cell(50,10,'المؤسسـة العموميـة',0,1,'C',1,0);
		$this->SetXY(5+5,$this->GetY());$this->Cell(50,10,$this->nbrtostring("structure","id",$result->STRUCTURED,"structurear"),0,1,'C',1,0);
		$this->SetFont('aefurat', '', 14);
		$this->Text(70,90,"اللقب : ".$result->NOMARM);  
		$this->Text(70,80,"الاسم : ".$result->PRENOMARM); 
		$this->Text(70,100,"تاريخ الميلاد : ". $result->DATENS2);
		$this->Text(10,110,"انا الممضي اسفله الولي الشرعي  للمريضة المذكورة اعلاه ");
		$this->Text(10,120,"أرخص للفريق الطبي الجراحي للمؤسسة العمومية  ".$this->nbrtostring("structure","id",$result->STRUCTURED,"structurear"));
		$this->Text(10,130,"لإجراء عملية قيصرية و/أو  إستئصال الرحم في حالة مضاعفات تمس الأم و الجنين");
		$this->Text(10,140,"و إستعمال  جميع الوسائل الضرورية للتكفل بها وكذا التخذير العام");
		$this->Text(80,160,"الأب / الزوج / الأخ ");
		$this->Text(10,170,"الإسم : ........................................");  $this->Text(130,170,"الإمضاء و البصمة ");
		$this->Text(10,180,"اللقب : ........................................"); $this->Text(110,180,"......................................................");
		$this->Text(10,190,"تاريخ الميلاد : .............................");     $this->Text(110,190,"......................................................");
		$this->Text(10,200,"رقم ب ت /ر س : .........................");
		$this->Text(20,220,"الطبيب  : ");$this->Text(110,220," في : ".date("Y-m-d"));
		$this->Text(20,230,"");$this->Text(120,230,"المدير");
		$this->Text(10,270,"هام : يحتفظ بنسخة منه داخل الملف الطبي");
		$this->SetFont('aefurat', '', 12); 
		}
		}

		 function altfr($id)
		{
		$this-> mysqlconnect();
	    $sql = "SELECT * FROM naissance WHERE id = '".$id."' "; 
        $requete = @mysql_query($sql) or die($sql."<br>".mysql_error()) ;
        if( $result = mysql_fetch_object( $requete ) )
        {
		$this->setPrintHeader(false);
        $this->setPrintFooter(false);
        $this->SetFont('aefurat', '', 14);
        $this->SetDisplayMode('fullpage','single');//mode d affichage 
        $this->AddPage();
		$this->RoundedRect($x=5,  $y=5,   $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
		$this->SetFont('aefurat', '', 14);
		$this->SetXY(5,$this->GetY()+5);$this->Cell(200,6,$this->repfr,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,6,$this->mspfr,0,1,'C');
		$this->SetXY(5,$this->GetY());$this->Cell(200,6,$this->dspfr.$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYAS"),0,1,'C');
		$this->SetFillColor(245);
		$this->SetXY(65+5,$this->GetY()+10);$this->Cell(140-10,10,"Autorisation d'une stérilisation à visée contraceptive",0,1,'C',1,0);
		$this->SetXY(5+5,$this->GetY()-10);$this->Cell(50,10,'Etablissement public',0,1,'C',1,0);
		$this->SetXY(5+5,$this->GetY());$this->Cell(50,10,$this->nbrtostring("structure","id",$result->STRUCTURED,"structure"),0,1,'C',1,0);
		$this->SetFont('aefurat', '', 14);
		$this->Text(70,80,"Nom : ".$result->NOM2);  
		$this->Text(70,90,"Prénom : ".$result->PRENOM2); 
		$this->Text(70,100,"Date de naissance : ". $this->dateUS2FR($result->DATENS2));
		$this->Text(10,$this->GetY()+10,"Je soussigné certifie avoir sollicité l'équipe médico-chirurgicale ");
		$this->Text(10,$this->GetY()+10,"de l'établissement public ".$this->nbrtostring("structure","id",$result->STRUCTURED,"structure"));
		$this->Text(10,$this->GetY()+10,"afin qu'il réalise sur moi une stérilisation à visée contraceptive ");
		
		$this->Text(10,$this->GetY()+10,"*avoir reçu de sa part une information sur : ");
		$this->Text(10,$this->GetY()+10,"- les différents moyens contraceptifs adaptés à ma situation.");  
		$this->Text(10,$this->GetY()+10,"- la stérilisation : les techniques proposées, les contre-indications éventuelles");    
		$this->Text(10,$this->GetY()+10,"  les risques d'échecs et d'effets indésirables, les conséquences de l'intervention");           
		$this->Text(10,$this->GetY()+10,"  et notamment son caractère à priori irréversible ;");
		$this->Text(10,$this->GetY()+10,"*avoir reçu un dossier d'information ;");
		
		$this->Text(10,$this->GetY()+10,"*avoir été informé(e) de la nécessité de respecter un délai de 4 mois entre");
		$this->Text(10,$this->GetY()+10,"la présente consultation et la signature du consentement préalable à l'intervention.");
		// $this->Text(100,$this->GetY()+10,"  Signature");
		
		
		
		
		
		$this->Text(20,$this->GetY()+10,"");$this->Text(110,$this->GetY()," Le ".date("d-m-Y"));
		$this->Text(20,$this->GetY()+10,"");$this->Text(120,$this->GetY(),"Signature");
		$this->Text(10,$this->GetY()+30,"Important : à garder dans le dossier médical");
		$this->SetFont('aefurat', '', 12); //0771218289 Dr mehalbi 
		}
		}
		
		
	function LineGraph($w, $h, $data, $options='', $colors=null, $maxVal=0, $nbDiv=4){
		/*******************************************
		Explain the variables:
		$w = the width of the diagram
		$h = the height of the diagram
		$data = the data for the diagram in the form of a multidimensional array
		$options = the possible formatting options which include:
			'V' = Print Vertical Divider lines
			'H' = Print Horizontal Divider Lines
			'kB' = Print bounding box around the Key (legend)
			'vB' = Print bounding box around the values under the graph
			'gB' = Print bounding box around the graph
			'dB' = Print bounding box around the entire diagram
		$colors = A multidimensional array containing RGB values
		$maxVal = The Maximum Value for the graph vertically
		$nbDiv = The number of vertical Divisions
		*******************************************/
		$this->SetDrawColor(0,0,0);
		$this->SetLineWidth(0.2);
		$keys = array_keys($data);
		$ordinateWidth = 10;
		$w -= $ordinateWidth;
		$valX = $this->getX()+$ordinateWidth;
		$valY = $this->getY();
		$margin = 1;
		$titleH = 8;
		$titleW = $w;
		$lineh = 5;
		$keyH = count($data)*$lineh;
		$keyW = $w/5;
		$graphValH = 5;
		$graphValW = $w-$keyW-3*$margin;
		$graphH = $h-(3*$margin)-$graphValH;
		$graphW = $w-(2*$margin)-($keyW+$margin);
		$graphX = $valX+$margin;
		$graphY = $valY+$margin;
		$graphValX = $valX+$margin;
		$graphValY = $valY+2*$margin+$graphH;
		$keyX = $valX+(2*$margin)+$graphW;
		$keyY = $valY+$margin+.5*($h-(2*$margin))-.5*($keyH);
		//draw graph frame border
		if(strstr($options,'gB')){
			$this->Rect($valX,$valY,$w,$h);
		}
		//draw graph diagram border
		if(strstr($options,'dB')){
			$this->Rect($valX+$margin,$valY+$margin,$graphW,$graphH);
		}
		//draw key legend border
		if(strstr($options,'kB')){
			$this->Rect($keyX,$keyY,$keyW,$keyH);
		}
		//draw graph value box
		if(strstr($options,'vB')){
			$this->Rect($graphValX,$graphValY,$graphValW,$graphValH);
		}
		//define colors
		if($colors===null){
			$safeColors = array(0,51,102,153,204,225);
			for($i=0;$i<count($data);$i++){
				$colors[$keys[$i]] = array($safeColors[array_rand($safeColors)],$safeColors[array_rand($safeColors)],$safeColors[array_rand($safeColors)]);
			}
		}
		//form an array with all data values from the multi-demensional $data array
		$ValArray = array();
		foreach($data as $key => $value){
			foreach($data[$key] as $val){
				$ValArray[]=$val;					
			}
		}
		//define max value
		if($maxVal<ceil(max($ValArray))){
			$maxVal = ceil(max($ValArray));
		}
		//draw horizontal lines
		$vertDivH = $graphH/$nbDiv;
		if(strstr($options,'H')){
			for($i=0;$i<=$nbDiv;$i++){
				if($i<$nbDiv){
					$this->Line($graphX,$graphY+$i*$vertDivH,$graphX+$graphW,$graphY+$i*$vertDivH);
				} else{
					$this->Line($graphX,$graphY+$graphH,$graphX+$graphW,$graphY+$graphH);
				}
			}
		}
		//draw vertical lines
		$horiDivW = floor($graphW/(count($data[$keys[0]])-1));
		if(strstr($options,'V')){
			for($i=0;$i<=(count($data[$keys[0]])-1);$i++){
				if($i<(count($data[$keys[0]])-1)){
					$this->Line($graphX+$i*$horiDivW,$graphY,$graphX+$i*$horiDivW,$graphY+$graphH);
				} else {
					$this->Line($graphX+$graphW,$graphY,$graphX+$graphW,$graphY+$graphH);
				}
			}
		}
		//draw graph lines
		foreach($data as $key => $value){
			$this->setDrawColor($colors[$key][0],$colors[$key][1],$colors[$key][2]);
			$this->SetLineWidth(0.8);
			$valueKeys = array_keys($value);
			for($i=0;$i<count($value);$i++){
				
				
				if($i==count($value)-2){
					$this->Line(
						$graphX+($i*$horiDivW),
						$graphY+$graphH-($value[$valueKeys[$i]]/$maxVal*$graphH),
						$graphX+$graphW,
						$graphY+$graphH-($value[$valueKeys[$i+1]]/$maxVal*$graphH)
					);
				} 
				else if($i<(count($value)-1)) {
					$this->Line(
						$graphX+($i*$horiDivW),
						$graphY+$graphH-($value[$valueKeys[$i]]/$maxVal*$graphH),
						$graphX+($i+1)*$horiDivW,
						$graphY+$graphH-($value[$valueKeys[$i+1]]/$maxVal*$graphH)
					);
				}
			}
			//Set the Key (legend)
			$this->SetFont('Courier','',10);
			if(!isset($n))$n=0;
			$this->Line($keyX+1,$keyY+$lineh/2+$n*$lineh,$keyX+8,$keyY+$lineh/2+$n*$lineh);
			$this->SetXY($keyX+8,$keyY+$n*$lineh);
			$this->Cell($keyW,$lineh,$key,0,1,'L');
			$n++;
		}
		//print the abscissa values
		foreach($valueKeys as $key => $value){
			if($key==0){
				$this->SetXY($graphValX,$graphValY);
				$this->Cell(30,$lineh,$value,0,0,'L');
			} else if($key==count($valueKeys)-1){
				$this->SetXY($graphValX+$graphValW-30,$graphValY);
				$this->Cell(30,$lineh,$value,0,0,'R');
			} else {
				$this->SetXY($graphValX+$key*$horiDivW-15,$graphValY);
				$this->Cell(30,$lineh,$value,0,0,'C');
			}
		}
		//print the ordinate values
		for($i=0;$i<=$nbDiv;$i++){
			$this->SetXY($graphValX-10,$graphY+($nbDiv-$i)*$vertDivH-3);
			$this->Cell(8,6,sprintf('%.1f',$maxVal/$nbDiv*$i),0,0,'R');
		}
		$this->SetDrawColor(0,0,0);
		$this->SetLineWidth(0.2);
	}


function LineG($RCF,$heure){


    $a=array(180=>0,170=>1,160=>2,150=>3,140=>4,130=>5,120=>6,110=>7,100=>8);
	$c=array(0=>35,1=>35,2=>35+7,3=>35+14,4=>35+21,5=>35+28,6=>35+35,7=>35+42,8=>35+49,9=>35+56,10=>35+63,11=>35+70,12=>35+77,13=>35+84,14=>35+91,15=>35+98,16=>35+105,17=>35+112,18=>35+119,19=>35+126,20=>35+133,21=>35+140,22=>35+147,23=>35+154,24=>35+161);
	
	$this->SetFont('aefurat', '', 20);$this->SetTextColor(0,0,225);
	$this->Text($c[$heure],13+(5*$a[$RCF]),"X");
	$this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
    
	
	

	
	


	}




















		
}