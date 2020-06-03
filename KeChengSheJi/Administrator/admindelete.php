<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
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

        $sql = "SELECT * FROM messageboard";
        $result=mysqli_query($con,$sql);
        if($result==false){
            echo "sql错误";
            exit;
        }

        $name=$_POST["user"];
        if($name==''){
    ?>
            <script type="text/javascript">
                alert("输入想要删除的留言的留言昵称");
                window.location.href="/KeChengSheJi/Administrator/adminmessageboard.php";
            </script>
    <?php
        }
        $sql="SELECT * FROM messageboard";
        $result=mysqli_query($con,$sql);
        $username=array();
        while($row=mysqli_fetch_array($result))//while循环将$result中的结果找出来
        {
            $username[]=$row['name'];
        }
        $length=count($username);
        for($i=0;$i<$length;$i++){

        }
        for($i=0;$i<$length;$i++)
        {
            if($name!=$username[$i]){
                if($i==$length-1){
    ?>
                    <script type="text/javascript">
                        alert("不存在此留言昵称");
                        window.location.href="/KeChengSheJi/Administrator/adminmessageboard.php";
                    </script>
    <?php
                }
            }

            else{
                    $del_sql="DELETE FROM messageboard WHERE name = '$name'";
                    $del = $con->query($del_sql);
                    if($del == true){
    ?>
                        <script type="text/javascript">
                            alert("删除留言成功");
                            window.location.href="/KeChengSheJi/Administrator/adminmessageboard.php";
                        </script>
    <?php
                    }
                    else{
    ?>
                        <script type="text/javascript">
                            alert("删除留言失败");
                            window.location.href="/KeChengSheJi/Administrator/adminmessageboard.php";
                        </script>
    <?php
                    }
                }
        }
    ?>
</html>
