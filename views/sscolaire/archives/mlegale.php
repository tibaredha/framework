<div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2r">ID Défunt( e ) : <label style="display: none;" id="show_codeP"><input type="text" name="code_patient" id="code_patient"  style="border: none; background-color: green; color: white; border-radius: 15px; font-family:courier; text-align:center;  "   size="15" readonly=""></label></div>
<div class="contentml">
<form id="Canvas" name="formGCS"  action="<?php echo URL."dashboard/mlegale1/".$this->user[0]['id'];?>"  method="POST">	
	<div class="tabbed_area">  
				<ul class="tabs">  
					<li><a href="javascript:tabSwitchx('tab_1x', 'content_1x');" id="tab_1x" class="active">1er partie</a></li>  
					<li><a href="javascript:tabSwitchx('tab_2x', 'content_2x');" id="tab_2x">2em partie</a></li> 
					<li><a href="javascript:tabSwitchx('tab_3x', 'content_3x');" id="tab_3x">3em partie</a></li> 	
					<li><a href="javascript:tabSwitchx('tab_4x', 'content_4x');" id="tab_4x">4em partie </a></li> 	
				</ul>
	<?php 
	echo '<div id="content_1x" class="contenttabs1x">  ';
	?>
	<img id="image" src="<?php echo URL;?>public/images/mlegale/<?php echo $this->user[0]['id'];?>.jpg?t=<?php echo time();?>">
	<?php
	echo '</div>';
	
	
	echo '<div id="content_2x" class="contenttabs2x">  ';
	echo'<div id="Canvas"  align="center">';
		//sous reseau ne marche pas
		echo'<canvas id="myCanvas" width="800" height="500" style="border:2px solid green;">   </canvas>';
		echo'</div>';	
		echo '</br>';
		echo '<label class="" id="">taille : </label>'; 
		echo '<input class="" id="" type="txt"  name="taille" value=""/>';
	echo '</div>';
	
	echo '<div id="content_3x" class="contenttabs3x">  ';
		echo '<label class="" id="">poids : </label>'; 
		echo '<input class="" id="" type="txt"  name="poids" value=""/>';
	echo '</div>';
	
	echo '<div id="content_4x" class="contenttabs4x">  ';
	      echo'<button id="submitnewy"     title="valider"  onclick="javascript:valider('."'".$_SERVER['SERVER_NAME']."'".');return false;"> <img src="'.URL.'public/images/ok.jpg"    width="25" height="25" border="0" alt=""/></button> ';
    echo '</div>';	
	
	echo'</form> ';
	?>		
	</div>
</div>	
<div class="contenth"><img id="image" src="<?php echo URL;?>public/images/sigh.jpg" ></div>	
<div class="contentx">

<?php 
echo'<select id="selpen">';
					echo'<option value="s">------</option>';
					echo'<option value="d">=====</option>';
					echo'<option value="ls">IIIIIIIIII</option>';
					echo'<option value="ro">ooooo</option>';
					echo'<option value="lune">lung</option>';
					echo'<option value="luned">lund</option>';
					echo'<option value="epi">X_n</option>';
					echo'<option value="epiinf">X_i</option>';
					echo'<option value="episup">X_s</option>';
					echo'<option value="gzd">//////////</option>';
					echo'<option value="gzl">\\\\\\\\\</option>';
					echo'<option value="loz"><></option>';
					echo'<option value="zig">www</option>';
					echo'<option value="ts">TS</option>';
					echo'<option value="ti">TI</option>';		
			echo'</select>';echo'<br>';
			echo'<select id="selWidth">';
					echo'<option value="1">1</option>';
					echo'<option value="2">2</option>';
					echo'<option value="3">3</option>';
					echo'<option value="4">4</option>';
					echo'<option value="5"selected="selected">5</option>';
					echo'<option value="6">6</option>';
					echo'<option value="7">7</option>';
					echo'<option value="8">8</option>';
					echo'<option value="9" >9</option>';
					echo'<option value="10">10</option>';
			echo'</select> ';echo'<br>';
			
			echo'<select id="selColor" style="background-color:yellow;"    >  ';
					echo'<option value="red"     style="background-color:red;     color:white" selected="selected" >red</option>';
					echo'<option value="black"   style="background-color:black;   color:white" >black</option> ';
					echo'<option value="white"   style="background-color:white;   color:black" >white</option>';
					echo'<option value="silver"  style="background-color:silver;  color:white" >silver</option>';
					echo'<option value="gray"    style="background-color:gray;    color:white" >gray</option>';
					echo'<option value="maroon"  style="background-color:maroon;  color:white" >Maron</option>';
					echo'<option value="lime"    style="background-color:lime;    color:black">lime</option>';
					echo'<option value="green"   style="background-color:green;   color:white" >green</option>';
					echo'<option value="yellow"  style="background-color:yellow;  color:black" >yellow</option>';
					echo'<option value="olive"   style="background-color:olive;   color:white" >olive</option>';
					echo'<option value="blue"    style="background-color:blue;    color:white" >blue</option>';
					echo'<option value="navy"    style="background-color:navy;    color:white" >navy</option>';
					echo'<option value="fuchsia" style="background-color:fuchsia; color:white">fuchsia</option>';
					echo'<option value="purple"  style="background-color:purple;  color:white" >purple</option>';
					echo'<option value="aqua"    style="background-color:purple;  color:white" >aqua</option>';
					echo'<option value="teal"    style="background-color:teal;    color:white">teal</option>';			
			echo'</select>';echo'<br>';
echo'<button id="stats" >x:0 y:0</button>';echo'<br>';
echo'<button id="Clearcanva" title="valider"  onclick="javascript:drawImage();return false;">     <img src="'.URL.'public/images/table/cancel.png"  width="16" height="16" border="0" alt="" /></button>';
echo'<button id="cUndo"      title="valider"  onclick="javascript:drawImage1();return false;">    <img src="'.URL.'public/images/icons/b_firstpage.png"  width="16" height="16" border="0" alt="" /></button>';
echo'<button id="cRedo"      title="valider"  onclick="javascript:drawImage2();return false;">    <img src="'.URL.'public/images/icons/b_lastpage.png"  width="16" height="16" border="0" alt="" /></button>';

echo'<script type="text/javascript" src="'.URL.'public/js/JsCode1.js?t='.time().'"></script>';
?>
 
</div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/mlegaleicon.jpg?t=<?php time();?>"></div>	
	
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>