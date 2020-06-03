<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>管理员注册</title>
</head>
<body>
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

      $username=$_POST["name"];
      $password=$_POST["password"];

      $dbusername=array();
      $sql1="SELECT * FROM administrator";
      $result=mysqli_query($con,$sql1);
      while($row=mysqli_fetch_array($result))//while循环将$result中的结果找出来
      {
            $dbusername[]=$row['name'];
      }
      $flag=0;          //判断用户名是否被注册
      $length=count($dbusername);
      for($i=0;$i<$length;$i++)
      {
          if($username==$dbusername[$i])
          {
  ?>
              <script type="text/javascript">
                alert("此用户名已被注册");
                window.location.href="adminregister.html";
              </script>
  <?php
              $flag=1;
          }
      }
      if(!$flag)
      {
        $sql2="INSERT INTO administrator(name,pwd) VALUES ('$username','$password')";
        $is=$con->query($sql2);
        if($is == true){
  ?>
          <script type="text/javascript">
            alert("注册成功");
            window.location.href="/KeChengSheJi/Administrator/adminlogin.html";
          </script>
  <?php
        }
        else{
  ?>
              <script type="text/javascript">
                alert("注册失败");
                window.location.href="adminregister.html";
              </script>
  <?php
        }
      }
  ?>
</body>
</html>