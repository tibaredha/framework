<style>.a {background: salmon;text-align: left;color: white; border-radius: 5px;padding: 3px;}</style>
<div class="sheader1l"><?php Session::init();if (isset($_SESSION['errorlogin'])) {$sError = '<p id="errorregister">' . $_SESSION['errorlogin'] . '</p>';echo $sError;}else{$sError='<p id="lregister">Accueil </p>';echo $sError;}?></div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php echo EDRSFR;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl">
<?php 
if (isset($_COOKIE['tibaredha'])) {
	// echo 'Bonjour '.$_COOKIE['tibaredha'].' !';
}
?>


<?php
// echo $str = "Jane & 'Tarzan'";
// echo "<br>";
// echo htmlspecialchars($str, ENT_COMPAT); // Will only convert double quotes
// echo "<br>";
// echo htmlspecialchars($str, ENT_QUOTES); // Converts double and single quotes
// echo "<br>";
// echo htmlspecialchars($str, ENT_NOQUOTES); // Does not convert any quotes

// echo "<br>";
// echo $str = '<a href="https://www.w3schools.com">Go to w3schools.com</a>';
// echo "<br>";
// echo htmlentities($str);

// echo "<br>";
// $text = 'lala des " \et encore des " ' . " et des ' sans oublier les' ".null;
// echo $text;
// echo "<br>";
// echo addslashes($text);
// echo "<br>";
// if(get_magic_quotes_gpc()) 
// {
	// echo "ok";
// }
// else {
	// echo "non";
// }
?>





<?php 
function xy ($subject) 
{	
$search  = array('a', 'b', 'c','d',' ','à','ä','å','â','ô','ö','î','ï','û','ü','é','è');
$replace = array('A', 'B', 'C','D','_','a','a','a','a','o','o','i','i','u','u','e','e');
$res = str_replace($search, $replace, $subject);
return $res;
}

$subject = 'abcdé fgäü';	
// echo xy ($subject); 



// $film_modifx ="AAéfg dfg d";                                         // pour l'adaptation du nom de l'url
// $film_modify = strtolower($film_modifx);                            // on passe la chaine de caractère en minuscule
// $film_modifz = strtr($film_modify, "àäåâôöîïûüéè", "aaaaooiiuuee"); // on remplace les accents
// $film_modif = str_replace(' ', '_', $film_modifz);             // on remplace les espaces par des tirets

// $addr ='äåö';

// echo $addr = strtr($addr, "ä", "a");

// $nomx="dfg dfg d";

// echo $nom = preg_replace( "# #", "_", $nomx  );
?>

<?php

//echo date('l jS \of F Y h:i:s A');
//echo date("H:i");  

//nb le php.ini  est celui de apache non celui de php 

// if(date_default_timezone_set('Africa/Algiers') == 0) {
            // print "<!-- Error uknown timezone using UTC as default -->\n";
            // date_default_timezone_set('UTC');
// }


// phpinfo();

// date_default_timezone_set('Africa/Tunis');

// if (date_default_timezone_get()) {echo 'date_default_timezone_set : ' . date_default_timezone_get() . '<br />';}

// if (ini_get('date.timezone')) {echo 'date.timezone : ' . ini_get('date.timezone');}

?>

<?php
//date_default_timezone_set('Africa/Algiers');

// $script_tz = date_default_timezone_get();

// if (strcmp($script_tz, ini_get('date.timezone')))
// {
    // echo 'Le décalage horaire du script diffère du décalage horaire défini dans le fichier ini.';
// } 
// else 
// {
    // echo 'Le décalage horaire du script est équivalent à celui défini dans le fichier ini.';
// }
?>


<?php
// $tz = new DateTimeZone("Africa/Algiers");
// print_r($tz->getLocation());
// print_r(timezone_location_get($tz));
?>


<?php 
// echo Hash::create('whirlpool','tibaredha','a');

 
//cryptage des données
	// $data = "03/05/1970_tibaredha_tibaredha_tibaredha_tibaredha";
	// echo $data;

	// echo "<br>";
	// $datac = Cryptage::encrypt($data);
	// echo $datac;

	// echo "<br>";
	// $datadc = Cryptage::decrypt($datac);

	// echo "<br>";
	// echo $datadc;
?>
<?php 
// echo 'max_execution_time = ' . ini_get('max_execution_time') . "\n";
// ini_set("max_execution_time", "10") . "\n";
// echo 'max_execution_time = ' . ini_get('max_execution_time') . "\n";
// ini_restore ( "max_execution_time" );
// echo 'max_execution_time = ' . ini_get('max_execution_time') . "\n";

// print_r(ini_get_all());

// echo 'display_errors = ' . ini_get('display_errors') . "\n";
// echo 'register_globals = ' . ini_get('register_globals') . "\n";
// echo 'post_max_size = ' . ini_get('post_max_size') . "\n";
// echo 'post_max_size+1 = ' . (ini_get('post_max_size')+1) . "\n";
// echo 'post_max_size in bytes = ' . return_bytes(ini_get('post_max_size'));
// if(! ini_set("max_execution_time", "10")) {echo "échec";}else {echo "ok";}

?>

 <?php
   // $listModules = get_loaded_extensions();
   // foreach ($listModules as $module){
      // echo '<li>Module : <b><a href="#'.$module.'">'.$module.'</a></b><br />';
   // }
   ?>

 <?php
   // echo '<ol type="I">';
   
   // foreach ($listModules as $module) {
      // $listFunctions = get_extension_funcs($module);
      // sort($listFunctions);
      // echo '<li id="'.$module.'">'.$module.'<ol type="1">';
      // foreach ($listFunctions as $function) {
          // $param = str_replace('_', '-', $function);
          // echo '<li><a href="http://fr.php.net/'.$param.'">'.$function.'</a></li>';
      // }
      // echo '</ol></li>';
   // }
   ?>


<!--
 <span class="import" onclick="show_popup('popup_upload')">Import CSV to MySQL</span>
 <div id="popup_upload">
        <div class="form_upload">
            <span class="close" onclick="close_popup('popup_upload')">x</span>
            <h2>Upload CSV file</h2>
            <form action="import.php" method="post" enctype="multipart/form-data">
                <input type="file" name="csv_file" id="csv_file" class="file_input">
                <input type="submit" value="Upload file" id="upload_btn">
            </form>
        </div>
    </div>	
-->


<!---->
<marquee behavior="slide" direction="up" scrollamount="2">
<p class="a">* Les informations rapportées par les certificats de décès permettent l'élaboration </p>
<p class="a">* Des statistiques exhaustives des causes médicales de décès en Algerie</p>
<p class="a">* Dont l'utilisation à pour  but  d'orienter et d'évaluer les actions et les recherches </p>
<p class="a">* Dans le domaine de la santé publique</p>
<p class="a">* Donc la qualité et la précision des certificats de décès doit etre ameliorée</p>
<p class="a">* Compte tenu des évolutions technologiques, le passage à un mode de certification </p>
<p class="a">* Electronique des décès est imperatif</p>
<p class="a">* Deverait permettre d'ameliorer considerablement le circuit du certificat de décès </p>	
</marquee>



</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/accueil.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>">
<?php //HTML::photosdb('IS NOT NULL',''); ?>
</div>	
<div class="scontentl2"><?php echo EDRSUS;?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		
<?php
/*
usersOnline.php
Author: Ilir Fekaj
Contact: tebrino@hotmail.com
Date: December 21, 2003
Latest version & info: http://www.free-midi.org/scripts/
Demo: http://www.free-midi.org

This very simple class enables you to track number of visitors online in
an easy and accurate manner. It's free for all purposes, just please don't
claim you wrote it. If you have any problems, please feel free to contact me.
Also if you use it, please send me the page URL.

Example usage:

include_once ("usersOnline.class.php");
$visitors_online = new usersOnline;

if ($visitors_online->count_users() == 1) {
	echo "There is " . $visitors_online->count_users() . " visitor online";
}
else {
	echo "There are " . $visitors_online->count_users() . " visitors online";
}

Important: You need to create database connection and select database before creating object!
--------------------------------------------
Table structure:
CREATE TABLE `useronline` (
  `id` int(10) NOT NULL auto_increment,
  `ip` varchar(15) NOT NULL default '',
  `timestamp` varchar(15) NOT NULL default '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id`(`id`)
) TYPE=MyISAM COMMENT='' AUTO_INCREMENT=1 ;

*/

class usersOnline {

	var $timeout = 600;
	var $count = 0;
	var $db_host="localhost";
	var $db_name="framework";   
	var $db_user="tibaredha";
	var $db_pass="030570";
	
	
	
	function mysqlconnect()
	{
	$cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $db;
	}
	
	
	
	function usersOnline () {
		$this->timestamp = time();
		$this->ip = $this->ipCheck();
		// $this->new_user();
		$this->delete_user();
		$this->count_users();
	}
	
	function ipCheck() {
	/*
	This function checks if user is coming behind proxy server. Why is this important?
	If you have high traffic web site, it might happen that you receive lot of traffic
	from the same proxy server (like AOL). In that case, the script would count them all as 1 user.
	This function tryes to get real IP address.
	Note that getenv() function doesn't work when PHP is running as ISAPI module
	*/
		if (getenv('HTTP_CLIENT_IP'))            {$ip = getenv('HTTP_CLIENT_IP');}
		
		elseif (getenv('HTTP_X_FORWARDED_FOR'))  {$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_X_FORWARDED'))      {$ip = getenv('HTTP_X_FORWARDED');
		}
		elseif (getenv('HTTP_FORWARDED_FOR'))    {$ip = getenv('HTTP_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_FORWARDED'))        {$ip = getenv('HTTP_FORWARDED');
		}
		else                                     {$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	
	function new_user() {
		$this->mysqlconnect();
		$insert = mysql_query ("INSERT INTO useronline(timestamp, ip) VALUES ('$this->timestamp', '$this->ip')");
	}
	
	function delete_user() {
		$this->mysqlconnect();
		$delete = mysql_query ("DELETE FROM useronline WHERE timestamp < ($this->timestamp - $this->timeout)");
	}
	
	function count_users() {
		$this->mysqlconnect();
		$count = mysql_num_rows ( mysql_query("SELECT DISTINCT ip FROM useronline"));
		return $count;
	}

}

// $visitors_online = new usersOnline;
// if ($visitors_online->count_users() == 1) 
// {
	// echo "There is " . $visitors_online->count_users() . " visitor online";
// }
// else 
// {
// echo "There are " . $visitors_online->count_users() . " visitors online";
// }

?>
