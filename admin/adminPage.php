<?php
/**
 *  Class for creating a admin page
 *  @author Erwin Goossen
 *  
 */

include_once( $_DIR['dbElements'] . '/dbBlog.php');
include_once( $_DIR['dbElements'] . '/dbNews.php');
include_once( $_DIR['dbElements'] . '/dbUser.php');
include_once( $_DIR['dbElements'] . '/dbPage.php');
include_once( $_DIR['dbElements'] . '/dbPageType.php');
include_once( $_DIR['dbElements'] . '/dbGuest.php');
include_once( $_DIR['dbElements'] . '/dbNewsCategory.php');
include_once( $_DIR['admin']      . '/adminPictures.php');
include_once( $_DIR['configs']     . '/clMySmarty.php');


class AdminPage
{
	protected $pBreak = '<!-- pagebreak -->';
	protected $dbNews;
	protected $dbUsers;
	protected $dbNewsCategories;
	
	public $param;
	public $includeTemplate;
	public $tpl;
	
	/**
	 * Constructor
	 * @param string $param Parameter given with the url
	 */
	public function __construct($param) {
		$this->param = $param; 
		$this->tpl = new SmartyTemplate();
		$this->tpl->setTemplate('admin/admin_index.tpl');
		$this->tpl->assign('menu', true);
		$this->tpl->assign('login', false);
		$this->tpl->assign('sessionUser', $_SESSION['user']);
	}
	
	/**
	 *	Set the template to use withe the page
	 *  @param string $template Name of the template
	 */
	public function setIncludeTemplate($template) {
		$this->includeTemplate = $template;
		$this->tpl->assign('template', $this->includeTemplate);
	}
	
	/**
	 *  Function for showing the page
	 *
	 */
	public function showPage() {
		$this->tpl->displayTemplate();
	}
}
?>