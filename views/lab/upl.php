<div class="sheader1l"><p id="lregister">Gérer les laboratoires pharmaceutiques <?php //echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l"> Créer un nouveau laboratoire pharmaceutique </div>
<div class="sheader2r">MSPRH</div>
<?php
echo '<div class="contentl">';?>
<div class="form-style-10">
	<form method="post" action="<?php echo URL;?>lab/upl1/<?php echo $this->user[0]['id'];?>"  name="fileForm" id="fileForm" enctype="multipart/form-data" > 
		<div class="section"><span>1</span> Changer photos</div>
		<div class="inner-wrap"></br> 
		<input type="file" name="upfile" id="upfile" size="100">&nbsp;&nbsp;<br/><br/></div>
		
		</br>
		<div class="inner-wrap"><input  type="submit"  /></div>
	
	</form>
	</div>
	
<?php 

if (isset($this->msg)) 
{
echo $this->msg;
}
else 
{
echo '*upload_max_filesize=10M';
}

?>	
	
	
<?php
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/logolab/logolab<?php echo $this->user[0]['id'];?>.png?t="<?php echo time();?> ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>			
<div class="scontentl2">Gérer les laboratoires pharmaceutiques</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		