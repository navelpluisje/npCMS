<?php
include_once('/dbElements/dbLogin.php');
include_once('/dbElements/dbPage.php');
include_once('/dbElements/dbPageType.php');
include_once('/dbElements/dbNews.php');
include_once('/dbElements/dbBlog.php');
include_once('/dbElements/dbGuest.php');
include_once('/configs/clMySmarty.php');

class Page
{
	public $config;
	public $param;
	public $page;
	public $pageType;
	public $pageInfo = array();
	public $parentPage = array();
	public $parentId;
	public $pageTypes = array();
	public $includeTemplate;
	public $tpl;
	
	public function __construct($param) {
		$this->config = parse_ini_file('../configs/npCMSini.ini', true);
		$this->param = $param; 
		$id = $this->param[1];
		$this->setPageInfo($id);
		$this->setParentId();
		$this->tpl = new SmartyTemplate();
		$this->tpl->setTemplate('menuPage.tpl');
		$this->tpl->assign('pageBase', $config['SITE']['root']);
		$this->tpl->assign('pageId', $id);
		$this->getMenuItems();
		$this->setParentPage();
	}

	public function setPageInfo($id) {
		try {
			$this->page = new DbPage();
			$this->pageInfo = $this->page->get($id);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function setParentPage() {
		try {
			$this->parentPage = $this->page->get($this->parentId);
			$this->tpl->assign('parent', $this->parentPage);
		}
		catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getMenuItems(){
		$links = $this->page->getParents($this->parentId);
		$this->tpl->assign('links',$links);
		$currentPage = $this->pageInfo;
		$this->tpl->assign('cPage',$currentPage);
	}
	
	public function setIncludeTemplate($template) {
		$this->includeTemplate = $template;
		$this->tpl->assign('template', $this->includeTemplate);
	}
	
	public function setParentId() {
		$pageType = $this->pageInfo['type_id'];
		if($pageType == 1) {
			$this->parentId = $this->pageInfo['id'];
		}
		else {
			$parentId = $this->pageInfo['parent_id'];
			if( ! $parentId) {
				$parentId = $this->pageInfo['id'];
			}
			$this->parentId = $parentId;
		}
	}
	
	public function showPage() {
		$this->tpl->displayTemplate();
	}
}
?>