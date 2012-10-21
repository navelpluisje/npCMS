<?php
class database {
	protected $valConnection;
	protected $db;
	var $error = array();

	function __construct($conn) {
		$this->valConnection = $conn;
	}

	function connect() {
		try {
			$this->db = new PDO('mysql:host='.$this->valConnection['host'] . ';port=' . $this->valConnection['port'] . ';dbname=' . $this->valConnection['database'], $this->valConnection['user'], $this->valConnection['pass']);
		} catch(PDOException $e) {
			setError(1000, 'Er is een fout opgetreden bij het maken van een database verbinding');
		}
	} 

	function close() {

	}

	function exec($statement) {
		$this->db->beginTransaction();
		$res = $this->db->query($statement);
		if ($this->db->errorCode() != 0) {
			$this->rollback();
			$error = errorInfo();
			$this->setError($this->db->error[1], $this->db->error[2]);
		} else {
			$this->commit();
		}
		return $res;
	}

	function commit() {
		$this->db->commit();
	}

	function rollback() {
		$this->db->rollBack();
	}

	function setError($num, $error) {
		$this->error['num'] = 1;
		$this->error['message'] = $error;
	}

	function getError() {
		return $this->error;
	}
}
?>