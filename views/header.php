<!DOCTYPE html>
<html>
<head>
<?php $time = microtime(true);?>
<title><?php if (isset ($this->title)){echo $this->title; }else {echo title ;}?></title>
<link rel="icon" type="image/png" href="<?PHP echo URL; ?>public/images/<?php echo logo ?>" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/bootstrap.min.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/cssgrid.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/tabs.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/mystyle.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/nss.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/bnm.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/alertify/alertify.core.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/alertify/alertify.default.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/notification-demo-style.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/tiba.css?t=<?php echo time();?>">


<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/jquery.autocomplete.css?t=<?php echo time();?>">


<script src="<?php echo URL;?>public/js/jscode1.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/jquery.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/jquery.maskedinput.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/mystyle.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/popper.min.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/bootstrap.min.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/bootstrap.bundle.min.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/tiba.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/alertify.min.js?t=<?php echo time();?>"></script>

<script src="<?php echo URL;?>public/js/jquery.ui.autocomplete.js?t=<?php echo time();?>"></script>
<!--graphe-hightchart-->
<script src="<?php echo URL;?>code/highcharts.js"></script>
<script src="<?php echo URL;?>code/modules/series-label.js"></script>
<script src="<?php echo URL;?>code/modules/exporting.js"></script>
<script src="<?php echo URL;?>code/modules/export-data.js"></script>
<!--graphe-->


<script src="<?php echo URL;?>public/js/math.min.js?t=<?php echo time();?>"></script>

<!--default js and css in view / -->
<?php if (isset($this->js)){foreach ($this->js as $js){echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';}}?>
<?php if (isset($this->css)){foreach ($this->css as $css){echo '<link rel="stylesheet" type="text/css" href="'.URL.'views/'.$css.'"></script>';}}?>
<?php  
//*************************1er exemple systeme cahe*******************************//
// require 'cache.php';//le fichier se localise dans le dossier lib 
// $root=dirname(__FILE__);
// $cache=new cache($root.'/temp',1);
//1ere methode
// if(!$variable=$cache->read('variable'))
// {
// sleep(1);	
// $variable='mon texte';	
// $cache->write('variable',$variable);	
// }
// echo $variable;

//2eme methode
// require 'twiter.php';
// $cache->inc($root.'\twiter.php','tibaredha.html');

//3eme methode
// if(!$cache->start('variable.html'))
// {
	// sleep(1);	
	// $variable='mon texte';	
	// echo $variable;	

	// $variable1='mon texte1';	
	// echo $variable1;	

	// $variable2='mon texte2';	
	// echo $variable2;	

	// $variable3='mon texte3';	
	// echo $variable3;	

	// $variable4='mon texte4';	
	// echo $variable4;	

	// $variable5='mon texte5';	
	// echo $variable5;	
// }
// $cache->fin();
//************************2eme exemple de cache **********************************************//
// $handel= opendir('views/');
// $cache="cache/cache.php";
// if (file_exists($cache)) 
// {
	// echo "1";
	// include $cache;	
// } 
// else 
// {
	// echo "2";
	// $output=null;
	// while ( ($file=readdir($handel))!=false  ){
	// $output.=$file.'<br>';		
	// }
	// closedir($handel);
	// echo $output;	
    // $fh=fopen($cache,'w+') or die('erreur');
	// fwrite($fh,$output);
	// fclose($fh);
// }
//************************2eme exemple de cache **********************************************//
?>
</head>
<body>
 
<!--<body onload="remplir1(); remplir2(); remplir3();" > -->
<!--<body onload="InitThis();" >--> 
<?php 
Session::init();
Lang::init(Session::get('loggedIn'));
// $temps = Temp::getmicrotime();
?>
<div class="tiba" >
    <div class="headerl"></div>
	<div class="headerc"><p id="wdj2"><?php echo TXT_TITRE_INDEX ;?></p></div>	
	<div class="headerr"></div>
	<div class="sheaderl"><?php require 'menu/menu.php';?></div>		
	<div class="sheaderr"><?php 
	if (Session::get('loggedIn') == true)
	{
		echo '<p id="wdj" >';
		if (Session::get('lang')=='ar') {echo ' <a title="حساب" href="'.URL.'users/profil/'.Session::get('id').'/1">'.Session::get('login').'</a> : '.TXT_USER ;}
		else {echo TXT_USER.' : <a title="Modifier compte"   href="'.URL.'users/profil/'.Session::get('id').'/1">'.Session::get('login').'</a>';}
		echo '</p>';
	}
	else 
	{
	echo '<p id="wdj" >DSP : '.wilaya.'</p>';
	}
	?>
	</div>	