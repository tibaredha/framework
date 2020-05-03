<div class="sheader1l"><p id="dashboard">Écrire et tracer des fonctions</p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">Les deux champs ci-après vous permettent de comparer deux fonctions de votre choix</div>
<div class="sheader2r">MSPRH</div>
<div class="listl">
<style>#graphe{border:1px solid;background-color:#FFFFFF}</style>

<script>
// fonction pour dessiner voir default.js ci-jouint
//document.write(math.derivative('x^2 + x', 'x'));
// var x=5;
// document.write(eval("1/x"));
</script>
<section class="centre">
	<br>
	<p>
		<canvas id="graphe" width="400" height="300">
		Canvas n'est pas compatible avec votre navigateur - Your browser does not support HTML5 canvas
		</canvas>
	</p>
	
	<form action="javascript:void(0)">
		<p>
		<input class="ln"     type="text"    name="f"      value=""        onchange="tracer();">
		<input class="ln"     type="text"    name="f1"     value=""        onchange="tracer();">
		<input class="ln"     type="text"    name="f2"     value=""        onchange="tracer();" >
		<input class="ln"     type="submit"  name="Envoi"  value="Tracer"  onclick="tracer()">
		<div id="heures"></div>
		</p>​
	
            <select class="ln" id="fun_selector" onchange="tracer();" >
			  <option value="">f(x)</option>
			  <option value="x+(1*b)">f(x)=x+b - Droite</option>
			  <option value="(a*x)+1*b">f(x)=a*x+b  - Affine</option>
			  <option value="(a*(x*x))+(1*b*x)+1*c">f(x)=a*(x*x)+(b*x)+1*c - Quadratique</option>
			  <option value="a*Math.abs(b*x)+1*c">f(x)=a|bx|+c - Valeur absolue</option>
			  <option value="(a*pow(x+1*b,2))+1*c">f(x)=a*pow(x+b,2) - Puissance 2 </option>
			  <option value="a*sqrt(x)">f(x)=sqrt(x) - Racine carrée</option>
			  <option value="Math.cbrt(x)">f(x)= -Racine cubic</option>
			  <option value="1/x">f(x)= - Rationnelle</option>
			  <option value="a*pow(2,b*x)">f(x)=a*pow(2,b*x) - Expo</option>
			  <option value="a*exp(b*x)">f(x)=a*exp(b*x) - Expo (e)</option>
			  <option value="a*1*exp(-x*x/(1*b))">f(x)=a*exp(-x*x/b) - Expo (n)</option>
			  <option value="a/(1+exp(-x+1*b))">f(x)=a/(1+exp(-x+b)) - Expo (s)</option>
			  <option value="a*log(b*x)">f(x)=a*log(b*x) - Log</option>
			  <option value="a*log2(b*x)">f(x)=a*ln(b*x) - Ln</option>
			  <option value="a*log10(b*x)">f(x)=a*log10 - Log10</option>
			  <option value="a*sin(b*x)">f(x)=a*sin(b*x) - Sinus</option>
			  <option value="a*cos(b*x)">f(x)=a*cos(b*x) - Cosinus</option>
			  <option value="a*tan(b*x)">f(x)=a*tan(b*x) - Tangente</option>
			</select>
			
			<label id="lrangea" for="rangea">a : <span id="drangea"></span></label><input type="range" id="rangea" min="-10" max="10" step=".01" value="1" onchange="tracer();">
			<label id="lrangeb" for="rangeb">b : <span id="drangeb"></span></label><input type="range" id="rangeb" min="-10" max="10" step=".01" value="1" onchange="tracer();">
			<label id="lrangec" for="rangec">c : <span id="drangec"></span></label><input type="range" id="rangec" min="-5" max="5" step="1"   value="1" onchange="tracer();">
			<script>
			var rangea = document.getElementById("rangea");
			var drangea = document.getElementById("drangea");
			drangea.innerHTML = rangea.value;
			rangea.oninput = function() {drangea.innerHTML = this.value;}
			
			var rangeb = document.getElementById("rangeb");
			var drangeb = document.getElementById("drangeb");
			drangeb.innerHTML = rangea.value;
			rangeb.oninput = function() {drangeb.innerHTML = this.value;}
			
			var rangec = document.getElementById("rangec");
			var drangec = document.getElementById("drangec");
			drangec.innerHTML = rangea.value;
			rangec.oninput = function() {drangec.innerHTML = this.value;}
			</script>
			
			</form>
</section>

</div>		
<div class="scontentl2">  </div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp;?></div>		