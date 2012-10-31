<?php

class DbBlog
{
	public $id;
	public $title;
	public $body_text;
	public $more_text;
	public $guest_id;
	public $guest_name;
	public $category_id;
	public $category_name;
	public $visible;
	public $date_created;
	public $date_modified;

	function init($id, $title, $btext, $mtext, $guest_id, $cat_id, $guest_name, $cat_name, $visible, $dateCreated, $dateModified) {
		$this->id            = $id;
		$this->title         = $title;
		$this->body_text     = $btext;
		$this->more_text     = $mtext;
		$this->guest_id      = $guest_id;
		$this->category_id   = $cat_id;
		$this->guest_name    = $guest_name;
		$this->category_name = $cat_name;
		$this->date_created  = $dateCreated;
		$this->date_modified = $dateModified;
		$this->visible       = $visible;
	}
	
    function get($id) {
        global $db;
		$result = $db->exec('SELECT * FROM blogs WHERE id=' . $db->quote($id));
		if ( $result->rowCount() != 0){
	        $array = $result->fetch();
	        foreach ($array as $key => $value) {
	            $this->$key = $value;
	        }
			return $array;
		}
		else {
			if( $result == -1 ) {
				echo $result;
				throw new Exception('Fout bij zoeken van blog met id: ' . $id, 99002);
			}
			else if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij zoeken van blog met id: ' . $id, 99001);
			}
		}
    }

    function getAll() {
        global $db;
        $result = $db->exec( 'SELECT * FROM blogs' );
		if ( $result->rowCount() != 0 ){
			$result = $result->fetchAll();
			return $result;
		}
		else {
			if( $result == -1 ) {
				throw new Exception('Fout bij zoeken van blog met id: ' . $id, 99002);
			}
			else if($result->numRows() == 0) {
				throw new Exception('Geen resultaten bij zoeken van blog met id: ' . $id, 99001);
			}
		}
    }
	
    function getVisible() {
        global $db;
        $result = $db->exec('SELECT title, body_text, date_created, guest_id, guest_name 
        					   FROM blogs where visible = 1
        					   ORDER BY date_created DESC');
		if ( $result->rowCount() != 0){
			return $result->fetchAll();
		}
		else {
			throw new Exception('Geen resultaten bij ophalen alle blog', 99001);
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
        $result = $db->delete('DELETE FROM blogs WHERE id=' . $db->quote($id));
		if ( $result != -1) {
			return $result;
		}
		else {
			throw new Exception('Fout bij het verwijderen van blog met id: ' . $id);
		}
    }

    function update($id) {
        global $db;
		$values = $this->createValueList();
        $result = $db->update('blogs', $values, 'id =' . $db->quote($id));
		if ( $result != -1 ){
			return $result;	
		}
		else {
			throw new Exception('Fout bij het updaten van blog met id: ' . $id);
		}
    }
	
    function hideBlog($id) {
        global $db;
		$values = array(
		   	'visible' => 0,
		);
        $result = $db->update('blogs', $values, 'guest_id =' . $db->quote($id));
		if ( $result != -1 ){
			return $result;	
		}
		else {
			throw new Exception('Fout bij het updaten van blog met id: ' . $id);
		}
    }
	
    function insert() {
        global $db;
		$values = $this->createValueList();
        $result = $db->insert('blogs', $values);
		if ( $result != -1 ){
			return $result;
		}
		else {
			throw new Exception('Fout bij het toevoegen van een record aan blog.');
		}
    }
	
	function createValueList() {
		if (!$this->date_created) {
			$this->date_created = date ("Y-m-d H:m:s");
		}
		$values = array(
			'id'            => $this->id,
		   	'title'         => $this->title,
		   	'body_text'     => $this->body_text,
		   	'more_text'     => $this->more_text,
		   	'guest_id'      => $this->guest_id,
		   	'guest_name'    => $this->guest_name,
		   	'category_id'   => $this->category_id,
		   	'visible'       => $this->visible,
		   	'date_modified' => date ("Y-m-d H:m:s"),
		   	'date_created'  => $this->date_created
		);
		return $values;
	}

}
?>