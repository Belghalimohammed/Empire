<?php
class Dbh{
	private $host="127.0.0.1";
	private $user="root";
	private $pass="";
	private $dbname="empire";

	protected function connect(){
		$dsn = 'mysql:host=' . $this->host . '; dbname=' . $this->dbname;
		$pdo = new PDO($dsn, $this->user, $this->pass);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $pdo;
	}
	public function co(){
		return $this->connect();
	}
}


?>