<?php

class DbNewsCategory
{
	var $id;
	var $name;
	var $description;

	function init($id, $name, $desc) {
		$this->id          = $id;
		$this->name        = $name;
		$this->description = $desc;
	}
	
    function get($id) {
        global $db;
		$result = $db->query('SELECT * FROM news_categories WHERE id=' . $db->quote($id));
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
				throw new Exception('Fout bij zoeken van categorie met id: ' . $id, 99002);
			}
			else if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij zoeken van categorie met id: ' . $id, 99001);
			}
		}
    }

    function getAll() {
        global $db;
        $result = $db->exec('SELECT * FROM news_categories');
        $result = $result->fetchAll();
        if(count($result) > 0) {
			return $result;
        } else {
			if($result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij ophalen alle categorieen', 99001);
			}
			else {
				throw new Exception('Fout bij ophalen van alle categorieen', 99002);
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
        $result = $db->query('DELETE FROM news_categories WHERE id=' . $db->quote($id));
		if ( ! DB::isError($result) && $result->numRows() != 0){
			return $result;
		}
		else {
			throw new Exception('Fout bij het verwijderen van categorie met id: ' . $id);
		}
    }

    function update($id) {
        global $db;
		$values = $this->createValueList();
        $result = $db->autoExecute('news_categories', $values, DB_AUTOQUERY_UPDATE, 'id = ' . $db->quote($id));
		if ( ! DB::isError($result) && $result->numRows() != 0){
			return $result;
		}
		else {
			throw new Exception('Fout bij het updaten van categorie met id: ' . $id);
		}
    }
	
    function insert() {
        global $db;
		$values = $this->createValueList();
        $result = $db->autoExecute('news_categories', $values, DB_AUTOQUERY_INSERT);
		if ( ! DB::isError($result) && $result->numRows() != 0){
			return $result;
		}
		else {
			throw new Exception('Fout bij het toevoegen van een record aan categorie.');
		}
    }
	
	function createValueList() {
		$values = array(
		   	'name'        => $this->name,
		   	'description' => $this->description
		);
		return $values;
	}

}
?>