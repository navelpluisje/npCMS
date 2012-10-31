<?php

class NewsPage extends Page
{
	protected $dbNews;
	protected $newsItems = array();
	
	public function __construct($param) {
		parent::__construct($param);
		if (count($param) > 1) {
			$id = $param[2];
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
		try {
			$this->newsItems = $this->dbNews->getAll();
			$this->getSmartyTpl()->assign('newsItems', $this->newsItems); 
			$this->getSmartyTpl()->assign('empty', false);
		} catch( Exception $e) {
			$this->getSmartyTpl()->assign('empty', true);
		}

	}

	public function getNewsItem($id) {
		$this->dbNews = new DbNews();
		$this->newsItems = $this->dbNews->get($id);
		$this->getSmartyTpl()->assign('newsItems', $this->newsItems); 
	}
}
?>