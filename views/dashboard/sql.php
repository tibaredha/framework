<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 2fr 1fr  ;
  grid-template-rows: 20px 45px 45px 45px 45px 45px 45px;
  grid-gap: 5px;
}

#wilayarg,#structurerg,#role,#dd,#ee,#ff,#gg {background: yellow; text-align: center ; border-radius: 5px;width: 50%;height: 100%;}
#hh {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#hh:hover {background: red;color: #fff;}
#gg1 {background: green;text-align: center;border-radius: 5px;  height: 100%;}
#gg2 {background: yellow; text-align: center;border-radius: 5px; float: right;width: 30%; height: 100%;}
#a {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 2 / 3;}
#b {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 3 / 4;}
#c {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 4 / 5;}
#d {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 5 / 6;}
#e {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 6 / 7;}
#f {background: green ;text-align: center;border-radius:5px;padding: 8px;grid-column: 2  / 3;  grid-row: 7 / 8;color:white;}
#g {background: salmon;text-align: center;border-radius:5px;padding: 8px;grid-column: 2  / 3;  grid-row: 8 / 9;color:white;}
</style>



<div class="sheader1l">
<?php
Session::init();
if (isset($_SESSION['errorlogin'])) {
$sError = '<p id="errorlogin">' . $_SESSION['errorlogin'] . '</p>';		
echo $sError;			
}
else
{
$sError='<p id="llogin">Gérer les certificats de décès</p>';
echo $sError;
}
?>
</div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php $sError='Produire un fichier SQL du '.$this->d1.' au '.$this->d2.'';echo $sError;  ?></div>

<div class="sheader2r">***********</div>
<div class="contentl">


<div id="inner-grid">
			<div id="a"></div>
			<div id="b"><?php HTML::dump_MySQLT($_SERVER['SERVER_NAME'],"root","","framework",2,$this->d1,$this->d2);  ?></div>
			<div id="c">Sauvegarde terminée</div>
			<div id="d"><?php echo 'Du '.$this->d1; echo ' Au'.$this->d2;  ?></div>
			<div id="e"></div>
			<div id="f"></div>
			
</div>



<?php 
//

// $dbname = 'framework';

// if (!mysql_connect('localhost', 'tibaredha', '030570')) {
   // echo 'Impossible de se connecter à MySQL';
   // exit;
// }

// $sql = "SHOW TABLES FROM $dbname like 'deceshosp' ";
// $result = mysql_query($sql);

// if (!$result) {
   // echo "Erreur DB, impossible de lister les tables\n";
   // echo 'Erreur MySQL : ' . mysql_error();
   // exit;
// }

// while ($row = mysql_fetch_row($result)) {
   // echo $row[0]; echo '</br>';
// }

// mysql_free_result($result);


?>

</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/xls.png" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logo;?>"></div>		
<div class="scontentl2"><?php echo " Du "; echo $this->d1 ; echo " Au "; echo $this->d2;?></div>		
<div class="scontentl3"><?php ?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		

