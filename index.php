<?php
require './libs/config.php';
// $cfg = './libs/cfgg.php';
$cfg = './libs/cfg.php';
if(!file_exists($cfg)) {header('location: ./install/');}else {require $cfg;} 
//function __autoload($class) {require LIBS . $class .".php";}

//2 alternatives if php 7
// function my_autoloader($class) {require LIBS . $class .".php";}spl_autoload_register('my_autoloader');
spl_autoload_register(function ($class) {require LIBS . $class .".php";});



$app = new Bootstrap();


 // echo "<pre>";
      // print_r(get_loaded_extensions());
      // print_r(get_extension_funcs("date"));
	  // echo "<pre/>";



// Toutes les informations reproduites dans cette rubrique (dépêches, photos, logos) sont protégées 
//par des droits de propriété intellectuelle détenus par dr tiba. 
//Par conséquent, aucune de ces informations ne peut être reproduite, modifiée, transmise, rediffusée, traduite, vendue, exploitée commercialement ou utilisée de quelque manière que ce soit sans l'accord préalable écrit de dr tiba. 
//dr tiba ne pourra être tenue pour responsable des délais, erreurs, omissions, qui ne peuvent être exclus ni des conséquences des actions ou transactions effectuées sur la base de ces informations.

//sent email 
// $mail = new PHPMailer;
// $mail->isSMTP();                                   // Set mailer to use SMTP
// $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                            // Enable SMTP authentication
// $mail->Username = 'tibaredhaamranemimi@gmail.com'; // SMTP username
// $mail->Password = '030570170176';                  // SMTP password
// $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 587;                                 // TCP port to connect to
// $mail->setFrom('tibaredha@yahoo.fr', 'DSP DJELFA');
// $mail->addReplyTo('tibaredha@yahoo.fr', 'DSP DJELFA');
// $mail->addAddress('tibaredha@yahoo.fr');                // Add a recipient
//$mail->addCC('tibaredhaamranemimi@gmail.com');
///$mail->addBCC('bcc@example.com');
// $mail->isHTML(true);  // Set email format to HTML
// $mail->Subject = 'Email from Dr R.TIBA ';
// $bodyContent = '<h1> Dr R.TIBA </h1>';
// $bodyContent .= '<br/>Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://local.dev/Lab/Comptes/confirm.php?id=$user_id&token=$token';
// $bodyContent .= '<p>dsp wilaya de djelfa</p>';
// $url=URL.'fpdf/doc/x.pdf';
// Ajouter une pièce jointe
// $mail->AddAttachment(URL.'public/images/gs.jpg');
// $mail->addStringAttachment(file_get_contents($url), 'inhumationhh.pdf');
// $mail->Body    = $bodyContent;
// if(!$mail->send()) {
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
    // echo 'Message has been sent';
// }
//INSERT IGNORE INTO deceshosp SELECT *  FROM deceshospm  pose probleme

