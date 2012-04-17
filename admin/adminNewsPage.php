<?php
global $_DIR;

include_once( $_DIR['admin'] . '/adminValidate.php');

class AdminNewsPage extends AdminPage
{
	protected $newsItems = array();
	protected $users = array();
	protected $categories = array();
	protected $errorMessage;
	protected $tempNewsItem;
	protected $valid;

	public function __construct($param) {
		global $_DIR;
		parent::__construct($param);
		$function = $this->param[2];
		$id = $this->param[3];
		$this->valid = new Validation();
		$this->tpl->assign('pBreak', $this->pBreak);

		switch ($function) {
			case 'new' :
				$this->getUsers();
				$this->getCategories();
				$this->tpl->assign('newItem', true);
				$this->setIncludeTemplate('admin/admin_newNewsItem.tpl');
				break;
			case 'add' :
				if ( ! $this->validateFields()) {
					$this->getUsers();
					$this->getCategories();
					$this->tpl->assign('edit', true);
					$this->tpl->assign('new', true);
					$this->tpl->assign('newsItems', $this->tempNewsItem);
					$this->setIncludeTemplate('admin/admin_newNewsItem.tpl');
				}
				else {
					$this->addNewsItem();
					header('Location: ' . $_DIR['webRoot'] . '/' . $_DIR['adminPage'] . '/news/');
				}
				break;
			case 'edit' :
				$this->tpl->assign('edit', true);
				$this->getUsers();
				$this->getCategories();
				$this->getNewsItem($id);
				$this->setIncludeTemplate('admin/admin_newNewsItem.tpl');
				break;
			case 'change' :
				if ( ! $this->validateFields()) {
					$this->getUsers();
					$this->getCategories();
					$this->tpl->assign('edit', true);
					$this->tpl->assign('new', true);
					$this->tpl->assign('newsItems', $this->tempNewsItem);
					$this->setIncludeTemplate('admin/admin_newNewsItem.tpl');
				}
				else {
					$this->editNewsItem($id);
					header('Location: ' . $_DIR['webRoot'] . '/' . $_DIR['adminPage'] . '/news/');
				}
				break;
			case 'delete' :
				$this->deleteNewsItem($id);
				header('Location: ' . $_DIR['webRoot'] . '/' . $_DIR['adminPage'] . '/news/');
				break;
			default :
				$this->getUsers();
				$this->getNewsItems();
				$this->setIncludeTemplate('admin/admin_NewsPage.tpl');
				break;
		}
		$this->tpl->assign('error', $this->errorMessage);
	}

	public function getNewsItems() {
		$this->dbNews = new DbNews();
		$this->newsItems = $this->dbNews->getAll();
		$this->tpl->assign('newsItems', $this->newsItems);
	}

	public function getNewsItem($id) {
		$this->dbNews = new DbNews();
		$this->newsItems = $this->dbNews->get($id);
		$this->tpl->assign('newsItem', $this->newsItems);
	}

	public function addNewsItem() {
		$this->dbNews = new DbNews();
		$title = $_POST['title'];
		$content = $_POST['body_text'];
		$user_id = $_POST['user_id'];
		$cat_id = $_POST['category_id'];
		$btext = $this->getBodyText($content);
		$mtext = $this->getMoreText($content);
		$this->dbNews->init(0, $title, $btext, $mtext, $user_id, $cat_id, '', '', date ("Y-m-d H:m:s"), date ("Y-m-d H:m:s"));
		try {
			$this->dbNews->insert();
		}
		catch(Exception $e) {
			echo 'shit';
		}
	}

	public function editNewsItem($id) {
		$this->dbNews = new DbNews();
		$title = $_POST['title'];
		$content = $_POST['body_text'];
		$user_id = $_POST['user_id'];
		$cat_id = $_POST['category_id'];
		$btext = $this->getBodyText($_POST['body_text']);
		$mtext = $this->getMoreText($_POST['body_text']);
		$this->dbNews->init($id, $title, $btext, $mtext, $user_id, $cat_id, '', '', date ("Y-m-d H:m:s"), date ("Y-m-d H:m:s"));
		try {
			$this->dbNews->update($id);
		}
		catch(Exception $e) {
			echo 'shit';
		}
	}

	public function deleteNewsItem($id) {
		$this->dbNews = new DbNews();
		try {
			$this->dbNews->delete($id);
		}
		catch(Exception $e) {
			echo 'shit';
		}
	}

	public function getUsers() {
		$this->dbUsers = new DbUser();
		$this->users = $this->dbUsers->getAll();
		$this->tpl->assign('users', $this->users);
	}

	public function getCategories() {
		$this->dbNewsCategories = new DbNewsCategory();
		$this->categories = $this->dbNewsCategories->getAll();
		$this->tpl->assign('cats', $this->categories);
	}

	public function getBodyText($content) {
		$contentEnd = strpos($content, $this->pBreak);
		if ($contentEnd) {
			$content = substr($content, 0, $contentEnd);
		}		
		$pStart = substr_count($content, '<p>');
		$pEnd = substr_count($content, '</p>');
		if ($pStart > $pEnd && $pEnd != 0) {
			$content = substr($content, 0, $contentEnd - 3);
		} elseif ($pStart > $pEnd && $pEnd == 0) {
			$content .= '</p>';
		}
		return $content;
	}

	public function getMoreText($content) {
		$contentStart = strpos($content, $this->pBreak);
		$content = substr($content, $contentStart + strlen($this->pBreak));
		$pStart = substr_count($content, '<p>');
		$pEnd = substr_count($content, '</p>');
		if ($pStart < $pEnd && $pStart != 0) {
			$content = substr($content, 4);
		} elseif ($pStart < $pEnd && $pStart == 0) {
			$content = '<p>' . $content;
		}
		return $content;
	}

	private function validateFields() {
		$valid   = true;
		$message = '';
		$text = $_POST['body_text'];
		
		$btext = $this->getBodyText($text);
		$mtext = $this->getMoreText($text);
		
		$this->tempNewsItem = array(
			'id'          => $_POST['id'], 
			'title'       => $_POST['title'],
			'body_text'   => $btext,
			'more_text'   => $mtext,
			'user_id'     => $_POST['user_id'],
			'category_id' => $_POST['category_id'],
			);		
			
		if( ! $this->valid->checkFilled($this->tempNewsItem['title'])) {
			$valid    = false;
			$message .= 'Er is geen titel ingegeven.<br />';
		}
		
		if( ! $this->valid->checkFilled($this->tempNewsItem['body_text'])) {
			$valid    = false;
			$message .= 'Er is geen bericht ingegeven.<br />';
		}
		
		$this->errorMessage = $message;
		return $valid;
	}
}
?>