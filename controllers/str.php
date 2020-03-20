<?php
class str extends Controller { 
	
	public $controleur="str";
	public $db_host=DB_HOST;
	public $db_name=DB_NAME;   
	public $db_user=DB_USER;
	public $db_pass=DB_PASS;
	
	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('location: '.URL.'login');
			exit;
		}
		$this->view->js = array($this->controleur.'/js/default.js?t='.time());
		$this->view->css = array($this->controleur.'/css/default.css?t='.time());
	}
	
	function mysqlconnect()
	{
	$cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $db;
	}
	
	function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
		if (is_numeric($colonevalue) and $colonevalue!=='0') 
		{ 
		$this->mysqlconnect();
		$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
		$row=mysql_fetch_object($result);
		$resultat=$row->$resultatstring;
		return $resultat;
		}
        else
        {
		return $resultat2='??????';
		}		
	}
	
	function str() {
	    $this->view->title = 'str';
		$this->view->msg = 'structure';
		$this->view->render($this->controleur.'/str');
	}
	
	function searchstr()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchstr';
	    $this->view->msg = 'liste des structures sanitaires';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl =8     ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchstr($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchstr1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/str');
	}
	
	
	function nouveaustr() {
	    $this->view->title = 'nouveaucim';
		$this->view->msg = 'Nouvelle structure sanitaires';
		$this->view->render($this->controleur.'/nouveaustr');
	}
	
	public function create() 
	{
		$data = array();
		$data['WILAYA2']            = $_POST['WILAYA2'];
		$data['COMMUNE2']           = $_POST['COMMUNE2'];
		$data['structure']          = $_POST['structure'];
		$data['structurear']        = $_POST['structurear'];
		$data['daira']              = $this->nbrtostring('com',"IDCOM",$_POST['COMMUNE2'],"communear");
		$data['com']                = $this->nbrtostring('com',"IDCOM",$_POST['COMMUNE2'],"COMMUNE");
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createstr($data);
		header('location: '.URL.$this->controleur.'/searchstr/0/10?o=id&q='.$last_id);
	}
	
	function editstr($id) {
	    $this->view->title = 'editcategorie';
		$this->view->msg = 'Modifier une structure sanitaire';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/editstr');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['structure']          = $_POST['structure'];
		$data['structurear']        = $_POST['structurear'];
	    $data['lat']                = $_POST['lat'];
		$data['lg']                 = $_POST['lg'];
		$data['id']                 = $id;
	    // echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/searchstr/0/10?o=id&q='.$last_id);
	}
	
	
	
		
}