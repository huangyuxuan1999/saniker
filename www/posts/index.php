<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/assets/css/Homepage.css" />
  <title>浙江绿城-最新资讯</title>
</head>
    <div class="guiding_bar"><ul>
                           <li> <a href="http://127.0.0.1/posts/">首页</a></li> 
                           <li> <a href="https://www.dongqiudi.com/team/50000341.html">比赛</a></li>
                           <li><a href="http://127.0.0.1/register/登入页面.html">管理 </a></li>
 </ul></div>
<body>
<?php        
    $servername = "127.0.0.1";
    $username = "root";
    $password = "root";
    $base="blog";
    $db = mysqli_connect($servername,$username,$password,$base);
    $sql = 'SELECT * FROM posts';
    $query = mysqli_query($db,$sql);
  ?>

<body>  

    <div id="sb">
                        <style>
                                #sb{
                                        margin: 90px 0px 0px 475px
                                }
                        </style>
    <div class="search_bar">

   

<body>
<?php
    $query = $db->query('select count(*) as amount from posts;');
    $row_amount = $query->fetch_Object()->amount;

    $page_size = 3;
    $page_amount = ceil($row_amount / $page_size);

    $page_current = empty($_GET['page']) ? 1 : $_GET['page'];
    if ($page_current < 1) $page_current = 1;
    if ($page_current > $page_amount) $page_current = $page_amount;

    if($page_current <= 1 )
        $page_previous = 1 ;
    else
        $page_previous = $page_current - 1;
    if($page_current >= $page_amount )
        $page_next = $page_amount ;
    else
        $page_next = $page_current + 1 ;
    
    $params = $_GET;
    $params['page'] = 1;
    $page_first_q =  http_build_query($params);
    $params['page'] = $page_previous;
    $page_previous_q =  http_build_query($params);
    $params['page'] = $page_next;
    $page_next_q =  http_build_query($params);
    $params['page'] = $page_amount;
    $page_last_q =  http_build_query($params);

    $row_base= ($page_current-1) * $page_size;
    $page_sql = "LIMIT {$page_size} OFFSET {$row_base}";
    $sql =  "select * from posts  $page_sql";
    $query  = $db->query($sql);
?>
<!doctype html>

 <?php
  while ( $post = mysqli_fetch_object($query)) {
      ?>
            <ul>
                <li><a href="./show.php?id=<?php print $post->id; ?>"><?php echo $post->title; ?></a>  
            </li><br>
            </ul>
            <?php } ?>
 <div id="pager"> 
    <a href="?<?php echo $page_first_q ?> ">首页</a>
    <a href="?<?php echo $page_previous_q ?>">上一页</a>
    <a href="?<?php echo $page_next_q ?>">下一页</a>    
    <a href="?<?php echo $page_last_q ?>">末页</a>  
    <span>当前第 <?php echo $page_current ?>  页</span>
    <span>总共 <?php echo $page_amount ?> 页</span> 
</div>  
</body>
</html>
