<?php
$db_host="localhost";
$db_name="framework"; 
$tbl_name1="deceshospd";
$tbl_name2="deceshosp"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$sql=mysql_query("SELECT * FROM $tbl_name1 ");//limit 0,10
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
while($value=mysql_fetch_array($sql))
{
echo '<tr>';
for ($i=0;$i<=63;$i++) {echo '<td>';echo $value[$i];echo '</td>';}
$sql1 = "INSERT INTO $tbl_name2 (WILAYAD,COMMUNED,STRUCTURED,NOM,PRENOM,FILSDE,ETDE,SEX,DATENAISSANCE,Days,Weeks,Months,Years,WILAYA,WILAYAR,COMMUNE,COMMUNER,ADRESSE,CD,LD,AUTRES,OMLI,MIEC,EPFP,CIM1,CIM2,CIM3,CIM4,CIM5,NDLM,NDLMAAP,GM,MN,AGEGEST,POIDNSC,AGEMERE,DPNAT,EMDPNAT,DECEMAT,GRS,POSTOPP,DATEHOSPI,HEURESHOSPI,SERVICEHOSPIT,DUREEHOSPIT,MEDECINHOSPIT,CODECIM0,CODECIM,CRS,WRS,SRS,USER,DINS,HINS,NOMAR,PRENOMAR,FILSDEAR,ETDEAR,NOMPRENOMAR,PROAR,ADAR,Profession,aprouve) 
VALUES ('".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$value[7]."','".$value[8]."','".$value[9]."','".$value[10]."','".$value[11]."','".$value[12]."','".$value[13]."','".$value[14]."','".$value[15]."','".$value[16]."','".$value[17]."','".$value[18]."','".$value[19]."','".$value[20]."','".$value[21]."','".$value[22]."','".$value[23]."','".$value[24]."','".$value[25]."','".$value[26]."','".$value[27]."','".$value[28]."','".$value[29]."','".$value[30]."','".$value[31]."','".$value[32]."','".$value[33]."','".$value[34]."','".$value[35]."','".$value[36]."','".$value[37]."','".$value[38]."','".$value[39]."','".$value[40]."','".$value[41]."','".$value[42]."','".$value[43]."','".$value[44]."','".$value[45]."','".$value[46]."','".$value[47]."','".$value[48]."','".$value[49]."','".$value[50]."','".$value[51]."','".$value[52]."','".$value[53]."','".$value[54]."','".$value[55]."','".$value[56]."','".$value[57]."','".$value[58]."','".$value[59]."','".$value[60]."','".$value[61]."','".$value[62]."','".$value[63]."');";	
$query1 = mysql_query($sql1);
echo '</tr>';
}	
echo "</table>";	
?>