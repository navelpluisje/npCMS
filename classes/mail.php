<?php
/**
 * 
 */
class SendMail {
	protected $sender;
	protected $senderName;
	protected $receiver;
	protected $subject;
	protected $content;
	protected $html;
	protected $header;
	
	public function __construct($sender, $senderName, $receiver, $subject, $content, $html) {
		$this->sender       = $sender;
		$this->senderName   = $senderName;
		$this->receiver     = $receiver;
		$this->subject      = $subject;
		$this->content      = $content;
		$this->html         = $html;
		
		$this->createHeader($this->html);
		if ($this->html) {
			$this->createHtmlContent();
		}
		else {
			$this->createContent();
		}
	}
	
	public function createHeader($html) {
		$this->header  = 'To: ' . $this->receiver . chr(13) . chr(10);
		$this->header .= 'From: ' . $this->senderName . ' <' . $this->sender . '> '. chr(13) . chr(10);
		if ($html) {
			$this->header .= 'MIME-Version: 1.0
			                 Content-type: text/html; charset=iso-8859-1';			
		}
	}
	
	public function createHtmlContent() {
//		$this->content = '<html><head><title>' . $this->subject . '</title></head>
//		                  <body style="font-family:Arial;font-size:13px;color:#333333;">
//		                  <h3>' . $this->subject . '</h3>
//		                  <div>' . $this->content . '</div>
//		                  </body>';
	}
	
	public function createContent() {
		$origMessage = $this->content;
		$this->content  = '---------------------------------------------------------------' . "\n";
		$this->content .= '**  Mail verstuurd via contactformulier                        ' . "\n";
		$this->content .= '---------------------------------------------------------------' . "\n";
		$this->content .= 'naam: ' . $this->senderName                                      . "\n";
		$this->content .= 'mail: ' . $this->sender                                          . "\n";
		$this->content .= 'datum: ' . date('l d-m-Y')                                       . "\n";
		$this->content .= 'onderwerp: ' . $this->subject                                    . "\n";   
		$this->content .= '---------------------------------------------------------------' . "\n";
		$this->content .= $origMessage                                                      . "\n";
		$this->content .= '---------------------------------------------------------------' . "\n";
	}
	
	public function spamBot($val) {
		$result = $val;
	    $result = stripslashes($result);
	    $result = str_replace("\n", "", $result); // Verwijder \n 
	    $result = str_replace('\r', '', $result); // Verwijder \r 
	    $result = str_replace('\"', '\\\"', str_replace('\\', '\\\\', $result)); // Slashes van quotes 
		return $result;
	}
	
	public function sendMail() {
 		if ( ! mail($this->receiver, $this->spamBot($this->subject), $this->content, $this->header)) {
			throw new Exception("De mail is niet correct verstuurd", 99001);
			;
		}
	}
}

?>