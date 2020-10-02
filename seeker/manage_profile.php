<?php
    require_once './seeker.inc.php';
    require_once './classes.inc.php';
    $seeker = $_SESSION['seeker'];
    $action = $_GET['action'];
    if($action=='edit'){
        $js = new JobSeeker();
        $js->email = $_REQUEST['email'];
        $js->phone = $_REQUEST['phone'];
        $js->address = $_REQUEST['address'];
        $js->city = $_REQUEST['city'];
        $js->country = $_REQUEST['country'];
        $js->qualification = $_REQUEST['qualification'];
        $js->experience = $_REQUEST['experience'];
        $js->objective = $_REQUEST['objective'];
        $js->skills = $_REQUEST['skills'];
        $js->areaOfWork = $_REQUEST['areaOfWork'];
        $js->userName = $_SESSION['userName'];
        DBManager::updateJobSeekerProfile($js);
        $userName = $_SESSION['userName'];
        $js = DBManager::getJobSeeker($userName);
        $_SESSION['seeker'] = $js;
    }
    else if($action=='add'){
        $userName = $_SESSION['userName'];
        $js = new JobSeeker();
        $js->gender = $_REQUEST['gender'];
        $js->email = $_REQUEST['email'];
        $js->phone = $_REQUEST['phone'];
        $js->dateOfBirth = strtotime($_REQUEST['dateOfBirth']);
        $js->address = $_REQUEST['address'];
        $js->city = $_REQUEST['city'];
        $js->country = $_REQUEST['country'];
        $js->qualification = $_REQUEST['qualification'];
        $js->experience = $_REQUEST['experience'];
        $js->objective = $_REQUEST['objective'];
        $js->skills = $_REQUEST['skills'];
        $js->areaOfWork = $_REQUEST['areaOfWork'];
        $js->userName = $userName;
        $photo = 'photos/'.$userName.'.jpg';
        $bioData = 'biodata/'.$userName.'.docx';
        $js->photo = $photo;
        $js->bioData = $bioData;
        DBManager::addJobSeekerProfile($js);   
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
        move_uploaded_file($_FILES['bioData']['tmp_name'], $bioData);
        $js = DBManager::getJobSeeker($userName);
        $_SESSION['seeker'] = $js;
        $_SESSION['profile'] = 1;
    }
    header('Location: index.php');
?>
