<?php
include_once('/admin/adminPictures.php');
include_once('/admin/adminDocuments.php');

if($_POST['type'] == 'picture') {
	$picType = $_POST['picType'];
	$tmpFile = $_FILES['fileToUpload']['tmp_name'];
	$fileName = $_FILES['fileToUpload']['name'];
	$json['file'] = $fileNAme;
	$foto = new Picture($picType, $tmpFile, $fileName);
}
elseif ($_POST['type'] == 'document') {
	$json['error'] = 'Not jet implemented';
}

if ($foto_upload->upload()) {
	$foto_upload->process_image(false, true, true, 80);
	$json['img'] = $foto_upload->file_copy;
} 

$json['error'] = strip_tags($foto_upload->show_error_string());
echo json_encode($json);
?>