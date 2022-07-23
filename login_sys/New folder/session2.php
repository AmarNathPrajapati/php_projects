<?php
    session_start();
    if(isset($_SESSION['username'])){
        $name=$_SESSION['username'];
        $cat=$_SESSION['favcat'];
        echo "Welcome $name your are login successfully and choose your favourate $cat";
    }
    else{
        echo "you have been logged out";
    }
?>
