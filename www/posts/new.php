<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新闻</title>
</head>
<body>
<h1>新闻标题</h1>

<img src="" alt="">
<form action="save.php" method="post" enctype="multipart/form-data">
	<label for="title">标题</label>
	<input type="text" name="title" value="" />
	<br/>
	<label for="pic">图片</label>
	<input type="file" name="pic" >
	<br/>
	<label for="body">内容</label>
	<textarea name="body"></textarea>
	<br/>
	<input type="submit" value="提交" />
</form>
</body>
</html>