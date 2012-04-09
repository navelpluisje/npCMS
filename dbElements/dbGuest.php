<?php

class DbGuest
{
	var $id;
	var $name;
	var $email;
	var $banned;
	var $ip;
	var $date_created;
	var $date_modified;

	function init($id, $name, $email, $banned, $ip, $dateCreated, $dateModified) {
		$this->id            = $id;
		$this->name          = $name;
		$this->email         = $email;
		$this->banned        = $banned;
		$this->ip            = $ip;
		$this->date_created  = $dateCreated;
		$this->date_modified = $dateModified;
	}
	
    function get($id) {
        global $db;
		$result = $db->query('SELECT * 
							  FROM guests 
							  WHERE id=' . $db->quote($id));
		if ( ! DB::isError($result) && $result->numRows() != 0){
	        $array = $result->fetchRow();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
		}
		else {
			if(DB::isError($result)) {
				echo $result;
				throw new Exception('Fout bij zoeken van guest met id: ' . $id, 99002);
			}
			else if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij zoeken van guest met id: ' . $id, 99001);
			}
		}
    }

    function getByIP($name, $ip) {
        global $db;
		$result = $db->query("SELECT * 
							  FROM guests 
							  WHERE ip=" . $db->quote($ip) . "
							  	AND name='" . $name . "'");
		if ( ! DB::isError($result) && $result->numRows() != 0){
	        $array = $result->fetchRow();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
		}
		else {
			if(DB::isError($result)) {
				echo $result;
				throw new Exception('Fout bij zoeken van guest met id: ' . $id, 99002);
			}
			else if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij zoeken van guest met id: ' . $id, 99001);
			}
		}
    }

    function getAllByIP($ip) {
        global $db;
		$result = $db->getAll("SELECT id 
							  FROM guests 
							  WHERE ip='" . $ip . "'" , DB_FETCHMODE_ASSOC);
		if ( ! DB::isError($result) || $result->numRows() != 0){
			return $result;
		}
		else {
			if(DB::isError($result)) {
				echo $result;
				throw new Exception('Fout bij zoeken van guest met id: ' . $id, 99002);
			}
			else if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij zoeken van guest met id: ' . $id, 99001);
			}
		}
    }

    function getAll() {
        global $db;
        $result = $db->getAll('SELECT * 
        					   FROM guests', DB_FETCHMODE_ASSOC);
		if ( ! DB::isError($result)){
			return $result;
		}
		else {
			if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij ophalen alle guests', 99001);
			}
			else {
				throw new Exception('Fout bij ophalen van alle guests', 99002);
			}
		}
    }
	
	function fetch() {
        $array = $this->result->fetchRow();
        if (empty($array)) {
            return false;
        }
        foreach ($array as $key=>$value) {
            $this->$key = $value;
        }
        return true;
    }

    function delete($id) {
        global $db;
        $result = $db->query('DELETE FROM guests 
        					  WHERE id=' . $db->quote($id));
		if ( ! DB::isError($result)){
			return $result;
		}
		else {
			throw new Exception('Fout bij het verwijderen van guest met id: ' . $id);
		}
    }

    function update($id) {
        global $db;
		$values = $this->createValueList();
        $result = $db->autoExecute('guests', $values, DB_AUTOQUERY_UPDATE, 'id = ' . $db->quote($id));
		if ( ! DB::isError($result)){
			return $result;
		}
		else {
			throw new Exception('Fout bij het updaten van guest met id: ' . $id);
		}
    }

    function banGuest($id) {
        global $db;
		$values = array(
		   	'banned' => 1,
		   	'date_banned' => date ("Y-m-d H:m:s")
		);
        $result = $db->autoExecute('guests', $values, DB_AUTOQUERY_UPDATE, 'id = ' . $db->quote($id));
		if ( ! DB::isError($result)){
			return $result;
		}
		else {
			throw new Exception('Fout bij het updaten van guest met id: ' . $id);
		}
    }
	
    function banIp($ip) {
        global $db;
		$values = array(
		   	'banned' => 1
		);
        $result = $db->autoExecute('guests', $values, DB_AUTOQUERY_UPDATE, 'ip = ' . $db->quote($ip));
		if ( ! DB::isError($result)){
			return $result;
		}
		else {
			throw new Exception('Fout bij het updaten van guest met id: ' . $id);
		}
    }
	
    function insert() {
        global $db;
		$values = $this->createValueList();
        $result = $db->autoExecute('guests', $values, DB_AUTOQUERY_INSERT);
		if ( ! DB::isError($result)){
			return $result;
		}
		else {
			throw new Exception('Fout bij het toevoegen van een record aan guests.');
		}
    }
	
	function createValueList() {
		if (!$this->date_created) {
			$this->date_created = date ("Y-m-d H:m:s");
		}
		$values = array(
		   	'id'            => $this->id,
		   	'name'          => $this->name,
		   	'email'         => $this->email,
		   	'banned'        => $this->banned,
		   	'ip'            => $this->ip,
		   	'date_modified' => date ("Y-m-d H:m:s"),
		   	'date_created'  => $this->date_created
		);
		return $values;
	}

}
?>