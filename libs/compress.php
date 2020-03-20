<?php
class Compress
{	
	private function __construct() {
	// compress("D:\\framework/views/index/test.php","D:\\framework/views/index/tiba.zip");
	// uncompress("D:\\framework/views/index/tiba.zip","D:\\framework/views/index/test2.php");
	
	}
	
	function uncompress($srcName, $dstName) {
	$string = implode("", gzfile($srcName));
	$fp = fopen($dstName, "w");
	fwrite($fp, $string, strlen($string));
	fclose($fp);
	} 

	function compress($srcName, $dstName)
	{
	$fp = fopen($srcName, "r");
	$data = fread ($fp, filesize($srcName));
	fclose($fp);

	$zp = gzopen($dstName, "w9");
	gzwrite($zp, $data);
	gzclose($zp);
	}

	
}
