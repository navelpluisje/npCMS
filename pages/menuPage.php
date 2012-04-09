<?php


class MenuPage extends Page
{
	public function __construct($param) {
		parent::__construct($param);
		$this->tpl->setTemplate('menuPage.tpl');
		$this->setPageTypes();
		$this->tpl->assign('types');
	}
	
}
?>