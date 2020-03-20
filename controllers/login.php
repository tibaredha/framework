<?php
class Login extends Controller {

	function __construct() {
        parent::__construct();
			
	}
	
	function index() {
	    $this->view->title = 'login';
		$this->view->msg = 'login';
		$this->view->render('login/index');
	}
	
	function run()
	{
	$this->view->title = 'login';
	$this->view->msg = 'login';
	// $this->model->createdb("amranemimi");
	// $this->model->createtbl("amranemimix");
	$this->model->run();
	}
	
	
	function logout($id)
	{
	    $this->model->deletetoken($id);
	    Session::init();
		//setcookie('rememberme', null, -1, null, null, false, true); // On écrit un autre cookie...
		Session::destroy();
		header('location: '.URL.'');
		exit;
	}
	
	//remember me scripte
	
	
	// function reconnect_from_cookie(){
    // if(session_status() == PHP_SESSION_NONE){
        // session_start();
    // }
    // if(isset($_COOKIE['remember']) && !isset($_SESSION['auth']) ){
        // require_once 'db.php';
        // if(!isset($pdo)){
            // global $pdo;
        // }
        // $remember_token = $_COOKIE['remember'];
        // $parts = explode('==', $remember_token);
        // $user_id = $parts[0];
        // $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        // $req->execute([$user_id]);
        // $user = $req->fetch();
        // if($user){
            // $expected = $user_id . '==' . $user->remember_token . sha1($user_id . 'ratonlaveurs');
            // if($expected == $remember_token){
                // session_start();
                // $_SESSION['auth'] = $user;
                // setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);
            // } else{
                // setcookie('remember', null, -1);
            // }
        // }else{
            // setcookie('remember', null, -1);
        // }
    // }
// }
	
	
	
	
	
}