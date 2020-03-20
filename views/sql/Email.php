<div class="sheader1l"><p id="lacceuil"><?php echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">Email</div><div class="sheader2r">MSPRH</div>
<div class="contentl">
<?php 
$mail = new PHPMailer;
$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'tibaredhaamranemimi@gmail.com'; // SMTP username
$mail->Password = '030570170176';                  // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to
$mail->setFrom('tibaredha@yahoo.fr', HTML::nbrtostring('structure','id',Session::get('structure'),'structure'));
// $mail->addReplyTo('tibaredha@yahoo.fr', 'DSP DJELFA');
$mail->addAddress('tibaredha@yahoo.fr');                // Add a recipient
// $mail->addCC('tibaredhaamranemimi@gmail.com');
///$mail->addBCC('bcc@example.com');
$mail->isHTML(true);  // Set email format to HTML
$mail->Subject = 'Email from '.HTML::nbrtostring('structure','id',Session::get('structure'),'structure');
$bodyContent = '<h1>'.HTML::nbrtostring('structure','id',Session::get('structure'),'structure').'</h1>';
// $bodyContent .= '<br/>';
// $bodyContent .= '<p>Dr R.TIBA DSP Wilaya de Djelfa</p>';

// Ajouter une pièce jointe
// $url=URL.'views/doc/deces/inhumation.pdf';
// $mail->addStringAttachment(file_get_contents($url), 'inhumation.pdf');
$url=URL.'sql/deceshosp.sql';
$mail->addStringAttachment(file_get_contents($url), 'deceshosp.sql');

// $mail->AddAttachment(URL.'public/images/gs.jpg');
$mail->Body    = $bodyContent;
if(!$mail->send()) {
    echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent from : '.HTML::nbrtostring('structure','id',Session::get('structure'),'structure');
}
?>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/email.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	

	
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		