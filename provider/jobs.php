<?php
    
    require_once './provider.inc.php';
    $profile = $_SESSION['profile'];
    if($profile==0){
        header('Location: profile.php');
    }else{
    $provider = $_SESSION['provider'];
    $jobs = DBManager::getProviderJobs($provider->providerId);
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
                    <p style="text-align: right;">
                        <a class="link-style" href="post_job.php">Post New Job</a>
                    </p>
                    <table width="100%" cellpadding="10">
                        <tr>
                            <th>S.No.</th>
                            <th>Job Title</th>
                            <th>Open Date</th>
                            <th>Close Date</th>
                            <th>Applicants</th>
                            <th>Delete</th>
                        </tr>
                        <?php 
                        $i = 1;
                        foreach ($jobs as $job) {
                        ?>
                        <tr>
                            <td><?php echo $i++ ;?></td>
                            <td><?php echo $job->post ?></td>
                            <td><?php echo date('d-M-Y',$job->openDate);?></td>
                            <td><?php echo date('d-M-Y',$job->closeDate);?></td>
                            <td><a href="view_applications.php?jobId=<?php echo $job->jobId?>">View Applicants</a></td>
                            <td><a href="delete_job.php?jobId=<?php echo $job->jobId?>">Delete Job</a></td>
                        </tr>
                        <?php } ?>
                    </table>
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