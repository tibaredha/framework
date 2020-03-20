<?php

class Login_Model extends Model
{
    
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
	    
		$sth = $this->db->prepare("SELECT * FROM users WHERE login = :login AND password = :password  and token = '' ");		
		$sth->execute(array(
			':login'    => stripslashes($_POST['login']),
			':password' => md5(stripslashes($_POST['password']))
		));
		
		Session::init();
		Session::set('demgraphie',$_POST['demgraphie']);
		$data = $sth->fetch();
		$count =  $sth->rowCount();
		if ($count > 0 and  $data['activation']==1) 
		{
			//creation des variables sessions 
			// Session::init();
			Session::set('wilaya',$data['wilaya']);
			Session::set('structure',$data['structure']);
			Session::set('login',$data['login']);
			Session::set('role', $data['role']);
			Session::set('id', $data['id']);
			Session::set('lang',$data['lang']);
			Session::set('loggedIn', true);
			Session::set('time',time());//revoir le fichier index php car utiliser ligne 122 
			
			//remember me en cour d'exploration 
			$this->remember(isset($_POST['remember']),$data['id']);
			
			// token de connection 
             $this->tokenconnection ($data['id']);
			
			//redirection en fonction du programme et du role 
			$this->redirection($_POST['demgraphie'],$data['role']);
		} 
		else 
		{
			// Session::init();
		    Session::set('errorlogin', "Nom d'utilisateur ou mot de passe incorrect fourni.");
			header('location: '.URL.'login');
		}
		
	}
	
	
	public function deletetoken($id){
	
			$time=time();
			$time_check=$time-300;//=5mn
			$sth = $this->db->prepare("DELETE FROM secure  WHERE id_membre = $id AND date < $time_check ");		
			$sth->execute();
	}
	
	public function redirection($programme,$role){
			if($programme == 1) {
			switch($role) {
				case "1" : header('location: '.URL.'administrateur');break;
				case "2" : header('location: '.URL.'dashboard');break;
				case "3" : header('location: '.URL.'dashboard');break;	
			}
			} 
			if($_POST['demgraphie']== 2) {header('location: '.URL.'naissance');}
			if($_POST['demgraphie']== 3) {header('location: '.URL.'BNM');}
	}
	
	public function remember($remember,$id){
	
	if (isset($remember)){
			$tokenr=$this->str_random($length=20);
			$sthr = $this->db->prepare("SELECT * FROM users WHERE id = :id ");		
			$sthr->execute(array(':id' => $id));
			$datar = $sthr->fetch();
			$postDatar = array('remember_token' => $tokenr );
			$this->db->update("users", $postDatar, "id =" . $id . "");
			// setcookie('rememberme', 'France', time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...
			}
	
	}
	
	public function tokenconnection ($dataid){
	
			$token=$this->str_random($length=20);
			$id = $dataid;
			$ip = Ip::get_ip();
			$date = time();
			$sth1 = $this->db->prepare("SELECT * FROM secure WHERE id_membre=:id_membre AND ip_connexion=:ip_connexion");		
			$sth1->execute(array(
				':id_membre'    => $id,
				':ip_connexion' => $ip
			));
			$data1  = $sth1->fetch();
			$count1 = $sth1->rowCount();
			if ($count1 === 1) 
			{
			 $postData = array('date'=> $date);
             $this->db->update('secure', $postData, "id_membre =" . $id . "");
			}    
			else 
			{
				$this->db->insert('secure', array(
					'id_membre'    => $id,
					'jeton'        => $token,
					'ip_connexion' => $ip,
					'date'         => $date
				));
			}
	
	}
	
	
	
	
	
	
}