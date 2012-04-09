<?php
class Picture
{
	protected $bDone;
	protected $thumb = array(
			'width' => 145,
			'height' => 145
	);
	protected $picture = array(
			'width' => 350,
			'height' => 300
	);
	protected $type;

	protected $pic;
	protected $fileName;
	protected $fullFileName;
	protected $newFullFileName;
	protected $tmpFileName;
	protected $extention;
	protected $limitedext = array(
			'gif',
			'jpg',
			'png',
			'jpeg',
			'bmp'
	);
	protected $tmpFolder = '/imp/tmp';

	public function __construct($type, $fileName) {
		$this->type = $type;
		$this->fileName = $fileName;
		if (array_search($this->getPicExtention(), $this->limitedext)) {
			$this->extention = $this->getPicExtention();
			$this->fileName = $fileName . '.' . $this->extention;
			// save the pic in a temp folder
			$this->fullFileName = 'img/tmp/' . $fileName . '.' . $this->extention;
			if( ! move_uploaded_file($_FILES['img']['tmp_name'], $this->fullFileName)) {
			    echo "There was an error uploading the file, please try again!";
			}
			// resize
			$this->resizePicture($type);
		}
		else {
			echo 'not a valid file';
		}
		
	}

	private function resizePicture($type) {
		$width;
		$height;
		$store;
		$res = true;
		switch ($type) {
			case 'thumb' :
				$width = $this->thumb['width'];
				$height = $this->thumb['height'];
				$store = 'img/thumbs/';
				break;
			case 'picture' :
				$width = $this->picture['width'];
				$height = $this->picture['height'];
				$store = 'img/pictures/';
				break;
			default :
				$res = false;
				break;
		}
		if($res) {
			$this->doResize($width, $height, $store);
		}
	}
	
	private function getPicExtention() {
		$result =  substr($_FILES['img']['name'], stripos($_FILES['img']['name'], '.')+1);
		return $result ;
	}

	private function doResize($width, $height, $store) {
		list($tWidth, $tHeight) = getimagesize($this->fullFileName);
		$newPicture = imagecreatetruecolor($width, $height);

		switch ($this->extention) {
			case 'png' :
				$oldPicture = imagecreatefrompng($this->fullFileName);
				break;
			case 'gif' :
				$oldPicture = imagecreatefromgif($this->fullFileName);
				break;
			case 'bmp' :
				$oldPicture = imagecreatefromwbmp($this->fullFileName);
				break;
			case 'jpg' :
				$oldPicture = imagecreatefromjpeg($this->fullFileName);
				break;
			case 'jpeg' :
				$oldPicture = imagecreatefromjpeg($this->fullFileName);
				break;	
		}
		if (imagecopyresampled($newPicture, $oldPicture, 0, 0, 0, 0, $width, $height, $tWidth, $tHeight)) {
			$this->newFullFileName = $store . $this->fileName;
			if (imagepng($newPicture, $this->newFullFileName)) {
				$this->deleteOldPicture($this->fullFileName);
			}
			else {
				
			}
		} 
		else {
			
		}
	}
	
	private function deleteOldPicture($file) {
		if (file_exists($file)) {
			unlink($file);
		}
	}
	
	public function getFileName() {
		return $this->newFullFileName;
	}
	
}
?>