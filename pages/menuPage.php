<?php


class MenuPage extends Page
{
	public function __construct($param) {
		parent::__construct($param);
		$this->getSmartyTpl()->setTemplate('menuPage.tpl');
		$this->setPageTypes();
		$this->getSmartyTpl()->assign('types');
	}
	
}
?>