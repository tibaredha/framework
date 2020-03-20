<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2r">MSPRH</div>
<div class="contentsig">
<?php 
if (Session::get('demgraphie') == 1)//deces
{
// $root = explode('/', dirname($_SERVER['PHP_SELF']));
// $tbl  = 'deceshosp';
// $col  = 'WILAYAR';
// $strc = 'STRUCTURED';
// $strv = Session::get("structure");
// $logo = 'index.jpg';
// $data = array(
// "root"=> $root[1],
// "t1"  => "Repartition Des décés",
// "t2"  => "Wilaya de résidences",
// "t3"  => "Wilaya D'algerie");
// for ($x = 1000; $x <= 48000; $x+=1000) {$data[$x] = HTML::color(HTML::valsig($tbl,$col,"$x",$strc,$strv));} 
}	
if (Session::get('demgraphie') == 2)//naissance
{
$root = explode('/', dirname($_SERVER['PHP_SELF']));
$tbl  = 'naissance';
$col  = 'WILAYA4';
$strc = 'STRUCTURED';
$strv = Session::get("structure");
$logo = 'naissance.png';
$data = array(
"root"=> $root[1],
"t1"  => "Repartition Des naissances",
"t2"  => "Wilaya de résidences",
"t3"  => "Wilaya D'algerie");
//for ($x = 1000; $x <= 48000; $x+=1000) {$data[$x] = HTML::color(HTML::valsig($tbl,$col,"$x",$strc,$strv));} 
}

if (Session::get('demgraphie') == 3)//demographie
{
// $root = explode('/', dirname($_SERVER['PHP_SELF']));
// $tbl  = 'deceshosp';
// $col  = 'WILAYAR';
// $strc = 'STRUCTURED';
// $strv = Session::get("structure");
// $logo = 'demographie.jpg';
// $data = array(
// "root"=> $root[1],
// "t1"  => "Repartition Des décés",
// "t2"  => "Wilaya de résidences",
// "t3"  => "Wilaya D'algerie");
// for ($x = 1000; $x <= 48000; $x+=1000) {$data[$x] = HTML::color(HTML::valsig($tbl,$col,"$x",$strc,$strv));} 
}
require 'algerie.php';
?>
</div>
<div class="contenth"><img id="image" src="<?php echo URL;?>public/images/sigh.jpg" ></div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/sig.png" ></div>
<div class="contentb"><img id="image" src="<?php echo URL;?>public/images/sigh.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo $logo;?>"></div>	
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>