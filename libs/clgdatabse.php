<?php

class clgdatabse  {
	
	public $db_host;
	public $db_name;   
	public $db_user;
	public $db_pass;
	public $userListviewm ;
	public $userListviewa ;
	public $cnx;
	public $db;
	
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
	
	function merge($structure,$tbl_name,$Datedebut,$Datefin) 
	{
		
		$this->mysqlconnectx();	 
		
		$exists = mysql_query("select 1 from $tbl_name");

		if($exists !== FALSE)
		{
			
			$sqlx="delete FROM $tbl_name  where STRUCTURED != $structure ";
			$requetex = mysql_query($sqlx)or die($sqld."<br>".mysql_error());
			
			$sqld="delete FROM deceshosp  where STRUCTURED = $structure and  DINS  BETWEEN '$Datedebut' AND '$Datefin' ";
			$requeted = mysql_query($sqld)or die($sqld."<br>".mysql_error());

			$sql="SELECT * FROM $tbl_name  where STRUCTURED = $structure and DINS  BETWEEN '$Datedebut' AND '$Datefin'  order by DINS ";
			$requete = mysql_query($sql)or die($sql."<br>".mysql_error());
			$OP=mysql_num_rows($requete);
			
			while($value=mysql_fetch_array($requete))
			{
			//toutes les structures sauf ain oussera
			$sql1 = "INSERT INTO deceshosp (WILAYAD,COMMUNED,STRUCTURED,NOM,PRENOM,FILSDE,ETDE,SEX,DATENAISSANCE,Days,Weeks,Months,Years,WILAYA,WILAYAR,COMMUNE,COMMUNER,ADRESSE,CD,LD,AUTRES,OMLI,MIEC,EPFP,CIM1,CIM2,CIM3,CIM4,CIM5,NDLM,NDLMAAP,GM,MN,AGEGEST,POIDNSC,AGEMERE,DPNAT,EMDPNAT,DECEMAT,GRS,POSTOPP,DATEHOSPI,HEURESHOSPI,SERVICEHOSPIT,DUREEHOSPIT,MEDECINHOSPIT,CODECIM0,CODECIM,CRS,WRS,SRS,USER,DINS,HINS,NOMAR,PRENOMAR,FILSDEAR,ETDEAR,NOMPRENOMAR,PROAR,ADAR,Profession,aprouve) 
			VALUES ('".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$value[7]."','".$value[8]."','".$value[9]."','".$value[10]."','".$value[11]."','".$value[12]."','".$value[13]."','".$value[14]."','".$value[15]."','".$value[16]."','".$value[17]."','".$value[18]."','".$value[19]."','".$value[20]."','".$value[21]."','".$value[22]."','".$value[23]."','".$value[24]."','".$value[25]."','".$value[26]."','".$value[27]."','".$value[28]."','".$value[29]."','".$value[30]."','".$value[31]."','".$value[32]."','".$value[33]."','".$value[34]."','".$value[35]."','".$value[36]."','".$value[37]."','".$value[38]."','".$value[39]."','".$value[40]."','".$value[41]."','".$value[42]."','".$value[43]."','".$value[44]."','".$value[45]."','".$value[46]."','".$value[47]."','".$value[48]."','".$value[49]."','".$value[50]."','".$value[51]."','".$value[52]."','".$value[53]."','".$value[54]."','".$value[55]."','".$value[56]."','".$value[57]."','".$value[58]."','".$value[59]."','".$value[60]."','".$value[61]."','".$value[62]."','".$value[63]."');";	
			
			//pour ain oussera
			// $sql1 = "INSERT INTO deceshosp (WILAYAD,COMMUNED,STRUCTURED,NOM,PRENOM,FILSDE,ETDE,SEX,DATENAISSANCE,Days,Weeks,Months,Years,WILAYA,WILAYAR,COMMUNE,COMMUNER,ADRESSE,CD,LD,AUTRES,OMLI,MIEC,EPFP,CIM1,CIM2,CIM3,CIM4,CIM5,NDLM,NDLMAAP,GM,MN,AGEGEST,POIDNSC,AGEMERE,DPNAT,EMDPNAT,DECEMAT,GRS,POSTOPP,DATEHOSPI,HEURESHOSPI,SERVICEHOSPIT,DUREEHOSPIT,MEDECINHOSPIT,CODECIM0,CODECIM,CRS,WRS,SRS,USER,DINS,HINS,NOMAR,PRENOMAR,FILSDEAR,ETDEAR,NOMPRENOMAR,PROAR,ADAR,Profession,aprouve) 
			// VALUES ('".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$value[7]."','".$value[8]."','".$this->dateFR2US($value[9])."','".$value[10]."','".$value[11]."','".$value[12]."','".$value[13]."','".$value[14]."','".$value[15]."','".$value[16]."','".$value[17]."','".$value[18]."','".$value[19]."','".$value[20]."','".$value[21]."','".$value[22]."','".$value[23]."','".$value[24]."','".$value[25]."','".$value[26]."','".$value[27]."','".$value[28]."','".$value[29]."','".$value[30]."','".$value[31]."','".$value[32]."','".$value[33]."','".$value[34]."','".$value[35]."','".$value[36]."','".$value[37]."','".$value[38]."','".$value[39]."','".$value[40]."','".$value[41]."','".$value[42]."','".$value[43]."','".$value[44]."','".$value[45]."','".$value[46]."','".$value[47]."','".$value[48]."','".$value[49]."','".$value[50]."','".$value[51]."','".$value[52]."','".$value[53]."','".$value[54]."','".$value[55]."','".$value[56]."','".$value[57]."','".$value[58]."','".$value[59]."','".$value[60]."','".$value[61]."','".$value[62]."','".$value[63]."');";	
			
			$query = mysql_query($sql1);
			}
			$sqld = "DROP TABLE $tbl_name";
			$queryd = mysql_query($sqld);
			
			mysql_free_result($requete);
			echo $OP.' ...... ok ';
		}
		else
		{
		   echo("This table doesn't exist");
		}	
	}
	
	function exportsql($table_name) 
	{
		$this->mysqlconnectx();
		$backup_file  = URLDUMP."$table_name.sql";
		$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";
		$requete = @mysql_query($sql);
		if(! $requete ) 
		{
			echo "Backedup  data error\n";
		}
	    else
		{
			echo "Backedup  data successfully\n";
		}
	}
	

	function exportcsv($tbl,$d1,$d2,$attachment = false, $headers = true) 
	{
		$filename="csv/deceshosp.csv";
		$this->mysqlconnectx();
		if($attachment) 
		{
			header( 'Content-Type: text/csv' );
			header( 'Content-Disposition: attachment;filename='.$filename);
			$fp = fopen('php://output', 'w');
		} 
		else 
		{
			$fp = fopen($filename, 'w');
		}
		
		$result = mysql_query("SELECT * FROM $tbl ") or die($sql."<br>".mysql_error());
		
		if($headers) 
		{
			$row = mysql_fetch_assoc($result);
			if($row) {
				fputcsv($fp, array_keys($row));
				mysql_data_seek($result, 0);
			}
		}
		
		while($row = mysql_fetch_assoc($result)) 
		{
			fputcsv($fp, $row);
		}
	   
		fclose($fp);
		echo "Backedup  data successfully\n";
	}
	
	
	
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	
	
	function XLS($serveur,$STRUCTURED,$d1,$d2)
    {
	$this->mysqlconnectx();
	$d11=$this->dateFR2US($d1);
	$d22=$this->dateFR2US($d2);
	$fichier = URLXLS.$STRUCTURED.'_'.$d1.'_au_'.$d2.'.php';	
    error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Europe/London');

	define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
	require_once dirname(__FILE__) . './PHPExcel/PHPExcel.php';
	// echo date('H:i:s') , "Create new PHPExcel object" , EOL;
	$objPHPExcel = new PHPExcel();
	// echo date('H:i:s') , " Set document properties" , EOL;

		// Rename worksheet
	    // echo date('H:i:s') , " call database" , EOL;
		$sqlPes = "SELECT * FROM deceshosp where  DINS BETWEEN '$d11' AND '$d22'  and STRUCTURED ='$STRUCTURED' order by DINS ";  
		$exePes = mysql_query($sqlPes);
		$resPes = mysql_fetch_assoc($exePes);
		$numPes = mysql_num_rows($exePes);
		
		for ($i = 1; $i <= $numPes + 1; $i++) {
		  
			$objPHPExcel->setActiveSheetIndex(0)// $i-1
				 ->setCellValue('A'.$i,$resPes['WILAYAD'])
				 ->setCellValue('B'.$i,$resPes['COMMUNED'] )
				 ->setCellValue('C'.$i,$resPes['STRUCTURED'])
				 ->setCellValue('D'.$i,$resPes['NOM'])
				 ->setCellValue('E'.$i,$resPes['PRENOM'])
				 ->setCellValue('F'.$i,$resPes['FILSDE'])
				 ->setCellValue('G'.$i,$resPes['ETDE'])
				 ->setCellValue('H'.$i,$resPes['SEX'])
				 ->setCellValue('I'.$i,$resPes['DATENAISSANCE'])
				 ->setCellValue('J'.$i,$resPes['Days'])
				 ->setCellValue('K'.$i,$resPes['Weeks'])
				 ->setCellValue('L'.$i,$resPes['Months'])
				 ->setCellValue('M'.$i,$resPes['Years'])
				 ->setCellValue('N'.$i,$resPes['WILAYA'])
				 ->setCellValue('O'.$i,$resPes['WILAYAR'])
				 ->setCellValue('P'.$i,$resPes['COMMUNE'])
				 ->setCellValue('Q'.$i,$resPes['COMMUNER'])
				 ->setCellValue('R'.$i,$resPes['ADRESSE'])
				 ->setCellValue('S'.$i,$resPes['CIM1'])
				 ->setCellValue('T'.$i,$resPes['CIM2'])
				 ->setCellValue('U'.$i,$resPes['CIM3'])
				 ->setCellValue('V'.$i,$resPes['CIM4'])
				 ->setCellValue('W'.$i,$resPes['CIM5'])
				 ->setCellValue('X'.$i,$resPes['NDLMAAP'])
				 ->setCellValue('Y'.$i,$resPes['CD'])
				 ->setCellValue('Z'.$i,$resPes['LD'])
				 ->setCellValue('AA'.$i,$resPes['AUTRES'])
				 ->setCellValue('AB'.$i,$resPes['NDLM'])
				 ->setCellValue('AC'.$i,$resPes['DECEMAT'])
				 ->setCellValue('AD'.$i,$resPes['GRS'])
				 ->setCellValue('AE'.$i,$resPes['DATEHOSPI'])
				 ->setCellValue('AF'.$i,$resPes['SERVICEHOSPIT'])
				 ->setCellValue('AG'.$i,$resPes['DUREEHOSPIT'] )
				 ->setCellValue('AH'.$i,$resPes['MEDECINHOSPIT'])
				 ->setCellValue('AI'.$i,$resPes['DINS'])
				 ->setCellValue('AJ'.$i,$resPes['HINS'])
				 
				 ->setCellValue('AK'.$i,$resPes['NOMAR'])
				 ->setCellValue('AL'.$i,$resPes['PRENOMAR'])
				 ->setCellValue('AM'.$i,$resPes['FILSDEAR'])
				 ->setCellValue('AN'.$i,$resPes['ETDEAR'])
				 ->setCellValue('AO'.$i,$resPes['NOMPRENOMAR'])
				 ->setCellValue('AP'.$i,$resPes['PROAR'])
				 ->setCellValue('AQ'.$i,$resPes['ADAR'])
				 ->setCellValue('AR'.$i,$resPes['Profession'])
				 ->setCellValue('AS'.$i,$resPes['aprouve'])
				 ;
	                         
			$resPes = mysql_fetch_assoc($exePes);
		   
		}
	// Rename worksheet
	// echo date('H:i:s') , " Rename worksheet" , EOL;
	$objPHPExcel->getActiveSheet()->setTitle('deces');
    $objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(5);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(15);	
    $objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getStyle('A1:AS1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF69B4');
	
	// Save Excel 2007 file
	//echo date('H:i:s') , " Write to Excel2007 format" , EOL;
	$callStartTime = microtime(true);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	//echo $fichier  ;echo'<br />';
	$objWriter->save(str_replace('.php', '.xlsx', $fichier));
	$callEndTime = microtime(true);
	$callTime = $callEndTime - $callStartTime;
	
	//echo $fichier  ;echo'<br />';
	//echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo($fichier, PATHINFO_BASENAME)) , EOL;
	//echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
	// Echo memory usage
	//echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;
	// Save Excel 95 file
	//echo date('H:i:s') , " Write to Excel5 format" , EOL;
	$callStartTime = microtime(true);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save(str_replace('.php', '.xls', $fichier));
	$callEndTime = microtime(true);
	$callTime = $callEndTime - $callStartTime;

	//echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo($fichier, PATHINFO_BASENAME)) , EOL;
	//echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
	// Echo memory usage
	//echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;


	// Echo memory peak usage
	//echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

	// Echo done
	// echo date('H:i:s') , " Done writing files" , EOL;
	// echo 'Files have been created in ' , getcwd() , EOL;
	// echo '<a href="'.URL.'libs/deces.xls">Enregistrer Sous xls</a></br>';
	// echo '<a href="'.URL.'xls/D_'.$STRUCTURED.'_'.$d1.'_au_'.$d2.'.xls">1-Enregistrer Sous (*.xls)</a></br>';
	// echo '<a href="'.URL.'xls/D_'.$STRUCTURED.'_'.$d1.'_au_'.$d2.'.xlsx">2-Enregistrer Sous (*.xlsx)</a></br>';	
	}
	
}

?>
