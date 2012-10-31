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
			$this->setError($error[1], $error[2]);
			$res = -1;
		} else {
			$this->commit();
		}
		return $res;
	}

	function delete($statement) {
		$this->db->beginTransaction();
		$affected = $this->db->exec($statement);
		if ($this->db->errorCode() != 0) {
			$this->rollback();
			$error = $this->db->errorInfo();
			$this->setError($this->db->error[1], $this->db->error[2]);
			$res = -1;
		} else {
			$this->commit();
			$res = $affected;
		}
		return $res;
	}

	function insert($table, $values) {
		$this->db->beginTransaction();
		$columns = '';
		$i       = 0;
		$vals    = '';
		$max     = count($values) - 1;

		foreach ($values as $key => $value) {
			if ($i != 0 && $i != $max) {
				$columns .= $key . ', ';
				$vals    .= $this->quote($value) . ', ';
			} else if ($i === $max) {
				$columns .= $key;
				$vals    .= $this->quote($value);
			}
			$i++;
		}

		$query = 'INSERT INTO ' . $table . ' (' . $columns . ') VALUES (' . $vals . ')';
		$affected = $this->db->exec($query);
		
		if ($this->db->errorCode() != 0) {
			$this->rollback();
			$error = $this->db->errorInfo();
			$this->setError($error[1], $error[2]);
			$res = -1;
		} else {
			$this->commit();
			$res = $affected;
		}
		return $res;
	}

	function update($table, $values, $where) {
		$this->db->beginTransaction();
		$set  = '';
		$i    = 0;
		$vals = '';
		$max  = count($values) - 1;

		foreach ($values as $key => $value) {
			if ($i != 0 && $i != $max) {
				$set .= $key . '=' . $this->quote($value) . ',';
			} else if ($i === $max) {
				$set .= $key . '=' . $this->quote($value);
			}
			$i++;
		}

		$query = 'UPDATE ' . $table . ' SET ' . $set . ' WHERE ' . $where ;
		$affected = $this->db->exec($query);
		if ($this->db->errorCode() != 0) {
			$this->rollback();
			$error = $this->db->errorInfo();
			$this->setError($error[1], $error[2]);
			$res = -1;
		} else {
			$this->commit();
			$res = $affected;
		}
		return $res;
	}

	function commit() {
		$this->db->commit();
	}

	function rollback() {
		$this->db->rollBack();
	}

	function quote($val) {
		if ( ! is_numeric($val)) {
			$val = "'" . $val . "'";
		}
		return $val;
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