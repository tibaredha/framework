<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2r">MSPRH</div>

<div class="contentsig">
<?php
 


?>
<?xml version='1.0' encoding='utf-8'?> 
<svg xmlns:cc="http://web.resource.org/cc/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     xmlns:svg="http://www.w3.org/2000/svg"
     xmlns="http://www.w3.org/2000/svg"	 
	 width=100% height="700"
	 y="100"
     onload="init(evt)"> 
	 
	<rect 
	x="0" xy="20"
	y="0"  ry="20"
	width=100%
	height="620"
	fill = "<?php echo "#FBEFEF";?>"
	/>

<script type="text/ecmascript"> 
<![CDATA[

	function init(evt) {
	    if ( window.svgDocument == null ) {
	      svgDocument = evt.target.ownerDocument;
	    }
   		
  	}
  
	function displayName(name) {
    	svgDocument.getElementById('country_name').firstChild.data = name;
	}
	function notify(n,url){
	location.href="http://"+url+"/framework/dashboard/SIG/"+n
	}
	
	function notify(url,root){
	location.href="http://"+url+"/"+root+"/sig/"
	}
  
]]>
</script>
<?php 
$root = explode('/', dirname($_SERVER['PHP_SELF']));
$root=$root[1];
?>	
<text class="label" id="country_name1" x="20" y="30">Repartition Des deces</text>  	  
<text class="label" id="country_name1" x="20" y="47">Commune de residence </text>  	  
     <g
     inkscape:groupmode="layer"
     id=""
     inkscape:label="Wilayas polygons"
     transform="translate(+180,-0)"
     style="display:inline">
	 
	
</g>
<text class="labelm" id="country_namem" x="600" y="35" onclick="notify('<?php echo $_SERVER['SERVER_NAME'];?>','<?php echo $root;?>')">Retour -> Algerie</text>			
<text class="label" id="country_name" x="350" y="200"     >en construction</text>	
<text class="label" id="country_name" x="20" y="65"       >Commune de *****</text>	
<g id="key" class="label">
<rect x="10" y="250" width="20" height="20" class="key colour0" /><text x="35" y="265">0</text>
<rect x="10" y="275" width="20" height="20" class="key colour1" /><text x="35" y="290">1 to 10</text>
<rect x="10" y="300" width="20" height="20" class="key colour2" /><text x="35" y="315">11 to 100</text>
<rect x="10" y="325" width="20" height="20" class="key colour3" /><text x="35" y="340">101 to 1000</text>
<rect x="10" y="350" width="20" height="20" class="key colour4" /><text x="35" y="365">1001+</text>
</g> 
</svg>
</div>	
<div class="contenth"><img id="image" src="<?php echo URL;?>public/images/sigh.jpg" ></div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/sig.png" ></div>
<div class="contentb"><img id="image" src="<?php echo URL;?>public/images/sigh.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logo;?>"></div>	
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		