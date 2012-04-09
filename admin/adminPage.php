<?php
include_once('../dbElements/dbLogin.php');
include_once('../dbElements/dbBlog.php');
include_once('../dbElements/dbNews.php');
include_once('../dbElements/dbUser.php');
include_once('../dbElements/dbPage.php');
include_once('../dbElements/dbPageType.php');
include_once('../dbElements/dbGuest.php');
include_once('../dbElements/dbNewsCategory.php');
include_once('../admin/adminPictures.php');
include_once('../configs/clMySmarty.php');


class AdminPage
{
	protected $pBreak = '<!-- pagebreak -->';
	protected $dbNews;
	protected $dbUsers;
	protected $dbNewsCategories;
	
	public $param;
	public $includeTemplate;
	public $tpl;
	
	public function __construct($param) {
		$this->param = $param; 
		$this->tpl = new SmartyTemplate();
		$this->tpl->setTemplate('admin/admin_index.tpl');
		$this->tpl->assign('menu', true);
		$this->tpl->assign('login', false);
		$this->tpl->assign('sessionUser', $_SESSION['user']);
	}
	
	public function setIncludeTemplate($template) {
		$this->includeTemplate = $template;
		$this->tpl->assign('template', $this->includeTemplate);
	}
	
	public function showPage() {
		$this->tpl->displayTemplate();
	}
}
?>