<!DOCTYPE html>
<html>
<head>
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
</head>
<body> 
<!--<body onload="remplir1(); remplir2(); remplir3();" > -->
<!--<body onload="InitThis();" >--> 
<?php 
Session::init();
Lang::init(Session::get('loggedIn'));
$temps = Temp::getmicrotime();
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