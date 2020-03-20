<style type="text/css"> 
#contente_2, #contente_3, #contente_4, #contente_5, #contente_6 { display: none; height: auto; clear: all;} 
</style> 
<script type="text/javascript">
/*Activates the Tabs*/
function tabSwitch(new_tab, new_content) {    
    document.getElementById('content_1').style.display = 'none';  
    document.getElementById('content_2').style.display = 'none';  
    document.getElementById('content_3').style.display = 'none';  
	document.getElementById('content_4').style.display = 'none';  
	document.getElementById('content_5').style.display = 'none';  
	document.getElementById('content_6').style.display = 'none';  
	/*document.getElementById('content_3').style.display = 'none';*/ 
	document.getElementById(new_content).style.display = 'block';     
    document.getElementById('tabe_1').className = '';  
    document.getElementById('tabe_2').className = '';  
    document.getElementById('tabe_3').className = '';  
	document.getElementById('tabe_4').className = '';  
	document.getElementById('tabe_5').className = '';  
	document.getElementById('tabe_6').className = '';  
	/*document.getElementById('tab_3').className = ''; */        
    document.getElementById(new_tab).className = 'active';        
}
</script>




<div class="sheader1l"><p id="lnouveau"><?php echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">sheader3</div><div class="sheader2r">sheader33</div>
<div class="listl">
	
	<form  action="<?php echo URL."fpdf/deces/decesmaternels.php?uc=".$this->user[0]['id'];  ?>"  method="POST"> 
		<div class="tabbed_area">  
			 <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tabe_1', 'content_1');" id="tabe_1" class="active">Section 1</a></li>  
            <li><a href="javascript:tabSwitch('tabe_2', 'content_2');" id="tabe_2">Section 2</a></li> 
			<li><a href="javascript:tabSwitch('tabe_3', 'content_3');" id="tabe_3">Section 3</a></li> 	
            <li><a href="javascript:tabSwitch('tabe_4', 'content_4');" id="tabe_4">Section 4</a></li> 	
            <li><a href="javascript:tabSwitch('tabe_5', 'content_5');" id="tabe_5">Section 5</a></li> 	
            <li><a href="javascript:tabSwitch('tabe_6', 'content_6');" id="tabe_6">Section 6</a></li> 	
		</ul> 
        
		<?php
			$data = array(
			""       => '', 
			""       => '' 
			);
			HTML::tabsdecesmat($data);
			?>		
						
		</div> 
	</form> 
</div>	
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php echo "";echo $this->msg; echo "";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	