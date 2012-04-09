<?php
include_once('../admin/adminValidate.php');
include_once('../classes/mail.php');

class ContactPage extends Page
{
	protected $validate;
	protected $email;
	
	public function __construct($param) {
		parent::__construct($param);
		$this->setIncludeTemplate('contactPage.tpl');
		$this->validate = new Validation();
		
		if (isset($_POST['submit'])) {
			if ($this->createMail()) {
				$this->tpl->assign('send', true);
			}	
		}
	}
	
	public function createMail() {
		$done    = true;
		$name    = $_POST['name'];
		$mail    = $_POST['mail'];
		$subject = $_POST['subject'];
		$content = $_POST['content'];
		$receiver = $this->config['EMAIL']['contact'];
		$error   = '';
		
		if (empty($name) || empty($mail) || empty($subject) || empty($content)) {
			$error .= 'Niet alle velden zijn ingevuld.</br>';
		}
	
		if ( ! $this->validate->checkEmail($mail)) {
			$error .= 'Het opgegeven emailadres is niet geldig.</br>';
		}

		if (strlen($error) > 0) {
			$this->tpl->assign('name', $name);
			$this->tpl->assign('mail', $mail);
			$this->tpl->assign('subject', $subject);
			$this->tpl->assign('content', $content);
			$this->tpl->assign('errorMessage', $error);
			$done = false;
		}
		else {
			// mail aanmaken en versturen
			$this->email = new SendMail($mail, $name, $receiver, $subject, $content, false);
			try {
				$this->email->sendMail();
			}
			catch (exception $e) {
				echo $e->getMessage();
			}
		}
		return $done;
	}
}
?>