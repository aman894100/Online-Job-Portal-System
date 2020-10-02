<?php
    $template=1;
    require_once './seeker.inc.php';
    $seeker = $_SESSION['seeker'];
    if(isset($_POST['submit'])){
        $template=2;
    }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Home Page : Job Seeker</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="../styles/style1.css" rel="stylesheet" type="text/css" />
        <!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
        <script type="text/javascript" src="../js/cufon-yui.js"></script>
        <script type="text/javascript" src="../js/arial.js"></script>
        <script type="text/javascript" src="../js/cuf_run.js"></script>
        <!-- CuFon ends -->

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
                            <li><a href="view_messages.php"><span>Messages</span></a></li>
                            <li><a href="search_jobs.php"><span>Search</span></a> </li>
                            <li><a href="change_password.php"><span><span>Change Password</span></span></a></li>
                            <li><a href="logout.php"><span><span>Logout</span></span></a></li>
                        </ul>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>

            <div class="content">
                <div class="content_resize">
                    <form action="search_jobs.php" method="POST">
                        Enter Location : 
                        <input type="text" name="location" value="" />
                        <input type="submit" name="submit" value="Search Jobs" />
                    </form>
                    <?php 
                    if($template==2){
                        $location = $_POST['location'];
                        $list = DBManager::getJobsByLocation($seeker->areaOfWork,$location);
                        $applications = DBManager::getJobApplications($seeker->seekerId);
                        if(count($list)==0){
                            echo "<h2>Sorry, There are no jobs available for location $location.</h2>";
                        }else{
                    foreach ($list as $job) {
                        $jp = DBManager::getJobProvider($job->providerId);
                    ?>
                    <table style="width: 90%; border-radius: 20px; padding: 20px; border: 1px solid white; margin: 20px" cellpadding="5">
                        <tr>
                            <td width="20%">Company : </td>
                            <td colspan="3"><?php echo $jp->companyName;?></td>
                        </tr>
                        <tr>
                            <td width="20%">Post : </td>
                            <td colspan="3"><?php echo $job->post;?></td>
                        </tr>
                        <tr>
                            <td>Job Description : </td>
                            <td colspan="3"><?php echo $job->jobDescription;?></td>
                        </tr>
                        <tr>
                            <td>Skills Required : </td>
                            <td><?php echo $job->skillsRequired;?></td>
                            <td>Experience Required : </td>
                            <td><?php echo $job->experienceRequired;?></td>
                        </tr>
                        <tr>
                            <td>Location : </td>
                            <td><?php echo $job->jobLocation;?></td>
                            <td>Salary : </td>
                            <td><?php echo $job->salary;?></td>
                        </tr>
                        <tr>
                            <td>Open Date : </td>
                            <td><?php echo date('d-M-Y',$job->openDate);?></td>
                            <td>Close Date : </td>
                            <td><?php echo date('d-M-Y',$job->closeDate);?></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">
                                <?php
                                    if(array_search($job->jobId, $applications)){
                                        array_se
                                ?>
                                <h2>Application Sent.</h2>
                                <?php }else{ ?>
                                <a class="link-style" href="apply.php?providerId=<?php echo $job->providerId?>&jobId=<?php echo $job->jobId?>">Apply for this Job</a>
                                <?php } ?>
                            </td>
                        </tr>
                    </table>    
                    <?php }}} ?>
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