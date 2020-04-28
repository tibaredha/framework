<div class="sheader1l"><p id="dashboard">Écrire et tracer des fonctions</p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">Les deux champs ci-après vous permettent de comparer deux fonctions de votre choix</div>
<div class="sheader2r">MSPRH</div>
<div class="listl">
<style>#graphe{border:1px solid;background-color:#FFFFFF}</style>
<script>
// fonction pour dessiner voir default.js ci-jouint
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
		<input class="ln"     type="text"    name="formule"  value="sqrt(x)"        onchange="tracer();">
		<input class="ln"     type="text"    name="formule1" value="7*exp(-x*x/10)" onchange="tracer();">
		<input class="ln"     type="text"    name="formule2" value="x"              onchange="tracer();" >
		<input class="ln"     type="submit"  name="Envoi"  value="Tracer" onclick="tracer()">
		</p>
	</form>

</section>

</div>		
<div class="scontentl2"> 2*sin(x), 1/x, (x-5)*(x-4), 2*pow(x-4,3), sqrt(x),7*exp(-x*x/10),pow(2,x),log(x),Math.abs(-2*x),4.75/(1+exp(-x+5))</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp;?></div>		