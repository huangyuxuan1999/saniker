<?php

require_once $_SERVER['DOCUMENT_ROOT'].'../inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'../inc/common.php';

var_export($_FILES);
$dest_path = "/upload/post-" . rand() . ".jpg";
$dest = $_SERVER["DOCUMENT_ROOT"] . $dest_path;
var_export($dest);
move_uploaded_file($_FILES["pic"]["tmp_name"],$dest);

$sql = "insert into posts(title, body,pic) values(:title, :body,:pic);" ;	
$query = $db->prepare($sql);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':pic',$dest_path,PDO::PARAM_STR);

if(!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("/");
};

?>