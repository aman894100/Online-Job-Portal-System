<?php
    require_once './provider.inc.php';
    $profile = $_SESSION['profile'];
    if($profile==0){
        header('Location: profile.php');
    }else{
    $provider = $_SESSION['provider'];
    $jobId = $_REQUEST['jobId'];
    DBManager::deleteJob($jobId);
    header('Location: jobs.php');
    }
?>