<div class="sheader1l"><p id="lhelp"><?php echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lhelp"><?php html::NAV();?></p></div>
<div class="sheader2l">Bibliotheque</div><div class="sheader2r">MSPRH</div>
<div class="contentl">
	<div class="tabbed_area">  
	<ul class="tabs">  
		<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">1er partie</a></li>  
		<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">2em partie</a></li> 
		<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">3em partie</a></li> 	
		<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">4em partie </a></li> 	
	</ul>   
	<?php 
	echo '<div id="content_1" class="contenttabs1">';
		echo '<Ol>';
			
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/Décret exécutif N°07-140 du 19-05-2007 portant création des EPH et des EPSP.pdf">D_exécutif N°07-140 du 19-05-2007 portant création des EPH et des EPSP.pdf</a>';echo '&nbsp;';echo '</li>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/cim10.pdf">CIM10.pdf</a>';echo '&nbsp;';echo '</li>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/Instruction_declaration_obligatoire _deces_maternel.pdf">Arrete N° 89 du 04/07/2013 déclaration_obligatoire _décès_maternel.</a>';echo '&nbsp;';echo '</li>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/dm.pdf">Instruction N° 12 du 01/06/2014  L\'AUDIT Décès maternels.</a>';echo '&nbsp;';echo '</li>';	
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/decesfrx.pdf">D_E n° 16-80 du 24/02/2016 fixant le modèle du certificat de décés -p(12).</a>';echo '&nbsp;';echo '</li>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/decesar.pdf">decesar</a>';echo '&nbsp;';echo '</li>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/inhumation.pdf">D_E n° 16-77 du 24/02/2016 relatif à l\'Inhumation.-p(4)</a>';echo '&nbsp;';echo '</li>';
		    echo '<li>';echo '<a href="'.URL.'fpdf/doc/491.PDF">Circulaire inter-ministerielle du 15/04/2017 relatif à la mise en application </a>';echo '&nbsp;';echo '</li>';
		
		
		echo '</Ol>';
	echo '</div>';
	
	echo '<div id="content_2" class="contenttabs2">';
		echo '<Ol>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/MMMP2002_2003.pdf">MMMP2002_2003.</a>';echo '&nbsp;';echo '</li>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/perinat.pdf">D_E n° 05-438 du 10/11/2005 relatif a la Périnatalité .</a>';echo '&nbsp;';echo '</li>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/périnatalité 06-09.pdf">Périnatalité 06-09.pdf</a>';echo '&nbsp;';echo '</li>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/périnatalité 16-20.pdf">Périnatalité 16-20.pdf</a>';echo '&nbsp;';echo '</li>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/Rapport_autopsie_.pdf">Rapport_autopsie</a>';echo '&nbsp;';echo '</li>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/Instructions pour remplir CD_mars_2019.pdf">Instructions pour remplir CD_mars_2019.pdf</a>';echo '&nbsp;';echo '</li>';echo '</li>';
			echo '<li>';echo '<a href="'.URL.'fpdf/doc/plan_national.pdf">Plan_national de réduction de la mortalité maternelle.2015</a>';echo '&nbsp;';echo '</li>';
		echo '</Ol>';
	echo '</div>';
	
	echo '<div id="content_3" class="contenttabs3">';
		echo '<Ol>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
		echo '</Ol>';
	echo '</div>';
	
	echo '<div id="content_4" class="contenttabs4">';
		echo '<Ol>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
			echo '<li>';echo '</li>';
		echo '</Ol>';
	echo '</div>';
	?>			
	</div>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/help.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		