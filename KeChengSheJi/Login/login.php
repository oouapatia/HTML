<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>登录</title>
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

      $username = $_POST["name"];     //获取html中的用户名
      $password = $_POST["password"]; //获取html中的密码

      $dbusername = array();
      $dbpassword = array();
      $sql = "SELECT * FROM user";
      $result = mysqli_query($con,$sql);
      while($row = mysqli_fetch_array($result)){ // while循环提取$result中的结果
            $dbusername[] = $row['name'];
            $dbpassword[] = $row['pwd'];
      }

      $length = count($dbusername);
      for($i = 0;$i < $length;$i++){
        if($username == $dbusername[$i]){
          if($password == $dbpassword[$i]){
    ?>
            <script type="text/javascript">
              alert("登陆成功");
              document.location.href="/KeChengSheJi/home.html";
            </script>
    <?php
          }
        }
      }

      $flag = 0;      //用户存在的标记
      for($i = 0;$i<$length;$i++){
          if($username != $dbusername[$i]){
            if($i == $length-1){
    ?>
              <script type="text/javascript">
                alert("用户名不存在");
                document.location.href = "login.html";
              </script>
    <?php
            }
          }
          else {
            $mima = $i; //对应用户的密码
            $flag = 1;
            break;
          }
      }

      if($flag){
        if($password != $dbpassword[$mima]){
    ?>
            <script type="text/javascript">
              alert("密码错误");
              document.location.href = "login.html";
            </script>
    <?php
        }
      }
    ?>
</body>
</html>
