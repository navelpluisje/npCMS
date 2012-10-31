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
		$result = $db->exec('SELECT * 
							  FROM guests 
							  WHERE id=' . $db->quote($id));
		if ( $result->rowCount() != 0){
	        $array = $result->fetch();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
		}
		else {
			if( $result == -1 ) {
				throw new Exception('Fout bij zoeken van guest met id: ' . $id, 99002);
			}
			else if($result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij zoeken van guest met id: ' . $id, 99001);
			}
		}
    }

    function getByIP($name, $ip) {
        global $db;
		$result = $db->exec( "SELECT * 
							  FROM guests 
							  WHERE ip='" . $ip . "'
							  	AND name='" . $name . "'");
		if ( $result->rowCount() != 0){
	        $array = $result->fetch();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
		}
		else {
			if($result === -1) {
				throw new Exception('Fout bij zoeken van guest met id: ' . $ip, 99002);
			}
			else if($result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij zoeken van guest met id: ' . $ip, 99001);
			}
		}
    }

    function getAllByIP($ip) {
        global $db;
		$result = $db->exec( "SELECT id 
							  FROM guests 
							  WHERE ip='" . $ip . "'" );
		if ( $result->rowCount() != 0 ){
			$result = $result->fetchAll();
			return $result;
		}
		else {
			if( $result == -1 ) {
				throw new Exception('Fout bij zoeken van guest met id: ' . $id, 99002);
			}
			else if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij zoeken van guest met id: ' . $id, 99001);
			}
		}
    }

    function getAll() {
        global $db;
        $result = $db->exec( 'SELECT * 
        	                  FROM guests' );
		if ( $result->rowCount() != 0 ){
			$result = $result->fetchAll();
			return $result;
		}
		else {
			if($result->rowCount() == 0) {
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
        $result = $db->query( 'DELETE 
        	                   FROM guests 
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
			'id'		  => $db->quote($id),
		   	'banned'      => 1,
		   	'date_banned' => date ("Y-m-d H:m:s")
		);
        $result = $db->update('guests', $values, 'id = ' . $db->quote($id));
		if ( $result != -1){
			return $result;
		}
		else {
			throw new Exception('Fout bij het updaten van guest met id: ' . $id);
		}
    }
	
    function banIp($ip) {
        global $db;
		$values = array(
			'id'		  => 0,
		   	'banned'      => 1,
		   	'date_banned' => date ("Y-m-d H:m:s")
		);
        $result = $db->update('guests', $values, 'ip = ' . $db->quote($ip));
		if ( $result != -1){
			return $result;
		}
		else {
			throw new Exception('Fout bij het updaten van guest met ip: ' . $ip);
		}
    }
	
    function insert() {
        global $db;
		$values = $this->createValueList();
        $result = $db->insert('guests', $values);
		if ( $result != -1){
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