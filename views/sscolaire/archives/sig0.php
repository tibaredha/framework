<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2r">MSPRH</div>

<div class="contentsig">
<?php
$structure = '='.Session::get("structure");// $structure = 'is not null';
$annee=(date('Y')-0);
$datejour1=$annee.'-01-01';
$datejour2=$annee.'-12-31';
$data = array();$datac = array();$datavc = array();
for ($i = 916; $i <= 968; $i+= 1) {
ob_start();
// $data[$i]= $this->clsig->colorsig($this->clsig->sigcommune('17000',$i,$datejour1,$datejour2,$structure));
// $datac[$i]= $this->clsig->nbrtostring('com','IDCOM',$i,'COMMUNE');
// $datavc[$i]= $this->clsig->valsigwc('deceshosp','COMMUNER',$i,$datejour1,$datejour2,$structure);
ob_end_flush();
}
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
	height="660"
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
	
	function notifya(url){
	location.href="http://"+url+"/framework/dashboard/SIGA/"
	}
  
]]>
</script>	
  
     <g
     inkscape:groupmode="layer"
     id=""
     inkscape:label="Wilayas polygons"
     transform="translate(+180,-0)"
     style="display:inline">	
</g>
<text class="label" id="country_name"    x="350" y="200">en construction</text>
<text class="label"  id="country_name1"  x="20"  y="30">Repartition Des deces</text>  	  
<text class="label"  id="country_name1"  x="20"  y="50">Commune de residence :</text>  
<text class="label"  id="country_name"   x="185" y="50">***</text>
<text class="label"  id="country_name"   x="20"  y="70">Année = <?php echo $annee ;?></text>
<text class="label"  id="country_name"   x="20"  y="90" cursor="default" onclick="notifya('<?php echo $_SERVER['SERVER_NAME'];?>')" >retour algerie</text>		
	
<g id="key" class="label">
<rect x="10" y="240" width="115" height="160" class="key colourx" />
<rect x="20" y="250" width="20" height="20" class="key colour0" /><text x="45" y="265">0</text>
<rect x="20" y="275" width="20" height="20" class="key colour1" /><text x="45" y="290">1 - 9</text>
<rect x="20" y="300" width="20" height="20" class="key colour2" /><text x="45" y="315">10 - 99</text>
<rect x="20" y="325" width="20" height="20" class="key colour3" /><text x="45" y="340">100 - 999</text>
<rect x="20" y="350" width="20" height="20" class="key colour4" /><text x="45" y="365">1000 + </text>
<text x="20" y="390">&copy 2019 Dr tiba </text>
</g> 
</svg>
</div>	
<div class="contenth"><img id="image" src="<?php echo URL;?>public/images/sigh.jpg" ></div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/sig.png" ></div>
<div class="contentb"><img id="image" src="<?php echo URL;?>public/images/sigh.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logo;?>"></div>	
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		