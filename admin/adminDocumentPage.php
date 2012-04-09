<?php
class AdminDocumentPage extends AdminPage
{
	protected $documents = array();
	
	public function __construct($param) {
		parent::__construct($param);
		$function = $this->param[2];
		$id       = $this->param[3];
		switch ($function) {
			case 'new' :
				$this->setIncludeTemplate('admin/admin_newUser.tpl');
				break;
			case 'add' :
				$this->addUser();
				header('Location: http://localhost:8888/admin.php/users/');
				break;
			case 'edit' :
				$this->tpl->assign('edit', true);
				$this->setIncludeTemplate('admin/admin_newUser.tpl');
				$this->getUser($id);				
				break;
			case 'change' :
				$this->editUser($id);
				header('Location: http://localhost:8888/admin.php/users/');
				break;
			case 'delete' :
				$this->deleteUser($id);
				header('Location: http://localhost:8888/admin.php/users/');
				break;
			default :
				$this->setIncludeTemplate('admin/admin_docPage.tpl');
				$this->getDocuments();
				break;	
		}
	}
	
	public function getDocuments() {
		$document = array();
		if ($handle = opendir('docs')) {
			  /* This is the correct way to loop over the directory. */
		    while (false !== ($file = readdir($handle))) {
		        $this->documents[] = $file;
		    }
		    closedir($handle);
		}
		$this->tpl->assign('docs', $this->documents); 
	}

	public function getUser($id) {
		$this->dbUser = new Dbuser();
		$this->users = $this->dbUser->get($id);
		$this->tpl->assign('user', $this->users); 
	}

	public function addUser() {
		$this->dbUser = new DbUser();
		$scr_name  = $_POST['scr_name'];
		$password  = $_POST['password'];
		$f_name    = $_POST['f_name'];
		$l_name    = $_POST['l_name'];
		$user_type = $_POST['user_type'];
		$active    = $_POST['active'];
		$this->dbUser->init(0, $scr_name, $password, $f_name, $l_name, $user_type, '', $active);
		try {
			$this->dbUser->insert();
		}
		catch(Exception $e) {
			echo 'shit';
		}
	}

	public function editUser($id) {
		$this->dbUser = new DbUser();
		$scr_name  = $_POST['scr_name'];
		$password  = $_POST['password'];
		$f_name    = $_POST['f_name'];
		$l_name    = $_POST['l_name'];
		$user_type = $_POST['user_type'];
		$active    = $_POST['active'];
		$this->dbUser->init(0, $scr_name, $password, $f_name, $l_name, $user_type, '', $active);
		try {
			$this->dbUser->update($id);
		}
		catch(Exception $e) {
			echo 'shit';
		}
	}
	
	public function deleteUser($id) {
		$this->dbUser = new DbUser();
		try {
			$this->dbUser->delete($id);
		}
		catch(Exception $e) {
			echo 'shit';
		}
	}
}
?>