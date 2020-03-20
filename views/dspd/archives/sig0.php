<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2r">***</div>

<div class="contentsig">
<?php
 
$data = array(
"916"  => html::color(html::equincommune1('17000',916)),//Djelfa
"917"  => html::color(html::equincommune1('17000',917)),//El Idrissia
"918"  => html::color(html::equincommune1('17000',918)),//Oum Cheggag
"919"  => html::color(html::equincommune1('17000',919)),//El Guedid
"920"  => html::color(html::equincommune1('17000',920)),//Charef
"921"  => html::color(html::equincommune1('17000',921)),//El Hammam
"922"  => html::color(html::equincommune1('17000',922)),//Touazi
"923"  => html::color(html::equincommune1('17000',923)),//Beni Yacoub
"924"  => html::color(html::equincommune1('17000',924)),//ainoussera
"925"  => html::color(html::equincommune1('17000',925)),//guernini
"926"  => html::color(html::equincommune1('17000',926)),//sidilaadjel
"927"  => html::color(html::equincommune1('17000',927)),//hassifdoul
"928"  => html::color(html::equincommune1('17000',928)),//elkhamis
"929"  => html::color(html::equincommune1('17000',929)),//birine
"930"  => html::color(html::equincommune1('17000',930)),//Dra Souary
"931"  => html::color(html::equincommune1('17000',931)),//benahar
"932"  => html::color(html::equincommune1('17000',932)),//hadshari
"933"  => html::color(html::equincommune1('17000',933)),//bouiratlahdab
"934"  => html::color(html::equincommune1('17000',934)),//ainfka
"935"  => html::color(html::equincommune1('17000',935)),//hassi bahbah
"936"  => html::color(html::equincommune1('17000',936)),//Mouilah
"937"  => html::color(html::equincommune1('17000',937)),//El Mesrane
"938"  => html::color(html::equincommune1('17000',938)),//Hassi el Mora
"939"  => html::color(html::equincommune1('17000',939)),//zaafrane
"940"  => html::color(html::equincommune1('17000',940)),//hassi el euche
"941"  => html::color(html::equincommune1('17000',941)),//ain maabed
"942"  => html::color(html::equincommune1('17000',942)),//darchioukh
"943"  => html::color(html::equincommune1('17000',943)),//Guendouza
"944"  => html::color(html::equincommune1('17000',944)),//El Oguila
"945"  => html::color(html::equincommune1('17000',945)),//El Merdja
"946"  => html::color(html::equincommune1('17000',946)),//mliliha
"947"  => html::color(html::equincommune1('17000',947)),//sidibayzid
"948"  => html::color(html::equincommune1('17000',948)),//Messad
"949"  => html::color(html::equincommune1('17000',949)),//Abdelmadjid
"950"  => html::color(html::equincommune1('17000',950)),//Haniet Ouled Salem
"951"  => html::color(html::equincommune1('17000',951)),//Guettara
"952"  => html::color(html::equincommune1('17000',952)),//Deldoul
"953"  => html::color(html::equincommune1('17000',953)),//Sed Rahal
"954"  => html::color(html::equincommune1('17000',954)),//Selmana
"955"  => html::color(html::equincommune1('17000',955)),//El Gahra
"956"  => html::color(html::equincommune1('17000',956)),//Oum Laadham
"957"  => html::color(html::equincommune1('17000',957)),//Mouadjebar
"958"  => html::color(html::equincommune1('17000',958)),//Ain el Ibel
"959"  => html::color(html::equincommune1('17000',959)),//Amera
"960"  => html::color(html::equincommune1('17000',960)),//N'thila
"961"  => html::color(html::equincommune1('17000',961)),//Oued Seddeur
"962"  => html::color(html::equincommune1('17000',962)),//Zaccar
"963"  => html::color(html::equincommune1('17000',963)),//Douis
"964"  => html::color(html::equincommune1('17000',964)),//Ain Chouhada
"965"  => html::color(html::equincommune1('17000',965)),//Tadmit
"966"  => html::color(html::equincommune1('17000',966)),//El Hiouhi
"967"  => html::color(html::equincommune1('17000',967)),//Faidh el Botma
"968"  => html::color(html::equincommune1('17000',968)) //Amourah
);

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
	
	function notifya(url){
	location.href="http://"+url+"/framework/dashboard/SIGA/"
	}
  
]]>
</script>	
<text class="label" id="country_name1" x="20" y="30">Repartition Des deces</text>  	  
<text class="label" id="country_name1" x="20" y="47">Commune de residence </text>  	  
     <g
     inkscape:groupmode="layer"
     id=""
     inkscape:label="Wilayas polygons"
     transform="translate(+180,-0)"
     style="display:inline">
	 
	
</g>
<text class="labelm" id="country_namem" x="600" y="35" onclick="notifya('<?php echo $_SERVER['SERVER_NAME'];?>')"      >Algerie</text>		
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