<?php
/**
 * Class for creating, updating and deleting Blogpages
 * @author Erwin Goossen
 * 
 */
global $_DIR;

include_once( $_DIR['admin'] . '/adminValidate.php');

class AdminBlogPage extends AdminPage
{
	protected $blogItems = array();
	protected $guest = array();
	protected $dbGuests = array();
	protected $categories = array();
	protected $dbBlog = array();
	protected $postFields;

	/**
	 * Constructor Checking which page to show and manage the templates
	 * @param string $param Parameter given with the url
	 */
	public function __construct($param) {
		global $_DIR;
		parent::__construct($param);
		$function = $this->param[2];
		$id = $this->param[3];
		$this->postFields = array(
			'guest_id' => $_POST['guest_id'],
			'title'    => $_POST['title'],
			'content'  => $_POST['text']);
		switch ($function) {
			case 'edit' :
				$this->tpl->assign('edit', true);
				$this->getBlogItem($id);
				$this->getGuests();
				$this->getGuest($this->dbBlog->guest_id);
				$this->getCategories();
				$this->setIncludeTemplate('admin/admin_newBlogItem.tpl');
				break;
			case 'change' :
				$this->editBlogItem($id);
				header('Location: ' . $_DIR['webRoot'] . '/' . $_DIR['adminPage'] . '/blogs/');
				break;
			case 'ip' :
				$this->banGuest($id, 'ip');
				$this->hideBlogByIp($this->dbGuest->ip);
				header('Location: ' . $_DIR['webRoot'] . '/' . $_DIR['adminPage'] . '/blogs/');
				break;
			case 'guest' :
				$this->banGuest($id, 'guest');
				$this->hideBlog($id);
				header('Location: ' . $_DIR['webRoot'] . '/' . $_DIR['adminPage'] . '/blogs/');
				break;
			case 'delete' :
				$this->deleteBlogItem($id);
				header('Location: ' . $_DIR['webRoot'] . '/' . $_DIR['adminPage'] . '/blogs/');
				break;
			default :
				$this->getGuests();
				$this->getBlogItems();
				$this->setIncludeTemplate('admin/admin_BlogPage.tpl');
				break;
		}
	}

	public function getBlogItems() {
		$this->dbBlog = new DbBlog();
		try {
			$this->blogItems = $this->dbBlog->getAll();
			$this->tpl->assign('blogItems', $this->blogItems);
		}
		catch (Exception $e) {
			$this->tpl->assign('empty', true);
		}
	}

	public function getBlogItem($id) {
		$this->dbBlog = new DbBlog();
		$this->blogItems = $this->dbBlog->get($id);
		$this->tpl->assign('blogItem', $this->blogItems);
	}

	public function getGuest($id) {
		$this->dbGuest = new DbGuest();
		$this->guest = $this->dbGuest->get($id);
		$this->tpl->assign('guest', $this->guest);
	}

	public function editBlogItem($id) {
		$this->dbBlog = new DbBlog();
		try{
			$this->dbBlog->get($id);
		}
		catch (exception $e) {
			echo 'test ' . $id;
		}
		$title      = $this->postFields['title'];
		$btext      = trim($_POST['text']);
		$guest_id   = $_POST['guest_id'];
		$guest_name = $this->dbBlog->guest_name;
		if ($_POST['hidden'] == 'hidden') {
			$visible    = 0;
		} else {
			$visible    = 1;
		}
		$cat_id     = $this->dbBlog->category_id;
		$cat_name   = $this->dbBlog->category_name;
		$this->dbBlog->init($id, $title, $btext, '', $guest_id, $cat_id, $guest_name, $cat_name, $visible, date ("Y-m-d H:m:s"), date ("Y-m-d H:m:s"));
		try {
			$this->dbBlog->update($id);
		}
		catch(Exception $e) {
			echo 'shit ';
		}
	}

	public function hideBlog($id) {
		$this->dbBlog = new DbBlog();
		try{
			$this->dbBlog->hideBlog($id);
		}
		catch (exception $e) {
			echo 'test ' . $id;
		}
	}

	public function hideBlogByIp($ip) {
		try{
			$result = $this->dbGuest->getAllByIP($ip);
		}
		catch (exception $e) {
			echo $e;
		}
		$this->dbBlog = new DbBlog();
		foreach ($result as $key => $value) {
			try{
				$this->dbBlog->hideBlog($value);
			}
			catch (exception $e) {
				echo 'test ' . $ip;
			}
		}
	}

	public function banGuest($id, $type) {
		$this->dbGuest = new DbGuest();
		try{
			$this->dbGuest->get($id);
		}
		catch (exception $e) {
			echo 'test ' . $id;
		}
		if ($type == 'guest') {
			$this->dbGuest->banned = 1;
			$this->dbGuest->banGuest($id);
		}
		else if ($type == 'ip') {
			$this->dbGuest->banIp($this->dbGuest->ip);
		}
		
	}

	public function deleteBlogItem($id) {
		$this->dbBlog = new DbBlog();
		try {
			$this->dbBlog->delete($id);
		}
		catch(Exception $e) {
			echo 'shit';
		}
	}

	public function getGuests() {
		$this->dbGuests = new DbGuest();
		$this->guests = $this->dbGuests->getAll();
		$this->tpl->assign('guests', $this->guests);
	}

	public function getCategories() {
		$this->dbNewsCategories = new DbNewsCategory();
		$this->categories = $this->dbNewsCategories->getAll();
		$this->tpl->assign('cats', $this->categories);
	}
	
	public function validateBlog() {
		$valid = true;
		if ( ! $this->validate->checkFilled($this->postFields['name'],
										    $this->postFields['mail'],
										    $this->postFields['title'],
										    $this->postFields['content'])) {
			$this->errorMessage .= 'Niet alle velden zijn ingevuld.</br>'; 	
			$valid = false;							 	
		}	
		if ( ! $this->validate->checkEmail($this->postFields['mail'])) {
			$this->errorMessage .= 'Het ingevulde emailadres is niet geldig.</br>';
			$valid = false;	 								 	
		}
		if ( ! $valid) {
			$this->tpl->assign('name', $this->postFields['name']);
			$this->tpl->assign('mail', $this->postFields['mail']);
			$this->tpl->assign('title', $this->postFields['title']);
			$this->tpl->assign('content', $this->postFields['content']);
			$this->tpl->assign('errorMessage', $this->errorMessage);
		}
		return $valid;
	}
	
}
?>