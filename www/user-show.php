<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新闻内容</title>
</head>
<body>
  <?php        
    require_once './inc/db.php';    
    $query = $db->prepare('select * from posts where id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();    
  ?>

  <h1><?php echo $post->id; ?> : <?php echo $post->title; ?>  </h1>
  <p><?php echo $post->body; ?></p>
  <?php
    $query = $db->query('select * from comment where post_id = ' . $_GET['id']);
    while ( $comment =  $query->fetchObject() ) {
      ?>
            <div>
            <h4><?php echo $comment->title; ?></h4>
            <p><?php echo $comment->body; ?></p> 
            </div>           
        
 
    <?php  } ?>
    <b> 评论</b>
  <form action="./comment/save.php" method="post">
    <input type="hidden" name='post_id' value='<?php echo $_GET['id']; ?>'/>
    <label for="title">title</label>
    <input type="text" name="title" value="" />
    <br/>
    <label for="body">body</label>
    <textarea name="body"></textarea>
    <br/>
    <input type="submit" value="提交" />
  </form>
  </body>
</html>