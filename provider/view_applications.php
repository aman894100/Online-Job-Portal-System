<?php   
    require_once './provider.inc.php';
    $profile = $_SESSION['profile'];
    if($profile==0){
        header('Location: profile.php');
    }else{
    $provider = $_SESSION['provider'];
    $jobId = $_REQUEST['jobId'];
    $seekers = DBManager::getApplications($jobId);
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
                            <th>Name</th>
                            <th>EMail</th>
                            <th>Qualification</th>
                            <th>Experience</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php 
                        $i = 1;
                        foreach ($seekers as $seekerId) {
                            $seeker = DBManager::getSeekerInfo($seekerId);
                        ?>
                        <tr>
                            <td><?php echo $i++ ;?></td>
                            <td><?php echo $seeker->userName; ?></td>
                            <td><?php echo $seeker->email; ?></td>
                            <td><?php echo $seeker->qualification ?></td>
                            <td><?php echo $seeker->experience;?></td>
                            <td><a href="view_details.php?seekerId=<?php echo $seeker->seekerId?>">View Seeker Details</a></td>
                            <td><a href="../<?php echo $seeker->bioData;?>">Bio-Data</a></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <form action="send_message.php" method="post">
                                Message : 
                                <br>
                                    <textarea name="messageText" rows="5" cols="60"></textarea> 
                                    <input type="hidden" name="seekerId" value="<?php echo $seeker->seekerId ?>"/>
                                    <input type="hidden" name="jobId" value="<?php echo $jobId ?>"    
                                           <br>
                                           <input type="submit" value="Send Message" />
                                </form>    
                            </td>
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