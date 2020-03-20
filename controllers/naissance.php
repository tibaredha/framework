<?php
class naissance extends Controller { 
	
	public $controleur="naissance";
	
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
	
	function index() {
	    $this->view->title = 'dashboard';
		$this->view->msg = 'dashboard';
		$this->view->render($this->controleur.'/index');
	}
	
	//CRUD NAISSANCE
	//1CREATE
	function nouveau() {
	    $this->view->title = 'nouveau';
		$this->view->msg = 'nouveau';
		$this->view->render($this->controleur.'/nouveau');
	}
	public function create() 
	{
		$data = array();
		$data['WILAYA1']       = $_POST['WILAYA1'];     //1
		$data['COMMUNE1']      = $_POST['COMMUNE1'];    //2
		$data['STRUCTURED']    = $_POST['STRUCTURED'];  //3
		$data['DINS1']         = $_POST['DINS1'];       //4
		$data['HINS1']         = $_POST['HINS1'];       //5
		$data['LOGIN']         = $_POST['LOGIN'];       //6
		$data['NOM2']          = $_POST['NOM2'];        //7
		$data['PRENOM2']       = $_POST['PRENOM2'];     //8
		$data['DATENS2']       = $_POST['DATENS2'];     //9
		$data['WILAYA2']       = $_POST['WILAYA2'];     //10
		$data['COMMUNE2']      = $_POST['COMMUNE2'];    //11
		$data['PROFESSION2']   = $_POST['PROFESSION2']; //12
		$data['GROUPAGE']      = $_POST['GROUPAGE'];    //13
		$data['RH']            = $_POST['RH'];          //14
		$data['TELMERE']       = $_POST['TELMERE'];     //15
		$data['NSSMERE']       = $_POST['NSSMERE'];     //16
		$data['NOM3']          = $_POST['NOM3'];        //17
		$data['PRENOM3']       = $_POST['PRENOM3'];     //18
		$data['DATENS3']       = $_POST['DATENS3'];     //19
		$data['WILAYA3']       = $_POST['WILAYA3'];     //20
		$data['COMMUNE3']      = $_POST['COMMUNE3'];    //21
		$data['PROFESSION3']   = $_POST['PROFESSION3']; //22
		$data['GROUPAGEP']     = $_POST['GROUPAGEP'];   //23
		$data['RHP']           = $_POST['RHP'];         //24
		$data['TELPERE']       = $_POST['TELPERE'];     //25
		$data['NSSPERE']       = $_POST['NSSPERE'];     //26
		$data['WILAYA4']       = $_POST['WILAYA4'];     //27
		$data['COMMUNE4']      = $_POST['COMMUNE4'];    //28
		$data['ADRESSE4']      = $_POST['ADRESSE4'];    //29
		$data['NUMLF']         = $_POST['NUMLF'];       //30
		$data['DNUMLF']        = $_POST['DNUMLF'];      //31
		$data['WILAYALF']      = $_POST['WILAYALF'];    //32
		$data['COMMUNELF']     = $_POST['COMMUNELF'];   //33
		$data['GESTE']         = $_POST['GESTE'];       //34
		$data['PARITE']        = $_POST['PARITE'];      //35
		$data['ABRT']          = $_POST['ABRT'];        //36
		$data['CESA']          = $_POST['CESA'];        //37
		$data['EVBP']          = $_POST['EVBP'];        //38
		$data['NOMARM']        = $_POST['NOMARM'];      //39
		$data['PRENOMARM']     = $_POST['PRENOMARM'];   //40
		$data['NOMARP']        = $_POST['NOMARP'];      //41
		$data['PRENOMARP']     = $_POST['PRENOMARP'];   //42
		$data['ADARPM']        = $_POST['ADARPM'];      //43
	    if (isset($_POST['DT12'])){$data['DT12']='1';}else{$data['DT12']='';}//44
		if (isset($_POST['HTA'])){$data['HTA']='1';}else{$data['HTA']='';}   //45
		if (isset($_POST['CRD'])){$data['CRD']='1';}else{$data['CRD']='';}   //46
		if (isset($_POST['EPL'])){$data['EPL']='1';}else{$data['EPL']='';}   //47
		if (isset($_POST['AUT'])){$data['AUT']='1';}else{$data['AUT']='';}   //48
	   // echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createnaissance($data);
		header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$last_id);
	}
	
	//2READ
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search';
	    $this->view->msg = 'Search';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];   //parametre 2 page                     limit 2,3
		$this->view->userListviewl =12     ;      //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =12       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->nbrvalide = $this->model->listeAprouve();
		$this->view->render($this->controleur.'/index');
	}
	public function Aprouve() 
	{
        $url1 = explode('/',$_GET['url']);	
		$data = array();
		$data['id']         = $url1[2];
		$data['aprouve']    = $url1[3];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->Aprouve($data);
		header('location: ' . URL .$this->controleur.'/search/'.$url1[4].'/'.$url1[5].'?o=id&q=');
	}
	function view($id) {
	    $this->view->title = 'view naissance';
		$this->view->msg = 'view naissance';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/view');
	}
	function photos($id) {
	    $this->view->title = 'photos';
		$this->view->msg = 'photos';$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/photos');
	}
	
	//3UPDATE
	function edit($id) {
	    $this->view->title = 'edit naissance';
		$this->view->msg = 'Edit naissance';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/edit');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['WILAYA1']       = $_POST['WILAYA1'];     //1
		$data['COMMUNE1']      = $_POST['COMMUNE1'];    //2
		$data['STRUCTURED']    = $_POST['STRUCTURED'];  //3
		$data['DINS1']         = $_POST['DINS1'];       //4
		$data['HINS1']         = $_POST['HINS1'];       //5
		$data['LOGIN']         = $_POST['LOGIN'];       //6
		$data['NOM2']          = $_POST['NOM2'];        //7
		$data['PRENOM2']       = $_POST['PRENOM2'];     //8
		$data['DATENS2']       = $_POST['DATENS2'];     //9
		$data['WILAYA2']       = $_POST['WILAYA2'];     //10
		$data['COMMUNE2']      = $_POST['COMMUNE2'];    //11
		$data['PROFESSION2']   = $_POST['PROFESSION2']; //12
		$data['GROUPAGE']      = $_POST['GROUPAGE'];    //13
		$data['RH']            = $_POST['RH'];          //14
		$data['TELMERE']       = $_POST['TELMERE'];     //15
		$data['NSSMERE']       = $_POST['NSSMERE'];     //16
		$data['NOM3']          = $_POST['NOM3'];        //17
		$data['PRENOM3']       = $_POST['PRENOM3'];     //18
		$data['DATENS3']       = $_POST['DATENS3'];     //19
		$data['WILAYA3']       = $_POST['WILAYA3'];     //20
		$data['COMMUNE3']      = $_POST['COMMUNE3'];    //21
		$data['PROFESSION3']   = $_POST['PROFESSION3']; //22
		$data['GROUPAGEP']     = $_POST['GROUPAGEP'];   //23
		$data['RHP']           = $_POST['RHP'];         //24
		$data['TELPERE']       = $_POST['TELPERE'];     //25
		$data['NSSPERE']       = $_POST['NSSPERE'];     //26
		$data['WILAYA4']       = $_POST['WILAYA4'];     //27
		$data['COMMUNE4']      = $_POST['COMMUNE4'];    //28
		$data['ADRESSE4']      = $_POST['ADRESSE4'];    //29
		$data['NUMLF']         = $_POST['NUMLF'];       //30
		$data['DNUMLF']        = $_POST['DNUMLF'];      //31
		$data['WILAYALF']      = $_POST['WILAYALF'];    //32
		$data['COMMUNELF']     = $_POST['COMMUNELF'];   //33
		$data['GESTE']         = $_POST['GESTE'];       //34
		$data['PARITE']        = $_POST['PARITE'];      //35
		$data['ABRT']          = $_POST['ABRT'];        //36
		$data['CESA']          = $_POST['CESA'];        //37
		$data['EVBP']          = $_POST['EVBP'];        //38
		$data['NOMARM']        = $_POST['NOMARM'];      //39
		$data['PRENOMARM']     = $_POST['PRENOMARM'];   //40
		$data['NOMARP']        = $_POST['NOMARP'];      //41
		$data['PRENOMARP']     = $_POST['PRENOMARP'];   //42
		$data['ADARPM']        = $_POST['ADARPM'];      //43
		if (isset($_POST['DT12'])){$data['DT12']='1';}else{$data['DT12']='';}//44
		if (isset($_POST['HTA'])){$data['HTA']='1';}else{$data['HTA']='';}   //45
		if (isset($_POST['CRD'])){$data['CRD']='1';}else{$data['CRD']='';}   //46
		if (isset($_POST['EPL'])){$data['EPL']='1';}else{$data['EPL']='';}   //47
		if (isset($_POST['AUT'])){$data['AUT']='1';}else{$data['AUT']='';}   //48
		$data['id']            = $id;                                        //49                  
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$last_id);
	}
	
	//4DELETE
	public function delete($id)
	{
	$this->model->deletenaissance($id);    
	header('location: ' . URL .$this->controleur. '/search/0/10?o=NOM3&q=');
	}
	//*************************************************************************************************************//
	//CRUD TRAVAIL
	//1CREATE
	function createtrav($id) {
	    $data = array();
		$data['DHE1']    = $_POST['DHE1'];     
		$data['DHE2']    = $_POST['DHE2'];     
		$data['RCF']      = $_POST['RCF'];     
		$data['LA']       = $_POST['LA'];     
		$data['DC']       = $_POST['DC'];     
		$data['DIC']      = $_POST['DIC'];     
		$data['DEP']      = $_POST['DEP'];     
		$data['NDC']      = $_POST['NDC'];     
		$data['POOLS']    = $_POST['POOLS'];     
		$data['TAS']      = $_POST['TAS'];     
		$data['TAD']      = $_POST['TAD'];     
		$data['TEMP']     = $_POST['TEMP'];     
		$data['PRTU']     = $_POST['PRTU']; 
		$data['ACU']      = $_POST['ACU']; 
		$data['VU']       = $_POST['VU']; 
		$data['OXY']      = $_POST['OXY']; 
		$data['NOXY']     = $_POST['NOXY']; 
		$data['DCU']     = $_POST['DCU']; 
		$data['IDF']      = $id; 
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createtrav($data);
		// header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$id);
		header('location: '.URL.$this->controleur.'/Trav/'.$id);
	}
	//2READ
	function Trav($id) {
	    $this->view->title = 'Trav';
		$this->view->msg = 'Trav';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->userListview = $this->model->listeTrav($id) ;
		$this->view->userlastview = $this->model->lastTrav($id) ;
		$this->view->trav = $this->model->trav($id) ;
		$this->view->render($this->controleur.'/Trav');
	}
	//3UPDATE
	//4DELETE
	public function deletetrav($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deletetrav($id);    
	header('location: ' . URL .$this->controleur. '/Trav/'.$url1[3]);
	}
	//*************************************************************************************************************//
	
	
	
	//CRUD NEE
	//1CREATE
	//2READ
	function Nnee($id) {
	    $this->view->title = 'Nnee';
		$this->view->msg = 'Nnee';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->userListview = $this->model->listennee($id) ;
		$this->view->render($this->controleur.'/Nnee');
	}
	//3UPDATE
	function editSaveNnee($id) {
		$data['SA']            = $_POST['SA'];
		$data['WILAYA1']       = $_POST['WILAYA1'];
		$data['COMMUNE1']      = $_POST['COMMUNE1'];
		$data['DINS1']         = $_POST['DINS1'];
		$data['HINS1']         = $_POST['HINS1'];
		$data['SEXE5']         = $_POST['SEXE5'];
		$data['PRENOM5']       = $_POST['PRENOM5'];
		$data['SAGEFEMME5']    = $_POST['SAGEFEMME5'];
		$data['MAC']           = $_POST['MAC'];
		$data['VMN']           = $_POST['VMN'];
		$data['POIDS']         = $_POST['POIDS'];
		$data['APGAR']         = $_POST['APGAR'];
		$data['GROUPAGENN']    = $_POST['GROUPAGENN'];
		$data['RHNN']          = $_POST['RHNN'];
		$data['PRENOMARE']     = $_POST['PRENOMARE'];
		$data['id']            = $id;
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSaveNnee($data);
		header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$last_id);
	}
	//4DELETE
	public function deletennex()
	{
	$url1 = explode('/',$_GET['url']);	
	echo '<pre>';print_r ($url1);echo '<pre>';  
	$this->model->deletenne($url1[2]); 
	header('location: ' . URL .$this->controleur. '/Nnee/'.$url1[3]);
	}
	
	//5AUTRES
	function map() 
	{	
	    $this->view->title = 'map';
		$this->view->render($this->controleur.'/map');
	}
	
	function createsagefemme($id) 
	{
	    $this->view->title = 'dashboard';
		$this->view->msg = 'dashboard';
		$this->view->userListview = $this->model->listesagefemme($id) ;
		$this->view->render($this->controleur.'/createsagefemme');
	}
	
	public function sagefemmeSave()
	{
		$data = array();
		$data['Nom']        = $_POST['Nom'];
		$data['Prenom']     = $_POST['Prenom'];
		$data['wilaya']     = $_POST['wilaya'];
	    $data['structure']  = $_POST['structure'];
	   // echo '<pre>';print_r ($data);echo '<pre>';
	   $this->model->sagefemmeSave($data);
		header('location: ' . URL .$this->controleur. '/createsagefemme/'.$data['structure']);
	}
	
	function Glasgow($id) {
	    $this->view->title = 'Glasgow';
		$this->view->msg = 'Glasgow';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/Glasgow');
	}
	
	function apgar($id) {
	    $this->view->title = 'apgar';
		$this->view->msg = 'apgar';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/apgar');
	}
	
	function apgaredite($id) 
	{
		$data = array();
		$data['res']       = $_POST['res'];
		$data['id']        = $id;
		// echo '<pre>';print_r ($data);echo '<pre>';  
	    $last_id=$this->model->apgaredite($data);
		header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$last_id);
	}
	
	function silverman($id) {
	    $this->view->title = 'silverman';
		$this->view->msg = 'silverman';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/silverman');
	}
	
	function bishop($id) {
	    $this->view->title = 'bishop';
		$this->view->msg = 'bishop';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/bishop');
	}
	
	function Evaluation() {
	    $this->view->title = 'Evaluation';
		$this->view->msg = 'Evaluation';
		$this->view->render($this->controleur.'/Evaluation');
	}
	
	function graphe($id) 
	{
	    $this->view->title = 'naissance';
		$this->view->msg = 'naissance';
		if($id!=0) {
		$this->view->render($this->controleur.'/index'.$id);
		} else {
		$this->view->render($this->controleur.'/index');
		}	
	}
	
	function deces($id) {
	    $this->view->title = 'deces';
		$this->view->msg = 'deces';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/deces');
	}
	
	function phar($id) {
	    $this->view->title = 'phar';
		$this->view->msg = 'phar';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/phar');
	}
	public function createmedfn($id) 
	{
		$data = array();
		$data['DATE']      = $_POST['DATE'];
		$data['MED1']      = $_POST['MED1'];
		$data['codemed']   = $_POST['MED1'];
		$data['QUT1']      = $_POST['QUT1'];
	    $data['idp']       = $id;
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createmedfn($data);
		header('location: '.URL.$this->controleur.'/phar/'.$id);
	}
	
	
	function Entrer($id) {
	    $this->view->title = 'Entrer';
		$this->view->msg = 'Entrer';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/Entrer');
	}
	
	function editSaveEntrer($id) {
		$data['HOSPI']         = $_POST['HOSPI'];
		$data['HHOSP']         = $_POST['HHOSP'];
		$data['SERVI']         = $_POST['SERVI'];
		$data['NLIT']          = $_POST['NLIT'];
		$data['MATRI']         = $_POST['MATRI'];
		$data['NDOSS']         = $_POST['NDOSS'];
		$data['MODEE']         = $_POST['MODEE'];
		$data['MOTIF']         = $_POST['MOTIF'];
		$data['DGCNS']         = $_POST['DGCNS'];
		$data['NOM2']          = $_POST['NOM2'];
		$data['PRENOM2']       = $_POST['PRENOM2'];
		$data['SAGEFEMME5']    = $_POST['SAGEFEMME5'];
		$data['id']            = $id;
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSaveEntrer($data);
		header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$last_id);
	}
	
	
	
	function Sortir($id) {
	    $this->view->title = 'Sortir';
		$this->view->msg = 'Sortir';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/Sortir');
	}
	
	function editSaveSortir($id) {
		$data['SORT']          = $_POST['SORT'];
		$data['HSORT']         = $_POST['HSORT'];
		$data['MSORT']         = $_POST['MSORT'];
		$data['id']            = $id;
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSaveSortir($data);
		header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$last_id);
	}
	
	function obser($id) {
	    $this->view->title = 'obser';
		$this->view->msg = 'obser';$this->view->user = $this->model->userSingleList($id);
		$this->view->userListview = $this->model->listeobser($id) ;
		$this->view->userlastview = $this->model->lastobser($id) ;
		$this->view->obser = $this->model->obser($id) ;
		$this->view->render($this->controleur.'/obser');
	}
	function createobser($id) {
	    $data = array();
		$data['DHE1']    = $_POST['DHE1'];     
		// $data['DHE2']    = $_POST['DHE2'];     
		// $data['RCF']      = $_POST['RCF'];     
		// $data['LA']       = $_POST['LA'];     
		// $data['DC']       = $_POST['DC'];     
		// $data['DIC']      = $_POST['DIC'];     
		$data['BIP']      = $_POST['BIP'];     
		$data['HB']       = $_POST['HB'];     
		$data['POOLS']    = $_POST['POOLS'];     
		$data['TAS']      = $_POST['TAS'];     
		$data['TAD']      = $_POST['TAD'];     
		$data['TEMP']     = $_POST['TEMP'];     
		// $data['PRTU']     = $_POST['PRTU']; 
		// $data['ACU']      = $_POST['ACU']; 
		// $data['VU']       = $_POST['VU']; 
		// $data['OXY']      = $_POST['OXY']; 
		// $data['NOXY']     = $_POST['NOXY']; 
		// $data['DCU']     = $_POST['DCU']; 
		$data['IDF']      = $id; 
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createobser($data);
		header('location: '.URL.$this->controleur.'/obser/'.$id);
	}
	
	public function deleteobser($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deleteobser($id);    
	header('location: ' . URL .$this->controleur. '/obser/'.$url1[3]);
	}
	
}