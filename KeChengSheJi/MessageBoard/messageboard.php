<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title>留言板</title>
    <link href="messageboard.css" rel="stylesheet" type="text/css" />
</head>

<?php
        $host ='127.0.0.1';
        $user ='root';
        $pwd ='';
        $dbname = 'photosite';

        $con=mysqli_connect($host, $user, $pwd, $dbname);
        if ($con->connect_errno!=0){
            die('数据库链接失败');
            exit;
        }
        mysqli_set_charset($con,"utf8");

        $sql = "SELECT * FROM messageboard ORDER BY id DESC";
        $result=mysqli_query($con,$sql);
        if($result==false){
            echo "sql错误";
            exit;
        }
        $rows=array();
        while($row=mysqli_fetch_array($result)){
                $rows[]=$row;
        }


?>

<body>
    <div class='update'>
        <form method="post"  action="save.php">
            <div class="title">
                留&nbsp;&nbsp;言&nbsp;&nbsp;板
            </div>
            <br><br>
            <div class='add'>
                <span class="nr">请输入留言内容:</span>
                <br><br><span><textarea name="content" class="content" value="" rows="13" cols="80"></textarea></span><br>
                <span class="ren">留言昵称:</span><br><input type="text" name="name" class="name" value="">
                <input type="submit" class="btn" value="点击发表">
            </div>
        </form>
        <br>

        <botton type="botton"><a href="/KeChengSheJi/home.html">返回</a></botton>

    <?php
        foreach ($rows as $row) {
    ?>

        <div class='msg'>
            <div class='info'>
                <span class='user'><?php echo $row['name'];?></span>
                <span class='time'><?php echo date('Y-m-d H:i:s',$row['intime']);?></span>
            </div>
            <div class='content'>
                <span>&nbsp;&nbsp;<?php echo $row['content'];?></span>
            </div>
        </div>
    <?php
       }
    ?>
    </div>
</body>
</html>