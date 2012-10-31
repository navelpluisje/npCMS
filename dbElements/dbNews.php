<?php

class DbNews
{
	var $id;
	var $title;
	var $body_text;
	var $more_text;
	var $user_id;
	var $category_id;
	var $user_name;
	var $category_name;
	var $date_created;
	var $date_modified;
	
	function init($id, $title, $btext, $mtext, $user_id, $cat_id, $user_name, $cat_name, $dateCreated, $dateModified) {
		$this->id            = $id;
		$this->title         = $title;
		$this->body_text     = $btext;
		$this->more_text     = $mtext;
		$this->user_id       = $user_id;
		$this->category_id   = $cat_id;
		$this->user_name     = $user_name;
		$this->category_name = $cat_name;
		$this->date_created  = $dateCreated;
		$this->date_modified = $dateModified;
	}
	
    function get($id) {
        global $db;
		$result = $db->exec('SELECT * FROM news WHERE id=' . $id);
		if ( $result->rowCount() != 0){
	        $array = $result->fetch();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
		}
		else {
			if($result->rowCount() == 0) {
				throw new Exception('Geen resultaten bij zoeken van nieuws met id: ' . $id, 99001);
			}
		}
    }

    function getAll() {
        global $db;
        $result = $db->exec('SELECT * FROM news');
        $result = $result->fetchAll();
        if(count($result) > 0) {
			return $result;
        } else {
			throw new Exception('Geen resultaten bij ophalen alle nieuws', 99001);
		}
    }
	
	function fetch() {
        $array = $this->result->fetchRow();
        if (empty($array)) {
            return false;
        }
        foreach ( $array as $key=>$value ) {
            $this->$key = $value;
        }
        return true;
    }

    function delete($id) {
        global $db;
        $result = $db->delete( 'DELETE FROM news WHERE id=' . $db->quote( $id ));
		if ( $result != -1 ){
			return $result;
		}
		else {
			throw new Exception( 'Fout bij het verwijderen van nieuws met id: ' . $id );
		}
    }

    function update( $id ) {
        global $db;
		$values = $this->createValueList();
        $result = $db->update( 'news', $values, 'id =' . $db->quote( $id ));
		if ( $result != -1 ){
			return $result;	
		}
		else {
			throw new Exception('Fout bij het updaten van nieuws met id: ' . $id);
		}
    }
	
    function insert() {
        global $db;
		$values = $this->createValueList();
		$values['date_created'] = date ("Y-m-d H:m:s");
        $result = $db->insert('news', $values);
		if ( $result != -1 ) {
			return $result;
		}
		else {
			throw new Exception('Fout bij het toevoegen van een record aan nieuws.');
		}
    }
	
	function createValueList() {
		if (! $this->date_created) {
			$this->date_created = date ("Y-m-d H:m:s");
		}
		$values = array(
			'id'			=> $this->id,
		   	'title'         => $this->title,
		   	'body_text'     => $this->body_text,
		   	'more_text'     => $this->more_text,
		   	'user_id'       => $this->user_id,
		   	'category_id'   => $this->category_id,
		   	'date_modified' => date ("Y-m-d H:m:s"),
		   	'date_created'  => $this->date_created
		);
		return $values;
	}

}
?>