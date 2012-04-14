<?php


class ContentPage extends Page
{
	public function __construct($param) {
		parent::__construct($param);
		$this->setIncludeTemplate('contentPage.tpl');
		$this->setPageContent();
	}
	
	public function setPageContent() {
		$this->getSmartyTpl()->assign('contentBlock', $this->getPageInfo());
	}
}
?>