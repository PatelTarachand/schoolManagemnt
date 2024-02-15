<?php
    $connection=mysqli_connect("localhost",'root','','school_management');
    if(!$connection){
        echo "Connection failed";
    }

    date_default_timezone_set("Asia/Kolkata");
    //echo  date_default_timezone_get();

    //change in config
?>