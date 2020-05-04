<?php 
//utilisateur dsp sadmin
if (Session::get('role') == '1'){
echo '<li class="parent">';echo '<a href="'.URL.'dspd/">'.TXT_ACCUEIL.' <img src="'.URL.'public/images/b_home.png" width="16" height="16" border="0" alt=""/></a>'; 
echo '<ul class="child">';
			echo '<li class="parent"><a href="'.URL.'">A <span class="expand">&raquo;</span></a>';
				echo '<ul class="child">';
				echo '<li><a href="'.URL.'">A:1</a></li>';
				echo '<li><a href="'.URL.'">A:2</a></li>';
				echo '<li><a href="'.URL.'">A:3</a></li>';
				echo '</ul>';
			echo '</li>';
			echo '<li><a href="'.URL.'">B</a></li>';
			echo '<li><a href="'.URL.'">C</a></li>';
			echo '<li><a href="'.URL.'">D</a></li>';
echo '</ul>';
echo '</li>';
echo '<li class="parent">';echo '<a href="'.URL.'users/searchusers/0/10?o=id&q="> '.TXT_MEMBERS.' <img src="'.URL.'public/images/users.jpg" width="16" height="16" border="0" alt=""/></a></li>'; 
echo '<li class="parent">';echo '<a href="'.URL.'Msgs">'.TXT_MESSAGES.' <img src="'.URL.'public/images/alerte.jpg" width="16" height="16" border="0" alt=""/></a></li>'; 
echo '<li class="parent">';echo '<a href="'.URL.'administrateur/cfg/">'.TXT_CONFIGURATION.' <img src="'.URL.'public/images/cfg.jpg" width="16" height="16" border="0" alt=""/></a>';
//echo '<li class="parent">';echo '<a href="'.URL.'dspd/">DSP <img src="'.URL.'public/images/eva.png" width="16" height="16" border="0" alt=""/></a>';
}
//utilisateur structure admin
if (Session::get('role') == "2"){
echo '<li class="parent">';echo '<a href="'.URL.'dashboard">'.TXT_ACCUEIL.' <img src="'.URL.'public/images/b_home.png" width="16" height="16" border="0" alt=""/></a>'; 
echo '<ul class="child">';
			echo '<li class="parent"><a href="'.URL.'">A <span class="expand">&raquo;</span></a>';
				echo '<ul class="child">';
				echo '<li><a href="'.URL.'">A:1</a></li>';
				echo '<li><a href="'.URL.'">A:2</a></li>';
				echo '<li><a href="'.URL.'">A:3</a></li>';
				echo '</ul>';
			echo '</li>';
			echo '<li><a href="'.URL.'">B</a></li>';
			echo '<li><a href="'.URL.'">C</a></li>';
			echo '<li><a href="'.URL.'">D</a></li>';
echo '</ul>';
echo '</li>';
echo '<li class="parent"><a href="'.URL.'Agenda/Agenda/'.date('d').'/'.date('m').'/'.date('Y').'">'.TXT_AGENDA.' <img src="'.URL.'public/images/agd.jpg" width="16" height="16" border="0" alt=""/></li>';	
echo '<li class="parent">';echo '<a href="'.URL.'Msgs">'.TXT_MESSAGES.' <img src="'.URL.'public/images/alerte.jpg" width="16" height="16" border="0" alt=""/></a></li>'; 
echo '<li class="parent">';echo '<a href="'.URL.'administrateur/cfg/">'.TXT_CONFIGURATION.' <img src="'.URL.'public/images/cfg.jpg" width="16" height="16" border="0" alt=""/></a>';
}
//utilisateur structure bde/medecin
if (Session::get('role') == "3"){
echo '<li class="parent">';echo '<a href="'.URL.'dashboard">'.TXT_ACCUEIL.' <img src="'.URL.'public/images/b_home.png" width="16" height="16" border="0" alt=""/></a>'; 
echo '<ul class="child">';
			echo '<li class="parent"><a href="'.URL.'">Ajout <span class="expand">&raquo;</span></a>';
				echo '<ul class="child">';
					echo '<li><a href="'.URL.'dashboard/nouveau/">Décés</a></li>';
					echo '<li><a href="'.URL.'prf/createprf/1">Profession</a></li>';
					echo '<li><a href="'.URL.'ser/nouveau/1">Service</a></li>';
					echo '<li><a href="'.URL.'med/createmedecin/1">Médecin</a></li>';
				echo '</ul>';
			echo '</li>';
			echo '<li><a href="'.URL.'dashboard/Evaluation/">Evaluation</a></li>';
			// echo '<li><a href="'.URL.'">C</a></li>';
			// echo '<li><a href="'.URL.'">D</a></li>';
echo '</ul>';
echo '</li>';
echo '<li class="parent"><a href="'.URL.'Agenda/Agenda/'.date('d').'/'.date('m').'/'.date('Y').'">'.TXT_AGENDA.' <img src="'.URL.'public/images/agd.jpg" width="16" height="16" border="0" alt=""/></li>';	
echo '<li class="parent">';echo '<a href="'.URL.'Msgs">'.TXT_MESSAGES.' <img src="'.URL.'public/images/alerte.jpg" width="16" height="16" border="0" alt=""/></a></li>'; 
}