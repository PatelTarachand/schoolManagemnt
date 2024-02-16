<?php 
session_start();

if($_SESSION['id']==''){
    echo header("Location:http://localhost/schoolManagemnt/index.php");
}

?>


<a href="logout.php"   >Logout</a>