<?php
    require_once './seeker.inc.php';
    $seeker = $_SESSION['seeker'];
    $jobId = $_REQUEST['jobId'];
    $providerId = $_REQUEST['providerId'];
    $seekerId = $seeker->seekerId;
    $ja = new JobApplication();
    $ja->seekerId = $seekerId;
    $ja->providerId = $providerId;
    $ja->jobId = $jobId;
    DBManager::applyForJob($ja);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Home Page : JobSeeker</title>
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
                    <div class="logo"><h1><a href="index.php">Jobs For You<br /><small>Welcome</small></a></h1></div>
                    <div class="menu_nav">
                        <ul>
                            <li><a href="index.php"><span>Home</span></a></li>
                            <li><a href="jobs.php"><span>Jobs</span></a></li>
                            <li><a href="view_messages.php"><span>Messages</span></a></li>
                            <li><a href="search_jobs.php"><span>Search</span></a> </li>
                            <li><a href="change_password.php"><span><span>Change Password</span></span></a></li>
                            <li><a href="../logout"><span><span>Logout</span></span></a></li>
                        </ul>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>

            <div class="content">
                <div style="min-height: 300px;" class="content_resize">
                    <h2>
                        You application has been successfully sent to the Employer.
                        <br><br>
                        You will be informed when the Employer accepts/rejects your Application.
                        <br><br>
                        You can view the status of your Application under the Applications Tab.
                    </h2>
                    
                </div>
            </div>
                <div class="clr"></div>
            </div>
            <div class="footer">
                <div class="footer_resize">
                    <p class="lf">&copy; Copyright MyWebSite. Designed by Blue <a href="http://www.bluewebtemplates.com">Website Templates</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
