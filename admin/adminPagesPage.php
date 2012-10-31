<?php
/**
 * Class for creating, updating and deleting Pagepages
 * @author Erwin Goossen
 * 
 */
include_once('adminValidate.php');

class AdminPagesPage extends AdminPage
{
	protected $pageItems = array();
	protected $users = array();
	protected $pageTypes = array();
	protected $pageParents = array();
	protected $errorMessage;
	protected $tempPageItem;
	protected $valid;

	public function __construct($param) {
		parent::__construct($param);
		$function = ( isset( $this->param[2] ) ? $this->param[2] : '');
		$id       = ( isset( $this->param[3] ) ? $this->param[3] : '');

		$this->valid = new Validation();
		$this->tpl->assign('pBreak', $this->pBreak);

		switch ($function) {
			case 'new' :
				$this->getUsers();
				$this->getPageTypes();
				$this->getPageParents();
				$this->tpl->assign('new', true);
				$this->tpl->assign('edit', false);
				$this->tpl->assign('newItem', true);
				$this->setIncludeTemplate('admin/admin_newPageItem.tpl');
				break;
			case 'add' :
				if ( ! $this->validateFields()) {
					$this->getUsers();
					$this->getPageTypes();
					$this->getPageParents();
					$this->tpl->assign('edit', true);
					$this->tpl->assign('new', true);
					$this->tpl->assign('pageItem', $this->tempPageItem);
					$this->setIncludeTemplate('admin/admin_newPageItem.tpl');
				}
				else {
					$this->addPageItem();
					header('Location: http://localhost:8888/admin.php/pages/');
				}
				break;
			case 'edit' :
				$this->tpl->assign('edit', true);
				$this->tpl->assign('new', false);
				$this->getUsers();
				$this->getPageTypes();
				$this->getPageItem($id);
				$this->getPageParents();
				$this->setIncludeTemplate('admin/admin_newPageItem.tpl');
				break;
			case 'change' :
				if ( ! $this->validateFields()) {
					$this->getUsers();
					$this->getCategories();
					$this->tpl->assign('edit', true);
					$this->tpl->assign('new', true);
					$this->tpl->assign('pageItem', $this->tempNewsItem);
					$this->setIncludeTemplate('admin/admin_newPageItem.tpl');
				}
				else {
					$this->editPageItem($id);
					header('Location: http://localhost:8888/admin.php/pages/');
				}
				break;
			case 'delete' :
				$this->deleteNewsItem($id);
				header('Location: http://localhost:8888/admin.php/pages/');
				break;
			default :
				$this->getUsers();
				$this->getPageItems();
				$this->setIncludeTemplate('admin/admin_PagesPage.tpl');
				break;
		}
		$this->tpl->assign('error', $this->errorMessage);
	}

	/**
	 *  Fetch list with all the pages
	 *  Result will be assigned to template
	 */
	public function getPageItems() {
		$this->dbPage = new DbPage();
		$this->pageItems = $this->dbPage->getAll();
		$this->tpl->assign('pageItems', $this->pageItems);
	}

	/**
	 *  Fetch page with the given Id
	 *  @param $id Id of the page
	 *  Result will be assigned to the template
	 */
	public function getPageItem($id) {
		$this->dbPage = new DbPage();
		$this->pageItems = $this->dbPage->get($id);
		$this->tpl->assign('pageItem', $this->pageItems);
	}

	/**
	 *	Create a new page
	 */
	public function addPageItem() {
		$this->dbPage = new DbPage();
		$this->dbPage->init(0, 
							$this->tempNewsItem['name'], 
							$this->tempNewsItem['short_desc'], 
							$this->tempNewsItem['page_title'], 
							$this->tempNewsItem['body_text'], 
							$this->tempNewsItem['parent_id'],
							$this->tempNewsItem['type_id'],
							$this->tempNewsItem['user_id']);
		try {
			$this->dbPage->insert();
		}
		catch(Exception $e) {
			echo 'shit';
		}
	}

	/**
	 *	Update an existing page
	 *  @param $id The Id of the page 
	 */
	public function editPageItem($id) {
		$this->dbPage = new DbPage();
		$this->dbPage->init($this->tempNewsItem['id'],  
							$this->tempNewsItem['name'], 
							$this->tempNewsItem['short_desc'], 
							$this->tempNewsItem['page_title'], 
							$this->tempNewsItem['body_text'], 
							$this->tempNewsItem['parent_id'],
							$this->tempNewsItem['type_id'],
							$this->tempNewsItem['user_id']);
		try {
			$this->dbPage->update($id);
		}
		catch(Exception $e) {
			echo 'shit';
		}
	}

	/**
	 *  Delete a page
	 *  @param $id The Id of the page to delete
	 */
	public function deleteNewsItem($id) {
		$this->dbPage = new DbPage();
		try {
			$this->dbPage->delete($id);
		}
		catch(Exception $e) {
			echo 'shit';
		}
	}

	/**
	 *  Get a list of all the users
	 *  Result will be assigned to the template
	 */
	public function getUsers() {
		$this->dbUsers = new DbUser();
		$this->users = $this->dbUsers->getAll();
		$this->tpl->assign('users', $this->users);
	}

	/**
	 *  Get a list of all the pagetypes
	 *  Result will be assigned to the template
	 */
	public function getPageTypes() {
		$this->dbPageTypes = new DbPageType();
		$this->pageTypes = $this->dbPageTypes->getAll();
		$this->tpl->assign('types', $this->pageTypes);
	}

	/**
	 *  Get a list of all the pages with children
	 *  Result will be assigned to the template
	 */
	public function getPageParents() {
		$this->dbPageParents = new DbPage();
		$this->pageParents = $this->dbPageParents->getAllParents();
		$this->tpl->assign('pages', $this->pageParents);
	}

	/**
	 *  Check if all the fields are valid
	 *  @return boolean
	 */
	private function validateFields() {
		$valid   = true;
		$message = '';
		$text = $_POST['body_text'];
		$text = str_replace($this->pBreak, '', $text);
		
		$this->tempNewsItem = array(
			'id'         => $_POST['id'], 
			'name'       => $_POST['name'],
			'short_desc' => $_POST['short'],
			'page_title' => $_POST['title'],
			'body_text'  => $text,
			'parent_id'  => $_POST['parent'],
			'type_id'    => $_POST['type_id'],
			'user_id'    => $_POST['user_id'],
			);		
			
		if ( ! $this->valid->checkFilled($this->tempNewsItem['name'], 
										$this->tempNewsItem['short_desc'], 
										$this->tempNewsItem['page_title'], 
										$this->tempNewsItem['body_text'], 
										$this->tempNewsItem['type_id'], 
										$this->tempNewsItem['parent_id'])) {
			$valid    = false;
			$message .= 'Niet alle velden zijn ingevuld.<br />';
		}
		
		$this->errorMessage = $message;
		return $valid;
	}
}
?>