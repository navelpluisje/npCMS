<?php

class DbPageType
{
	var $id;
	var $type;
	var $desription;
	var $date_created;
	var $date_modified;

	function init($id, $name, $desc, $dateCreated, $dateModified) {
		$this->id            = $id;
		$this->name          = $name;
		$this->desription    = $desc;
		$this->date_created  = $dateCreated;
		$this->date_modified = $dateModified;
	}
	
    function get($id) {
        global $db;
		$result = $db->query('SELECT * FROM page_types WHERE id=' . $db->quote($id));
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
				throw new Exception('Fout bij zoeken van paginasorten met id: ' . $id, 99002);
			}
			else if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij zoeken van paginasoorten met id: ' . $id, 99001);
			}
		}
    }

    function getPageType($id) {
        global $db;
		$result = $db->exec('SELECT * FROM pages p, page_types pt WHERE p.type_id=pt.id AND p.id=' . $id);
		if ($result->rowCount() != 0){
	        $array = $result->fetchAll();
	        $array= $array[0];
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
		}
		else {
			if($result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij zoeken van paginasoorten met id: ' . $id, 99001);
			}
		}
    }

    function getAll() {
        global $db;
        $result = $db->getAll('SELECT * FROM page_types', DB_FETCHMODE_ASSOC);
		if ( ! DB::isError($result)){
			return $result;
		}
		else {
			throw new Exception('Fout bij ophalen van alle paginasoorten', 99002);
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
        $result = $db->query('DELETE FROM page_types WHERE id=' . $db->quote($id));
		if ( ! DB::isError($result) && $result->numRows() != 0){
			return $result;
		}
		else {
			throw new Exception('Fout bij het verwijderen van paginasoort met id: ' . $id);
		}
    }

    function update($id) {
        global $db;
		$values = $this->createValueList();
        $result = $db->autoExecute('page_types', $values, DB_AUTOQUERY_UPDATE, 'id = ' . $db->quote($id));
		if ( ! DB::isError($result) && $result->numRows() != 0){
			return $result;
		}
		else {
			throw new Exception('Fout bij het updaten van paginasoort met id: ' . $id);
		}
    }
	
    function insert() {
        global $db;
		$values = $this->createValueList();
        $result = $db->autoExecute('page_types', $values, DB_AUTOQUERY_INSERT);
		if ( ! DB::isError($result) && $result->numRows() != 0){
			return $result;
		}
		else {
			throw new Exception('Fout bij het toevoegen van een record aan paginasoort.');
		}
    }
	
	function createValueList() {
		if ($this->date_created = '') {
			$this->date_created = date ("Y-m-d H:m:s");
		}
		$values = array(
		   	'name'          => $this->name,
		   	'description'   => $this->short_desription,
		   	'date_modified' => date ("Y-m-d H:m:s"),
		   	'date_created'  => $this->date_created
		);
		return $values;
	}

}
?>