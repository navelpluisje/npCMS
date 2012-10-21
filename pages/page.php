<?php
global $_DIR;
include_once( $_DIR['dbElements'] . '/dbPage.php');
include_once( $_DIR['dbElements'] . '/dbPageType.php');
include_once( $_DIR['dbElements'] . '/dbNews.php');
include_once( $_DIR['dbElements'] . '/dbBlog.php');
include_once( $_DIR['dbElements'] . '/dbGuest.php');
include_once( $_DIR['configs']    . '/clMySmarty.php');

class Page
{
	private $param;
	private $page;
	private $pageType;
	private $pageInfo = array();
	private $parentPage = array();
	private $parentId;
	private $pageTypes = array();
	private $includeTemplate;
	private $tpl;
	
	public function __construct($param) {
		$this->param = $param;
		$id = $this->param[1];
		$this->setPageInfo($id);
		$this->setParentId();
		$this->tpl = new SmartyTemplate();
		$this->tpl->setTemplate('menuPage.tpl');
		$this->tpl->assign('pageId', $id);
		$this->getMenuItems();
		$this->setParentPage();
	}

	private function setPageInfo($id) {
		try {
			$this->page = new DbPage();
			$this->pageInfo = $this->page->get($id);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	
	private function setParentPage() {
		try {
			$this->parentPage = $this->page->get($this->parentId);
			$this->tpl->assign('parent', $this->parentPage);
		}
		catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	
	private function getMenuItems(){
		$links = $this->page->getParents($this->parentId);
		$this->tpl->assign('links',$links);
		$currentPage = $this->pageInfo;
		$this->tpl->assign('cPage',$currentPage);
	}
	
	public function getPageInfo() {
		return $this->pageInfo;
	}
	
	public function getSmartyTpl() {
		return $this->tpl;
	}
	
	public function setIncludeTemplate($template) {
		$this->includeTemplate = $template;
		$this->tpl->assign('template', $this->includeTemplate);
	}
	
	private function setParentId() {
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
		echo 'test';
	}
}
?>