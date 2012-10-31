<?php

class DbUser
{
	var $id;
	var $screen_name;
	var $password;
	var $first_name;
	var $last_name;
	var $email;
	var $usertype_id;
	var $picture;
	var $active;
	var $date_created;
	var $date_modified;

	function init($id, $scr_name, $password, $f_name, $l_name, $email, $usertype_id, $picture, $active, $dateCreated, $dateModified) {
		$this->id            = $id;
		$this->screen_name   = $scr_name;
		$this->password      = $password;
		$this->first_name    = $f_name;
		$this->last_name     = $l_name;
		$this->email         = $email;
		$this->usertype_id   = $usertype_id;
		$this->picture       = $picture;
		$this->active        = $active;
		$this->date_created  = $dateCreated;
		$this->date_modified = $dateModified;
	}
	
    function get($id) {
        global $db;
		$result = $db->exec('SELECT * FROM users WHERE id=' . $db->quote($id));
		if ( $result->rowCount() != 0){
	        $array = $result->fetch();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
		}
		else {
			if( $result == -1 ) {
				throw new Exception('Fout bij zoeken van user met id: ' . $id, 99002);
			}
			else if($result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij zoeken van user met id: ' . $id, 99001);
			}
		}
    }

    function getPassword($name) {
        global $db;
		$result = $db->exec('SELECT password FROM users WHERE screen_name=' . $db->quote($name));
		if ( $result->rowCount() != 0 ){
	        $array = $result->fetch();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
		}
		else {
			if( $result == -1 ) {
				echo $result;
				throw new Exception('Fout bij zoeken van user met id: ' . $id, 99002);
			}
			else if($result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij zoeken van user met id: ' . $id, 99001);
			}
		}
    }

    function getAll() {
        global $db;
        $result = $db->exec('SELECT * FROM users');
		if ( $result->rowCount() != 0 ){
			$result = $result->fetchAll();
			return $result;
		}
		else {
			if($result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij ophalen alle users', 99001);
			}
			else {
				throw new Exception('Fout bij ophalen van alle users', 99002);
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
        $result = $db->delete('DELETE FROM users WHERE id=' . $db->quote($id));
		if ( $result != -1){
			return $result;
		}
		else {
			throw new Exception('Fout bij het verwijderen van user met id: ' . $id);
		}
    }

    function update($id) {
        global $db;
		$values = $this->createValueList();
        $result = $db->update( 'users', $values, 'id = ' . $db->quote($id) );
		if ( $result != -1 ){
			return $result;
		}
		else {
			throw new Exception('Fout bij het updaten van user met id: ' . $id);
		}
    }
	
    function insert() {
        global $db;
		$values = $this->createValueList();
        $result = $db->insert( 'users', $values );
		if ( $result != -1 ){
			return $result;
		}
		else {
			throw new Exception('Fout bij het toevoegen van een record aan users.');
		}
    }
	
	function createValueList() {
		if (! $this->date_created) {
			$this->date_created = date ("Y-m-d H:m:s");
		}
		$values = array(
			'id'			=> $this->id,
		   	'screen_name'   => $this->screen_name,
		   	'password'      => $this->password,
		   	'first_name'    => $this->first_name,
		   	'last_name'     => $this->last_name,
		   	'email'         => $this->email,
		   	'usertype_id'   => $this->usertype_id,
		   	'picture'       => $this->picture,
		   	'active'        => $this->active,
		   	'date_modified' => date ("Y-m-d H:m:s"),
		   	'date_created'  => $this->date_created
		);
		return $values;
	}

}
?>