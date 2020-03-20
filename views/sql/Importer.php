<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 3fr 1fr  ;
  grid-template-rows: 20px 45px 45px 45px 45px 45px 45px 45px;
  grid-gap: 5px;
}

#a {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 2 / 3;}
#b {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 3 / 4;}
#c {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 4 / 5;}
#d {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 5 / 6;}
#e {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 6 / 7;}
#f {background: green ;text-align: center;border-radius:5px;padding: 8px;grid-column: 2  / 3;  grid-row: 7 / 8;color:white;}
#g {background: salmon;text-align: center;border-radius:5px;padding: 8px;grid-column: 2  / 3;  grid-row: 8 / 9;color:white;}


#wilayarg,#structurerg,#type1,#type2,#table {background: yellow; text-align: center ; border-radius: 5px;width: 100%;height: 100%;}
#dateus,#dateus1 {background: yellow; text-align: center ; border-radius: 5px;width: 49%;height: 100%;}
</style>


<div class="sheader1l"><p id="evaluation"><?php echo "Gérer les certificats de décès";?></p></div><div class="sheader1r"><p id="evaluation"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php echo $this->msg; echo " Mortalité Hospitalière ";?></div><div class="sheader2r">***</div>
<div class="contentl">
<?php 
function txts($x,$y,$name,$size,$value,$param)
{
echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\"  id=\"".$param."\"   required />";
}
       
	echo '<form ALIGN="center" action="'.URL.'sql/Importer1/" method="POST">';
	echo '<div id="inner-grid">	';			
		echo '<div id="a">'; txts(100,240,'Datedebut',0,date('01-01-Y'),'dateus');txts(100,240,'Datefin',0,date('31-12-Y'),'dateus1');  echo '</div>';	
		echo '<div id="b">'; HTML::WILAYA('wilaya','wilayarg','wilaya','wil','17000','DJELFA') ;echo '</div>';
		echo '<div id="c">'; HTML::structure('structure','structurerg','structure','1','EPH_MOHAD_ABDELKADER'); echo '</div>';	
		echo '<div id="d">'; echo '<input id="table"  type="txt" name="tbl_name" value="deceshosp"/>';   echo '</div>';	
		echo '<input type="hidden" name="login" value="'.Session::get('login').'"/>';   
		echo '<div id="e">'; echo '<input  id="submitr" type="submit" value="Importer" />'; echo '</div>';	
		echo '</div>';		
	echo "</form>";

?>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/eva.png"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logo;?>"></div>

	
<div class="scontentl2"><?php echo "***";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php echo "***";//echo $this->msg; echo "";?></div>
<div class="scontentr1"><?php echo "***";//echo dsp; echo "";?></div>		
