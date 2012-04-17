<?php
global $_DIR;

include_once( $_DIR['admin'] . '/adminPage.php');
include_once( $_DIR['admin'] . '/adminNewsPage.php');
include_once( $_DIR['admin'] . '/adminBlogPage.php');
include_once( $_DIR['admin'] . '/adminUserPage.php');
include_once( $_DIR['admin'] . '/adminPagesPage.php');
include_once( $_DIR['admin'] . '/adminDocumentPage.php');
include_once( $_DIR['admin'] . '/adminStartPage.php');

class CreateAdminPage
{
	public $pageType;
	public $param;
	public $page;
	public $dbPageType;
	/**
	 * constructor of Page-class
	 * @param $type: string, type of page
	 * @param $param: array of parameters
	 */
	public function __construct($param) {
		$this->param = $param;
		$this->pageType = $this->param[1];
		$this->initPage();
	}

	/**
	 *
	 */
	public function initPage() {
		$page = null;
		switch ($this->pageType) {
			case 'users' :
				$page = new AdminUserPage($this->param);
				break;
			case 'news' :
				$page = new AdminNewsPage($this->param);
				break;
			case 'blogs' :
				$page = new AdminBlogPage($this->param);
				break;
			case 'pages' :
				$page = new AdminPagesPage($this->param);
				break;
			case 'docs' :
				$page = new AdminDocumentPage($this->param);
				break;
				// case 'pics' :
				// $page = new AdminPicsPage($this->param);
				// break;
			default :
				$page = new AdminStartPage($this->param);
				break;
		}
		$page->showPage();
	}

}
?>