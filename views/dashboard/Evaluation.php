<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 3fr 1fr  ;
  grid-template-rows: 20px 45px 45px 45px 45px 45px 45px 45px;
  grid-gap: 5px;
}

#a {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 2 / 3;}
#b {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 3 / 4;}
#c {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 4 / 5;}
#d {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 5 / 6;}
#e {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 6 / 7;}
#f {background: green ;text-align: center;border-radius:5px;padding: 8px;grid-column: 2  / 3;  grid-row: 7 / 8;color:white;}
#g {background: salmon;text-align: center;border-radius:5px;padding: 8px;grid-column: 2  / 3;  grid-row: 8 / 9;color:white;}


#wilayarg,#structurerg,#type1,#type2 {background: yellow; text-align: center ; border-radius: 5px;width: 100%;height: 100%;}
#dateus,#dateus1 {background: yellow; text-align: center ; border-radius: 5px;width: 49%;height: 100%;}
</style>

<div class="sheader1l"><p id="evaluation"><?php echo "Gérer les certificats de décès";?></p></div><div class="sheader1r"><p id="evaluation"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php echo $this->msg; echo " Mortalité hospitalière : ";echo HTML::nbrtostring('structure','id',Session::get('structure'),'structure') ;?></div>
<div class="sheader2r">
<?php
$ctrl='dashboard';
$data = array(
"c"   => $ctrl,
"cb1" => $ctrl,"mb1" => 'SIGA',    "tb1" => 'SIGA',                       "vb1" => '',     "icon1" => 'sig.png',
"cb2" => $ctrl,"mb2" => 'nouveau', "tb2" => 'Créer un nouveau certificat',"vb2" => '',     "icon2" => 'add.PNG');

echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;

?>
</div>
<div class="contentl">
<?php 
	
	echo '<form ALIGN="center" action="'.URL.'fpdf/deces/FDECES.php" method="POST">';
			echo '<div id="inner-grid">	';	
			echo '<div id="a">';echo html::txts(100,240,'Datedebut',0,date('01-01-Y'),'dateus');html::txts(100,240,'Datefin',0,date('d-m-Y'),'dateus1');echo '</div>';
			echo '<div id="b">';
			echo "<select id=\"type1\" name=\"deces\">";
			echo '<option value="0">Bordereau</option>';
			echo '<option value="1">Releve</option>';
			echo '<option value="2">Releve+</option>';
			echo '<option value="3">Rapport</option>';
			echo '<option value="4">Rapport SIG</option>';
			echo '<option value="5">Décès maternels</option>';
			echo '<option value="6">Démographie</option>';
			echo '<option value="7">Medicolegales</option>';
			echo '<option value="8">Mortalité maternelle</option>';
			// echo '<option value="9">Mortalité kc</option>';
			echo '<option value="9">Déces par mois </option>';
			echo "</select>";
			echo '</div>';
			echo '<div id="c">';
			echo "<select id=\"type2\" name=\"type\">";
			echo"<option value=\"1\">PDF</option>"."\n";
			echo"<option value=\"2\">XLS</option>"."\n";
			echo"<option value=\"3\">SQL</option>"."\n";
			echo"<option value=\"4\">HTML</option>"."\n";
			echo "</select>";
			echo '</div>';
			echo '<div id="d">';echo '</div>';
			echo '<div id="e">';echo '</div>';
			echo '<input type="hidden" name="login"     value="'.Session::get('login').'"/>';   
			echo '<input type="hidden" name="structure" value="'.Session::get('structure').'"/> ';     
			echo '<div id="f">';echo "<input  id=\"submitr\" type=\"submit\" value=\"Calculer\" />";echo '</div>';		
	        echo '</div>';		
	echo "</form>";
?>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/eva.png"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logo;?>"></div>

	
<div class="scontentl2"><?php echo "***";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php echo "***";//echo $this->msg; echo "";?></div>
<div class="scontentr1"><?php echo "***";//echo dsp; echo "";?></div>		
