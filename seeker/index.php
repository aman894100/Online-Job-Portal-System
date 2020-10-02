<?php
    
    require_once './seeker.inc.php';
    $profile = $_SESSION['profile'];
    if($profile==0){
        header('Location: profile.php');
    }else{
    $seeker = $_SESSION['seeker'];
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
                    <table width="100%" cellpadding="10">
                        <tr>
                            <td>Name : </td>
                            <td><?php echo $_SESSION["name"];?></td>
                            <td>Gender : </td>
                            <td><?php echo $seeker->gender;?></td>
                        </tr>
                        <tr>
                            <td>Email ID : </td>
                            <td><?php echo $seeker->email?></td>
                            <td>Phone : </td>
                            <td><?php echo $seeker->phone?></td>
                        </tr>
                        <tr>
                            <td>Date Of Birth : </td>
                            <td><?php echo date('d-M-Y',$seeker->dateOfBirth)?></td>
                            <td>Address : </td>
                            <td><?php echo $seeker->address?></td>
                        </tr>
                        <tr>
                            <td>City : </td>
                            <td><?php echo $seeker->city?></td>
                            <td>Country : </td>
                            <td><?php echo $seeker->country?></td>
                        </tr>
                        <tr>
                            <td>Qualification : </td>
                            <td><?php echo $seeker->qualification?></td>
                            <td>Experience : </td>
                            <td><?php echo $seeker->experience?></td>
                        </tr>
                        <tr>
                            <td>Objective : </td>
                            <td colspan="3"><?php echo $seeker->objective?></td>
                        </tr>
                        <tr>
                            <td>Skills : </td>
                            <td><?php echo $seeker->skills?></td>
                            <td>Area Of Work : </td>
                            <td><?php echo $seeker->areaOfWork?></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">
                                <a class="link-style" href="edit_profile.php">Edit Profile</a>
                            </td>
                        </tr>
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