<?php
require('../fpdi.php');

class deces extends FPDI
{ 
     public $nomprenom ="tibaredha";
	 public $db_host="localhost";
	 public $db_name="framework"; 
     public $db_user="root";
     public $db_pass="";
	 public $utf8 = "" ;
	 
	 public $repfr="République algérienne démocratique et populaire";
	 public $mspfr="Ministère de la santé de la population et de la réforme hospitalière";
	 public $dspfr="Direction de la santé et de la population de la wilaya de ";
	
	//fonctions privées
	function _Arc($x1, $y1, $x2, $y2, $x3, $y3){$h = $this->h;$this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,$x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));}
	function RoundedRect($x, $y, $w, $h, $r, $style = ''){$k = $this->k;$hp = $this->h;if($style=='F')$op='f'; elseif($style=='FD' || $style=='DF') $op='B'; else $op='S';$MyArc = 4/3 * (sqrt(2) - 1);$this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));$xc = $x+$w-$r ;$yc = $y+$r;$this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));$this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);$xc = $x+$w-$r ;$yc = $y+$h-$r;$this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));$this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);$xc = $x+$r ;$yc = $y+$h-$r;$this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));$this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);$xc = $x+$r ;$yc = $y+$r;$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));$this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);$this->_out($op);}
	function Sector($xc, $yc, $r, $a, $b, $style='FD', $cw=true, $o=90){$d0 = $a - $b;if($cw){$d = $b;$b = $o - $a;$a = $o - $d;}else{$b += $o;$a += $o;}while($a<0)$a += 360;while($a>360)$a -= 360;while($b<0)$b += 360;while($b>360)$b -= 360;if ($a > $b)$b += 360;$b = $b/360*2*M_PI;$a = $a/360*2*M_PI;$d = $b - $a;if ($d == 0 && $d0 != 0) $d = 2*M_PI; $k = $this->k;$hp = $this->h;if (sin($d/2))$MyArc = 4/3*(1-cos($d/2))/sin($d/2)*$r; else $MyArc = 0;$this->_out(sprintf('%.2F %.2F m',($xc)*$k,($hp-$yc)*$k));$this->_out(sprintf('%.2F %.2F l',($xc+$r*cos($a))*$k,(($hp-($yc-$r*sin($a)))*$k)));if ($d < M_PI/2){$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),$xc+$r*cos($b),$yc-$r*sin($b));}else{$b = $a + $d/4;$MyArc = 4/3*(1-cos($d/8))/sin($d/8)*$r;$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),$xc+$r*cos($b),$yc-$r*sin($b));$a = $b;$b = $a + $d/4;$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),$xc+$r*cos($b),$yc-$r*sin($b));$a = $b;$b = $a + $d/4;$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),$xc+$r*cos($b),$yc-$r*sin($b));$a = $b;$b = $a + $d/4;$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),$xc+$r*cos($b),$yc-$r*sin($b));}if($style=='F')$op='f';elseif($style=='FD' || $style=='DF')$op='b';else$op='s';$this->_out($op);}
	var $angle=0;
	function Rotate($angle,$x=-1,$y=-1){if($x==-1)$x=$this->x;if($y==-1)$y=$this->y;if($this->angle!=0)$this->_out('Q');$this->angle=$angle;if($angle!=0){$angle*=M_PI/180;$c=cos($angle);$s=sin($angle);$cx=$x*$this->k;$cy=($this->h-$y)*$this->k;$this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));}}
	function RotatedText($x,$y,$txt,$angle){$this->Rotate($angle,$x,$y);$this->Text($x,$y,$txt);$this->Rotate(0);}
	function Polygon($points, $style='D'){if($style=='F')$op = 'f';elseif($style=='FD' || $style=='DF')$op = 'b';else $op = 's';$h = $this->h;$k = $this->k;$points_string = '';for($i=0; $i<count($points); $i+=2){$points_string .= sprintf('%.2F %.2F', $points[$i]*$k, ($h-$points[$i+1])*$k);if($i==0)$points_string .= ' m ';else $points_string .= ' l ';}$this->_out($points_string . $op);}
	//fonctions privées
	
	function mysqlconnect(){$this->db_host;$this->db_name;$this->db_user;$this->db_pass;$cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());$db  = mysql_select_db($this->db_name,$cnx) ;mysql_query("SET NAMES 'UTF8' ");return $db;}
	function dateFR2US($date){$J=substr($date,0,2);$M=substr($date,3,2); $A=substr($date,6,4);$dateFR2US =  $A."-".$M."-".$J ;return $dateFR2US;}
	function dateUS2FR($date){$J= substr($date,8,2);$M= substr($date,5,2);$A= substr($date,0,4);$dateUS2FR =  $J."/".$M."/".$A ;return $dateUS2FR;}	
	function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring){if (is_numeric($colonevalue) and $colonevalue!=='0') { $this->mysqlconnect();$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );$row=mysql_fetch_object($result);$resultat=$row->$resultatstring;return $resultat;} return $resultat2='??????';}
	
	//*********************************************************debut revision ************************************************************************//
	function listedeces($STRUCTURED,$datejour1,$datejour2,$login,$type)
	{
	$this->AddPage('L','A4');
	$this->SetTitle('Releve Des Causes De Deces '."Du ".$datejour1." Au ".$datejour2);
	$this->SetFillColor(230);$this->SetTextColor(0,0,0);
	$STRUCTUREDX = explode('=',$STRUCTURED);
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	$this->SetXY(5,5);$this->cell(290,5,$this->repfr,0,0,'C',1,0);
	$this->SetXY(5,10);$this->cell(290,5,$this->mspfr,0,0,'C',1,0);
	$this->SetXY(5,15);$this->cell(290,5,$this->dspfr.': '.$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$STRUCTUREDX[1],"idwil"),"WILAYAS"),0,0,'C',1,0);
	if($STRUCTURED=='IS NOT NULL'){$this->Text(05,25,"Service Prévention");} else {$this->Text(05,25,$this->nbrtostring("structure","id",$STRUCTUREDX[1],"structure"));	$this->Text(240,25," LE : ".date('d-m-Y')); }
	$this->Text(05,30,"SEMEP");$this->Text(05,35,"N ... /".date('Y'));
	$this->SetXY(5,35);$this->cell(290,5,"RELEVE DES CAUSES DE DECES ",0,0,'C',0,0);
	$this->SetXY(5,40);$this->cell(290,5,"Du  ".$this->dateUS2FR($datejour1)."  Au  ".$this->dateUS2FR($datejour2),0,0,'C',0,0);
	$this->SetXY(5,45);$this->cell(290,5,"Ref : circulaire numero 607 du 24 septembre 1994  ",0,0,'C',0,0);
	$this->SetFillColor(200 );
	$this->SetXY(05,55);
	$this->cell(10,10,"N°",1,0,1,'C',0);
	$this->cell(20,10,"Date décès",1,0,1,'C',0);
	if ($type=='I') {$this->cell(10,10,"Sexe",1,0,1,'C',0);$this->cell(10,10,"Age",1,0,1,'C',0);$this->cell(30,10,"Residence ",1,0,1,'C',0);$this->cell(25,10,"Profession",1,0,1,'C',0);$this->cell(40,10,"Service ",1,0,1,'C',0);$this->cell(15,10,"Duree",1,0,1,'C',0);$this->cell(126,10,"Cause du deces",1,0,1,'C',0);} else {$this->cell(70,10,"Nom_Prenom",1,0,1,'C',0);$this->cell(10,10,"Sexe",1,0,1,'C',0);$this->cell(20,10,"Nee le",1,0,1,'C',0);$this->cell(10,10,"Age",1,0,1,'C',0);$this->cell(45,10,"residence",1,0,1,'C',0);$this->cell(20,10,"Admission",1,0,1,'C',0);$this->cell(56,10,"Service ",1,0,1,'C',0);$this->cell(15,10,"Duree",1,0,1,'C',0);$this->cell(10,10,"CIM",1,0,1,'C',0);}
	$this->mysqlconnect();
	$query = "SELECT * FROM deceshosp where DINS BETWEEN '$datejour1' AND '$datejour2' and STRUCTURED $STRUCTURED  order by  DINS     ";
	$resultat=mysql_query($query);$totalmbr1=mysql_num_rows($resultat);
	$this->SetFont('Arial', '',9, '', true);
	$this->SetXY(05,65); 
	$x=0;
	while($row=mysql_fetch_object($resultat))
	{
		$x=$x+1;
		$this->cell(10,5,$x,1,0,'C',0);$this->cell(20,5,$this->dateUS2FR($row->DINS),1,0,'C',0);
		if ($type=='I') 
		{
		$this->cell(10,5,trim($row->SEX),1,0,'C',0);
		if ($row->Years > 0 ){$this->cell(10,5,$row->Years." A",1,0,'C',0);} else {if ($row->Days <= 30 ) {$this->cell(10,5,$row->Days." J",1,0,'C',0);} else{$this->cell(10,5,$row->Months." M",1,0,'C',0);} }
		$this->cell(30,5,$this->nbrtostring("com","IDCOM",$row->COMMUNER,"COMMUNE"),1,0,'L',0);$this->cell(25,5,$this->nbrtostring("profession","id",$row->Profession,"Profession"),1,0,'L',0);$this->cell(40,5,html_entity_decode(utf8_decode($this->nbrtostring("servicedeces","id",$row->SERVICEHOSPIT,"service"))),1,0,'L',0);$this->cell(15,5,$row->DUREEHOSPIT.' j',1,0,'C',0);$this->cell(126,5,'('.$this->nbrtostring("CIM","row_id",$row->CODECIM,'diag_nom').')_'.$this->nbrtostring("CIM","row_id",$row->CODECIM,'diag_cod'),1,0,'L',0);
		}
		else
		{
		$this->cell(70,5,trim($row->NOM).'_'.strtolower (trim($row->PRENOM)).' ['.strtolower (trim($row->FILSDE)).']',1,0,'L',0);$this->cell(10,5,trim($row->SEX),1,0,'C',0);$this->cell(20,5,$this->dateUS2FR($row->DATENAISSANCE),1,0,'C',0);
		if ($row->Years > 0 ) {$this->cell(10,5,$row->Years." A",1,0,'C',0);} else {if ($row->Days <= 30 ) {$this->cell(10,5,$row->Days." J",1,0,'C',0);} else{$this->cell(10,5,$row->Months." M",1,0,'C',0);} }
		$this->cell(45,5,$this->nbrtostring("com","IDCOM",$row->COMMUNER,"COMMUNE"),1,0,'L',0);$this->cell(20,5,$this->dateUS2FR($row->DATEHOSPI),1,0,'C',0);$this->cell(56,5,$this->nbrtostring("servicedeces","id",$row->SERVICEHOSPIT,"service"),1,0,'L',0);$this->cell(15,5,$row->DUREEHOSPIT.' j',1,0,'C',0);$this->cell(10,5,$this->nbrtostring("CIM","row_id",$row->CODECIM,'diag_cod'),1,0,'C',0);
		}
		$this->SetXY(5,$this->GetY()+5); 
	}
	$this->SetFont('Arial', '',10, '', true);  
	$this->SetXY(5,$this->GetY());$this->cell(40,05,"TOTAL",1,0,1,'C',0);	  
	$this->SetXY(45,$this->GetY());$this->cell(246,05,$totalmbr1." Deces",1,1,1,'C',0);				 
	$this->SetXY(190,$this->GetY()+5); $this->cell(90,10,"Le Praticien Responsable ",0,0,'L',0);
	$this->SetXY(190,$this->GetY()+5); $this->cell(90,10,'Dr '.$login,0,0,'L',0);
	}
	
	function valeurmois($TBL,$COLONE1,$DATEJOUR1,$DATEJOUR2,$STR) {$this->mysqlconnect();$sql = " select * from $TBL  where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' and  STRUCTURED  $STR ";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$OP=mysql_num_rows($requete);mysql_free_result($requete);return $OP;}
	
	function BORDEREAU($titre,$datejour1,$datejour2,$EPH1,$STRUCTURED) 
	{
	$this->AddPage('P','A4');
	$this->SetTitle('Mortalité hospitalière '."Du ".$datejour1." Au ".$datejour2);
	$this->SetFont('Times', 'B', 11);$this->SetTextColor(0,0,0);$this->SetFillColor(230);
	$this->SetXY(5,10);$this->cell(200,5,$this->repfr,0,0,'C',1,0);
	$this->SetXY(5,20);$this->cell(200,5,$this->mspfr,0,0,'C',1,0);
	$this->SetXY(5,30);$this->cell(200,5,$this->dspfr.': '.$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$STRUCTURED,"idwil"),"WILAYAS"),0,0,'C',1,0);
	$this->SetXY(5,40);$this->cell(100,5,$this->nbrtostring("structure","id",$STRUCTURED,"structure"),0,0,'L',0,0);$this->SetXY(155,40);$this->cell(50,5,"Le : ".date('d-m-Y'),0,0,'L',0,0);
	$this->SetXY(5,45);$this->cell(100,5,"N°............... / ".date('Y'),0,0,'L',0,0);
	$this->SetXY(40,55);$this->cell(150,5,"A",0,0,'C',0,0);$this->SetXY(40,65);$this->cell(150,5,"Monsieur le Directeur de la sante et de la population de la wilaya de ".$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$STRUCTURED,"idwil"),"WILAYAS"),0,0,'C',0,0);$this->SetXY(5,85);$this->cell(200,10,$titre,0,0,'C',1,0);
	$this->RoundedRect(5,108, 15, 130, 2, $style = '');$this->RoundedRect(20,108, 105, 130, 2, $style = '');$this->RoundedRect(20+105,108, 15, 130, 2, $style = '');$this->RoundedRect(20+105+15,108, 65, 130, 2, $style = '');
	$this->SetXY(5,108);$this->cell(15,10,"N°",1,0,'C',1,0);$this->SetXY(5+15,108);$this->cell(105,10,"DESIGNATION",1,0,'C',1,0);$this->SetXY(5+15+105,108);$this->cell(15,10,"NBR",1,0,'C',1,0);$this->SetXY(5+30+105,108);$this->cell(65,10,"OBSERVATION",1,0,'C',1,0);
	$this->SetXY(5+15,128);$this->cell(105,10,"Veuillez trouver ci-joint",0,0,'C',0,0);
	$this->SetXY(5,148);$this->cell(15,10,"1",0,0,'C',0,0);$this->SetXY(5+15,148);$this->cell(105,10,"Certificats de décès",0,0,'L',0,0);$this->SetXY(5+15+105,148);$this->cell(15,10,$this->valeurmois('deceshosp','DINS',$datejour1,$datejour2,$EPH1),0,0,'C',0,0);$this->SetXY(5+30+105,148);$this->cell(65,10,"",0,0,'C',0,0);
	$this->SetXY(5,158);$this->cell(15,10,"2",0,0,'C',0,0);$this->SetXY(5+15,158);$this->cell(105,10,"Liste nominative des décès hospitaliers",0,0,'L',0,0);$this->SetXY(5+15+105,158);$this->cell(15,10,"01",0,0,'C',0,0);$this->SetXY(5+30+105,158);$this->cell(65,10,"Rapport",0,0,'C',0,0);
	$this->SetXY(5,168);$this->cell(15,10,"3",0,0,'C',0,0);$this->SetXY(5+15,168);$this->cell(105,10,"Rapport de la mortatlité hospitalière",0,0,'L',0,0);$this->SetXY(5+15+105,168);$this->cell(15,10,"01",0,0,'C',0,0);$this->SetXY(5+30+105,168);$this->cell(65,10,"Mortalité Hospitalière",0,0,'C',0,0);
	$this->SetXY(5,178);$this->cell(15,10,"4",0,0,'C',0,0);$this->SetXY(5+15,178);$this->cell(105,10,"Support Informatique (CD)",0,0,'L',0,0);$this->SetXY(5+15+105,178);$this->cell(15,10,"01",0,0,'C',0,0);$this->SetXY(5+30+105,178);$this->cell(65,10,"Du ".$this->dateUS2FR($datejour1)." Au ".$this->dateUS2FR($datejour2),0,0,'C',0,0);
	$this->SetXY(5+30+105,250);$this->cell(40,10,"Le Directeur",0,0,'L',0,0);
	$this->SetFont('Times', 'B', 11);
	}
	
	function PAGEDEGARDE($datejour1,$datejour2,$EPH1,$STRUCTURED) 
	{
	$this->AddPage('P','A4');
	$this->SetFont('Times', 'B', 11);$this->SetTextColor(0,0,0);$this->SetFillColor(230);
	$this->RoundedRect(5,108, 200, 160, 2, $style = '');
	$this->SetXY(5,10);$this->cell(200,5,$this->repfr,0,0,'C',1,0);
	$this->SetXY(5,20);$this->cell(200,5,$this->mspfr,0,0,'C',1,0);
	$this->SetXY(5,30);$this->cell(200,5,$this->dspfr.': '.$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$STRUCTURED,"idwil"),"WILAYAS"),0,0,'C',1,0);
	$this->SetFont('Times', 'B', 16);$this->SetTextColor(255,0,0);$this->SetFillColor(230);
	$this->SetXY(5,70);$this->cell(200,5,"Mortalite Intra-Hospitaliere",0,0,'C',1,0);
	$this->SetXY(5,80);$this->cell(200,5,"Du ".$this->dateUS2FR($datejour1)." Au ".$this->dateUS2FR($datejour2),0,0,'C',1,0);
	$this->SetXY(5,90);$this->cell(200,5,$this->nbrtostring("structure","id",$STRUCTURED,"structure"),0,0,'C',1,0);
	$this->SetFont('Times', 'U', 11);$this->SetTextColor(0,0,0);$this->SetFillColor(230);
	}
	
	function nbrservicet($datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = " select * from deceshosp where SERVICEHOSPIT !='0' and STRUCTURED $eph and (DINS BETWEEN '$datejour1' AND '$datejour2')";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function nbrservice($nbrservice,$datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = " select * from deceshosp where SERVICEHOSPIT=$nbrservice  and STRUCTURED $eph and (DINS BETWEEN '$datejour1' AND '$datejour2')";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function nbrservicedsexe($sexe,$datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = " select * from deceshosp where SEX = '$sexe'  and STRUCTURED $eph and (DINS BETWEEN '$datejour1' AND '$datejour2')";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function nbrservicedinf($nbrservice,$datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = " select * from deceshosp where DUREEHOSPIT < $nbrservice and (DINS BETWEEN '$datejour1' AND '$datejour2') and STRUCTURED $eph";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function nbrservicedsup($nbrservice,$datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = " select * from deceshosp where DUREEHOSPIT > $nbrservice and (DINS BETWEEN '$datejour1' AND '$datejour2') and STRUCTURED $eph";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	
	
	function pie2($data)
    {
	$xc=$data['x'];$yc=$data['y'];$r=$data['r'];
	if ($data['v1']+$data['v2'] > 0){$tot=$data['v1']+$data['v2'];}else {$tot=1;}
	$p1=round($data['v1']*100/$tot,2);$p2=round($data['v2']*100/$tot,2);
	$a1=$p1*3.6;$a2=$a1+($p2*3.6);
	$this->SetFont('Times', 'BIU', 11);
	$this->SetXY($xc-30,$yc-25);$this->Cell(0, 5,$data['t0'] ,0, 2, 'L');
	$this->RoundedRect($xc-30,$yc-25, 100, 45, 2, $style = '');
	$this->SetFont('Times', 'B', 11);$this->SetTextColor(0,0,0);$this->SetFillColor(120,120,255);
	$this->Sector($xc,$yc,$r,0,$a1);
	$this->SetXY($xc+25,$yc-15);$this->cell(10,5,'',1,0,'C',1,0);$this->cell(10,5,$data['t1'],1,0,'C',0,0);$this->cell(20,5,$p1.'%',1,0,'C',0,0);
	$this->SetFont('Times', 'B', 11);$this->SetTextColor(0,0,0);$this->SetFillColor(120,255,120);
	$this->Sector($xc,$yc,$r,$a1,$a2);
	$this->SetXY($xc+25,$yc-5);$this->cell(10,5,'',1,0,'C',1,0);$this->cell(10,5,$data['t2'],1,0,'C',0,0);$this->cell(20,5,$p2.'%',1,0,'C',0,0);
	$this->SetFont('Times', 'B', 11);$this->SetTextColor(0,0,0);$this->SetFillColor(230);
    }
	
	function barservice($x,$y,$datamf,$titre)
    {
	$total1=array_sum($datamf);
	if ($total1==0)  {$total=0.1;} else {$total=$total1;} 
	$this->SetFont('Times', 'BIU', 11);
	$this->SetXY($x-20,$y-108);$this->Cell(0, 5,$titre,0, 2, 'L');
	$this->RoundedRect($x-20,$y-108, 90, 130, 2, $style = '');
	$w=4.28;
	$this->SetFont('Times', '',08);$this->SetTextColor(255,0,0);
	for ($i = 1; $i <= 21; $i+= 1) {$this->RotatedText($x-21.5+($i*$w),$y+10-$datamf[$i],'-'.$datamf[$i].'%',90);} 
    $this->SetTextColor(0,0,0);$this->SetFillColor(120,255,120);
	$this->SetXY($x-20,$y+10.3); for ($i = 1; $i <= 21; $i+= 1) {$this->cell($w,-$datamf[$i],'',1,0,'C',1,0); } 
	$this->SetXY($x-20,$y+12); for ($i = 1; $i <= 21; $i+= 1) {$this->cell($w,5,$i,1,0,'C',0,0);} 
	$this->SetFillColor(230);$this->SetFont('Times', 'B', 8);
	for ($i = 00; $i <= 100; $i+= 10) {$this->SetXY(111.7,160-2.5-$i);$this->cell(5,5,$i.'-',0,0,'R',0);} 
    $this->SetFont('Times', 'B', 11);
	}
	
	function servicehospitalisation($datejour1,$datejour2,$valeurs,$eph) 
	{ 		
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230);
	$datamf = array();$datamf1 = array();$datamfx = array();$nt=$this->nbrservicet($datejour1,$datejour2,$eph);
	$this->SetXY(5,25+10);$this->cell(285,5,"Cette étude a porté sur ".$nt." décès survenus durant la periode du ".$this->dateUS2FR($datejour1)." au ".$this->dateUS2FR($datejour2)." au niveau de 36 communes ",0,0,'L',0);
	$this->SetXY(5,35+7);$this->cell(105,5,"Répartition des décès par service ",1,0,'L',1,0);	
	$this->SetXY(5,35+7+5);$this->cell(10,5,"Num",1,0,'C',1,0);$this->cell(55,5,"Service",1,0,'L',1,0);$this->cell(20,5,"Nbr",1,0,'C',1,0);$this->cell(20,5,"Tx %",1,0,'C',1,0);	
	$this->SetFont('Times','B',9);$this->SetXY(05,35+7+10); 
	$this->mysqlconnect();$query = "SELECT * FROM servicedeces ";$resultat=mysql_query($query);$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{
	$n=$this->nbrservice($row->id,$datejour1,$datejour2,$eph);
	if ($nt>0) {
	$datamf[$row->id]=round(($n*100)/$nt,2);$datamf1[$row->id]=round(($n*100)/$nt,2);
	$this->cell(10,5,$datamfx[$row->id]=$row->id,1,0,'C',0);$this->cell(55,5,$row->service,1,0,'L',0);$this->cell(20,5,$n,1,0,'C',0);$this->cell(20,5,round(($n*100)/$nt,2),1,0,'C',0);
	}else{
	$datamf[$row->id]=0;$datamf1[$row->id]=0;
	$this->cell(10,5,$datamfx[$row->id]=$row->id,1,0,'C',0);$this->cell(55,5,$row->service,1,0,'L',0);$this->cell(20,5,$n,1,0,'C',0); $this->cell(20,5,0,1,0,'C',0);
	} 
	$this->SetXY(5,$this->GetY()+5); 
	}
	$this->SetXY(5,$this->GetY()); 
	$this->cell(65,5,"Total",1,0,'L',1,0);$this->cell(20,5,$nt,1,0,'C',1,0); 	
	if($nt>0) {$this->cell(20,5,round(($nt*100)/$nt,2),1,0,'C',1,0);} else {$this->cell(20,5,0,1,0,'C',1,0);}	
	$this->SetFont('Times','B',10);
	$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"1-Répartition des décès par service : ",0,0,'L',0);
	rsort($datamf);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la plus élevée est : ".$datamf[0]."%",0,0,'L',0);
	sort($datamf);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la moins élevée est : ".$datamf[0]."%",0,0,'L',0);
	$mas=$this->nbrservicedsexe('M',$datejour1,$datejour2,$eph);
	$fem=$this->nbrservicedsexe('F',$datejour1,$datejour2,$eph);
	$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"2-Répartition des décès par sexe : ",0,0,'L',0);
	$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"La répartition des ".$nt." décès enregistrés montre que :",0,0,'L',0);
	$this->SetXY(5,$this->GetY()+5);if ($nt > 0){$this->cell(285,5,round(($mas/$nt)*100,2)."% des décès touche les hommes. ",0,0,'L',0);}else{$this->cell(285,5,"0% des décès touche les hommes. ",0,0,'L',0);}
	$this->SetXY(5,$this->GetY()+5);if ($nt > 0){$this->cell(285,5,round(($fem/$nt)*100,2)."% des décès touche les femmes. ",0,0,'L',0);}else{$this->cell(285,5,"0% des décès touche les femmes. ",0,0,'L',0);}
	$this->SetXY(5,$this->GetY()+5);if($fem > 0){$this->cell(285,5,"avec un sexe ratio de ".round(($mas/$fem),2),0,0,'L',0);} else {$this->cell(285,5,"avec un sexe ratio de 0 ",0,0,'L',0);}
	$this->barservice(135,150,$datamf1,"I-Distribution des décès par Service D'hospitalisation"); 	
	$pie2 = array("x" => 135, "y" => 200, "r" => 17,"v1" =>$mas ,"v2" =>$fem ,"t0" => "Distribution des décès par sexe ","t1" => "M","t2" => "F");
	$this->pie2($pie2);
	}
	
	function nbrserviced($dureehospit,$datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = " select * from deceshosp where DUREEHOSPIT = $dureehospit and (DINS BETWEEN '$datejour1' AND '$datejour2') and  STRUCTURED $eph";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	   
	function barserviced($x,$y,$datamf,$titre)
	{
	$total1=array_sum($datamf);
	$this->SetFont('Times', 'BIU', 11);
	$this->SetXY($x-20,$y-108);$this->Cell(0, 5,$titre,0, 2, 'L');
	$this->RoundedRect($x-20,$y-108, 90, 130, 2, $style = '');
	$w=4.28;
	$this->SetFont('Times', '',08);$this->SetTextColor(255,0,0);
	for ($i = 0; $i <= 20; $i+= 1) {$this->RotatedText($x-16.5+($i*$w),$y+10-$datamf[$i],'-'.$datamf[$i].'%',90);} 
	$this->SetTextColor(0,0,0);$this->SetFillColor(120,255,120);
	$this->SetXY($x-20,$y+10.3); for ($i = 0; $i <= 20; $i+= 1) {$this->cell($w,-$datamf[$i],'',1,0,'C',1,0); } 
	$this->SetXY($x-20,$y+12); for ($i = 0; $i <= 20; $i+= 1) {$this->cell($w,5,$i,1,0,'C',0,0);} 
	$this->SetFillColor(230);$this->SetFont('Times', 'B', 8);
	for ($i = 00; $i <= 100; $i+= 10) {$this->SetXY(111.7,160-2.5-$i);$this->cell(5,5,$i.'-',0,0,'R',0);} 
	$this->SetFont('Times', 'B', 11);
	}
	function dureehospitalisation1($datejour1,$datejour2,$valeurs,$eph) 
	{
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230); 
	$datan = array();for ($i = 0; $i <= 20; $i+= 1){$datan[$i]= $this->nbrserviced($i,$datejour1,$datejour2,$eph);}
	$datap = array();for ($i = 0; $i <= 20; $i+= 1) {if (array_sum($datan)>0) {$datap[$i]= round(($datan[$i]*100)/array_sum($datan),2);} else {$datap[$i]= 0;} }
	$this->SetXY(5,25+10);$this->cell(285,5,"Cette étude a porté sur ".array_sum($datan)." décès survenus durant la periode du ".$this->dateUS2FR($datejour1)." au ".$this->dateUS2FR($datejour2)." au niveau de 36 communes ",0,0,'L',0);
	$this->SetXY(5,35+7);$this->cell(105,5,"Répartition des décès par Durée D'hospitalisation ",1,0,'L',1,0);
	$this->SetXY(5,35+7+5);$this->cell(65,5,"Nombre de jours",1,0,'C',1,0);$this->cell(20,5,"Nbr",1,0,'C',1,0);$this->cell(20,5,"Tx %",1,0,'C',1,0);
	for ($i = 0; $i <= 20; $i+= 1){$this->SetXY(5,$this->GetY()+5);$this->cell(65,5,$i,1,0,'C',0);$this->cell(20,5,$datan[$i],1,0,'C',0);$this->cell(20,5,$datap[$i],1,0,'C',0);}
	$this->SetXY(5,$this->GetY()+5); 
	$this->cell(65,5,"Total",1,0,'L',1,0);
	$this->cell(20,5,array_sum($datan),1,0,'C',1,0);        
	if(array_sum($datan)>0) {$this->cell(20,5,"100%",1,0,'C',1,0);} else {$this->cell(20,5,"0%",1,0,'C',1,0);} 				
	$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"1-Répartition des décès par Durée D'hospitalisation : ",0,0,'L',0);
	rsort($datap);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la plus  élevée est : ".$datap[0]."%",0,0,'L',0);
	sort($datap); $this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la moins élevée est : ".$datap[0]."%",0,0,'L',0);
	$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"<0 : ".$this->nbrservicedinf(0,$datejour1,$datejour2,$eph),0,0,'L',0);
	$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,">20 : ".$this->nbrservicedsup(20,$datejour1,$datejour2,$eph),0,0,'L',0);
	$mas=$this->nbrservicedsexe('M',$datejour1,$datejour2,$eph);$fem=$this->nbrservicedsexe('F',$datejour1,$datejour2,$eph);
	$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"2-Répartition des décès par sexe : ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"La répartition des ".array_sum($datan)." décès enregistrés montre que :",0,0,'L',0);
	if(array_sum($datan)>0) {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round(($mas/array_sum($datan))*100,2)."% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round(($fem/array_sum($datan))*100,2)."% des décès touche les femmes. ",0,0,'L',0);} else {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les femmes. ",0,0,'L',0);} 
	$this->SetXY(5,$this->GetY()+5);if ($fem > 0){$this->cell(285,5,"avec un sexe ratio de ".round(($mas/$fem),2),0,0,'L',0);}else{$this->cell(285,5,"avec un sexe ratio de 0 ",0,0,'L',0);}
	rsort($datap);
	$this->barserviced(135,150,$datap,"II-Distribution des décès par Durée D'hospitalisation"); 	
	$pie2 = array("x" => 135,"y" => 200, "r" => 17,"v1" =>$mas ,"v2" =>$fem ,"t0" => "Distribution des décès par sexe ","t1" => "M","t2" => "F");
	$this->pie2($pie2);
	}
	function AGESEXE($colone1,$colone2,$colone3,$datejour1,$datejour2,$SEXEDNR,$STRUCTURED){$this->mysqlconnect();$sql = " select * from deceshosp where($colone1 >=$colone2  and $colone1 <=$colone3)  and (DINS BETWEEN '$datejour1' AND '$datejour2') and (SEX='$SEXEDNR' and STRUCTURED $STRUCTURED )          ";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	
	function barservicedx($x,$y,$datamf,$titre,$tages)
	{
	$total1=array_sum($datamf);
	$this->SetFont('Times', 'BIU', 11);
	$this->SetXY($x-20,$y-108);$this->Cell(0, 5,$titre,0, 2, 'L');
	$this->RoundedRect($x-30,$y-108, 100, $tages+25, 2, $style = '');
	$this->SetFont('Arial', '',8);$this->SetTextColor(255,0,0);
	$this->SetXY($x-30,57);$this->cell(100,05,$titre,1,0,'C',1,0);
	$this->SetTextColor(0,0,0);$this->SetFillColor(120,255,120);
	for ($i = 0; $i <= $tages; $i+= 5){$this->SetXY($x-30,$this->GetY()+5);$lx=$datamf[$i];if ($lx){$l=$datamf[$i];} else {$l=0.1;} $this->cell($l,5,'',1,0,'C',1,0);$this->cell(15,5,$datamf[$i].' %',0,0,'C',0,0); } 
	$this->SetFillColor(230);$this->SetFont('Times', 'B', 8);
	$this->SetXY($x-30,$this->GetY()+5);
	for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	$this->SetFont('Times', 'B', 11);
	}
	function T2F20x($datejour1,$datejour2,$EPH1,$tages)  //tableau  corige le 15/08/2016
    {
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230); 
	$mr = array();$fr = array();$mfrp = array();$mfrpx = array();
	for ($i = 0; $i <= $tages; $i+= 5) {$mr[$i]=$this->AGESEXE("years",$i,$i+4,$datejour1,$datejour2,'M',$EPH1);$fr[$i]=$this->AGESEXE("years",$i,$i+4,$datejour1,$datejour2,'F',$EPH1);}
	$mf=array_sum($mr)+array_sum($fr);
	$this->SetXY(5,25+10);$this->cell(285,5,"Cette étude a porté sur ".$mf." décès survenus durant la periode du ".$this->dateUS2FR($datejour1)." au ".$this->dateUS2FR($datejour2)." au niveau de 36 communes ",0,0,'L',0);
	$this->SetXY(5,42);                 $this->cell(95,05,"Repartition des deces par tranche d'age et sexe (global)",1,0,'L',1,0);
	$this->SetXY(5,$this->GetY()+5);    $this->cell(15,15,"Age",1,0,'C',1,0);
	$this->SetXY(5+15,$this->GetY());   $this->cell(75+5,10,"Sexe",1,0,'C',1,0);
	$this->SetXY(5+15,$this->GetY()+10);$this->cell(25,5,"M",1,0,'C',1,0); $this->cell(25,5,"F",1,0,'C',1,0);$this->cell(15,5,"T",1,0,'C',1,0);$this->cell(15,5,'P %',1,0,'C',1,0);
	for ($i = 0; $i <= $tages; $i+= 5) {
	$m=$this->AGESEXE("years",$i,$i+4,$datejour1,$datejour2,'M',$EPH1);
	$f=$this->AGESEXE("years",$i,$i+4,$datejour1,$datejour2,'F',$EPH1);
	if($mf>0) {$mfp=round(((($m+$f)*100)/$mf),2);$mfrp[$i]=round(((($m+$f)*100)/$mf),2);$mfrpx[$i]=round(((($m+$f)*100)/$mf),2);} else {$mfp=0;$mfrp[$i]=0;$mfrpx[$i]=0;}$this->SetXY(5,$this->GetY()+5);$this->cell(15,5,$i."-".($i+4),1,0,'C',1,0);$this->cell(25,5,$m,1,0,'C',0,0); $this->cell(25,5,$f,1,0,'C',0,0);$this->cell(15,5,$m+$f,1,0,'C',0,0);$this->cell(15,5,$mfp.' %',1,0,'C',1,0);}
	$this->SetXY(5,$this->GetY()+5);if($mf>0){$this->cell(15,5,"Total",1,0,'C',1,0);$this->cell(25,5,array_sum($mr),1,0,'C',1,0);$this->cell(25,5,array_sum($fr),1,0,'C',1,0);$this->cell(15,5,$mf,1,0,'C',1,0);$this->cell(15,5,'100 %',1,0,'C',1,0);} else {$this->cell(15,5,"Total",1,0,'C',1,0);$this->cell(25,5,array_sum($mr),1,0,'C',1,0); $this->cell(25,5,array_sum($fr),1,0,'C',1,0);$this->cell(15,5,$mf,1,0,'C',1,0);$this->cell(15,5,'0 %',1,0,'C',1,0);}
	$this->SetXY(5,$this->GetY()+10);  $this->cell(285,5,"1-Répartition des décès par sexe : ",0,0,'L',0);
	$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"La répartition des ".$mf." décès enregistrés montre que :",0,0,'L',0);
	if($mf>0) {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round((array_sum($mr)/$mf)*100,2)."% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round((array_sum($fr)/$mf)*100,2)."% des décès touche les femmes. ",0,0,'L',0);}else {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les femmes. ",0,0,'L',0);}
	if (array_sum($fr) > 0){$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"avec un sexe ratio de ".round((array_sum($mr)/array_sum($fr)),2),0,0,'L',0);}else{$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"avec un sexe ratio de 0 ",0,0,'L',0);}
	$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"2-Répartition des décès par tranche d'âge : ",0,0,'L',0);
	rsort($mfrp);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la plus élevée est : ".$mfrp[0]."%",0,0,'L',0);
	sort($mfrp);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la moins élevée est : ".$mfrp[0]."%",0,0,'L',0);
	$this->barservicedx(135,150,$mfrpx,"Distribution des décès par tranche d'age (en années)",$tages);
	$pie2 = array("x" => 135, "y" => $this->GetY()+35, "r" => 17,"v1" => array_sum($mr),"v2" => array_sum($fr),"t0" => "Distribution des décès par sexe ","t1" => "M","t2" => "F");
    $this->pie2($pie2);
	}
	
	function barservicedxpn($x,$y,$datamf,$titre,$tages)
	{
	$total1=array_sum($datamf);
	$this->SetFont('Times', 'BIU', 11);
	$this->SetXY($x-20,$y-108);$this->Cell(0, 5,$titre,0, 2, 'L');
	$this->RoundedRect($x-30,$y-108, 100, ($tages*5)+25, 2, $style = '');
	$this->SetFont('Arial', '',8);$this->SetTextColor(255,0,0);
	$this->SetXY($x-30,57);$this->cell(100,05,$titre,1,0,'C',1,0);
	$this->SetTextColor(0,0,0);$this->SetFillColor(120,255,120);
	for ($i = 0; $i <= $tages; $i+= 1)
	{$this->SetXY($x-30,$this->GetY()+5);
	$lx=$datamf[$i];
	if ($lx){$l=$datamf[$i];}else {$l=0.1;} 
	$this->cell($l,5,'',1,0,'C',1,0);$this->cell(15,5,$datamf[$i].' %',0,0,'C',0,0); } 
	$this->SetFillColor(230);$this->SetFont('Times', 'B', 8);
	$this->SetXY($x-30,$this->GetY()+5);
	for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	$this->SetFont('Times', 'B', 11);
	}
	
	function T2F20xpn($datejour1,$datejour2,$EPH1,$tages) 
    {
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230); 
	$mr = array();$fr = array();$mfrp = array();$mfrpx = array();
	for ($i = 0; $i <= $tages; $i+= 1) {$mr[$i]=$this->AGESEXE("Days",$i,$i,$datejour1,$datejour2,'M',$EPH1);$fr[$i]=$this->AGESEXE("Days",$i,$i,$datejour1,$datejour2,'F',$EPH1);}
	$mf=array_sum($mr)+array_sum($fr);
	$this->SetXY(5,25+10);$this->cell(285,5,"Cette étude a porté sur ".$mf." décès survenus durant la periode du ".$this->dateUS2FR($datejour1)." au ".$this->dateUS2FR($datejour2)." au niveau de 36 communes ",0,0,'L',0);
	$this->SetXY(5,42);                 $this->cell(95,05,"Repartition des décès par age en jours et sexe ",1,0,'L',1,0);
	$this->SetXY(5,$this->GetY()+5);    $this->cell(15,15,"Age",1,0,'C',1,0);$this->SetXY(5+15,$this->GetY());   $this->cell(75+5,10,"Sexe",1,0,'C',1,0);$this->SetXY(5+15,$this->GetY()+10);$this->cell(25,5,"M",1,0,'C',1,0); $this->cell(25,5,"F",1,0,'C',1,0);$this->cell(15,5,"T",1,0,'C',1,0);$this->cell(15,5,'P %',1,0,'C',1,0);
	for ($i = 0; $i <= $tages; $i+= 1) 
	{
	$m=$this->AGESEXE("Days",$i,$i,$datejour1,$datejour2,'M',$EPH1);$f=$this->AGESEXE("Days",$i,$i,$datejour1,$datejour2,'F',$EPH1);
	if($mf>0){$mfp=round(((($m+$f)*100)/$mf),2);$mfrp[$i]=round(((($m+$f)*100)/$mf),2);$mfrpx[$i]=round(((($m+$f)*100)/$mf),2);} else {$mfp=0;$mfrp[$i]=0;$mfrpx[$i]=0;}
	$this->SetXY(5,$this->GetY()+5);
	$this->cell(15,5,$i,1,0,'C',1,0); 
	$this->cell(25,5,$m,1,0,'C',0,0); 
	$this->cell(25,5,$f,1,0,'C',0,0);
	$this->cell(15,5,$m+$f,1,0,'C',0,0);
	$this->cell(15,5,$mfp.' %',1,0,'C',1,0);}
	$this->SetXY(5,$this->GetY()+5);if($mf>0){$this->cell(15,5,"Total",1,0,'C',1,0);$this->cell(25,5,array_sum($mr),1,0,'C',1,0); $this->cell(25,5,array_sum($fr),1,0,'C',1,0);$this->cell(15,5,$mf,1,0,'C',1,0);$this->cell(15,5,'100 %',1,0,'C',1,0);} else {$this->cell(15,5,"Total",1,0,'C',1,0);$this->cell(25,5,array_sum($mr),1,0,'C',1,0); $this->cell(25,5,array_sum($fr),1,0,'C',1,0);$this->cell(15,5,$mf,1,0,'C',1,0);$this->cell(15,5,'0 %',1,0,'C',1,0);}
	$this->SetXY(5,$this->GetY()+10);  $this->cell(285,5,"1-Répartition des décès par sexe : ",0,0,'L',0);
	$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"La répartition des ".$mf." décès enregistrés montre que :",0,0,'L',0);
	if($mf>0) {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round((array_sum($mr)/$mf)*100,2)."% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round((array_sum($fr)/$mf)*100,2)."% des décès touche les femmes. ",0,0,'L',0);}else {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les femmes. ",0,0,'L',0);}
	if (array_sum($fr) > 0){$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"avec un sexe ratio de ".round((array_sum($mr)/array_sum($fr)),2),0,0,'L',0);}else{$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"avec un sexe ratio de 0 ",0,0,'L',0);}
	$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"2-Répartition des décès par âge en jours : ",0,0,'L',0);
	rsort($mfrp);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la plus élevée est : ".$mfrp[0]."%",0,0,'L',0);
	sort($mfrp);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la moins élevée est : ".$mfrp[0]."%",0,0,'L',0);
	$this->barservicedxpn(135,150,$mfrpx,"Distribution des décès par age (en jours)",$tages);
	$pie2 = array("x" => 135, "y" => $this->GetY()+35, "r" => 17,"v1" => array_sum($mr),"v2" => array_sum($fr),"t0" => "Distribution des décès par sexe ","t1" => "M","t2" => "F");
    $this->pie2($pie2);
	}
    //sig 
	function deceswil($DATEJOUR1,$DATEJOUR2,$WILAYAR,$STRUCTURED) {$this->mysqlconnect();$sql = " select * from deceshosp where STRUCTURED $STRUCTURED and (WILAYAR = $WILAYAR) and   (DINS BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$OP=mysql_num_rows($requete);mysql_free_result($requete);return $OP;}
	function datasigwil($datejour1,$datejour2,$STRUCTURED) {$data = array();for ($i = 1000; $i <= 48000; $i+= 1000) {$data[$i]= $this->deceswil($datejour1,$datejour2,$i,$STRUCTURED);}return $data;}
	
	function color($x) 
    {	
	if($x <  1 ){$this->SetFillColor(230, 230, 230);}//gris
	if($x >= 1  and $x<10){$this->SetFillColor(0,250,255);}
	if($x >= 10 and $x<100){$this->SetFillColor(0,255,0);}//orange
	if($x >= 100 and $x<1000){$this->SetFillColor(255,0,0);}//rouge
	if($x >= 1000 ){$this->SetFillColor(165,42,42);}//brond	
    }
	function Algerie($data,$x,$y,$z,$cd) 
    {
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230); 
	$this->SetDrawColor(0,0,0);
	//$this->Image('../public/images/photos/pc.gif',250,50,30,30,0);
	$this->SetXY(220,40);$this->cell(65,5,'WILAYA DE DJELFA',1,0,'C',1,0);
	$this->SetXY(10,40);$this->cell(55,5,'ALGERIE',1,0,'C',1,0);
	$this->RoundedRect($x-15,35,158,200, 2, $style = '');
	$this->RoundedRect($x-15,35,200,200, 2, $style = '');
	if ($cd=='wilaya')
	{
	$this->color($data['37000']);$this->Polygon(array((98+$x)/$z,(244+$y)/$z,(100+$x)/$z,(248+$y)/$z,(106+$x)/$z,(250+$y)/$z,(113+$x)/$z,(250+$y)/$z,(120+$x)/$z,(254+$y)/$z,(125+$x)/$z,(271+$y)/$z,(133+$x)/$z,(290+$y)/$z,(136+$x)/$z,(295+$y)/$z,(136+$x)/$z,(304+$y)/$z,(141+$x)/$z,(310+$y)/$z,(147+$x)/$z,(314+$y)/$z,(159+$x)/$z,(318+$y)/$z,(159+$x)/$z,(327+$y)/$z,(146+$x)/$z,(341+$y)/$z,(138+$x)/$z,(335+$y)/$z,(133+$x)/$z,(343+$y)/$z,(127+$x)/$z,(354+$y)/$z,(110+$x)/$z,(354+$y)/$z,(101+$x)/$z,(361+$y)/$z,(87+$x)/$z,(367+$y)/$z,(8+$x)/$z,(308+$y)/$z,(10+$x)/$z,(264+$y)/$z,(26+$x)/$z,(256+$y)/$z,(41+$x)/$z,(248+$y)/$z,(47+$x)/$z,(248+$y)/$z,(52+$x)/$z,(243+$y)/$z,(64+$x)/$z,(246+$y)/$z,(72+$x)/$z,(243+$y)/$z,(89+$x)/$z,(243+$y)/$z,(95+$x)/$z,(248+$y)/$z,(98+$x)/$z,(244+$y)/$z),'FD');
	$this->color($data['1000']);$this->Polygon(array((159+$x)/$z,(318+$y)/$z,(163+$x)/$z,(302+$y)/$z,(168+$x)/$z,(299+$y)/$z,(174+$x)/$z,(289+$y)/$z,(183+$x)/$z,(282+$y)/$z,(190+$x)/$z,(272+$y)/$z,(200+$x)/$z,(269+$y)/$z,(219+$x)/$z,(267+$y)/$z,(222+$x)/$z,(263+$y)/$z,(226+$x)/$z,(261+$y)/$z,(226+$x)/$z,(244+$y)/$z,(233+$x)/$z,(240+$y)/$z,(238+$x)/$z,(235+$y)/$z,(242+$x)/$z,(234+$y)/$z,(242+$x)/$z,(229+$y)/$z,(247+$x)/$z,(224+$y)/$z,(255+$x)/$z,(214+$y)/$z,(261+$x)/$z,(210+$y)/$z,(265+$x)/$z,(209+$y)/$z,(269+$x)/$z,(204+$y)/$z,(274+$x)/$z,(203+$y)/$z,(277+$x)/$z,(198+$y)/$z,(282+$x)/$z,(197+$y)/$z,(286+$x)/$z,(194+$y)/$z,(292+$x)/$z,(191+$y)/$z,(295+$x)/$z,(187+$y)/$z,(298+$x)/$z,(187+$y)/$z,(297+$x)/$z,(224+$y)/$z,(294+$x)/$z,(236+$y)/$z,(297+$x)/$z,(246+$y)/$z,(300+$x)/$z,(268+$y)/$z,(297+$x)/$z,(285+$y)/$z,(292+$x)/$z,(293+$y)/$z,(292+$x)/$z,(306+$y)/$z,(288+$x)/$z,(311+$y)/$z,(288+$x)/$z,(317+$y)/$z,(291+$x)/$z,(321+$y)/$z,(288+$x)/$z,(328+$y)/$z,(287+$x)/$z,(338+$y)/$z,(278+$x)/$z,(339+$y)/$z,(274+$x)/$z,(345+$y)/$z,(269+$x)/$z,(350+$y)/$z,(269+$x)/$z,(357+$y)/$z,(279+$x)/$z,(371+$y)/$z,(282+$x)/$z,(485+$y)/$z,(291+$x)/$z,(486+$y)/$z,(293+$x)/$z,(495+$y)/$z,(297+$x)/$z,(499+$y)/$z,(304+$x)/$z,(512+$y)/$z,(306+$x)/$z,(520+$y)/$z,(310+$x)/$z,(532+$y)/$z,(313+$x)/$z,(539+$y)/$z,(302+$x)/$z,(534+$y)/$z,(294+$x)/$z,(534+$y)/$z,(287+$x)/$z,(525+$y)/$z,(275+$x)/$z,(518+$y)/$z,(273+$x)/$z,(506+$y)/$z,(87+$x)/$z,(367+$y)/$z,(101+$x)/$z,(361+$y)/$z,(110+$x)/$z,(354+$y)/$z,(127+$x)/$z,(354+$y)/$z,(133+$x)/$z,(343+$y)/$z,(138+$x)/$z,(335+$y)/$z,(146+$x)/$z,(341+$y)/$z,(159+$x)/$z,(327+$y)/$z,(159+$x)/$z,(318+$y)/$z),'FD');
	$this->color($data['11000']);$this->Polygon(array((300+$x)/$z,(268+$y)/$z,(324+$x)/$z,(265+$y)/$z,(330+$x)/$z,(269+$y)/$z,(333+$x)/$z,(275+$y)/$z,(339+$x)/$z,(276+$y)/$z,(344+$x)/$z,(282+$y)/$z,(349+$x)/$z,(277+$y)/$z,(355+$x)/$z,(275+$y)/$z,(357+$x)/$z,(271+$y)/$z,(363+$x)/$z,(269+$y)/$z,(366+$x)/$z,(265+$y)/$z,(368+$x)/$z,(262+$y)/$z,(375+$x)/$z,(258+$y)/$z,(379+$x)/$z,(257+$y)/$z,(382+$x)/$z,(253+$y)/$z,(386+$x)/$z,(251+$y)/$z,(390+$x)/$z,(248+$y)/$z,(391+$x)/$z,(244+$y)/$z,(396+$x)/$z,(243+$y)/$z,(397+$x)/$z,(284+$y)/$z,(396+$x)/$z,(294+$y)/$z,(399+$x)/$z,(310+$y)/$z,(399+$x)/$z,(325+$y)/$z,(404+$x)/$z,(326+$y)/$z,(406+$x)/$z,(331+$y)/$z,(411+$x)/$z,(333+$y)/$z,(415+$x)/$z,(337+$y)/$z,(411+$x)/$z,(345+$y)/$z,(417+$x)/$z,(353+$y)/$z,(423+$x)/$z,(367+$y)/$z,(423+$x)/$z,(372+$y)/$z,(428+$x)/$z,(374+$y)/$z,(433+$x)/$z,(385+$y)/$z,(440+$x)/$z,(393+$y)/$z,(444+$x)/$z,(393+$y)/$z,(449+$x)/$z,(399+$y)/$z,(452+$x)/$z,(401+$y)/$z,(453+$x)/$z,(420+$y)/$z,(456+$x)/$z,(429+$y)/$z,(459+$x)/$z,(433+$y)/$z,(457+$x)/$z,(438+$y)/$z,(465+$x)/$z,(443+$y)/$z,(486+$x)/$z,(439+$y)/$z,(490+$x)/$z,(434+$y)/$z,(497+$x)/$z,(429+$y)/$z,(501+$x)/$z,(426+$y)/$z,(517+$x)/$z,(426+$y)/$z,(532+$x)/$z,(432+$y)/$z,(531+$x)/$z,(455+$y)/$z,(410+$x)/$z,(557+$y)/$z,(338+$x)/$z,(573+$y)/$z,(331+$x)/$z,(568+$y)/$z,(334+$x)/$z,(562+$y)/$z,(334+$x)/$z,(547+$y)/$z,(313+$x)/$z,(539+$y)/$z,(310+$x)/$z,(532+$y)/$z,(306+$x)/$z,(520+$y)/$z,(304+$x)/$z,(512+$y)/$z,(297+$x)/$z,(499+$y)/$z,(293+$x)/$z,(495+$y)/$z,(291+$x)/$z,(486+$y)/$z,(282+$x)/$z,(485+$y)/$z,(279+$x)/$z,(371+$y)/$z,(269+$x)/$z,(357+$y)/$z,(269+$x)/$z,(350+$y)/$z,(274+$x)/$z,(345+$y)/$z,(278+$x)/$z,(339+$y)/$z,(287+$x)/$z,(338+$y)/$z,(288+$x)/$z,(328+$y)/$z,(291+$x)/$z,(321+$y)/$z,(288+$x)/$z,(317+$y)/$z,(288+$x)/$z,(311+$y)/$z,(292+$x)/$z,(306+$y)/$z,(292+$x)/$z,(293+$y)/$z,(297+$x)/$z,(285+$y)/$z,(300+$x)/$z,(268+$y)/$z),'FD');
	$this->color($data['33000']);$this->Polygon(array((396+$x)/$z,(243+$y)/$z,(400+$x)/$z,(239+$y)/$z,(408+$x)/$z,(235+$y)/$z,(415+$x)/$z,(232+$y)/$z,(419+$x)/$z,(233+$y)/$z,(423+$x)/$z,(231+$y)/$z,(452+$x)/$z,(223+$y)/$z,(483+$x)/$z,(215+$y)/$z,(494+$x)/$z,(212+$y)/$z,(495+$x)/$z,(218+$y)/$z,(496+$x)/$z,(224+$y)/$z,(493+$x)/$z,(227+$y)/$z,(497+$x)/$z,(234+$y)/$z,(507+$x)/$z,(254+$y)/$z,(509+$x)/$z,(282+$y)/$z,(512+$x)/$z,(293+$y)/$z,(511+$x)/$z,(300+$y)/$z,(510+$x)/$z,(307+$y)/$z,(510+$x)/$z,(314+$y)/$z,(511+$x)/$z,(323+$y)/$z,(514+$x)/$z,(326+$y)/$z,(514+$x)/$z,(331+$y)/$z,(508+$x)/$z,(338+$y)/$z,(503+$x)/$z,(340+$y)/$z,(502+$x)/$z,(346+$y)/$z,(507+$x)/$z,(353+$y)/$z,(512+$x)/$z,(360+$y)/$z,(513+$x)/$z,(363+$y)/$z,(519+$x)/$z,(368+$y)/$z,(521+$x)/$z,(382+$y)/$z,(528+$x)/$z,(394+$y)/$z,(536+$x)/$z,(395+$y)/$z,(542+$x)/$z,(395+$y)/$z,(548+$x)/$z,(394+$y)/$z,(554+$x)/$z,(399+$y)/$z,(561+$x)/$z,(402+$y)/$z,(566+$x)/$z,(401+$y)/$z,(571+$x)/$z,(409+$y)/$z,(577+$x)/$z,(421+$y)/$z,(571+$x)/$z,(427+$y)/$z,(565+$x)/$z,(433+$y)/$z,(531+$x)/$z,(455+$y)/$z,(532+$x)/$z,(432+$y)/$z,(517+$x)/$z,(426+$y)/$z,(501+$x)/$z,(426+$y)/$z,(497+$x)/$z,(429+$y)/$z,(490+$x)/$z,(434+$y)/$z,(486+$x)/$z,(439+$y)/$z,(465+$x)/$z,(443+$y)/$z,(457+$x)/$z,(438+$y)/$z,(459+$x)/$z,(433+$y)/$z,(456+$x)/$z,(429+$y)/$z,(453+$x)/$z,(420+$y)/$z,(452+$x)/$z,(401+$y)/$z,(449+$x)/$z,(399+$y)/$z,(444+$x)/$z,(393+$y)/$z,(440+$x)/$z,(393+$y)/$z,(433+$x)/$z,(385+$y)/$z,(428+$x)/$z,(374+$y)/$z,(423+$x)/$z,(372+$y)/$z,(423+$x)/$z,(367+$y)/$z,(417+$x)/$z,(353+$y)/$z,(411+$x)/$z,(345+$y)/$z,(415+$x)/$z,(337+$y)/$z,(411+$x)/$z,(333+$y)/$z,(406+$x)/$z,(331+$y)/$z,(404+$x)/$z,(326+$y)/$z,(399+$x)/$z,(325+$y)/$z,(399+$x)/$z,(310+$y)/$z,(396+$x)/$z,(294+$y)/$z,(397+$x)/$z,(284+$y)/$z,(396+$x)/$z,(243+$y)/$z),'FD');
	$this->color($data['47000']);$this->Polygon(array((298+$x)/$z,(187+$y)/$z,(304+$x)/$z,(179+$y)/$z,(303+$x)/$z,(170+$y)/$z,(306+$x)/$z,(169+$y)/$z,(306+$x)/$z,(164+$y)/$z,(303+$x)/$z,(162+$y)/$z,(303+$x)/$z,(151+$y)/$z,(315+$x)/$z,(150+$y)/$z,(323+$x)/$z,(149+$y)/$z,(331+$x)/$z,(150+$y)/$z,(332+$x)/$z,(147+$y)/$z,(328+$x)/$z,(145+$y)/$z,(338+$x)/$z,(144+$y)/$z,(341+$x)/$z,(142+$y)/$z,(343+$x)/$z,(144+$y)/$z,(347+$x)/$z,(144+$y)/$z,(360+$x)/$z,(143+$y)/$z,(374+$x)/$z,(146+$y)/$z,(374+$x)/$z,(153+$y)/$z,(369+$x)/$z,(160+$y)/$z,(360+$x)/$z,(170+$y)/$z,(360+$x)/$z,(188+$y)/$z,(352+$x)/$z,(213+$y)/$z,(344+$x)/$z,(240+$y)/$z,(336+$x)/$z,(255+$y)/$z,(324+$x)/$z,(265+$y)/$z,(300+$x)/$z,(268+$y)/$z,(297+$x)/$z,(246+$y)/$z,(294+$x)/$z,(236+$y)/$z,(297+$x)/$z,(224+$y)/$z,(298+$x)/$z,(187+$y)/$z),'FD');
	$this->color($data['30000']);$this->Polygon(array((374+$x)/$z,(146+$y)/$z,(372+$x)/$z,(137+$y)/$z,(373+$x)/$z,(132+$y)/$z,(374+$x)/$z,(137+$y)/$z,(380+$x)/$z,(132+$y)/$z,(401+$x)/$z,(131+$y)/$z,(400+$x)/$z,(125+$y)/$z,(402+$x)/$z,(122+$y)/$z,(399+$x)/$z,(119+$y)/$z,(400+$x)/$z,(116+$y)/$z,(402+$x)/$z,(115+$y)/$z,(405+$x)/$z,(113+$y)/$z,(407+$x)/$z,(122+$y)/$z,(409+$x)/$z,(129+$y)/$z,(417+$x)/$z,(149+$y)/$z,(420+$x)/$z,(154+$y)/$z,(422+$x)/$z,(160+$y)/$z,(426+$x)/$z,(162+$y)/$z,(431+$x)/$z,(171+$y)/$z,(480+$x)/$z,(167+$y)/$z,(494+$x)/$z,(212+$y)/$z,(483+$x)/$z,(215+$y)/$z,(452+$x)/$z,(223+$y)/$z,(423+$x)/$z,(231+$y)/$z,(419+$x)/$z,(233+$y)/$z,(415+$x)/$z,(232+$y)/$z,(408+$x)/$z,(235+$y)/$z,(400+$x)/$z,(239+$y)/$z,(396+$x)/$z,(243+$y)/$z,(391+$x)/$z,(244+$y)/$z,(390+$x)/$z,(248+$y)/$z,(386+$x)/$z,(251+$y)/$z,(382+$x)/$z,(253+$y)/$z,(379+$x)/$z,(257+$y)/$z,(375+$x)/$z,(258+$y)/$z,(368+$x)/$z,(262+$y)/$z,(366+$x)/$z,(265+$y)/$z,(363+$x)/$z,(269+$y)/$z,(357+$x)/$z,(271+$y)/$z,(355+$x)/$z,(275+$y)/$z,(349+$x)/$z,(277+$y)/$z,(344+$x)/$z,(282+$y)/$z,(339+$x)/$z,(276+$y)/$z,(333+$x)/$z,(275+$y)/$z,(330+$x)/$z,(269+$y)/$z,(324+$x)/$z,(265+$y)/$z,(336+$x)/$z,(255+$y)/$z,(344+$x)/$z,(240+$y)/$z,(352+$x)/$z,(213+$y)/$z,(360+$x)/$z,(188+$y)/$z,(360+$x)/$z,(170+$y)/$z,(369+$x)/$z,(160+$y)/$z,(374+$x)/$z,(153+$y)/$z,(374+$x)/$z,(146+$y)/$z),'FD');
	$this->color($data['8000']);$this->Polygon(array((98+$x)/$z,(244+$y)/$z,(101+$x)/$z,(240+$y)/$z,(108+$x)/$z,(231+$y)/$z,(114+$x)/$z,(227+$y)/$z,(119+$x)/$z,(226+$y)/$z,(122+$x)/$z,(222+$y)/$z,(128+$x)/$z,(219+$y)/$z,(133+$x)/$z,(215+$y)/$z,(142+$x)/$z,(215+$y)/$z,(147+$x)/$z,(213+$y)/$z,(148+$x)/$z,(207+$y)/$z,(151+$x)/$z,(204+$y)/$z,(147+$x)/$z,(199+$y)/$z,(145+$x)/$z,(195+$y)/$z,(148+$x)/$z,(191+$y)/$z,(149+$x)/$z,(185+$y)/$z,(154+$x)/$z,(183+$y)/$z,(160+$x)/$z,(182+$y)/$z,(169+$x)/$z,(180+$y)/$z,(169+$x)/$z,(171+$y)/$z,(178+$x)/$z,(170+$y)/$z,(192+$x)/$z,(169+$y)/$z,(204+$x)/$z,(171+$y)/$z,(212+$x)/$z,(171+$y)/$z,(212+$x)/$z,(163+$y)/$z,(217+$x)/$z,(163+$y)/$z,(218+$x)/$z,(169+$y)/$z,(226+$x)/$z,(167+$y)/$z,(237+$x)/$z,(169+$y)/$z,(235+$x)/$z,(194+$y)/$z,(239+$x)/$z,(197+$y)/$z,(238+$x)/$z,(202+$y)/$z,(244+$x)/$z,(206+$y)/$z,(245+$x)/$z,(210+$y)/$z,(250+$x)/$z,(210+$y)/$z,(255+$x)/$z,(214+$y)/$z,(247+$x)/$z,(224+$y)/$z,(242+$x)/$z,(229+$y)/$z,(242+$x)/$z,(234+$y)/$z,(238+$x)/$z,(235+$y)/$z,(233+$x)/$z,(240+$y)/$z,(226+$x)/$z,(244+$y)/$z,(226+$x)/$z,(261+$y)/$z,(222+$x)/$z,(263+$y)/$z,(219+$x)/$z,(267+$y)/$z,(200+$x)/$z,(269+$y)/$z,(190+$x)/$z,(272+$y)/$z,(183+$x)/$z,(282+$y)/$z,(174+$x)/$z,(289+$y)/$z,(168+$x)/$z,(299+$y)/$z,(163+$x)/$z,(302+$y)/$z,(159+$x)/$z,(318+$y)/$z,(147+$x)/$z,(314+$y)/$z,(141+$x)/$z,(310+$y)/$z,(136+$x)/$z,(304+$y)/$z,(136+$x)/$z,(295+$y)/$z,(133+$x)/$z,(290+$y)/$z,(125+$x)/$z,(271+$y)/$z,(120+$x)/$z,(254+$y)/$z,(113+$x)/$z,(250+$y)/$z,(106+$x)/$z,(250+$y)/$z,(100+$x)/$z,(248+$y)/$z,(98+$x)/$z,(244+$y)/$z),'FD');
	$this->color($data['32000']);$this->Polygon(array((236+$x)/$z,(170+$y)/$z,(240+$x)/$z,(169+$y)/$z,(242+$x)/$z,(165+$y)/$z,(243+$x)/$z,(160+$y)/$z,(244+$x)/$z,(153+$y)/$z,(243+$x)/$z,(148+$y)/$z,(245+$x)/$z,(145+$y)/$z,(245+$x)/$z,(139+$y)/$z,(246+$x)/$z,(131+$y)/$z,(249+$x)/$z,(127+$y)/$z,(249+$x)/$z,(124+$y)/$z,(247+$x)/$z,(122+$y)/$z,(250+$x)/$z,(122+$y)/$z,(247+$x)/$z,(118+$y)/$z,(247+$x)/$z,(115+$y)/$z,(245+$x)/$z,(113+$y)/$z,(244+$x)/$z,(108+$y)/$z,(246+$x)/$z,(106+$y)/$z,(246+$x)/$z,(101+$y)/$z,(251+$x)/$z,(104+$y)/$z,(256+$x)/$z,(102+$y)/$z,(260+$x)/$z,(104+$y)/$z,(262+$x)/$z,(101+$y)/$z,(268+$x)/$z,(101+$y)/$z,(272+$x)/$z,(103+$y)/$z,(272+$x)/$z,(107+$y)/$z,(277+$x)/$z,(107+$y)/$z,(280+$x)/$z,(112+$y)/$z,(285+$x)/$z,(118+$y)/$z,(289+$x)/$z,(118+$y)/$z,(292+$x)/$z,(123+$y)/$z,(294+$x)/$z,(128+$y)/$z,(294+$x)/$z,(132+$y)/$z,(298+$x)/$z,(132+$y)/$z,(299+$x)/$z,(136+$y)/$z,(304+$x)/$z,(136+$y)/$z,(304+$x)/$z,(139+$y)/$z,(299+$x)/$z,(140+$y)/$z,(303+$x)/$z,(151+$y)/$z,(303+$x)/$z,(162+$y)/$z,(306+$x)/$z,(164+$y)/$z,(306+$x)/$z,(169+$y)/$z,(303+$x)/$z,(170+$y)/$z,(304+$x)/$z,(179+$y)/$z,(298+$x)/$z,(187+$y)/$z,(295+$x)/$z,(187+$y)/$z,(292+$x)/$z,(190+$y)/$z,(286+$x)/$z,(194+$y)/$z,(282+$x)/$z,(197+$y)/$z,(277+$x)/$z,(198+$y)/$z,(274+$x)/$z,(203+$y)/$z,(269+$x)/$z,(204+$y)/$z,(265+$x)/$z,(209+$y)/$z,(261+$x)/$z,(210+$y)/$z,(255+$x)/$z,(214+$y)/$z,(249+$x)/$z,(210+$y)/$z,(245+$x)/$z,(210+$y)/$z,(244+$x)/$z,(206+$y)/$z,(238+$x)/$z,(202+$y)/$z,(238+$x)/$z,(197+$y)/$z,(235+$x)/$z,(193+$y)/$z,(236+$x)/$z,(170+$y)/$z),'FD');
	$this->color($data['45000']);$this->Polygon(array((217+$x)/$z,(163+$y)/$z,(218+$x)/$z,(160+$y)/$z,(218+$x)/$z,(157+$y)/$z,(215+$x)/$z,(155+$y)/$z,(211+$x)/$z,(153+$y)/$z,(209+$x)/$z,(149+$y)/$z,(206+$x)/$z,(146+$y)/$z,(208+$x)/$z,(143+$y)/$z,(207+$x)/$z,(140+$y)/$z,(203+$x)/$z,(137+$y)/$z,(203+$x)/$z,(131+$y)/$z,(204+$x)/$z,(128+$y)/$z,(204+$x)/$z,(124+$y)/$z,(202+$x)/$z,(122+$y)/$z,(202+$x)/$z,(113+$y)/$z,(204+$x)/$z,(109+$y)/$z,(209+$x)/$z,(106+$y)/$z,(218+$x)/$z,(105+$y)/$z,(223+$x)/$z,(106+$y)/$z,(227+$x)/$z,(106+$y)/$z,(230+$x)/$z,(104+$y)/$z,(234+$x)/$z,(106+$y)/$z,(236+$x)/$z,(115+$y)/$z,(244+$x)/$z,(108+$y)/$z,(244+$x)/$z,(113+$y)/$z,(247+$x)/$z,(115+$y)/$z,(247+$x)/$z,(118+$y)/$z,(250+$x)/$z,(120+$y)/$z,(247+$x)/$z,(122+$y)/$z,(249+$x)/$z,(124+$y)/$z,(249+$x)/$z,(127+$y)/$z,(246+$x)/$z,(131+$y)/$z,(245+$x)/$z,(139+$y)/$z,(245+$x)/$z,(145+$y)/$z,(243+$x)/$z,(148+$y)/$z,(244+$x)/$z,(153+$y)/$z,(243+$x)/$z,(160+$y)/$z,(241+$x)/$z,(165+$y)/$z,(240+$x)/$z,(169+$y)/$z,(236+$x)/$z,(169+$y)/$z,(226+$x)/$z,(167+$y)/$z,(218+$x)/$z,(169+$y)/$z,(217+$x)/$z,(163+$y)/$z),'FD');
	$this->color($data['3000']);$this->Polygon(array((280+$x)/$z,(112+$y)/$z,(282+$x)/$z,(111+$y)/$z,(283+$x)/$z,(107+$y)/$z,(288+$x)/$z,(107+$y)/$z,(290+$x)/$z,(104+$y)/$z,(291+$x)/$z,(100+$y)/$z,(296+$x)/$z,(99+$y)/$z,(301+$x)/$z,(95+$y)/$z,(304+$x)/$z,(93+$y)/$z,(307+$x)/$z,(103+$y)/$z,(310+$x)/$z,(106+$y)/$z,(312+$x)/$z,(110+$y)/$z,(316+$x)/$z,(111+$y)/$z,(318+$x)/$z,(108+$y)/$z,(320+$x)/$z,(105+$y)/$z,(323+$x)/$z,(107+$y)/$z,(326+$x)/$z,(119+$y)/$z,(331+$x)/$z,(120+$y)/$z,(335+$x)/$z,(123+$y)/$z,(338+$x)/$z,(124+$y)/$z,(341+$x)/$z,(128+$y)/$z,(345+$x)/$z,(130+$y)/$z,(349+$x)/$z,(131+$y)/$z,(353+$x)/$z,(133+$y)/$z,(358+$x)/$z,(138+$y)/$z,(361+$x)/$z,(143+$y)/$z,(347+$x)/$z,(144+$y)/$z,(343+$x)/$z,(144+$y)/$z,(340+$x)/$z,(142+$y)/$z,(338+$x)/$z,(144+$y)/$z,(327+$x)/$z,(145+$y)/$z,(332+$x)/$z,(147+$y)/$z,(331+$x)/$z,(150+$y)/$z,(323+$x)/$z,(148+$y)/$z,(315+$x)/$z,(150+$y)/$z,(303+$x)/$z,(151+$y)/$z,(299+$x)/$z,(140+$y)/$z,(304+$x)/$z,(139+$y)/$z,(304+$x)/$z,(136+$y)/$z,(299+$x)/$z,(136+$y)/$z,(298+$x)/$z,(132+$y)/$z,(294+$x)/$z,(132+$y)/$z,(294+$x)/$z,(128+$y)/$z,(292+$x)/$z,(123+$y)/$z,(289+$x)/$z,(118+$y)/$z,(285+$x)/$z,(118+$y)/$z,(280+$x)/$z,(112+$y)/$z,(280+$x)/$z,(112+$y)/$z),'FD');
	$this->color($data['14000']);$this->Polygon(array((304+$x)/$z,(93+$y)/$z,(306+$x)/$z,(90+$y)/$z,(308+$x)/$z,(86+$y)/$z,(310+$x)/$z,(82+$y)/$z,(313+$x)/$z,(80+$y)/$z,(314+$x)/$z,(76+$y)/$z,(311+$x)/$z,(74+$y)/$z,(307+$x)/$z,(74+$y)/$z,(303+$x)/$z,(73+$y)/$z,(299+$x)/$z,(71+$y)/$z,(298+$x)/$z,(68+$y)/$z,(295+$x)/$z,(66+$y)/$z,(290+$x)/$z,(66+$y)/$z,(285+$x)/$z,(65+$y)/$z,(281+$x)/$z,(63+$y)/$z,(278+$x)/$z,(63+$y)/$z,(273+$x)/$z,(65+$y)/$z,(270+$x)/$z,(66+$y)/$z,(268+$x)/$z,(71+$y)/$z,(267+$x)/$z,(73+$y)/$z,(262+$x)/$z,(74+$y)/$z,(260+$x)/$z,(79+$y)/$z,(263+$x)/$z,(81+$y)/$z,(266+$x)/$z,(83+$y)/$z,(265+$x)/$z,(87+$y)/$z,(263+$x)/$z,(90+$y)/$z,(265+$x)/$z,(94+$y)/$z,(268+$x)/$z,(98+$y)/$z,(268+$x)/$z,(101+$y)/$z,(272+$x)/$z,(103+$y)/$z,(272+$x)/$z,(107+$y)/$z,(277+$x)/$z,(107+$y)/$z,(280+$x)/$z,(112+$y)/$z,(282+$x)/$z,(111+$y)/$z,(283+$x)/$z,(107+$y)/$z,(288+$x)/$z,(107+$y)/$z,(290+$x)/$z,(104+$y)/$z,(291+$x)/$z,(100+$y)/$z,(296+$x)/$z,(99+$y)/$z,(301+$x)/$z,(95+$y)/$z,(304+$x)/$z,(93+$y)/$z),'FD');
	$this->color($data['39000']);$this->Polygon(array((380+$x)/$z,(132+$y)/$z,(380+$x)/$z,(126+$y)/$z,(380+$x)/$z,(121+$y)/$z,(379+$x)/$z,(117+$y)/$z,(380+$x)/$z,(113+$y)/$z,(382+$x)/$z,(109+$y)/$z,(380+$x)/$z,(105+$y)/$z,(378+$x)/$z,(102+$y)/$z,(379+$x)/$z,(99+$y)/$z,(383+$x)/$z,(98+$y)/$z,(396+$x)/$z,(100+$y)/$z,(402+$x)/$z,(99+$y)/$z,(409+$x)/$z,(100+$y)/$z,(413+$x)/$z,(103+$y)/$z,(418+$x)/$z,(104+$y)/$z,(424+$x)/$z,(106+$y)/$z,(425+$x)/$z,(102+$y)/$z,(430+$x)/$z,(100+$y)/$z,(434+$x)/$z,(101+$y)/$z,(440+$x)/$z,(103+$y)/$z,(444+$x)/$z,(104+$y)/$z,(439+$x)/$z,(106+$y)/$z,(438+$x)/$z,(112+$y)/$z,(439+$x)/$z,(120+$y)/$z,(442+$x)/$z,(122+$y)/$z,(444+$x)/$z,(128+$y)/$z,(446+$x)/$z,(133+$y)/$z,(447+$x)/$z,(136+$y)/$z,(451+$x)/$z,(136+$y)/$z,(455+$x)/$z,(139+$y)/$z,(456+$x)/$z,(143+$y)/$z,(459+$x)/$z,(144+$y)/$z,(461+$x)/$z,(154+$y)/$z,(466+$x)/$z,(158+$y)/$z,(471+$x)/$z,(161+$y)/$z,(476+$x)/$z,(163+$y)/$z,(479+$x)/$z,(167+$y)/$z,(431+$x)/$z,(171+$y)/$z,(426+$x)/$z,(162+$y)/$z,(422+$x)/$z,(160+$y)/$z,(420+$x)/$z,(154+$y)/$z,(417+$x)/$z,(149+$y)/$z,(409+$x)/$z,(129+$y)/$z,(407+$x)/$z,(122+$y)/$z,(405+$x)/$z,(113+$y)/$z,(402+$x)/$z,(115+$y)/$z,(400+$x)/$z,(116+$y)/$z,(399+$x)/$z,(119+$y)/$z,(402+$x)/$z,(122+$y)/$z,(400+$x)/$z,(125+$y)/$z,(401+$x)/$z,(131+$y)/$z,(380+$x)/$z,(132+$y)/$z),'FD');
	$this->color($data['17000']);$this->Polygon(array((298+$x)/$z,(68+$y)/$z,(300+$x)/$z,(66+$y)/$z,(302+$x)/$z,(67+$y)/$z,(304+$x)/$z,(69+$y)/$z,(307+$x)/$z,(69+$y)/$z,(309+$x)/$z,(67+$y)/$z,(311+$x)/$z,(70+$y)/$z,(313+$x)/$z,(70+$y)/$z,(315+$x)/$z,(67+$y)/$z,(318+$x)/$z,(65+$y)/$z,(318+$x)/$z,(58+$y)/$z,(322+$x)/$z,(58+$y)/$z,(323+$x)/$z,(63+$y)/$z,(326+$x)/$z,(63+$y)/$z,(329+$x)/$z,(59+$y)/$z,(332+$x)/$z,(61+$y)/$z,(334+$x)/$z,(64+$y)/$z,(337+$x)/$z,(65+$y)/$z,(339+$x)/$z,(68+$y)/$z,(339+$x)/$z,(71+$y)/$z,(337+$x)/$z,(74+$y)/$z,(334+$x)/$z,(76+$y)/$z,(333+$x)/$z,(79+$y)/$z,(336+$x)/$z,(81+$y)/$z,(336+$x)/$z,(87+$y)/$z,(340+$x)/$z,(89+$y)/$z,(343+$x)/$z,(90+$y)/$z,(344+$x)/$z,(94+$y)/$z,(346+$x)/$z,(98+$y)/$z,(347+$x)/$z,(102+$y)/$z,(350+$x)/$z,(105+$y)/$z,(353+$x)/$z,(108+$y)/$z,(356+$x)/$z,(111+$y)/$z,(355+$x)/$z,(115+$y)/$z,(358+$x)/$z,(118+$y)/$z,(362+$x)/$z,(120+$y)/$z,(365+$x)/$z,(121+$y)/$z,(369+$x)/$z,(122+$y)/$z,(372+$x)/$z,(123+$y)/$z,(374+$x)/$z,(125+$y)/$z,(374+$x)/$z,(130+$y)/$z,(373+$x)/$z,(132+$y)/$z,(372+$x)/$z,(137+$y)/$z,(374+$x)/$z,(146+$y)/$z,(360+$x)/$z,(143+$y)/$z,(357+$x)/$z,(138+$y)/$z,(353+$x)/$z,(133+$y)/$z,(349+$x)/$z,(131+$y)/$z,(345+$x)/$z,(130+$y)/$z,(340+$x)/$z,(128+$y)/$z,(338+$x)/$z,(124+$y)/$z,(335+$x)/$z,(123+$y)/$z,(331+$x)/$z,(121+$y)/$z,(326+$x)/$z,(119+$y)/$z,(323+$x)/$z,(107+$y)/$z,(320+$x)/$z,(105+$y)/$z,(318+$x)/$z,(108+$y)/$z,(316+$x)/$z,(111+$y)/$z,(312+$x)/$z,(110+$y)/$z,(310+$x)/$z,(106+$y)/$z,(307+$x)/$z,(103+$y)/$z,(304+$x)/$z,(93+$y)/$z,(306+$x)/$z,(90+$y)/$z,(308+$x)/$z,(86+$y)/$z,(310+$x)/$z,(82+$y)/$z,(313+$x)/$z,(80+$y)/$z,(314+$x)/$z,(76+$y)/$z,(311+$x)/$z,(74+$y)/$z,(307+$x)/$z,(74+$y)/$z,(303+$x)/$z,(73+$y)/$z,(298+$x)/$z,(68+$y)/$z),'FD');
	$this->color($data['7000']);$this->Polygon(array((353+$x)/$z,(108+$y)/$z,(356+$x)/$z,(105+$y)/$z,(353+$x)/$z,(102+$y)/$z,(352+$x)/$z,(98+$y)/$z,(354+$x)/$z,(95+$y)/$z,(357+$x)/$z,(93+$y)/$z,(360+$x)/$z,(93+$y)/$z,(363+$x)/$z,(91+$y)/$z,(365+$x)/$z,(88+$y)/$z,(368+$x)/$z,(87+$y)/$z,(371+$x)/$z,(87+$y)/$z,(374+$x)/$z,(80+$y)/$z,(380+$x)/$z,(81+$y)/$z,(386+$x)/$z,(81+$y)/$z,(386+$x)/$z,(77+$y)/$z,(390+$x)/$z,(73+$y)/$z,(396+$x)/$z,(74+$y)/$z,(396+$x)/$z,(81+$y)/$z,(403+$x)/$z,(81+$y)/$z,(410+$x)/$z,(81+$y)/$z,(409+$x)/$z,(87+$y)/$z,(415+$x)/$z,(86+$y)/$z,(418+$x)/$z,(94+$y)/$z,(415+$x)/$z,(99+$y)/$z,(413+$x)/$z,(103+$y)/$z,(409+$x)/$z,(100+$y)/$z,(402+$x)/$z,(99+$y)/$z,(396+$x)/$z,(100+$y)/$z,(383+$x)/$z,(98+$y)/$z,(379+$x)/$z,(99+$y)/$z,(378+$x)/$z,(102+$y)/$z,(380+$x)/$z,(105+$y)/$z,(382+$x)/$z,(109+$y)/$z,(380+$x)/$z,(113+$y)/$z,(379+$x)/$z,(117+$y)/$z,(380+$x)/$z,(121+$y)/$z,(380+$x)/$z,(126+$y)/$z,(380+$x)/$z,(132+$y)/$z,(372+$x)/$z,(137+$y)/$z,(373+$x)/$z,(132+$y)/$z,(374+$x)/$z,(130+$y)/$z,(374+$x)/$z,(125+$y)/$z,(372+$x)/$z,(123+$y)/$z,(369+$x)/$z,(122+$y)/$z,(365+$x)/$z,(121+$y)/$z,(362+$x)/$z,(120+$y)/$z,(358+$x)/$z,(118+$y)/$z,(355+$x)/$z,(115+$y)/$z,(356+$x)/$z,(111+$y)/$z,(353+$x)/$z,(108+$y)/$z),'FD');
	$this->color($data['28000']);$this->Polygon(array((338+$x)/$z,(56+$y)/$z,(341+$x)/$z,(56+$y)/$z,(344+$x)/$z,(56+$y)/$z,(347+$x)/$z,(55+$y)/$z,(349+$x)/$z,(52+$y)/$z,(352+$x)/$z,(52+$y)/$z,(355+$x)/$z,(52+$y)/$z,(358+$x)/$z,(51+$y)/$z,(358+$x)/$z,(53+$y)/$z,(357+$x)/$z,(56+$y)/$z,(359+$x)/$z,(56+$y)/$z,(361+$x)/$z,(56+$y)/$z,(364+$x)/$z,(56+$y)/$z,(366+$x)/$z,(56+$y)/$z,(370+$x)/$z,(57+$y)/$z,(372+$x)/$z,(58+$y)/$z,(374+$x)/$z,(60+$y)/$z,(376+$x)/$z,(63+$y)/$z,(379+$x)/$z,(64+$y)/$z,(375+$x)/$z,(66+$y)/$z,(369+$x)/$z,(66+$y)/$z,(369+$x)/$z,(72+$y)/$z,(367+$x)/$z,(75+$y)/$z,(367+$x)/$z,(79+$y)/$z,(373+$x)/$z,(80+$y)/$z,(371+$x)/$z,(87+$y)/$z,(368+$x)/$z,(87+$y)/$z,(365+$x)/$z,(88+$y)/$z,(363+$x)/$z,(91+$y)/$z,(360+$x)/$z,(93+$y)/$z,(357+$x)/$z,(93+$y)/$z,(354+$x)/$z,(95+$y)/$z,(352+$x)/$z,(98+$y)/$z,(353+$x)/$z,(102+$y)/$z,(355+$x)/$z,(105+$y)/$z,(353+$x)/$z,(108+$y)/$z,(350+$x)/$z,(105+$y)/$z,(347+$x)/$z,(102+$y)/$z,(346+$x)/$z,(98+$y)/$z,(344+$x)/$z,(94+$y)/$z,(343+$x)/$z,(90+$y)/$z,(340+$x)/$z,(89+$y)/$z,(336+$x)/$z,(87+$y)/$z,(336+$x)/$z,(81+$y)/$z,(333+$x)/$z,(79+$y)/$z,(334+$x)/$z,(76+$y)/$z,(337+$x)/$z,(74+$y)/$z,(339+$x)/$z,(71+$y)/$z,(339+$x)/$z,(68+$y)/$z,(337+$x)/$z,(65+$y)/$z,(334+$x)/$z,(64+$y)/$z,(332+$x)/$z,(61+$y)/$z,(338+$x)/$z,(56+$y)/$z),'FD');
	$this->color($data['5000']);$this->Polygon(array((379+$x)/$z,(64+$y)/$z,(382+$x)/$z,(63+$y)/$z,(382+$x)/$z,(59+$y)/$z,(388+$x)/$z,(58+$y)/$z,(390+$x)/$z,(54+$y)/$z,(395+$x)/$z,(56+$y)/$z,(400+$x)/$z,(55+$y)/$z,(404+$x)/$z,(56+$y)/$z,(407+$x)/$z,(56+$y)/$z,(410+$x)/$z,(57+$y)/$z,(413+$x)/$z,(57+$y)/$z,(416+$x)/$z,(60+$y)/$z,(416+$x)/$z,(63+$y)/$z,(413+$x)/$z,(65+$y)/$z,(412+$x)/$z,(71+$y)/$z,(412+$x)/$z,(75+$y)/$z,(411+$x)/$z,(78+$y)/$z,(409+$x)/$z,(81+$y)/$z,(403+$x)/$z,(81+$y)/$z,(396+$x)/$z,(81+$y)/$z,(396+$x)/$z,(74+$y)/$z,(389+$x)/$z,(73+$y)/$z,(386+$x)/$z,(77+$y)/$z,(386+$x)/$z,(81+$y)/$z,(380+$x)/$z,(81+$y)/$z,(373+$x)/$z,(80+$y)/$z,(367+$x)/$z,(79+$y)/$z,(367+$x)/$z,(75+$y)/$z,(369+$x)/$z,(72+$y)/$z,(369+$x)/$z,(66+$y)/$z,(375+$x)/$z,(66+$y)/$z,(379+$x)/$z,(64+$y)/$z),'FD');
	$this->color($data['4000']);$this->Polygon(array((416+$x)/$z,(63+$y)/$z,(419+$x)/$z,(62+$y)/$z,(423+$x)/$z,(63+$y)/$z,(426+$x)/$z,(62+$y)/$z,(429+$x)/$z,(62+$y)/$z,(432+$x)/$z,(63+$y)/$z,(435+$x)/$z,(65+$y)/$z,(433+$x)/$z,(68+$y)/$z,(433+$x)/$z,(76+$y)/$z,(430+$x)/$z,(79+$y)/$z,(431+$x)/$z,(83+$y)/$z,(434+$x)/$z,(87+$y)/$z,(431+$x)/$z,(92+$y)/$z,(430+$x)/$z,(100+$y)/$z,(425+$x)/$z,(102+$y)/$z,(423+$x)/$z,(106+$y)/$z,(418+$x)/$z,(104+$y)/$z,(413+$x)/$z,(103+$y)/$z,(415+$x)/$z,(99+$y)/$z,(417+$x)/$z,(94+$y)/$z,(415+$x)/$z,(86+$y)/$z,(409+$x)/$z,(87+$y)/$z,(409+$x)/$z,(81+$y)/$z,(411+$x)/$z,(78+$y)/$z,(413+$x)/$z,(75+$y)/$z,(412+$x)/$z,(71+$y)/$z,(413+$x)/$z,(65+$y)/$z,(416+$x)/$z,(63+$y)/$z),'FD');
	$this->color($data['12000']);$this->Polygon(array((435+$x)/$z,(65+$y)/$z,(438+$x)/$z,(64+$y)/$z,(442+$x)/$z,(62+$y)/$z,(443+$x)/$z,(56+$y)/$z,(442+$x)/$z,(52+$y)/$z,(446+$x)/$z,(50+$y)/$z,(450+$x)/$z,(48+$y)/$z,(453+$x)/$z,(48+$y)/$z,(454+$x)/$z,(56+$y)/$z,(456+$x)/$z,(59+$y)/$z,(456+$x)/$z,(63+$y)/$z,(454+$x)/$z,(66+$y)/$z,(455+$x)/$z,(70+$y)/$z,(459+$x)/$z,(72+$y)/$z,(456+$x)/$z,(75+$y)/$z,(456+$x)/$z,(79+$y)/$z,(454+$x)/$z,(82+$y)/$z,(455+$x)/$z,(86+$y)/$z,(454+$x)/$z,(90+$y)/$z,(452+$x)/$z,(95+$y)/$z,(446+$x)/$z,(97+$y)/$z,(443+$x)/$z,(104+$y)/$z,(440+$x)/$z,(103+$y)/$z,(434+$x)/$z,(101+$y)/$z,(430+$x)/$z,(100+$y)/$z,(431+$x)/$z,(92+$y)/$z,(433+$x)/$z,(87+$y)/$z,(432+$x)/$z,(83+$y)/$z,(430+$x)/$z,(79+$y)/$z,(433+$x)/$z,(76+$y)/$z,(433+$x)/$z,(68+$y)/$z,(435+$x)/$z,(65+$y)/$z),'FD');
	$this->color($data['20000']);$this->Polygon(array((246+$x)/$z,(101+$y)/$z,(243+$x)/$z,(97+$y)/$z,(240+$x)/$z,(96+$y)/$z,(243+$x)/$z,(94+$y)/$z,(242+$x)/$z,(90+$y)/$z,(238+$x)/$z,(89+$y)/$z,(238+$x)/$z,(84+$y)/$z,(241+$x)/$z,(81+$y)/$z,(245+$x)/$z,(80+$y)/$z,(249+$x)/$z,(80+$y)/$z,(251+$x)/$z,(82+$y)/$z,(254+$x)/$z,(82+$y)/$z,(257+$x)/$z,(81+$y)/$z,(260+$x)/$z,(79+$y)/$z,(263+$x)/$z,(81+$y)/$z,(266+$x)/$z,(83+$y)/$z,(265+$x)/$z,(87+$y)/$z,(263+$x)/$z,(90+$y)/$z,(265+$x)/$z,(94+$y)/$z,(268+$x)/$z,(98+$y)/$z,(268+$x)/$z,(101+$y)/$z,(262+$x)/$z,(101+$y)/$z,(259+$x)/$z,(104+$y)/$z,(256+$x)/$z,(102+$y)/$z,(252+$x)/$z,(104+$y)/$z,(246+$x)/$z,(101+$y)/$z),'FD');
	$this->color($data['22000']);$this->Polygon(array((218+$x)/$z,(105+$y)/$z,(220+$x)/$z,(102+$y)/$z,(223+$x)/$z,(97+$y)/$z,(225+$x)/$z,(95+$y)/$z,(226+$x)/$z,(90+$y)/$z,(223+$x)/$z,(88+$y)/$z,(221+$x)/$z,(84+$y)/$z,(221+$x)/$z,(80+$y)/$z,(223+$x)/$z,(76+$y)/$z,(226+$x)/$z,(73+$y)/$z,(232+$x)/$z,(71+$y)/$z,(235+$x)/$z,(72+$y)/$z,(241+$x)/$z,(72+$y)/$z,(241+$x)/$z,(81+$y)/$z,(238+$x)/$z,(84+$y)/$z,(238+$x)/$z,(89+$y)/$z,(242+$x)/$z,(90+$y)/$z,(243+$x)/$z,(94+$y)/$z,(240+$x)/$z,(96+$y)/$z,(243+$x)/$z,(97+$y)/$z,(246+$x)/$z,(101+$y)/$z,(246+$x)/$z,(106+$y)/$z,(244+$x)/$z,(108+$y)/$z,(244+$x)/$z,(113+$y)/$z,(236+$x)/$z,(115+$y)/$z,(234+$x)/$z,(106+$y)/$z,(230+$x)/$z,(104+$y)/$z,(227+$x)/$z,(106+$y)/$z,(223+$x)/$z,(106+$y)/$z,(218+$x)/$z,(105+$y)/$z),'FD');
	$this->color($data['13000']);$this->Polygon(array((204+$x)/$z,(109+$y)/$z,(202+$x)/$z,(104+$y)/$z,(200+$x)/$z,(101+$y)/$z,(202+$x)/$z,(98+$y)/$z,(199+$x)/$z,(94+$y)/$z,(201+$x)/$z,(90+$y)/$z,(197+$x)/$z,(88+$y)/$z,(195+$x)/$z,(85+$y)/$z,(191+$x)/$z,(81+$y)/$z,(199+$x)/$z,(80+$y)/$z,(202+$x)/$z,(79+$y)/$z,(203+$x)/$z,(75+$y)/$z,(207+$x)/$z,(75+$y)/$z,(211+$x)/$z,(77+$y)/$z,(216+$x)/$z,(77+$y)/$z,(221+$x)/$z,(80+$y)/$z,(221+$x)/$z,(84+$y)/$z,(223+$x)/$z,(88+$y)/$z,(226+$x)/$z,(90+$y)/$z,(225+$x)/$z,(95+$y)/$z,(223+$x)/$z,(97+$y)/$z,(220+$x)/$z,(102+$y)/$z,(218+$x)/$z,(105+$y)/$z,(209+$x)/$z,(106+$y)/$z,(204+$x)/$z,(109+$y)/$z),'FD');
	$this->color($data['46000']);$this->Polygon(array((232+$x)/$z,(71+$y)/$z,(232+$x)/$z,(68+$y)/$z,(229+$x)/$z,(66+$y)/$z,(225+$x)/$z,(65+$y)/$z,(222+$x)/$z,(67+$y)/$z,(220+$x)/$z,(64+$y)/$z,(217+$x)/$z,(65+$y)/$z,(214+$x)/$z,(68+$y)/$z,(214+$x)/$z,(71+$y)/$z,(211+$x)/$z,(74+$y)/$z,(207+$x)/$z,(73+$y)/$z,(203+$x)/$z,(75+$y)/$z,(207+$x)/$z,(75+$y)/$z,(211+$x)/$z,(77+$y)/$z,(216+$x)/$z,(77+$y)/$z,(221+$x)/$z,(80+$y)/$z,(223+$x)/$z,(76+$y)/$z,(226+$x)/$z,(73+$y)/$z,(232+$x)/$z,(71+$y)/$z),'FD');
	$this->color($data['29000']);$this->Polygon(array((232+$x)/$z,(68+$y)/$z,(235+$x)/$z,(66+$y)/$z,(237+$x)/$z,(64+$y)/$z,(240+$x)/$z,(62+$y)/$z,(241+$x)/$z,(61+$y)/$z,(246+$x)/$z,(60+$y)/$z,(249+$x)/$z,(62+$y)/$z,(252+$x)/$z,(63+$y)/$z,(254+$x)/$z,(65+$y)/$z,(257+$x)/$z,(66+$y)/$z,(260+$x)/$z,(67+$y)/$z,(263+$x)/$z,(68+$y)/$z,(266+$x)/$z,(69+$y)/$z,(268+$x)/$z,(70+$y)/$z,(267+$x)/$z,(73+$y)/$z,(262+$x)/$z,(74+$y)/$z,(260+$x)/$z,(79+$y)/$z,(257+$x)/$z,(81+$y)/$z,(254+$x)/$z,(82+$y)/$z,(251+$x)/$z,(82+$y)/$z,(249+$x)/$z,(80+$y)/$z,(245+$x)/$z,(80+$y)/$z,(241+$x)/$z,(81+$y)/$z,(241+$x)/$z,(72+$y)/$z,(235+$x)/$z,(72+$y)/$z,(232+$x)/$z,(71+$y)/$z,(232+$x)/$z,(68+$y)/$z),'FD');
	$this->color($data['31000']);$this->Polygon(array((220+$x)/$z,(64+$y)/$z,(223+$x)/$z,(62+$y)/$z,(226+$x)/$z,(60+$y)/$z,(229+$x)/$z,(61+$y)/$z,(232+$x)/$z,(60+$y)/$z,(234+$x)/$z,(58+$y)/$z,(236+$x)/$z,(56+$y)/$z,(239+$x)/$z,(57+$y)/$z,(242+$x)/$z,(58+$y)/$z,(246+$x)/$z,(60+$y)/$z,(243+$x)/$z,(61+$y)/$z,(240+$x)/$z,(60+$y)/$z,(237+$x)/$z,(64+$y)/$z,(235+$x)/$z,(66+$y)/$z,(232+$x)/$z,(68+$y)/$z,(229+$x)/$z,(66+$y)/$z,(225+$x)/$z,(65+$y)/$z,(222+$x)/$z,(67+$y)/$z,(220+$x)/$z,(64+$y)/$z),'FD');
	$this->color($data['48000']);$this->Polygon(array((252+$x)/$z,(63+$y)/$z,(252+$x)/$z,(60+$y)/$z,(254+$x)/$z,(58+$y)/$z,(257+$x)/$z,(57+$y)/$z,(258+$x)/$z,(54+$y)/$z,(261+$x)/$z,(52+$y)/$z,(261+$x)/$z,(49+$y)/$z,(263+$x)/$z,(47+$y)/$z,(266+$x)/$z,(46+$y)/$z,(269+$x)/$z,(48+$y)/$z,(271+$x)/$z,(52+$y)/$z,(275+$x)/$z,(54+$y)/$z,(278+$x)/$z,(54+$y)/$z,(281+$x)/$z,(55+$y)/$z,(280+$x)/$z,(59+$y)/$z,(281+$x)/$z,(63+$y)/$z,(278+$x)/$z,(63+$y)/$z,(273+$x)/$z,(65+$y)/$z,(270+$x)/$z,(66+$y)/$z,(268+$x)/$z,(70+$y)/$z,(266+$x)/$z,(69+$y)/$z,(263+$x)/$z,(68+$y)/$z,(260+$x)/$z,(67+$y)/$z,(257+$x)/$z,(66+$y)/$z,(254+$x)/$z,(65+$y)/$z,(252+$x)/$z,(63+$y)/$z),'FD');
	$this->color($data['27000']);$this->Polygon(array((242+$x)/$z,(58+$y)/$z,(245+$x)/$z,(57+$y)/$z,(248+$x)/$z,(55+$y)/$z,(249+$x)/$z,(51+$y)/$z,(252+$x)/$z,(48+$y)/$z,(256+$x)/$z,(47+$y)/$z,(259+$x)/$z,(45+$y)/$z,(261+$x)/$z,(42+$y)/$z,(265+$x)/$z,(42+$y)/$z,(266+$x)/$z,(46+$y)/$z,(263+$x)/$z,(47+$y)/$z,(261+$x)/$z,(49+$y)/$z,(261+$x)/$z,(52+$y)/$z,(258+$x)/$z,(54+$y)/$z,(257+$x)/$z,(57+$y)/$z,(254+$x)/$z,(58+$y)/$z,(252+$x)/$z,(60+$y)/$z,(252+$x)/$z,(63+$y)/$z,(249+$x)/$z,(62+$y)/$z,(246+$x)/$z,(60+$y)/$z,(242+$x)/$z,(58+$y)/$z),'FD');
	$this->color($data['2000']);$this->Polygon(array((265+$x)/$z,(42+$y)/$z,(268+$x)/$z,(40+$y)/$z,(271+$x)/$z,(38+$y)/$z,(274+$x)/$z,(37+$y)/$z,(278+$x)/$z,(37+$y)/$z,(281+$x)/$z,(36+$y)/$z,(285+$x)/$z,(37+$y)/$z,(287+$x)/$z,(39+$y)/$z,(284+$x)/$z,(41+$y)/$z,(285+$x)/$z,(45+$y)/$z,(287+$x)/$z,(50+$y)/$z,(285+$x)/$z,(53+$y)/$z,(281+$x)/$z,(55+$y)/$z,(278+$x)/$z,(54+$y)/$z,(275+$x)/$z,(54+$y)/$z,(271+$x)/$z,(52+$y)/$z,(269+$x)/$z,(48+$y)/$z,(266+$x)/$z,(46+$y)/$z,(265+$x)/$z,(42+$y)/$z),'FD');
	$this->color($data['38000']);$this->Polygon(array((287+$x)/$z,(50+$y)/$z,(288+$x)/$z,(53+$y)/$z,(290+$x)/$z,(50+$y)/$z,(293+$x)/$z,(56+$y)/$z,(295+$x)/$z,(54+$y)/$z,(298+$x)/$z,(54+$y)/$z,(301+$x)/$z,(55+$y)/$z,(303+$x)/$z,(57+$y)/$z,(302+$x)/$z,(60+$y)/$z,(301+$x)/$z,(63+$y)/$z,(300+$x)/$z,(66+$y)/$z,(298+$x)/$z,(68+$y)/$z,(295+$x)/$z,(66+$y)/$z,(290+$x)/$z,(66+$y)/$z,(285+$x)/$z,(65+$y)/$z,(281+$x)/$z,(63+$y)/$z,(280+$x)/$z,(59+$y)/$z,(281+$x)/$z,(55+$y)/$z,(285+$x)/$z,(53+$y)/$z,(287+$x)/$z,(50+$y)/$z),'FD');
	$this->color($data['44000']);$this->Polygon(array((287+$x)/$z,(39+$y)/$z,(290+$x)/$z,(40+$y)/$z,(293+$x)/$z,(40+$y)/$z,(296+$x)/$z,(40+$y)/$z,(299+$x)/$z,(39+$y)/$z,(302+$x)/$z,(39+$y)/$z,(309+$x)/$z,(39+$y)/$z,(309+$x)/$z,(42+$y)/$z,(309+$x)/$z,(46+$y)/$z,(311+$x)/$z,(49+$y)/$z,(307+$x)/$z,(51+$y)/$z,(307+$x)/$z,(54+$y)/$z,(303+$x)/$z,(57+$y)/$z,(301+$x)/$z,(55+$y)/$z,(298+$x)/$z,(54+$y)/$z,(295+$x)/$z,(54+$y)/$z,(293+$x)/$z,(56+$y)/$z,(290+$x)/$z,(55+$y)/$z,(288+$x)/$z,(53+$y)/$z,(287+$x)/$z,(50+$y)/$z,(285+$x)/$z,(45+$y)/$z,(284+$x)/$z,(41+$y)/$z,(287+$x)/$z,(39+$y)/$z),'FD');
	$this->color($data['42000']);$this->Polygon(array((285+$x)/$z,(37+$y)/$z,(288+$x)/$z,(36+$y)/$z,(290+$x)/$z,(34+$y)/$z,(293+$x)/$z,(34+$y)/$z,(296+$x)/$z,(34+$y)/$z,(299+$x)/$z,(34+$y)/$z,(302+$x)/$z,(33+$y)/$z,(305+$x)/$z,(32+$y)/$z,(309+$x)/$z,(34+$y)/$z,(313+$x)/$z,(33+$y)/$z,(316+$x)/$z,(32+$y)/$z,(314+$x)/$z,(36+$y)/$z,(311+$x)/$z,(38+$y)/$z,(309+$x)/$z,(39+$y)/$z,(302+$x)/$z,(39+$y)/$z,(299+$x)/$z,(39+$y)/$z,(296+$x)/$z,(40+$y)/$z,(293+$x)/$z,(40+$y)/$z,(290+$x)/$z,(40+$y)/$z,(287+$x)/$z,(39+$y)/$z,(285+$x)/$z,(37+$y)/$z),'FD');
	$this->color($data['26000']);$this->Polygon(array((309+$x)/$z,(42+$y)/$z,(311+$x)/$z,(42+$y)/$z,(314+$x)/$z,(41+$y)/$z,(317+$x)/$z,(41+$y)/$z,(320+$x)/$z,(41+$y)/$z,(323+$x)/$z,(40+$y)/$z,(326+$x)/$z,(38+$y)/$z,(329+$x)/$z,(37+$y)/$z,(331+$x)/$z,(39+$y)/$z,(334+$x)/$z,(40+$y)/$z,(334+$x)/$z,(46+$y)/$z,(332+$x)/$z,(50+$y)/$z,(334+$x)/$z,(52+$y)/$z,(337+$x)/$z,(56+$y)/$z,(332+$x)/$z,(61+$y)/$z,(329+$x)/$z,(59+$y)/$z,(326+$x)/$z,(63+$y)/$z,(323+$x)/$z,(63+$y)/$z,(322+$x)/$z,(58+$y)/$z,(318+$x)/$z,(58+$y)/$z,(318+$x)/$z,(65+$y)/$z,(315+$x)/$z,(67+$y)/$z,(313+$x)/$z,(70+$y)/$z,(311+$x)/$z,(70+$y)/$z,(309+$x)/$z,(67+$y)/$z,(307+$x)/$z,(69+$y)/$z,(304+$x)/$z,(69+$y)/$z,(302+$x)/$z,(67+$y)/$z,(300+$x)/$z,(66+$y)/$z,(301+$x)/$z,(63+$y)/$z,(302+$x)/$z,(60+$y)/$z,(303+$x)/$z,(57+$y)/$z,(307+$x)/$z,(54+$y)/$z,(307+$x)/$z,(51+$y)/$z,(311+$x)/$z,(49+$y)/$z,(309+$x)/$z,(46+$y)/$z,(309+$x)/$z,(42+$y)/$z),'FD');
	$this->color($data['16000']);$this->Polygon(array((316+$x)/$z,(32+$y)/$z,(319+$x)/$z,(33+$y)/$z,(322+$x)/$z,(34+$y)/$z,(325+$x)/$z,(33+$y)/$z,(328+$x)/$z,(31+$y)/$z,(328+$x)/$z,(28+$y)/$z,(324+$x)/$z,(30+$y)/$z,(322+$x)/$z,(27+$y)/$z,(318+$x)/$z,(27+$y)/$z,(316+$x)/$z,(32+$y)/$z),'FD');
	$this->color($data['9000']);$this->Polygon(array((325+$x)/$z,(33+$y)/$z,(327+$x)/$z,(35+$y)/$z,(326+$x)/$z,(38+$y)/$z,(323+$x)/$z,(40+$y)/$z,(320+$x)/$z,(41+$y)/$z,(317+$x)/$z,(41+$y)/$z,(314+$x)/$z,(41+$y)/$z,(311+$x)/$z,(42+$y)/$z,(309+$x)/$z,(42+$y)/$z,(309+$x)/$z,(39+$y)/$z,(311+$x)/$z,(38+$y)/$z,(314+$x)/$z,(36+$y)/$z,(313+$x)/$z,(33+$y)/$z,(316+$x)/$z,(32+$y)/$z,(319+$x)/$z,(33+$y)/$z,(322+$x)/$z,(34+$y)/$z,(325+$x)/$z,(33+$y)/$z),'FD');
	$this->color($data['10000']);$this->Polygon(array((329+$x)/$z,(37+$y)/$z,(331+$x)/$z,(35+$y)/$z,(334+$x)/$z,(33+$y)/$z,(337+$x)/$z,(33+$y)/$z,(339+$x)/$z,(33+$y)/$z,(341+$x)/$z,(37+$y)/$z,(344+$x)/$z,(39+$y)/$z,(348+$x)/$z,(39+$y)/$z,(355+$x)/$z,(38+$y)/$z,(356+$x)/$z,(44+$y)/$z,(352+$x)/$z,(46+$y)/$z,(349+$x)/$z,(48+$y)/$z,(349+$x)/$z,(52+$y)/$z,(347+$x)/$z,(55+$y)/$z,(344+$x)/$z,(56+$y)/$z,(340+$x)/$z,(56+$y)/$z,(337+$x)/$z,(56+$y)/$z,(334+$x)/$z,(52+$y)/$z,(332+$x)/$z,(50+$y)/$z,(334+$x)/$z,(46+$y)/$z,(334+$x)/$z,(40+$y)/$z,(331+$x)/$z,(39+$y)/$z,(329+$x)/$z,(37+$y)/$z),'FD');
	$this->color($data['35000']);$this->Polygon(array((328+$x)/$z,(28+$y)/$z,(331+$x)/$z,(29+$y)/$z,(334+$x)/$z,(27+$y)/$z,(337+$x)/$z,(26+$y)/$z,(340+$x)/$z,(27+$y)/$z,(342+$x)/$z,(24+$y)/$z,(346+$x)/$z,(24+$y)/$z,(346+$x)/$z,(27+$y)/$z,(344+$x)/$z,(29+$y)/$z,(342+$x)/$z,(31+$y)/$z,(339+$x)/$z,(33+$y)/$z,(337+$x)/$z,(33+$y)/$z,(334+$x)/$z,(33+$y)/$z,(331+$x)/$z,(35+$y)/$z,(329+$x)/$z,(37+$y)/$z,(326+$x)/$z,(38+$y)/$z,(325+$x)/$z,(33+$y)/$z,(328+$x)/$z,(32+$y)/$z,(328+$x)/$z,(28+$y)/$z),'FD');
	$this->color($data['15000']);$this->Polygon(array((346+$x)/$z,(24+$y)/$z,(350+$x)/$z,(24+$y)/$z,(355+$x)/$z,(24+$y)/$z,(362+$x)/$z,(24+$y)/$z,(362+$x)/$z,(28+$y)/$z,(360+$x)/$z,(32+$y)/$z,(357+$x)/$z,(35+$y)/$z,(355+$x)/$z,(38+$y)/$z,(348+$x)/$z,(39+$y)/$z,(344+$x)/$z,(39+$y)/$z,(341+$x)/$z,(37+$y)/$z,(339+$x)/$z,(33+$y)/$z,(342+$x)/$z,(31+$y)/$z,(344+$x)/$z,(29+$y)/$z,(346+$x)/$z,(27+$y)/$z,(346+$x)/$z,(24+$y)/$z),'FD');
	$this->color($data['6000']);$this->Polygon(array((362+$x)/$z,(24+$y)/$z,(365+$x)/$z,(24+$y)/$z,(368+$x)/$z,(25+$y)/$z,(371+$x)/$z,(26+$y)/$z,(373+$x)/$z,(30+$y)/$z,(381+$x)/$z,(31+$y)/$z,(381+$x)/$z,(33+$y)/$z,(380+$x)/$z,(37+$y)/$z,(379+$x)/$z,(40+$y)/$z,(376+$x)/$z,(40+$y)/$z,(375+$x)/$z,(34+$y)/$z,(372+$x)/$z,(34+$y)/$z,(369+$x)/$z,(35+$y)/$z,(366+$x)/$z,(37+$y)/$z,(364+$x)/$z,(40+$y)/$z,(362+$x)/$z,(42+$y)/$z,(359+$x)/$z,(44+$y)/$z,(356+$x)/$z,(44+$y)/$z,(355+$x)/$z,(38+$y)/$z,(357+$x)/$z,(35+$y)/$z,(360+$x)/$z,(32+$y)/$z,(362+$x)/$z,(28+$y)/$z,(362+$x)/$z,(24+$y)/$z),'FD');
	$this->color($data['34000']);$this->Polygon(array((364+$x)/$z,(40+$y)/$z,(367+$x)/$z,(41+$y)/$z,(370+$x)/$z,(42+$y)/$z,(373+$x)/$z,(43+$y)/$z,(374+$x)/$z,(46+$y)/$z,(376+$x)/$z,(49+$y)/$z,(374+$x)/$z,(51+$y)/$z,(374+$x)/$z,(54+$y)/$z,(372+$x)/$z,(58+$y)/$z,(370+$x)/$z,(57+$y)/$z,(366+$x)/$z,(56+$y)/$z,(364+$x)/$z,(56+$y)/$z,(361+$x)/$z,(56+$y)/$z,(359+$x)/$z,(56+$y)/$z,(357+$x)/$z,(56+$y)/$z,(358+$x)/$z,(53+$y)/$z,(358+$x)/$z,(51+$y)/$z,(355+$x)/$z,(52+$y)/$z,(352+$x)/$z,(52+$y)/$z,(349+$x)/$z,(52+$y)/$z,(349+$x)/$z,(48+$y)/$z,(352+$x)/$z,(46+$y)/$z,(356+$x)/$z,(44+$y)/$z,(359+$x)/$z,(44+$y)/$z,(362+$x)/$z,(42+$y)/$z,(364+$x)/$z,(40+$y)/$z),'FD');
	$this->color($data['19000']);$this->Polygon(array((381+$x)/$z,(33+$y)/$z,(384+$x)/$z,(34+$y)/$z,(389+$x)/$z,(34+$y)/$z,(390+$x)/$z,(38+$y)/$z,(393+$x)/$z,(41+$y)/$z,(395+$x)/$z,(44+$y)/$z,(393+$x)/$z,(47+$y)/$z,(396+$x)/$z,(48+$y)/$z,(396+$x)/$z,(53+$y)/$z,(395+$x)/$z,(56+$y)/$z,(390+$x)/$z,(54+$y)/$z,(388+$x)/$z,(58+$y)/$z,(382+$x)/$z,(59+$y)/$z,(382+$x)/$z,(63+$y)/$z,(379+$x)/$z,(64+$y)/$z,(376+$x)/$z,(63+$y)/$z,(374+$x)/$z,(60+$y)/$z,(372+$x)/$z,(58+$y)/$z,(374+$x)/$z,(58+$y)/$z,(374+$x)/$z,(51+$y)/$z,(376+$x)/$z,(49+$y)/$z,(374+$x)/$z,(46+$y)/$z,(373+$x)/$z,(43+$y)/$z,(370+$x)/$z,(42+$y)/$z,(367+$x)/$z,(41+$y)/$z,(364+$x)/$z,(40+$y)/$z,(366+$x)/$z,(37+$y)/$z,(369+$x)/$z,(35+$y)/$z,(372+$x)/$z,(34+$y)/$z,(375+$x)/$z,(34+$y)/$z,(376+$x)/$z,(40+$y)/$z,(379+$x)/$z,(40+$y)/$z,(380+$x)/$z,(37+$y)/$z,(381+$x)/$z,(33+$y)/$z),'FD');
	$this->color($data['43000']);$this->Polygon(array((389+$x)/$z,(34+$y)/$z,(392+$x)/$z,(33+$y)/$z,(395+$x)/$z,(32+$y)/$z,(400+$x)/$z,(32+$y)/$z,(404+$x)/$z,(32+$y)/$z,(407+$x)/$z,(33+$y)/$z,(405+$x)/$z,(35+$y)/$z,(405+$x)/$z,(39+$y)/$z,(408+$x)/$z,(42+$y)/$z,(409+$x)/$z,(45+$y)/$z,(406+$x)/$z,(47+$y)/$z,(405+$x)/$z,(50+$y)/$z,(402+$x)/$z,(52+$y)/$z,(400+$x)/$z,(55+$y)/$z,(395+$x)/$z,(56+$y)/$z,(396+$x)/$z,(53+$y)/$z,(396+$x)/$z,(48+$y)/$z,(393+$x)/$z,(47+$y)/$z,(395+$x)/$z,(44+$y)/$z,(393+$x)/$z,(41+$y)/$z,(390+$x)/$z,(38+$y)/$z,(389+$x)/$z,(34+$y)/$z),'FD');
	$this->color($data['18000']);$this->Polygon(array((381+$x)/$z,(31+$y)/$z,(384+$x)/$z,(29+$y)/$z,(386+$x)/$z,(27+$y)/$z,(388+$x)/$z,(25+$y)/$z,(392+$x)/$z,(25+$y)/$z,(395+$x)/$z,(25+$y)/$z,(398+$x)/$z,(23+$y)/$z,(401+$x)/$z,(22+$y)/$z,(404+$x)/$z,(24+$y)/$z,(405+$x)/$z,(25+$y)/$z,(406+$x)/$z,(30+$y)/$z,(404+$x)/$z,(32+$y)/$z,(400+$x)/$z,(32+$y)/$z,(395+$x)/$z,(32+$y)/$z,(392+$x)/$z,(33+$y)/$z,(389+$x)/$z,(34+$y)/$z,(384+$x)/$z,(34+$y)/$z,(381+$x)/$z,(33+$y)/$z,(381+$x)/$z,(31+$y)/$z),'FD');
	$this->color($data['4000']);$this->Polygon(array((409+$x)/$z,(45+$y)/$z,(411+$x)/$z,(47+$y)/$z,(414+$x)/$z,(46+$y)/$z,(417+$x)/$z,(46+$y)/$z,(421+$x)/$z,(46+$y)/$z,(423+$x)/$z,(49+$y)/$z,(427+$x)/$z,(48+$y)/$z,(428+$x)/$z,(47+$y)/$z,(431+$x)/$z,(50+$y)/$z,(434+$x)/$z,(52+$y)/$z,(437+$x)/$z,(55+$y)/$z,(443+$x)/$z,(56+$y)/$z,(442+$x)/$z,(62+$y)/$z,(438+$x)/$z,(64+$y)/$z,(435+$x)/$z,(65+$y)/$z,(432+$x)/$z,(63+$y)/$z,(429+$x)/$z,(62+$y)/$z,(426+$x)/$z,(62+$y)/$z,(423+$x)/$z,(63+$y)/$z,(419+$x)/$z,(62+$y)/$z,(416+$x)/$z,(63+$y)/$z,(416+$x)/$z,(60+$y)/$z,(413+$x)/$z,(57+$y)/$z,(410+$x)/$z,(57+$y)/$z,(407+$x)/$z,(56+$y)/$z,(404+$x)/$z,(56+$y)/$z,(400+$x)/$z,(55+$y)/$z,(402+$x)/$z,(52+$y)/$z,(405+$x)/$z,(50+$y)/$z,(406+$x)/$z,(47+$y)/$z,(409+$x)/$z,(45+$y)/$z),'FD');
	$this->color($data['25000']);$this->Polygon(array((407+$x)/$z,(33+$y)/$z,(410+$x)/$z,(32+$y)/$z,(413+$x)/$z,(31+$y)/$z,(416+$x)/$z,(32+$y)/$z,(417+$x)/$z,(35+$y)/$z,(419+$x)/$z,(37+$y)/$z,(421+$x)/$z,(39+$y)/$z,(422+$x)/$z,(42+$y)/$z,(421+$x)/$z,(46+$y)/$z,(417+$x)/$z,(46+$y)/$z,(414+$x)/$z,(46+$y)/$z,(411+$x)/$z,(47+$y)/$z,(409+$x)/$z,(45+$y)/$z,(408+$x)/$z,(42+$y)/$z,(405+$x)/$z,(39+$y)/$z,(405+$x)/$z,(35+$y)/$z,(407+$x)/$z,(33+$y)/$z),'FD');
	$this->color($data['21000']);$this->Polygon(array((401+$x)/$z,(22+$y)/$z,(402+$x)/$z,(19+$y)/$z,(405+$x)/$z,(17+$y)/$z,(408+$x)/$z,(17+$y)/$z,(410+$x)/$z,(19+$y)/$z,(413+$x)/$z,(20+$y)/$z,(415+$x)/$z,(22+$y)/$z,(418+$x)/$z,(22+$y)/$z,(421+$x)/$z,(22+$y)/$z,(425+$x)/$z,(21+$y)/$z,(428+$x)/$z,(19+$y)/$z,(429+$x)/$z,(22+$y)/$z,(430+$x)/$z,(26+$y)/$z,(430+$x)/$z,(29+$y)/$z,(427+$x)/$z,(31+$y)/$z,(424+$x)/$z,(31+$y)/$z,(422+$x)/$z,(34+$y)/$z,(419+$x)/$z,(37+$y)/$z,(417+$x)/$z,(35+$y)/$z,(416+$x)/$z,(32+$y)/$z,(413+$x)/$z,(31+$y)/$z,(410+$x)/$z,(32+$y)/$z,(407+$x)/$z,(33+$y)/$z,(404+$x)/$z,(32+$y)/$z,(406+$x)/$z,(30+$y)/$z,(405+$x)/$z,(27+$y)/$z,(404+$x)/$z,(24+$y)/$z,(401+$x)/$z,(22+$y)/$z),'FD');
	$this->color($data['23000']);$this->Polygon(array((428+$x)/$z,(19+$y)/$z,(430+$x)/$z,(17+$y)/$z,(433+$x)/$z,(17+$y)/$z,(437+$x)/$z,(18+$y)/$z,(438+$x)/$z,(22+$y)/$z,(439+$x)/$z,(24+$y)/$z,(437+$x)/$z,(27+$y)/$z,(437+$x)/$z,(30+$y)/$z,(434+$x)/$z,(30+$y)/$z,(430+$x)/$z,(29+$y)/$z,(430+$x)/$z,(26+$y)/$z,(429+$x)/$z,(22+$y)/$z,(428+$x)/$z,(19+$y)/$z),'FD');
	$this->color($data['24000']);$this->Polygon(array((437+$x)/$z,(30+$y)/$z,(439+$x)/$z,(31+$y)/$z,(443+$x)/$z,(31+$y)/$z,(444+$x)/$z,(33+$y)/$z,(441+$x)/$z,(37+$y)/$z,(438+$x)/$z,(40+$y)/$z,(435+$x)/$z,(42+$y)/$z,(431+$x)/$z,(42+$y)/$z,(428+$x)/$z,(43+$y)/$z,(428+$x)/$z,(47+$y)/$z,(427+$x)/$z,(48+$y)/$z,(423+$x)/$z,(49+$y)/$z,(421+$x)/$z,(46+$y)/$z,(422+$x)/$z,(42+$y)/$z,(421+$x)/$z,(39+$y)/$z,(419+$x)/$z,(37+$y)/$z,(422+$x)/$z,(34+$y)/$z,(424+$x)/$z,(31+$y)/$z,(427+$x)/$z,(31+$y)/$z,(430+$x)/$z,(29+$y)/$z,(434+$x)/$z,(30+$y)/$z, (437+$x)/$z,(30+$y)/$z),'FD');
	$this->color($data['36000']);$this->Polygon(array((439+$x)/$z,(24+$y)/$z,(442+$x)/$z,(23+$y)/$z,(445+$x)/$z,(22+$y)/$z,(448+$x)/$z,(20+$y)/$z,(451+$x)/$z,(19+$y)/$z,(454+$x)/$z,(20+$y)/$z,(457+$x)/$z,(20+$y)/$z,(460+$x)/$z,(19+$y)/$z,(460+$x)/$z,(22+$y)/$z,(460+$x)/$z,(24+$y)/$z,(456+$x)/$z,(24+$y)/$z,(456+$x)/$z,(29+$y)/$z,(453+$x)/$z,(31+$y)/$z,(450+$x)/$z,(33+$y)/$z,(447+$x)/$z,(35+$y)/$z,(444+$x)/$z,(33+$y)/$z,(443+$x)/$z,(31+$y)/$z,(439+$x)/$z,(31+$y)/$z,(437+$x)/$z,(30+$y)/$z,(437+$x)/$z,(27+$y)/$z,(439+$x)/$z,(24+$y)/$z),'FD');
	$this->color($data['41000']);$this->Polygon(array((450+$x)/$z,(33+$y)/$z,(453+$x)/$z,(34+$y)/$z,(455+$x)/$z,(36+$y)/$z,(455+$x)/$z,(39+$y)/$z,(454+$x)/$z,(44+$y)/$z,(453+$x)/$z,(48+$y)/$z,(450+$x)/$z,(48+$y)/$z,(446+$x)/$z,(50+$y)/$z,(442+$x)/$z,(52+$y)/$z,(443+$x)/$z,(56+$y)/$z,(437+$x)/$z,(55+$y)/$z,(434+$x)/$z,(52+$y)/$z,(431+$x)/$z,(50+$y)/$z,(428+$x)/$z,(47+$y)/$z,(428+$x)/$z,(43+$y)/$z,(431+$x)/$z,(42+$y)/$z,(435+$x)/$z,(42+$y)/$z,(438+$x)/$z,(40+$y)/$z,(441+$x)/$z,(37+$y)/$z,(444+$x)/$z,(33+$y)/$z, (447+$x)/$z,(35+$y)/$z,(450+$x)/$z,(33+$y)/$z),'FD');		
	}			
	$this->RoundedRect($x-10,155,40,55, 2, $style = '');
	$this->color(0);    $this->SetXY($x-10,150);$this->cell(30,5,"",0,0,'C',0,0);
	$this->color(0);    $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 0",0,0,'L',0,0);
	$this->color(1);    $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 1-9",0,0,'L',0,0);
	$this->color(10);   $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 10-99",0,0,'L',0,0);
	$this->color(100);  $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 100-999",0,0,'L',0,0);
	$this->color(1000); $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 1000+",0,0,'L',0,0);
	$this->color(0);    $this->SetXY($x-10,$this->GetY()+15);$this->cell(40,5,'00km_____45km_____90km',0,0,'L',0,0);
	$this->color(0);    $this->SetXY($x-10,$this->GetY()+5);$this->cell(40,5,'Source : Dr TIBA Redha  DSP DJELFA ',0,0,'L',0,0);
	$this->color(0);
	$this->SetDrawColor(255,0,0);$this->SetFont('Times', 'BIU', 8);
	$this->SetXY(150,35);$this->cell(65,4,'Algerie',0,0,'C',0,0);
	$this->SetDrawColor(255,0,0);$this->SetFont('Times', 'B', 7.5);
	$yy=165;
	$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'1-Adrar',0,0,'L',0,0);$this->color($data['1000']);$this->cell(10,3,$data['1000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'2-Chlef',0,0,'L',0,0);$this->color($data['12000']);$this->cell(10,3,$data['12000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'3-Laghouat',0,0,'L',0,0);$this->color($data['3000']);$this->cell(10,3,$data['3000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'4-Oum el bouaghi',0,0,'L',0,0);$this->color($data['4000']);$this->cell(10,3,$data['4000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'5-Batna',0,0,'L',0,0);$this->color($data['5000']);$this->cell(10,3,$data['5000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'6-Bejaia',0,0,'L',0,0);$this->color($data['6000']);$this->cell(10,3,$data['6000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'7-Biskra',0,0,'L',0,0);$this->color($data['7000']);$this->cell(10,3,$data['7000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'8-Bechar',0,0,'L',0,0);$this->color($data['8000']);$this->cell(10,3,$data['8000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'9-Blida',0,0,'L',0,0);$this->color($data['9000']);$this->cell(10,3,$data['9000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'10-Bouira',0,0,'L',0,0);$this->color($data['10000']);$this->cell(10,3,$data['10000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'11-Tamanrasset',0,0,'L',0,0);$this->color($data['11000']);$this->cell(10,3,$data['11000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'12-Tebessa',0,0,'L',0,0);$this->color($data['12000']);$this->cell(10,3,$data['12000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'13-Tlemcen',0,0,'L',0,0);$this->color($data['13000']);$this->cell(10,3,$data['13000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'14-Tiaret',0,0,'L',0,0);$this->color($data['14000']);$this->cell(10,3,$data['14000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'15-Tizi ouzou',0,0,'L',0,0);$this->color($data['15000']);$this->cell(10,3,$data['15000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'16-Alger',0,0,'L',0,0);$this->color($data['16000']);$this->cell(10,3,$data['16000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'17-Djelfa',0,0,'L',0,0);$this->color($data['17000']);$this->cell(10,3,$data['17000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'18-Jijel',0,0,'L',0,0);$this->color($data['18000']);$this->cell(10,3,$data['18000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'19-Setif',0,0,'L',0,0);$this->color($data['19000']);$this->cell(10,3,$data['19000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'20-Saida',0,0,'L',0,0);$this->color($data['20000']);$this->cell(10,3,$data['20000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'21-Skikda',0,0,'L',0,0);$this->color($data['21000']);$this->cell(10,3,$data['21000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'22-Sidi bel abbes',0,0,'L',0,0);$this->color($data['22000']);$this->cell(10,3,$data['22000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'23-Annaba',0,0,'L',0,0);$this->color($data['23000']);$this->cell(10,3,$data['23000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'24-Guelma',0,0,'L',0,0);$this->color($data['24000']);$this->cell(10,3,$data['24000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'25-Constantine',0,0,'L',0,0);$this->color($data['25000']);$this->cell(10,3,$data['25000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'26-Medea',0,0,'L',0,0);$this->color($data['26000']);$this->cell(10,3,$data['26000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'27-Mostaganem',0,0,'L',0,0);$this->color($data['27000']);$this->cell(10,3,$data['27000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'28-M sila',0,0,'L',0,0);$this->color($data['28000']);$this->cell(10,3,$data['28000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'29-Mascara',0,0,'L',0,0);$this->color($data['29000']);$this->cell(10,3,$data['29000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'30-Ouargla',0,0,'L',0,0);$this->color($data['30000']);$this->cell(10,3,$data['30000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'31-Oran',0,0,'L',0,0);$this->color($data['31000']);$this->cell(10,3,$data['31000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'32-El bayadh',0,0,'L',0,0);$this->color($data['32000']);$this->cell(10,3,$data['32000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'33-Illizi',0,0,'L',0,0);$this->color($data['33000']);$this->cell(10,3,$data['33000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'34-Bordj bou arreridj',0,0,'L',0,0);$this->color($data['34000']);$this->cell(10,3,$data['34000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'35-Boumerdes',0,0,'L',0,0);$this->color($data['35000']);$this->cell(10,3,$data['35000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'36-El taref',0,0,'L',0,0);$this->color($data['36000']);$this->cell(10,3,$data['36000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'37-Tindouf',0,0,'L',0,0);$this->color($data['37000']);$this->cell(10,3,$data['37000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'38-Tissemsilt',0,0,'L',0,0);$this->color($data['38000']);$this->cell(10,3,$data['38000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'39-El oued',0,0,'L',0,0);$this->color($data['39000']);$this->cell(10,3,$data['39000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'40-Khenchela',0,0,'L',0,0);$this->color($data['40000']);$this->cell(10,3,$data['40000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'41-Souk ahras',0,0,'L',0,0);$this->color($data['41000']);$this->cell(10,3,$data['41000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'42-Tipaza',0,0,'L',0,0);$this->color($data['42000']);$this->cell(10,3,$data['42000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'43-Mila',0,0,'L',0,0);$this->color($data['43000']);$this->cell(10,3,$data['43000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'44-Ain defla',0,0,'L',0,0);$this->color($data['44000']);$this->cell(10,3,$data['44000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'45-Naama',0,0,'L',0,0);$this->color($data['45000']);$this->cell(10,3,$data['45000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'46-Ain temouchent',0,0,'L',0,0);$this->color($data['46000']);$this->cell(10,3,$data['46000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'47-Ghardaia',0,0,'L',0,0);$this->color($data['47000']);$this->cell(10,3,$data['47000'],0,0,'C',1,0);$this->SetXY($yy,$this->GetY()+4);$this->cell(25,4,'48-Relizane',0,0,'L',0,0);$this->color($data['48000']);$this->cell(10,3,$data['48000'],0,0,'C',1,0);										
	$this->SetDrawColor(0,0,0);$this->SetFont('Times', 'B', 5.5);
	$this->SetXY(65,119);$this->cell(55,5,'1',0,0,'L',0,0);$this->SetXY(78,44);$this->cell(55,5,'2',0,0,'L',0,0);$this->SetXY(90.5,68);$this->cell(55,5,'3',0,0,'L',0,0);$this->SetXY(117,47);$this->cell(55,5,'4',0,0,'L',0,0);$this->SetXY(110,50);$this->cell(55,5,'5',0,0,'L',0,0);$this->SetXY(103,40);$this->cell(55,5,'6',0,0,'L',0,0);$this->SetXY(108,56);$this->cell(55,5,'7',0,0,'L',0,0);$this->SetXY(55,90);$this->cell(55,5,'8',0,0,'L',0,0);	$this->SetXY(90,42.5);$this->cell(55,5,'9',0,0,'L',0,0);$this->SetXY(96,45);$this->cell(55,5,'10',0,0,'L',0,0);	$this->SetXY(95,129);$this->cell(55,5,'11',0,0,'L',0,0);$this->SetXY(123,52);$this->cell(55,5,'12',0,0,'L',0,0);$this->SetXY(60,57);$this->cell(55,5,'13',0,0,'L',0,0);$this->SetXY(80.5,55);$this->cell(55,5,'14',0,0,'L',0,0);	$this->SetXY(99,40);$this->cell(55,5,'15',0,0,'L',0,0);$this->SetXY(90,40);$this->cell(55,5,'16',0,0,'L',0,0);$this->SetXY(90.5,55);$this->cell(55,5,'17',0,0,'L',0,0);	$this->SetXY(109,40);$this->cell(55,5,'18',0,0,'L',0,0);$this->SetXY(107,45);$this->cell(55,5,'19',0,0,'L',0,0);$this->SetXY(71,57);$this->cell(55,5,'20',0,0,'L',0,0);$this->SetXY(116,39.5);$this->cell(55,5,'21',0,0,'L',0,0);$this->SetXY(66,57);$this->cell(55,5,'22',0,0,'L',0,0);$this->SetXY(120.5,38.5);$this->cell(55,5,'23',0,0,'L',0,0);$this->SetXY(119.5,42);$this->cell(55,5,'24',0,0,'L',0,0);$this->SetXY(115,43);$this->cell(55,5,'25',0,0,'L',0,0);$this->SetXY(90,45);$this->cell(55,5,'26',0,0,'L',0,0);$this->SetXY(72,47);$this->cell(55,5,'27',0,0,'L',0,0);$this->SetXY(98,52);$this->cell(55,5,'28',0,0,'L',0,0);	$this->SetXY(71,52);$this->cell(55,5,'29',0,0,'L',0,0);$this->SetXY(110,90);$this->cell(55,5,'30',0,0,'L',0,0);$this->SetXY(66,49);$this->cell(55,5,'31',0,0,'L',0,0);$this->SetXY(75.5,68);$this->cell(55,5,'32',0,0,'L',0,0);$this->SetXY(125,119);$this->cell(55,5,'33',0,0,'L',0,0);$this->SetXY(102,45);$this->cell(55,5,'34',0,0,'L',0,0);	$this->SetXY(94,40);$this->cell(55,5,'35',0,0,'L',0,0);$this->SetXY(124,39.5);$this->cell(55,5,'36',0,0,'L',0,0);$this->SetXY(25,112);$this->cell(55,5,'37',0,0,'L',0,0);$this->SetXY(81.5,48.5);$this->cell(55,5,'38',0,0,'L',0,0);	$this->SetXY(118.5,68);$this->cell(55,5,'39',0,0,'L',0,0);$this->SetXY(117,52);$this->cell(55,5,'40',0,0,'L',0,0);$this->SetXY(122,44.5);$this->cell(55,5,'41',0,0,'L',0,0);$this->SetXY(84,42);$this->cell(55,5,'42',0,0,'L',0,0);$this->SetXY(111,43);$this->cell(55,5,'43',0,0,'L',0,0);$this->SetXY(84,45);$this->cell(55,5,'44',0,0,'L',0,0);$this->SetXY(65,68);$this->cell(55,5,'45',0,0,'L',0,0);$this->SetXY(63,51.5);$this->cell(55,5,'46',0,0,'L',0,0);$this->SetXY(90,90);$this->cell(55,5,'47',0,0,'L',0,0);		$this->SetXY(75,48);$this->cell(55,5,'48',0,0,'L',0,0);	
    $this->SetDrawColor(0,0,0);$this->SetFont('Times', 'B', 10);
    }
	
	
	function decescomm($DATEJOUR1,$DATEJOUR2,$COMMUNER,$STRUCTURED){$this->mysqlconnect();$sql = " select DINS,COMMUNER,STRUCTURED from deceshosp where DINS BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' and COMMUNER=$COMMUNER and STRUCTURED $STRUCTURED  ";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$OP=mysql_num_rows($requete);mysql_free_result($requete);return $OP;}
    function datasig($datejour1,$datejour2,$STRUCTURED) {$data = array();for ($i = 916; $i <= 968; $i+= 1) {$data[$i]= $this->decescomm($datejour1,$datejour2,$i,$STRUCTURED);}return $data;}
	function djelfad($data,$x,$y,$z) 
    {
	//$this->Image('../public/IMAGES/photos/pc.gif',250,50,30,30,0);
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230); 
	$this->SetDrawColor(0,0,0);
	$this->SetXY(90,40);$this->cell(65,5,'DAIRAS DE DJELFA',1,0,'C',1,0);
	$this->RoundedRect($x-15,35,155,200, 2, $style = '');$this->RoundedRect($x-15,35,200,200, 2, $style = '');
	$total1=$data['924']+$data['925'];//1dairas ain-oussera
	$this->color($total1);$this->Polygon(array((130+$x)/$z,(58+$y)/$z,(135+$x)/$z,(62+$y)/$z,(127+$x)/$z,(76+$y)/$z,(119+$x)/$z,(80+$y)/$z,(119+$x)/$z,(85+$y)/$z,(123+$x)/$z,(86+$y)/$z,(126+$x)/$z,(82+$y)/$z,(139+$x)/$z,(82+$y)/$z,(138+$x)/$z,(90+$y)/$z,(133+$x)/$z,(93+$y)/$z,(122+$x)/$z,(111+$y)/$z,(111+$x)/$z,(123+$y)/$z,(109+$x)/$z,(131+$y)/$z,(113+$x)/$z,(135+$y)/$z,(107+$x)/$z,(136+$y)/$z,(98+$x)/$z,(153+$y)/$z,(108+$x)/$z,(163+$y)/$z,(132+$x)/$z,(155+$y)/$z,(141+$x)/$z,(148+$y)/$z,(154+$x)/$z,(144+$y)/$z,(154+$x)/$z,(136+$y)/$z,(154+$x)/$z,(136+$y)/$z,(162+$x)/$z,(127+$y)/$z,(161+$x)/$z,(123+$y)/$z,(164+$x)/$z,(117+$y)/$z,(158+$x)/$z,(116+$y)/$z,(155+$x)/$z,(87+$y)/$z,(160+$x)/$z,(83+$y)/$z,(160+$x)/$z,(78+$y)/$z,(155+$x)/$z,(78+$y)/$z,(150+$x)/$z,(82+$y)/$z,(150+$x)/$z,(11+$y)/$z,(145+$x)/$z,(8+$y)/$z,(143+$x)/$z,(14+$y)/$z,(145+$x)/$z,(22+$y)/$z,(143+$x)/$z,(28+$y)/$z,(147+$x)/$z,(33+$y)/$z,(147+$x)/$z,(44+$y)/$z,(142+$x)/$z,(48+$y)/$z,(137+$x)/$z,(53+$y)/$z,(130+$x)/$z,(58+$y)/$z),'FD');														
	$total2=$data['929']+$data['931'];//2dairas birin
	$this->color($total2);$this->Polygon(array((150+$x)/$z,(11+$y)/$z,(150+$x)/$z,(82+$y)/$z,(155+$x)/$z,(78+$y)/$z,(160+$x)/$z,(78+$y)/$z,(160+$x)/$z,(83+$y)/$z,(155+$x)/$z,(87+$y)/$z,(158+$x)/$z,(116+$y)/$z,(164+$x)/$z,(117+$y)/$z,(161+$x)/$z,(123+$y)/$z,(162+$x)/$z,(127+$y)/$z,(172+$x)/$z,(123+$y)/$z,(179+$x)/$z,(119+$y)/$z,(191+$x)/$z,(105+$y)/$z,(200+$x)/$z,(98+$y)/$z,(194+$x)/$z,(78+$y)/$z,(204+$x)/$z,(75+$y)/$z,(224+$x)/$z,(68+$y)/$z,(243+$x)/$z,(53+$y)/$z,(221+$x)/$z,(30+$y)/$z,(220+$x)/$z,(22+$y)/$z,(212+$x)/$z,(22+$y)/$z,(207+$x)/$z,(14+$y)/$z,(205+$x)/$z,(9+$y)/$z,(198+$x)/$z,(14+$y)/$z,(197+$x)/$z,(25+$y)/$z,(191+$x)/$z,(36+$y)/$z,(185+$x)/$z,(36+$y)/$z,(181+$x)/$z,(38+$y)/$z,(173+$x)/$z,(50+$y)/$z,(172+$x)/$z,(38+$y)/$z,(170+$x)/$z,(25+$y)/$z,(165+$x)/$z,(23+$y)/$z,(161+$x)/$z,(6+$y)/$z,(150+$x)/$z,(11+$y)/$z),'FD');												
	$total3=$data['926']+$data['927']+$data['928'];	//3dairas sidilaadjel
	$this->color($total3);$this->Polygon(array((11+$x)/$z,(64+$y)/$z,(11+$x)/$z,(76+$y)/$z,(44+$x)/$z,(102+$y)/$z,(59+$x)/$z,(106+$y)/$z,(70+$x)/$z,(120+$y)/$z,(89+$x)/$z,(103+$y)/$z,(97+$x)/$z,(110+$y)/$z,(98+$x)/$z,(119+$y)/$z,(111+$x)/$z,(123+$y)/$z,(122+$x)/$z,(111+$y)/$z,(133+$x)/$z,(93+$y)/$z,(138+$x)/$z,(90+$y)/$z,(139+$x)/$z,(82+$y)/$z,(126+$x)/$z,(82+$y)/$z,(123+$x)/$z,(86+$y)/$z,(119+$x)/$z,(85+$y)/$z,(119+$x)/$z,(80+$y)/$z,(127+$x)/$z,(76+$y)/$z,(135+$x)/$z,(62+$y)/$z,(130+$x)/$z,(58+$y)/$z,(120+$x)/$z,(70+$y)/$z,(119+$x)/$z,(77+$y)/$z,(114+$x)/$z,(77+$y)/$z,(109+$x)/$z,(82+$y)/$z,(101+$x)/$z,(81+$y)/$z,(87+$x)/$z,(70+$y)/$z,(68+$x)/$z,(78+$y)/$z,(50+$x)/$z,(80+$y)/$z,(48+$x)/$z,(60+$y)/$z,(11+$x)/$z,(64+$y)/$z),'FD');							
	$total4=$data['932']+$data['933']+$data['934'];//4dairas had-sahari
	$this->color($total4);$this->Polygon(array((154+$x)/$z,(136+$y)/$z,(154+$x)/$z,(144+$y)/$z,(163+$x)/$z,(145+$y)/$z,(170+$x)/$z,(149+$y)/$z,(177+$x)/$z,(150+$y)/$z,(200+$x)/$z,(133+$y)/$z,(207+$x)/$z,(130+$y)/$z,(216+$x)/$z,(132+$y)/$z,(228+$x)/$z,(132+$y)/$z,(234+$x)/$z,(137+$y)/$z,(254+$x)/$z,(117+$y)/$z,(256+$x)/$z,(118+$y)/$z,(266+$x)/$z,(108+$y)/$z,(263+$x)/$z,(92+$y)/$z,(269+$x)/$z,(89+$y)/$z,(270+$x)/$z,(74+$y)/$z,(243+$x)/$z,(53+$y)/$z,(224+$x)/$z,(68+$y)/$z,(204+$x)/$z,(75+$y)/$z,(194+$x)/$z,(78+$y)/$z,(194+$x)/$z,(78+$y)/$z,(200+$x)/$z,(98+$y)/$z,(191+$x)/$z,(105+$y)/$z,(179+$x)/$z,(119+$y)/$z,(172+$x)/$z,(123+$y)/$z,(162+$x)/$z,(127+$y)/$z,(154+$x)/$z,(136+$y)/$z),'FD');			
	$total5=$data['935']+$data['939']+$data['941']+$data['940'];//5dairas hassi-bahbah
	$this->color($total5);$this->Polygon(array((108+$x)/$z,(163+$y)/$z,(102+$x)/$z,(167+$y)/$z,(89+$x)/$z,(168+$y)/$z,(85+$x)/$z,(172+$y)/$z,(81+$x)/$z,(193+$y)/$z,(114+$x)/$z,(198+$y)/$z,(118+$x)/$z,(196+$y)/$z,(123+$x)/$z,(196+$y)/$z,(127+$x)/$z,(204+$y)/$z,(128+$x)/$z,(215+$y)/$z,(133+$x)/$z,(221+$y)/$z,(138+$x)/$z,(222+$y)/$z,(139+$x)/$z,(232+$y)/$z,(142+$x)/$z,(237+$y)/$z,(141+$x)/$z,(242+$y)/$z,(145+$x)/$z,(245+$y)/$z,(142+$x)/$z,(256+$y)/$z,(155+$x)/$z,(259+$y)/$z,(164+$x)/$z,(249+$y)/$z,(174+$x)/$z,(243+$y)/$z,(173+$x)/$z,(227+$y)/$z,(178+$x)/$z,(224+$y)/$z,(183+$x)/$z,(223+$y)/$z,(189+$x)/$z,(223+$y)/$z,(189+$x)/$z,(217+$y)/$z,(193+$x)/$z,(212+$y)/$z,(201+$x)/$z,(210+$y)/$z,(205+$x)/$z,(208+$y)/$z,(217+$x)/$z,(197+$y)/$z,(207+$x)/$z,(194+$y)/$z,(203+$x)/$z,(183+$y)/$z,(197+$x)/$z,(183+$y)/$z,(191+$x)/$z,(177+$y)/$z,(214+$x)/$z,(164+$y)/$z,(222+$x)/$z,(164+$y)/$z,(222+$x)/$z,(150+$y)/$z,(233+$x)/$z,(137+$y)/$z,(228+$x)/$z,(132+$y)/$z,(216+$x)/$z,(132+$y)/$z,(207+$x)/$z,(130+$y)/$z,(200+$x)/$z,(133+$y)/$z,(177+$x)/$z,(150+$y)/$z,(170+$x)/$z,(149+$y)/$z,(163+$x)/$z,(145+$y)/$z,(154+$x)/$z,(144+$y)/$z,(141+$x)/$z,(148+$y)/$z,(132+$x)/$z,(155+$y)/$z,(108+$x)/$z,(163+$y)/$z),'FD');
	$total6=$data['942']+$data['946']+$data['947'];//6dairas darchioukh
	$this->color($total6);$this->Polygon(array((233+$x)/$z,(137+$y)/$z,(222+$x)/$z,(150+$y)/$z,(222+$x)/$z,(164+$y)/$z,(214+$x)/$z,(164+$y)/$z,(191+$x)/$z,(177+$y)/$z,(197+$x)/$z,(183+$y)/$z,(203+$x)/$z,(183+$y)/$z,(207+$x)/$z,(194+$y)/$z,(217+$x)/$z,(197+$y)/$z,(205+$x)/$z,(208+$y)/$z,(211+$x)/$z,(218+$y)/$z,(218+$x)/$z,(217+$y)/$z,(233+$x)/$z,(219+$y)/$z,(239+$x)/$z,(226+$y)/$z,(240+$x)/$z,(241+$y)/$z,(245+$x)/$z,(243+$y)/$z,(245+$x)/$z,(250+$y)/$z,(249+$x)/$z,(250+$y)/$z,(251+$x)/$z,(246+$y)/$z,(258+$x)/$z,(244+$y)/$z,(272+$x)/$z,(255+$y)/$z,(274+$x)/$z,(250+$y)/$z,(269+$x)/$z,(248+$y)/$z,(268+$x)/$z,(243+$y)/$z,(271+$x)/$z,(240+$y)/$z,(276+$x)/$z,(242+$y)/$z,(279+$x)/$z,(247+$y)/$z,(283+$x)/$z,(250+$y)/$z,(288+$x)/$z,(248+$y)/$z,(306+$x)/$z,(247+$y)/$z,(306+$x)/$z,(243+$y)/$z,(302+$x)/$z,(240+$y)/$z,(301+$x)/$z,(214+$y)/$z,(276+$x)/$z,(212+$y)/$z,(272+$x)/$z,(206+$y)/$z,(265+$x)/$z,(211+$y)/$z,(262+$x)/$z,(204+$y)/$z,(261+$x)/$z,(197+$y)/$z,(254+$x)/$z,(194+$y)/$z,(252+$x)/$z,(186+$y)/$z,(249+$x)/$z,(182+$y)/$z,(253+$x)/$z,(180+$y)/$z,(250+$x)/$z,(165+$y)/$z,(255+$x)/$z,(154+$y)/$z,(248+$x)/$z,(159+$y)/$z,(233+$x)/$z,(137+$y)/$z),'FD');
	$total7=$data['916'];//7djelfa
	$this->color($total7);$this->Polygon(array((173+$x)/$z,(227+$y)/$z,(174+$x)/$z,(243+$y)/$z,(177+$x)/$z,(248+$y)/$z,(184+$x)/$z,(251+$y)/$z,(185+$x)/$z,(256+$y)/$z,(188+$x)/$z,(260+$y)/$z,(194+$x)/$z,(258+$y)/$z,(201+$x)/$z,(263+$y)/$z,(214+$x)/$z,(255+$y)/$z,(212+$x)/$z,(240+$y)/$z,(217+$x)/$z,(230+$y)/$z,(215+$x)/$z,(220+$y)/$z,(218+$x)/$z,(217+$y)/$z,(211+$x)/$z,(218+$y)/$z,(205+$x)/$z,(208+$y)/$z,(201+$x)/$z,(210+$y)/$z,(193+$x)/$z,(212+$y)/$z,(189+$x)/$z,(217+$y)/$z,(189+$x)/$z,(223+$y)/$z,(183+$x)/$z,(223+$y)/$z,(178+$x)/$z,(224+$y)/$z,(173+$x)/$z,(227+$y)/$z),'FD');
	$total8=$data['917']+$data['964']+$data['963'];//8dairas idrissia
	$this->color($total8);$this->Polygon(array((67+$x)/$z,(278+$y)/$z,(72+$x)/$z,(289+$y)/$z,(77+$x)/$z,(305+$y)/$z,(85+$x)/$z,(320+$y)/$z,(91+$x)/$z,(325+$y)/$z,(93+$x)/$z,(333+$y)/$z,(100+$x)/$z,(334+$y)/$z,(102+$x)/$z,(339+$y)/$z,(107+$x)/$z,(343+$y)/$z,(111+$x)/$z,(343+$y)/$z,(118+$x)/$z,(344+$y)/$z,(126+$x)/$z,(338+$y)/$z,(134+$x)/$z,(339+$y)/$z,(132+$x)/$z,(332+$y)/$z,(143+$x)/$z,(315+$y)/$z,(137+$x)/$z,(311+$y)/$z,(133+$x)/$z,(313+$y)/$z,(131+$x)/$z,(310+$y)/$z,(127+$x)/$z,(311+$y)/$z,(127+$x)/$z,(303+$y)/$z,(132+$x)/$z,(299+$y)/$z,(129+$x)/$z,(297+$y)/$z,(128+$x)/$z,(288+$y)/$z,(123+$x)/$z,(288+$y)/$z,(115+$x)/$z,(285+$y)/$z,(110+$x)/$z,(289+$y)/$z,(100+$x)/$z,(285+$y)/$z,(100+$x)/$z,(280+$y)/$z,(106+$x)/$z,(277+$y)/$z,(107+$x)/$z,(273+$y)/$z,(101+$x)/$z,(273+$y)/$z,(95+$x)/$z,(269+$y)/$z,(96+$x)/$z,(261+$y)/$z,(78+$x)/$z,(265+$y)/$z,(77+$x)/$z,(275+$y)/$z,(67+$x)/$z,(278+$y)/$z),'FD');
	$total9=$data['920']+$data['919']+$data['923'];//9dairas charef
	$this->color($total9);$this->Polygon(array((81+$x)/$z,(193+$y)/$z,(74+$x)/$z,(209+$y)/$z,(62+$x)/$z,(211+$y)/$z,(65+$x)/$z,(227+$y)/$z,(67+$x)/$z,(278+$y)/$z,(77+$x)/$z,(275+$y)/$z,(78+$x)/$z,(265+$y)/$z,(96+$x)/$z,(261+$y)/$z,(95+$x)/$z,(269+$y)/$z,(101+$x)/$z,(273+$y)/$z,(107+$x)/$z,(273+$y)/$z,(106+$x)/$z,(277+$y)/$z,(100+$x)/$z,(280+$y)/$z,(100+$x)/$z,(285+$y)/$z,(110+$x)/$z,(289+$y)/$z,(115+$x)/$z,(285+$y)/$z,(123+$x)/$z,(288+$y)/$z,(128+$x)/$z,(288+$y)/$z,(128+$x)/$z,(283+$y)/$z,(129+$x)/$z,(280+$y)/$z,(133+$x)/$z,(279+$y)/$z,(138+$x)/$z,(282+$y)/$z,(145+$x)/$z,(277+$y)/$z,(152+$x)/$z,(269+$y)/$z,(157+$x)/$z,(264+$y)/$z,(155+$x)/$z,(259+$y)/$z,(142+$x)/$z,(256+$y)/$z,(145+$x)/$z,(245+$y)/$z,(141+$x)/$z,(242+$y)/$z,(142+$x)/$z,(237+$y)/$z,(139+$x)/$z,(232+$y)/$z,(138+$x)/$z,(222+$y)/$z,(133+$x)/$z,(221+$y)/$z,(128+$x)/$z,(215+$y)/$z,(128+$x)/$z,(215+$y)/$z,(127+$x)/$z,(204+$y)/$z,(123+$x)/$z,(196+$y)/$z,(118+$x)/$z,(196+$y)/$z,(114+$x)/$z,(198+$y)/$z,(81+$x)/$z,(193+$y)/$z),'FD');
	$total10=$data['965']+$data['958']+$data['962']+$data['957'];//10dairas ainelbel
	$this->color($total10);$this->Polygon(array((143+$x)/$z,(315+$y)/$z,(151+$x)/$z,(310+$y)/$z,(157+$x)/$z,(314+$y)/$z,(161+$x)/$z,(319+$y)/$z,(170+$x)/$z,(316+$y)/$z,(172+$x)/$z,(324+$y)/$z,(177+$x)/$z,(329+$y)/$z,(176+$x)/$z,(344+$y)/$z,(186+$x)/$z,(368+$y)/$z,(197+$x)/$z,(360+$y)/$z,(199+$x)/$z,(352+$y)/$z,(196+$x)/$z,(352+$y)/$z,(193+$x)/$z,(354+$y)/$z,(191+$x)/$z,(352+$y)/$z,(187+$x)/$z,(350+$y)/$z,(186+$x)/$z,(353+$y)/$z,(183+$x)/$z,(348+$y)/$z,(182+$x)/$z,(333+$y)/$z,(183+$x)/$z,(327+$y)/$z,(187+$x)/$z,(322+$y)/$z,(194+$x)/$z,(314+$y)/$z,(203+$x)/$z,(309+$y)/$z,(210+$x)/$z,(302+$y)/$z,(215+$x)/$z,(293+$y)/$z,(222+$x)/$z,(281+$y)/$z,(227+$x)/$z,(268+$y)/$z,(231+$x)/$z,(279+$y)/$z,(231+$x)/$z,(308+$y)/$z,(229+$x)/$z,(322+$y)/$z,(237+$x)/$z,(322+$y)/$z,(240+$x)/$z,(320+$y)/$z,(247+$x)/$z,(325+$y)/$z,(252+$x)/$z,(313+$y)/$z,(256+$x)/$z,(308+$y)/$z,(262+$x)/$z,(302+$y)/$z,(266+$x)/$z,(289+$y)/$z,(252+$x)/$z,(272+$y)/$z,(242+$x)/$z,(252+$y)/$z,(245+$x)/$z,(250+$y)/$z,(245+$x)/$z,(243+$y)/$z,(240+$x)/$z,(241+$y)/$z,(239+$x)/$z,(226+$y)/$z,(233+$x)/$z,(219+$y)/$z,(227+$x)/$z,(219+$y)/$z,(218+$x)/$z,(217+$y)/$z,(215+$x)/$z,(220+$y)/$z,(217+$x)/$z,(230+$y)/$z,(212+$x)/$z,(240+$y)/$z,(214+$x)/$z,(255+$y)/$z,(214+$x)/$z,(255+$y)/$z,(201+$x)/$z,(263+$y)/$z,(194+$x)/$z,(258+$y)/$z,(188+$x)/$z,(260+$y)/$z,(185+$x)/$z,(256+$y)/$z,(184+$x)/$z,(251+$y)/$z,(177+$x)/$z,(248+$y)/$z,(174+$x)/$z,(243+$y)/$z,(164+$x)/$z,(249+$y)/$z,(155+$x)/$z,(259+$y)/$z,(157+$x)/$z,(264+$y)/$z,(152+$x)/$z,(269+$y)/$z,(145+$x)/$z,(277+$y)/$z,(138+$x)/$z,(282+$y)/$z,(133+$x)/$z,(279+$y)/$z,(129+$x)/$z,(280+$y)/$z,(128+$x)/$z,(283+$y)/$z,(128+$x)/$z,(288+$y)/$z,(129+$x)/$z,(297+$y)/$z,(132+$x)/$z,(299+$y)/$z,(127+$x)/$z,(303+$y)/$z,(127+$x)/$z,(311+$y)/$z,(131+$x)/$z,(310+$y)/$z,(133+$x)/$z,(313+$y)/$z,(137+$x)/$z,(311+$y)/$z,(143+$x)/$z,(315+$y)/$z),'FD');
	$total11=$data['948']+$data['952']+$data['954']+$data['953']+$data['951'];//11dairas messaad//
	$this->color($total11);$this->Polygon(array((290+$x)/$z,(465+$y)/$z,(311+$x)/$z,(474+$y)/$z,(328+$x)/$z,(481+$y)/$z,(345+$x)/$z,(492+$y)/$z,(373+$x)/$z,(520+$y)/$z,(380+$x)/$z,(535+$y)/$z,(389+$x)/$z,(544+$y)/$z,(392+$x)/$z,(555+$y)/$z,(400+$x)/$z,(567+$y)/$z,(485+$x)/$z,(590+$y)/$z,(473+$x)/$z,(522+$y)/$z,(443+$x)/$z,(525+$y)/$z,(422+$x)/$z,(510+$y)/$z,(381+$x)/$z,(472+$y)/$z,(360+$x)/$z,(480+$y)/$z,(325+$x)/$z,(430+$y)/$z,(337+$x)/$z,(427+$y)/$z,(327+$x)/$z,(411+$y)/$z,(302+$x)/$z,(371+$y)/$z,(312+$x)/$z,(360+$y)/$z,(308+$x)/$z,(358+$y)/$z,(307+$x)/$z,(352+$y)/$z,(303+$x)/$z,(344+$y)/$z,(303+$x)/$z,(338+$y)/$z,(293+$x)/$z,(328+$y)/$z,(292+$x)/$z,(320+$y)/$z,(284+$x)/$z,(306+$y)/$z,(277+$x)/$z,(303+$y)/$z,(277+$x)/$z,(299+$y)/$z,(266+$x)/$z,(289+$y)/$z,(262+$x)/$z,(302+$y)/$z,(256+$x)/$z,(308+$y)/$z,(252+$x)/$z,(313+$y)/$z,(247+$x)/$z,(325+$y)/$z,(240+$x)/$z,(320+$y)/$z,(237+$x)/$z,(322+$y)/$z,(229+$x)/$z,(322+$y)/$z,(231+$x)/$z,(308+$y)/$z,(231+$x)/$z,(279+$y)/$z,(227+$x)/$z,(268+$y)/$z,(222+$x)/$z,(281+$y)/$z,(215+$x)/$z,(293+$y)/$z,(210+$x)/$z,(302+$y)/$z,(203+$x)/$z,(309+$y)/$z,(194+$x)/$z,(314+$y)/$z,(187+$x)/$z,(322+$y)/$z,(183+$x)/$z,(327+$y)/$z,(182+$x)/$z,(333+$y)/$z,(183+$x)/$z,(348+$y)/$z,(186+$x)/$z,(353+$y)/$z,(187+$x)/$z,(350+$y)/$z,(191+$x)/$z,(352+$y)/$z,(193+$x)/$z,(354+$y)/$z,(196+$x)/$z,(352+$y)/$z,(199+$x)/$z,(352+$y)/$z,(197+$x)/$z,(360+$y)/$z,(186+$x)/$z,(368+$y)/$z,(192+$x)/$z,(393+$y)/$z,(197+$x)/$z,(397+$y)/$z,(197+$x)/$z,(403+$y)/$z,(213+$x)/$z,(404+$y)/$z,(228+$x)/$z,(412+$y)/$z,(241+$x)/$z,(419+$y)/$z,(254+$x)/$z,(432+$y)/$z,(267+$x)/$z,(446+$y)/$z,(275+$x)/$z,(461+$y)/$z,(290+$x)/$z,(465+$y)/$z),'FD');
	$total12=$data['967']+$data['968']+$data['956'];//12dairas faid boutma
	$this->color($total12);$this->Polygon(array((306+$x)/$z,(247+$y)/$z,(288+$x)/$z,(248+$y)/$z,(283+$x)/$z,(250+$y)/$z,(279+$x)/$z,(247+$y)/$z,(276+$x)/$z,(242+$y)/$z,(271+$x)/$z,(240+$y)/$z,(268+$x)/$z,(243+$y)/$z,(269+$x)/$z,(248+$y)/$z,(274+$x)/$z,(250+$y)/$z,(272+$x)/$z,(255+$y)/$z,(258+$x)/$z,(244+$y)/$z,(251+$x)/$z,(246+$y)/$z,(249+$x)/$z,(250+$y)/$z,(245+$x)/$z,(250+$y)/$z,(242+$x)/$z,(252+$y)/$z,(252+$x)/$z,(272+$y)/$z,(266+$x)/$z,(289+$y)/$z,(277+$x)/$z,(299+$y)/$z,(277+$x)/$z,(303+$y)/$z,(284+$x)/$z,(306+$y)/$z,(292+$x)/$z,(320+$y)/$z,(293+$x)/$z,(328+$y)/$z,(303+$x)/$z,(338+$y)/$z,(303+$x)/$z,(344+$y)/$z,(307+$x)/$z,(352+$y)/$z,(308+$x)/$z,(358+$y)/$z,(312+$x)/$z,(360+$y)/$z,(302+$x)/$z,(371+$y)/$z,(327+$x)/$z,(411+$y)/$z,(337+$x)/$z,(427+$y)/$z,(325+$x)/$z,(430+$y)/$z,(360+$x)/$z,(480+$y)/$z,(381+$x)/$z,(472+$y)/$z,(422+$x)/$z,(510+$y)/$z,(443+$x)/$z,(525+$y)/$z,(473+$x)/$z,(522+$y)/$z,(473+$x)/$z,(498+$y)/$z,(489+$x)/$z,(463+$y)/$z,(486+$x)/$z,(449+$y)/$z,(493+$x)/$z,(442+$y)/$z,(473+$x)/$z,(434+$y)/$z,(462+$x)/$z,(434+$y)/$z,(458+$x)/$z,(424+$y)/$z,(443+$x)/$z,(425+$y)/$z,(439+$x)/$z,(418+$y)/$z,(435+$x)/$z,(420+$y)/$z,(432+$x)/$z,(416+$y)/$z,(419+$x)/$z,(416+$y)/$z,(416+$x)/$z,(414+$y)/$z,(411+$x)/$z,(405+$y)/$z,(407+$x)/$z,(402+$y)/$z,(398+$x)/$z,(398+$y)/$z,(384+$x)/$z,(395+$y)/$z,(378+$x)/$z,(389+$y)/$z,(364+$x)/$z,(384+$y)/$z,(356+$x)/$z,(378+$y)/$z,(356+$x)/$z,(374+$y)/$z,(369+$x)/$z,(373+$y)/$z,(379+$x)/$z,(360+$y)/$z,(388+$x)/$z,(360+$y)/$z,(386+$x)/$z,(353+$y)/$z,(372+$x)/$z,(354+$y)/$z,(366+$x)/$z,(349+$y)/$z,(367+$x)/$z,(342+$y)/$z,(364+$x)/$z,(338+$y)/$z,(359+$x)/$z,(338+$y)/$z,(358+$x)/$z,(335+$y)/$z,(349+$x)/$z,(338+$y)/$z,(348+$x)/$z,(332+$y)/$z,(343+$x)/$z,(329+$y)/$z,(348+$x)/$z,(323+$y)/$z,(342+$x)/$z,(322+$y)/$z,(342+$x)/$z,(317+$y)/$z,(337+$x)/$z,(317+$y)/$z,(340+$x)/$z,(312+$y)/$z,(331+$x)/$z,(308+$y)/$z,(329+$x)/$z,(302+$y)/$z,(324+$x)/$z,(302+$y)/$z,(316+$x)/$z,(298+$y)/$z,(317+$x)/$z,(280+$y)/$z,(306+$x)/$z,(247+$y)/$z),'FD');
	$this->RoundedRect($x-10,155,40,55, 2, $style = '');
	$this->color(0);     $this->SetXY($x-10,150);$this->cell(30,5,"",0,0,'C',0,0);
	$this->color(0);     $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 0",0,0,'L',0,0);
	$this->color(1);     $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 1-9",0,0,'L',0,0);
	$this->color(10);    $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 10-99",0,0,'L',0,0);
	$this->color(100);   $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 100-999",0,0,'L',0,0);
	$this->color(1000);  $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 1000+",0,0,'L',0,0);
	$this->color(0);     $this->SetXY($x-10,$this->GetY()+15);$this->cell(40,5,'00km_____45km_____90km',0,0,'L',0,0);
	$this->color(0);     $this->SetXY($x-10,$this->GetY()+5);$this->cell(40,5,'Source : Dr TIBA Redha  DSP DJELFA',0,0,'L',0,0);
	$this->color(0);
	$this->SetFont('Times', 'BIU', 8);
	$this->SetDrawColor(255,0,0);
	$this->SetXY(150,42);$this->cell(65,5,'Dairas De Djelfa',0,0,'C',0,0);
	$this->SetFont('Times', 'B', 8);
	$yy=165;
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'1-Ain el Ibel',0,0,'L',0,0);$this->color($total10);$this->cell(10,4,$total10,0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'2-Ain Oussera',0,0,'L',0,0);$this->color($total1);$this->cell(10,4,$total1,0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'3-Birine',0,0,'L',0,0);$this->color($total2);$this->cell(10,4,$total2,0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'4-Charef',0,0,'L',0,0);$this->color($total9);$this->cell(10,4,$total9,0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'5-Dar Chioukh',0,0,'L',0,0);$this->color($total6);$this->cell(10,4,$total6,0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'6-Djelfa',0,0,'L',0,0);$this->color($total7);$this->cell(10,4,$total7,0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'7-El Idrissia',0,0,'L',0,0);$this->color($total8);$this->cell(10,4,$total8,0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'8-Faidh el Botma',0,0,'L',0,0);$this->color($total12);$this->cell(10,4,$total12,0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'9-Had-Sahary',0,0,'L',0,0);$this->color($total4);$this->cell(10,4,$total4,0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'10-Hassi Bahbah',0,0,'L',0,0);$this->color($total5);$this->cell(10,4,$total5,0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'11-Messad',0,0,'L',0,0);$this->color($total11);$this->cell(10,4,$total11,0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'12-Sidi Ladjel',0,0,'L',0,0);$this->color($total3);$this->cell(10,4,$total3,0,0,'C',1,0);
	$this->SetDrawColor(0,0,0);
	$this->SetFont('Times', 'B', 6);
	$this->SetXY(55,107);$this->cell(65,5,'*1',0,0,'L',0,0);$this->SetXY(42,61);$this->cell(65,5,'*2',0,0,'L',0,0);$this->SetXY(59,45);$this->cell(65,5,'*3',0,0,'L',0,0);$this->SetXY(36,100);$this->cell(65,5,'*4',0,0,'L',0,0);$this->SetXY(66,86);$this->cell(65,5,'*5',0,0,'L',0,0);$this->SetXY(56,97);$this->cell(65,5,'*6',0,0,'L',0,0);$this->SetXY(27,110);$this->cell(65,5,'*7',0,0,'L',0,0);$this->SetXY(80,105);$this->cell(65,5,'*8',0,0,'L',0,0);$this->SetXY(62,61);$this->cell(65,5,'*9',0,0,'L',0,0);$this->SetXY(45,77);$this->cell(65,5,'*10',0,0,'L',0,0);$this->SetXY(68,122);$this->cell(65,5,'*11',0,0,'L',0,0);$this->SetXY(25,57);$this->cell(65,5,'*12',0,0,'L',0,0);											
	$this->SetDrawColor(0,0,0);
	$this->SetFont('Times', 'B', 10);
    }
	
   	function djelfac($data,$x,$y,$z) 
    {
	//$this->Image('../public/IMAGES/photos/pc.gif',250,50,30,30,0);
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230); 
	$this->SetDrawColor(0,0,0);
	$this->SetXY(90,40);$this->cell(65,5,'COMMUNES DE DJELFA',1,0,'C',1,0);
	$this->RoundedRect($x-15,35,155,200, 2, $style = '');$this->RoundedRect($x-15,35,200,200, 2, $style = '');
	$this->color($data['924']);$this->Polygon(array((130+$x)/$z,(58+$y)/$z,(135+$x)/$z,(62+$y)/$z,(127+$x)/$z,(76+$y)/$z,(119+$x)/$z,(80+$y)/$z,(119+$x)/$z,(85+$y)/$z,(123+$x)/$z,(86+$y)/$z,(126+$x)/$z,(82+$y)/$z,(139+$x)/$z,(82+$y)/$z,(138+$x)/$z,(90+$y)/$z,(133+$x)/$z,(93+$y)/$z,(122+$x)/$z,(111+$y)/$z,(154+$x)/$z,(136+$y)/$z,(162+$x)/$z,(127+$y)/$z,(161+$x)/$z,(123+$y)/$z,(164+$x)/$z,(117+$y)/$z,(158+$x)/$z,(116+$y)/$z,(155+$x)/$z,(87+$y)/$z,(160+$x)/$z,(83+$y)/$z,(160+$x)/$z,(78+$y)/$z ,(155+$x)/$z,(78+$y)/$z,(150+$x)/$z,(82+$y)/$z,(150+$x)/$z,(11+$y)/$z,(145+$x)/$z,(8+$y)/$z,(143+$x)/$z,(14+$y)/$z,(145+$x)/$z,(22+$y)/$z,(143+$x)/$z,(28+$y)/$z,(147+$x)/$z,(33+$y)/$z,(147+$x)/$z,(44+$y)/$z,(142+$x)/$z,(48+$y)/$z,(137+$x)/$z,(53+$y)/$z,(130+$x)/$z,(58+$y)/$z),'FD');
	$this->color($data['925']);$this->Polygon(array((111+$x)/$z,(123+$y)/$z,(109+$x)/$z,(131+$y)/$z,(113+$x)/$z,(135+$y)/$z,(107+$x)/$z,(136+$y)/$z,(98+$x)/$z,(153+$y)/$z,(108+$x)/$z,(163+$y)/$z,(132+$x)/$z,(155+$y)/$z,(141+$x)/$z,(148+$y)/$z,(154+$x)/$z,(144+$y)/$z,(154+$x)/$z,(136+$y)/$z,(122+$x)/$z,(111+$y)/$z,(111+$x)/$z,(123+$y)/$z),'FD');
	$this->color($data['929']);$this->Polygon(array((173+$x)/$z,(50+$y)/$z,(188+$x)/$z,(64+$y)/$z,(193+$x)/$z,(64+$y)/$z,(194+$x)/$z,(78+$y)/$z,(204+$x)/$z,(75+$y)/$z,(224+$x)/$z,(68+$y)/$z,(243+$x)/$z,(53+$y)/$z,(221+$x)/$z,(30+$y)/$z,(220+$x)/$z,(22+$y)/$z,(212+$x)/$z,(22+$y)/$z,(207+$x)/$z,(14+$y)/$z,(205+$x)/$z,(9+$y)/$z,(198+$x)/$z,(14+$y)/$z ,(197+$x)/$z,(25+$y)/$z ,(191+$x)/$z,(36+$y)/$z,(185+$x)/$z,(36+$y)/$z,(181+$x)/$z,(38+$y)/$z,(173+$x)/$z,(50+$y)/$z),'FD');
	$this->color($data['931']);$this->Polygon(array((150+$x)/$z,(11+$y)/$z,(150+$x)/$z,(82+$y)/$z,(155+$x)/$z,(78+$y)/$z,(160+$x)/$z,(78+$y)/$z,(160+$x)/$z,(83+$y)/$z,(155+$x)/$z,(87+$y)/$z,(158+$x)/$z,(116+$y)/$z,(164+$x)/$z,(117+$y)/$z,(161+$x)/$z,(123+$y)/$z,(162+$x)/$z,(127+$y)/$z,(172+$x)/$z,(123+$y)/$z,(179+$x)/$z,(119+$y)/$z,(191+$x)/$z,(105+$y)/$z,(200+$x)/$z,(98+$y)/$z,(194+$x)/$z,(78+$y)/$z,(193+$x)/$z,(64+$y)/$z,(188+$x)/$z,(64+$y)/$z,(173+$x)/$z,(50+$y)/$z,(172+$x)/$z,(38+$y)/$z,(170+$x)/$z,(25+$y)/$z,(165+$x)/$z,(23+$y)/$z,(161+$x)/$z,(6+$y)/$z,(150+$x)/$z,(11+$y)/$z),'FD');
	$this->color($data['926']);$this->Polygon(array((68+$x)/$z,(78+$y)/$z,(69+$x)/$z,(91+$y)/$z,(59+$x)/$z,(106+$y)/$z,(70+$x)/$z,(120+$y)/$z,(89+$x)/$z,(103+$y)/$z,(101+$x)/$z,(81+$y)/$z,(87+$x)/$z,(70+$y)/$z,(68+$x)/$z,(78+$y)/$z),'FD');
	$this->color($data['927']);$this->Polygon(array((11+$x)/$z,(64+$y)/$z,(48+$x)/$z,(60+$y)/$z,(50+$x)/$z,(80+$y)/$z,(68+$x)/$z,(78+$y)/$z,(69+$x)/$z,(91+$y)/$z,(59+$x)/$z,(106+$y)/$z,(44+$x)/$z,(102+$y)/$z,(11+$x)/$z,(76+$y)/$z,(11+$x)/$z,(64+$y)/$z),'FD');
	$this->color($data['928']);$this->Polygon(array((101+$x)/$z,(81+$y)/$z,(89+$x)/$z,(103+$y)/$z,(97+$x)/$z,(110+$y)/$z,(98+$x)/$z,(119+$y)/$z,(111+$x)/$z,(123+$y)/$z,(122+$x)/$z,(111+$y)/$z,(133+$x)/$z,(93+$y)/$z,(138+$x)/$z,(90+$y)/$z,(139+$x)/$z,(82+$y)/$z,(126+$x)/$z,(82+$y)/$z,(123+$x)/$z,(86+$y)/$z,(119+$x)/$z,(85+$y)/$z,(119+$x)/$z,(80+$y)/$z,(127+$x)/$z,(76+$y)/$z,(135+$x)/$z,(62+$y)/$z,(130+$x)/$z,(58+$y)/$z,(120+$x)/$z,(70+$y)/$z,(119+$x)/$z,(77+$y)/$z,(114+$x)/$z,(77+$y)/$z,(109+$x)/$z,(82+$y)/$z,(101+$x)/$z,(81+$y)/$z),'FD');	
	$this->color($data['932']);$this->Polygon(array((191+$x)/$z,(105+$y)/$z,(198+$x)/$z,(112+$y)/$z,(200+$x)/$z,(133+$y)/$z,(207+$x)/$z,(130+$y)/$z,(216+$x)/$z,(132+$y)/$z,(228+$x)/$z,(132+$y)/$z,(234+$x)/$z,(137+$y)/$z,(254+$x)/$z,(117+$y)/$z,(256+$x)/$z,(118+$y)/$z,(248+$x)/$z,(105+$y)/$z,(237+$x)/$z,(100+$y)/$z,(224+$x)/$z,(68+$y)/$z,(204+$x)/$z,(75+$y)/$z,(194+$x)/$z,(78+$y)/$z,(194+$x)/$z,(78+$y)/$z,(200+$x)/$z,(98+$y)/$z,(191+$x)/$z,(105+$y)/$z),'FD');
	$this->color($data['934']);$this->Polygon(array((243+$x)/$z,(53+$y)/$z,(224+$x)/$z,(68+$y)/$z,(237+$x)/$z,(100+$y)/$z,(248+$x)/$z,(105+$y)/$z,(256+$x)/$z,(118+$y)/$z,(266+$x)/$z,(108+$y)/$z,(263+$x)/$z,(92+$y)/$z,(269+$x)/$z,(89+$y)/$z,(270+$x)/$z,(74+$y)/$z,(243+$x)/$z,(53+$y)/$z),'FD');
	$this->color($data['933']);$this->Polygon(array((154+$x)/$z,(136+$y)/$z,(154+$x)/$z,(144+$y)/$z,(163+$x)/$z,(145+$y)/$z,(170+$x)/$z,(149+$y)/$z,(177+$x)/$z,(150+$y)/$z,(200+$x)/$z,(133+$y)/$z,(198+$x)/$z,(112+$y)/$z,(191+$x)/$z,(105+$y)/$z,(179+$x)/$z,(119+$y)/$z,(172+$x)/$z,(123+$y)/$z,(162+$x)/$z,(127+$y)/$z,(154+$x)/$z,(136+$y)/$z),'FD');
	$this->color($data['935']);$this->Polygon(array((108+$x)/$z,(163+$y)/$z,(113+$x)/$z,(171+$y)/$z,(124+$x)/$z,(171+$y)/$z,(125+$x)/$z,(180+$y)/$z,(139+$x)/$z,(181+$y)/$z,(152+$x)/$z,(185+$y)/$z,(157+$x)/$z,(195+$y)/$z,(159+$x)/$z,(200+$y)/$z,(176+$x)/$z,(192+$y)/$z,(181+$x)/$z,(188+$y)/$z,(179+$x)/$z,(183+$y)/$z,(185+$x)/$z,(181+$y)/$z,(191+$x)/$z,(177+$y)/$z,(184+$x)/$z,(173+$y)/$z,(187+$x)/$z,(170+$y)/$z,(181+$x)/$z,(163+$y)/$z,(177+$x)/$z,(156+$y)/$z,(177+$x)/$z,(150+$y)/$z,(170+$x)/$z,(149+$y)/$z,(163+$x)/$z,(145+$y)/$z,(154+$x)/$z,(144+$y)/$z,(141+$x)/$z,(148+$y)/$z,(132+$x)/$z,(155+$y)/$z,(108+$x)/$z,(163+$y)/$z),'FD');
	$this->color($data['939']);$this->Polygon(array((108+$x)/$z,(163+$y)/$z,(102+$x)/$z,(167+$y)/$z,(89+$x)/$z,(168+$y)/$z,(85+$x)/$z,(172+$y)/$z,(81+$x)/$z,(193+$y)/$z,(114+$x)/$z,(198+$y)/$z,(118+$x)/$z,(196+$y)/$z,(123+$x)/$z,(196+$y)/$z,(127+$x)/$z,(204+$y)/$z,(128+$x)/$z,(215+$y)/$z,(133+$x)/$z,(221+$y)/$z,(138+$x)/$z,(222+$y)/$z,(139+$x)/$z,(232+$y)/$z,(142+$x)/$z,(237+$y)/$z,(141+$x)/$z,(242+$y)/$z,(145+$x)/$z,(245+$y)/$z,(142+$x)/$z,(256+$y)/$z,(155+$x)/$z,(259+$y)/$z,(164+$x)/$z,(249+$y)/$z,(174+$x)/$z,(243+$y)/$z,(173+$x)/$z,(227+$y)/$z,(164+$x)/$z,(223+$y)/$z,(170+$x)/$z,(214+$y)/$z,(159+$x)/$z,(200+$y)/$z,(157+$x)/$z,(195+$y)/$z,(152+$x)/$z,(185+$y)/$z,(139+$x)/$z,(181+$y)/$z,(125+$x)/$z,(180+$y)/$z,(124+$x)/$z,(171+$y)/$z,(113+$x)/$z,(171+$y)/$z,(108+$x)/$z,(163+$y)/$z),'FD');
	$this->color($data['940']);$this->Polygon(array((177+$x)/$z,(150+$y)/$z,(177+$x)/$z,(156+$y)/$z,(181+$x)/$z,(163+$y)/$z,(187+$x)/$z,(170+$y)/$z,(184+$x)/$z,(173+$y)/$z,(191+$x)/$z,(177+$y)/$z,(214+$x)/$z,(164+$y)/$z,(222+$x)/$z,(164+$y)/$z,(222+$x)/$z,(150+$y)/$z,(233+$x)/$z,(137+$y)/$z,(228+$x)/$z,(132+$y)/$z,(216+$x)/$z,(132+$y)/$z,(207+$x)/$z,(130+$y)/$z,(200+$x)/$z,(133+$y)/$z,(177+$x)/$z,(150+$y)/$z),'FD');
	$this->color($data['941']);$this->Polygon(array((217+$x)/$z,(197+$y)/$z,(207+$x)/$z,(194+$y)/$z,(203+$x)/$z,(183+$y)/$z,(197+$x)/$z,(183+$y)/$z,(191+$x)/$z,(177+$y)/$z,(185+$x)/$z,(181+$y)/$z,(179+$x)/$z,(183+$y)/$z,(181+$x)/$z,(188+$y)/$z,(176+$x)/$z,(192+$y)/$z,(159+$x)/$z,(200+$y)/$z,(170+$x)/$z,(214+$y)/$z,(164+$x)/$z,(223+$y)/$z,(173+$x)/$z,(227+$y)/$z,(178+$x)/$z,(224+$y)/$z,(183+$x)/$z,(223+$y)/$z,(189+$x)/$z,(223+$y)/$z,(189+$x)/$z,(217+$y)/$z,(193+$x)/$z,(212+$y)/$z,(201+$x)/$z,(210+$y)/$z,(205+$x)/$z,(208+$y)/$z,(217+$x)/$z,(197+$y)/$z),'FD');
	$this->color($data['942']);$this->Polygon(array((205+$x)/$z,(208+$y)/$z,(211+$x)/$z,(218+$y)/$z,(218+$x)/$z,(217+$y)/$z,(221+$x)/$z,(211+$y)/$z,(227+$x)/$z,(208+$y)/$z,(237+$x)/$z,(208+$y)/$z,(240+$x)/$z,(201+$y)/$z,(248+$x)/$z,(198+$y)/$z,(254+$x)/$z,(194+$y)/$z,(252+$x)/$z,(186+$y)/$z,(249+$x)/$z,(182+$y)/$z,(253+$x)/$z,(180+$y)/$z,(250+$x)/$z,(165+$y)/$z,(226+$x)/$z,(187+$y)/$z,(226+$x)/$z,(194+$y)/$z,(217+$x)/$z,(197+$y)/$z,(205+$x)/$z,(208+$y)/$z),'FD');
	$this->color($data['946']);$this->Polygon(array((254+$x)/$z,(194+$y)/$z,(248+$x)/$z,(198+$y)/$z,(240+$x)/$z,(201+$y)/$z,(237+$x)/$z,(208+$y)/$z,(227+$x)/$z,(208+$y)/$z,(221+$x)/$z,(211+$y)/$z,(218+$x)/$z,(217+$y)/$z,(227+$x)/$z,(219+$y)/$z,(233+$x)/$z,(219+$y)/$z,(239+$x)/$z,(226+$y)/$z,(240+$x)/$z,(241+$y)/$z,(245+$x)/$z,(243+$y)/$z,(245+$x)/$z,(250+$y)/$z,(249+$x)/$z,(250+$y)/$z,(251+$x)/$z,(246+$y)/$z,(258+$x)/$z,(244+$y)/$z,(272+$x)/$z,(255+$y)/$z,(274+$x)/$z,(250+$y)/$z,(269+$x)/$z,(248+$y)/$z,(268+$x)/$z,(243+$y)/$z,(271+$x)/$z,(240+$y)/$z,(276+$x)/$z,(242+$y)/$z,(279+$x)/$z,(247+$y)/$z,(283+$x)/$z,(250+$y)/$z,(288+$x)/$z,(248+$y)/$z,(306+$x)/$z,(247+$y)/$z,(306+$x)/$z,(243+$y)/$z,(302+$x)/$z,(240+$y)/$z,(301+$x)/$z,(214+$y)/$z,(276+$x)/$z,(212+$y)/$z,(272+$x)/$z,(206+$y)/$z,(265+$x)/$z,(211+$y)/$z,(262+$x)/$z,(204+$y)/$z,(261+$x)/$z,(197+$y)/$z,(254+$x)/$z,(194+$y)/$z),'FD');
	$this->color($data['947']);$this->Polygon(array((233+$x)/$z,(137+$y)/$z,(222+$x)/$z,(150+$y)/$z,(222+$x)/$z,(164+$y)/$z,(214+$x)/$z,(164+$y)/$z,(191+$x)/$z,(177+$y)/$z,(197+$x)/$z,(183+$y)/$z,(203+$x)/$z,(183+$y)/$z,(207+$x)/$z,(194+$y)/$z,(217+$x)/$z,(197+$y)/$z,(226+$x)/$z,(194+$y)/$z,(226+$x)/$z,(187+$y)/$z,(250+$x)/$z,(165+$y)/$z,(255+$x)/$z,(154+$y)/$z,(248+$x)/$z,(159+$y)/$z,(233+$x)/$z,(137+$y)/$z),'FD');
	$this->color($data['916']);$this->Polygon(array((173+$x)/$z,(227+$y)/$z,(174+$x)/$z,(243+$y)/$z,(177+$x)/$z,(248+$y)/$z,(184+$x)/$z,(251+$y)/$z,(185+$x)/$z,(256+$y)/$z,(188+$x)/$z,(260+$y)/$z,(194+$x)/$z,(258+$y)/$z,(201+$x)/$z,(263+$y)/$z,(214+$x)/$z,(255+$y)/$z,(212+$x)/$z,(240+$y)/$z,(217+$x)/$z,(230+$y)/$z,(215+$x)/$z,(220+$y)/$z,(218+$x)/$z,(217+$y)/$z,(211+$x)/$z,(218+$y)/$z,(205+$x)/$z,(208+$y)/$z,(201+$x)/$z,(210+$y)/$z,(193+$x)/$z,(212+$y)/$z,(189+$x)/$z,(217+$y)/$z,(189+$x)/$z,(223+$y)/$z,(183+$x)/$z,(223+$y)/$z,(178+$x)/$z,(224+$y)/$z,(173+$x)/$z,(227+$y)/$z),'FD');
	$this->color($data['917']);$this->Polygon(array((67+$x)/$z,(278+$y)/$z,(72+$x)/$z,(289+$y)/$z,(77+$x)/$z,(305+$y)/$z,(88+$x)/$z,(304+$y)/$z,(92+$x)/$z,(300+$y)/$z,(110+$x)/$z,(289+$y)/$z,(100+$x)/$z,(285+$y)/$z,(100+$x)/$z,(280+$y)/$z,(106+$x)/$z,(277+$y)/$z,(107+$x)/$z,(273+$y)/$z,(101+$x)/$z,(273+$y)/$z,(95+$x)/$z,(269+$y)/$z,(96+$x)/$z,(261+$y)/$z,(78+$x)/$z,(265+$y)/$z,(77+$x)/$z,(275+$y)/$z,(67+$x)/$z,(278+$y)/$z),'FD');
	$this->color($data['963']);$this->Polygon(array((111+$x)/$z,(343+$y)/$z,(118+$x)/$z,(344+$y)/$z,(126+$x)/$z,(338+$y)/$z,(134+$x)/$z,(339+$y)/$z,(132+$x)/$z,(332+$y)/$z,(143+$x)/$z,(315+$y)/$z,(137+$x)/$z,(311+$y)/$z,(133+$x)/$z,(313+$y)/$z,(131+$x)/$z,(310+$y)/$z,(127+$x)/$z,(311+$y)/$z,(127+$x)/$z,(303+$y)/$z,(132+$x)/$z,(299+$y)/$z,(129+$x)/$z,(297+$y)/$z,(128+$x)/$z,(288+$y)/$z,(123+$x)/$z,(288+$y)/$z,(115+$x)/$z,(285+$y)/$z,(110+$x)/$z,(289+$y)/$z,(92+$x)/$z,(300+$y)/$z,(95+$x)/$z,(304+$y)/$z,(101+$x)/$z,(306+$y)/$z,(106+$x)/$z,(307+$y)/$z,(105+$x)/$z,(318+$y)/$z,(105+$x)/$z,(329+$y)/$z,(108+$x)/$z,(332+$y)/$z,(111+$x)/$z,(343+$y)/$z),'FD');
	$this->color($data['964']);$this->Polygon(array((77+$x)/$z,(305+$y)/$z,(85+$x)/$z,(320+$y)/$z,(91+$x)/$z,(325+$y)/$z,(93+$x)/$z,(333+$y)/$z,(100+$x)/$z,(334+$y)/$z,(102+$x)/$z,(339+$y)/$z,(107+$x)/$z,(343+$y)/$z,(111+$x)/$z,(343+$y)/$z,(108+$x)/$z,(332+$y)/$z,(105+$x)/$z,(329+$y)/$z,(105+$x)/$z,(318+$y)/$z,(106+$x)/$z,(307+$y)/$z,(101+$x)/$z,(306+$y)/$z,(95+$x)/$z,(304+$y)/$z,(92+$x)/$z,(300+$y)/$z,(88+$x)/$z,(304+$y)/$z,(77+$x)/$z,(305+$y)/$z),'FD');
	$this->color($data['920']);$this->Polygon(array((110+$x)/$z,(289+$y)/$z,(115+$x)/$z,(285+$y)/$z,(115+$x)/$z,(279+$y)/$z,(121+$x)/$z,(272+$y)/$z,(137+$x)/$z,(263+$y)/$z,(142+$x)/$z,(256+$y)/$z,(145+$x)/$z,(245+$y)/$z,(141+$x)/$z,(242+$y)/$z,(142+$x)/$z,(237+$y)/$z,(139+$x)/$z,(232+$y)/$z,(138+$x)/$z,(222+$y)/$z,(133+$x)/$z,(221+$y)/$z,(128+$x)/$z,(215+$y)/$z,(118+$x)/$z,(228+$y)/$z,(113+$x)/$z,(239+$y)/$z,(96+$x)/$z,(253+$y)/$z,(96+$x)/$z,(261+$y)/$z,(95+$x)/$z,(269+$y)/$z,(101+$x)/$z,(273+$y)/$z,(107+$x)/$z,(273+$y)/$z,(106+$x)/$z,(277+$y)/$z,(100+$x)/$z,(280+$y)/$z,(100+$x)/$z,(285+$y)/$z,(110+$x)/$z,(289+$y)/$z),'FD');
	$this->color($data['919']);$this->Polygon(array((81+$x)/$z,(193+$y)/$z,(74+$x)/$z,(209+$y)/$z,(62+$x)/$z,(211+$y)/$z,(65+$x)/$z,(227+$y)/$z,(67+$x)/$z,(278+$y)/$z,(77+$x)/$z,(275+$y)/$z,(78+$x)/$z,(265+$y)/$z,(96+$x)/$z,(261+$y)/$z,(96+$x)/$z,(253+$y)/$z,(113+$x)/$z,(239+$y)/$z,(118+$x)/$z,(228+$y)/$z,(128+$x)/$z,(215+$y)/$z,(127+$x)/$z,(204+$y)/$z,(123+$x)/$z,(196+$y)/$z,(118+$x)/$z,(196+$y)/$z,(114+$x)/$z,(198+$y)/$z,(81+$x)/$z,(193+$y)/$z),'FD');
	$this->color($data['923']);$this->Polygon(array((115+$x)/$z,(285+$y)/$z,(123+$x)/$z,(288+$y)/$z,(128+$x)/$z,(288+$y)/$z,(128+$x)/$z,(283+$y)/$z,(129+$x)/$z,(280+$y)/$z,(133+$x)/$z,(279+$y)/$z,(138+$x)/$z,(282+$y)/$z,(145+$x)/$z,(277+$y)/$z,(152+$x)/$z,(269+$y)/$z,(157+$x)/$z,(264+$y)/$z,(155+$x)/$z,(259+$y)/$z,(142+$x)/$z,(256+$y)/$z,(137+$x)/$z,(263+$y)/$z,(121+$x)/$z,(272+$y)/$z,(115+$x)/$z,(279+$y)/$z,(115+$x)/$z,(285+$y)/$z),'FD');
	$this->color($data['958']);$this->Polygon(array((155+$x)/$z,(259+$y)/$z,(157+$x)/$z,(264+$y)/$z,(162+$x)/$z,(261+$y)/$z,(170+$x)/$z,(260+$y)/$z,(175+$x)/$z,(254+$y)/$z,(180+$x)/$z,(257+$y)/$z,(180+$x)/$z,(265+$y)/$z,(180+$x)/$z,(280+$y)/$z,(176+$x)/$z,(281+$y)/$z,(177+$x)/$z,(289+$y)/$z,(181+$x)/$z,(293+$y)/$z,(181+$x)/$z,(299+$y)/$z,(177+$x)/$z,(302+$y)/$z,(177+$x)/$z,(307+$y)/$z,(187+$x)/$z,(322+$y)/$z,(194+$x)/$z,(314+$y)/$z,(203+$x)/$z,(309+$y)/$z,(210+$x)/$z,(302+$y)/$z,(207+$x)/$z,(296+$y)/$z,(209+$x)/$z,(291+$y)/$z,(206+$x)/$z,(283+$y)/$z,(200+$x)/$z,(282+$y)/$z,(201+$x)/$z,(277+$y)/$z,(211+$x)/$z,(273+$y)/$z,(212+$x)/$z,(259+$y)/$z,(214+$x)/$z,(255+$y)/$z,(201+$x)/$z,(263+$y)/$z,(194+$x)/$z,(258+$y)/$z,(188+$x)/$z,(260+$y)/$z,(185+$x)/$z,(256+$y)/$z,(184+$x)/$z,(251+$y)/$z,(177+$x)/$z,(248+$y)/$z,(174+$x)/$z,(243+$y)/$z,(164+$x)/$z,(249+$y)/$z,(155+$x)/$z,(259+$y)/$z),'FD');
	$this->color($data['957']);$this->Polygon(array((218+$x)/$z,(217+$y)/$z,(215+$x)/$z,(220+$y)/$z,(217+$x)/$z,(230+$y)/$z,(212+$x)/$z,(240+$y)/$z,(214+$x)/$z,(255+$y)/$z,(222+$x)/$z,(248+$y)/$z,(233+$x)/$z,(257+$y)/$z,(232+$x)/$z,(271+$y)/$z,(231+$x)/$z,(279+$y)/$z,(231+$x)/$z,(308+$y)/$z,(229+$x)/$z,(322+$y)/$z,(237+$x)/$z,(322+$y)/$z,(240+$x)/$z,(320+$y)/$z,(247+$x)/$z,(325+$y)/$z,(252+$x)/$z,(313+$y)/$z,(256+$x)/$z,(308+$y)/$z,(262+$x)/$z,(302+$y)/$z,(266+$x)/$z,(289+$y)/$z,(252+$x)/$z,(272+$y)/$z,(242+$x)/$z,(252+$y)/$z,(245+$x)/$z,(250+$y)/$z,(245+$x)/$z,(243+$y)/$z,(240+$x)/$z,(241+$y)/$z,(239+$x)/$z,(226+$y)/$z,(233+$x)/$z,(219+$y)/$z,(227+$x)/$z,(219+$y)/$z,(218+$x)/$z,(217+$y)/$z),'FD');
	$this->color($data['965']);$this->Polygon(array((143+$x)/$z,(315+$y)/$z,(151+$x)/$z,(310+$y)/$z,(157+$x)/$z,(314+$y)/$z,(161+$x)/$z,(319+$y)/$z,(170+$x)/$z,(316+$y)/$z,(172+$x)/$z,(324+$y)/$z,(177+$x)/$z,(329+$y)/$z,(176+$x)/$z,(344+$y)/$z,(186+$x)/$z,(368+$y)/$z,(197+$x)/$z,(360+$y)/$z,(199+$x)/$z,(352+$y)/$z,(196+$x)/$z,(352+$y)/$z,(193+$x)/$z,(354+$y)/$z,(191+$x)/$z,(352+$y)/$z,(187+$x)/$z,(350+$y)/$z,(186+$x)/$z,(353+$y)/$z,(183+$x)/$z,(348+$y)/$z,(182+$x)/$z,(333+$y)/$z,(183+$x)/$z,(327+$y)/$z,(187+$x)/$z,(322+$y)/$z,(177+$x)/$z,(307+$y)/$z,(177+$x)/$z,(302+$y)/$z,(181+$x)/$z,(299+$y)/$z,(181+$x)/$z,(293+$y)/$z,(177+$x)/$z,(289+$y)/$z,(176+$x)/$z,(281+$y)/$z,(180+$x)/$z,(280+$y)/$z,(180+$x)/$z,(265+$y)/$z,(180+$x)/$z,(257+$y)/$z,(175+$x)/$z,(254+$y)/$z,(170+$x)/$z,(260+$y)/$z,(162+$x)/$z,(261+$y)/$z,(157+$x)/$z,(264+$y)/$z,(152+$x)/$z,(269+$y)/$z,(145+$x)/$z,(277+$y)/$z,(138+$x)/$z,(282+$y)/$z,(133+$x)/$z,(279+$y)/$z,(129+$x)/$z,(280+$y)/$z,(128+$x)/$z,(283+$y)/$z,(128+$x)/$z,(288+$y)/$z,(129+$x)/$z,(297+$y)/$z,(132+$x)/$z,(299+$y)/$z,(127+$x)/$z,(303+$y)/$z,(127+$x)/$z,(311+$y)/$z,(131+$x)/$z,(310+$y)/$z,(133+$x)/$z,(313+$y)/$z,(137+$x)/$z,(311+$y)/$z,(143+$x)/$z,(315+$y)/$z),'FD');
	$this->color($data['962']);$this->Polygon(array((214+$x)/$z,(255+$y)/$z,(212+$x)/$z,(259+$y)/$z,(211+$x)/$z,(273+$y)/$z,(201+$x)/$z,(277+$y)/$z,(200+$x)/$z,(282+$y)/$z,(206+$x)/$z,(283+$y)/$z,(209+$x)/$z,(291+$y)/$z,(207+$x)/$z,(296+$y)/$z,(210+$x)/$z,(302+$y)/$z,(215+$x)/$z,(293+$y)/$z,(222+$x)/$z,(281+$y)/$z,(227+$x)/$z,(268+$y)/$z,(231+$x)/$z,(279+$y)/$z,(232+$x)/$z,(271+$y)/$z,(233+$x)/$z,(257+$y)/$z,(222+$x)/$z,(248+$y)/$z,(214+$x)/$z,(255+$y)/$z),'FD');
	$this->color($data['948']);$this->Polygon(array((247+$x)/$z,(325+$y)/$z,(251+$x)/$z,(333+$y)/$z,(252+$x)/$z,(342+$y)/$z,(249+$x)/$z,(346+$y)/$z,(246+$x)/$z,(349+$y)/$z,(242+$x)/$z,(352+$y)/$z,(240+$x)/$z,(346+$y)/$z,(234+$x)/$z,(340+$y)/$z,(230+$x)/$z,(334+$y)/$z,(229+$x)/$z,(322+$y)/$z,(237+$x)/$z,(322+$y)/$z,(240+$x)/$z,(320+$y)/$z,(247+$x)/$z,(325+$y)/$z),'FD');
	$this->color($data['952']);$this->Polygon(array((301+$x)/$z,(446+$y)/$z,(314+$x)/$z,(429+$y)/$z,(264+$x)/$z,(395+$y)/$z,(262+$x)/$z,(389+$y)/$z,(250+$x)/$z,(380+$y)/$z,(242+$x)/$z,(352+$y)/$z,(240+$x)/$z,(346+$y)/$z,(234+$x)/$z,(340+$y)/$z,(230+$x)/$z,(334+$y)/$z,(229+$x)/$z,(322+$y)/$z,(231+$x)/$z,(308+$y)/$z,(231+$x)/$z,(279+$y)/$z,(227+$x)/$z,(268+$y)/$z,(222+$x)/$z,(281+$y)/$z,(215+$x)/$z,(293+$y)/$z,(210+$x)/$z,(302+$y)/$z,(203+$x)/$z,(309+$y)/$z,(194+$x)/$z,(314+$y)/$z,(187+$x)/$z,(322+$y)/$z,(183+$x)/$z,(327+$y)/$z,(182+$x)/$z,(333+$y)/$z,(183+$x)/$z,(348+$y)/$z,(186+$x)/$z,(353+$y)/$z,(187+$x)/$z,(350+$y)/$z,(191+$x)/$z,(352+$y)/$z,(193+$x)/$z,(354+$y)/$z,(196+$x)/$z,(352+$y)/$z,(199+$x)/$z,(352+$y)/$z,(197+$x)/$z,(360+$y)/$z,(186+$x)/$z,(368+$y)/$z,(197+$x)/$z,(372+$y)/$z,(203+$x)/$z,(372+$y)/$z,(207+$x)/$z,(370+$y)/$z,(211+$x)/$z,(372+$y)/$z,(216+$x)/$z,(380+$y)/$z,(223+$x)/$z,(381+$y)/$z,(237+$x)/$z,(399+$y)/$z,(260+$x)/$z,(411+$y)/$z,(301+$x)/$z,(446+$y)/$z),'FD');
	$this->color($data['954']);$this->Polygon(array((314+$x)/$z,(429+$y)/$z,(327+$x)/$z,(411+$y)/$z,(302+$x)/$z,(371+$y)/$z,(312+$x)/$z,(360+$y)/$z,(308+$x)/$z,(358+$y)/$z,(307+$x)/$z,(352+$y)/$z,(303+$x)/$z,(344+$y)/$z,(303+$x)/$z,(338+$y)/$z,(293+$x)/$z,(328+$y)/$z,(292+$x)/$z,(320+$y)/$z,(284+$x)/$z,(306+$y)/$z,(277+$x)/$z,(303+$y)/$z,(277+$x)/$z,(299+$y)/$z,(266+$x)/$z,(289+$y)/$z,(262+$x)/$z,(302+$y)/$z,(256+$x)/$z,(308+$y)/$z,(252+$x)/$z,(313+$y)/$z,(247+$x)/$z,(325+$y)/$z,(251+$x)/$z,(333+$y)/$z,(252+$x)/$z,(342+$y)/$z,(249+$x)/$z,(346+$y)/$z,(246+$x)/$z,(349+$y)/$z,(242+$x)/$z,(352+$y)/$z,(250+$x)/$z,(380+$y)/$z,(262+$x)/$z,(389+$y)/$z,(264+$x)/$z,(395+$y)/$z,(314+$x)/$z,(429+$y)/$z),'FD');
	$this->color($data['953']);$this->Polygon(array((186+$x)/$z,(368+$y)/$z,(192+$x)/$z,(393+$y)/$z,(197+$x)/$z,(397+$y)/$z,(197+$x)/$z,(403+$y)/$z,(213+$x)/$z,(404+$y)/$z,(228+$x)/$z,(412+$y)/$z,(241+$x)/$z,(419+$y)/$z,(254+$x)/$z,(432+$y)/$z,(267+$x)/$z,(446+$y)/$z,(275+$x)/$z,(461+$y)/$z,(290+$x)/$z,(465+$y)/$z,(301+$x)/$z,(446+$y)/$z,(260+$x)/$z,(411+$y)/$z,(237+$x)/$z,(399+$y)/$z,(223+$x)/$z,(381+$y)/$z,(216+$x)/$z,(380+$y)/$z,(211+$x)/$z,(372+$y)/$z,(207+$x)/$z,(370+$y)/$z,(203+$x)/$z,(372+$y)/$z,(197+$x)/$z,(372+$y)/$z,(186+$x)/$z,(368+$y)/$z),'FD');
	$this->color($data['951']);$this->Polygon(array((290+$x)/$z,(465+$y)/$z,(311+$x)/$z,(474+$y)/$z,(328+$x)/$z,(481+$y)/$z,(345+$x)/$z,(492+$y)/$z,(373+$x)/$z,(520+$y)/$z,(380+$x)/$z,(535+$y)/$z,(389+$x)/$z,(544+$y)/$z,(392+$x)/$z,(555+$y)/$z,(400+$x)/$z,(567+$y)/$z,(485+$x)/$z,(590+$y)/$z,(473+$x)/$z,(522+$y)/$z,(443+$x)/$z,(525+$y)/$z,(422+$x)/$z,(510+$y)/$z,(381+$x)/$z,(472+$y)/$z,(360+$x)/$z,(480+$y)/$z,(325+$x)/$z,(430+$y)/$z,(337+$x)/$z,(427+$y)/$z,(327+$x)/$z,(411+$y)/$z,(314+$x)/$z,(429+$y)/$z,(301+$x)/$z,(446+$y)/$z,(290+$x)/$z,(465+$y)/$z),'FD');
	$this->color($data['967']);$this->Polygon(array((306+$x)/$z,(247+$y)/$z,(288+$x)/$z,(248+$y)/$z,(283+$x)/$z,(250+$y)/$z,(279+$x)/$z,(247+$y)/$z,(276+$x)/$z,(242+$y)/$z,(271+$x)/$z,(240+$y)/$z,(268+$x)/$z,(243+$y)/$z,(269+$x)/$z,(248+$y)/$z,(274+$x)/$z,(250+$y)/$z,(272+$x)/$z,(255+$y)/$z,(258+$x)/$z,(244+$y)/$z,(251+$x)/$z,(246+$y)/$z,(249+$x)/$z,(250+$y)/$z,(245+$x)/$z,(250+$y)/$z,(242+$x)/$z,(252+$y)/$z,(252+$x)/$z,(272+$y)/$z,(266+$x)/$z,(289+$y)/$z,(277+$x)/$z,(299+$y)/$z,(277+$x)/$z,(303+$y)/$z,(284+$x)/$z,(306+$y)/$z,(298+$x)/$z,(295+$y)/$z,(301+$x)/$z,(291+$y)/$z,(310+$x)/$z,(288+$y)/$z,(317+$x)/$z,(280+$y)/$z,(303+$x)/$z,(262+$y)/$z,(306+$x)/$z,(247+$y)/$z),'FD');
	$this->color($data['968']);$this->Polygon(array((367+$x)/$z,(342+$y)/$z,(364+$x)/$z,(338+$y)/$z,(359+$x)/$z,(338+$y)/$z,(358+$x)/$z,(335+$y)/$z,(349+$x)/$z,(338+$y)/$z,(348+$x)/$z,(332+$y)/$z,(343+$x)/$z,(329+$y)/$z,(348+$x)/$z,(323+$y)/$z,(342+$x)/$z,(322+$y)/$z,(342+$x)/$z,(317+$y)/$z,(337+$x)/$z,(317+$y)/$z,(340+$x)/$z,(312+$y)/$z,(331+$x)/$z,(308+$y)/$z,(329+$x)/$z,(302+$y)/$z,(324+$x)/$z,(302+$y)/$z,(316+$x)/$z,(298+$y)/$z,(317+$x)/$z,(280+$y)/$z,(310+$x)/$z,(288+$y)/$z,(301+$x)/$z,(291+$y)/$z,(298+$x)/$z,(295+$y)/$z,(284+$x)/$z,(306+$y)/$z,(292+$x)/$z,(320+$y)/$z,(293+$x)/$z,(328+$y)/$z,(303+$x)/$z,(338+$y)/$z,(303+$x)/$z,(344+$y)/$z,(307+$x)/$z,(352+$y)/$z,(308+$x)/$z,(358+$y)/$z,(312+$x)/$z,(360+$y)/$z,(302+$x)/$z,(371+$y)/$z,(367+$x)/$z,(342+$y)/$z),'FD');
	$this->color($data['956']);$this->Polygon(array((473+$x)/$z,(522+$y)/$z,(473+$x)/$z,(498+$y)/$z,(489+$x)/$z,(463+$y)/$z,(486+$x)/$z,(449+$y)/$z,(493+$x)/$z,(442+$y)/$z,(473+$x)/$z,(434+$y)/$z,(462+$x)/$z,(434+$y)/$z,(458+$x)/$z,(424+$y)/$z,(443+$x)/$z,(425+$y)/$z,(439+$x)/$z,(418+$y)/$z,(435+$x)/$z,(420+$y)/$z,(432+$x)/$z,(416+$y)/$z,(419+$x)/$z,(416+$y)/$z,(416+$x)/$z,(414+$y)/$z,(411+$x)/$z,(405+$y)/$z,(407+$x)/$z,(402+$y)/$z,(398+$x)/$z,(398+$y)/$z,(384+$x)/$z,(395+$y)/$z,(378+$x)/$z,(389+$y)/$z,(364+$x)/$z,(384+$y)/$z,(356+$x)/$z,(378+$y)/$z,(356+$x)/$z,(374+$y)/$z,(369+$x)/$z,(373+$y)/$z,(379+$x)/$z,(360+$y)/$z,(388+$x)/$z,(360+$y)/$z,(386+$x)/$z,(353+$y)/$z,(372+$x)/$z,(354+$y)/$z,(366+$x)/$z,(349+$y)/$z,(367+$x)/$z,(342+$y)/$z,(302+$x)/$z,(371+$y)/$z,(327+$x)/$z,(411+$y)/$z,(337+$x)/$z,(427+$y)/$z,(325+$x)/$z,(430+$y)/$z,(360+$x)/$z,(480+$y)/$z,(381+$x)/$z,(472+$y)/$z,(422+$x)/$z,(510+$y)/$z,(443+$x)/$z,(525+$y)/$z,(473+$x)/$z,(522+$y)/$z),'FD');																			
	$this->RoundedRect($x-10,155,40,55, 2, $style = '');
	$this->color(0);     $this->SetXY($x-10,150);$this->cell(30,5,"",0,0,'C',0,0);
	$this->color(0);     $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 0",0,0,'L',0,0);
	$this->color(1);     $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 1-9",0,0,'L',0,0);
	$this->color(10);    $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 10-99",0,0,'L',0,0);
	$this->color(100);   $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 100-999",0,0,'L',0,0);
	$this->color(1000);  $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5," 1000+",0,0,'L',0,0);
	$this->color(0);     $this->SetXY($x-10,$this->GetY()+15);$this->cell(40,5,'00km_____45km_____90km',0,0,'L',0,0);
	$this->color(0);     $this->SetXY($x-10,$this->GetY()+5);$this->cell(40,5,'Source : Dr TIBA Redha  DSP DJELFA',0,0,'L',0,0);
	$this->color(0);
	$this->SetFont('Times', 'BIU', 8);
	$this->SetDrawColor(255,0,0);
	$this->SetXY(150,42);$this->cell(65,5,'Communes De Djelfa',0,0,'C',0,0);
	$this->SetFont('Times', 'B', 8);
	$yy=165;
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'1-Ain Chouhada',0,0,'L',0,0);$this->color($data['964']);$this->cell(10,4,$data['964'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'2-Ain el Ibel',0,0,'L',0,0);$this->color($data['958']);$this->cell(10,4,$data['958'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'3-Ain Fekka',0,0,'L',0,0);$this->color($data['934']);$this->cell(10,4,$data['934'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'4-Ain Maabed',0,0,'L',0,0);$this->color($data['941']);$this->cell(10,4,$data['941'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'5-Ain Oussera',0,0,'L',0,0);$this->color($data['924']);$this->cell(10,4,$data['924'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'6-Amourah',0,0,'L',0,0);$this->color($data['968']);$this->cell(10,4,$data['968'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'7-Benhar',0,0,'L',0,0);$this->color($data['931']);$this->cell(10,4,$data['931'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'8-Beni Yacoub',0,0,'L',0,0);$this->color($data['923']);$this->cell(10,4,$data['923'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'9-Birine',0,0,'L',0,0);$this->color($data['929']);$this->cell(10,4,$data['929'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'10-Bouira Lahdab',0,0,'L',0,0);$this->color($data['933']);$this->cell(10,4,$data['933'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'11-Charef',0,0,'L',0,0);$this->color($data['920']);$this->cell(10,4,$data['920'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'12-Dar Chioukh',0,0,'L',0,0);$this->color($data['942']);$this->cell(10,4,$data['942'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'13-Deldoul',0,0,'L',0,0);$this->color($data['952']);$this->cell(10,4,$data['952'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'14-Djelfa',0,0,'L',0,0);$this->color($data['916']);$this->cell(10,4,$data['916'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'15-Douis',0,0,'L',0,0);$this->color($data['963']);$this->cell(10,4,$data['963'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'16-El Guedid',0,0,'L',0,0);$this->color($data['919']);$this->cell(10,4,$data['919'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'17-El Idrissia',0,0,'L',0,0);$this->color($data['917']);$this->cell(10,4,$data['917'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'18-El Khemis',0,0,'L',0,0);$this->color($data['928']);$this->cell(10,4,$data['928'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'19-Faidh el Botma',0,0,'L',0,0);$this->color($data['967']);$this->cell(10,4,$data['967'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'20-Guernini',0,0,'L',0,0);$this->color($data['925']);$this->cell(10,4,$data['925'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'21-Guettara',0,0,'L',0,0);$this->color($data['951']);$this->cell(10,4,$data['951'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'22-Had-Sahary',0,0,'L',0,0);$this->color($data['932']);$this->cell(10,4,$data['932'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'23-Hassi Bahbah',0,0,'L',0,0);$this->color($data['935']);$this->cell(10,4,$data['935'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'24-Hassi el Euch',0,0,'L',0,0);$this->color($data['940']);$this->cell(10,4,$data['940'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'25-Hassi Fedoul',0,0,'L',0,0);$this->color($data['927']);$this->cell(10,4,$data['927'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'26-M Liliha',0,0,'L',0,0);$this->color($data['946']);$this->cell(10,4,$data['946'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'27-Messad',0,0,'L',0,0);$this->color($data['948']);$this->cell(10,4,$data['948'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'28-Mouadjebar',0,0,'L',0,0);$this->color($data['957']);$this->cell(10,4,$data['957'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'29-Oum Laadham',0,0,'L',0,0);$this->color($data['956']);$this->cell(10,4,$data['956'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'30-Sed Rahal',0,0,'L',0,0);$this->color($data['953']);$this->cell(10,4,$data['953'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'31-Selmana',0,0,'L',0,0);$this->color($data['954']);$this->cell(10,4,$data['954'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'32-Sidi Baizid',0,0,'L',0,0);$this->color($data['947']);$this->cell(10,4,$data['947'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'33-Sidi Ladjel',0,0,'L',0,0);$this->color($data['926']);$this->cell(10,4,$data['926'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'34-Tadmit',0,0,'L',0,0);$this->color($data['965']);$this->cell(10,4,$data['965'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'35-Zaafrane',0,0,'L',0,0);$this->color($data['939']);$this->cell(10,4,$data['939'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'36-Zaccar',0,0,'L',0,0);$this->color($data['962']);$this->cell(10,4,$data['962'],0,0,'C',1,0);												
	$this->SetDrawColor(0,0,0);
	$this->SetFont('Times', 'B', 6);$this->SetXY(30,119);$this->cell(55,5,'*1',0,0,'L',0,0);$this->SetXY(55,107);$this->cell(65,5,'*2',0,0,'L',0,0);$this->SetXY(70,54);$this->cell(65,5,'*3',0,0,'L',0,0);$this->SetXY(54,87);$this->cell(65,5,'*4',0,0,'L',0,0);$this->SetXY(42,61);$this->cell(65,5,'*5',0,0,'L',0,0);$this->SetXY(90,118);$this->cell(65,5,'*6',0,0,'L',0,0);$this->SetXY(50,53);$this->cell(65,5,'*7',0,0,'L',0,0);$this->SetXY(42,105);$this->cell(65,5,'*8',0,0,'L',0,0);$this->SetXY(59,45);$this->cell(65,5,'*9',0,0,'L',0,0);$this->SetXY(51,68);$this->cell(65,5,'*10',0,0,'L',0,0);$this->SetXY(36,100);$this->cell(65,5,'*11',0,0,'L',0,0);$this->SetXY(66,86);$this->cell(65,5,'*12',0,0,'L',0,0);$this->SetXY(65,132);$this->cell(65,5,'*13',0,0,'L',0,0);$this->SetXY(56,97);$this->cell(65,5,'*14',0,0,'L',0,0);$this->SetXY(35,119);$this->cell(65,5,'*15',0,0,'L',0,0);$this->SetXY(28,95);$this->cell(65,5,'*16',0,0,'L',0,0);$this->SetXY(27,110);$this->cell(65,5,'*17',0,0,'L',0,0);$this->SetXY(33,58);$this->cell(65,5,'*18',0,0,'L',0,0);$this->SetXY(80,105);$this->cell(65,5,'*19',0,0,'L',0,0);$this->SetXY(38,70);$this->cell(65,5,'*20',0,0,'L',0,0);$this->SetXY(110,175);$this->cell(65,5,'*21',0,0,'L',0,0);$this->SetXY(62,61);$this->cell(65,5,'*22',0,0,'L',0,0);$this->SetXY(45,77);$this->cell(65,5,'*23',0,0,'L',0,0);$this->SetXY(58,73,$this->GetY()+5);$this->cell(65,5,'*24',0,0,'L',0,0);$this->SetXY(14,55);$this->cell(65,5,'*25',0,0,'L',0,0);$this->SetXY(73,94);$this->cell(65,5,'*26',0,0,'L',0,0);$this->SetXY(68,122);$this->cell(65,5,'*27',0,0,'L',0,0);$this->SetXY(69,110);$this->cell(65,5,'*28',0,0,'L',0,0);$this->SetXY(100,148);$this->cell(65,5,'*29',0,0,'L',0,0);$this->SetXY(59,137);$this->cell(65,5,'*30',0,0,'L',0,0);$this->SetXY(77,132);$this->cell(65,5,'*31',0,0,'L',0,0);$this->SetXY(62,80);$this->cell(65,5,'*32',0,0,'L',0,0);$this->SetXY(25,57);$this->cell(65,5,'*33',0,0,'L',0,0);$this->SetXY(45,112);$this->cell(65,5,'*34',0,0,'L',0,0);$this->SetXY(42,87);$this->cell(65,5,'*35',0,0,'L',0,0);$this->SetXY(63,105);$this->cell(65,5,'*36',0,0,'L',0,0);											
	$this->SetFont('Times', 'B', 10);
    }
   
	function valeurmoisdeces($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR,$STRUCTURED) {$this->mysqlconnect();$sql = " select * from $TBL where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' and ($COLONE2='$VALEUR2') and (STRUCTURED $STRUCTURED)";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$OP=mysql_num_rows($requete);mysql_free_result($requete);return $OP;}
	function barservicedwilaya($x,$y,$datamf,$titre)
	{
	$total1=array_sum($datamf);
	$this->SetFont('Times', 'BIU', 11);
	$this->SetXY($x-20,$y-108);$this->Cell(0, 5,$titre,0, 2, 'L');
	$this->RoundedRect($x-30,$y-108, 100, (38*5)+28, 2, $style = '');
	$this->SetFont('Arial', '',8);$this->SetTextColor(255,0,0);
	$this->SetXY($x-30,57);$this->cell(100,05,$titre,1,0,'C',1,0);
	$this->SetTextColor(0,0,0);$this->SetFillColor(120,255,120);
	$this->SetXY($x-30,$this->GetY()+1);
	for ($i = 1000; $i <= 48000; $i+= 1000)
	{
	$this->SetXY($x-30,$this->GetY()+4);
	$lx=$datamf[$i];
	if ($lx){$l=$datamf[$i];}else {$l=0.1;} 
	$this->cell($l,4,'',1,0,'C',1,0);$this->cell(10,5,$datamf[$i].'%',0,0,'C',0,0); 
	} 
	$this->SetFillColor(230);$this->SetFont('Times', 'B', 8);
	$this->SetXY($x-30,$this->GetY()+5);
	for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	$this->SetFont('Times', 'B', 11);
	}
	function tblparwilaya($dnrdon,$datejour1,$datejour2,$STRUCTURED) 
	{
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230); 
	$mr = array();$pop = array();$tpop = array();$mfrp = array();
	for ($i = 1000; $i <= 48000; $i+= 1000)
	{
		$mr[$i]=$this->valeurmoisdeces('','deceshosp','DINS','WILAYAR',$datejour1,$datejour2,trim($i),'',$STRUCTURED);
		$pop[$i]=$this->nbrtostring('wil','IDWIL',$i,'POPULATION');
	}
	$mf=array_sum($mr);
	$this->SetXY(5,42);                 $this->cell(95,05,"Repartition des décès par wilayas de residences ",1,0,'L',1,0);
	$this->SetXY(5,$this->GetY()+5);    $this->cell(15,15,"N",1,0,'C',1,0);$this->SetXY(5+15,$this->GetY());   $this->cell(80,10,"wilayas de residences",1,0,'C',1,0);$this->SetXY(5+15,$this->GetY()+10);$this->cell(35,5,"wilayas de residences",1,0,'C',1,0);$this->cell(15,5,"NBR",1,0,'C',1,0);$this->cell(15,5,"P %",1,0,'C',1,0);$this->cell(15,5,'T %',1,0,'C',1,0);
	$this->SetXY(5,$this->GetY()+1);
	for ($i = 1000; $i <= 48000; $i+= 1000) 
	{
		if($mf>0){$mfrp[$i]=round(($mr[$i]*100)/$mf,2);} else {$mfrp[$i]=0;}
		$this->SetXY(5,$this->GetY()+4);
		$this->cell(15,4,$i,1,0,'C',1,0);
		$this->cell(35,4,ucfirst(strtolower($this->nbrtostring('wil','IDWIL',$i,'WILAYAS'))),1,0,'L',0);
		$this->cell(15,4,$mr[$i],1,0,'C',0);
		if($mf>0){$this->cell(15,4,round(($mr[$i]*100)/$mf,2),1,0,'C',1,0);}else {$this->cell(15,4,round(($mr[$i]*100)/0.1,2),1,0,'C',1,0);}
		if($pop[$i]>1){$tpop[$i]=round(($mr[$i]*1000)/$pop[$i],2);$this->cell(15,4,$tpop[$i],1,0,'C',1,0);} else {$this->cell(15,4,0,1,0,'C',1,0);}  	
	}
	$this->SetXY(5,$this->GetY()+4);
	$this->cell(65,5,"Total Wilayas",1,0,'C',1,0);	    
	$this->cell(15,5,$mf,1,0,'C',1,0);
	$this->cell(15,5,"",1,0,'C',1,0);
	$this->barservicedwilaya(135,150,$mfrp,"Distribution des décès par wilayas de residences");
	}
	
	function barservicedcommune($x,$y,$datamf,$titre)
	{
	$total1=array_sum($datamf);
	$this->SetFont('Times', 'BIU', 11);
	$this->SetXY($x-20,$y-108);$this->Cell(0, 5,$titre,0, 2, 'L');
	$this->RoundedRect($x-30,$y-108, 100, (38*5)+28, 2, $style = '');
	$this->SetFont('Arial', '',8);$this->SetTextColor(255,0,0);
	$this->SetXY($x-30,57);$this->cell(100,05,$titre,1,0,'C',1,0);
	$this->SetTextColor(0,0,0);$this->SetFillColor(120,255,120);
	$this->SetXY($x-30,$this->GetY()+1);
	// for ($i = 916; $i <= 968; $i+= 1)
	// {
	// $this->SetXY($x-30,$this->GetY()+4);
	// $lx=$datamf[$i];
	// if ($lx){$l=$datamf[$i];}else {$l=0.1;} 
	// $this->cell($l,4,'',1,0,'C',1,0);$this->cell(10,5,$datamf[$i].'%',0,0,'C',0,0); 
	// } 
	// $this->SetFillColor(230);$this->SetFont('Times', 'B', 8);
	// $this->SetXY($x-30,$this->GetY()+5);
	// for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	// $this->SetFont('Times', 'B', 11);
	}
	function tblparcommune($dnrdon,$datejour1,$datejour2,$STRUCTURED) 
	{    	
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230); 	
	$nbrc = array();
	$nbrc1= array();
	$nbrp = array();
	$tpop = array();
	$this->SetXY(5,42);                 $this->cell(95,05,"Repartition des décès par Communes de residences ",1,0,'L',1,0);
	$this->SetXY(5,$this->GetY()+5);    $this->cell(15,15,"N",1,0,'C',1,0);$this->SetXY(5+15,$this->GetY());   $this->cell(80,10,"Communes de residences",1,0,'C',1,0);$this->SetXY(5+15,$this->GetY()+10);$this->cell(35,5,"Communes de residences",1,0,'C',1,0);$this->cell(15,5,"NBR",1,0,'C',1,0);$this->cell(15,5,"P %",1,0,'C',1,0);$this->cell(15,5,'T %',1,0,'C',1,0);
	$STRUCTUREDX = explode('=',$STRUCTURED);$IDWIL=$this->nbrtostring("structure","id",$STRUCTUREDX[1],"idwil");
	$this->mysqlconnect();
	$query="SELECT * FROM com where IDWIL ='$IDWIL' and yes='1' order by COMMUNE "; //    % %will search form 0-9,a-z            
	$resultat0=mysql_query($query);
	while($row0=mysql_fetch_object($resultat0))
	{
	$nbrc1[$row0->IDCOM]=$this->valeurmoisdeces('','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,trim($row0->IDCOM),'',$STRUCTURED);
	$tpop[$row0->IDCOM]=$row0->p2018;
	$nbrp[$row0->IDCOM]=round(($nbrc1[$row0->IDCOM]*100)/$row0->p2018,2);
	}
	$resultat=mysql_query($query);
	$totalmbr=mysql_num_rows($resultat);
	$this->SetXY(5,$this->GetY()+5);$x=0;
	while($row=mysql_fetch_object($resultat))
	{
		$nbrc=$this->valeurmoisdeces('','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,trim($row->IDCOM),'',$STRUCTURED);
		if (array_sum($nbrc1)>0) {$nbrcp=round(($nbrc*100)/array_sum($nbrc1),2);}else {$nbrcp=0;} 
		$nbrct=round(($nbrc*1000)/$row->p2018,2);
		$this->cell(15,4.5,($x=$x+1),1,0,'C',1,0);
		$this->cell(35,4.5,trim($row->COMMUNE),1,0,'L',0);
		$this->cell(15,4.5,$nbrc,1,0,'C',0);
		$this->cell(15,4.5,$nbrcp,1,0,'C',1,0);
		$this->cell(15,4.5,$nbrct,1,0,'C',1,0);
		$this->SetXY(5,$this->GetY()+4.5); 
	}
	$this->SetXY(5,$this->GetY());
	$this->cell(50,5,"Total ".$totalmbr." Communes : ",1,0,'C',1,0);	    
	$this->cell(15,5,array_sum($nbrc1),1,0,'C',1,0);
	$this->cell(15,5,"100 %",1,0,'C',1,0);
	$this->cell(15,5,round((array_sum($nbrc1)*1000)/array_sum($tpop),2),1,0,'C',1,0);
	$this->barservicedcommune(135,150,$nbrp,"Distribution des décès par wilayas de residences");
	
	}
	
	function IDCHAP($datejour1,$datejour2,$CODECIM0,$STRUCTURED){$this->mysqlconnect();$sql = " select DINS,STRUCTURED,CODECIM0 from deceshosp where (DINS BETWEEN '$datejour1' AND '$datejour2') and ( STRUCTURED  $STRUCTURED ) and CODECIM0 = $CODECIM0";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
   
	function tblparcim1($titre,$datejour1,$datejour2,$EPH1,$link0) 
	{    
		$this->SetTextColor(0,0,0);$this->SetFillColor(230);
		$this->SetFont('Times', 'B', 10);
		$this->SetXY(5,25);$this->cell(200,5,$titre,1,0,'C',1,$link0);
		$this->SetXY(5,35);
		$this->cell(10,5,"Code",1,0,'C',1,0);
		$this->cell(165,5,"Chapitre",1,0,'C',1,0);
	    $this->cell(10,5,"Nbr",1,0,'C',1,0);
		$this->cell(15,5,"TXM",1,0,'C',1,0);
		$this->SetXY(5,40);
		$this->mysqlconnect();
		$req="SELECT * FROM deceshosp where STRUCTURED $EPH1 and  DINS BETWEEN '$datejour1' AND '$datejour2' ";$query1 = mysql_query($req);
		$totalmbr11=mysql_num_rows($query1);
		$query="SELECT * FROM chapitre ";$resultat=mysql_query($query);
		$totalmbr1=mysql_num_rows($resultat);
		while($row=mysql_fetch_object($resultat))
		{
		    $nbr=$this->IDCHAP($datejour1,$datejour2,$row->IDCHAP,$EPH1);
		    $this->SetFont('Times', '', 10);
			$this->cell(10,5,$row->IDCHAP,1,0,'C',0);
			$this->cell(165,5,$row->CHAP ,1,0,'L',0);
			$this->cell(10,5,$nbr,1,0,'C',0);
			if($totalmbr11 > 0){$this->cell(15,5,round(($nbr*100)/$totalmbr11,2).' %',1,0,'C',0);} else {$this->cell(15,5,'0 %',1,0,'C',0);}
			$this->SetXY(5,$this->GetY()+5); 
		}	
		$this->SetXY(5,$this->GetY());$this->cell(10,5,"Total",1,0,'C',1,0);	  
		$this->cell(165,5,($totalmbr1-1)." : Chapitres",1,0,'C',1,0);	  
		$this->cell(10,5,$totalmbr11,1,0,'C',1,0);	  
		if($totalmbr11 > 0){$this->cell(15,5,'100%',1,0,'C',1,0); ;} else {$this->cell(15,5,'0%',1,0,'C',1,0);}		
	}
	
	function nbrtostringcim($db_name,$tb_name,$colonename,$colonevalue,$resultatstring) {if (is_numeric($colonevalue) and $colonevalue!=='0') { $this->mysqlconnect();$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );$row=mysql_fetch_object($result);$resultat=$row->$resultatstring;return $resultat;} return $resultat2='-------';}
	
    function tblparcim2($titre,$datejour1,$datejour2,$EPH1,$link0) 
	{    
		$this->SetFont('Times', 'B', 10);
		$this->SetXY(5,25);$this->cell(200,5,$titre,1,0,'C',1,$link0);
		$this->SetXY(5,35);
		$this->cell(10,5,"Code",1,0,'C',1,0);
		$this->cell(165,5,"Categorie",1,0,'C',1,0);
	    $this->cell(10,5,"Nbr",1,0,'C',1,0);
		$this->cell(15,5,"TXM",1,0,'C',1,0);
		$this->SetXY(5,40);
		$IDWIL=17000;
		$ANNEE='2016';
		$this->mysqlconnect();
		$req="SELECT * FROM deceshosp where STRUCTURED $EPH1 and  DINS BETWEEN '$datejour1' AND '$datejour2' ";
		$query1 = mysql_query($req);   
		$totalmbr11=mysql_num_rows($query1);
		$query="SELECT CODECIM,count(CODECIM)as nbr FROM deceshosp where STRUCTURED $EPH1 and  DINS BETWEEN '$datejour1' AND '$datejour2' GROUP BY CODECIM  order by nbr desc "; //    % %will search form 0-9,a-z            
		$resultat=mysql_query($query);
		$totalmbr1=mysql_num_rows($resultat);
		while($row=mysql_fetch_object($resultat))
		{
			$this->SetFont('Times', '', 10);
			$this->cell(10,5,trim($this->nbrtostringcim('deces','cim','row_id',$row->CODECIM,'diag_cod')),1,0,'C',0);
			$this->cell(165,5,$this->nbrtostringcim('deces','cim','row_id',$row->CODECIM,'diag_nom') ,1,0,'L',0);
			$this->cell(10,5,trim($row->nbr),1,0,'C',0);
			$this->cell(15,5,round(($row->nbr*100)/$totalmbr11,2).' %',1,0,'C',0);
			$this->SetXY(5,$this->GetY()+5); 
		}
		$this->SetXY(5,$this->GetY());$this->cell(10,5,"Total",1,0,'C',1,0);	  
		$this->cell(165,5,$totalmbr1." : Categorie",1,0,'C',1,0);	  
		$this->cell(10,5,$totalmbr11,1,0,'C',1,0);	  
		$this->cell(15,5,'100%',1,0,'C',1,0);  
	}
	
	function DECESMATERNELS($titre,$datejour1,$datejour2,$EPH1,$STRUCTURED) 
	{
	$this->SetFont('Times', 'B', 11);
	$this->SetXY(5,10);$this->cell(200,5,$this->repfr,0,0,'C',1,0);
	$this->SetXY(5,20);$this->cell(200,5,$this->mspfr,0,0,'C',1,0);
	$this->SetXY(5,30);$this->cell(200,5,$this->dspfr,0,0,'C',1,0);
	$h=50;
	$this->SetFont('Times', 'B', 11);
	$this->SetFillColor(200 );
	$this->SetXY(5,38);$this->cell(195,10,$titre.$this->nbrtostring("structure","id",$STRUCTURED,"structure"),0,0,'C',0);
	$this->SetXY(05,$h);
	$this->cell(20,10,"Date Deces",1,0,1,'C',0);
	$this->cell(45,10,"Nom et Prenom ",1,0,1,'C',0);
	$this->cell(10,10,"Age",1,0,1,'C',0);
	$this->cell(121,10,"Cause du deces",1,0,1,'C',0);
	$this->SetXY(05,$h+10); 
	$this->mysqlconnect();
	$this->SetFont('Arial', '',9, '', true);
	$query = "SELECT * FROM deceshosp where STRUCTURED='$STRUCTURED' and (SEX='F' and DECEMAT=1) and (DINS BETWEEN '$datejour1' AND '$datejour2') order by DINS  ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{
	$this->SetFillColor(200 );
	$this->cell(20,5,$this->dateUS2FR($row->DINS),1,0,'C',0);
	$this->cell(45,5,$row->NOM.'_'.$row->PRENOM,1,0,'L',0);
	if ($row->Years > 0 ) 
	{
	$this->cell(10,5,$row->Years." A",1,0,'C',0);
	} 
	else 
	{
		if ($row->Days <= 30 ) 
		{
		$this->cell(10,5,$row->Days." J",1,0,'C',0);
		} 
		else
		{
		$this->cell(10,5,$row->Months." M",1,0,'C',0);
		} 
	}
	$this->cell(121,5,$this->nbrtostring("CIM","row_id",$row->CODECIM,'diag_nom'),1,0,'L',0);
	$this->SetXY(5,$this->GetY()+5); 
	}
	$this->SetFillColor(200 );
	$this->SetFont('Arial', '',10, '', true);  
	$this->SetXY(5,$this->GetY());$this->cell(40,05,"TOTAL",1,0,1,'C',0);	  
	$this->SetXY(45,$this->GetY());$this->cell(156,05,$totalmbr1." Deces",1,1,1,'C',0);				 
	// $this->SetXY(150,$this->GetY()+5); $this->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
	// $this->SetXY(150,$this->GetY()+5); $this->cell(90,10,'Dr '.$_SESSION["login"],0,0,'L',0);	
	}
	
	function DECMAT($colone1,$colone2,$colone3,$datejour1,$datejour2,$SEXEDNR,$STRUCTURED){$this->mysqlconnect();$sql = " select * from deceshosp where  ($colone1 >=$colone2  and $colone1 <=$colone3)  and (DINS BETWEEN '$datejour1' AND '$datejour2') and (SEX='$SEXEDNR' and STRUCTURED $STRUCTURED  and DECEMAT=1 ) ";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function naissance($datejour1,$datejour2,$SEXEDNR,$STRUCTURED,$VMN){$this->mysqlconnect();$sql = " select * from naissance where (DINS1 BETWEEN '$datejour1' AND '$datejour2') and (SEXE5='$SEXEDNR' and STRUCTURED $STRUCTURED ) and VMN='$VMN' ";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function DEMOGRAPHIE($titre,$datejour1,$datejour2,$EPH1,$STRUCTURED) 
	{
	$this->SetFont('Times', 'B', 11);
	$this->SetXY(5,10);$this->cell(200,5,$this->repfr,0,0,'C',1,0);
	$this->SetXY(5,20);$this->cell(200,5,$this->mspfr,0,0,'C',1,0);
	$this->SetXY(5,30);$this->cell(200,5,$this->dspfr,0,0,'C',1,0);
	$datey = explode('-', $datejour2);$date=$datey[0];
	$this->SetXY(5,38);$this->cell(195,10,$titre.$this->nbrtostring("structure","id",$STRUCTURED,"structure")." ( Annee : ".$date." )",0,0,'C',0);
	$y=50;
	$nMt1=$this->naissance($date.'-01-01',$date.'-03-31','M',"=".$STRUCTURED,'V');
	$nMt2=$this->naissance($date.'-04-01',$date.'-06-30','M',"=".$STRUCTURED,'V');
	$nMt3=$this->naissance($date.'-07-01',$date.'-09-30','M',"=".$STRUCTURED,'V');
	$nMt4=$this->naissance($date.'-10-01',$date.'-12-31','M',"=".$STRUCTURED,'V');
	$nFt1=$this->naissance($date.'-01-01',$date.'-03-31','F',"=".$STRUCTURED,'V');
	$nFt2=$this->naissance($date.'-04-01',$date.'-06-30','F',"=".$STRUCTURED,'V');
	$nFt3=$this->naissance($date.'-07-01',$date.'-09-30','F',"=".$STRUCTURED,'V');
	$nFt4=$this->naissance($date.'-10-01',$date.'-12-31','F',"=".$STRUCTURED,'V');

	$this->SetXY(5,50);$this->cell(65,10,"Effectifs",1,0,1,'C',0);$this->SetXY(70,50);$this->cell(30,10,"Periode",1,0,1,'C',0);$this->SetXY(100,50);$this->cell(30,10,"Etat Civil",1,0,1,'C',0);$this->SetXY(130,50);$this->cell(35,10,"Milieu Assiste",1,0,1,'C',0);$this->SetXY(165,50);$this->cell(35,10,"Observation",1,0,1,'C',0);
	$this->SetXY(5,$y+10);$this->cell(65,25,"Naissance Vivantes",1,0,'C',0);
	$this->SetXY(70,$y+10);$this->cell(30,5,"1ere trimestre",1,0,'C',0);$this->SetXY(100,$y+10);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+10);$this->cell(35,5,$nMt1+$nFt1,1,0,'C',0);$this->SetXY(165,$y+10);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+15);$this->cell(30,5,"2eme trimestre",1,0,'C',0);$this->SetXY(100,$y+15);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+15);$this->cell(35,5,$nMt2+$nFt2,1,0,'C',0);$this->SetXY(165,$y+15);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+20);$this->cell(30,5,"3eme trimestre",1,0,'C',0);$this->SetXY(100,$y+20);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+20);$this->cell(35,5,$nMt3+$nFt3,1,0,'C',0);$this->SetXY(165,$y+20);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+25);$this->cell(30,5,"4eme trimestre",1,0,'C',0);$this->SetXY(100,$y+25);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+25);$this->cell(35,5,$nMt4+$nFt4,1,0,'C',0);$this->SetXY(165,$y+25);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+30);$this->cell(30,5,"Total",1,0,'C',1,0);       $this->SetXY(100,$y+30);$this->cell(30,5,"",1,0,'C',1,0);$this->SetXY(130,$y+30);$this->cell(35,5,$nMt1+$nMt2+$nMt3+$nMt4+$nFt1+$nFt2+$nFt3+$nFt4,1,0,'C',1,0);$this->SetXY(165,$y+30);$this->cell(35,5,"",1,0,'C',1,0);
    
	$y=50+25;
	$mt1=$this->AGESEXE('Days',0,365*150,$date.'-01-01',$date.'-03-31','M',"=".$STRUCTURED);
	$ft1=$this->AGESEXE('Days',0,365*150,$date.'-01-01',$date.'-03-31','F',"=".$STRUCTURED);
	$mt2=$this->AGESEXE('Days',0,365*150,$date.'-04-01',$date.'-06-30','M',"=".$STRUCTURED);
	$ft2=$this->AGESEXE('Days',0,365*150,$date.'-04-01',$date.'-06-30','F',"=".$STRUCTURED);
	$mt3=$this->AGESEXE('Days',0,365*150,$date.'-07-01',$date.'-09-30','M',"=".$STRUCTURED);
	$ft3=$this->AGESEXE('Days',0,365*150,$date.'-07-01',$date.'-09-30','F',"=".$STRUCTURED);
	$mt4=$this->AGESEXE('Days',0,365*150,$date.'-10-01',$date.'-12-31','M',"=".$STRUCTURED);
	$ft4=$this->AGESEXE('Days',0,365*150,$date.'-10-01',$date.'-12-31','F',"=".$STRUCTURED);
		
	$tm=$mt1+$mt2+$mt3+$mt4;
	$tf=$ft1+$ft2+$ft3+$ft4;
	
	$y=85;
	$this->SetXY(5,$y);$this->cell(65,25,"Deces tout age confondus",1,0,'C',0);
	$this->SetXY(70,$y);$this->cell(30,5,"1ere trimestre",1,0,'C',0);  $this->SetXY(100,$y);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y);$this->cell(35,5,$mt1+$ft1,1,0,'C',0);$this->SetXY(165,$y);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+5);$this->cell(30,5,"2eme trimestre",1,0,'C',0);$this->SetXY(100,$y+5);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+5);$this->cell(35,5,$mt2+$ft2,1,0,'C',0);$this->SetXY(165,$y+5);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+10);$this->cell(30,5,"3eme trimestre",1,0,'C',0);$this->SetXY(100,$y+10);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+10);$this->cell(35,5,$mt3+$ft3,1,0,'C',0);$this->SetXY(165,$y+10);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+15);$this->cell(30,5,"4eme trimestre",1,0,'C',0);$this->SetXY(100,$y+15);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+15);$this->cell(35,5,$mt4+$ft4,1,0,'C',0);$this->SetXY(165,$y+15);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+20);$this->cell(30,5,"Total",1,0,'C',1,0);       $this->SetXY(100,$y+20);$this->cell(30,5,"",1,0,'C',1,0);$this->SetXY(130,$y+20);$this->cell(35,5,$tm+$tf,1,0,'C',1,0);$this->SetXY(165,$y+20);$this->cell(35,5,"",1,0,'C',1,0);

	$y=110;
	$mt1=$this->AGESEXE('Days',0,365,$date.'-01-01',$date.'-03-31','M',"=".$STRUCTURED);
	$ft1=$this->AGESEXE('Days',0,365,$date.'-01-01',$date.'-03-31','F',"=".$STRUCTURED);
	$mt2=$this->AGESEXE('Days',0,365,$date.'-04-01',$date.'-06-30','M',"=".$STRUCTURED);
	$ft2=$this->AGESEXE('Days',0,365,$date.'-04-01',$date.'-06-30','F',"=".$STRUCTURED);
	$mt3=$this->AGESEXE('Days',0,365,$date.'-07-01',$date.'-09-30','M',"=".$STRUCTURED);
	$ft3=$this->AGESEXE('Days',0,365,$date.'-07-01',$date.'-09-30','F',"=".$STRUCTURED);
	$mt4=$this->AGESEXE('Days',0,365,$date.'-10-01',$date.'-12-31','M',"=".$STRUCTURED);
	$ft4=$this->AGESEXE('Days',0,365,$date.'-10-01',$date.'-12-31','F',"=".$STRUCTURED);
	$tm=$mt1+$mt2+$mt3+$mt4;
	$tf=$ft1+$ft2+$ft3+$ft4;
	$this->SetXY(5,$y);$this->cell(65,25,"Deces des enfant de moins d'un an",1,0,'C',0);
	$this->SetXY(70,$y);$this->cell(30,5,"1ere trimestre",1,0,'C',0);  $this->SetXY(100,$y);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y);$this->cell(35,5,$mt1+$ft1,1,0,'C',0);$this->SetXY(165,$y);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+5);$this->cell(30,5,"2eme trimestre",1,0,'C',0);$this->SetXY(100,$y+5);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+5);$this->cell(35,5,$mt2+$ft2,1,0,'C',0);$this->SetXY(165,$y+5);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+10);$this->cell(30,5,"3eme trimestre",1,0,'C',0);$this->SetXY(100,$y+10);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+10);$this->cell(35,5,$mt3+$ft3,1,0,'C',0);$this->SetXY(165,$y+10);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+15);$this->cell(30,5,"4eme trimestre",1,0,'C',0);$this->SetXY(100,$y+15);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+15);$this->cell(35,5,$mt4+$ft4,1,0,'C',0);$this->SetXY(165,$y+15);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+20);$this->cell(30,5,"Total",1,0,'C',1,0);         $this->SetXY(100,$y+20);$this->cell(30,5,"",1,0,'C',1,0);$this->SetXY(130,$y+20);$this->cell(35,5,$tm+$tf,1,0,'C',1,0);$this->SetXY(165,$y+20);$this->cell(35,5,"",1,0,'C',1,0);

	$y=135;
	$mt1=$this->AGESEXE('Days',0,7,$date.'-01-01',$date.'-03-31','M',"=".$STRUCTURED);
	$ft1=$this->AGESEXE('Days',0,7,$date.'-01-01',$date.'-03-31','F',"=".$STRUCTURED);
	$mt2=$this->AGESEXE('Days',0,7,$date.'-04-01',$date.'-06-30','M',"=".$STRUCTURED);
	$ft2=$this->AGESEXE('Days',0,7,$date.'-04-01',$date.'-06-30','F',"=".$STRUCTURED);
	$mt3=$this->AGESEXE('Days',0,7,$date.'-07-01',$date.'-09-30','M',"=".$STRUCTURED);
	$ft3=$this->AGESEXE('Days',0,7,$date.'-07-01',$date.'-09-30','F',"=".$STRUCTURED);
	$mt4=$this->AGESEXE('Days',0,7,$date.'-10-01',$date.'-12-31','M',"=".$STRUCTURED);
	$ft4=$this->AGESEXE('Days',0,7,$date.'-10-01',$date.'-12-31','F',"=".$STRUCTURED);
	$tm=$mt1+$mt2+$mt3+$mt4;
	$tf=$ft1+$ft2+$ft3+$ft4;
	$this->SetXY(5,$y);$this->cell(65,25,"Deces des nouveaux nes (0-6 jours)",1,0,'C',0);
	$this->SetXY(70,$y);$this->cell(30,5,"1ere trimestre",1,0,'C',0);  $this->SetXY(100,$y);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y);$this->cell(35,5,$mt1+$ft1,1,0,'C',0);$this->SetXY(165,$y);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+5);$this->cell(30,5,"2eme trimestre",1,0,'C',0);$this->SetXY(100,$y+5);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+5);$this->cell(35,5,$mt2+$ft2,1,0,'C',0);$this->SetXY(165,$y+5);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+10);$this->cell(30,5,"3eme trimestre",1,0,'C',0);$this->SetXY(100,$y+10);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+10);$this->cell(35,5,$mt3+$ft3,1,0,'C',0);$this->SetXY(165,$y+10);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+15);$this->cell(30,5,"4eme trimestre",1,0,'C',0);$this->SetXY(100,$y+15);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+15);$this->cell(35,5,$mt4+$ft4,1,0,'C',0);$this->SetXY(165,$y+15);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+20);$this->cell(30,5,"Total",1,0,'C',1,0);         $this->SetXY(100,$y+20);$this->cell(30,5,"",1,0,'C',1,0);$this->SetXY(130,$y+20);$this->cell(35,5,$tm+$tf,1,0,'C',1,0);$this->SetXY(165,$y+20);$this->cell(35,5,"",1,0,'C',1,0);

	$y=160;
	$mt1=$this->AGESEXE('Days',8,28,$date.'-01-01',$date.'-03-31','M',"=".$STRUCTURED);
	$ft1=$this->AGESEXE('Days',8,28,$date.'-01-01',$date.'-03-31','F',"=".$STRUCTURED);
	$mt2=$this->AGESEXE('Days',8,28,$date.'-04-01',$date.'-06-30','M',"=".$STRUCTURED);
	$ft2=$this->AGESEXE('Days',8,28,$date.'-04-01',$date.'-06-30','F',"=".$STRUCTURED);
	$mt3=$this->AGESEXE('Days',8,28,$date.'-07-01',$date.'-09-30','M',"=".$STRUCTURED);
	$ft3=$this->AGESEXE('Days',8,28,$date.'-07-01',$date.'-09-30','F',"=".$STRUCTURED);
	$mt4=$this->AGESEXE('Days',8,28,$date.'-10-01',$date.'-12-31','M',"=".$STRUCTURED);
	$ft4=$this->AGESEXE('Days',8,28,$date.'-10-01',$date.'-12-31','F',"=".$STRUCTURED);
	$tm=$mt1+$mt2+$mt3+$mt4;
	$tf=$ft1+$ft2+$ft3+$ft4;
	$this->SetXY(5,$y);$this->cell(65,25,"Deces des nouveaux nes (7-28 jours)",1,0,'C',0);
	$this->SetXY(70,$y);$this->cell(30,5,"1ere trimestre",1,0,'C',0);  $this->SetXY(100,$y);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y);$this->cell(35,5,$mt1+$ft1,1,0,'C',0);$this->SetXY(165,$y);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+5);$this->cell(30,5,"2eme trimestre",1,0,'C',0);$this->SetXY(100,$y+5);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+5);$this->cell(35,5,$mt2+$ft2,1,0,'C',0);$this->SetXY(165,$y+5);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+10);$this->cell(30,5,"3eme trimestre",1,0,'C',0);$this->SetXY(100,$y+10);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+10);$this->cell(35,5,$mt3+$ft3,1,0,'C',0);$this->SetXY(165,$y+10);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+15);$this->cell(30,5,"4eme trimestre",1,0,'C',0);$this->SetXY(100,$y+15);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+15);$this->cell(35,5,$mt4+$ft4,1,0,'C',0);$this->SetXY(165,$y+15);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+20);$this->cell(30,5,"Total",1,0,'C',1,0);         $this->SetXY(100,$y+20);$this->cell(30,5,"",1,0,'C',1,0);$this->SetXY(130,$y+20);$this->cell(35,5,$tm+$tf,1,0,'C',1,0);$this->SetXY(165,$y+20);$this->cell(35,5,"",1,0,'C',1,0);

	$y=185;
	$mt1=$this->AGESEXE('Days',0,28,$date.'-01-01',$date.'-03-31','M',"=".$STRUCTURED);
	$ft1=$this->AGESEXE('Days',0,28,$date.'-01-01',$date.'-03-31','F',"=".$STRUCTURED);
	$mt2=$this->AGESEXE('Days',0,28,$date.'-04-01',$date.'-06-30','M',"=".$STRUCTURED);
	$ft2=$this->AGESEXE('Days',0,28,$date.'-04-01',$date.'-06-30','F',"=".$STRUCTURED);
	$mt3=$this->AGESEXE('Days',0,28,$date.'-07-01',$date.'-09-30','M',"=".$STRUCTURED);
	$ft3=$this->AGESEXE('Days',0,28,$date.'-07-01',$date.'-09-30','F',"=".$STRUCTURED);
	$mt4=$this->AGESEXE('Days',0,28,$date.'-10-01',$date.'-12-31','M',"=".$STRUCTURED);
	$ft4=$this->AGESEXE('Days',0,28,$date.'-10-01',$date.'-12-31','F',"=".$STRUCTURED);
	$tm=$mt1+$mt2+$mt3+$mt4;
	$tf=$ft1+$ft2+$ft3+$ft4;
	$this->SetXY(5,$y);$this->cell(65,25,"Deces des nouveaux nes (0-28 jours)",1,0,'C',0);
	$this->SetXY(70,$y);$this->cell(30,5,"1ere trimestre",1,0,'C',0);  $this->SetXY(100,$y);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y);$this->cell(35,5,$mt1+$ft1,1,0,'C',0);$this->SetXY(165,$y);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+5);$this->cell(30,5,"2eme trimestre",1,0,'C',0);$this->SetXY(100,$y+5);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+5);$this->cell(35,5,$mt2+$ft2,1,0,'C',0);$this->SetXY(165,$y+5);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+10);$this->cell(30,5,"3eme trimestre",1,0,'C',0);$this->SetXY(100,$y+10);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+10);$this->cell(35,5,$mt3+$ft3,1,0,'C',0);$this->SetXY(165,$y+10);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+15);$this->cell(30,5,"4eme trimestre",1,0,'C',0);$this->SetXY(100,$y+15);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+15);$this->cell(35,5,$mt4+$ft4,1,0,'C',0);$this->SetXY(165,$y+15);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+20);$this->cell(30,5,"Total",1,0,'C',1,0);         $this->SetXY(100,$y+20);$this->cell(30,5,"",1,0,'C',1,0);$this->SetXY(130,$y+20);$this->cell(35,5,$tm+$tf,1,0,'C',1,0);$this->SetXY(165,$y+20);$this->cell(35,5,"",1,0,'C',1,0);
     
	$y=210;
	$mnMt1=$this->naissance($date.'-01-01',$date.'-03-31','M',"=".$STRUCTURED,'M');
	$mnMt2=$this->naissance($date.'-04-01',$date.'-06-30','M',"=".$STRUCTURED,'M');
	$mnMt3=$this->naissance($date.'-07-01',$date.'-09-30','M',"=".$STRUCTURED,'M');
	$mnMt4=$this->naissance($date.'-10-01',$date.'-12-31','M',"=".$STRUCTURED,'M');
	$mnFt1=$this->naissance($date.'-01-01',$date.'-03-31','F',"=".$STRUCTURED,'M');
	$mnFt2=$this->naissance($date.'-04-01',$date.'-06-30','F',"=".$STRUCTURED,'M');
	$mnFt3=$this->naissance($date.'-07-01',$date.'-09-30','F',"=".$STRUCTURED,'M');
	$mnFt4=$this->naissance($date.'-10-01',$date.'-12-31','F',"=".$STRUCTURED,'M');
	
	$this->SetXY(5,$y);$this->cell(65,25,"Mort nes",1,0,'C',0);
	$this->SetXY(70,$y);$this->cell(30,5,"1ere trimestre",1,0,'C',0);   $this->SetXY(100,$y);$this->cell(30,5,"",1,0,'C',0);     $this->SetXY(130,$y);   $this->cell(35,5,$mnMt1+$mnFt1,1,0,'C',0);$this->SetXY(165,$y);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+5);$this->cell(30,5,"2eme trimestre",1,0,'C',0); $this->SetXY(100,$y+5);$this->cell(30,5,"",1,0,'C',0);   $this->SetXY(130,$y+5); $this->cell(35,5,$mnMt2+$mnFt2,1,0,'C',0);$this->SetXY(165,$y+5);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+10);$this->cell(30,5,"3eme trimestre",1,0,'C',0);$this->SetXY(100,$y+10);$this->cell(30,5,"",1,0,'C',0);  $this->SetXY(130,$y+10);$this->cell(35,5,$mnMt3+$mnFt3,1,0,'C',0);$this->SetXY(165,$y+10);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+15);$this->cell(30,5,"4eme trimestre",1,0,'C',0);$this->SetXY(100,$y+15);$this->cell(30,5,"",1,0,'C',0);  $this->SetXY(130,$y+15);$this->cell(35,5,$mnMt4+$mnFt4,1,0,'C',0);$this->SetXY(165,$y+15);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+20);$this->cell(30,5,"Total",1,0,'C',1,0);       $this->SetXY(100,$y+20);$this->cell(30,5,"",1,0,'C',1,0);$this->SetXY(130,$y+20);$this->cell(35,5,$mnMt1+$mnMt2+$mnMt3+$mnMt4+$mnFt1+$mnFt2+$mnFt3+$mnFt4,1,0,'C',1,0);$this->SetXY(165,$y+20);$this->cell(35,5,"",1,0,'C',1,0);

	$y=235;
	$ft1=$this->DECMAT('Days',365*20,365*200,$date.'-01-01',$date.'-03-31','F',"=".$STRUCTURED);
	$ft2=$this->DECMAT('Days',365*20,365*200,$date.'-04-01',$date.'-06-30','F',"=".$STRUCTURED);
	$ft3=$this->DECMAT('Days',365*20,365*200,$date.'-07-01',$date.'-09-30','F',"=".$STRUCTURED);
	$ft4=$this->DECMAT('Days',365*20,365*200,$date.'-10-01',$date.'-12-31','F',"=".$STRUCTURED);
	$tf=$ft1+$ft2+$ft3+$ft4;
	$this->SetXY(5,$y);$this->cell(65,25,"Deces maternels",1,0,'C',0);
	$this->SetXY(70,$y);$this->cell(30,5,"1ere trimestre",1,0,'C',0);  $this->SetXY(100,$y);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y);$this->cell(35,5,$ft1,1,0,'C',0);$this->SetXY(165,$y);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+5);$this->cell(30,5,"2eme trimestre",1,0,'C',0);$this->SetXY(100,$y+5);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+5);$this->cell(35,5,$ft2,1,0,'C',0);$this->SetXY(165,$y+5);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+10);$this->cell(30,5,"3eme trimestre",1,0,'C',0);$this->SetXY(100,$y+10);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+10);$this->cell(35,5,$ft3,1,0,'C',0);$this->SetXY(165,$y+10);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+15);$this->cell(30,5,"4eme trimestre",1,0,'C',0);$this->SetXY(100,$y+15);$this->cell(30,5,"",1,0,'C',0);$this->SetXY(130,$y+15);$this->cell(35,5,$ft4,1,0,'C',0);$this->SetXY(165,$y+15);$this->cell(35,5,"",1,0,'C',0);
	$this->SetXY(70,$y+20);$this->cell(30,5,"Total",1,0,'C',1,0);       $this->SetXY(100,$y+20);$this->cell(30,5,"",1,0,'C',1,0);$this->SetXY(130,$y+20);$this->cell(35,5,$tf,1,0,'C',1,0);$this->SetXY(165,$y+20);$this->cell(35,5,"",1,0,'C',1,0);

	$this->SetFont('Arial','',10);
	}
	
	//*********************************************************fin revision ************************************************************************//	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    //*********************************************************fin revision ************************************************************************//	
	function coordonneescom($idcom)
	{	
	$this->mysqlconnect();
	$query = "SELECT * FROM carte where idcom=$idcom ";
	$resultat=mysql_query($query);
	$points1=array();
	while($row=mysql_fetch_object($resultat))
	{
	$points1 [] = sprintf('%d', $row->x);
	$points1 [] .= sprintf('%d', $row->y);	
	}
    return $points1 ;
	}	
	function Polygoncarte($idcom,$val)
	{
	//get point database
	$points=$this->coordonneescom($idcom);
	//get a color for set nomber  
	$this->color($val);
	//Draw a polygon
		$h = $this->h;
		$k = $this->k;
		$points_string = '';
		for($i=0; $i<count($points); $i+=2){
			$points_string .= sprintf('%d %d', $points[$i]*$k, ($h-$points[$i+1])*$k);
			if($i==0)$points_string .= ' m ';	
			else $points_string .= ' l ';		
		}
		$this->_out($points_string .$op = 'b');
	$this->SetDrawColor(0,0,0);
	$this->SetFillColor(193,205,205);	
	}
	
	function carte()
	{
	$this->Polygoncarte('1950','1');
    $this->Polygoncarte('1967','1');
	}
	
	
	function etabnm($communen,$mois,$annee) 
	{
	$this->mysqlconnect();
	$req="SELECT * FROM bordereau where  COMMUNED='$communen' and  mois='$mois' and  annee='$annee'";
	$query = mysql_query($req);   
	$rs = mysql_fetch_assoc($query);
	$OP=mysql_num_rows($query);
	if ($OP=='1') 
	{
	$OP='Oui';
	}
	else
	{
	$OP='';
	}
	mysql_free_result($query);
	return $OP;
	}
	
	
	
	function bnm($col,$communen,$mois,$annee) 
	{
	$this->mysqlconnect();
	$req="SELECT $col  FROM bordereau where  COMMUNED='$communen' and  mois='$mois' and  annee='$annee'  ";
	$query = mysql_query($req);   
	$rs = mysql_fetch_assoc($query);
	if (isset($rs[$col])) 
	{
	$OP=$rs[$col];
	}
	else
	{
	$OP='';
	}
	mysql_free_result($query);
	return $OP;
	}
	
	function sumbnm($col,$mois,$annee) 
	{
	$this->mysqlconnect();
	$req="SELECT SUM($col) AS SAD FROM bordereau where mois='$mois' and  annee='$annee'  ";
	$query = mysql_query($req);   
	$rs = mysql_fetch_assoc($query);
	$OP=$rs['SAD'];
	mysql_free_result($query);
	return $OP;
	}
	
	function Dbnm($col,$communen,$mois,$annee) 
	{
	$this->mysqlconnect();
	
	if ($col=='m') 
	{
	$req="SELECT dm1+dm2+dm3+dm4+dm5+dm6+dm7+dm8+dm9+dm10+dm11+dm12+dm13+dm14+dm15+dm16+dm17+dm18+dm19+djm1 as dmf  FROM bordereau where  COMMUNED='$communen' and  mois='$mois' and  annee='$annee'  ";
	}
	if ($col=='f') 
	{
	$req="SELECT df1+df2+df3+df4+df5+df6+df7+df8+df9+df10+df11+df12+df13+df14+df15+df16+df17+df18+df19+djf1 as dmf  FROM bordereau where  COMMUNED='$communen' and  mois='$mois' and  annee='$annee'  ";
	}
	$query = mysql_query($req);   
	$rs = mysql_fetch_assoc($query);
	if (isset($rs['dmf'])) 
	{
	$OP=$rs['dmf'];
	}
	else
	{
	$OP='';
	}
	mysql_free_result($query);
	return $OP;
	}
	function sumDbnm($col,$mois,$annee) //somme verticale des affection depiste
	{
	$this->mysqlconnect();
	if ($col=='m') 
	{
	$req="SELECT SUM(dm1+dm2+dm3+dm4+dm5+dm6+dm7+dm8+dm9+dm10+dm11+dm12+dm13+dm14+dm15+dm16+dm17+dm18+dm19+djm1) AS SAD FROM bordereau where mois='$mois' and  annee='$annee'  ";
	}
	if ($col=='f') 
	{
	$req="SELECT SUM(df1+df2+df3+df4+df5+df6+df7+df8+df9+df10+df11+df12+df13+df14+df15+df16+df17+df18+df19+djf1) AS SAD FROM bordereau where mois='$mois' and  annee='$annee'  ";
	}
	$query = mysql_query($req);   
	$rs = mysql_fetch_assoc($query);
	$OP=$rs['SAD'];
	mysql_free_result($query);
	return $OP;
	}
	  function sumfbnm($col,$annee) //somme verticale des affection depiste
	{
	$this->mysqlconnect();
	$req="SELECT SUM($col) AS SAD FROM bordereau where   annee='$annee'  ";
	$query = mysql_query($req);   
	$rs = mysql_fetch_assoc($query);
	$OP=$rs['SAD'];
	mysql_free_result($query);
	return $OP;
	}
	
	
	
	function STAT($colone1,$datejour1,$datejour2)
	{
    $this->mysqlconnect();
	$sql = " select DINS,Days,Weeks,Months,Years,DUREEHOSPIT from deceshosp where (DINS BETWEEN '$datejour1' AND '$datejour2') and ($colone1>10 and  $colone1<=150)   ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$x = array(); 
	while($value=mysql_fetch_array($requete))
		{
		 array_push( $x,$value[$colone1]);
		}
	
	return $x;
	} 
	
	
	
	function dspnbr($datejour1,$datejour2,$STRUCTURED)
	{
	$this->mysqlconnect();
	$sql = " select * from deceshosp where (DINS BETWEEN '$datejour1' AND '$datejour2') and ( STRUCTURED  $STRUCTURED )          ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$collecte=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $collecte;
	}
	

	
	function bar20($x,$y,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$titre)
    {
	if ($a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k+$l+$m+$n+$o+$p+$q+$r+$s+$t > 0){$total=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k+$l+$m+$n+$o+$p+$q+$r+$s+$t;}else {$total=1;}
	$ap=round($a*100/$total,2);
	$bp=round($b*100/$total,2);
	$cp=round($c*100/$total,2);
	$dp=round($d*100/$total,2);
	$ep=round($e*100/$total,2);
	$fp=round($f*100/$total,2);
	$gp=round($g*100/$total,2);
	$hp=round($h*100/$total,2);
	$ip=round($i*100/$total,2);
	$jp=round($j*100/$total,2);
	$kp=round($k*100/$total,2);
	$lp=round($l*100/$total,2);
	$mp=round($m*100/$total,2);
	$np=round($n*100/$total,2);
	$op=round($o*100/$total,2);
	$pp=round($p*100/$total,2);
	$qp=round($q*100/$total,2);
	$rp=round($r*100/$total,2);
	$sp=round($s*100/$total,2);
	$tp=round($t*100/$total,2);
	$this->SetFont('Times', 'BIU', 11);
	$this->SetXY($x-20,$y-108);$this->Cell(0, 5,$titre ,0, 2, 'L');
	$this->RoundedRect($x-20,$y-108, 90, 130, 2, $style = '');
	$this->SetFont('Times', 'B',08);$this->SetFillColor(120,255,120);
	$w=4.5;
	$h=1;
	$this->SetFont('Times', 'B', 9);
	$this->SetXY(111,160-2.5);$this->cell(5,5,'00-',0,0,'C',0);
	$this->SetXY(111,150-2.5);$this->cell(5,5,'10-',0,0,'C',0);
	$this->SetXY(111,140-2.5);$this->cell(5,5,'20-',0,0,'C',0);
	$this->SetXY(111,130-2.5);$this->cell(5,5,'30-',0,0,'C',0);
	$this->SetXY(111,120-2.5);$this->cell(5,5,'40-',0,0,'C',0);
	$this->SetXY(111,110-2.5);$this->cell(5,5,'50-',0,0,'C',0);
	$this->SetXY(111,100-2.5);$this->cell(5,5,'60-',0,0,'C',0);
	$this->SetXY(111,90-2.5);$this->cell(5,5,'70-',0,0,'C',0);
	$this->SetXY(111,80-2.5);$this->cell(5,5,'80-',0,0,'C',0);
	$this->SetXY(111,70-2.5);$this->cell(5,5,'90-',0,0,'C',0);
	$this->SetXY(111,60-2.5);$this->cell(5,5,'100-',0,0,'C',0);
	$this->SetXY($x-20,$y+10);
	$this->cell($w,-$ap*$h,'',1,0,'C',1,0);     
	$this->cell($w,-$bp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$cp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$dp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$ep*$h,'',1,0,'C',1,0);
	$this->cell($w,-$fp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$gp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$hp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$ip*$h,'',1,0,'C',1,0);
	$this->cell($w,-$jp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$kp*$h,'',1,0,'C',1,0);        
	$this->cell($w,-$lp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$mp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$np*$h,'',1,0,'C',1,0);
	$this->cell($w,-$op*$h,'',1,0,'C',1,0);
	$this->cell($w,-$pp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$qp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$rp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$sp*$h,'',1,0,'C',1,0);
	$this->cell($w,-$tp*$h,'',1,0,'C',1,0);
	$this->SetTextColor(255,0,0);
	$this->RotatedText($x-17.5,$y+10-$ap,'-'.$ap.'%',80);
	$this->RotatedText($x-17.5+5,$y+10-$bp,'-'.$bp.'%',80);
	$this->RotatedText($x-17.5+9,$y+10-$cp,'-'.$cp.'%',80);
	$this->RotatedText($x-17.5+14,$y+10-$dp,'-'.$dp.'%',80);
	$this->RotatedText($x-17.5+18.5,$y+10-$ep,'-'.$ep.'%',80);
	$this->RotatedText($x-17.5+23,$y+10-$fp,'-'.$fp.'%',80);
	$this->RotatedText($x-17.5+27,$y+10-$gp,'-'.$gp.'%',80);
	$this->RotatedText($x-17.5+32,$y+10-$hp,'-'.$hp.'%',80);
	$this->RotatedText($x-17.5+36.5,$y+10-$ip,'-'.$ip.'%',80);
	$this->RotatedText($x-17.5+41,$y+10-$jp,'-'.$jp.'%',80);
	$this->RotatedText($x-17.5+45.5,$y+10-$kp,'-'.$kp.'%',80);
	$this->RotatedText($x-17.5+49.5,$y+10-$lp,'-'.$lp.'%',80);
	$this->RotatedText($x-17.5+54,$y+10-$mp,'-'.$mp.'%',80);
	$this->RotatedText($x-17.5+59,$y+10-$np,'-'.$np.'%',80);
	$this->RotatedText($x-17.5+63,$y+10-$op,'-'.$op.'%',80);
	$this->RotatedText($x-17.5+68,$y+10-$pp,'-'.$pp.'%',80);
	$this->RotatedText($x-17.5+72.5,$y+10-$qp,'-'.$qp.'%',80);
	$this->RotatedText($x-17.5+77,$y+10-$rp,'-'.$rp.'%',80);
	$this->RotatedText($x-17.5+81.5,$y+10-$sp,'-'.$sp.'%',80);
	$this->RotatedText($x-17.5+85.5,$y+10-$tp,'-'.$tp.'%',80);
	$this->SetTextColor(0,0,0);
	$this->SetXY($x-20,$y+12);    
	$this->SetFont('Times', 'B', 9);
	$this->cell($w,5,'05',1,0,'C',0,0);
	$this->cell($w,5,'10',1,0,'C',0,0);
	$this->cell($w,5,'15',1,0,'C',0,0);
	$this->cell($w,5,'20',1,0,'C',0,0);
	$this->cell($w,5,'25',1,0,'C',0,0);
	$this->cell($w,5,'30',1,0,'C',0,0);
	$this->cell($w,5,'35',1,0,'C',0,0);
	$this->cell($w,5,'40',1,0,'C',0,0);
	$this->cell($w,5,'45',1,0,'C',0,0);
	$this->cell($w,5,'50',1,0,'C',0,0);
	$this->cell($w,5,'55',1,0,'C',0,0);
	$this->cell($w,5,'60',1,0,'C',0,0);
	$this->cell($w,5,'65',1,0,'C',0,0);
	$this->cell($w,5,'70',1,0,'C',0,0);
	$this->cell($w,5,'75',1,0,'C',0,0);
	$this->cell($w,5,'80',1,0,'C',0,0);
	$this->cell($w,5,'85',1,0,'C',0,0);
	$this->cell($w,5,'90',1,0,'C',0,0);
	$this->cell($w,5,'95',1,0,'C',0,0);
	$this->cell($w,5,'99',1,0,'C',0,0);
	$this->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$this->SetTextColor(0,0,0);//text noire
	$this->SetFont('Times', 'B', 11);
	}

	
	function bar5($x,$y,$a,$b,$c,$d,$e,$titre)
    {
	if($a+$b+$c+$d+$e>0){$total=$a+$b+$c+$d+$e;}else{$total=1;}
	$ap=round($a*100/$total,2);
	$bp=round($b*100/$total,2);
	$cp=round($c*100/$total,2);
	$dp=round($d*100/$total,2);
	$ep=round($e*100/$total,2);
	$this->SetFont('Times', 'BIU', 11);
	$this->SetXY($x-20,$y-108);$this->Cell(0, 5,$titre ,0, 2, 'L');
	$this->RoundedRect($x-20,$y-108, 90, 130, 2, $style = '');
	$this->SetFont('Times', 'B',08);$this->SetFillColor(120,255,120);
	// $this->SetXY($x-5,$y);$this->cell(0.5,-100,'',1,0,'L',1,0);
	// $this->SetXY($x-19,$y-100);$this->cell(13,5,'100 % ',1,0,'L',1,0);
	// $this->SetXY($x-19,$y-50);$this->cell(13,5,'50 % ',1,0,'L',1,0);
	// $this->SetXY($x-19,$y-05);$this->cell(13,5,'00 % ',1,0,'L',1,0);
	$w=18;
	$this->SetXY($x-20,$y+10);   
	$this->cell($w,-$ap,$ap,1,0,'C',1,0);        
	$this->cell($w,-$bp,$bp,1,0,'C',1,0);
	$this->cell($w,-$cp,$cp,1,0,'C',1,0);
	$this->cell($w,-$dp,$dp,1,0,'C',1,0);
	$this->cell($w,-$ep,$ep,1,0,'C',1,0);
	
	$this->SetXY($x-20,$y+12);    
	$this->cell($w,5,'00-07',1,0,'C',0,0);
	$this->cell($w,5,'08-28',1,0,'C',0,0);
	$this->cell($w,5,'01-01',1,0,'C',0,0);
	$this->cell($w,5,'01-04',1,0,'C',0,0);
	$this->cell($w,5,'05-15',1,0,'C',0,0);
	
	$this->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$this->SetTextColor(0,0,0);//text noire
	$this->SetFont('Times', 'B', 11);
	}
	function T2F20PED($data,$datejour1,$datejour2)
    {
	//tc2
	$this->SetXY($data['xt'],$data['yt']);     $this->cell(90+15,05,$data['tt'],1,0,'L',1,0);
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,15,$data['tl'],1,0,'C',1,0);
	$this->SetXY($data['xt']+15,$this->GetY());$this->cell(75+15,10,$data['tc'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY()+10);$this->cell(30,5,$data['tc1'],1,0,'C',1,0); $this->SetXY($data['xt']+45,$this->GetY());$this->cell(30,5,$data['tc3'],1,0,'C',1,0);$this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,$data['tc5'],1,0,'C',1,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,'P %',1,0,'C',1,0);
	$TM=$data['1M']+$data['2M']+$data['3M']+$data['4M']+$data['5M'];
	$TF=$data['1F']+$data['2F']+$data['3F']+$data['4F']+$data['5F'];
	if ($TM+$TF>0){$T=$TM+$TF;}else {$T=1;}
	
	
	
	$datamf = array($data['1M']+$data['1F'],
	                $data['2M']+$data['2F'],
					$data['3M']+$data['3F'],
					$data['4M']+$data['4F'],
					$data['5M']+$data['5F']);
	
	
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,$data['1MF'],1,0,'C',1,0);
	$this->SetXY($data['xt']+15,$this->GetY());$this->cell(30,5,$data['1M'],1,0,'C',0,0);
	$this->SetXY($data['xt']+45,$this->GetY());$this->cell(30,5,$data['1F'],1,0,'C',0,0);
	$this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,$data['1M']+$data['1F'],1,0,'C',0,0);
	$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['1M']+$data['1F'])/$T)*100),2).' %',1,0,'R',1,0);        
	
	$this->SetXY($data['xt'],$this->GetY()+5);$this->cell(15,5,$data['2MF'],1,0,'C',1,0);
	$this->SetXY($data['xt']+15,$this->GetY());$this->cell(30,5,$data['2M'],1,0,'C',0,0);
	$this->SetXY($data['xt']+45,$this->GetY());$this->cell(30,5,$data['2F'],1,0,'C',0,0);
	$this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,$data['2M']+$data['2F'],1,0,'C',0,0);
	$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['2M']+$data['2F'])/$T)*100),2).' %',1,0,'R',1,0);        
	
	
	$this->SetXY($data['xt'],$this->GetY()+5);$this->cell(15,5,$data['3MF'],1,0,'C',1,0);
	$this->SetXY($data['xt']+15,$this->GetY());$this->cell(30,5,$data['3M'],1,0,'C',0,0);
	$this->SetXY($data['xt']+45,$this->GetY());$this->cell(30,5,$data['3F'],1,0,'C',0,0);
	$this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,$data['3M']+$data['3F'],1,0,'C',0,0);
	$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['3M']+$data['3F'])/$T)*100),2).' %',1,0,'R',1,0);        
	
	$this->SetXY($data['xt'],$this->GetY()+5);$this->cell(15,5,$data['4MF'],1,0,'C',1,0);
	$this->SetXY($data['xt']+15,$this->GetY());$this->cell(30,5,$data['4M'],1,0,'C',0,0);
	$this->SetXY($data['xt']+45,$this->GetY());$this->cell(30,5,$data['4F'],1,0,'C',0,0);
	$this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,$data['4M']+$data['4F'],1,0,'C',0,0);
	$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['4M']+$data['4F'])/$T)*100),2).' %',1,0,'R',1,0);        
	
	$this->SetXY($data['xt'],$this->GetY()+5);$this->cell(15,5,$data['5MF'],1,0,'C',1,0);
	$this->SetXY($data['xt']+15,$this->GetY());$this->cell(30,5,$data['5M'],1,0,'C',0,0);
	$this->SetXY($data['xt']+45,$this->GetY());$this->cell(30,5,$data['5F'],1,0,'C',0,0);
	$this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,$data['5M']+$data['5F'],1,0,'C',0,0);
	$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['5M']+$data['5F'])/$T)*100),2).' %',1,0,'R',1,0);        
	
	$this->SetXY($data['xt'],$this->GetY()+5);$this->cell(15,5,'Total',1,0,'C',1,0);
	$this->SetXY($data['xt']+15,$this->GetY());$this->cell(30,5,$TM,1,0,'C',1,0);
	$this->SetXY($data['xt']+45,$this->GetY());$this->cell(30,5,$TF,1,0,'C',1,0);
	$this->SetXY($data['xt']+75,$this->GetY());$this->cell(15,5,$T,1,0,'C',1,0);
	$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($TM+$TF)/$T)*100),2).' %',1,0,'R',1,0); 	                                                                
	
	
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,'P %',1,0,'C',1,0);      
	$this->SetXY($data['xt']+15,$this->GetY());      $this->cell(30,5,round(($TM/$T)*100,2),1,0,'C',1,0);
	$this->SetXY($data['xt']+45,$this->GetY());      $this->cell(30,5,round(($TF/$T)*100,2),1,0,'C',1,0);
	$this->SetXY($data['xt']+75,$this->GetY());      $this->cell(15,5,round(($T/$T)*100,2).' %',1,0,'C',1,0);
	$this->SetXY($data['xt']+75+15,$this->GetY());   $this->cell(15,5,'***',1,0,'C',1,0); 	                                                                
	$this->SetXY(5,25+10);$this->cell(285,5,"Cette étude a porté sur ".$T." décès survenus durant la periode du ".$this->dateUS2FR($datejour1)." au ".$this->dateUS2FR($datejour2)." au niveau de 36 communes ",0,0,'L',0);
	$this->SetXY(5,175);$this->cell(285,5,"1-Répartition des décès par sexe : ",0,0,'L',0);
	$this->SetXY(5,175+5);$this->cell(285,5,"La répartition des ".$T." décès enregistrés montre que :",0,0,'L',0);
	$this->SetXY(5,175+10);$this->cell(285,5,round(($TM/$T)*100,2)."% des décès touche les garcons. ",0,0,'L',0);
	$this->SetXY(5,175+15);$this->cell(285,5,round(($TF/$T)*100,2)."% des décès touche les filles. ",0,0,'L',0);
	if($TF>0){$TF0=$TF; }else{$TF0=1;}
	$this->SetXY(5,175+20);$this->cell(285,5,"avec un sexe ratio de ".round(($TM/$TF0),2),0,0,'L',0);
	$this->SetXY(5,175+30);$this->cell(285,5,"2-Répartition des décès par tranche d'âge : ",0,0,'L',0);
	rsort($datamf);
	$this->SetXY(5,175+35,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la plus élevée est : ".round($datamf[0]*100/$T,2)."%",0,0,'L',0);
    sort($datamf);
    $this->SetXY(5,175+40,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la moins élevée est : ".round($datamf[0]*100/$T,2)."%",0,0,'L',0);
	$pie2 = array(
	"x" => 135, 
	"y" => 200, 
	"r" => 17,
	"v1" => $TM,
	"v2" => $TF,
	"t0" => "Distribution des décès par sexe ",
	"t1" => "M",
	"t2" => "F");
    $this->pie2($pie2);
    $TA1=$data['1M']+$data['1F'];
	$TA2=$data['2M']+$data['2F'];
	$TA3=$data['3M']+$data['3F'];
	$TA4=$data['4M']+$data['4F'];
	$TA5=$data['5M']+$data['5F'];
	$this->bar5(135,150,$TA1,$TA2,$TA3,$TA4,$TA5,'Distribution des décès par tranche d\'age'); 
	}
	function dataagesexepedj($x,$y,$colone1,$TABLE,$DINS,$COMMUNER,$datejour1,$datejour2,$STRUCTURED) 
	{
	$T2F20=array(
	"xt" => $x,
	"yt" => $y,
	"wc" => "",
	"hc" => "",
	"tt" => "Repartition des deces par tranche d'age et sexe (pediatrique)",
	"tc" => "Sexe",
	"tc1" =>"M",
	"tc3" =>"F",
	"tc5" =>"Total",
	"1M"  => $this->AGESEXE($colone1,0,1,$datejour1,$datejour2,'M',$STRUCTURED),  "1F"  => $this->AGESEXE($colone1,0,1,$datejour1,$datejour2,'F',$STRUCTURED),
	"2M"  => $this->AGESEXE($colone1,2,2,$datejour1,$datejour2,'M',$STRUCTURED),  "2F"  => $this->AGESEXE($colone1,2,2,$datejour1,$datejour2,'F',$STRUCTURED),
	"3M"  => $this->AGESEXE($colone1,3,3,$datejour1,$datejour2,'M',$STRUCTURED),  "3F"  => $this->AGESEXE($colone1,3,3,$datejour1,$datejour2,'F',$STRUCTURED),
	"4M"  => $this->AGESEXE($colone1,4,4,$datejour1,$datejour2,'M',$STRUCTURED),  "4F"  => $this->AGESEXE($colone1,4,4,$datejour1,$datejour2,'F',$STRUCTURED),
	"5M"  => $this->AGESEXE($colone1,5,5,$datejour1,$datejour2,'M',$STRUCTURED),  "5F"  => $this->AGESEXE($colone1,5,5,$datejour1,$datejour2,'F',$STRUCTURED),			
	"6M"  => $this->AGESEXE($colone1,6,6,$datejour1,$datejour2,'M',$STRUCTURED),  "6F"  => $this->AGESEXE($colone1,6,6,$datejour1,$datejour2,'F',$STRUCTURED),			
	"7M"  => $this->AGESEXE($colone1,7,7,$datejour1,$datejour2,'M',$STRUCTURED),  "7F"  => $this->AGESEXE($colone1,7,7,$datejour1,$datejour2,'F',$STRUCTURED),			
	"T" =>'1',
	"tl" =>"Age",
	"1MF"  => '01j',  
	"2MF"  => '02j',   
	"3MF"  => '03j',  
	"4MF"  => '04j',   
	"5MF"  => '05j',
	"6MF"  => '06j',
	"7MF"  => '07j'	
	);
	return $T2F20;
	}
	
	
	

	
	
	
	
	
	
	
    function datasig38($datejour1,$datejour2,$STRUCTURED) 
	{
	$data = array(
	"titre"=> 'Nombre De Deces',
	"A"    => '00-00',
	"B"    => '01-10',
	"C"    => '10-100',
	"D"    => '100-1000',
	"E"    => '1000-10000',
	"1966"    => $this->decescomm($datejour1,$datejour2,1966,$STRUCTURED),//Mlaaba1966 	
	"1977"    => $this->decescomm($datejour1,$datejour2,1977,$STRUCTURED),//Sidi- lantri1977 
	"1976"    => $this->decescomm($datejour1,$datejour2,1976,$STRUCTURED),//Lardjem1976
	"1950"    => $this->decescomm($datejour1,$datejour2,1950,$STRUCTURED),// Maalcem1950   
	"1949"    => $this->decescomm($datejour1,$datejour2,1949,$STRUCTURED),//Ammari1949
	"1952"    => $this->decescomm($datejour1,$datejour2,1952,$STRUCTURED),//Sidi abed1952
	"1967"    => $this->decescomm($datejour1,$datejour2,1967,$STRUCTURED),//Tamalaht1967 
	"1975"    => $this->decescomm($datejour1,$datejour2,1975,$STRUCTURED),// Larbaa1975
	"1944"    => $this->decescomm($datejour1,$datejour2,1944,$STRUCTURED),//Tissemssilet1944	
	"1951"    => $this->decescomm($datejour1,$datejour2,1951,$STRUCTURED),//Ouled bessem1951
	"1968"    => $this->decescomm($datejour1,$datejour2,1968,$STRUCTURED),//Beni lahcen1968
	"1965"    => $this->decescomm($datejour1,$datejour2,1965,$STRUCTURED),//bordj bounaama1965
	"1973"    => $this->decescomm($datejour1,$datejour2,1973,$STRUCTURED),// Lazharia1973
	"1972"    => $this->decescomm($datejour1,$datejour2,1972,$STRUCTURED),// Boucaid1972
	"1971"    => $this->decescomm($datejour1,$datejour2,1971,$STRUCTURED),// sidi slimane1971	
	"1969"    => $this->decescomm($datejour1,$datejour2,1969,$STRUCTURED),// Benichaib1969	
	"1946"    => $this->decescomm($datejour1,$datejour2,1946,$STRUCTURED),// khemisti1946
	"1960"    => $this->decescomm($datejour1,$datejour2,1960,$STRUCTURED),// Layoune1960
	"1953"    => $this->decescomm($datejour1,$datejour2,1953,$STRUCTURED),// Theniet elhad1953
	"1958"    => $this->decescomm($datejour1,$datejour2,1958,$STRUCTURED),// sidi boutouchent1958
	"2336"    => $this->decescomm($datejour1,$datejour2,2336,$STRUCTURED),// Youssoufia2336
	"1963"    => $this->decescomm($datejour1,$datejour2,1963,$STRUCTURED)// bourdj el amir abdelkader1963
	
	);		
	return $data;
	}
    function tissemssilet($data,$x,$y,$z,$cd) 
    {
	
	$this->SetXY(90,40);$this->cell(65,5,'WILAYA DE TISSEMSSILET',1,0,'C',1,0);
	$this->RoundedRect($x-15,35,155,200, 2, $style = '');
	$this->RoundedRect($x-15,35,200,200, 2, $style = '');
	if ($cd=='dairas')
	{
	 //**************************//  
	}
	if ($cd=='commune')
	{
	//Mlaaba 1966 	
    $this->color($data['1966']);$this->Polygon(array((21+$x)/$z,(81+$y)/$z,(11+$x)/$z,(81+$y)/$z,(7+$x)/$z,(88+$y)/$z,(7+$x)/$z,(96+$y)/$z,(6+$x)/$z,(109+$y)/$z,(10+$x)/$z,(111+$y)/$z,(7+$x)/$z,(119+$y)/$z,(2+$x)/$z,(125+$y)/$z,(2+$x)/$z,(131+$y)/$z,(12+$x)/$z,(147+$y)/$z,(16+$x)/$z,(145+$y)/$z,(21+$x)/$z,(150+$y)/$z,(25+$x)/$z,(146+$y)/$z,(26+$x)/$z,(137+$y)/$z,(26+$x)/$z,(130+$y)/$z,(28+$x)/$z,(118+$y)/$z,(33+$x)/$z,(116+$y)/$z,(34+$x)/$z,(111+$y)/$z,(37+$x)/$z,(105+$y)/$z,(42+$x)/$z,(103+$y)/$z,(39+$x)/$z,(99+$y)/$z,(37+$x)/$z,(91+$y)/$z,(32+$x)/$z,(94+$y)/$z,(24+$x)/$z,(93+$y)/$z,(21+$x)/$z,(81+$y)/$z),'FD');	
	//Sidi- lantri 1977 
    $this->color($data['1977']);$this->Polygon(array((47+$x)/$z,(106+$y)/$z,(52+$x)/$z,(105+$y)/$z,(54+$x)/$z,(101+$y)/$z,(59+$x)/$z,(100+$y)/$z,(66+$x)/$z,(100+$y)/$z,(72+$x)/$z,(102+$y)/$z,(75+$x)/$z,(105+$y)/$z,(78+$x)/$z,(109+$y)/$z,(74+$x)/$z,(109+$y)/$z,(74+$x)/$z,(113+$y)/$z,(77+$x)/$z,(119+$y)/$z,(80+$x)/$z,(126+$y)/$z,(78+$x)/$z,(131+$y)/$z,(76+$x)/$z,(137+$y)/$z,(69+$x)/$z,(138+$y)/$z,(64+$x)/$z,(133+$y)/$z,(53+$x)/$z,(132+$y)/$z,(50+$x)/$z,(126+$y)/$z,(45+$x)/$z,(129+$y)/$z,(39+$x)/$z,(127+$y)/$z,(36+$x)/$z,(122+$y)/$z,(32+$x)/$z,(117+$y)/$z,(34+$x)/$z,(111+$y)/$z,(37+$x)/$z,(105+$y)/$z,(42+$x)/$z,(103+$y)/$z,(47+$x)/$z,(106+$y)/$z),'FD');	
	//Lardjem1976    
	 $this->color($data['1976']);$this->Polygon(array((87+$x)/$z,(127+$y)/$z,(92+$x)/$z,(129+$y)/$z,(97+$x)/$z,(130+$y)/$z,(98+$x)/$z,(125+$y)/$z,(98+$x)/$z,(118+$y)/$z,(95+$x)/$z,(113+$y)/$z,(97+$x)/$z,(110+$y)/$z,(94+$x)/$z,(107+$y)/$z,(99+$x)/$z,(100+$y)/$z,(96+$x)/$z,(96+$y)/$z,(93+$x)/$z,(97+$y)/$z,(92+$x)/$z,(92+$y)/$z,(87+$x)/$z,(92+$y)/$z,(82+$x)/$z,(91+$y)/$z,(82+$x)/$z,(84+$y)/$z,(85+$x)/$z,(78+$y)/$z,(85+$x)/$z,(71+$y)/$z,(88+$x)/$z,(68+$y)/$z,(87+$x)/$z,(63+$y)/$z,(87+$x)/$z,(58+$y)/$z,(84+$x)/$z,(55+$y)/$z,(81+$x)/$z,(51+$y)/$z,(77+$x)/$z,(59+$y)/$z,(72+$x)/$z,(60+$y)/$z,(67+$x)/$z,(59+$y)/$z,(63+$x)/$z,(55+$y)/$z,(57+$x)/$z,(53+$y)/$z,(52+$x)/$z,(51+$y)/$z,(47+$x)/$z,(51+$y)/$z,(42+$x)/$z,(52+$y)/$z,(39+$x)/$z,(55+$y)/$z,(43+$x)/$z,(60+$y)/$z,(40+$x)/$z,(64+$y)/$z,(36+$x)/$z,(68+$y)/$z,(41+$x)/$z,(71+$y)/$z,(47+$x)/$z,(74+$y)/$z,(44+$x)/$z,(79+$y)/$z,(41+$x)/$z,(84+$y)/$z,(37+$x)/$z,(91+$y)/$z,(39+$x)/$z,(99+$y)/$z,(42+$x)/$z,(103+$y)/$z,(47+$x)/$z,(106+$y)/$z,(52+$x)/$z,(105+$y)/$z,(54+$x)/$z,(101+$y)/$z,(59+$x)/$z,(100+$y)/$z,(66+$x)/$z,(100+$y)/$z,(72+$x)/$z,(102+$y)/$z,(75+$x)/$z,(106+$y)/$z,(78+$x)/$z,(109+$y)/$z,(74+$x)/$z,(109+$y)/$z,(74+$x)/$z,(113+$y)/$z,(77+$x)/$z,(119+$y)/$z,(80+$x)/$z,(126+$y)/$z,(87+$x)/$z,(127+$y)/$z),'FD');	
	// Maalcem1950   
    $this->color($data['1950']);$this->Polygon(array((97+$x)/$z,(135+$y)/$z,(94+$x)/$z,(141+$y)/$z,(91+$x)/$z,(147+$y)/$z,(93+$x)/$z,(154+$y)/$z,(89+$x)/$z,(151+$y)/$z,(87+$x)/$z,(155+$y)/$z,(84+$x)/$z,(151+$y)/$z,(82+$x)/$z,(157+$y)/$z,(75+$x)/$z,(158+$y)/$z,(70+$x)/$z,(155+$y)/$z,(70+$x)/$z,(145+$y)/$z,(68+$x)/$z,(142+$y)/$z,(69+$x)/$z,(138+$y)/$z,(76+$x)/$z,(137+$y)/$z,(78+$x)/$z,(131+$y)/$z,(80+$x)/$z,(125+$y)/$z,(87+$x)/$z,(127+$y)/$z,(92+$x)/$z,(129+$y)/$z,(97+$x)/$z,(129+$y)/$z,(97+$x)/$z,(135+$y)/$z),'FD');	
	//Ammari1949
     $this->color($data['1949']);$this->Polygon(array((103+$x)/$z,(125+$y)/$z,(109+$x)/$z,(126+$y)/$z,(113+$x)/$z,(130+$y)/$z,(119+$x)/$z,(136+$y)/$z,(124+$x)/$z,(140+$y)/$z,(130+$x)/$z,(143+$y)/$z,(129+$x)/$z,(150+$y)/$z,(129+$x)/$z,(156+$y)/$z,(128+$x)/$z,(162+$y)/$z,(127+$x)/$z,(166+$y)/$z,(122+$x)/$z,(165+$y)/$z,(123+$x)/$z,(173+$y)/$z,(119+$x)/$z,(177+$y)/$z,(112+$x)/$z,(177+$y)/$z,(107+$x)/$z,(175+$y)/$z,(103+$x)/$z,(169+$y)/$z,(97+$x)/$z,(164+$y)/$z,(96+$x)/$z,(158+$y)/$z,(93+$x)/$z,(154+$y)/$z,(91+$x)/$z,(147+$y)/$z,(94+$x)/$z,(141+$y)/$z,(97+$x)/$z,(135+$y)/$z,(97+$x)/$z,(130+$y)/$z,(98+$x)/$z,(125+$y)/$z,(103+$x)/$z,(125+$y)/$z),'FD');	
	//Sidi abed1952
	 $this->color($data['1952']);$this->Polygon(array((101+$x)/$z,(97+$y)/$z,(100+$x)/$z,(92+$y)/$z,(104+$x)/$z,(91+$y)/$z,(108+$x)/$z,(93+$y)/$z,(110+$x)/$z,(97+$y)/$z,(115+$x)/$z,(100+$y)/$z,(120+$x)/$z,(99+$y)/$z,(126+$x)/$z,(100+$y)/$z,(134+$x)/$z,(101+$y)/$z,(140+$x)/$z,(105+$y)/$z,(138+$x)/$z,(110+$y)/$z,(139+$x)/$z,(121+$y)/$z,(144+$x)/$z,(124+$y)/$z,(140+$x)/$z,(127+$y)/$z,(139+$x)/$z,(134+$y)/$z,(140+$x)/$z,(140+$y)/$z,(136+$x)/$z,(144+$y)/$z,(130+$x)/$z,(144+$y)/$z,(124+$x)/$z,(141+$y)/$z,(119+$x)/$z,(136+$y)/$z,(113+$x)/$z,(131+$y)/$z,(109+$x)/$z,(126+$y)/$z,(103+$x)/$z,(125+$y)/$z,(98+$x)/$z,(125+$y)/$z,(98+$x)/$z,(118+$y)/$z,(95+$x)/$z,(113+$y)/$z,(97+$x)/$z,(110+$y)/$z,(94+$x)/$z,(107+$y)/$z,(99+$x)/$z,(100+$y)/$z,(101+$x)/$z,(97+$y)/$z),'FD');	
	//Tamalaht1967 
	 $this->color($data['1967']);$this->Polygon(array((93+$x)/$z,(70+$y)/$z,(97+$x)/$z,(71+$y)/$z,(102+$x)/$z,(73+$y)/$z,(106+$x)/$z,(78+$y)/$z,(110+$x)/$z,(77+$y)/$z,(112+$x)/$z,(83+$y)/$z,(112+$x)/$z,(89+$y)/$z,(104+$x)/$z,(91+$y)/$z,(100+$x)/$z,(92+$y)/$z,(101+$x)/$z,(97+$y)/$z,(99+$x)/$z,(100+$y)/$z,(96+$x)/$z,(95+$y)/$z,(93+$x)/$z,(97+$y)/$z,(92+$x)/$z,(92+$y)/$z,(87+$x)/$z,(92+$y)/$z,(82+$x)/$z,(91+$y)/$z,(82+$x)/$z,(83+$y)/$z,(85+$x)/$z,(78+$y)/$z,(84+$x)/$z,(71+$y)/$z,(88+$x)/$z,(69+$y)/$z,(93+$x)/$z,(70+$y)/$z),'FD');	
	// Larbaa1975
	$this->color($data['1975']);$this->Polygon(array((38+$x)/$z,(50+$y)/$z,(41+$x)/$z,(45+$y)/$z,(45+$x)/$z,(41+$y)/$z,(41+$x)/$z,(36+$y)/$z,(45+$x)/$z,(36+$y)/$z,(47+$x)/$z,(32+$y)/$z,(49+$x)/$z,(36+$y)/$z,(52+$x)/$z,(32+$y)/$z,(56+$x)/$z,(35+$y)/$z,(60+$x)/$z,(33+$y)/$z,(64+$x)/$z,(30+$y)/$z,(69+$x)/$z,(28+$y)/$z,(71+$x)/$z,(33+$y)/$z,(71+$x)/$z,(39+$y)/$z,(74+$x)/$z,(46+$y)/$z,(76+$x)/$z,(52+$y)/$z,(81+$x)/$z,(56+$y)/$z,(77+$x)/$z,(58+$y)/$z,(72+$x)/$z,(59+$y)/$z,(67+$x)/$z,(58+$y)/$z,(63+$x)/$z,(55+$y)/$z,(57+$x)/$z,(52+$y)/$z,(52+$x)/$z,(51+$y)/$z,(47+$x)/$z,(51+$y)/$z,(42+$x)/$z,(52+$y)/$z,(39+$x)/$z,(54+$y)/$z,(38+$x)/$z,(50+$y)/$z),'FD');	
	//Tissemssilet1944	
	$this->color($data['1944']);$this->Polygon(array((130+$x)/$z,(171+$y)/$z,(132+$x)/$z,(176+$y)/$z,(136+$x)/$z,(172+$y)/$z,(143+$x)/$z,(171+$y)/$z,(151+$x)/$z,(170+$y)/$z,(156+$x)/$z,(173+$y)/$z,(163+$x)/$z,(171+$y)/$z,(172+$x)/$z,(171+$y)/$z,(181+$x)/$z,(168+$y)/$z,(190+$x)/$z,(166+$y)/$z,(186+$x)/$z,(155+$y)/$z,(186+$x)/$z,(140+$y)/$z,(181+$x)/$z,(139+$y)/$z,(177+$x)/$z,(141+$y)/$z,(172+$x)/$z,(133+$y)/$z,(169+$x)/$z,(132+$y)/$z,(170+$x)/$z,(127+$y)/$z,(165+$x)/$z,(129+$y)/$z,(157+$x)/$z,(136+$y)/$z,(151+$x)/$z,(135+$y)/$z,(146+$x)/$z,(141+$y)/$z,(145+$x)/$z,(136+$y)/$z,(143+$x)/$z,(132+$y)/$z,(139+$x)/$z,(132+$y)/$z,(139+$x)/$z,(135+$y)/$z,(140+$x)/$z,(140+$y)/$z,(136+$x)/$z,(144+$y)/$z,(130+$x)/$z,(144+$y)/$z,(129+$x)/$z,(150+$y)/$z,(129+$x)/$z,(156+$y)/$z,(128+$x)/$z,(162+$y)/$z,(127+$x)/$z,(166+$y)/$z,(130+$x)/$z,(171+$y)/$z),'FD');	
	//Ouled bessem1951
	$this->color($data['1951']);$this->Polygon(array((143+$x)/$z,(102+$y)/$z,(146+$x)/$z,(100+$y)/$z,(148+$x)/$z,(104+$y)/$z,(152+$x)/$z,(105+$y)/$z,(156+$x)/$z,(107+$y)/$z,(161+$x)/$z,(107+$y)/$z,(165+$x)/$z,(110+$y)/$z,(167+$x)/$z,(118+$y)/$z,(174+$x)/$z,(118+$y)/$z,(174+$x)/$z,(122+$y)/$z,(177+$x)/$z,(123+$y)/$z,(176+$x)/$z,(126+$y)/$z,(170+$x)/$z,(127+$y)/$z,(165+$x)/$z,(129+$y)/$z,(157+$x)/$z,(136+$y)/$z,(151+$x)/$z,(135+$y)/$z,(146+$x)/$z,(141+$y)/$z,(145+$x)/$z,(136+$y)/$z,(143+$x)/$z,(133+$y)/$z,(139+$x)/$z,(132+$y)/$z,(140+$x)/$z,(128+$y)/$z,(144+$x)/$z,(124+$y)/$z,(139+$x)/$z,(121+$y)/$z,(138+$x)/$z,(110+$y)/$z,(140+$x)/$z,(105+$y)/$z,(143+$x)/$z,(102+$y)/$z),'FD');	
	//Beni lahcen1968
	$this->color($data['1968']);$this->Polygon(array((111+$x)/$z,(75+$y)/$z,(112+$x)/$z,(71+$y)/$z,(115+$x)/$z,(73+$y)/$z,(118+$x)/$z,(71+$y)/$z,(121+$x)/$z,(71+$y)/$z,(125+$x)/$z,(72+$y)/$z,(128+$x)/$z,(75+$y)/$z,(128+$x)/$z,(79+$y)/$z,(130+$x)/$z,(81+$y)/$z,(135+$x)/$z,(82+$y)/$z,(139+$x)/$z,(81+$y)/$z,(140+$x)/$z,(86+$y)/$z,(142+$x)/$z,(90+$y)/$z,(143+$x)/$z,(94+$y)/$z,(145+$x)/$z,(97+$y)/$z,(143+$x)/$z,(102+$y)/$z,(140+$x)/$z,(105+$y)/$z,(134+$x)/$z,(101+$y)/$z,(126+$x)/$z,(100+$y)/$z,(120+$x)/$z,(99+$y)/$z,(115+$x)/$z,(100+$y)/$z,(110+$x)/$z,(97+$y)/$z,(108+$x)/$z,(93+$y)/$z,(112+$x)/$z,(88+$y)/$z,(112+$x)/$z,(84+$y)/$z,(110+$x)/$z,(78+$y)/$z,(111+$x)/$z,(75+$y)/$z),'FD');	
	//bordj bounaama1965
	$this->color($data['1965']);$this->Polygon(array((87+$x)/$z,(53+$y)/$z,(93+$x)/$z,(54+$y)/$z,(99+$x)/$z,(55+$y)/$z,(104+$x)/$z,(57+$y)/$z,(108+$x)/$z,(54+$y)/$z,(117+$x)/$z,(56+$y)/$z,(116+$x)/$z,(62+$y)/$z,(117+$x)/$z,(68+$y)/$z,(118+$x)/$z,(71+$y)/$z,(115+$x)/$z,(73+$y)/$z,(112+$x)/$z,(72+$y)/$z,(111+$x)/$z,(75+$y)/$z,(110+$x)/$z,(78+$y)/$z,(106+$x)/$z,(79+$y)/$z,(102+$x)/$z,(72+$y)/$z,(97+$x)/$z,(71+$y)/$z,(93+$x)/$z,(71+$y)/$z,(88+$x)/$z,(69+$y)/$z,(87+$x)/$z,(63+$y)/$z,(87+$x)/$z,(58+$y)/$z,(83+$x)/$z,(56+$y)/$z,(81+$x)/$z,(54+$y)/$z,(87+$x)/$z,(53+$y)/$z),'FD');	
	// Lazharia1973
	$this->color($data['1973']);$this->Polygon(array((71+$x)/$z,(23+$y)/$z,(70+$x)/$z,(16+$y)/$z,(76+$x)/$z,(17+$y)/$z,(79+$x)/$z,(13+$y)/$z,(81+$x)/$z,(8+$y)/$z,(82+$x)/$z,(3+$y)/$z,(85+$x)/$z,(3+$y)/$z,(87+$x)/$z,(10+$y)/$z,(91+$x)/$z,(12+$y)/$z,(94+$x)/$z,(16+$y)/$z,(98+$x)/$z,(18+$y)/$z,(100+$x)/$z,(25+$y)/$z,(104+$x)/$z,(29+$y)/$z,(108+$x)/$z,(34+$y)/$z,(104+$x)/$z,(37+$y)/$z,(100+$x)/$z,(43+$y)/$z,(99+$x)/$z,(48+$y)/$z,(96+$x)/$z,(50+$y)/$z,(93+$x)/$z,(54+$y)/$z,(87+$x)/$z,(54+$y)/$z,(81+$x)/$z,(54+$y)/$z,(76+$x)/$z,(52+$y)/$z,(74+$x)/$z,(46+$y)/$z,(71+$x)/$z,(39+$y)/$z,(71+$x)/$z,(33+$y)/$z,(69+$x)/$z,(28+$y)/$z,(71+$x)/$z,(23+$y)/$z),'FD');	
	// Boucaid1972
	$this->color($data['1972']);$this->Polygon(array((113+$x)/$z,(37+$y)/$z,(118+$x)/$z,(40+$y)/$z,(124+$x)/$z,(43+$y)/$z,(128+$x)/$z,(37+$y)/$z,(131+$x)/$z,(44+$y)/$z,(136+$x)/$z,(45+$y)/$z,(138+$x)/$z,(51+$y)/$z,(140+$x)/$z,(58+$y)/$z,(140+$x)/$z,(62+$y)/$z,(135+$x)/$z,(61+$y)/$z,(130+$x)/$z,(57+$y)/$z,(127+$x)/$z,(52+$y)/$z,(122+$x)/$z,(52+$y)/$z,(117+$x)/$z,(56+$y)/$z,(108+$x)/$z,(54+$y)/$z,(104+$x)/$z,(57+$y)/$z,(99+$x)/$z,(55+$y)/$z,(93+$x)/$z,(54+$y)/$z,(95+$x)/$z,(51+$y)/$z,(99+$x)/$z,(48+$y)/$z,(100+$x)/$z,(43+$y)/$z,(104+$x)/$z,(38+$y)/$z,(108+$x)/$z,(34+$y)/$z,(113+$x)/$z,(37+$y)/$z),'FD');	
	// sidi slimane1971	
	$this->color($data['1971']);$this->Polygon(array((142+$x)/$z,(67+$y)/$z,(140+$x)/$z,(70+$y)/$z,(138+$x)/$z,(73+$y)/$z,(140+$x)/$z,(78+$y)/$z,(139+$x)/$z,(81+$y)/$z,(137+$x)/$z,(81+$y)/$z,(136+$x)/$z,(82+$y)/$z,(130+$x)/$z,(81+$y)/$z,(128+$x)/$z,(79+$y)/$z,(128+$x)/$z,(75+$y)/$z,(125+$x)/$z,(72+$y)/$z,(121+$x)/$z,(71+$y)/$z,(118+$x)/$z,(71+$y)/$z,(117+$x)/$z,(68+$y)/$z,(115+$x)/$z,(62+$y)/$z,(117+$x)/$z,(56+$y)/$z,(122+$x)/$z,(52+$y)/$z,(127+$x)/$z,(53+$y)/$z,(130+$x)/$z,(57+$y)/$z,(135+$x)/$z,(61+$y)/$z,(140+$x)/$z,(62+$y)/$z,(142+$x)/$z,(67+$y)/$z),'FD');	
	// Benichaib1969	
	$this->color($data['1969']);$this->Polygon(array((142+$x)/$z,(54+$y)/$z,(147+$x)/$z,(48+$y)/$z,(153+$x)/$z,(50+$y)/$z,(155+$x)/$z,(56+$y)/$z,(159+$x)/$z,(63+$y)/$z,(159+$x)/$z,(70+$y)/$z,(154+$x)/$z,(72+$y)/$z,(159+$x)/$z,(77+$y)/$z,(163+$x)/$z,(83+$y)/$z,(161+$x)/$z,(90+$y)/$z,(163+$x)/$z,(97+$y)/$z,(165+$x)/$z,(103+$y)/$z,(165+$x)/$z,(110+$y)/$z,(161+$x)/$z,(107+$y)/$z,(156+$x)/$z,(107+$y)/$z,(152+$x)/$z,(105+$y)/$z,(148+$x)/$z,(104+$y)/$z,(146+$x)/$z,(101+$y)/$z,(145+$x)/$z,(97+$y)/$z,  (143+$x)/$z,(94+$y)/$z,(142+$x)/$z,(90+$y)/$z,(140+$x)/$z,(86+$y)/$z,(139+$x)/$z,(81+$y)/$z,(140+$x)/$z,(78+$y)/$z,(139+$x)/$z,(72+$y)/$z,(141+$x)/$z,(70+$y)/$z,(142+$x)/$z,(66+$y)/$z,(140+$x)/$z,(62+$y)/$z,(140+$x)/$z,(58+$y)/$z,(138+$x)/$z,(51+$y)/$z,(136+$x)/$z,(45+$y)/$z,(142+$x)/$z,(54+$y)/$z),'FD');	
	// khemisti1946
	$this->color($data['1946']);$this->Polygon(array((168+$x)/$z,(94+$y)/$z,(173+$x)/$z,(93+$y)/$z,(177+$x)/$z,(96+$y)/$z,(182+$x)/$z,(96+$y)/$z,(186+$x)/$z,(82+$y)/$z,(190+$x)/$z,(95+$y)/$z,(200+$x)/$z,(94+$y)/$z,(201+$x)/$z,(86+$y)/$z,(205+$x)/$z,(83+$y)/$z,(209+$x)/$z,(84+$y)/$z,(209+$x)/$z,(90+$y)/$z,(208+$x)/$z,(97+$y)/$z,(205+$x)/$z,(103+$y)/$z,(198+$x)/$z,(109+$y)/$z,(191+$x)/$z,(115+$y)/$z,(190+$x)/$z,(123+$y)/$z,(198+$x)/$z,(126+$y)/$z,(198+$x)/$z,(131+$y)/$z,(197+$x)/$z,(140+$y)/$z,(200+$x)/$z,(146+$y)/$z,(197+$x)/$z,(151+$y)/$z, (201+$x)/$z,(155+$y)/$z,(195+$x)/$z,(161+$y)/$z,(189+$x)/$z,(166+$y)/$z,(186+$x)/$z,(157+$y)/$z,(186+$x)/$z,(140+$y)/$z,(181+$x)/$z,(139+$y)/$z,(177+$x)/$z,(141+$y)/$z,(172+$x)/$z,(133+$y)/$z,(169+$x)/$z,(132+$y)/$z,(170+$x)/$z,(127+$y)/$z,(176+$x)/$z,(126+$y)/$z,(177+$x)/$z,(123+$y)/$z,(174+$x)/$z,(122+$y)/$z,(174+$x)/$z,(119+$y)/$z,(167+$x)/$z,(118+$y)/$z,(165+$x)/$z,(110+$y)/$z,(165+$x)/$z,(103+$y)/$z,(163+$x)/$z,(97+$y)/$z,(168+$x)/$z,(94+$y)/$z),'FD');	
	// Layoune1960
	$this->color($data['1960']);$this->Polygon(array((215+$x)/$z,(88+$y)/$z,(222+$x)/$z,(91+$y)/$z,(227+$x)/$z,(96+$y)/$z,(231+$x)/$z,(103+$y)/$z,(233+$x)/$z,(110+$y)/$z,(240+$x)/$z,(112+$y)/$z,(238+$x)/$z,(117+$y)/$z,(241+$x)/$z,(121+$y)/$z,(240+$x)/$z,(129+$y)/$z,(244+$x)/$z,(135+$y)/$z,(253+$x)/$z,(137+$y)/$z,(263+$x)/$z,(141+$y)/$z,(272+$x)/$z,(142+$y)/$z,(277+$x)/$z,(144+$y)/$z,(270+$x)/$z,(155+$y)/$z,(269+$x)/$z,(169+$y)/$z,(245+$x)/$z,(169+$y)/$z,(225+$x)/$z,(174+$y)/$z,(224+$x)/$z,(162+$y)/$z,(214+$x)/$z,(162+$y)/$z,(209+$x)/$z,(165+$y)/$z,(204+$x)/$z,(162+$y)/$z,(207+$x)/$z,(158+$y)/$z,(212+$x)/$z,(156+$y)/$z,(212+$x)/$z,(151+$y)/$z,(207+$x)/$z,(153+$y)/$z,(201+$x)/$z,(155+$y)/$z, (197+$x)/$z,(151+$y)/$z,(200+$x)/$z,(146+$y)/$z,(197+$x)/$z,(140+$y)/$z,(198+$x)/$z,(131+$y)/$z,(198+$x)/$z,(126+$y)/$z,(190+$x)/$z,(123+$y)/$z,(191+$x)/$z,(115+$y)/$z,(198+$x)/$z,(109+$y)/$z,(205+$x)/$z,(103+$y)/$z,(208+$x)/$z,(97+$y)/$z,(209+$x)/$z,(90+$y)/$z,(215+$x)/$z,(88+$y)/$z),'FD');	
	// Theniet elhad1953
	$this->color($data['1953']);$this->Polygon(array((243+$x)/$z,(108+$y)/$z,(250+$x)/$z,(107+$y)/$z,(256+$x)/$z,(108+$y)/$z,(255+$x)/$z,(103+$y)/$z,(250+$x)/$z,(98+$y)/$z,(245+$x)/$z,(93+$y)/$z,(246+$x)/$z,(86+$y)/$z,(248+$x)/$z,(80+$y)/$z,(244+$x)/$z,(75+$y)/$z,(241+$x)/$z,(74+$y)/$z,(236+$x)/$z,(74+$y)/$z,(230+$x)/$z,(72+$y)/$z,(229+$x)/$z,(68+$y)/$z,(226+$x)/$z,(62+$y)/$z,(223+$x)/$z,(58+$y)/$z,(221+$x)/$z,(50+$y)/$z,(216+$x)/$z,(45+$y)/$z,(214+$x)/$z,(38+$y)/$z,(216+$x)/$z,(33+$y)/$z,(201+$x)/$z,(35+$y)/$z,(205+$x)/$z,(39+$y)/$z, (200+$x)/$z,(37+$y)/$z,(197+$x)/$z,(25+$y)/$z,(194+$x)/$z,(33+$y)/$z,(189+$x)/$z,(33+$y)/$z,(185+$x)/$z,(35+$y)/$z,(181+$x)/$z,(42+$y)/$z,(177+$x)/$z,(46+$y)/$z,(176+$x)/$z,(52+$y)/$z,(170+$x)/$z,(54+$y)/$z,(166+$x)/$z,(60+$y)/$z,(174+$x)/$z,(59+$y)/$z, (182+$x)/$z,(59+$y)/$z,(189+$x)/$z,(66+$y)/$z,(195+$x)/$z,(69+$y)/$z,(201+$x)/$z,(68+$y)/$z,(204+$x)/$z,(75+$y)/$z,(209+$x)/$z,(80+$y)/$z,(209+$x)/$z,(84+$y)/$z,(209+$x)/$z,(90+$y)/$z,(215+$x)/$z,(88+$y)/$z,(222+$x)/$z,(91+$y)/$z,(227+$x)/$z,(97+$y)/$z,(231+$x)/$z,(103+$y)/$z,(233+$x)/$z,(111+$y)/$z,(240+$x)/$z,(112+$y)/$z,(243+$x)/$z,(108+$y)/$z),'FD');	
	// sidi boutouchent1958
	$this->color($data['1958']);$this->Polygon(array((166+$x)/$z,(61+$y)/$z,(174+$x)/$z,(59+$y)/$z,(182+$x)/$z,(60+$y)/$z,(189+$x)/$z,(66+$y)/$z,(195+$x)/$z,(70+$y)/$z,(201+$x)/$z,(68+$y)/$z,(204+$x)/$z,(75+$y)/$z,(209+$x)/$z,(80+$y)/$z,(209+$x)/$z,(84+$y)/$z,(205+$x)/$z,(83+$y)/$z,(201+$x)/$z,(86+$y)/$z,(200+$x)/$z,(94+$y)/$z,(190+$x)/$z,(95+$y)/$z,(186+$x)/$z,(91+$y)/$z,(182+$x)/$z,(96+$y)/$z,(177+$x)/$z,(96+$y)/$z,(173+$x)/$z,(93+$y)/$z,(168+$x)/$z,(94+$y)/$z,(163+$x)/$z,(97+$y)/$z,(161+$x)/$z,(90+$y)/$z,(163+$x)/$z,(82+$y)/$z,(159+$x)/$z,(77+$y)/$z,(154+$x)/$z,(72+$y)/$z,(159+$x)/$z,(77+$y)/$z,(154+$x)/$z,(72+$y)/$z,(159+$x)/$z,(70+$y)/$z,(159+$x)/$z,(63+$y)/$z,(166+$x)/$z,(61+$y)/$z),'FD');	
	// Youssoufia2336
	$this->color($data['2336']);$this->Polygon(array((222+$x)/$z,(30+$y)/$z,(227+$x)/$z,(30+$y)/$z,(232+$x)/$z,(28+$y)/$z,(234+$x)/$z,(34+$y)/$z,(237+$x)/$z,(40+$y)/$z,(245+$x)/$z,(40+$y)/$z,(251+$x)/$z,(41+$y)/$z,(247+$x)/$z,(45+$y)/$z,(246+$x)/$z,(51+$y)/$z,(245+$x)/$z,(57+$y)/$z,(240+$x)/$z,(60+$y)/$z,(241+$x)/$z,(65+$y)/$z,(241+$x)/$z,(70+$y)/$z,(241+$x)/$z,(74+$y)/$z,(236+$x)/$z,(73+$y)/$z,(230+$x)/$z,(72+$y)/$z,(229+$x)/$z,(67+$y)/$z,(226+$x)/$z,(62+$y)/$z,(223+$x)/$z,(57+$y)/$z,(221+$x)/$z,(50+$y)/$z,(216+$x)/$z,(45+$y)/$z,(214+$x)/$z,(38+$y)/$z,(216+$x)/$z,(33+$y)/$z,(222+$x)/$z,(30+$y)/$z),'FD');	
	// bourdj el amir abdelkader1963
	$this->color($data['1963']);$this->Polygon(array((255+$x)/$z,(46+$y)/$z,(258+$x)/$z,(52+$y)/$z,(262+$x)/$z,(58+$y)/$z,(268+$x)/$z,(57+$y)/$z,(275+$x)/$z,(60+$y)/$z,(281+$x)/$z,(59+$y)/$z,(280+$x)/$z,(76+$y)/$z,(274+$x)/$z,(86+$y)/$z,(274+$x)/$z,(95+$y)/$z,(274+$x)/$z,(105+$y)/$z,(269+$x)/$z,(111+$y)/$z,(263+$x)/$z,(114+$y)/$z,(256+$x)/$z,(108+$y)/$z,(255+$x)/$z,(103+$y)/$z,(250+$x)/$z,(98+$y)/$z,(245+$x)/$z,(93+$y)/$z,(246+$x)/$z,(86+$y)/$z,(248+$x)/$z,(80+$y)/$z,(244+$x)/$z,(75+$y)/$z,(241+$x)/$z,(74+$y)/$z, (241+$x)/$z,(71+$y)/$z,(241+$x)/$z,(65+$y)/$z,(240+$x)/$z,(60+$y)/$z,(245+$x)/$z,(57+$y)/$z,(246+$x)/$z,(51+$y)/$z,(247+$x)/$z,(45+$y)/$z,(247+$x)/$z,(41+$y)/$z,(251+$x)/$z,(46+$y)/$z),'FD');	
	}			
	$this->RoundedRect($x-10,155,40,55, 2, $style = '');
	
	$this->color(0);    $this->SetXY($x-10,150);$this->cell(30,5,$data['titre'],0,0,'C',0,0);
	$this->color(0);    $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5,$data['A'],0,0,'L',0,0);
	$this->color(10);    $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5,$data['B'],0,0,'L',0,0);
	$this->color(100);   $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5,$data['C'],0,0,'L',0,0);
	$this->color(1000);  $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5,$data['D'],0,0,'L',0,0);
	$this->color(10000); $this->SetXY($x-5,$this->GetY()+10);$this->cell(5,5,'',1,0,'C',1,0);$this->cell(15,5,$data['E'],0,0,'L',0,0);
	$this->color(0);    $this->SetXY($x-10,$this->GetY()+15);$this->cell(40,5,'00km_____45km_____90km',0,0,'L',0,0);
	$this->color(0);    $this->SetXY($x-10,$this->GetY()+5);$this->cell(40,5,'Source : Dr TIBA Redha  DSP DJELFA',0,0,'L',0,0);
	$this->color(0);
	$this->SetFont('Times', 'BIU', 8);
	$this->SetDrawColor(255,0,0);
	$this->SetXY(150,42);$this->cell(65,5,'La Wilaya De tissemssilet',0,0,'C',0,0);
	$this->SetFont('Times', 'B', 8);
	$yy=165;
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'1-Mlaaba ',0,0,'L',0,0);$this->color($data['1966']);$this->cell(10,4,$data['1966'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'2-Sidi- lantri  ',0,0,'L',0,0);$this->color($data['1977']);$this->cell(10,4,$data['1977'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'3-Lardjem',0,0,'L',0,0);$this->color($data['1976']);$this->cell(10,4,$data['1976'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'4-Maalcem',0,0,'L',0,0);$this->color($data['1950']);$this->cell(10,4,$data['1950'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'5-Ammari',0,0,'L',0,0);$this->color($data['1949']);$this->cell(10,4,$data['1949'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'6-Sidi abed',0,0,'L',0,0);$this->color($data['1952']);$this->cell(10,4,$data['1952'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'7-Tamalaht',0,0,'L',0,0);$this->color($data['1967']);$this->cell(10,4,$data['1967'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'8-Larbaa',0,0,'L',0,0);$this->color($data['1975']);$this->cell(10,4,$data['1975'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'9-Tissemssilet',0,0,'L',0,0);$this->color($data['1944']);$this->cell(10,4,$data['1944'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'10-Ouled bessem',0,0,'L',0,0);$this->color($data['1951']);$this->cell(10,4,$data['1951'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'11-Beni lahcen',0,0,'L',0,0);$this->color($data['1968']);$this->cell(10,4,$data['1968'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'12-bordj bounaama',0,0,'L',0,0);$this->color($data['1965']);$this->cell(10,4,$data['1965'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'13-Lazharia',0,0,'L',0,0);$this->color($data['1973']);$this->cell(10,4,$data['1973'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'14-Boucaid',0,0,'L',0,0);$this->color($data['1972']);$this->cell(10,4,$data['1972'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'15-sidi slimane	',0,0,'L',0,0);$this->color($data['1971']);$this->cell(10,4,$data['1971'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'16-Benichaib',0,0,'L',0,0);$this->color($data['1969']);$this->cell(10,4,$data['1969'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'17-khemisti',0,0,'L',0,0);$this->color($data['1946']);$this->cell(10,4,$data['1946'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'18-Layoune',0,0,'L',0,0);$this->color($data['1960']);$this->cell(10,4,$data['1960'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'19-Theniet elhad',0,0,'L',0,0);$this->color($data['1953']);$this->cell(10,4,$data['1953'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'20-sidi boutouchent',0,0,'L',0,0);$this->color($data['1958']);$this->cell(10,4,$data['1958'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'21-Youssoufia',0,0,'L',0,0);$this->color($data['2336']);$this->cell(10,4,$data['2336'],0,0,'C',1,0);
	$this->SetXY($yy,$this->GetY()+5);$this->cell(25,5,'22-bourdj el amir adk',0,0,'L',0,0);$this->color($data['1963']);$this->cell(10,4,$data['1963'],0,0,'C',1,0);
												
	$this->SetDrawColor(0,0,0);
	$this->SetFont('Times', 'B', 8);
	$this->SetXY(15,119);$this->cell(55,5,'*1',0,0,'L',0,0);//Mlaaba
	$this->SetXY(35,115);$this->cell(55,5,'*2',0,0,'L',0,0);//Sidi- lantri
	$this->SetXY(38,100);$this->cell(55,5,'*3',0,0,'L',0,0);//Lardjem
	$this->SetXY(48,128);$this->cell(55,5,'*4',0,0,'L',0,0);//Maalcem
	$this->SetXY(62,130);$this->cell(55,5,'*5',0,0,'L',0,0);//Ammari
	$this->SetXY(65,115);$this->cell(55,5,'*6',0,0,'L',0,0);//Sidi abed
	$this->SetXY(56,100);$this->cell(55,5,'*7',0,0,'L',0,0);//Tamalaht
	$this->SetXY(38,80);$this->cell(55,5,'*8',0,0,'L',0,0);//Larbaa
	$this->SetXY(85,135);$this->cell(55,5,'*9',0,0,'L',0,0);//Tissemssilet
	$this->SetXY(82,115);$this->cell(55,5,'*10',0,0,'L',0,0);//Ouled bessem
	$this->SetXY(70,100);$this->cell(55,5,'*11',0,0,'L',0,0);//Beni lahcen
	$this->SetXY(56,88);$this->cell(55,5,'*12',0,0,'L',0,0);//bordj bounaama
	$this->SetXY(50,75);$this->cell(55,5,'*13',0,0,'L',0,0);//Lazharia
	$this->SetXY(65,80);$this->cell(55,5,'*14',0,0,'L',0,0);//Boucaid
	$this->SetXY(70,88);$this->cell(55,5,'*15',0,0,'L',0,0);//sidi slimane
	$this->SetXY(83,100);$this->cell(55,5,'*16',0,0,'L',0,0);//Benichaib
	$this->SetXY(99,115);$this->cell(55,5,'*17',0,0,'L',0,0);//khemisti
	$this->SetXY(115,125);$this->cell(55,5,'*18',0,0,'L',0,0);//Layoune
	$this->SetXY(112,88);$this->cell(55,5,'*19',0,0,'L',0,0);//Theniet elhad
	$this->SetXY(99,95);$this->cell(55,5,'*20',0,0,'L',0,0);//sidi boutouchent
	$this->SetXY(124,84);$this->cell(55,5,'*21',0,0,'L',0,0);//Youssoufia
	$this->SetXY(136,95);$this->cell(55,5,'*22',0,0,'L',0,0);//bourdj el amir adk									
	$this->color(0);
	$this->SetDrawColor(0,0,0);
	$this->SetFont('Times', 'B', 10);
    }
   
  
  
	
	function bnmcomm($mois,$annee,$COMMUNER,$type) 
	{
	if ($type=='1') {$col="nm1+nf1+nm2+nf2";}//naissance
	if ($type=='2') {$col="mnm1+mnf1";}//mort néé
	if ($type=='3') {$col="m1+m2";}//mariage
	if ($type=='4') {$col="djm1+dm1+dm2+dm3+dm4+dm5+dm6+dm7+dm8+dm9+dm10+dm11+dm12+dm13+dm14+dm15+dm16+dm17+dm18+dm19";}//deces m
	if ($type=='5') {$col="djf1+df1+df2+df3+df4+df5+df6+df7+df8+df9+df10+df11+df12+df13+df14+df15+df16+df17+df18+df19";}//deces f
	if ($type=='6') {$col="djm1+dm1+dm2+dm3+dm4+dm5+dm6+dm7+dm8+dm9+dm10+dm11+dm12+dm13+dm14+dm15+dm16+dm17+dm18+dm19+djf1+df1+df2+df3+df4+df5+df6+df7+df8+df9+df10+df11+df12+df13+df14+df15+df16+df17+df18+df19";}//deces f
	
	$this->mysqlconnect();
	$req="SELECT SUM($col) AS SAD FROM bordereau where mois $mois and  annee = $annee and COMMUNED=$COMMUNER ";
	$query = mysql_query($req);   
	$rs = mysql_fetch_assoc($query);
	$OP=$rs['SAD'];
	mysql_free_result($query);
	return $OP;
	}
	
	function bnmsig($mois,$annee,$type) 
	{
	$data = array(
	"titre"=> 'Nombre De Deces',
	"A"    => '00-00',
	"B"    => '01-10',
	"C"    => '09-100',
	"D"    => '99-1000',
	"E"    => '999-10000',
	"1"    => $this->bnmcomm($mois,$annee,916,$type),//daira  Djelfa
	"2"    => $this->bnmcomm($mois,$annee,924,$type)+$this->bnmcomm($mois,$annee,925,$type),//daira  ainoussera
	"3"    => $this->bnmcomm($mois,$annee,929,$type)+$this->bnmcomm($mois,$annee,931,$type),//daira  birine
	"4"    => $this->bnmcomm($mois,$annee,929,$type)+$this->bnmcomm($mois,$annee,927,$type)+$this->bnmcomm($mois,$annee,928,$type),//daira  sidilaadjel
	"5"    => $this->bnmcomm($mois,$annee,932,$type)+$this->bnmcomm($mois,$annee,933,$type)+$this->bnmcomm($mois,$annee,934,$type),//daira  hadsahari
	"6"    => $this->bnmcomm($mois,$annee,935,$type)+$this->bnmcomm($mois,$annee,939,$type)+$this->bnmcomm($mois,$annee,941,$type)+$this->bnmcomm($mois,$annee,940,$type),//daira  hassibahbah
	"7"    => $this->bnmcomm($mois,$annee,942,$type)+$this->bnmcomm($mois,$annee,946,$type)+$this->bnmcomm($mois,$annee,947,$type),//daira  darchioukhe
	"8"    => $this->bnmcomm($mois,$annee,920,$type)+$this->bnmcomm($mois,$annee,919,$type)+$this->bnmcomm($mois,$annee,923,$type),//daira  charef
	"9"    => $this->bnmcomm($mois,$annee,917,$type)+$this->bnmcomm($mois,$annee,964,$type)+$this->bnmcomm($mois,$annee,963,$type),//daira  idrissia
	"10"   => $this->bnmcomm($mois,$annee,965,$type)+$this->bnmcomm($mois,$annee,958,$type)+$this->bnmcomm($mois,$annee,962,$type)+$this->bnmcomm($mois,$annee,957,$type),//daira  ain elbel
	"11"   => $this->bnmcomm($mois,$annee,948,$type)+$this->bnmcomm($mois,$annee,952,$type)+$this->bnmcomm($mois,$annee,954,$type)+$this->bnmcomm($mois,$annee,953,$type)+$this->bnmcomm($mois,$annee,951,$type),//daira  messaad
	"12"   => $this->bnmcomm($mois,$annee,967,$type)+$this->bnmcomm($mois,$annee,968,$type)+$this->bnmcomm($mois,$annee,956,$type),//daira  faid elbotma
	"916"  => $this->bnmcomm($mois,$annee,916,$type),//daira  Djelfa
	"917"  => $this->bnmcomm($mois,$annee,917,$type),//daira El Idrissia
	"918"  => $this->bnmcomm($mois,$annee,918,$type),//Oum Cheggag
	"919"  => $this->bnmcomm($mois,$annee,919,$type),//El Guedid
	"920"  => $this->bnmcomm($mois,$annee,920,$type),//daira Charef
	"921"  => $this->bnmcomm($mois,$annee,921,$type),//El Hammam
	"922"  => $this->bnmcomm($mois,$annee,922,$type),//Touazi
	"923"  => $this->bnmcomm($mois,$annee,923,$type),//Beni Yacoub
	"924"  => $this->bnmcomm($mois,$annee,924,$type),//daira ainoussera
	"925"  => $this->bnmcomm($mois,$annee,925,$type),//guernini
	"926"  => $this->bnmcomm($mois,$annee,926,$type),//daira sidilaadjel
	"927"  => $this->bnmcomm($mois,$annee,927,$type),//hassifdoul
	"928"  => $this->bnmcomm($mois,$annee,928,$type),//elkhamis
	"929"  => $this->bnmcomm($mois,$annee,929,$type),//daira birine
	"930"  => $this->bnmcomm($mois,$annee,930,$type),//Dra Souary
	"931"  => $this->bnmcomm($mois,$annee,931,$type),//benahar
	"932"  => $this->bnmcomm($mois,$annee,932,$type),//daira hadshari
	"933"  => $this->bnmcomm($mois,$annee,933,$type),//bouiratlahdab
	"934"  => $this->bnmcomm($mois,$annee,934,$type),//ainfka
	"935"  => $this->bnmcomm($mois,$annee,935,$type),//daira hassi bahbah
	"936"  => $this->bnmcomm($mois,$annee,936,$type),//Mouilah
	"937"  => $this->bnmcomm($mois,$annee,937,$type),//El Mesrane
	"938"  => $this->bnmcomm($mois,$annee,938,$type),//Hassi el Mora
	"939"  => $this->bnmcomm($mois,$annee,939,$type),//zaafrane
	"940"  => $this->bnmcomm($mois,$annee,940,$type),//hassi el euche
	"941"  => $this->bnmcomm($mois,$annee,941,$type),//ain maabed
	"942"  => $this->bnmcomm($mois,$annee,942,$type),//daira darchioukh
	"943"  => $this->bnmcomm($mois,$annee,943,$type),//Guendouza
	"944"  => $this->bnmcomm($mois,$annee,944,$type),//El Oguila
	"945"  => $this->bnmcomm($mois,$annee,945,$type),//El Merdja
	"946"  => $this->bnmcomm($mois,$annee,946,$type),//mliliha
	"947"  => $this->bnmcomm($mois,$annee,947,$type),//sidibayzid
	"948"  => $this->bnmcomm($mois,$annee,948,$type),//daira Messad
	"949"  => $this->bnmcomm($mois,$annee,949,$type),//Abdelmadjid
	"950"  => $this->bnmcomm($mois,$annee,950,$type),//Haniet Ouled Salem
	"951"  => $this->bnmcomm($mois,$annee,951,$type),//Guettara
	"952"  => $this->bnmcomm($mois,$annee,952,$type),//Deldoul
	"953"  => $this->bnmcomm($mois,$annee,953,$type),//Sed Rahal
	"954"  => $this->bnmcomm($mois,$annee,954,$type),//Selmana
	"955"  => $this->bnmcomm($mois,$annee,955,$type),//El Gahra
	"956"  => $this->bnmcomm($mois,$annee,956,$type),//Oum Laadham
	"957"  => $this->bnmcomm($mois,$annee,957,$type),//Mouadjebar
	"958"  => $this->bnmcomm($mois,$annee,958,$type),//daira Ain el Ibel
	"959"  => $this->bnmcomm($mois,$annee,959,$type),//Amera
	"960"  => $this->bnmcomm($mois,$annee,960,$type),//N'thila
	"961"  => $this->bnmcomm($mois,$annee,961,$type),//Oued Seddeur
	"962"  => $this->bnmcomm($mois,$annee,962,$type),//Zaccar
	"963"  => $this->bnmcomm($mois,$annee,963,$type),//Douis
	"964"  => $this->bnmcomm($mois,$annee,964,$type),//Ain Chouhada
	"965"  => $this->bnmcomm($mois,$annee,965,$type),//Tadmit
	"966"  => $this->bnmcomm($mois,$annee,966,$type),//El Hiouhi
	"967"  => $this->bnmcomm($mois,$annee,967,$type),//daira Faidh el Botma
	"968"  => $this->bnmcomm($mois,$annee,968,$type) //Amourah
	);		
	return $data;
	} 
}