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
	var $date_created;
	var $date_modified;

	function init($id, $name, $desc, $title, $content, $parent_id, $type_id, $user_id, $dateCreated, $dateModified = 0) {
		$this->id               = $id;
		$this->name             = $name;
		$this->short_desription = $desc;
		$this->page_title       = $title;
		$this->content          = $content;
		$this->parent_id        = $parent_id;
		$this->type_id          = $type_id;
		$this->user_id          = $user_id;
		$this->date_created     = $dateCreated;
		$this->date_modified    = $dateModified;
	}
	
    function get($id) {
        global $db;
		$result = $db->exec('SELECT * 
							FROM pages 
							WHERE id=' . $id);
		if ($result !== -1 && $result->rowCount() != 0){
	        $array = $result->fetch();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
		}
		else {
			if($result !== -1 && $result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij zoeken van pagina met id: ' . $id, 99001);
			}
			else {
				throw new Exception('Fout bij zoeken van pagina met id: ' . $id, 99002);
			}
		}
    }

    function getByName($name) {
        global $db;
        $result = $db->exec('SELECT * 
        					FROM pages  
        					WHERE name=' . $db->quote($name));
        if ( $result !== -1 && $result->rowCount() != 0){
	        $array = $result->fetch();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
			}
		else {
			if($result !== -1 && $result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij zoeken van pagina met naam: ' . $name, 99001);
			}
			else {
				throw new Exception('Fout bij zoeken van pagina met naam: ' . $name, 99002);
			}
		}
    }

    function getAll() {
        global $db;
        $result = $db->exec( 'SELECT * 
        					  FROM pages' );
		if ( $result->rowCount() != 0){
			$result = $result->fetchAll();
			return $result;
		}
		else {
			if($result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij ophalen alle paginas', 99001);
			}
			else {
				throw new Exception('Fout bij ophalen van alle paginas', 99002);
			}
		}
    }
	
    function getAllParents() {
        global $db;
        $result = $db->exec( 'SELECT id, name 
        					  FROM pages 
        					  ORDER BY name');
		if ( $result->rowCount() != 0){
			$result = $result->fetchAll();
			return $result;
		}
		else {
			if($result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij ophalen alle paginas', 99001);
			}
			else {
				throw new Exception('Fout bij ophalen van alle paginas', 99002);
			}
		}
    }
	
    function getParents($id) {
        global $db;
        $result = $db->exec('SELECT * FROM pages WHERE parent_id=' . $id);
        $result = $result->fetchAll();
			return $result;
		// }
		// else {
		// 	throw new Exception('Fout bij zoeken van pagina met naam: ' . $name, 99002);
		// }
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
        $result = $db->delete('DELETE FROM pages 
        						WHERE id=' . $db->quote($id));
		if ( $result !== -1 ){
			return $result;
		}
		else {
			throw new Exception('Fout bij het verwijderen van pagina met id: ' . $id);
		}
    }

    function update($id) {
        global $db;
		$values = $this->createValueList();
        $result = $db->update('pages', $values, 'id = ' . $db->quote($id));
		if ( $result !== -1 ){
			return $result;
		}
		else {
			throw new Exception('Fout bij het updaten van pagina met id: ' . $id);
		}
    }
	
    function insert() {
        global $db;
		$values = $this->createValueList();
		$values['date_created'] = date ("Y-m-d H:m:s");
        $result = $db->insert('pages', $values);
		if ( $result !== -1 ) {
			return $result;
		}
		else {
			throw new Exception('Fout bij het toevoegen van een record aan pagina\'s.');
		}
    }
	
	function createValueList() {
		if ($this->date_created = '') {
			$this->date_created = date ("Y-m-d H:m:s");
		}
		$values = array(
			'id'                => 0,
		   	'name'              => $this->name,
		   	'short_description' => $this->short_desription,
		   	'page_title'        => $this->page_title,
		   	'content'           => $this->content,
		   	'parent_id'         => $this->parent_id,
		   	'type_id'           => $this->type_id,
		   	'user_id'           => $this->user_id,
		   	'date_modified' => date ("Y-m-d H:m:s"),
		   	'date_created'  => $this->date_created
		);
		return $values;
	}

}
?>