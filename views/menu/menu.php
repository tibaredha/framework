<?php
echo '<ul id="menu">';
	
	if (Session::get('loggedIn') == false)
	{
		include('menu_std.php');
	}
	else
	{
		if (Session::get('demgraphie') == 1){include('menu_deces.php');}	
		if (Session::get('demgraphie') == 2){include('menu_naissance.php');}
		if (Session::get('demgraphie') == 3){include('menu_demographie.php');}		
		echo '<li class="parent"><a href="'.URL.'aide">'.TXT_HELP.' <img src="'.URL.'public/images/help.jpg" width="16" height="16" border="0" alt=""/></li>';	
		echo '<li class="parent">';echo '<a onclick="playSound()"  href="'.URL.'Login/logout/'.Session::get('id').'"  >'.TXT_LOGOUT.' <img src="'.URL.'public/images/s_loggoff.png" width="16" height="16" border="0" alt=""/></a></li>';
		echo '<p id="wdj1" >';
		
		if (Session::get('role') == '1'){
        if (Session::get('lang')=='ar') {echo "مديرية الصحة و السكان - الجلفة";}
		if (Session::get('lang')=='fr') {echo "DSP-DJELFA";}
		if (Session::get('lang')=='en') {echo "DSP-DJELFA";}
		}else {
		if (Session::get('lang')=='ar') {echo HTML::nbrtostring('structure','id',Session::get('structure'),'structurear');}
		if (Session::get('lang')=='fr') {echo HTML::nbrtostring('structure','id',Session::get('structure'),'structure');}
		if (Session::get('lang')=='en') {echo HTML::nbrtostring('structure','id',Session::get('structure'),'structure');}		
		}
		
		
		echo '</p>';
	}
echo '</ul>';
?>	
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>			