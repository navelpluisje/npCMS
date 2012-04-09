<?php
include_once('page.php');
include_once('contentPage.php');
include_once('contactPage.php');
include_once('newsPage.php');
include_once('blogPage.php');
//include_once('../dbElements/dbPageType.php');

class CreatePage
{
	protected $pageTypeId;
	protected $pageType;
	protected $param;
	protected $page;
	protected $dbPageType;
	/**
	 * constructor of Page-class
	 * @param $type: string, type of page
	 * @param $param: array of parameters
	 */
	public function __construct($param) {
		$this->param      = $param;
		$this->pageTypeId = $this->param[1];
		$this->initPage();
	}
	
	/**
	 * 
	 */
	public function initPage() {
		$this->setPageType();
		$page = null;
		switch ($this->pageType) {
			case 'menu' :
				$page = new Page($this->param);
				break;
			case 'content' :
				$page = new ContentPage($this->param);
				break;
			case 'contact' :
				$page = new ContactPage($this->param);
				break;
			case 'news' :
				$page = new NewsPage($this->param);
				break;
			case 'blog' :
				$page = new BlogPage($this->param);
				break;
		}
		$page->showPage();
	}
	
	public function setPageType() {
		$this->dbPageType = new DbPageType();
		$result = $this->dbPageType->getPageType($this->pageTypeId);
		$this->pageType = $result['type'];
	}
}
?>