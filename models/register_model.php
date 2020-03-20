<?php

class Register_Model extends Model
{
	public $tbl_users="users";          //$this->tbl_users
	public $tbl_messagerie="messagerie";//$this->tbl_messagerie
	public $tbl_activation="activation";//$this->tbl_activation
	
	public function __construct()
	{
		parent::__construct();
	}
    
	//envoyer une message interne dont work 
	public function msgint($id_expediteur,$id_destinataire,$titre,$message,$structure) 
	{
				$this->db->insert('messagerie', array(
					'id_expediteur' => $id_expediteur,
					'id_destinataire' => $id_destinataire,
					'titre' => $titre,
					'timestamp' => date('Y-m-d'),
					'message' => $message,
					'STRUCTURED' =>$structure	
				));
	 
	}
    //enregistrement	
	public function runRegister($data) 
	{
	    $msgr = $this->check_empty($_POST, array('login','password','Email'));
        if($msgr != null) 
		{
		Session::init();
		Session::set('errorregister', $msgr);
		header('location: ' . URL . 'register');
	    }
		else 
		{
			$sth = $this->db->prepare("SELECT * FROM users WHERE login = :login ");
			$sth->execute(array( ':login' => $data['login']	));
			$data1 = $sth->fetch();	
			$count = $sth->rowCount();
			if ($count > 0) 
			{	
				Session::init();
				Session::set('errorregister', 'Username already exists.');
				header('location: ' . URL . 'register');
			} 
			else 
			{
				$token=$this->str_random($length=20);
				$this->db->insert('users', array('wilaya' => $data['wilaya'],'structure' => $data['structure'],'role' => 3,'Email' => $data['Email'],'login' => $data['login'],'password' => md5($data['password']),'lang' => 'fr','token' => $token));
				$user_id = $this->db->lastInsertId();
				$this->msgint($user_id,$user_id,'Bienvenue et Profil','Bienvenue dans votre espace membre',$data['structure']); //envoyer une message interne
				$sth1 = $this->db->prepare("SELECT * FROM activation WHERE activation = :activation ");
				$sth1->execute(array( ':activation' => 1	));
				$methode = $sth1 -> fetch(PDO::FETCH_ASSOC);
				switch($methode['id']) 
				{
					case 1 : // aucune
						$sth2 = $this->db->prepare("SELECT * FROM users WHERE WHERE id = :id ");
						$sth2->execute(array( ':id' => $user_id	));
						$data2 = $sth2->fetch();
						$postData2 = array('token'=> null,'confirmed_at'=> date('Y-m-d'),'activation'=> 1);
						$this->db->update("users", $postData2, "id =".$user_id );
						Session::init();
						Session::set('errorlogin', 'Votre inscription est termin&eacute;e << '.$data['login'].' >> vous pouvez maintenant vous connecter.');
					    header('location: ' . URL . 'login');
					break;	
					case 2 : // mail
						$Subject='Confirmation de votre compte';
						$Content='Afin de valider votre compte merci de cliquer sur ce lien';
						$Content1='Visiter notre site pour activer votre compte';
						$Content2='Votre inscription est termin&eacute;e << '.$data['login'].' >> un email de confirmation viens de vous &ecirc;tre envoy&eacute;.';
						$this->emailusers($data['Email'],$Subject,$Content,'confirmation',$user_id,$token,$Content1,$Content2);	
					break;		
					case 3 : //manuel
						Session::init();
						Session::set('errorlogin', 'Votre inscription est termin&eacute;e << '.$data['login'].' >> un administarteur ou un mod&eacute;rateur doit la valider.');	
					    header('location: ' . URL . '');
					break;	
				}			
			} 
		}    
    }

    public function userSingleList($id) {
        
		$user_id = $id[2];
		$token   = $id[3];
		$sth = $this->db->prepare("SELECT * FROM users WHERE id = :id ");		
		$sth->execute(array(':id' => $user_id));
		$data = $sth->fetch();
		if( $data['token'] == $token )
		{
		$postData = array(
			'token'          => null,
			'confirmed_at'   => date('Y-m-d'),
			'activation'     => 1
		   );
		$this->db->update("users", $postData, "id =" . $id[2] . "");
		Session::init();
		Session::set('errorlogin', 'Votre inscription est valider << '.$data['login'].' >> vous pouvez maintenant vous connecter.');
		header('location: ' . URL . 'login');
		}
		else
		{
		Session::init();
		Session::set('errorlogin', "Votre inscription n'est pas valider.");
		header('location: ' . URL . 'register');
		}
    }


    public function userSingleList1($data) 
	{  
       
		$Email = $data['Email'];
		$token=$this->str_random($length=20);
		$sth = $this->db->prepare("SELECT * FROM users WHERE Email = :Email ");		
		$sth->execute(array(':Email' => $Email));
		$datax = $sth->fetch();
		if( $datax['Email'] == $Email AND  $datax['token']=='')
		{
			$postData = array('reset_token'=> $token,'reset_at'=> date('Y-m-d'));
			$this->db->update("users", $postData, "id =" .$datax['id'] . "");
			$sthx = $this->db->prepare("SELECT * FROM activation WHERE activation = :activation ");
			$sthx->execute(array( ':activation' => 1));
			$methodex = $sthx -> fetch(PDO::FETCH_ASSOC);
				switch($methodex['id']) 
				{
					case 1 : //aucune
					Session::init();
					Session::set('errorlogin', 'Creer un nouveau mot de passe .');	
					header('location: ' . URL . 'register/reset/'.$datax['id'].'/'.$token);	
					break;

					case 2 : //email
					$Subject='Reinitiatilisation de votre mot de passe';
					$Content='Afin de r&eacute;initialiser votre mot de passe merci de cliquer sur ce lien';
					$Content1='Visiter notre site pour r&eacute;initialiser votre mot de passe';
					$Content2='Les instructions du rappel de mot de passe << '.$datax['login'].' >> vous ont été envoyées par emails.';
					$this->emailusers($Email,$Subject,$Content,'reset',$datax['id'],$token,$Content1,$Content2);
					break;

					case 3 : //manuel
					Session::init();
					Session::set('errorlogin', 'Creer un nouveau mot de passe .');	
					header('location: ' . URL . 'register/reset/'.$datax['id'].'/'.$token);	
					break;
				}
		}
		else
		{
			Session::init();
			Session::set('errorlogin', 'Aucun compte ne correspond a cette adresse.');
			header('location: ' . URL . 'register/forget');
		}
    }

    public function userSingleList2($url) {
       
	    // $this->affichage($url); 
		$user_id = $url['id'];
		$token   = $url['token'];
		$password  = $url['password'];
		$sth = $this->db->prepare("SELECT * FROM users WHERE id = :id AND reset_token = :token ");		
		$sth->execute(array(':id' => $user_id,':token' => $token));
		$data = $sth->fetch();
		if( $data['reset_token'] == $token )
		{
		$postData = array(
			'reset_token'  => '',
			'reset_at'     => date('Y-m-d'),
			'password'     => md5($password) 
		   );
		$this->db->update('users', $postData, "id =" . $user_id . "");
		Session::init();
		Session::set('errorlogin', 'Votre mot de passe a été réinitialisé.');
		header('location: ' . URL . 'login');
		}
		else
		{
		Session::init();
		Session::set('errorlogin', 'Votre mot de passe na pas été réinitialisé .');
		header('location: ' . URL . 'register');
		}
    }


    public function emailusers($Email,$Subject,$Content,$methode,$iduser,$token,$Content1,$Content2)
    {
		//nesessite extession openssl active dans php
		$mail = new PHPMailer;
		$mail->isSMTP();                                       
		$mail->setFrom('tibaredhaamranemimi@gmail.com', 'DSP DJELFA');
		$mail->addReplyTo($Email, 'DSP DJELFA2');
		$mail->addAddress($Email); 
		$mail->isHTML(true);                                    
		$mail->Subject = $Subject.' : Email from Dr R.TIBA ';
		$bodyContent  = '<h1> Dr R.TIBA </h1>';
		$bodyContent .= '<hr>';
		$bodyContent .= '<br/>';
		$bodyContent .= $Content; 
		$bodyContent .= '<br/>';
		$bodyContent .= '<p><a href="'.URL.'register/'.$methode.'/'.$iduser.'/'.$token.'">'.$Content1.'</a>  </p>';
		$bodyContent .= '<p>DSP wilaya de djelfa</p>';
		$bodyContent .= '<p>Ce message a &eacute;t&eacute; envoy&eacute; par Dr R.TIBA</p>';
		$bodyContent .= '<p>Pour contribuer &agrave la protection de votre compte, veuillez a ne pas transf&eacute;rer cet e-mail</p>';
		$mail->Body    = $bodyContent;
		Session::init();
		if(!$mail->send()) 
		{
			Session::set('errorlogin', 'le Message na pu etre envoyé .'.$mail->ErrorInfo);
		} 
		else 
		{
			Session::set('errorlogin', $Content2);
		}
		header('location: ' . URL );
    }
	
}