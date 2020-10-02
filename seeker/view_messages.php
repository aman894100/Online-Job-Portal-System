<?php
    require_once './seeker.inc.php';
    $seeker = $_SESSION['seeker'];
    $list = DBManager::getJobs($seeker->areaOfWork);
    $messages = DBManager::getMessages($seeker->seekerId);
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
                    <table style="width: 90%; border-radius: 20px; padding: 20px; border: 1px solid white; margin: 20px" cellpadding="5">
                        <tr>
                            <th>S.No.</th>
                            <th>Sender</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($messages as $message) {
                            $provider = DBManager::getJobProvider($message->providerId);
                        ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $provider->userName;?></td>
                            <td><?php echo $message->messageText;?></td>
                            <td><?php echo date('d-M-Y',$message->messageDate);?></td>
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