<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>帖子界面</title>
</head>
<body>
  <?php
    require_once '../inc/common.php';  
    $db = mysqli_connect('127.0.0.1','root','root','blog');
    if (mysqli_connect_errno($db)){
      echo "连接 MySQL 失败: " . mysqli_connect_error();
      exit;
    }
    mysqli_query($db,"SET NAMES utf8");
    $id = $_GET['id'];
    $sql = 	"delete from posts where id = {$id};" ;
    if (!mysqli_query($db,$sql)) {
	      echo mysqli_error($db);
	      echo '<br>' .  $sql;
    }else{
	     redirect_to("../index1.php");
    };



    ?>