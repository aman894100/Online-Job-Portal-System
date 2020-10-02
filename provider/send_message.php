<?php
    require_once './provider.inc.php';
    require_once './classes.inc.php';
    $provider = $_SESSION['provider'];
    $message = new Message();
    $jobId = $_REQUEST['jobId'];
   $message->seekerId = $_REQUEST['seekerId'];
   $message->messageText = $_REQUEST['messageText'];
   $message->providerId = $provider->providerId;
   $message->messageDate = date('Y-m-d',time());
   DBManager::sendMessage($message);
   header('Location: view_applications.php?jobId='.$jobId);
?>