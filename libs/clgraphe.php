<?php

class clgraphe  {
	
	public $db_host;
	public $db_name;   
	public $db_user;
	public $db_pass;
	
	function __construct() {
	$this->db_host=DB_HOST;
	$this->db_name=DB_NAME;   
	$this->db_user=DB_USER;
	$this->db_pass=DB_PASS;
	}
	
	function mysqlconnectx()
	{
	$cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $db;
	}
	
	function valeurmultigraphe($TBL,$COLONE1,$DATEJOUR1,$DATEJOUR2,$COLONE2,$VALEUR2,$structure) 
	{
	$this->mysqlconnectx();
	$sql = " select $COLONE1,$COLONE2 from $TBL where STRUCTURED $structure	and	$COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2'  AND $COLONE2='$VALEUR2' ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}

	function multigraphe($x,$y,$TITRE,$TBL,$COL,$COLONE,$VALEUR1,$VALEUR2,$structure) //,$data$data[$DATE-4]
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$dataSet = new XYSeriesDataSet();
	$fichier='./CHART/demo/generated/demo7.png';
	$DATE=date("Y");
	$serie1 = new XYDataSet();
	
	$serie1->addPoint(new Point($DATE-9,$this->valeurmultigraphe($TBL,$COL,($DATE-9)."-01-01",($DATE-9)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-8,$this->valeurmultigraphe($TBL,$COL,($DATE-8)."-01-01",($DATE-8)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-7,$this->valeurmultigraphe($TBL,$COL,($DATE-7)."-01-01",($DATE-7)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-6,$this->valeurmultigraphe($TBL,$COL,($DATE-6)."-01-01",($DATE-6)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-5,$this->valeurmultigraphe($TBL,$COL,($DATE-5)."-01-01",($DATE-5)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-4,$this->valeurmultigraphe($TBL,$COL,($DATE-4)."-01-01",($DATE-4)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-3,$this->valeurmultigraphe($TBL,$COL,($DATE-3)."-01-01",($DATE-3)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-2,$this->valeurmultigraphe($TBL,$COL,($DATE-2)."-01-01",($DATE-2)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-1,$this->valeurmultigraphe($TBL,$COL,($DATE-1)."-01-01",($DATE-1)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-0,$this->valeurmultigraphe($TBL,$COL,($DATE-0)."-01-01",($DATE-0)."-12-31",$COLONE,$VALEUR1,$structure)));
	$dataSet->addSerie($VALEUR1, $serie1);
	
	$serie2 = new XYDataSet();
	$serie2->addPoint(new Point($DATE-9, $this->valeurmultigraphe($TBL,$COL,($DATE-9)."-01-01",($DATE-9)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-8, $this->valeurmultigraphe($TBL,$COL,($DATE-8)."-01-01",($DATE-8)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-7, $this->valeurmultigraphe($TBL,$COL,($DATE-7)."-01-01",($DATE-7)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-6, $this->valeurmultigraphe($TBL,$COL,($DATE-6)."-01-01",($DATE-6)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-5, $this->valeurmultigraphe($TBL,$COL,($DATE-5)."-01-01",($DATE-5)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-4, $this->valeurmultigraphe($TBL,$COL,($DATE-4)."-01-01",($DATE-4)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-3, $this->valeurmultigraphe($TBL,$COL,($DATE-3)."-01-01",($DATE-3)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-2, $this->valeurmultigraphe($TBL,$COL,($DATE-2)."-01-01",($DATE-2)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-1, $this->valeurmultigraphe($TBL,$COL,($DATE-1)."-01-01",($DATE-1)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-0, $this->valeurmultigraphe($TBL,$COL,($DATE-0)."-01-01",($DATE-0)."-12-31",$COLONE,$VALEUR2,$structure)));
	$dataSet->addSerie($VALEUR2, $serie2);
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphCaptionRatio(0.65);
	$chart->setTitle($TITRE.date("d-m-Y"));
	$chart->render($fichier);	
	echo '<img id ="image"  alt="****"  src="'.URL.$fichier.'" style="border: 2px solid green;"/>';
	}
	
	
	
	
	
	
	
	function valeur($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
	{
	$this->mysqlconnectx();
	$sql = " select * from $TBL  where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' and  STRUCTURED $STR and DECEMAT $SRS ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function mois($x,$y,$TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR) 
	{
	include "./chart/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./chart/demo/generated/demo1.png';
	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("JAN", $this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-01-01",$ANNEE."-01-31",$IND,$STR) ));
	$dataSet->addPoint(new Point("FEV", $this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-02-01",$ANNEE."-02-29",$IND,$STR)));
	$dataSet->addPoint(new Point("MAR", $this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-03-01",$ANNEE."-03-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AVR", $this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-04-01",$ANNEE."-04-30",$IND,$STR)));
	$dataSet->addPoint(new Point("MAI", $this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-05-01",$ANNEE."-05-31",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIN",$this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-06-01",$ANNEE."-06-30",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIL",$this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-07-01",$ANNEE."-07-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AOUT",$this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-08-01",$ANNEE."-08-31",$IND,$STR)));
	$dataSet->addPoint(new Point("SEP", $this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-09-01",$ANNEE."-09-30",$IND,$STR)));
	$dataSet->addPoint(new Point("OCT", $this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-10-01",$ANNEE."-10-31",$IND,$STR)));
	$dataSet->addPoint(new Point("NOV", $this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-11-01",$ANNEE."-11-30",$IND,$STR)));
	$dataSet->addPoint(new Point("DEC", $this->valeur($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-12-01",$ANNEE."-12-31",$IND,$STR)));
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo '<img id ="image"  src="'.URL.$fichier.'" style="border: 2px solid green;"/>';
	}
	
	
	function SEXEDECES($TBL,$COLONE1,$DATEJOUR1,$DATEJOUR2,$VALEUR,$STR) 
	{
	$this->mysqlconnectx();
	$sql = " select * from $TBL  where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' and SEX='$VALEUR' and  STRUCTURED $STR  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function multiPie($x,$y,$TITRE,$TBL,$COLONE1,$DATEJOUR1,$DATEJOUR2,$STR) //,$data$data[$DATE-4]
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new PieChart();
	$chart->getPlot()->getPalette()->setPieColor(array(
		new Color(255, 0, 0),
		new Color(0, 0, 255)
	));
	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("Feminin",$this->SEXEDECES($TBL,$COLONE1,$DATEJOUR1,$DATEJOUR2,'F',$STR)));
	$dataSet->addPoint(new Point("Masculin",$this->SEXEDECES($TBL,$COLONE1,$DATEJOUR1,$DATEJOUR2,'M',$STR) ));
	$chart->setDataSet($dataSet);
    $fichier='./CHART/demo/generated/pie_chart_color.png';
	$DATE=date("Y");
	$chart->setTitle($TITRE.date("d-m-Y"));
	$chart->render($fichier);	
	echo '<img id ="image"  alt="****"  src="'.URL.$fichier.'" style="border: 2px solid green;"/>';
	}
	
	function AGEDECES($colone2,$colone3,$datejour1,$datejour2,$structure)
	{
	$this->mysqlconnectx();
	$sql = " select * from deceshosp where Years >=$colone2 and Years <=$colone3  and DINS >='$datejour1'and DINS <='$datejour2'  and STRUCTURED $structure";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$resultat=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $resultat;
	}
	
	function GRAPHEAGEDECES($x,$y,$TITRE,$datejour1,$datejour2,$structure) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier = './CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("00-17", $this->AGEDECES(0,18,$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("18-19", $this->AGEDECES(18,19,$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("20-29", $this->AGEDECES(20,29,$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("30-39", $this->AGEDECES(30,39,$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("40-49", $this->AGEDECES(40,49,$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("50-59", $this->AGEDECES(50,59,$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("60-69", $this->AGEDECES(60,69,$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("70-79", $this->AGEDECES(70,79,$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("80-99", $this->AGEDECES(80,100,$datejour1.'-01-01',$datejour2,$structure)));
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo '<img id ="image" alt="" src="'.URL.$fichier.'" style="border: 2px solid green;"/>';
	}
	
	function CDECES($colone1,$colone2,$datejour1,$datejour2,$structure)
	{
	$this->mysqlconnectx();
	$sql = " select * from deceshosp where $colone1 ='$colone2' and DINS >='$datejour1'and DINS <='$datejour2'  and STRUCTURED $structure";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$resultat=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $resultat;
	}
	
	function GRAPHECD($x,$y,$TITRE,$datejour1,$datejour2,$structure) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier = './CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("CN", $this->CDECES('CD','CN',$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("CV", $this->CDECES('CD','CV',$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("CI", $this->CDECES('CD','CI',$datejour1.'-01-01',$datejour2,$structure)));
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo '<img id ="image" alt="" src="'.URL.$fichier.'" style="border: 2px solid green;"/>';
	}
	
	function GRAPHELD($x,$y,$TITRE,$datejour1,$datejour2,$structure) 
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier = './CHART/demo/generated/demo1.png';
	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("DOMI", $this->CDECES('LD','DOM',$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("VOPU", $this->CDECES('LD','VP',$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("SSPU", $this->CDECES('LD','SSP',$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("SSPV", $this->CDECES('LD','SSPV',$datejour1.'-01-01',$datejour2,$structure)));
	$dataSet->addPoint(new Point("AUTR", $this->CDECES('LD','AUTRES',$datejour1.'-01-01',$datejour2,$structure)));
	
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo '<img id ="image" alt="" src="'.URL.$fichier.'" style="border: 2px solid green;"/>';
	}
	
	function norm ($x, $mean, $sd)
    {
        $y = (1 / $sd*sqrt(2 * pi())) * exp(-0.5 * pow(($x-$mean)/$sd, 2));
        return $y;
    }
	function normaldist($x,$y,$TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR) 
	{
	include "./chart/libchart/classes/libchart.php";
	$chart = new LineChart();
	$fichier='./chart/demo/generated/demo1.png';
	$dataSet = new XYDataSet();
	for ($i = -3; $i <= 3; $i+= 0.1) {$dataSet->addPoint(new Point("", $this->norm ($i,0,1)));}
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo '<img id ="image"  src="'.URL.$fichier.'" style="border: 2px solid green;"/>';
	}
	
	
}

?>
