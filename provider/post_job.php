<?php
    
    require_once './provider.inc.php';
    $profile = $_SESSION['profile'];
    if($profile==0){
        header('Location: profile.php');
    }else{
    $provider = $_SESSION['provider'];
    if(isset($_POST['submit'])){
        $job = new Job();
        $job->providerId = $provider->providerId;
        $job->areaOfWork = $_REQUEST['areaOfWork'];
        $job->post = $_REQUEST['post'];
        $job->jobDescription = $_REQUEST['jobDescription'];
        $job->openDate = $_REQUEST['openDate'];
        $job->closeDate = $_REQUEST['closeDate'];
        $job->experienceRequired = $_REQUEST['experience'];
        $job->skillsRequired = $_REQUEST['skills'];
        $job->salary = $_REQUEST['salary'];
        $job->jobLocation = $_REQUEST['location'];
        DBManager::postJob($job);
        header('Location: jobs.php');
    }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Home Page : Job Provider</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="../styles/style1.css" rel="stylesheet" type="text/css" />
        <!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
        <script type="text/javascript" src="../js/cufon-yui.js"></script>
        <script type="text/javascript" src="../js/arial.js"></script>
        <script type="text/javascript" src="../js/cuf_run.js"></script>
        <!-- CuFon ends -->
        <link href="../styles/smoothness/jquery-ui-1.9.2.custom.css" rel="stylesheet">
        <script src="../js/jquery-1.8.3.js"></script>
        <script src="../js/jquery-ui-1.9.2.custom.js"></script>
        <script>
            $(function () {
                $("#datepicker").datepicker({
                    inline: true, dateFormat: 'd-M-yy', changeMonth: true, changeYear: true, yearRange: '1990:2015'
                });
                $("#datepicker1").datepicker({
                    inline: true, dateFormat: 'd-M-yy', changeMonth: true, changeYear: true, yearRange: '1990:2015'
                });
            });
        </script> 
    </head>

    <body>
        <div class="main">
            <div class="header">
                <div class="header_resize">
                    <div class="logo"><h1><a href="index.php">Jobs For You<br /><small>Welcome - <?php echo $_SESSION["name"]?></small></a></h1></div>
                    <div class="menu_nav">
                        <ul>
                            <li><a href="index.php"><span>Home</span></a></li>
                            <li><a href="jobs.php"><span>Jobs</span></a></li>
                            <li><a href="change_password.php"><span><span>Change Password</span></span></a></li>
                            <li><a href="logout.php"><span><span>Logout</span></span></a></li>
                        </ul>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>

            <div class="content">
                <div class="content_resize">
                    <form action="post_job.php" method="POST">
                       
                    <table width="100%" cellpadding="10">
                        <tr>
                            <td>Area Of Work : </td>
                            <td colspan="3">
                                <select name="areaOfWork">
                                    <?php
                                    $list1 = DBManager::getJobAreas();
                                    foreach($list1 as $str){
                                ?>
                                <option><?php echo $str?></option>
                                <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Post : </td>
                            <td  colspan="3"><input type="text" name="post" value="" /></td>
                        </tr>
                        <tr>
                            <td>Job Description : </td>
                            <td colspan="3">
                                <textarea name="jobDescription" rows="5" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Open Date : </td>
                            <td><input type="text" id="datepicker" readonly name="openDate" value="" /></td>
                            <td>Close Date : </td>
                            <td><input type="text" id="datepicker1" readonly name="closeDate" value="" /></td>
                        </tr>
                        <tr>
                            <td>Experience Required : </td>
                            <td><input type="text" name="experience" value="" /></td>
                            <td>Skills Required : </td>
                            <td><input type="text" name="skills" value="" /></td>
                        </tr>
                        <tr>
                            <td>Location : </td>
                            <td><input type="text" name="location" value="" /></td>
                            <td>Salary : </td>
                            <td><input type="text" name="salary" value="" /></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">
                                <input type="submit" name="submit" value="Post Job" />
                            </td>
                        </tr>                                
                    </table>
                </form> 
                </div>
            </div>
                <div class="clr"></div>
            </div>
            <div class="footer">
                <div class="footer_resize">
                <p class="lf">&copy; Copyright Designed by Unisoft Technologies.</a></p>                            
                </div>
            </div>
        </div>
    </body>
</html>
    <?php } ?>