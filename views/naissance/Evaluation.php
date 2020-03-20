<div class="sheader1l"><p id="evaluation"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="evaluation"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php echo $this->msg; echo " Natalité Hospitalière : ";echo HTML::nbrtostring('structure','id',Session::get('structure'),'structure') ;?></div><div class="sheader2r">MSPRH</div>
<div class="contentl">
<?php 
function txts($x,$y,$name,$size,$value,$param)
{
echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\"  id=\"".$param."\"   required />";
}
            echo "<hr>";
	
	echo '<form ALIGN="center" action="'.URL.'fpdf/natalite/fnatalite.php" method="POST">';
			echo "<p>";txts(100,240,'Datedebut',0,date('d-m-Y'),'dateus');txts(100,240,'Datefin',0,date('d-m-Y'),'dateus1');echo "</p>";
			echo "<p>";;echo "</p>";
				echo "<hr>";
			echo "<p>";
			echo "<select id=\"type1\" name=\"natalite\">";
			echo '<option value="1">Releve des naissances vivantes </option>';
			echo '<option value="2">Releve des naissances mort-nés</option>';
			echo '<option value="3">Rapport Natalité </option>';
			echo '';
			echo "</select>";
			echo "</p> ";
				
			echo "<p>";
			echo "<select id=\"type2\" name=\"type\">";
			echo"<option value=\"1\">PDF</option>"."\n";
			echo"<option value=\"2\">XLS</option>"."\n";
			echo"<option value=\"3\">SQL</option>"."\n";
			
			echo "</select>";
			echo "</p>";
			   echo "<hr>";
			echo '<input type="hidden" name="login" value="'.Session::get('login').'"/>';   
			echo ' <input type="hidden" name="structure" value="'.Session::get('structure').'"/> ';     
			echo "<p><input  id=\"submitr\" type=\"submit\" value=\"Calculer\" /></p>";
	echo "</form>";
	          echo "<hr>";

?>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/eva.png"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>

	
<div class="scontentl2"><?php echo "Gérer les femmes gestatantes";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?><?php //echo "***";//echo $this->msg; echo "";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		
