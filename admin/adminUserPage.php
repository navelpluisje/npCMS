<?php
global $_DIR;

include_once( $_DIR['admin'] . '/adminValidate.php');

class AdminUserPage extends AdminPage
{
	protected $users = array();
	protected $userPic;
	protected $thumb;
	protected $errorMessage;
	protected $tempUser;
	protected $valid;
	var $Upload;
	
	public function __construct($param) {
		global $_DIR;
		parent::__construct($param);
		$this->valid = new Validation();
		$function = $this->param[2];
		$id       = $this->param[3];
		switch ($function) {
			case 'new' :
				$this->setIncludeTemplate('admin/admin_newUser.tpl');
				break;
			case 'add' :
				if ( ! $this->validateFields()) {
					$this->tpl->assign('edit', true);
					$this->tpl->assign('new', true);
					$this->tpl->assign('user', $this->tempUser);
					$this->setIncludeTemplate('admin/admin_newUser.tpl');
				}
				else {
					$this->addUser();
					header('Location: ' . $_DIR['webRoot'] . '/' . $_DIR['adminPage'] . '/users/');
				}
				break;
			case 'edit' :
				$this->tpl->assign('edit', true);
				$this->setIncludeTemplate('admin/admin_newUser.tpl');
				$this->getUser($id);				
				break;
			case 'change' :
				if ( ! $this->validateFields()) {
					$this->tpl->assign('edit', true);
					$this->tpl->assign('user', $this->tempUser);
					$this->setIncludeTemplate('admin/admin_newUser.tpl');
				}
				else {
					$this->editUser($id);
					header('Location: ' . $_DIR['webRoot'] . '/' . $_DIR['adminPage'] . '/users/');
				}
				break;
			case 'delete' :
				$this->deleteUser($id);
				header('Location: ' . $_DIR['webRoot'] . '/' . $_DIR['adminPage'] . '/users/');
				break;
			default :
				$this->setIncludeTemplate('admin/admin_userPage.tpl');
				$this->getUsers();
				break;	
		}
		$this->tpl->assign('error', $this->errorMessage);
	}
	
	public function getUsers() {
		$this->dbUsers = new DbUser();
		$this->users = $this->dbUsers->getAll();
		$this->tpl->assign('users', $this->users); 
	}

	public function getUser($id) {
		$this->dbUser = new Dbuser();
		$this->users = $this->dbUser->get($id);
		$this->tpl->assign('user', $this->users); 
	}

	public function addUser() {
		if (! $_FILES['img']['error']) {
			$this->createPicture();
			$this->tempUser['picture'] = $this->thumb;
		}
		$cleanpw = crypt(md5($this->tempUser['password']),md5($this->tempUser['first_name']));
		$this->dbUser = new DbUser();
		$this->dbUser->init(0,
							$this->tempUser['screen_name'],
							$cleanpw,
							$this->tempUser['first_name'],
							$this->tempUser['last_name'],
							$this->tempUser['email'],
							$this->tempUser['user_type'],
							$this->tempUser['picture'],
							$this->tempUser['active'],
							date ("Y-m-d H:m:s"),
							date ("Y-m-d H:m:s")
							);
		try {
			$this->dbUser->insert();
		}
		catch(Exception $e) {
			echo 'shit';
		}
	}

	public function editUser($id) {
		if (! $_FILES['img']['error']) {
			$this->createPicture();
			$this->tempUser['picture'] = $this->thumb;
		}
		$cleanpw = crypt(md5($this->tempUser['password']),md5($this->tempUser['first_name']));
		$this->dbUser = new DbUser();
		$this->dbUser->init($this->tempUser['id'],
							$this->tempUser['screen_name'],
							$cleanpw,
							$this->tempUser['first_name'],
							$this->tempUser['last_name'],
							$this->tempUser['email'],
							$this->tempUser['user_type'],
							$this->tempUser['picture'],
							$this->tempUser['active'],
							date ("Y-m-d H:m:s"),
							date ("Y-m-d H:m:s")
							);
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
	
	private function createPicture() {
		if ($_FILES['img']['error'] > 0) {
			echo 'Error: ' . $_FILES['img']['error'] . '<br />';
		}
		else {
			$picture = new Picture('thumb', $_POST['scr_name']);
			$this->thumb = '/' . $picture->getFileName();
		 }	
	}
	
	private function validateFields() {
		$valid   = true;
		$message = '';
		$this->tempUser = array(
			'id'          => $_POST['id'], 
			'screen_name' => $_POST['scr_name'],
			'password'    => $_POST['password'],
			'password2'   => $_POST['password2'],
			'first_name'  => $_POST['f_name'],
			'last_name'   => $_POST['l_name'],
			'email'       => $_POST['email'],
			'picture'     => $_POST['picture'],
			'user_type'   => 1,
			'active'      => $_POST['active']
			);		
		
		if ( ! $this->valid->compareValues($this->tempUser['password'], $this->tempUser['password2'])) {
			$valid    = false;
			$message .= 'Wachtwoorden niet juist.<br />'; 
		}
		
		if ( ! $this->valid->checkEmail($this->tempUser['email'])) {
			$valid    = false;
			$message .= 'Email niet correct ingegeven.<br />';
		}
		
		if( ! $this->valid->checkFilled($this->tempUser['screen_name'], $this->tempUser['first_name'], $this->tempUser['last_name'])) {
			$valid    = false;
			$message .= 'Niet alle velden zijn ingevuld.<br />';
		}
		
		$this->errorMessage = $message;
		return $valid;
	}
}
?>