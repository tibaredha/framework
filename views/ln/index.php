<div class="sheader1l"><p id="dashboard">LOIS NORMALES</p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">On considère une variable aléatoire X normale d'espérance <input class="ln"  id="entmu" value="0" onchange="maj();"> et d'écart-type <input class="ln" id="entsigma" value="1" onchange="maj();"></div>
<div class="sheader2r">MSPRH</div>
<div class="listl">
<p  id="ent" > X entre  <input class="ln" id="enta" value="-1.96" onchange="maj();"> et <input class="ln" id="entb" value="1.96" onchange="maj();"> (P = <span id="sorPab">0.95</span>) </p><canvas id="can1" width="400" height="240"></canvas>
<p  id="pinf"   >X < <span id="sorb">1.96</span>  (P = <span id="sorPb">0.975</span>)</p><canvas id="can2" width="400" height="240"></canvas>
<p  id="psup"  >X >  <span id="sora">-1.96</span>  (P = <span id="sorPa">0.975</span>)</p><canvas id="can3" width="400" height="240"></canvas>
</div>		
<div class="scontentl2">LOIS NORMALES</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp;?></div>		