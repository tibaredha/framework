<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2r">MSPRH</div>
<div class="contentsig">
<?php
if (Session::get('demgraphie') == 1)//deces
{
// $root = explode('/', dirname($_SERVER['PHP_SELF']));
// $tbl  = 'naissance';
// $col0 = 'WILAYA4';
// $val0 = '17000';
// $col1 = 'COMMUNE4';
// $strc = 'STRUCTURED';
// $strv = Session::get("structure");
// $logo = 'naissance.png';
// $data = array(
// "root"=> $root[1],
// "t1"  => "Repartition Des naissances",
// "t2"  => "Commune de residence",
// "t3"  => "Commune de djelfa");
// for ($x = 916; $x <= 968; $x+=1) {$data[$x] = HTML::color(HTML::valsig1($tbl,$col0,$val0,$col1,"$x",$strc,$strv));}  
}
if (Session::get('demgraphie') == 2)//naissance
{
$root = explode('/', dirname($_SERVER['PHP_SELF']));
$tbl  = 'naissance';
$col0 = 'WILAYA4';
$val0 = '17000';
$col1 = 'COMMUNE4';
$strc = 'STRUCTURED';
$strv = Session::get("structure");
$logo = 'naissance.png';
$data = array(
"root"=> $root[1],
"t1"  => "Repartition Des naissances",
"t2"  => "Commune de residence",
"t3"  => "Commune de djelfa");
// for ($x = 916; $x <= 968; $x+=1) {$data[$x] = HTML::color(HTML::valsig1($tbl,$col0,$val0,$col1,"$x",$strc,$strv));}  
}
if (Session::get('demgraphie') == 3)//demographie
{
// $root = explode('/', dirname($_SERVER['PHP_SELF']));
// $tbl  = 'naissance';
// $col0 = 'WILAYA4';
// $val0 = '17000';
// $col1 = 'COMMUNE4';
// $strc = 'STRUCTURED';
// $strv = Session::get("structure");
// $logo = 'naissance.png';
// $data = array(
// "root"=> $root[1],
// "t1"  => "Repartition Des naissances",
// "t2"  => "Commune de residence",
// "t3"  => "Commune de djelfa");
// for ($x = 916; $x <= 968; $x+=1) {$data[$x] = HTML::color(HTML::valsig1($tbl,$col0,$val0,$col1,"$x",$strc,$strv));}  
}
require 'djelfa.php';
?>
</div>	
<div class="contenth"><img id="image" src="<?php echo URL;?>public/images/sigh.jpg" ></div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/sig.png" ></div>
<div class="contentb"><img id="image" src="<?php echo URL;?>public/images/sigh.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo $logo;?>"></div>	
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		