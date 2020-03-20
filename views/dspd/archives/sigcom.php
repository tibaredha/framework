<div class="sheader1l">
<?php
Session::init();
if (isset($_SESSION['errorlogin'])) {
$sError = '<p id="errorlogin">' . $_SESSION['errorlogin'] . '</p>';		
echo $sError;			
}
else
{
$sError='<p id="llogin">******</p>';
echo $sError;
}
?>
</div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">
*************************
</div>
<div class="sheader2r">***</div>
<div class="contentl formaut">
	
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/sig.png" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo "Date d'expiration : ".Session::dateexpiration; ?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		

