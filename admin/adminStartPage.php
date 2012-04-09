<?php


class AdminStartPage extends AdminPage
{
	public function __construct($param) {
		parent::__construct($param);
		$this->setIncludeTemplate('admin/admin_startPage.tpl');
	}
}
?>