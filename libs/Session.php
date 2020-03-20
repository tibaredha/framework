<?php

class Session
{
	const dateexpiration ='2030-01-01';
	const path = 'D:\framework\libs\sessions';
	// const SESSION_STARTED = TRUE;
    // const SESSION_NOT_STARTED = FALSE;
	// private $sessionState = self::SESSION_NOT_STARTED;// The state of the session
	// private static $instance;// THE only instance of the class
	private function __construct() {}
	
    // public static function getInstance()
    // {
        // if ( !isset(self::$instance))
        // {
            // self::$instance = new self;
        // }
        
        // self::$instance->startSession();
        
        // return self::$instance;
    // } 
      // public function startSession()
    // {
        // if ( $this->sessionState == self::SESSION_NOT_STARTED )
        // {
            // $this->sessionState = session_start();
        // }
        
        // return $this->sessionState;
    // } 
	 // public function __set( $name , $value )
    // {
        // $_SESSION[$name] = $value;
    // }
	 // public function __get( $name )
    // {
        // if ( isset($_SESSION[$name]))
        // {
            // return $_SESSION[$name];
        // }
    // }
	 // public function __isset( $name )
    // {
        // return isset($_SESSION[$name]);
    // }
    
    
    // public function __unset( $name )
    // {
        // unset( $_SESSION[$name] );
    // }
	
	 // public function destroyy()
    // {
        // if ( $this->sessionState == self::SESSION_STARTED )
        // {
            // $this->sessionState = !session_destroy();
            // unset( $_SESSION );
            
            // return !$this->sessionState;
        // }
        
        // return FALSE;
    // }
	
	//**********************************************************************************************************//
	public static function init()
	{
		if (date('Y-m-d') <= self::dateexpiration )
		{ 
		// session_save_path(self::path);       //default session.save_path = "c:/wamp/tmp"  +  path = constante definie dans le fichier lib/config 
		// session_name('Sessiontiba');         //default session.name = PHPSESSID  session_id()= nom du fichier stocker dans D:\framework\libs\sessions; 
		// session_set_cookie_params(0);        // kill session when browser closed
		@session_start();
		// setcookie('tibaredha','030570', time() + 365*24*3600, self::path, null, false, true);
		}
	}
	
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	
	public static function get($key)
	{
		if (isset($_SESSION[$key]))
		return $_SESSION[$key];
	}
	
	public static function destroy()
	{
		//unset($_SESSION);
		session_destroy();
		session_set_cookie_params(0);// kill session when browser closed
	}
	
}

// $data = Session::getInstance();
// $data->nickname = 'Someone';
// $data->age = 18;
// printf( '<p>My name is %s and I\'m %d years old.</p>' , $data->nickname , $data->age );
// printf( '<pre>%s</pre>' , print_r( $_SESSION , TRUE ));
// var_dump( isset( $data->nickname ));
// $data->destroy();
// var_dump( isset( $data->nickname ));