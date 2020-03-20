<div class="sheader1l">
<?php
Session::init();
if (isset($_SESSION['errorlogin'])) {
$sError = '<p id="errorlogin">' . $_SESSION['errorlogin'] . '</p>';		
echo $sError;			
}
else
{
$sError='<p id="llogin">Gérer les femmes gestantes </p>';
echo $sError;
}
?>
</div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Prendre une photos<?php //echo EDRSFR;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">
<table>
		<tr>
		<td width=300 height="700"  style="background-color:yellow;" valign=top>		
	    <script type="text/javascript" src="<?php echo URL; ?>public/webcam/webcam.js"></script>
		<!-- First, include the JPEGCam JavaScript Library -->
		<script language="JavaScript">
		webcam.set_api_url( "<?php echo URL; ?>public/webcam/naissance/test.php?uc=<?php echo $this->user[0]['id'];?>" );
		webcam.set_quality( 90 );                                                       // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true,'<?php echo URL; ?>public/webcam/naissance/shutter.mp3' ); // play shutter click sound
	    webcam.set_swf_url( '<?php echo URL; ?>public/webcam/naissance/webcam.swf' );
		</script>
		
		<!-- Next, write the movie to the page at 320x240 -->
		<script language="JavaScript">
			document.write( webcam.get_html(320,240) );   //320x240 and 640x480
		</script>
		<!-- Some buttons for controlling things -->
	   <br/>
	   <br/>
	   <form>
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input id="cfg"     type=button value="Configure..."   onClick="webcam.configure()">&nbsp;&nbsp;
		<input id="snap"   type=button value="Take Snapshot" onClick="take_snapshot()">
	   </form>
			<!-- Code to handle the server response (see test.php) -->
	   <script language="JavaScript">
		webcam.set_hook( 'onComplete', 'my_completion_handler' );   //2 option my_completion_handler  my_callback_function
		
		function take_snapshot() {
			//take snapshot and upload to server
			document.getElementById('upload_results').innerHTML = '<h2>Uploading...</h2>';
			webcam.snap();// webcam.snap(); 
			/*
			    This instructs the Flash movie to take a snapshot and upload the JPEG to the server.
				Make sure you set the URL to your API script using webcam.set_api_url(), 
				and have a callback function ready to receive the results from the server, using webcam.set_hook().	
			*/	
		}
		
		
		// fonction  a la fin du trt 
		function my_callback_function(response) {
                alert("Success! PHP returned: " + response);
        }
		function my_completion_handler(msg) {
			// extract URL out of PHP output
			if (msg.match(/(http\:\/\/\S+)/)) {
				var image_url = RegExp.$1;
				// show JPEG image in page
				document.getElementById('upload_results').innerHTML = 
					'<img src="' + image_url + '">'+
					'<h6 id="msg1" >Photos prise avec succés </h6>'+
					'<h6 id="msg1" >JPG URL : </h6>'+
				    '<h6 id="msg1" >' + image_url + '</h6>';
				// reset camera for another shot
				webcam.reset();
			}
			else alert("PHP Error: " + msg);
		}
	</script>	
    </td>
	<td width=50  style="background-color:red;">&nbsp;</td>
	<td width=450 valign=top><div id="upload_results" style="background-color:green;"></div></td>
	</tr>
	</table>




	
</div>
<?php
$dphotos='naissance';//dossier photos
$fichier1 = "d:/framework/public/webcam/".$dphotos."/".$this->user[0]['id'].'.jpg' ;
if (file_exists($fichier1))
{
$fichier = "/".$this->user[0]['id'] ;}
else 
{
$fichier = "/f" ;	
}
?>	
<div class="content"><img id="image" src="<?php echo URL;?>public/webcam/naissance/<?php echo $fichier.".jpg?t=".time();?>" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php //echo EDRSUS;?> <?php //echo "Date d'expiration : ".Session::dateexpiration; ?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		

