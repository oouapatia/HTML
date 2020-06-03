<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
    <?php
        $host ='127.0.0.1';
        $user ='root';
        $pwd ='';
        $dbname = 'photosite';

        $con = mysqli_connect($host, $user, $pwd, $dbname);
        if ($con->connect_errno!=0)
            die('数据库链接失败');
        mysqli_set_charset($con,"utf8");

        $name = $_POST["name"];
        $content = $_POST["content"];

        $time = time();
        if ($content == '') {
    ?>
            <script type="text/javascript">
                alert("留言内容不能为空");
                window.location.href="adminmessageboard.php";
            </script>
    <?php
        }
        if($name == ''){
    ?>
            <script type="text/javascript">
                alert("留言昵称不能为空");
                window.location.href="adminmessageboard.php";
            </script>
    <?php
        }
        if ($name != '' && $content != '') {
            $sql2 = "INSERT INTO messageboard (name,content,intime) VALUES  ('{$name}','{$content}','{$time}')";
            $is = $con->query($sql2);
            if($is == true){
    ?>
            <script type="text/javascript">
                alert("留言成功");
                window.location.href="adminmessageboard.php";
            </script>
    <?php
            }
            else{
    ?>
                <script type="text/javascript">
                    alert("留言失败");
                    window.location.href="adminmessageboard.php";
                </script>
    <?php
            }
        }
    ?>
</body>
</html>

