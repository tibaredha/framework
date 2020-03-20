<?php
require('../fpdi.php');

class sscolaire extends FPDI
{ 
     
	 function DEPISTAGE($NIVEAUS,$datejour1,$datejour2,$colonex,$valeurx,$UDS){
	 $this->mysqlconnect();
	 $sql = " select * from examensbd where (DATESBD BETWEEN '$datejour1' AND '$datejour2') and ($colonex $valeurx and UDS=$UDS )  and (NIVEAUS = $NIVEAUS) ";
	 $requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	 $collecte = mysql_num_rows($requete);mysql_free_result($requete);
	 return $collecte;
	 }
	 
	 function TDEPISTAGE($datejour1,$datejour2,$colonex,$valeurx,$UDS){
	 $this->mysqlconnect();
	 $sql = " select * from examensbd where (DATESBD BETWEEN '$datejour1' AND '$datejour2') and ($colonex $valeurx and UDS=$UDS )";
	 $requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	 $collecte = mysql_num_rows($requete);mysql_free_result($requete);
	 return $collecte;
	 }
	 
	function lDEPISTAGE($NIVEAUS,$datejour1,$datejour2,$UDS){
	$INSCRITS=556;
	if($INSCRITS>0){$INSCRITS1=$INSCRITS;}else{$INSCRITS1=0.001;}
	$EXAMINES=$this->DEPISTAGE($NIVEAUS,$datejour1,$datejour2,'id',NULL,'1');$PEXAMINES=round(($EXAMINES/$INSCRITS1)*100,2);
	if($EXAMINES>0){$EXAMINES1=$EXAMINES;}else{$EXAMINES1=0.001;}
	$HYGIENE=$this->DEPISTAGE($NIVEAUS,$datejour1,$datejour2,'HYGIENE','=1',$UDS);$PHYGIENE=round(($HYGIENE/$EXAMINES1)*100,2);
	//au moins une carie dentaire grand c +petit c 
    $CARIEG=$this->DEPISTAGE($NIVEAUS,$datejour1,$datejour2,'C','>=1',$UDS);
	$CARIEP=$this->DEPISTAGE($NIVEAUS,$datejour1,$datejour2,'c','>=1',$UDS);
	$CARIE=$CARIEG+$CARIEP;
	$PCARIE=round(($CARIE/$EXAMINES1)*100,2);
	
	$GINGIVITE=$this->DEPISTAGE($NIVEAUS,$datejour1,$datejour2,'GINGIVITE','=1',$UDS);$PGINGIVITE=round(($GINGIVITE/$EXAMINES1)*100,2);
	$AODF=$this->DEPISTAGE($NIVEAUS,$datejour1,$datejour2,'AODF','=1',$UDS);$PAODF=round(($AODF/$EXAMINES1)*100,2);
	if($NIVEAUS>0){$NIVEAUS1=$NIVEAUS." °AP";}else{$NIVEAUS1='Préscolaire ';}
	$this->SetXY(5,$this->GetY()+10);  $this->cell(24,10,$NIVEAUS1,1,0,'L',0,0);$this->cell(16,10,$INSCRITS,1,0,'C',0,0);$this->cell(16,10,$EXAMINES,1,0,'C',0,0);   $this->cell(16,10,$PEXAMINES,1,0,'C',0,0);$this->cell(16,10,$HYGIENE,1,0,'C',0,0);$this->cell(16,10,$PHYGIENE,1,0,'C',0,0);$this->cell(16,10,$CARIE,1,0,'C',0,0);$this->cell(16,10,$PCARIE,1,0,'C',0,0);    $this->cell(16,10,$GINGIVITE,1,0,'C',0,0);$this->cell(16,10,$PGINGIVITE,1,0,'C',0,0);$this->cell(16,10,$AODF,1,0,'C',0,0);$this->cell(16,10,$PAODF,1,0,'C',0,0);
	}
	
	function lTDEPISTAGE($datejour1,$datejour2,$UDS){
	$TINSCRITS=666;//pas tous eleve a revoire ????? 0+1+5
	if($TINSCRITS>0){$TINSCRITS1=$TINSCRITS;}else{$TINSCRITS1=0.001;}
	$TEXAMINES=$this->TDEPISTAGE($datejour1,$datejour2,'id',NULL,'1');$PTEXAMINES=round(($TEXAMINES/$TINSCRITS1)*100,2);//TOTAL DEPISTE pas tous eleve a revoire ????? 0+1+5
	if($TEXAMINES>0){$TEXAMINES1=$TEXAMINES;}else{$TEXAMINES1=0.001;}
	$THYGIENE=$this->TDEPISTAGE($datejour1,$datejour2,'HYGIENE','=1',$UDS);$PTHYGIENE=round(($THYGIENE/$TEXAMINES1)*100,2);
	$TCARIE=$this->TDEPISTAGE($datejour1,$datejour2,'C','>=1',$UDS);$PTCARIE=round(($TCARIE/$TEXAMINES1)*100,2);
	$TGINGIVITE=$this->TDEPISTAGE($datejour1,$datejour2,'GINGIVITE','=1',$UDS);$PTGINGIVITE=round(($TGINGIVITE/$TEXAMINES1)*100,2);
	$TAODF=$this->TDEPISTAGE($datejour1,$datejour2,'AODF','=1',$UDS);$PTAODF=round(($TAODF/$TEXAMINES1)*100,2);
	$this->SetXY(5,$this->GetY()+10);  $this->cell(24,10,"Total",1,0,'L',1,0);  $this->cell(16,10,$TINSCRITS,1,0,'C',1,0); $this->cell(16,10,$TEXAMINES,1,0,'C',1,0);  $this->cell(16,10,$PTEXAMINES,1,0,'C',1,0);$this->cell(16,10,$THYGIENE,1,0,'C',1,0); $this->cell(16,10,$PTHYGIENE,1,0,'C',1,0);      $this->cell(16,10,$TCARIE,1,0,'C',1,0);   $this->cell(16,10,$PTCARIE,1,0,'C',1,0);    $this->cell(16,10,$TGINGIVITE,1,0,'C',1,0);   $this->cell(16,10,$PTGINGIVITE,1,0,'C',1,0);       $this->cell(16,10,$TAODF,1,0,'C',1,0);  $this->cell(16,10,$PTAODF,1,0,'C',1,0);
	} 
	 
	
     function DEPISTAGECAO($NIVEAUS,$datejour1,$datejour2,$colonex,$UDS){ 
	 $this->mysqlconnect();
	 $sql = " select sum($colonex) as nbr from examensbd where (DATESBD BETWEEN '$datejour1' AND '$datejour2') and (NIVEAUS = $NIVEAUS and UDS=$UDS) ";               
	 $requete = mysql_query(  $sql ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	 $row = mysql_fetch_array($requete); 
	 return $row['nbr'];
	 }

    function LDEPISTAGECAO($NIVEAUS,$datejour1,$datejour2,$UDS){ 

	$b=$this->DEPISTAGE($NIVEAUS,$datejour1,$datejour2,'id',NULL,$UDS);
	if($b>0){$b1=$b;}else{$b1=0.001;}
	$VALEURPC=$this->DEPISTAGECAO($NIVEAUS,$datejour1,$datejour2,'PC',$UDS);
	$VALEURPA=$this->DEPISTAGECAO($NIVEAUS,$datejour1,$datejour2,'PA',$UDS);
	$VALEURPO=$this->DEPISTAGECAO($NIVEAUS,$datejour1,$datejour2,'PO',$UDS);
	$VALEURPCAO=$this->DEPISTAGECAO($NIVEAUS,$datejour1,'2020-01-01','PCAO',$UDS);
    $VALEURIPCAO=round(($VALEURPCAO/$b1)*100,2);
	
	$VALEURC=$this->DEPISTAGECAO($NIVEAUS,$datejour1,$datejour2,'C',$UDS);
	$VALEURA=$this->DEPISTAGECAO($NIVEAUS,$datejour1,$datejour2,'A',$UDS);
	$VALEURO=$this->DEPISTAGECAO($NIVEAUS,$datejour1,$datejour2,'O',$UDS);
	$VALEURCAO=$this->DEPISTAGECAO($NIVEAUS,$datejour1,$datejour2,'CAO',$UDS);
	$VALEURICAO=round(($VALEURCAO/$b1)*100,2);
	if($NIVEAUS>0){$NIVEAUS1=$NIVEAUS." °AP";}else{$NIVEAUS1='Préscolaire ';}
	
	$this->SetXY(5,$this->GetY()+10);  
	$this->cell(24,10,$NIVEAUS1,1,0,'L',0,0);      
	$this->cell(17.5,10,$VALEURPC,1,0,'C',0,0);       
	$this->cell(17.5,10,$VALEURPA,1,0,'C',0,0);   
	$this->cell(17.5,10,$VALEURPO,1,0,'C',0,0);    
	$this->cell(17.5,10,$VALEURPCAO,1,0,'C',0,0);     
	$this->cell(17.5,10,$VALEURIPCAO,1,0,'C',0,0);      
	$this->cell(17.5,10,$VALEURC,1,0,'C',0,0);   
	$this->cell(17.5,10,$VALEURA,1,0,'C',0,0);    
	$this->cell(17.5,10,$VALEURO,1,0,'C',0,0);   
	$this->cell(17.5,10,$VALEURCAO,1,0,'C',0,0);       
	$this->cell(17.5,10,$VALEURICAO,1,0,'C',0,0); 
    }
	
	
	 function DEPISTAGETCAO($datejour1,$datejour2,$colonex,$UDS){ 
	 $this->mysqlconnect();
	 $sql = " select sum($colonex) as nbr from examensbd where (DATESBD BETWEEN '$datejour1' AND '$datejour2') and UDS=$UDS ";               
	 $requete = mysql_query(  $sql ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	 $row = mysql_fetch_array($requete); 
	 return $row['nbr'];
	 }
	
	
	function LTDEPISTAGECAO($datejour1,$datejour2,$UDS)
	{ 
	$b=$this->TDEPISTAGE($datejour1,$datejour2,'id',NULL,$UDS);
	if($b>0){$b1=$b;}else{$b1=0.001;}
	$VALEURTPC=$this->DEPISTAGETCAO($datejour1,$datejour2,'PC',$UDS);
	$VALEURTPA=$this->DEPISTAGETCAO($datejour1,$datejour2,'PA',$UDS);
	$VALEURTPO=$this->DEPISTAGETCAO($datejour1,$datejour2,'PO',$UDS);
	$VALEURTPCAO=$this->DEPISTAGETCAO($datejour1,$datejour2,'PCAO',$UDS);
	$VALEURITPCAO=round(($VALEURTPCAO/$b1)*100,2);
	
	$VALEURTC=$this->DEPISTAGETCAO($datejour1,$datejour2,'C',$UDS);
	$VALEURTA=$this->DEPISTAGETCAO($datejour1,$datejour2,'A',$UDS);
	$VALEURTO=$this->DEPISTAGETCAO($datejour1,$datejour2,'O',$UDS);
	$VALEURTCAO=$this->DEPISTAGETCAO($datejour1,$datejour2,'CAO',$UDS);
	$VALEURITCAO=round(($VALEURTCAO/$b1)*100,2);
	
	$this->SetXY(5,$this->GetY()+10);  
	$this->cell(24,10,"Total",1,0,'L',1,0);            
	$this->cell(17.5,10,$VALEURTPC,1,0,'C',1,0);       
	$this->cell(17.5,10,$VALEURTPA,1,0,'C',1,0);   
	$this->cell(17.5,10,$VALEURTPO,1,0,'C',1,0);    
	$this->cell(17.5,10,$VALEURTPCAO,1,0,'C',1,0);     
	$this->cell(17.5,10,$VALEURITPCAO,1,0,'C',1,0);       
	$this->cell(17.5,10,$VALEURTC,1,0,'C',1,0);   
	$this->cell(17.5,10,$VALEURTA,1,0,'C',1,0);    
	$this->cell(17.5,10,$VALEURTO,1,0,'C',1,0);   
	$this->cell(17.5,10,$VALEURTCAO,1,0,'C',1,0);       
	$this->cell(17.5,10,$VALEURITCAO,1,0,'C',1,0); 
	}
	
	function TRTDC ($NIVEAUS,$datejour1,$datejour2,$UDS,$y){
	
	$CARIEG=$this->DEPISTAGE($NIVEAUS,$datejour1,$datejour2,'C','>=1',$UDS);
	$CARIEP=$this->DEPISTAGE($NIVEAUS,$datejour1,$datejour2,'c','>=1',$UDS);
	$CARIE=$CARIEG+$CARIEP;
	if($NIVEAUS>0){$NIVEAUS1=$NIVEAUS." °AP";}else{$NIVEAUS1='Préscolaire ';}
	$this->SetXY(5,$this->GetY()+$y);  
	$this->cell(24,5,$NIVEAUS1,1,0,'L',0,0); 
	$this->cell(14.66,5,$CARIE,1,0,'C',0,0);
	$this->cell(14.66,5,"",1,0,'C',0,0);
	$this->cell(14.66,5,"",1,0,'C',0,0);
	$this->cell(14.66,5,"",1,0,'C',0,0);
	$this->cell(14.66,5,"",1,0,'C',0,0);
	$this->cell(14.66,5,"",1,0,'C',0,0);
	$this->cell(14.66,5,"",1,0,'C',0,0);
	$this->cell(14.66,5,"",1,0,'C',0,0);
	$this->cell(14.66,5,"",1,0,'C',0,0);
	$this->cell(14.66,5,"",1,0,'C',0,0);
	$this->cell(14.66,5,"",1,0,'C',0,0);
	$this->cell(14.66,5,"",1,0,'C',0,0);
	}
	
	
	function entete()
	{  
	$this->SetXY(5,$this->GetY()+15);$this->cell(160,5,"PROGRAMME NATIONAL DE SANTE BUCCODENTAIRE EN MILIEU SCOLAIRE",1,0,'C',0,0); $this->cell(40,10,"PAGE ".$this->PageNo().'/{nb}',1,0,'C',0,0);
	$this->SetXY(5,$this->GetY()+5); $this->cell(160,5," PROGRAMME « STOP A LA CARIE » ",1,0,'C',0,0);

	$this->SetXY(5,$this->GetY()+10);$this->cell(40,5,"DSP",1,0,'C',0,0);    $this->cell(40,5,"EPSP",1,0,'C',0,0);$this->cell(40,5,"UDS",1,0,'C',0,0);$this->cell(40,5,"ANNEE SCOLAIRE",1,0,'C',0,0);$this->cell(40,5,"TRIMESTRE",1,0,'C',0,0);
	$this->SetXY(5,$this->GetY()+5); $this->cell(40,5,"DJELFA",1,0,'C',0,0); $this->cell(40,5,"",1,0,'C',0,0);    $this->cell(40,5,"",1,0,'C',0,0);   $this->cell(40,5,"",1,0,'C',0,0);              $this->cell(40,5,"",1,0,'C',0,0);
    }
	
	
	function foot()
	{  
	$this->SetXY(5,$this->GetY()+15); $this->cell(67,10,"Coordinateur de la SBD à l'UDS",1,0,'C',0,0); $this->cell(66,10,"Coordinateur de la SBD à l'EPSP",1,0,'C',0,0);  $this->cell(66,10,"Coordinateur de la SBD à la DSP",1,0,'C',0,0);
	$this->SetXY(5,$this->GetY()+10); $this->cell(67,10,"(Nom, cachet et signature)",1,0,'C',0,0);     $this->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);       $this->cell(66,10,"(Nom, cachet et signature)",1,0,'C',0,0);
	$this->SetXY(5,$this->GetY()+10); $this->cell(67,15,"",1,0,'C',0,0);                               $this->cell(66,15,"",1,0,'C',0,0);                                 $this->cell(66,15,"",1,0,'C',0,0);
	}
	 
	 
	
	 public $nomprenom ="tibaredha";
	 public $db_host="localhost";
	 public $db_name="framework"; 
     public $db_user="root";
     public $db_pass="";
	 public $utf8 = "" ;
	 
	 public $repfr="République algérienne démocratique et populaire";
	 public $mspfr="Ministère de la santé de la population et de la réforme hospitalière";
	 public $dspfr="Direction de la santé et de la population de la wilaya de ";
	
	function headerdc($datejour1,$datejour2,$STRUCTURED){$this->AddPage('P','A4');$this->SetDisplayMode('fullpage','single');$this->SetTitle('Mortalité hospitalière '."Du ".$datejour1." Au ".$datejour2);$this->SetFont('Times', 'B', 11);$this->SetTextColor(0,0,0);$this->SetFillColor(230);$this->SetXY(5,10);$this->cell(200,5,$this->repfr,0,0,'C',1,0);$this->SetXY(5,20);$this->cell(200,5,$this->mspfr,0,0,'C',1,0);$this->SetXY(5,30);$this->cell(200,5,$this->dspfr.': '.$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$STRUCTURED,"idwil"),"WILAYAS"),0,0,'C',1,0);}
	function Footerdc(){$this->SetXY(20,285);$this->SetFont('Arial','I',8);$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');}
	
	//fonctions privées
	function _Arc($x1, $y1, $x2, $y2, $x3, $y3){$h = $this->h;$this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,$x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));}
	function RoundedRect($x, $y, $w, $h, $r, $style = ''){$k = $this->k;$hp = $this->h;if($style=='F')$op='f'; elseif($style=='FD' || $style=='DF') $op='B'; else $op='S';$MyArc = 4/3 * (sqrt(2) - 1);$this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));$xc = $x+$w-$r ;$yc = $y+$r;$this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));$this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);$xc = $x+$w-$r ;$yc = $y+$h-$r;$this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));$this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);$xc = $x+$r ;$yc = $y+$h-$r;$this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));$this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);$xc = $x+$r ;$yc = $y+$r;$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));$this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);$this->_out($op);}
	function Sector($xc, $yc, $r, $a, $b, $style='FD', $cw=true, $o=90){$d0 = $a - $b;if($cw){$d = $b;$b = $o - $a;$a = $o - $d;}else{$b += $o;$a += $o;}while($a<0)$a += 360;while($a>360)$a -= 360;while($b<0)$b += 360;while($b>360)$b -= 360;if ($a > $b)$b += 360;$b = $b/360*2*M_PI;$a = $a/360*2*M_PI;$d = $b - $a;if ($d == 0 && $d0 != 0) $d = 2*M_PI; $k = $this->k;$hp = $this->h;if (sin($d/2))$MyArc = 4/3*(1-cos($d/2))/sin($d/2)*$r; else $MyArc = 0;$this->_out(sprintf('%.2F %.2F m',($xc)*$k,($hp-$yc)*$k));$this->_out(sprintf('%.2F %.2F l',($xc+$r*cos($a))*$k,(($hp-($yc-$r*sin($a)))*$k)));if ($d < M_PI/2){$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),$xc+$r*cos($b),$yc-$r*sin($b));}else{$b = $a + $d/4;$MyArc = 4/3*(1-cos($d/8))/sin($d/8)*$r;$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),$xc+$r*cos($b),$yc-$r*sin($b));$a = $b;$b = $a + $d/4;$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),$xc+$r*cos($b),$yc-$r*sin($b));$a = $b;$b = $a + $d/4;$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),$xc+$r*cos($b),$yc-$r*sin($b));$a = $b;$b = $a + $d/4;$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),$xc+$r*cos($b),$yc-$r*sin($b));}if($style=='F')$op='f';elseif($style=='FD' || $style=='DF')$op='b';else$op='s';$this->_out($op);}
	var $angle=0;
	function Rotate($angle,$x=-1,$y=-1){if($x==-1)$x=$this->x;if($y==-1)$y=$this->y;if($this->angle!=0)$this->_out('Q');$this->angle=$angle;if($angle!=0){$angle*=M_PI/180;$c=cos($angle);$s=sin($angle);$cx=$x*$this->k;$cy=($this->h-$y)*$this->k;$this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));}}
	function RotatedText($x,$y,$txt,$angle){$this->Rotate($angle,$x,$y);$this->Text($x,$y,$txt);$this->Rotate(0);}
	function Polygon($points, $style='D'){if($style=='F')$op = 'f';elseif($style=='FD' || $style=='DF')$op = 'b';else $op = 's';$h = $this->h;$k = $this->k;$points_string = '';for($i=0; $i<count($points); $i+=2){$points_string .= sprintf('%.2F %.2F', $points[$i]*$k, ($h-$points[$i+1])*$k);if($i==0)$points_string .= ' m ';else $points_string .= ' l ';}$this->_out($points_string . $op);}
	function mysqlconnect(){$this->db_host;$this->db_name;$this->db_user;$this->db_pass;$cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());$db  = mysql_select_db($this->db_name,$cnx) ;mysql_query("SET NAMES 'UTF8' ");return $db;}
	function dateFR2US($date){$J=substr($date,0,2);$M=substr($date,3,2); $A=substr($date,6,4);$dateFR2US =  $A."-".$M."-".$J ;return $dateFR2US;}
	function dateUS2FR($date){$J= substr($date,8,2);$M= substr($date,5,2);$A= substr($date,0,4);$dateUS2FR =  $J."/".$M."/".$A ;return $dateUS2FR;}	
	function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring){if (is_numeric($colonevalue) and $colonevalue!=='0') { $this->mysqlconnect();$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );$row=mysql_fetch_object($result);$resultat=$row->$resultatstring;return $resultat;} return $resultat2='??????';}
	function valeurmois($TBL,$COLONE1,$DATEJOUR1,$DATEJOUR2,$STR) {$this->mysqlconnect();$sql = " select * from $TBL  where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' and  STRUCTURED  $STR ";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$OP=mysql_num_rows($requete);mysql_free_result($requete);return $OP;}
	
	//fonctions PUBLICS
	function nbrservicet($datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = " select SERVICEHOSPIT,DINS,STRUCTURED from deceshosp where SERVICEHOSPIT !='0' and (DINS BETWEEN '$datejour1' AND '$datejour2') and STRUCTURED $eph";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function nbrservice($nbrservice,$datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = "select SERVICEHOSPIT,DINS,STRUCTURED from deceshosp where SERVICEHOSPIT=$nbrservice and (DINS BETWEEN '$datejour1' AND '$datejour2') and STRUCTURED $eph";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function nbrservicedsexe($sexe,$datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = "select SEX,DINS,STRUCTURED from deceshosp where SEX = '$sexe' and (DINS BETWEEN '$datejour1' AND '$datejour2') and STRUCTURED $eph ";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function nbrservicedsexex($sexe,$datejour1,$datejour2,$eph,$nbrservice){$this->mysqlconnect();$sql = "select DUREEHOSPIT,SEX,DINS,STRUCTURED from deceshosp where DUREEHOSPIT <= $nbrservice and SEX = '$sexe' and (DINS BETWEEN '$datejour1' AND '$datejour2') and STRUCTURED $eph ";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function nbrserviced($dureehospit,$datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = " select DUREEHOSPIT,DINS,STRUCTURED from deceshosp where DUREEHOSPIT = $dureehospit and (DINS BETWEEN '$datejour1' AND '$datejour2') and  STRUCTURED $eph";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function nbrservicedinf($nbrservice,$datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = " select DUREEHOSPIT,DINS,STRUCTURED from deceshosp where DUREEHOSPIT < $nbrservice and (DINS BETWEEN '$datejour1' AND '$datejour2') and STRUCTURED $eph";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function nbrservicedsup($nbrservice,$datejour1,$datejour2,$eph){$this->mysqlconnect();$sql = " select DUREEHOSPIT,DINS,STRUCTURED from deceshosp where DUREEHOSPIT > $nbrservice and (DINS BETWEEN '$datejour1' AND '$datejour2') and STRUCTURED $eph";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function pie2($data){$xc=$data['x'];$yc=$data['y'];$r=$data['r']+2;if ($data['v1']+$data['v2'] > 0){$tot=$data['v1']+$data['v2'];}else {$tot=1;}$p1=round($data['v1']*100/$tot,2);$p2=round($data['v2']*100/$tot,2);$a1=$p1*3.6;$a2=$a1+($p2*3.6);$this->SetFont('Times', 'BIU', 11);$this->SetXY($xc-30,$yc-25);$this->Cell(0, 5,$data['t0'] ,0, 2, 'L');$this->RoundedRect($xc-30,$yc-25, 100, 47, 2, $style = '');$this->SetFont('Times', 'B', 11);$this->SetTextColor(0,0,0);$this->SetFillColor(120,120,255);$this->Sector($xc,$yc,$r,0,$a1);$this->SetXY($xc+25,$yc-15);$this->cell(10,5,'',1,0,'C',1,0);$this->cell(10,5,$data['t1'],1,0,'C',0,0);$this->cell(20,5,$p1.' %',1,0,'C',0,0);$this->SetFont('Times', 'B', 11);$this->SetTextColor(0,0,0);$this->SetFillColor(230,0,0);$this->Sector($xc,$yc,$r,$a1,$a2);$this->SetXY($xc+25,$yc-5);$this->cell(10,5,'',1,0,'C',1,0);$this->cell(10,5,$data['t2'],1,0,'C',0,0);$this->cell(20,5,$p2.' %',1,0,'C',0,0);$this->SetFont('Times', 'B', 11);$this->SetTextColor(0,0,0);$this->SetFillColor(230);}
	
	//*********************************************************debut revision ************************************************************************//
	function BORDEREAU($titre,$datejour1,$datejour2,$EPH1,$STRUCTURED) 
	{
	$this->headerdc($datejour1,$datejour2,$STRUCTURED); 
	$this->SetXY(5,40);$this->cell(100,5,$this->nbrtostring("structure","id",$STRUCTURED,"structure"),0,0,'L',0,0);$this->SetXY(155,40);$this->cell(50,5,"Le : ".date('d-m-Y'),0,0,'L',0,0);
	$this->SetXY(5,45);$this->cell(100,5,"N°............... / ".date('Y'),0,0,'L',0,0);
	$this->SetXY(40,55);$this->cell(165,5,"A",0,0,'C',0,0);
	$this->SetXY(40,65);$this->cell(165,5,"Monsieur le Directeur de la sante et de la population de la wilaya de ".$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$STRUCTURED,"idwil"),"WILAYAS"),0,0,'C',0,0);$this->SetXY(5,85);$this->cell(200,10,$titre,0,0,'C',1,0);
	$this->RoundedRect(5,5, 200, 285, 2, $style = '');
	$this->RoundedRect(5,108, 15, 130, 2, $style = '');$this->RoundedRect(20,108, 105, 130, 2, $style = '');$this->RoundedRect(20+105,108, 15, 130, 2, $style = '');$this->RoundedRect(20+105+15,108, 65, 130, 2, $style = '');
	$this->SetXY(5,108);$this->cell(15,10,"N°",1,0,'C',1,0);$this->SetXY(5+15,108);$this->cell(105,10,"DESIGNATION",1,0,'C',1,0);$this->SetXY(5+15+105,108);$this->cell(15,10,"NBR",1,0,'C',1,0);$this->SetXY(5+30+105,108);$this->cell(65,10,"OBSERVATION",1,0,'C',1,0);
	$this->SetXY(5+15,128);$this->cell(105,10,"Veuillez trouver ci-joint",0,0,'C',0,0);
	$this->SetXY(5,148);$this->cell(15,10,"1",0,0,'C',0,0);$this->SetXY(5+15,148);$this->cell(105,10,"Certificats de décès",0,0,'L',0,0);$this->SetXY(5+15+105,148);$this->cell(15,10,$this->valeurmois('deceshosp','DINS',$datejour1,$datejour2,$EPH1),0,0,'C',0,0);$this->SetXY(5+30+105,148);$this->cell(65,10,"",0,0,'C',0,0);
	$this->SetXY(5,158);$this->cell(15,10,"2",0,0,'C',0,0);$this->SetXY(5+15,158);$this->cell(105,10,"Liste nominative des décès hospitaliers",0,0,'L',0,0);$this->SetXY(5+15+105,158);$this->cell(15,10,"01",0,0,'C',0,0);$this->SetXY(5+30+105,158);$this->cell(65,10,"Rapport",0,0,'C',0,0);
	$this->SetXY(5,168);$this->cell(15,10,"3",0,0,'C',0,0);$this->SetXY(5+15,168);$this->cell(105,10,"Rapport de la mortatlité hospitalière",0,0,'L',0,0);$this->SetXY(5+15+105,168);$this->cell(15,10,"01",0,0,'C',0,0);$this->SetXY(5+30+105,168);$this->cell(65,10,"Mortalité Hospitalière",0,0,'C',0,0);
	$this->SetXY(5,178);$this->cell(15,10,"4",0,0,'C',0,0);$this->SetXY(5+15,178);$this->cell(105,10,"Support Informatique (CD)",0,0,'L',0,0);$this->SetXY(5+15+105,178);$this->cell(15,10,"01",0,0,'C',0,0);$this->SetXY(5+30+105,178);$this->cell(65,10,"Du ".$this->dateUS2FR($datejour1)." Au ".$this->dateUS2FR($datejour2),0,0,'C',0,0);
	$this->SetXY(5+30+105,250);$this->cell(40,10,"Le Directeur",0,0,'L',0,0);
	$this->SetFont('Times', 'B', 11);
	// $this->Footerdc();
	}
	
	function PAGEDEGARDE($datejour1,$datejour2,$EPH1,$STRUCTURED) 
	{
	$this->headerdc($datejour1,$datejour2,$STRUCTURED); 
	$this->RoundedRect(5,5, 200, 285, 2, $style = '');
	$this->SetFont('Times', 'B', 16);$this->SetTextColor(255,0,0);$this->SetFillColor(230);
	$this->SetXY(5,70);$this->cell(200,5,"Mortalite Intra-Hospitaliere",0,0,'C',1,0);
	$this->SetXY(5,80);$this->cell(200,5,"Du ".$this->dateUS2FR($datejour1)." Au ".$this->dateUS2FR($datejour2),0,0,'C',1,0);
	$this->SetXY(5,90);$this->cell(200,5,$this->nbrtostring("structure","id",$STRUCTURED,"structure"),0,0,'C',1,0);
	$this->SetFont('Times', '', 11);$this->SetTextColor(0,0,0);$this->SetFillColor(230);
	}
	
	function listedeces($STRUCTURED,$datejour1,$datejour2,$login,$type)
	{
		$this->AddPage('L','A4');
		$this->SetDisplayMode('fullpage','single');
		$this->SetTitle('Releve Des Causes De Deces '."Du ".$datejour1." Au ".$datejour2);
		$this->SetFont('Arial','B',10);
		$this->SetTextColor(0,0,0);
		$this->SetFillColor(230);
		$this->SetXY(5,$this->GetY());$this->cell(290,5,$this->repfr,0,0,'C',1,0);
		$this->SetXY(5,$this->GetY()+10);$this->cell(290,5,$this->mspfr,0,0,'C',1,0);$STRUCTUREDX = explode('=',$STRUCTURED);
		$this->SetXY(5,$this->GetY()+10);$this->cell(290,5,$this->dspfr.': '.$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$STRUCTUREDX[1],"idwil"),"WILAYAS"),0,0,'C',1,0);
		if($STRUCTURED =='IS NOT NULL'){$this->SetXY(5,$this->GetY()+15);$this->cell(90,5,"Service Prévention",0,0,'L',0,0);$this->SetXY(205,$this->GetY());$this->cell(90,5," LE : ".date('d-m-Y'),0,0,'C',0,0);$this->SetXY(5,$this->GetY()+5);$this->cell(90,5,"N ____ / ".date('Y'),0,0,'L',0,0);} else {$this->SetXY(5,$this->GetY()+15);$this->cell(90,5,$this->nbrtostring("structure","id",$STRUCTUREDX[1],"structure"),0,0,'L',0,0);$this->SetXY(205,$this->GetY());$this->cell(90,5," LE : ".date('d-m-Y'),0,0,'C',0,0);$this->SetXY(5,$this->GetY()+5);$this->cell(90,5,"SEMEP",0,0,'L',0,0);$this->SetXY(5,$this->GetY()+5);$this->cell(90,5,"N ____ / ".date('Y'),0,0,'L',0,0);}
		
		$this->SetXY(5,$this->GetY()+10);$this->cell(290,5,"RELEVE DES CAUSES DE DECES ",0,0,'C',0,0);
		$this->SetXY(5,$this->GetY()+5);$this->cell(290,5,"Du  ".$this->dateUS2FR($datejour1)."  Au  ".$this->dateUS2FR($datejour2),0,0,'C',0,0);
		$this->SetXY(5,$this->GetY()+5);$this->cell(290,5,"Ref : Circulaire N° 607 du 24 septembre 1994  ",0,0,'C',0,0);
		
		$this->SetFillColor(200 );
	    $this->SetXY(05,$this->GetY()+10);
		$this->cell(10,10,"N°",1,0,'C',1,0);
		$this->cell(20,10,"Date décès",1,0,1,'C',0);
		if ($type=='I') 
		{
			$this->cell(10,10,"Sexe",1,0,'C',1,0);
			$this->cell(10,10,"Age",1,0,'C',1,0);
			$this->cell(30,10,"Résidence ",1,0,'C',1,0);
			$this->cell(25,10,"Profession",1,0,'C',1,0);
			$this->cell(40,10,"Service ",1,0,'C',1,0);
			$this->cell(15,10,"Durée",1,0,'C',1,0);
			$this->cell(126,10,"Cause du décès",1,0,'C',1,0);
		} 
		else 
		{
			$this->cell(70,10,"Nom_Prénom",1,0,'C',1,0);
			$this->cell(10,10,"Sexe",1,0,'C',1,0);
			$this->cell(20,10,"Née le",1,0,'C',1,0);
			$this->cell(10,10,"Age",1,0,'C',1,0);
			$this->cell(45,10,"résidence",1,0,'C',1,0);
			$this->cell(20,10,"Admission",1,0,'C',1,0);
			$this->cell(56,10,"Service ",1,0,'C',1,0);
			$this->cell(15,10,"Durée",1,0,'C',1,0);
			$this->cell(10,10,"CIM",1,0,'C',1,0);
		}
		$this->mysqlconnect();
		$query = "SELECT * FROM deceshosp where DINS BETWEEN '$datejour1' AND '$datejour2' and STRUCTURED $STRUCTURED  order by  DINS ";
		$resultat=mysql_query($query);
		$totalmbr1=mysql_num_rows($resultat);
		$this->SetFont('Arial','',9,'',true);
		$this->SetXY(05,$this->GetY()+10);
		$x=0;
		while($row=mysql_fetch_object($resultat))
		{
			$x=$x+1;
			$this->cell(10,5,$x,1,0,'C',0);
			$this->cell(20,5,$this->dateUS2FR($row->DINS),1,0,'C',0);
			if ($type=='I') 
			{
				$this->cell(10,5,trim($row->SEX),1,0,'C',0);
				if ($row->Years > 0 ){
				$this->cell(10,5,$row->Years." A",1,0,'C',0);} 
				else {
				if ($row->Days <= 30 ) {
				$this->cell(10,5,$row->Days." J",1,0,'C',0);} 
				else{
				$this->cell(10,5,$row->Months." M",1,0,'C',0);} 
				}
				$this->cell(30,5,$this->nbrtostring("com","IDCOM",$row->COMMUNER,"COMMUNE"),1,0,'L',0);
				$this->cell(25,5,$this->nbrtostring("profession","id",$row->Profession,"Profession"),1,0,'L',0);
				$this->cell(40,5,$this->nbrtostring("servicedeces","id",$row->SERVICEHOSPIT,"service"),1,0,'L',0);
				$this->cell(15,5,$row->DUREEHOSPIT.' j',1,0,'C',0);
				$this->cell(126,5,'('.$this->nbrtostring("CIM","row_id",$row->CODECIM,'diag_nom').')_'.$this->nbrtostring("CIM","row_id",$row->CODECIM,'diag_cod'),1,0,'L',0);
			}
			else
			{
				$this->cell(70,5,trim($row->NOM).'_'.strtolower (trim($row->PRENOM)).' ['.strtolower (trim($row->FILSDE)).']',1,0,'L',0);
				$this->cell(10,5,trim($row->SEX),1,0,'C',0);
				$this->cell(20,5,$this->dateUS2FR($row->DATENAISSANCE),1,0,'C',0);
					if ($row->Years > 0 ) 
					{
						$this->cell(10,5,$row->Years." A",1,0,'C',0);
					}
					else 
					{
						if ($row->Days <= 30 ){$this->cell(10,5,$row->Days." J",1,0,'C',0);}else{$this->cell(10,5,$row->Months." M",1,0,'C',0);} 
					}
				$this->cell(45,5,$this->nbrtostring("com","IDCOM",$row->COMMUNER,"COMMUNE"),1,0,'L',0);
				$this->cell(20,5,$this->dateUS2FR($row->DATEHOSPI),1,0,'C',0);
				$this->cell(56,5,$this->nbrtostring("servicedeces","id",$row->SERVICEHOSPIT,"service"),1,0,'L',0);
				$this->cell(15,5,$row->DUREEHOSPIT.' j',1,0,'C',0);
				$this->cell(10,5,$this->nbrtostring("CIM","row_id",$row->CODECIM,'diag_cod'),1,0,'C',0);
			}
			$this->SetXY(5,$this->GetY()+5);
		}
		$this->SetFont('Arial', '',10, '', true);
		$this->SetXY(5,$this->GetY());
		$this->cell(40,05,"TOTAL",1,0,1,'C',0);
		$this->SetXY(45,$this->GetY());
		$this->cell(246,05,$totalmbr1." Deces",1,1,1,'C',0);
		$this->SetXY(190,$this->GetY()+5); 
		$this->cell(90,10,"Le Praticien Responsable ",0,0,'L',0);
		$this->SetXY(190,$this->GetY()+5); 
		$this->cell(90,10,'Dr '.$login,0,0,'L',0);
	    	
	    $querydb= "SELECT COUNT(*) AS nbr_doublon,NOM,PRENOM,FILSDE,STRUCTURED,DINS FROM deceshosp  where STRUCTURED $STRUCTURED  GROUP BY NOM,PRENOM,FILSDE HAVING COUNT(*) > 1 ORDER BY nbr_doublon DESC ";//
		$resultatdb=mysql_query($querydb);
		$totalmbrdb=mysql_num_rows($resultatdb);
		
		if ($totalmbrdb>0) 
		{
			$this->AddPage('L','A4');
			$this->SetDisplayMode('fullpage','single');
			$this->SetTitle('Releve Des Causes De Deces '."Du ".$datejour1." Au ".$datejour2);
			$this->SetFont('Arial','B',10);
			$this->SetTextColor(0,0,0);
			$this->SetFillColor(230);
			$this->SetXY(5,$this->GetY());$this->cell(290,5,$this->repfr,0,0,'C',1,0);
			$this->SetXY(5,$this->GetY()+10);$this->cell(290,5,$this->mspfr,0,0,'C',1,0);$STRUCTUREDX = explode('=',$STRUCTURED);
			$this->SetXY(5,$this->GetY()+10);$this->cell(290,5,$this->dspfr.': '.$this->nbrtostring("wil","IDWIL",$this->nbrtostring("structure","id",$STRUCTUREDX[1],"idwil"),"WILAYAS"),0,0,'C',1,0);
			if($STRUCTURED =='IS NOT NULL'){$this->SetXY(5,$this->GetY()+15);$this->cell(90,5,"Service Prévention",0,0,'L',0,0);$this->SetXY(205,$this->GetY());$this->cell(90,5," LE : ".date('d-m-Y'),0,0,'C',0,0);$this->SetXY(5,$this->GetY()+5);$this->cell(90,5,"N ____ / ".date('Y'),0,0,'L',0,0);} else {$this->SetXY(5,$this->GetY()+15);$this->cell(90,5,$this->nbrtostring("structure","id",$STRUCTUREDX[1],"structure"),0,0,'L',0,0);$this->SetXY(205,$this->GetY());$this->cell(90,5," LE : ".date('d-m-Y'),0,0,'C',0,0);$this->SetXY(5,$this->GetY()+5);$this->cell(90,5,"SEMEP",0,0,'L',0,0);$this->SetXY(5,$this->GetY()+5);$this->cell(90,5,"N ____ / ".date('Y'),0,0,'L',0,0);}
			$this->SetXY(5,$this->GetY()+10);$this->cell(290,5,"RELEVE DES CAUSES DE DECES (EN DOUBLONS)",0,0,'C',0,0);
			$this->SetXY(5,$this->GetY()+5);$this->cell(290,5,"Du  ".$this->dateUS2FR($datejour1)."  Au  ".$this->dateUS2FR($datejour2),0,0,'C',0,0);
			$this->SetXY(5,$this->GetY()+5);$this->cell(290,5,"Ref : Circulaire N° 607 du 24 septembre 1994  ",0,0,'C',0,0);
			$this->SetFillColor(200 );
			$this->SetXY(05,$this->GetY()+15);
			$this->cell(10,10,"N°",1,0,'C',1,0);
			$this->cell(20,10,"Date décès",1,0,'C',1,0);
			$this->cell(245,10,"Nom_Prénom",1,0,'C',1,0);
			$this->cell(10,10,"Nbr",1,0,'C',1,0);
			$this->SetXY(05,$this->GetY()+10);
			$x=0;
			while($rowdb=mysql_fetch_object($resultatdb))
			{
			$this->cell(10,5,$x=$x+1,1,0,'C',0);
			$this->cell(20,5,$this->dateUS2FR($rowdb->DINS),1,0,'C',0);
			$this->cell(245,5,trim($rowdb->NOM).'_'.strtolower (trim($rowdb->PRENOM)).' ['.strtolower (trim($rowdb->FILSDE)).']'.'_('.$rowdb->STRUCTURED.')',1,0,'L',0);
			$this->cell(10,5,$rowdb->nbr_doublon,1,0,'C',0);
			$this->SetXY(5,$this->GetY()+5);
			}
			$this->SetXY(5,$this->GetY());
			$this->cell(285,05,"TOTAL : ".$totalmbrdb,1,0,1,'C',0);
		}
	
	}
	
	
	
	

	
	
	function servicehospitalisation($datejour1,$datejour2,$valeurs,$eph) 
	{ 		
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230);
	$datamf = array();$datamf1 = array();$datamfx = array();$nt=$this->nbrservicet($datejour1,$datejour2,$eph);
	$this->SetXY(5,25+10);$this->cell(285,5,"Cette étude a porté sur ".$nt." décès survenus durant la periode du ".$this->dateUS2FR($datejour1)." au ".$this->dateUS2FR($datejour2)." au niveau de 36 communes ",0,0,'L',0);
	$this->SetXY(5,35+7);$this->cell(95,5,"Répartition des décès par service D'hospitalisation",1,0,'L',1,0);$this->SetXY(105,$this->GetY());$this->cell(100,5,"P % des décès par service D'hospitalisation",1,0,'C',1,0);	
	$this->SetXY(5,35+7+5);$this->cell(10,5,"Num",1,0,'C',1,0);$this->cell(45,5,"Service",1,0,'L',1,0);$this->cell(20,5,"Nbr",1,0,'C',1,0);$this->cell(20,5,"Tx %",1,0,'C',1,0);	
	$this->SetXY(105,$this->GetY());for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	$this->RoundedRect(105,$this->GetY(),100,23*5, 2, $style = '');
	$this->SetFont('Times','B',9);$this->SetXY(05,35+7+10); 
	$this->mysqlconnect();$query = "SELECT * FROM servicedeces ";$resultat=mysql_query($query);$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat)){$n=$this->nbrservice($row->id,$datejour1,$datejour2,$eph);if ($nt>0) {$datamf[$row->id]=round(($n*100)/$nt,2);$datamf1[$row->id]=round(($n*100)/$nt,2);$this->cell(10,5,$datamfx[$row->id]=$row->id,1,0,'C',0);$this->cell(45,5,$row->service,1,0,'L',0);$this->cell(20,5,$n,1,0,'C',0);$this->cell(20,5,round(($n*100)/$nt,2),1,0,'C',0); $this->SetFillColor(120,255,120);$this->SetXY(105,$this->GetY());if ($datamf1[$row->id]>0) {$this->cell($datamf1[$row->id],5,'',1,0,'C',1,0);$this->cell(15,5,$datamf1[$row->id].' %',0,0,'C',0,0);}  else {$this->cell(0.01,5,'',1,0,'C',1,0);$this->cell(15,5,'0 %',0,0,'C',0,0);}  $this->SetFillColor(230);}else{$datamf[$row->id]=0;$datamf1[$row->id]=0;$this->cell(10,5,$datamfx[$row->id]=$row->id,1,0,'C',0);$this->cell(45,5,$row->service,1,0,'L',0);$this->cell(20,5,$n,1,0,'C',0); $this->cell(20,5,0,1,0,'C',0);$this->SetXY(105,$this->GetY());$this->cell(0.01,5,'',1,0,'C',1,0);$this->cell(15,5,'0 %',0,0,'C',0,0);} $this->SetXY(5,$this->GetY()+5); }
	$this->SetXY(5,$this->GetY()); 
	$this->cell(55,5,"Total",1,0,'L',1,0);$this->cell(20,5,$nt,1,0,'C',1,0); 	
	if($nt>0) {$this->cell(20,5,round(($nt*100)/$nt,2),1,0,'C',1,0);} else {$this->cell(20,5,0,1,0,'C',1,0);}	
	$this->SetXY(105,$this->GetY());for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	$this->SetFont('Times','B',10);$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"1-Répartition des décès par service : ",0,0,'L',0);
	rsort($datamf);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la plus élevée est : ".$datamf[0]."%",0,0,'L',0);
	sort($datamf);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la moins élevée est : ".$datamf[0]."%",0,0,'L',0);
	$mas=$this->nbrservicedsexe('M',$datejour1,$datejour2,$eph);
	$fem=$this->nbrservicedsexe('F',$datejour1,$datejour2,$eph);
	$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"2-Répartition des décès par sexe : ",0,0,'L',0);
	$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"La répartition des ".$nt." décès enregistrés montre que :",0,0,'L',0);
	$this->SetXY(5,$this->GetY()+5);if ($nt > 0){$this->cell(285,5,round(($mas/$nt)*100,2)."% des décès touche les hommes. ",0,0,'L',0);}else{$this->cell(285,5,"0% des décès touche les hommes. ",0,0,'L',0);}
	$this->SetXY(5,$this->GetY()+5);if ($nt > 0){$this->cell(285,5,round(($fem/$nt)*100,2)."% des décès touche les femmes. ",0,0,'L',0);}else{$this->cell(285,5,"0% des décès touche les femmes. ",0,0,'L',0);}
	$this->SetXY(5,$this->GetY()+5);if($fem > 0){$this->cell(285,5,"avec un sexe ratio de ".round(($mas/$fem),2),0,0,'L',0);} else {$this->cell(285,5,"avec un sexe ratio de 0 ",0,0,'L',0);}
	//$this->barservice(135,150,$datamf1,"I-Distribution des décès par Service D'hospitalisation"); 	
	$pie2 = array("x" => 135, "y" => $this->GetY()-15, "r" => 17,"v1" =>$mas ,"v2" =>$fem ,"t0" => "Distribution des décès par sexe ","t1" => "M","t2" => "F");
	$this->pie2($pie2);
	}
	
	
	function dureehospitalisation1($datejour1,$datejour2,$valeurs,$eph,$tages) 
	{
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230); 
	$datan = array();for ($i = 0; $i <= $tages; $i+= 1){$datan[$i]= $this->nbrserviced($i,$datejour1,$datejour2,$eph);}
	$datap = array();for ($i = 0; $i <= $tages; $i+= 1) {if (array_sum($datan)>0) {$datap[$i]= round(($datan[$i]*100)/array_sum($datan),2);} else {$datap[$i]= 0;} }
	$this->SetXY(5,25+10);$this->cell(285,5,"Cette étude a porté sur ".array_sum($datan)." décès survenus durant la periode du ".$this->dateUS2FR($datejour1)." au ".$this->dateUS2FR($datejour2)." au niveau de 36 communes ",0,0,'L',0);
	$this->SetXY(5,35+7);$this->cell(95,5,"Répartition des décès par Durée D'hospitalisation ",1,0,'L',1,0);$this->SetXY(105,$this->GetY());$this->cell(100,5,"P % des décès par Durée D'hospitalisation ",1,0,'C',1,0);
	$this->SetXY(5,35+7+5);$this->cell(55,5,"Nombre de jours",1,0,'C',1,0);$this->cell(20,5,"Nbr",1,0,'C',1,0);$this->cell(20,5,"P %",1,0,'C',1,0);
	$this->SetXY(105,$this->GetY());for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
    $this->RoundedRect(105,$this->GetY(),100,($tages+3)*5, 2, $style = '');
	for ($i = 0; $i <= $tages; $i+= 1)
	{
	$this->SetXY(5,$this->GetY()+5);
	$this->cell(55,5,$i,1,0,'C',1,0);
	$this->cell(20,5,$datan[$i],1,0,'C',0);
	$this->cell(20,5,$datap[$i],1,0,'C',1,0);
	$this->SetFillColor(120,255,120);
	if ($datap[$i]>0){$this->SetXY(105,$this->GetY());$this->cell($datap[$i],5,'',1,0,'C',1,0);$this->cell(15,5,$datap[$i].' %',0,0,'C',0,0);} 
	else 
	{$this->SetXY(105,$this->GetY());$this->cell(0.01,5,'',1,0,'C',1,0);$this->cell(15,5,$datap[$i].' %',0,0,'C',0,0);}$this->SetFillColor(230);
	}
	$this->SetXY(5,$this->GetY()+5);$this->cell(55,5,"Total",1,0,'C',1,0);$this->cell(20,5,array_sum($datan),1,0,'C',1,0);if(array_sum($datan)>0) {$this->cell(20,5,"100%",1,0,'C',1,0);} else {$this->cell(20,5,"0%",1,0,'C',1,0);} 				
	$this->SetXY(105,$this->GetY());for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"1-Répartition des décès par Durée D'hospitalisation : ",0,0,'L',0);
	rsort($datap);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la plus  élevée est : ".$datap[0]."%",0,0,'L',0);
	sort($datap); $this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la moins élevée est : ".$datap[0]."%",0,0,'L',0);
	$mas=$this->nbrservicedsexex('M',$datejour1,$datejour2,$eph,30);$fem=$this->nbrservicedsexex('F',$datejour1,$datejour2,$eph,30);
	$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"2-Répartition des décès par sexe : ",0,0,'L',0);
	$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"La répartition des ".array_sum($datan)." décès enregistrés montre que :",0,0,'L',0);
	if(array_sum($datan)>0) {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round(($mas/array_sum($datan))*100,2)."% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round(($fem/array_sum($datan))*100,2)."% des décès touche les femmes. ",0,0,'L',0);} else {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les femmes. ",0,0,'L',0);} 
	$this->SetXY(5,$this->GetY()+5);if ($fem > 0){$this->cell(285,5,"avec un sexe ratio de ".round(($mas/$fem),2),0,0,'L',0);}else{$this->cell(285,5,"avec un sexe ratio de 0 ",0,0,'L',0);}
	$pie2 = array("x" => 135,"y" => $this->GetY()-15, "r" => 17,"v1" =>$mas ,"v2" =>$fem ,"t0" => "Distribution des décès par sexe ","t1" => "M","t2" => "F");$this->pie2($pie2);
	$this->SetXY(5,$this->GetY()+30);$this->cell(285,5," NB : [durée < 0 = ".$this->nbrservicedinf(0,$datejour1,$datejour2,$eph)."] [durée > 30 = ".$this->nbrservicedsup(30,$datejour1,$datejour2,$eph)."]",0,0,'L',0);
	}
	
	
	function T2F20x($datejour1,$datejour2,$EPH1,$tages)  
    {
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230); 
	$mr = array();$fr = array();$mfrp = array();
	for ($i = 0; $i <= $tages; $i+= 5) {$mr[$i]=$this->AGESEXE("years",$i,$i+4,$datejour1,$datejour2,'M',$EPH1);$fr[$i]=$this->AGESEXE("years",$i,$i+4,$datejour1,$datejour2,'F',$EPH1);}
	$mf=array_sum($mr)+array_sum($fr);
	$this->SetXY(5,25+10);$this->cell(285,5,"Cette étude a porté sur ".$mf." décès survenus durant la periode du ".$this->dateUS2FR($datejour1)." au ".$this->dateUS2FR($datejour2)." au niveau de 36 communes ",0,0,'L',0);
	$this->SetXY(5,42);                 $this->cell(200,05,"Repartition des décès par tranche d'age et sexe (global)",1,0,'L',1,0);
	$this->SetXY(5,$this->GetY()+5);    $this->cell(15,15,"Age",1,0,'C',1,0);
	$this->SetXY(5+15,$this->GetY());   $this->cell(80,10,"Sexe",1,0,'C',1,0);$this->SetXY(105,$this->GetY());$this->cell(100,10,"P % des décès par tranche d'age et sexe",1,0,'C',1,0);
	$this->SetXY(5+15,$this->GetY()+10);$this->cell(25,5,"M",1,0,'C',1,0); $this->cell(25,5,"F",1,0,'C',1,0);$this->cell(15,5,"T",1,0,'C',1,0);$this->cell(15,5,'P %',1,0,'C',1,0);
	$this->SetXY(105,$this->GetY());for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	$this->RoundedRect(105,$this->GetY(), 100, (($tages/5)+3)*5, 2, $style = '');
	for ($i = 0; $i <= $tages; $i+= 5) 
	{
		$m=$this->AGESEXE("years",$i,$i+4,$datejour1,$datejour2,'M',$EPH1);
		$f=$this->AGESEXE("years",$i,$i+4,$datejour1,$datejour2,'F',$EPH1);
		if($mf>0){$mfp=round(((($m+$f)*100)/$mf),2);$mfrp[$i]=round(((($m+$f)*100)/$mf),2);} else {$mfp=0;$mfrp[$i]=0;}
		$this->SetXY(5,$this->GetY()+5);
		$this->cell(15,5,$i."-".($i+4),1,0,'C',1,0);
		$this->cell(25,5,$m,1,0,'C',0,0); 
		$this->cell(25,5,$f,1,0,'C',0,0);
		$this->cell(15,5,$m+$f,1,0,'C',0,0);
		$this->cell(15,5,$mfp.' %',1,0,'C',1,0);
		$this->SetFillColor(120,255,120);
		if ($mfp>0){$this->SetXY(105,$this->GetY());$this->cell($mfp,5,'',1,0,'C',1,0);$this->cell(15,5,$mfp.' %',0,0,'C',0,0);} else {$this->SetXY(105,$this->GetY());$this->cell(0.01,5,'',1,0,'C',1,0);$this->cell(15,5,$mfp.' %',0,0,'C',0,0);}
		$this->SetFillColor(230);
	}
	$this->SetXY(5,$this->GetY()+5);if($mf>0){$this->cell(15,5,"Total",1,0,'C',1,0);$this->cell(25,5,array_sum($mr),1,0,'C',1,0);$this->cell(25,5,array_sum($fr),1,0,'C',1,0);$this->cell(15,5,$mf,1,0,'C',1,0);$this->cell(15,5,'100 %',1,0,'C',1,0);} else {$this->cell(15,5,"Total",1,0,'C',1,0);$this->cell(25,5,array_sum($mr),1,0,'C',1,0); $this->cell(25,5,array_sum($fr),1,0,'C',1,0);$this->cell(15,5,$mf,1,0,'C',1,0);$this->cell(15,5,'0 %',1,0,'C',1,0);}
	$this->SetXY(105,$this->GetY());for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	$this->SetXY(5,$this->GetY()+10);  $this->cell(285,5,"1-Répartition des décès par sexe : ",0,0,'L',0);
	$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"La répartition des ".$mf." décès enregistrés montre que :",0,0,'L',0);
	if($mf>0) {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round((array_sum($mr)/$mf)*100,2)."% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round((array_sum($fr)/$mf)*100,2)."% des décès touche les femmes. ",0,0,'L',0);}else {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les femmes. ",0,0,'L',0);}
	if (array_sum($fr) > 0){$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"avec un sexe ratio de ".round((array_sum($mr)/array_sum($fr)),2),0,0,'L',0);}else{$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"avec un sexe ratio de 0 ",0,0,'L',0);}
	$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"2-Répartition des décès par tranche d'âge : ",0,0,'L',0);
	rsort($mfrp);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la plus élevée est : ".$mfrp[0]."%",0,0,'L',0);
	sort($mfrp);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la moins élevée est : ".$mfrp[0]."%",0,0,'L',0);
	$pie2 = array("x" => 135, "y" => $this->GetY()-15, "r" => 17,"v1" => array_sum($mr),"v2" => array_sum($fr),"t0" => "Distribution des décès par sexe ","t1" => "M","t2" => "F");$this->pie2($pie2);
	}
	
	
	
	function T2F20xpn($datejour1,$datejour2,$EPH1,$tages) 
    {
	$this->SetFont('Times', 'B', 10);$this->SetTextColor(0,0,0);$this->SetFillColor(230); 
	$mr = array();$fr = array();$mfrp = array();
	for ($i = 0; $i <= $tages; $i+= 1) {$mr[$i]=$this->AGESEXE("Days",$i,$i,$datejour1,$datejour2,'M',$EPH1);$fr[$i]=$this->AGESEXE("Days",$i,$i,$datejour1,$datejour2,'F',$EPH1);}
	$mf=array_sum($mr)+array_sum($fr);
	$this->SetXY(5,25+10);$this->cell(285,5,"Cette étude a porté sur ".$mf." décès survenus durant la periode du ".$this->dateUS2FR($datejour1)." au ".$this->dateUS2FR($datejour2)." au niveau de 36 communes ",0,0,'L',0);
	$this->SetXY(5,42);                 $this->cell(200,05,"Repartition des décès par age en jours et sexe ",1,0,'L',1,0);
	$this->SetXY(5,$this->GetY()+5);    $this->cell(15,15,"Age",1,0,'C',1,0);$this->SetXY(5+15,$this->GetY());   $this->cell(75+5,10,"Sexe",1,0,'C',1,0);$this->SetXY(105,$this->GetY());$this->cell(100,10,"P % des décès par age en jours et sexe ",1,0,'C',1,0);
	$this->SetXY(5+15,$this->GetY()+10);$this->cell(25,5,"M",1,0,'C',1,0); $this->cell(25,5,"F",1,0,'C',1,0);$this->cell(15,5,"T",1,0,'C',1,0);$this->cell(15,5,'P %',1,0,'C',1,0);
	$this->SetXY(105,$this->GetY());for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	$this->RoundedRect(105,$this->GetY(), 100, ($tages+3)*5, 2, $style = '');
	for ($i = 0; $i <= $tages; $i+= 1){$m=$this->AGESEXE("Days",$i,$i,$datejour1,$datejour2,'M',$EPH1);$f=$this->AGESEXE("Days",$i,$i,$datejour1,$datejour2,'F',$EPH1);if($mf>0){$mfp=round(((($m+$f)*100)/$mf),2);$mfrp[$i]=round(((($m+$f)*100)/$mf),2);} else {$mfp=0;$mfrp[$i]=0;}$this->SetXY(5,$this->GetY()+5);$this->cell(15,5,$i,1,0,'C',1,0); $this->cell(25,5,$m,1,0,'C',0,0); $this->cell(25,5,$f,1,0,'C',0,0);$this->cell(15,5,$m+$f,1,0,'C',0,0);$this->cell(15,5,$mfp.' %',1,0,'C',1,0);$this->SetFillColor(120,255,120);if ($mfp>0){$this->SetXY(105,$this->GetY());$this->cell($mfp,5,'',1,0,'C',1,0);$this->cell(15,5,$mfp.' %',0,0,'C',0,0);} else {$this->SetXY(105,$this->GetY());$this->cell(0.01,5,'',1,0,'C',1,0);$this->cell(15,5,$mfp.' %',0,0,'C',0,0);}$this->SetFillColor(230);}
	$this->SetXY(5,$this->GetY()+5);if($mf>0){$this->cell(15,5,"Total",1,0,'C',1,0);$this->cell(25,5,array_sum($mr),1,0,'C',1,0); $this->cell(25,5,array_sum($fr),1,0,'C',1,0);$this->cell(15,5,$mf,1,0,'C',1,0);$this->cell(15,5,'100 %',1,0,'C',1,0);} else {$this->cell(15,5,"Total",1,0,'C',1,0);$this->cell(25,5,array_sum($mr),1,0,'C',1,0); $this->cell(25,5,array_sum($fr),1,0,'C',1,0);$this->cell(15,5,$mf,1,0,'C',1,0);$this->cell(15,5,'0 %',1,0,'C',1,0);}
	$this->SetXY(105,$this->GetY());for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	$this->SetXY(5,$this->GetY()+10);  $this->cell(285,5,"1-Répartition des décès par sexe : ",0,0,'L',0);
	$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"La répartition des ".$mf." décès enregistrés montre que :",0,0,'L',0);
	if($mf>0) {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round((array_sum($mr)/$mf)*100,2)."% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,round((array_sum($fr)/$mf)*100,2)."% des décès touche les femmes. ",0,0,'L',0);}else {$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les hommes. ",0,0,'L',0);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"0% des décès touche les femmes. ",0,0,'L',0);}
	if (array_sum($fr) > 0){$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"avec un sexe ratio de ".round((array_sum($mr)/array_sum($fr)),2),0,0,'L',0);}else{$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"avec un sexe ratio de 0 ",0,0,'L',0);}
	$this->SetXY(5,$this->GetY()+10);$this->cell(285,5,"2-Répartition des décès par âge en jours : ",0,0,'L',0);
	rsort($mfrp);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la plus élevée est : ".$mfrp[0]."%",0,0,'L',0);
	sort($mfrp);$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la moins élevée est : ".$mfrp[0]."%",0,0,'L',0);
	$pie2 = array("x" => 135, "y" => $this->GetY()-15, "r" => 17,"v1" => array_sum($mr),"v2" => array_sum($fr),"t0" => "Distribution des décès par sexe ","t1" => "M","t2" => "F");$this->pie2($pie2);
	}
    //sig 
	function deceswil($DATEJOUR1,$DATEJOUR2,$WILAYAR,$STRUCTURED) {$this->mysqlconnect();$sql = " select STRUCTURED,WILAYAR,DINS from deceshosp where STRUCTURED $STRUCTURED and (WILAYAR = $WILAYAR) and   (DINS BETWEEN '$DATEJOUR1' AND '$DATEJOUR2') ";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$OP=mysql_num_rows($requete);mysql_free_result($requete);return $OP;}
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
	$this->RoundedRect($x-30,$y-108, 100, (36*5)+7, 2, $style = '');
	$this->SetFont('Arial', '',8);$this->SetTextColor(255,0,0);
	$this->SetXY($x-30,57);$this->cell(100,05,$titre,1,0,'C',1,0);
	$this->SetTextColor(0,0,0);$this->SetFillColor(120,255,120);
	// $this->SetXY($x-30,$this->GetY()+1);
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
		$this->cell(15,4.5,$nbrct,1,0,'C',1,0);if ($nbrcp>0){$lx=$nbrcp;}else {$lx=0.1;} $this->SetFont('Times', 'B', 8); $this->SetTextColor(0,0,0);$this->SetFillColor(120,255,120);$this->SetXY($this->GetX()+5,$this->GetY());$this->cell($lx,4.5,"",1,0,'C',1,0);$this->SetFillColor(230);$this->cell(15,4.5,$lx." %",0,0,'R',0,0);
		$this->SetFont('Times', 'B', 11);$this->SetXY(5,$this->GetY()+4.5); 
	}
	$this->SetXY(5,$this->GetY());
	$this->cell(50,5,"Total ".$totalmbr." Communes : ",1,0,'C',1,0);	    
	$this->cell(15,5,array_sum($nbrc1),1,0,'C',1,0);
	$this->cell(15,5,"100 %",1,0,'C',1,0);
	$this->cell(15,5,round((array_sum($nbrc1)*1000)/array_sum($tpop),2),1,0,'C',1,0);
	$this->SetFillColor(230);$this->SetFont('Times', 'B', 8);
	$this->SetXY($this->GetX()+5,$this->GetY());
	for ($i = 10; $i <= 100; $i+= 10){$this->cell(10,5,$i,1,0,'R',0);} 
	$this->SetFont('Times', 'B', 11);
	
	
	$this->barservicedcommune(135,150,$nbrp,"Distribution des décès par communes de residences");
	
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
		$req="SELECT STRUCTURED,DINS FROM deceshosp where STRUCTURED $EPH1 and  DINS BETWEEN '$datejour1' AND '$datejour2'";$query1 = mysql_query($req);$totalmbr11=mysql_num_rows($query1);
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
		$req="SELECT STRUCTURED,DINS FROM deceshosp where STRUCTURED $EPH1 and  DINS BETWEEN '$datejour1' AND '$datejour2' ";
		$query1 = mysql_query($req);   
		$totalmbr11=mysql_num_rows($query1);
		$query="SELECT CODECIM,count(CODECIM)as nbr,STRUCTURED,DINS FROM deceshosp where STRUCTURED $EPH1 and  DINS BETWEEN '$datejour1' AND '$datejour2' GROUP BY CODECIM  order by nbr desc "; //    % %will search form 0-9,a-z            
		$resultat=mysql_query($query);
		$totalmbr1=mysql_num_rows($resultat);
		while($row=mysql_fetch_object($resultat))
		{
			$this->SetFont('Times', '', 10);
			$this->cell(10,5,trim($this->nbrtostring('cim','row_id',$row->CODECIM,'diag_cod')),1,0,'C',0);
			$this->cell(165,5,$this->nbrtostring('cim','row_id',$row->CODECIM,'diag_nom') ,1,0,'L',0);
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
    function bar7($x,$y,$a,$b,$c,$d,$e,$f,$g,$titre)
    {
	if($a+$b+$c+$d+$e+$f+$g>0){$total=$a+$b+$c+$d+$e+$f+$g;}else{$total=1;}
	$ap=round($a*100/$total,2);
	$bp=round($b*100/$total,2);
	$cp=round($c*100/$total,2);
	$dp=round($d*100/$total,2);
	$ep=round($e*100/$total,2);
	$fp=round($f*100/$total,2);
	$gp=round($g*100/$total,2);
	$this->SetFont('Times', 'BIU', 11);
	$this->SetXY($x-20,$y-108);$this->Cell(0, 5,$titre ,0, 2, 'L');
	$this->RoundedRect($x-20,$y-108, 90, 130, 2, $style = '');
	$this->SetFont('Times', 'B',08);$this->SetFillColor(120,255,120);
	// $this->SetXY($x-5,$y);$this->cell(0.5,-100,'',1,0,'L',1,0);
	// $this->SetXY($x-19,$y-100);$this->cell(13,5,'100 % ',1,0,'L',1,0);
	// $this->SetXY($x-19,$y-50);$this->cell(13,5,'50 % ',1,0,'L',1,0);
	// $this->SetXY($x-19,$y-05);$this->cell(13,5,'00 % ',1,0,'L',1,0);
	$w=12.80;
	$this->SetXY($x-20,$y+10);   
	$this->cell($w,-$ap,$ap,1,0,'C',1,0);        
	$this->cell($w,-$bp,$bp,1,0,'C',1,0);
	$this->cell($w,-$cp,$cp,1,0,'C',1,0);
	$this->cell($w,-$dp,$dp,1,0,'C',1,0);
	$this->cell($w,-$ep,$ep,1,0,'C',1,0);
	$this->cell($w,-$fp,$fp,1,0,'C',1,0);
	$this->cell($w,-$gp,$gp,1,0,'C',1,0);
	$this->SetXY($x-20,$y+12);    
	$this->cell($w,5,'01',1,0,'C',0,0);
	$this->cell($w,5,'02',1,0,'C',0,0);
	$this->cell($w,5,'03',1,0,'C',0,0);
	$this->cell($w,5,'04',1,0,'C',0,0);
	$this->cell($w,5,'05',1,0,'C',0,0);
	$this->cell($w,5,'06',1,0,'C',0,0);
	$this->cell($w,5,'07',1,0,'C',0,0);
	$this->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$this->SetTextColor(0,0,0);//text noire
	$this->SetFont('Times', 'B', 11);
	}
	
	function AGESEXEMM($colone1,$colone2,$colone3,$datejour1,$datejour2,$SEXEDNR,$STRUCTURED){$this->mysqlconnect();$sql = " select * from deceshosp where  ($colone1 >=$colone2  and $colone1 <=$colone3)  and (DINS BETWEEN '$datejour1' AND '$datejour2') and (SEX='$SEXEDNR' and STRUCTURED $STRUCTURED )  and DECEMAT=1  ";$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());$collecte=mysql_num_rows($requete);mysql_free_result($requete);return $collecte;}
	function dataMM($x,$y,$colone1,$TABLE,$DINS,$COMMUNER,$datejour1,$datejour2,$STRUCTURED) 
	{
	$T2F20=array(
	"xt" => $x,
	"yt" => $y,
	"wc" => "",
	"hc" => "",
	"tt" => "Repartition des deces Maternels",
	"tc" => "Effectif",
	"tc1" =>"Total",
	"tc3" =>"F",
	"tc5" =>"Total",
	"1MM"  => $this->AGESEXEMM($colone1,15,19,$datejour1,$datejour2,'F',$STRUCTURED), 
	"2MM"  => $this->AGESEXEMM($colone1,20,24,$datejour1,$datejour2,'F',$STRUCTURED), 
	"3MM"  => $this->AGESEXEMM($colone1,25,29,$datejour1,$datejour2,'F',$STRUCTURED), 
	"4MM"  => $this->AGESEXEMM($colone1,30,34,$datejour1,$datejour2,'F',$STRUCTURED),  
	"5MM"  => $this->AGESEXEMM($colone1,35,39,$datejour1,$datejour2,'F',$STRUCTURED), 			
	"6MM"  => $this->AGESEXEMM($colone1,40,44,$datejour1,$datejour2,'F',$STRUCTURED), 					
	"7MM"  => $this->AGESEXEMM($colone1,45,49,$datejour1,$datejour2,'F',$STRUCTURED), 
	"T" =>'1',
	"tl" =>"Age",
	"1MF"  => '15-19',  
	"2MF"  => '20-24',   
	"3MF"  => '25-29',  
	"4MF"  => '30-34',   
	"5MF"  => '35-39',
	"6MF"  => '40-44',
	"7MF"  => '45-49'	
	);
	return $T2F20;
	}	
    function T2F20MM($data,$datejour1,$datejour2)
    {
	$this->SetXY($data['xt'],$data['yt']);      $this->cell(90+15,05,$data['tt'],1,0,'L',1,0);
	$this->SetXY($data['xt'],$this->GetY()+5);  $this->cell(15,15,$data['tl'],1,0,'C',1,0);
	$this->SetXY($data['xt']+15,$this->GetY()); $this->cell(75+15,10,$data['tc'],1,0,'C',1,0);
	$this->SetXY($data['xt']+15,$this->GetY()+10);$this->cell(75,5,$data['tc1'],1,0,'C',1,0); 
	$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,'P %',1,0,'C',1,0);
	$TM=$data['1MM']+$data['2MM']+$data['3MM']+$data['4MM']+$data['5MM']+$data['6MM']+$data['7MM'];
	if($TM>0){$T=$TM;}else{$T=1;}
	$datamf = array($data['1MM'],$data['2MM'],$data['3MM'],$data['4MM'],$data['5MM'],$data['6MM'],$data['7MM']);
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,$data['1MF'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());    $this->cell(75,5,$data['1MM'],1,0,'C',0,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['1MM'])/$T)*100),2).' %',1,0,'R',1,0);        
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,$data['2MF'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());    $this->cell(75,5,$data['2MM'],1,0,'C',0,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['2MM'])/$T)*100),2).' %',1,0,'R',1,0);        
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,$data['3MF'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());    $this->cell(75,5,$data['3MM'],1,0,'C',0,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['3MM'])/$T)*100),2).' %',1,0,'R',1,0);        
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,$data['4MF'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());    $this->cell(75,5,$data['4MM'],1,0,'C',0,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['4MM'])/$T)*100),2).' %',1,0,'R',1,0);        
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,$data['5MF'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());    $this->cell(75,5,$data['5MM'],1,0,'C',0,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['5MM'])/$T)*100),2).' %',1,0,'R',1,0);        
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,$data['6MF'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());    $this->cell(75,5,$data['6MM'],1,0,'C',0,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['6MM'])/$T)*100),2).' %',1,0,'R',1,0);        
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,$data['7MF'],1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());    $this->cell(75,5,$data['7MM'],1,0,'C',0,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($data['7MM'])/$T)*100),2).' %',1,0,'R',1,0);        
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,'Total',1,0,'C',1,0);$this->SetXY($data['xt']+15,$this->GetY());         $this->cell(75,5,$TM,1,0,'C',1,0);$this->SetXY($data['xt']+75+15,$this->GetY());$this->cell(15,5,round(((($TM)/$T)*100),2).' %',1,0,'R',1,0); 	                                                                
	$this->SetXY($data['xt'],$this->GetY()+5); $this->cell(15,5,'P %',1,0,'C',1,0);      
	$this->SetXY($data['xt']+15,$this->GetY());      $this->cell(75,5,round(($TM/$T)*100,2),1,0,'C',1,0);
	$this->SetXY($data['xt']+75+15,$this->GetY());   $this->cell(15,5,'***',1,0,'C',1,0); 	                                                                
	$this->SetXY(5,25+10);$this->cell(285,5,"Cette étude a porté sur ".$T." décès survenus durant la periode du ".$this->dateUS2FR($datejour1)." au ".$this->dateUS2FR($datejour2)." au niveau de 36 communes ",0,0,'L',0);
	$this->SetXY(5,100+30);$this->cell(285,5,"1-Répartition des décès par tranche d'âge : ",0,0,'L',0);
	rsort($datamf);
	$this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la plus élevée est : ".round($datamf[0]*100/$T,2)."%",0,0,'L',0);
    sort($datamf);
    $this->SetXY(5,$this->GetY()+5);$this->cell(285,5,"la proportion des décès la moins élevée est : ".round($datamf[0]*100/$T,2)."%",0,0,'L',0);
	$TA1=$data['1MM'];
	$TA2=$data['2MM'];
	$TA3=$data['3MM'];
	$TA4=$data['4MM'];
	$TA5=$data['5MM'];
	$TA6=$data['6MM'];
	$TA7=$data['7MM'];
	$this->bar7(135,150,$TA1,$TA2,$TA3,$TA4,$TA5,$TA6,$TA7,'Distribution des décès par tranche d\'age en Annee'); 
	}
    //*********************************************************fin revision ************************************************************************//	
	
}