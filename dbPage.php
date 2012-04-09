<?php

class DbPage
{
	var $id;
	var $name;
	var $short_desription;
	var $page_title;
	var $content;
	var $parent_id;
	var $type_id;
	var $user_id;

	function init($id, $name, $desc, $title, $content, $parent_id, $type_id, $user_id) {
		$this->id               = $id;
		$this->name             = $name;
		$this->short_desription = $desc;
		$this->page_title       = $title;
		$this->content          = $content;
		$this->parent_id        = $parent_id;
		$this->type_id          = $type_id;
		$this->user_id          = $user_id;
	}
	
    function get($id) {
        global $db;
		$result = $db->query('SELECT * FROM pages WHERE id=' . $db->quote($id));
		if ( ! DB::isError($result) && $result->numRows() != 0){
	        $array = $result->fetchRow();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
		}
		else {
			if(DB::isError($result)) {
				throw new Exception('Fout bij zoeken van pagina met id: ' . $id, 99002);
			}
			else if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij zoeken van pagina met id: ' . $id, 99001);
			}
		}
    }

    function getByName($name) {
        global $db;
        $result = $db->query("SELECT * FROM pages  WHERE name=" . $db->quote($name));
		if ( ! DB::isError($result) && $result->numRows() != 0){
	        $array = $result->fetchRow();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
			}
		else {
			if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij zoeken van pagina met naam: ' . $name, 99001);
			}
			else {
				throw new Exception('Fout bij zoeken van pagina met naam: ' . $name, 99002);
			}
		}
    }

    function getAll() {
        global $db;
        $result = $db->getAll('SELECT * FROM pages', DB_FETCHMODE_ASSOC);
		if ( ! DB::isError($result) || $result->numRows() != 0){
			return $result;
		}
		else {
			if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij ophalen alle paginas', 99001);
			}
			else {
				throw new Exception('Fout bij ophalen van alle paginas', 99002);
			}
		}
    }
	
    function getAllParents() {
        global $db;
        $result = $db->getAll('SELECT id, name FROM pages ORDER BY name', DB_FETCHMODE_ASSOC);
		if ( ! DB::isError($result) || $result->numRows() != 0){
			return $result;
		}
		else {
			if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij ophalen alle paginas', 99001);
			}
			else {
				throw new Exception('Fout bij ophalen van alle paginas', 99002);
			}
		}
    }
	
    function getParents($id) {
        global $db;
        $result = $db->getAll('SELECT * FROM pages WHERE parent_id=' . $db->quote($id) , DB_FETCHMODE_ASSOC);
		if ( ! DB::isError($result)){
			return $result;
		}
		else {
			throw new Exception('Fout bij zoeken van pagina met naam: ' . $name, 99002);
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
        $result = $db->query('DELETE FROM pages WHERE id=' . $db->quote($id));
		if ( ! DB::isError($result) || $result->numRows() != 0){
			return $result;
		}
		else {
			throw new Exception('Fout bij het verwijderen van pagina met id: ' . $id);
		}
    }

    function update($id) {
        global $db;
		$values = $this->createValueList();
        $result = $db->autoExecute('pages', $values, DB_AUTOQUERY_UPDATE, 'id = ' . $db->quote($id));
		if ( ! DB::isError($result) || $result->numRows() != 0){
			return $result;
		}
		else {
			throw new Exception('Fout bij het updaten van pagina met id: ' . $id);
		}
    }
	
    function insert() {
        global $db;
		$values = $this->createValueList();
        $result = $db->autoExecute('pages', $values, DB_AUTOQUERY_INSERT);
		if ( ! DB::isError($result) || $result->numRows() != 0){
			return $result;
		}
		else {
			throw new Exception('Fout bij het toevoegen van een record aan pagina\'s.');
		}
    }
	
	function createValueList() {
		$values = array(
		   	'name'              => $this->name,
		   	'short_description' => $this->short_desription,
		   	'page_title'        => $this->page_title,
		   	'content'           => $this->content,
		   	'parent_id'         => $this->parent_id,
		   	'type_id'           => $this->type_id,
		   	'user_id'           => $this->user_id
		);
		return $values;
	}

}
?>