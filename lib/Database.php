<?php

class Database{

	private $host = DB_HOST;	
	private $db_name = DB_NAME;
	private $user = DB_USER;
	private $psw = DB_PSW;
	private $db_port = DB_PORT;

	private $dbh;
	private $error;
	private $stmt;

	public function __construct() {

		//set up DSN	
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;

		//options
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->psw, $options);
		} catch (PDOexception $e) {
			$this->errror = $e->getMessage();
		}
		if ($this->error) {
			echo $this->error;
			die;
		}
	}

	

	public function query($query) {

		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type=null) {

		if(is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;

				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute() {

		return $this->stmt->execute();
	}

	public function resultSet() {
		$this->execute();

		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function single() {
		$this->execute();

		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}
	
}
