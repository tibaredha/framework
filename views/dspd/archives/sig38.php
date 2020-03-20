<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2r">***</div>

<div class="contentsig">
<?php
 
$data = array(
"1944"  => html::color(html::equincommune1('38000',1944)),//Tissemsilt
"1966"  => html::color(html::equincommune1('38000',1966)),//mlaaba
"1977"  => html::color(html::equincommune1('38000',1977)),//sidi laatri
"1976"  => html::color(html::equincommune1('38000',1976)),//Lardjem
"1950"  => html::color(html::equincommune1('38000',1950)),//Maalcem
"1949"  => html::color(html::equincommune1('38000',1949)),//Ammari
"1952"  => html::color(html::equincommune1('38000',1952)),//Sidi abed
"1967"  => html::color(html::equincommune1('38000',1967)),//Tamalaht
"1975"  => html::color(html::equincommune1('38000',1975)),//Larbaa
"1951"  => html::color(html::equincommune1('38000',1951)),//Ouled bessem
"1968"  => html::color(html::equincommune1('38000',1968)),//Beni lahcen
"1965"  => html::color(html::equincommune1('38000',1965)),//bordj bounaama
"1972"  => html::color(html::equincommune1('38000',1972)),//Boucaid
"1971"  => html::color(html::equincommune1('38000',1971)),//sidi slimane
"1969"  => html::color(html::equincommune1('38000',1969)),//Benichaib
"1946"  => html::color(html::equincommune1('38000',1946)),//khemisti
"1960"  => html::color(html::equincommune1('38000',1960)),//Layoune
"1953"  => html::color(html::equincommune1('38000',1953)),//Theniet elhad
"1958"  => html::color(html::equincommune1('38000',1958)),//sidi boutouchent
"2336"  => html::color(html::equincommune1('38000',2336)),//Youssoufia
"1963"  => html::color(html::equincommune1('38000',1963)),//bourdj el amir abdelkader
"1973"  => html::color(html::equincommune1('38000',1973))//Lazharia

);

?>
<?xml version='1.0' encoding='utf-8'?> 
<svg xmlns:cc="http://web.resource.org/cc/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     xmlns:svg="http://www.w3.org/2000/svg"
     xmlns="http://www.w3.org/2000/svg"	 
	 width=100% height="700"
	 y="250"
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
     transform="translate(+220,+80)"
     style="display:inline">
	 
	<path 
	fill = "<?php echo $data['1966'];?>" stroke="black" onmouseover="displayName('Mlaaba')" onclick="notify()"	
	d="M21,81 11,81 7,88 7,96 6,109 10,111 7,119 2,125 2,131 12,147 16,145 21,150  25,146 26,137 26,130 28,118 33,116 34,111 37,105 42,103 39,99 37,91 32,94 24,93 21,81"/> 

	<path 
	fill = "<?php echo $data['1977'];?>" stroke="black" onmouseover="displayName('Sidi- lantri')" onclick="notify()"	
	d="M47,106  52,105 54,101 59,100 66,100 72,102 75,105 78,109 74,109 74,113 77,119 80,126 78,131 76,137 69,138 64,133 53,132 50,126 45,129 39,127 36,122 32,117 34,111 37,105 42,103 47,106"/> 

	<path 
	fill = "<?php echo $data['1976'];?>" stroke="black" onmouseover="displayName('Lardjem')" onclick="notify()"	
	d="M87,127 92,129 97,130 98,125 98,118 95,113 97,110 94,107 99,100 96,96 93,97 92,92 87,92 82,91 82,84 85,78 85,71 88,68 87,63 87,58 84,55 81,51 77,59 72,60 67,59 63,55 57,53 52,51 47,51 42,52 39,55  43,60 40,64 36,68 41,71 47,74 44,79 41,84 37,91 39,99 42,103 47,106 52,105 54,101 59,100 66,100 72,102 75,106 78,109 74,109 74,113 77,119 80,126 87,127"/> 

	<path 
	fill = "<?php echo $data['1950'];?>" stroke="black" onmouseover="displayName('Maalcem')" onclick="notify()"	
	d="M97,135 94,141 91,147 93,154 89,151 87,155 84,151 82,157 75,158 70,155 70,145 68,142 69,138 76,137 78,131 80,125 87,127 92,129 97,129  97,135"/> 

	<path 
	fill = "<?php echo $data['1949'];?>" stroke="black" onmouseover="displayName('Ammari')" onclick="notify()"	
	d="M103,125 109,126 113,130 119,136 124,140 130,143 129,150 129,156 128,162 127,166 122,165 123,173 119,177 112,177 107,175 103,169 97,164 96,158 93,154 91,147 94,141 97,135 97,130 98,125 103,125"/> 

	<path 
	fill = "<?php echo $data['1952'];?>" stroke="black" onmouseover="displayName('Sidi abed')" onclick="notify()"	
	d="M101,97  100,92 104,91 108,93 110,97 115,100 120,99 126,100 134,101 140,105 138,110 139,121 144,124 140,127 139,134 140,140 136,144 130,144 124,141 119,136 113,131 109,126 103,125 98,125 98,118 95,113 97,110 94,107 99,100  101,97"/> 

	<path 
	fill = "<?php echo $data['1967'];?>" stroke="black" onmouseover="displayName('Tamalaht')" onclick="notify()"	
	d="M93,70 97,71 102,73 106,78 110,77 112,83 112,89 104,91 100,92 101,97 99,100 96,95 93,97 92,92 87,92 82,91 82,83 85,78 84,71 88,69  93,70"/> 
	
	<path 
	fill = "<?php echo $data['1975'];?>" stroke="black" onmouseover="displayName('Larbaa')" onclick="notify()"	
	d="M38,50  41,45 45,41 41,36 45,36 47,32 49,36 52,32 56,35 60,33 64,30 69,28 71,33 71,39 74,46 76,52 81,56 77,58 72,59 67,58 63,55 57,52 52,51 47,51 42,52 39,54 38,50"/> 
	
	
	<path 
	fill = "<?php echo $data['1944'];?>" stroke="black" onmouseover="displayName('Tissemssilet')" onclick="notify()"	
	d="M130,171 132,176 136,172 143,171 151,170 156,173 163,171 172,171 181,168 190,166 186,155 186,140 181,139 177,141 172,133 169,132 170,127 165,129 157,136 151,135 146,141 145,136 143,132 139,132 139,135 140,140 136,144 130,144 129,150 129,156 128,162 127,166 130,171"/> 
	
	<path 
	fill = "<?php echo $data['1951'];?>" stroke="black" onmouseover="displayName('Ouled bessem')" onclick="notify()"	
	d="M143,102 146,100 148,104 152,105 156,107 161,107 165,110 167,118 174,118 174,122 177,123 176,126  170,127 165,129 157,136 151,135 146,141 145,136 143,133 139,132 140,128 144,124 139,121 138,110 140,105 143,102"/> 
	
	
	<path 
	fill = "<?php echo $data['1968'];?>" stroke="black" onmouseover="displayName('Beni lahcen')" onclick="notify()"	
	d="M111,75 112,71 115,73 118,71 121,71 125,72 128,75 128,79 130,81 135,82 139,81 140,86 142,90 143,94 145,97 143,102 140,105 134,101 126,100 120,99 115,100 110,97 108,93 112,88 112,84 110,78 111,75"/> 
	
	<path 
	fill = "<?php echo $data['1965'];?>" stroke="black" onmouseover="displayName('bordj bounaama')" onclick="notify()"	
	d="M87,53 93,54 99,55 104,57 108,54 117,56 116,62 117,68 118,71 115,73 112,72 111,75 110,78 106,79 102,72 97,71 93,71 88,69 87,63 87,58 83,56 81,54 87,53"/> 
	
		<path 
	fill = "<?php echo $data['1973'];?>" stroke="black" onmouseover="displayName('Lazharia')" onclick="notify()"	
	d="M71,23 70,16 76,17 79,13 81,8 82,3 85,3 87,10 91,12 94,16 98,18 100,25 104,29 108,34 104,37 100,43 99,48 96,50 93,54 87,54 81,54 76,52 74,46 71,39 71,33 69,28 71,23"/> 
	
	<path 
	fill = "<?php echo $data['1972'];?>" stroke="black" onmouseover="displayName('Boucaid')" onclick="notify()"	
	d="M113,37 118,40 124,43 128,37 131,44 136,45 138,51 140,58 140,62 135,61 130,57 127,52 122,52 117,56 108,54 104,57 99,55 93,54 95,51 99,48 100,43 104,38 108,34  113,37"/> 
	
	
	<path 
	fill = "<?php echo $data['1971'];?>" stroke="black" onmouseover="displayName('sidi slimane')" onclick="notify()"	
	d="M142,67 140,70 138,73 140,78 139,81 137,81 136,82 130,81 128,79 128,75 125,72 121,71 118,71 117,68 115,62 117,56 122,52 127,53 130,57 135,61 140,62   142,67"/> 
	
	
	<path 
	fill = "<?php echo $data['1969'];?>" stroke="black" onmouseover="displayName('Benichaib')" onclick="notify()"	
	d="M142,54 147,48 153,50 155,56 159,63 159,70 154,72 159,77 163,83 161,90 163,97 165,103 165,110 161,107 156,107 152,105 148,104 146,101 145,97 143,94 142,90 140,86 139,81 140,78 139,72 141,70 142,66 140,62 140,58 138,51 136,45    142,54"/> 
	
	<path 
	fill = "<?php echo $data['1946'];?>" stroke="black" onmouseover="displayName('khemisti')" onclick="notify()"	
	d="M168,94 173,93 177,96 182,96 186,82 190,95 200,94 201,86 205,83 209,84 209,90 208,97 205,103 198,109 191,115 190,123 198,126 198,131 197,140 200,146 197,151 201,155 195,161 189,166 186,157 186,140 181,139 177,141 172,133 169,132 170,127 176,126 177,123 174,122 174,119 167,118 165,110 165,103 163,97 168,94"/> 
	
	<path 
	fill = "<?php echo $data['1960'];?>" stroke="black" onmouseover="displayName('Layoune')" onclick="notify()"	
	d="M215,88 222,91 227,96 231,103 233,110 240,112 238,117 241,121 240,129 244,135 253,137 263,141 272,142 277,144 270,155 269,169 245,169 225,174 224,162 214,162 209,165 204,162 207,158 212,156 212,151 207,153 201,155 197,151 200,146 197,140 198,131 198,126 190,123 191,115 198,109 205,103 208,97 209,90 215,88"/> 
	
	
	<path 
	fill = "<?php echo $data['1953'];?>" stroke="black" onmouseover="displayName('Theniet elhad')" onclick="notify()"	
	d="M243,108 250,107 256,108 255,103 250,98 245,93 246,86 248,80 244,75 241,74 236,74 230,72 229,68 226,62 223,58 221,50 216,45 214,38 216,33 201,35 205,39 200,37 197,25 194,33 189,33 185,35 181,42 177,46 176,52 170,54 166,60 174,59 182,59 189,66 195,69 201,68 204,75 209,80 209,84 209,90 215,88 222,91 227,97 231,103 233,111 240,112 243,108"/> 

	<path 
	fill = "<?php echo $data['1958'];?>" stroke="black" onmouseover="displayName('sidi boutouchent')" onclick="notify()"	
	d="M166,61 174,59 182,60 189,66 195,70 201,68 204,75 209,80 209,84 205,83 201,86 200,94 190,95 186,91 182,96 177,96 173,93 168,94 163,97 161,90 163,82 159,77 154,72  159,77 154,72 159,70 159,63  166,61    "/> 
	
	
	<path 
	fill = "<?php echo $data['2336'];?>" stroke="black" onmouseover="displayName('Youssoufia')" onclick="notify()"	
	d="M222,30 227,30 232,28 234,34 237,40 245,40 251,41 247,45 246,51 245,57 240,60 241,65 241,70 241,74 236,73 230,72 229,67 226,62 223,57 221,50 216,45 214,38 216,33 222,30"/> 
	
	<path 
	fill = "<?php echo $data['1963'];?>" stroke="black" onmouseover="displayName('bourdj el amir abdelkader')" onclick="notify()"	
	d="M255,46 258,52 262,58 268,57 275,60 281,59 280,76 274,86 274,95 274,105 269,111 263,114 256,108 255,103 250,98 245,93 246,86 248,80 244,75 241,74 241,71 241,65 240,60 245,57 246,51 247,45 251,41 255,46"/> 
	
	</g>
<text class="labelm" id="country_namem" x="600" y="35" onclick="notifya('<?php echo $_SERVER['SERVER_NAME'];?>')"      >Algerie</text>		
<text class="label" id="country_name" x="20" y="65"       >Commune de tissemssilet</text>	
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