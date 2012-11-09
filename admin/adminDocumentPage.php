<?php
class AdminDocumentPage extends AdminPage
{
	public function __construct($param) {
		parent::__construct($param);
		$this->setIncludeTemplate('admin/admin_docPage.tpl');
	}
}
?>