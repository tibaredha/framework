<?php 
$ll=HTML::nbrtostring('structure','id',Session::get('structure'),'lat');
$lg=HTML::nbrtostring('structure','id',Session::get('structure'),'lg');
?>
<div class="sheader1l"><p id="lnouveau"><?php echo "";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l"><P><?php echo "Situation geographique   "?> <?php //echo $this->user[0]['PRENOM2'];?><?php //echo $this->user[0]['id'];?></P></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">
<div   id="map"     >
<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.fr/?ie=UTF8&amp;t=m&amp;ll=<?php echo $ll;?>,<?php echo $lg;?>&amp;spn=0.048944,0.073128&amp;z=15&amp;output=embed">
</iframe>

<small>
<a href="https://maps.google.fr/?ie=UTF8&amp;t=m&amp;ll=<?php echo $ll;?>,<?php echo $lg;?>&amp;spn=0.048944,0.073128&amp;z=15&amp;source=embed" style="color:red;text-align:center">Agrandir le plan</a>
</small>
</div>
</div>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/naissance.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo "";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	