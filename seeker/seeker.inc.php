<?php
    require_once './classes.inc.php';
    session_start();
    if(!isset($_SESSION['userName'])){
        header('Location: ../login.php');
    }
    if($_SESSION['roleName'] != 'JobSeeker'){
        header('Location: ../login.php');
    }
?>