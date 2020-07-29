<?php 
class cache {

	public $dirnam;
	public $duree;
	public $buffer;
	
	
	function __construct($dirnam,$duree) 
	{
		$this->dirnam=$dirnam;	
		$this->duree=$duree;		
	}
	
	
	
	function write ($filename,$content)
	{
	    return file_put_contents($this->dirnam.'/'.$filename,$content);		
	}
	
	function read ($filename){
		
		$fille = $this->dirnam.'/'.$filename;
		if(!file_exists($fille)){	
		return false;	
		}
		$lifetime = (time()- filemtime($fille)) / 60;
		
		if($lifetime > $this->duree)
		{
		return false;		
		}
		
		//echo $lifetime;
		return file_get_contents($fille);
	}	

    function deletefilename ($filename)
	{
		$fille = $this->dirnam.'/'.$filename;
		if (file_exists($fille)){
		unlink($fille);		
		}  
	}

	function clear ()
	{
		$filles = glob($this->dirnam.'/*');
		foreach ($filles as $fille ){
		unlink($fille);			
		}
	}
	
	function inc ($file,$cachename=null)
	{	
		if(!$cachename){
		$cachename=basename($file);		
		}
		if($content=$this->read ($cachename)){
			//echo $content;
			return true;	
		}
		ob_start();
		require $file;
		$content = ob_get_clean();
		$this->write ($cachename,$content);
		//echo $content;
		return true;
	}
	
	function start ($cachename)
	{
		if($content=$this->read ($cachename)){
			echo $content;
			$this->buffer = false;
			return true;	
		}
        ob_start();
		$this->buffer = $cachename;
	}
	
	function fin ()
	{
		if(!$this->buffer)
		{
			return false;	
		}
       
		$content = ob_get_clean();
		echo $content;
		$this->write ($this->buffer,$content);	
	}
}
?>