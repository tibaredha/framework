<?php
class sscolaire extends Controller { 
	
	public $controleur="Sscolaire";
	
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
	    $this->view->title = 'Sscolaire';
		$this->view->msg = 'Sscolaire';
		$this->view->render($this->controleur.'/index');
	}
	
	
	public function createexamen() 
	{
		$data = array();$datac = array();$dataa = array();$datao = array();
		for ($i = 11; $i <= 18; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datac[]=$data['d'.$i];}if($data['d'.$i]=='a') {$dataa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datao[]=$data['d'.$i];}}
		for ($i = 21; $i <= 28; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datac[]=$data['d'.$i];}if($data['d'.$i]=='a') {$dataa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datao[]=$data['d'.$i];}}
		for ($i = 31; $i <= 38; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datac[]=$data['d'.$i];}if($data['d'.$i]=='a') {$dataa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datao[]=$data['d'.$i];}}
		for ($i = 41; $i <= 48; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datac[]=$data['d'.$i];}if($data['d'.$i]=='a') {$dataa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datao[]=$data['d'.$i];}}
		
		$datapc = array();$datapa = array();$datapo = array();
		
		for ($i = 51; $i <= 55; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datapc[]=$data['d'.$i];}if($data['d'.$i]=='a') {$datapa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datapo[]=$data['d'.$i];}}
		for ($i = 61; $i <= 65; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datapc[]=$data['d'.$i];}if($data['d'.$i]=='a') {$datapa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datapo[]=$data['d'.$i];}}
		for ($i = 71; $i <= 75; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datapc[]=$data['d'.$i];}if($data['d'.$i]=='a') {$datapa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datapo[]=$data['d'.$i];}}
		for ($i = 81; $i <= 85; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datapc[]=$data['d'.$i];}if($data['d'.$i]=='a') {$datapa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datapo[]=$data['d'.$i];}}
		
		
		
		if (isset($_POST['HYGIENE'])){$data['HYGIENE']='1';}else{$data['HYGIENE']='';}
		if (isset($_POST['GINGIVITE'])){$data['GINGIVITE']='1';}else{$data['GINGIVITE']='';}
		if (isset($_POST['AODF'])){$data['AODF']='1';}else{$data['AODF']='';}
		
		$data['DATESBD']          = $_POST['DATESBD'];
		
		$data['C']                = count($datac);
		$data['A']                = count($dataa);
		$data['O']                = count($datao);
		$data['CAO']              = count($datac)+count($dataa)+count($datao);
		
		$data['PC']                = count($datapc);
		$data['PA']                = count($datapa);
		$data['PO']                = count($datapo);
		$data['PCAO']              = count($datapc)+count($datapa)+count($datapo);
		
		
		$data['IDELEVE']          = $_POST['IDELEVE'];
		$data['NIVEAUS']          = $_POST['NIVEAUS'];
		$data['ETABLIS']          = $_POST['ETABLIS'];
		$data['UDS']              = $_POST['UDS'];
		
		if (isset($_POST['OKRDV'])){$data['OKRDV']='1';}else{$data['OKRDV']='';}
	    if (isset($_POST['DATECSBD'])){$data['DATECSBD']=$_POST['DATECSBD'];}else{$data['DATECSBD']='00-00-0000';}
		
		

		// echo '<pre>';print_r ($data);echo '<pre>';  
		
		$last_id=$this->model->createexamen($data);
		header('location: '.URL.$this->controleur.'');
		
		
		// echo '<br>';
		// echo '<pre>';print_r ($datac);echo '<pre>'; 
		// echo '<br>';$c=count($datac);
		// echo 'c='.$c; 
		
		// echo '<br>';
		// echo '<pre>';print_r ($dataa);echo '<pre>'; 
		// echo '<br>';$a=count($dataa);
		// echo 'a='.$a; 
		
		// echo '<br>';
		// echo '<pre>';print_r ($datao);echo '<pre>'; 
		// echo '<br>';$o=count($datao);
		// echo 'o='.$o; 
		
		// echo '<br>';
		// echo 'cao='.$cao=$c+$a+$o; 
		
		
		// 
		// $data['PRENOM']        = $_POST['PRENOM'];
		// $data['FILSDE']        = $_POST['FILSDE'];
		// $data['ETDE']          = $_POST['ETDE'];
		// $data['SEXE']          = $_POST['SEXE'];
		// $data['DATENS']        = $_POST['DATENS'];
		// $data['WILAYAN']       = $_POST['WILAYAN'];
		// $data['COMMUNEN']      = $_POST['COMMUNEN'];
		// $data['WILAYAR']       = $_POST['WILAYAR'];
		// $data['COMMUNER']      = $_POST['COMMUNER'];
		// $data['ADRESSE']       = $_POST['ADRESSE'];
		// $data['WILAYAD']       = $_POST['WILAYAD'];
		// $data['COMMUNED']      = $_POST['COMMUNED'];
		// $data['STRUCTURED']    = $_POST['STRUCTURED'];
		// $data['DINS']          = $_POST['DINS'];
		// $data['HINS']          = $_POST['HINS'];
		// $data['DATEHOSPI']     = $_POST['DATEHOSPI'];
		// $data['HEURESHOSPI']   = $_POST['HEURESHOSPI'];
		// $data['SERVICEHOSPIT'] = $_POST['SERVICEHOSPIT'];
		// $data['MEDECINHOSPIT'] = $_POST['MEDECINHOSPIT'];
		// $data['LD']            = $_POST['LD'];
		// $data['AUTRES']        = $_POST['AUTRES'];
		// if (isset($_POST['OMLI'])){$data['OMLI']='1';}else{$data['OMLI']='';}
		// if (isset($_POST['MIEC'])){$data['MIEC']='1';}else{$data['MIEC']='';}
		// if (isset($_POST['EPFP'])){$data['EPFP']='1';}else{$data['EPFP']='';}
		// $data['CIM1']          = $_POST['CIM1'];
		// $data['CIM2']          = $_POST['CIM2'];
		// $data['CIM3']          = $_POST['CIM3'];
		// $data['CIM4']          = $_POST['CIM4'];
		// $data['CIM5']          = $_POST['CIM5'];
		// $data['CD']            = $_POST['CD'];
		// $data['CODECIM0']      = $_POST['CODECIM0'];
		// $data['CODECIM']       = $_POST['CODECIM'];
		// $data['NDLM']          = $_POST['NDLM'];
        // $data['NDLMAAP']       = $_POST['NDLMAAP'];
		// if (isset($_POST['GM'])){$data['GM']='1';}else{$data['GM']='';}
		// if (isset($_POST['MN'])){$data['MN']='1';}else{$data['MN']='';}
		// $data['AGEGEST']       = $_POST['AGEGEST'];
		// $data['POIDNSC']       = $_POST['POIDNSC'];
		// $data['AGEMERE']       = $_POST['AGEMERE'];
		// if (isset($_POST['DPNAT'])){$data['DPNAT']='1'; }else{$data['DPNAT']='';}
		// $data['EMDPNAT']       = $_POST['EMDPNAT'];
		// if (isset($_POST['DECEMAT'])){$data['DECEMAT']='1'; }else{$data['DECEMAT']='';}
		// $data['GRS']           = $_POST['GRS'];
		// if (isset($_POST['POSTOPP'])){$data['POSTOPP']='1';}else{$data['POSTOPP']='';}
		// $data['WILAYA']        = $_POST['WILAYA'];
		// $data['STRUCTURE']     = $_POST['STRUCTURE'];
		// $data['login']         = $_POST['login'];
		// $data['NOMAR']         = $_POST['NOMAR'];
		// $data['PRENOMAR']      = $_POST['PRENOMAR'];
		// $data['FILSDEAR']      = $_POST['FILSDEAR'];
		// $data['ETDEAR']        = $_POST['ETDEAR'];
		// $data['ETDEAR']        = $_POST['ETDEAR'];
		// $data['NOMPRENOMAR']   = $_POST['NOMPRENOMAR'];
		// $data['PROAR']         = $_POST['PROAR'];
		// $data['ADAR']          = $_POST['ADAR'];
		// $data['Profession']    = $_POST['Profession'];
		
		// $last_id=$this->model->createdeces($data);
		// header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$last_id);
	}
	
	//*********************************************************//
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// function logout()
	// {
		// Session::destroy();
		// header('location: '.URL.'');
		// exit;
	// }

	function notification() {
	    $this->view->title = 'notification';
		$this->view->msg = 'notification';
		$this->view->render($this->controleur.'/notification');
	}
	
	
	
	function sigcom() {
	    $this->view->title = 'sigcom';
		$this->view->msg = 'sigcom';
		$this->view->render($this->controleur.'/sigcom');
	}
	
	function SQL() 
	{
	    $url1 = explode('/',$_GET['url']);	
	    $this->view->title = 'SQL';
		$this->view->msg = 'SQL';
		$this->view->d1 = $url1[2]; 
		$this->view->d2 = $url1[3]; 
		$this->view->render($this->controleur.'/SQL');
		
	}
	
	function imp() {
	    $this->view->title = 'imp';
		$this->view->msg = 'imp';
		$this->view->render($this->controleur.'/php');
	}
	
	function createmedecin($id) 
	{
	    $this->view->title = 'dashboard';
		$this->view->msg = 'dashboard';
		$this->view->userListview = $this->model->listemedecin($id) ;
		$this->view->render($this->controleur.'/createmedecin');
	}
	
	public function medecinSave()
	{
		$data = array();
		$data['Nom']        = $_POST['Nom'];
		$data['Prenom']     = $_POST['Prenom'];
		$data['wilaya']     = $_POST['wilaya'];
	    $data['structure']  = $_POST['structure'];
	   // echo '<pre>';print_r ($data);echo '<pre>';
	   $this->model->medecinSave($data);
		header('location: ' . URL .$this->controleur. '/createmedecin/'.$data['structure']);
	}
	
	public function deletemedecin($id)
	{
	$url1 = explode('/',$_GET['url']);
	$this->model->deletemedecin($id);    
	header('location: ' . URL .$this->controleur. '/createmedecin/'.$url1[3]);
	}	
	
	function flv6($flv) 
	{
	$this->view->title = $flv;
	$this->view->msg = 'dashboard';
	$this->view->flv=$flv;
	$this->view->render($this->controleur.'/flv6');    
	}
	
	function graphe($id) 
	{
	    $this->view->title = 'dashboard';
		$this->view->msg = 'dashboard';
		if($id!=0) {
		$this->view->render($this->controleur.'/index'.$id);
		} else {
		$this->view->render($this->controleur.'/index');
		}	
	}

	
	//**********************************************************************************************************************************//
	function nouveau() {
	    $this->view->title = 'nouveau';
		$this->view->msg = 'nouveau';
		$this->view->render($this->controleur.'/nouveau');
	}
	
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search';
	    $this->view->msg = 'Search';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];   //parametre 2 page                      limit 2,3
		$this->view->userListviewl =10     ;      //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =10       ;   //parametre nombre de chiffre dan la barre  navigation
		if (isset ($_GET['ad'])){$ad=$_GET['ad']; }else {$ad="asc";}
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl,$ad);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq,$ad); // compte total pour bare de navigation
		$this->view->nbrvalide = $this->model->listeAprouve();
		$this->view->render($this->controleur.'/index');
	}
	
	
	
	public function view($id) 
	{
        $this->view->title = 'view deces';
		$this->view->msg = 'view deces';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/view');
	}
	
	function edit($id) {
	    $this->view->title = 'edit deces';
		$this->view->msg = 'Edit deces';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/edit');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['NOM']           = $_POST['NOM'];
		$data['PRENOM']        = $_POST['PRENOM'];
		$data['FILSDE']        = $_POST['FILSDE'];
		$data['ETDE']          = $_POST['ETDE'];
		$data['SEXE']          = $_POST['SEXE'];
		$data['DATENS']        = $_POST['DATENS'];
		$data['WILAYAN']       = $_POST['WILAYAN'];
		$data['COMMUNEN']      = $_POST['COMMUNEN'];
		$data['WILAYAR']       = $_POST['WILAYAR'];
		$data['COMMUNER']      = $_POST['COMMUNER'];
		$data['ADRESSE']       = $_POST['ADRESSE'];
		$data['WILAYAD']       = $_POST['WILAYAD'];
		$data['COMMUNED']      = $_POST['COMMUNED'];
		$data['STRUCTURED']    = $_POST['STRUCTURED'];
		$data['DINS']          = $_POST['DINS'];
		$data['HINS']          = $_POST['HINS'];
		$data['DATEHOSPI']     = $_POST['DATEHOSPI'];
		$data['HEURESHOSPI']   = $_POST['HEURESHOSPI'];
		$data['SERVICEHOSPIT'] = $_POST['SERVICEHOSPIT'];
		$data['MEDECINHOSPIT'] = $_POST['MEDECINHOSPIT'];
		$data['LD']            = $_POST['LD'];
		$data['AUTRES']        = $_POST['AUTRES'];
		if (isset($_POST['OMLI'])){$data['OMLI']='1';}else{$data['OMLI']='';}
		if (isset($_POST['MIEC'])){$data['MIEC']='1';}else{$data['MIEC']='';}
		if (isset($_POST['EPFP'])){$data['EPFP']='1';}else{$data['EPFP']='';}
		$data['CIM1']          = $_POST['CIM1'];
		$data['CIM2']          = $_POST['CIM2'];
		$data['CIM3']          = $_POST['CIM3'];
		$data['CIM4']          = $_POST['CIM4'];
		$data['CIM5']          = $_POST['CIM5'];
		$data['CD']            = $_POST['CD'];
		$data['CODECIM0']      = $_POST['CODECIM0'];
		$data['CODECIM']       = $_POST['CODECIM'];
		$data['NDLM']          = $_POST['NDLM'];
        $data['NDLMAAP']       = $_POST['NDLMAAP'];
		if (isset($_POST['GM'])){$data['GM']='1'; }else{$data['GM']='';}
		if (isset($_POST['MN'])){$data['MN']='1';}else{$data['MN']='';}
		$data['AGEGEST']       = $_POST['AGEGEST'];
		$data['POIDNSC']       = $_POST['POIDNSC'];
		$data['AGEMERE']       = $_POST['AGEMERE'];
		if (isset($_POST['DPNAT'])){$data['DPNAT']='1'; }else{$data['DPNAT']='';}
		$data['EMDPNAT']       = $_POST['EMDPNAT'];
		if (isset($_POST['DECEMAT'])){$data['DECEMAT']='1'; }else{$data['DECEMAT']='';}
		$data['GRS']           = $_POST['GRS'];
		if (isset($_POST['POSTOPP'])){$data['POSTOPP']='1';}else{$data['POSTOPP']='';}
		$data['WILAYA']        = $_POST['WILAYA'];
		$data['STRUCTURE']     = $_POST['STRUCTURE'];
		$data['login']         = $_POST['login'];
		$data['NOMAR']         = $_POST['NOMAR'];
		$data['PRENOMAR']      = $_POST['PRENOMAR'];
		$data['FILSDEAR']      = $_POST['FILSDEAR'];
		$data['ETDEAR']        = $_POST['ETDEAR'];
		$data['ETDEAR']        = $_POST['ETDEAR'];
		$data['NOMPRENOMAR']   = $_POST['NOMPRENOMAR'];
		$data['PROAR']         = $_POST['PROAR'];
		$data['ADAR']          = $_POST['ADAR'];
		$data['Profession']    = $_POST['Profession'];
		$data['id']            = $id;
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$last_id);
	}
	
	public function delete($id)
	{
	$this->model->deletedeces($id);    
	header('location: ' . URL .$this->controleur. '/search/0/10?o=NOM&q=');
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
	function mlegale($id) {
	    $this->view->title = 'mlegale';
		$this->view->msg = 'mlegale';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/mlegale');
	}
	
	function mlegale1($id) {
	    $this->view->title = 'mlegale';
		$this->view->msg = 'mlegale';
		//sous reseaux ne marche pas
		rename("D:/framework/public/images/temp.jpg", "D:/framework/public/images/mlegale/".$id.".jpg");
        unlink('D:/framework/public/images/temp.jpg');
		$data = array();
		$data['idd']        = $id;
		$data['poids']      = $_POST['poids'];
		$data['taille']     = $_POST['taille'];
	    //echo '<pre>';print_r ($data);echo '<pre>';
	    $this->model->mlegale($data);
		header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$id);
	}
	
	//**********************************************************************************************************************************//

	function DSP() {
	    $this->view->title = 'Evaluation';
		$this->view->msg = 'Evaluation';
		$this->view->render($this->controleur.'/DSP');
	}
	
	
	function Evaluation() {
	    $this->view->title = 'Evaluation';
		$this->view->msg = 'Evaluation';
		$this->view->render($this->controleur.'/Evaluation');
	}
	
	function SIGA() 
	{	
	    $this->view->title = 'Systeme Information Geographique';
		$this->view->msg = 'Systeme Information Geographique';
		$this->view->render($this->controleur.'/sigdz');
	}
	
	function SIG($id) 
	{	
	    $this->view->title = 'Systeme Information Geographique';
		$this->view->msg = 'Systeme Information Geographique';
		switch ($id) 
		{ 
			case 17: 
				$this->view->render($this->controleur.'/sig17');
			break;
			
            // case 14: 
				// $this->view->render($this->controleur.'/sig14');
			break;
			
			case 38: 
				$this->view->render($this->controleur.'/sig38');
			break;
			
			default:
				$this->view->render($this->controleur.'/sig0');
		}	
	}
	
	function XLS() 
	{
	    $url1 = explode('/',$_GET['url']);	
	    $this->view->title = 'XLS';
		$this->view->msg = 'XLS';
		$this->view->d1 = $url1[2]; 
		$this->view->d2 = $url1[3]; 
		$this->view->render($this->controleur.'/XLS');
	}
	
	function decesmaternel($id) 
	{
	    $this->view->title = 'decesmaternel';
		$this->view->msg = 'decesmaternel';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/decesmaternel');
	}	
	function decesperinatal($id) 
	{
	    $this->view->title = 'decesperinatal';
		$this->view->msg = 'decesperinatal';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/decesperinatal');
	}	
		
}