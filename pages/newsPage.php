<?php


class NewsPage extends Page
{
	protected $dbNews;
	protected $newsItems = array();
	
	public function __construct($param) {
		parent::__construct($param);
		$id = $this->param[2];
		if ($id > 0) {
			$this->setIncludeTemplate('newsItemPage.tpl');
			$this->getNewsItem($id);
		}
		else {
			$this->setIncludeTemplate('newsPage.tpl');
			$this->getNewsItems();
		}
	}
	
	public function getNewsItems() {
		$this->dbNews = new DbNews();
		$this->newsItems = $this->dbNews->getAll();
		$this->tpl->assign('newsItems', $this->newsItems); 
	}

	public function getNewsItem($id) {
		$this->dbNews = new DbNews();
		$this->newsItems = $this->dbNews->get($id);
		$this->tpl->assign('newsItems', $this->newsItems); 
	}
}
?>