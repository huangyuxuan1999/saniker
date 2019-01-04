<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新闻</title>
</head>
<body>
  <?php        
         
         require_once '../inc/db.php';    
         $query = $db->prepare('select * from posts where id = :id');
         $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
         $query->execute();
         $post = $query->fetchObject();   

  ?>

  <h1><?php echo $post->id; ?> : <?php echo $post->title; ?>  </h1>
  <p><?php echo $post->body; ?></p>
  <img src="../<?php echo $post->pic; ?>" height="600px" width="900px"> 


<ol>
           评论区
<?php
    $query = $db->query('select * from comment where post_id = ' . $_GET['id']);
    while ( $comment =  $query->fetchObject() ) {
      ?>
          <li>
            <h4><?php echo $comment->title; ?></h4>
            <p><?php echo $comment->body; ?></p>           
          </li> 
 
    <?php  } ?>

  评论
  <form action="../comment/save.php" method="post">
    <input type="hidden" name='post_id' value='<?php echo $post->id; ?>'/>
    <label for="title">标题</label>
    <input type="text" name="title" value="" />
    <br/>
    <label for="body">内容</label>
    <textarea name="body"></textarea>
    <br/>
    <input type="submit" value="提交" />
  </form>

</body>
</html>