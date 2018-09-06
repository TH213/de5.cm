<?php
    $connect= mysqli_connect('localhost','root','','de5');
    
    if(isset($_POST['Submit'])){
        $name=$_POST['name'];
        $password=$_POST['password'];
        $sql="select * from mems where username='$name' && password='$password'";
        $query= mysqli_query($connect, $sql);
        $rows= mysqli_fetch_array($query);
        if($rows>0){
            include_once 'list.php';
        }
        else{
            echo 'Sai tên đăng nhập hoặc mật khẩu';
        }
    }
?>