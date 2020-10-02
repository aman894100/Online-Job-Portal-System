<?php
    require_once './provider.inc.php';
    require_once './classes.inc.php';
    $provider = $_SESSION['provider'];
    $action = $_GET['action'];
    if($action=='edit'){
        $userName = $_SESSION['userName'];
        $js = new JobProvider();
        $js->address = $_REQUEST['address'];
        $js->city = $_REQUEST['city'];
        $js->country = $_REQUEST['country'];
        $js->website = $_REQUEST['website'];
        $js->hrname = $_REQUEST['hrname'];
        $js->hremail = $_REQUEST['hremail'];
        $js->hrphone = $_REQUEST['hrphone'];
        $js->userName = $_SESSION['userName'];
        DBManager::updateJobProviderProfile($js);
        $userName = $_SESSION['userName'];
        $js = DBManager::getProvider($userName);
        $_SESSION['provider'] = $js;
    }
    else if($action=='add'){
        $userName = $_SESSION['userName'];
        $companyName = $_SESSION["name"];
        $js = new JobProvider();
        $js->userName = $_SESSION['userName'];
        $js->address = $_REQUEST['Address'];
        $js->city = $_REQUEST['City'];
        $js->country = $_REQUEST['Country'];
        $js->website = $_REQUEST['Website'];
        $js->hrname = $_REQUEST['HRName'];
        $js->hremail = $_REQUEST['HREmail'];
        $js->hrphone = $_REQUEST['HRPhone'];
        $js->companyName = $companyName;
        $logo = 'logo/'.$userName.'.jpg';
        $js->logo = $logo;
        DBManager::addJobProviderProfile($js);
        move_uploaded_file($_FILES['Logo']['tmp_name'], $logo);
        $js = DBManager::getProvider($userName);
        $_SESSION['provider'] = $js;
        $_SESSION['profile'] = 1;
    }
    header('Location: index.php');
?>
