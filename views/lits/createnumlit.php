<div class="sheader1l"><p id="lhelp">Gérer les lits<?php //echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lhelp"><?php html::NAV();?></p></div>
<div class="sheader2l">liste des lits par service </div><div class="sheader2r">MSPRH</div>
<div class="contentl formaut">
<div class="form-style-10   ">
<form method="post" action="<?php echo URL;?>lits/litSave/">
	<div class="section"><span>1</span>Service</div> <div class="inner-wrap"><?php html::SERNSC('NAIS1','SERVI1','SERVI1','servicedeces','1','Service');?></div>
	<div class="section"><span>2</span>N° LIT </div><div class="inner-wrap"><input type="text" name="nlit" value="0" /></div>
	<input type="hidden" name="wilaya" value="<?php echo Session::get('wilaya')  ;?>"/>
	<input type="hidden" name="structure" value="<?php echo Session::get('structure')  ;?>"/>
	</br>
	<div class="inner-wrap"><input  id="Clearb" type="submit" /></div>	
</form>
</br>
<?php
$colspan=4;
echo'<table >';
	
    echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	echo'<th style="width:10px;">N° LIT</th>';
	echo'<th style="width:10px;">Nom_Prénom</th>';
	echo'<th style="width:10px;">Sup</th>';
	echo'</tr>';

foreach($this->userListview as $key => $value)
{ 
$bgcolor_donate ='#EDF7FF';
echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;

echo'<td align="left" >'.$value['nlit'].'</td>';
echo'<td align="left" >'.$value['idpt'].'</td>';
echo '<td align="center" style="width:10px;" ><a class="delete" title="supprimer"  href="'.URL.'naissance/deletelit/'.$value['id'].'/'.$value['st'].'/'.'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';


echo '</tr>';			
}
echo "</table>";	

?>

</div>

</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/lit.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>
<div class="scontentl2">Gérer les lits<?php //echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>

