<?php
class Database extends PDO
{
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
		
	}
	
	
	public function createdb($nomdb){
		$sql = "CREATE DATABASE IF NOT EXISTS $nomdb";
		$sth = $this->db->prepare($sql);
		$sth->execute();
		
	}
	
	public function createtbl($nomtbl){
		$sql = "CREATE TABLE IF NOT EXISTS  $nomtbl (
				id INT(6) UNSIGNED    AUTO_INCREMENT PRIMARY KEY, 
				firstname VARCHAR(30) NOT NULL,
				lastname  VARCHAR(30) NOT NULL,
				email     VARCHAR(50),
				reg_date  TIMESTAMP
				)";
		$sth = $this->db->prepare($sql);
		$sth->execute();
		
	}
	
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC){
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value) {$sth->bindValue("$key", $value);}
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	
	public function insert($table, $data){
		ksort($data);
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
		foreach ($data as $key => $value) {$sth->bindValue(":$key", $value);}
		$sth->execute();
	}
	
	public function update($table, $data, $where){
		ksort($data);
		$fieldDetails = NULL;
		foreach($data as $key=> $value) {$fieldDetails .= "`$key`=:$key,";}
		$fieldDetails = rtrim($fieldDetails, ',');
		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		foreach ($data as $key => $value) {$sth->bindValue(":$key", $value);}
		$sth->execute();
	}
	
	public function delete($table, $where, $limit = 1){
		return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
	}
	
	public function deletem($table, $where) {
        return $this->exec("DELETE FROM $table WHERE $where ");
    }
	
	public function CHECK($table) {
        return $this->exec("CHECK TABLE $table ");
    }
	
	public function ANALYZE($table) {
        return $this->exec("ANALYZE TABLE $table ");
    }
	
	public function REPAIR($table) {
        return $this->exec("REPAIR TABLE $table ");
    }
	
	public function OPTIMIZE($table) {
        return $this->exec("OPTIMIZE TABLE $table ");
    }
	
	public function FLUSH($table) {
        return $this->exec("FLUSH TABLE $table ");
    }
		
}