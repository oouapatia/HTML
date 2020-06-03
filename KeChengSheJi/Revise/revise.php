<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
   <title>修改</title>
</head>
<body>
    <?php
        $host ='127.0.0.1';
        $user ='root';
        $pwd ='';
        $dbname = 'photosite';

        $con=mysqli_connect($host, $user, $pwd, $dbname);
        if ($con->connect_errno!=0){
            die('数据库连接失败');
            exit;
        }
        mysqli_set_charset($con,"utf8");

        $username = $_POST["name"];
        $password = $_POST["password"];
        $newpassword = $_POST["newpassword"];
        $repassword = $_POST["repassword"];

        $dbusername = array();
        $dbpassword = array();
        $sql1 = "SELECT * FROM user";
        $result = mysqli_query($con,$sql1);
        while($row = mysqli_fetch_array($result))//while循环将$result中的结果找出来
        {
            $dbusername[] = $row['name'];
            $dbpassword[] = $row['pwd'];
        }
        $flag = 0;      //用户存在的标记
        $length = count($dbusername);
        for($i = 0;$i < $length;$i++){
            if($username != $dbusername[$i]){
                if($i == $length-1){
    ?>
                    <script type="text/javascript">
                        alert("用户名不存在");
                        document.location.href="revise.html";
                    </script>
    <?php
                }
            }else {
                $mima = $i; //对应用户的密码
                $flag = 1;
                break;
            }
        }

        if($flag){
            if($password != $dbpassword[$mima]){
    ?>
                <script type="text/javascript">
                  alert("原密码错误");
                  document.location.href="revise.html";
                </script>
    <?php
            }
            else {
                $up_sql = "UPDATE user SET pwd = '$newpassword' WHERE name = '$dbusername[$i]'";
                // var_dump($up_sql);
                $is = $con->query($up_sql);
                // var_dump($is);
                if($is == true){
    ?>
                    <script type="text/javascript">
                        alert("修改成功");
                        window.location.href="/KeChengSheJi/Login/login.html";
                    </script>
    <?php
                }
                else{
    ?>
                    <script type="text/javascript">
                        alert("修改失败");
                        window.location.href="/KeChengSheJi/Login/login.html";
                    </script>
    <?php
                }
            }
        }

    ?>
</body>
</html>