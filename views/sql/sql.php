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
<div class="sheader2l"><?php $sError='Produire un fichier sql du '.$this->d1.' au '.$this->d2.'';echo $sError;  ?></div>

<div class="sheader2r">MSPRH</div>
<div class="contentl">

<?php 
$this->clgdatabse->exportsql("deceshosp");
?>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/dump.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logo;?>"></div>		
<div class="scontentl2"><?php echo " Du "; echo $this->d1 ; echo " Au "; echo $this->d2;?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		

