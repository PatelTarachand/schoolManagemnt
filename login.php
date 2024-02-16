<?php
session_start();

include('config.php');

if(@$_POST['Submit']=='submit'){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM `admins` where `email`='".$email."' and `password` = '".$pass."'"; 
    $res = mysqli_query($connection,$sql);
    $result = $res->fetch_assoc();
    if($result){
        $_SESSION['id'] = $result['id'];
        echo header("Location:Admin/index.php");
    }else{
        echo "login fail";
    }

}else{
    echo "false";
}

?>