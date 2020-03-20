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
		$DATEPV="في عـــام الفيــــن و".$ANNEE1."وفي اليـــوم ".$JOURS1." من شهـــر ".$MOIS1;
		
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
			$M      = substr($HINS,4,2);                  
			if($M>0){
			$MINUTE = array("الاولى","الثانية","الثالثة","الرابعة","الخامسة","السادسة","السابعة","الثامنة","التاسعة","العاشرة","الحادي عشرة","الثاني عشرة","الثالث عشرة"," الرابع عشرة  "," الخامس عشرة "," السادس عشرة "," السابع عشرة "," الثامن عشرة "," التاسع عشرة "," العشرين "," الواحد و العشرين"," الثاني و العشرين "," الثالث و العشرين "," الرابع و العشرين ");
			$MINUTE1 = $MINUTE[$M-1] ;
			return $MINUTE1;
			}
			else{
			return $MINUTE1="???";
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
		$this->Text(10,120,"La nommée : ".$result->NOM2."_".$result->PRENOM2);     $this->Text(120,120,"Matricule: ");
		$this->Text(10,130,"Agée de: ".$result->AGE2." Ans");
		$this->Text(10,140,"Est entrée le : ");//.$result->DATE
		$this->Text(10,150,"Est sortie Le :");              $this->Text(120,150,"Mode de sortie:");
		$this->Text(10,160,"Service de : ");//.$this->nbrtostring("grh","service","ids",$result->SERVICEHOSP,"servicefr")
		$this->Text(20,180,"Le medecin :");$this->Text(20,190,"Dr ");
		$this->Text(110,200,"Le ".date("d-m-Y"));
		$this->Text(120,210,"LE DIRECTEUR");
		$this->Text(10,270,"Important : A garder dans le dossier médical");
		$this->SetFont('aefurat', '', 12);
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
		$this->Text(10,130,"à pratiquer une césarienne en cas de complication foeto-maternelle .");
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
}