<?php
global $dir;
include_once( $dir['admin'] . '/adminValidate.php');

class BlogPage extends Page
{
	protected $dbBlog;
	protected $blogItems = array();
	protected $blogItem;
	protected $validate;
	protected $dbGuest;
	protected $postFields;
	protected $errorMessage;
	
	
	public function __construct($param) {
		parent::__construct($param);
		$id = $param[2];
		switch ($id) {
			case 'add' :
				$this->setIncludeTemplate('newBlogPage.tpl');
				break;
			case 'new' :
				if (isset($_POST['submit'])) {
					$this->errorMessage = '';
					$this->postFields = array(
						'name'    => $_POST['name'],
						'mail'    => $_POST['mail'],
						'title'   => $_POST['title'],
						'content' => $_POST['content']);
					$this->validate = new Validation();
					if ($this->validateBlog()) {
						switch ($this->checkGuestIp($_SERVER["REMOTE_ADDR"])) {
							case 1 : // excisting guest
								$this->createBlogItem();
								$this->getSmartyTpl()->assign('message', 'Bericht met succes aangemaakt.');
								$this->getSmartyTpl()->assign('send', true);
								break;
							case 2 : // new guest
								$this->createGuest();
								$this->createBlogItem();
								$this->getSmartyTpl()->assign('message', 'Bericht met succes aangemaakt.');
								$this->getSmartyTpl()->assign('send', true);
								break;
							case 3 : // banned ip
								$this->getSmartyTpl()->assign('message', 'Uw IP-addres en/of emailadres is geblokeerd.');
							    $this->getSmartyTpl()->assign('explanation', 'Neem contact op als u ten onrechte geen berichten kunt plaatsen');
								$this->getSmartyTpl()->assign('send', true);
								break;
							$this->createGuest();
						}
					}
					else {
						$this->setIncludeTemplate('newBlogPage.tpl');
					}
				}
				else {
					$this->setIncludeTemplate('blogPage.tpl');
					$this->getBlogItems();
				}
				break;
			default	:
				$this->setIncludeTemplate('blogPage.tpl');
				$this->getBlogItems();
		}
	}
	
	public function getBlogItems() {
		$this->dbBlog = new DbBlog();
		try {
			$this->blogItems = $this->dbBlog->getVisible();
			$this->getSmartyTpl()->assign('blogItems', $this->blogItems);
		}
		catch (Exception $e) {
			$this->getSmartyTpl()->assign('empty', true);
		}
	}
	
	public function checkGuestIp($ip) {
		$result;
		$this->dbGuest = new DbGuest();
		try {
			$this->dbGuest->getByIP($this->postFields['name'], $ip);
			if ($this->dbGuest->banned == 1) {
				$result = 3;	
			}
			else if ($this->dbGuest->name == $this->postFields['name']){
				$result = 1;
			}
			else {
				$result = 2;
			}
		}
		catch (exception $e) {
			$result = 2;
		}
		return $result;
	}
	
	public function createGuest() {
		$this->dbGuest = new DbGuest();
		$this->dbGuest->init(0, $this->postFields['name'], $this->postFields['mail'], 0, $_SERVER['REMOTE_ADDR'], date ('Y-m-d H:m:s'), date ('Y-m-d H:m:s'));
		try {
			$this->dbGuest->insert();
			$this->dbGuest->getByIP($this->postFields['name'], $_SERVER['REMOTE_ADDR']);
		}
		catch (exception $e) {
			echo 'buggar';
		}
	}

	public function createBlogItem() {
		$this->blogItem = new DbBlog();
		$this->blogItem->init(0, $this->postFields['title'], $this->postFields['content'], '', $this->dbGuest->id, 0,  $this->dbGuest->name, '', 1, date ('Y-m-d H:m:s'), date ('Y-m-d H:m:s'));
		try {
			$this->blogItem->insert();
		}
		catch (exception $e) {
			echo 'kan blog niet toevoegen ' . $e;
		}
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
			$this->getSmartyTpl()->assign('name', $this->postFields['name']);
			$this->getSmartyTpl()->assign('mail', $this->postFields['mail']);
			$this->getSmartyTpl()->assign('title', $this->postFields['title']);
			$this->getSmartyTpl()->assign('content', $this->postFields['content']);
			$this->getSmartyTpl()->assign('errorMessage', $this->errorMessage);
		}
		return $valid;
	}
	
	public function getBlogItem($id) {
		$this->dbBlog = new DbBlog();
		$this->blogItems = $this->dbBlog->get($id);
		$this->tpl->assign('blogItem', $this->blogItems); 
	}
}
?>

