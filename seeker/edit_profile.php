<?php
    require_once './seeker.inc.php';
    require_once './classes.inc.php';
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
                <form action="manage_profile.php?action=edit" method="POST">
                       
                    <table width="100%" cellpadding="10">
                        <tr>
                            <td>Name : </td>
                            <td><?php echo $_SESSION["name"];?></td>
                        </tr>
                        <tr>
                            <td>Email ID : </td>
                            <td><input type="text" name="email" value="<?php echo $seeker->email;?>" /></td>
                            <td>Phone : </td>
                            <td><input type="text" name="phone" value="<?php echo $seeker->phone;?>" /></td>
                        </tr>
                        <tr>
                            <td>Date Of Birth : </td>
                            <td><input type="text" name="dateOfBirth" value="<?php echo $seeker->dateOfBirth;?>" /></td>
                            <td>Address : </td>
                            <td><input type="text" name="address" value="<?php echo $seeker->address;?>" /></td>
                        </tr>
                        <tr>
                            <td>City : </td>
                            <td><input type="text" name="city" value="<?php echo $seeker->city;?>" /></td>
                            <td>Country : </td>
                            <td><input type="text" name="country" value="<?php echo $seeker->country;?>" /></td>
                        </tr>
                        <tr>
                            <td>Qualification : </td>
                            <td><input type="text" name="qualification" value="<?php echo $seeker->qualification;?>" /></td>
                            <td>Experience : </td>
                            <td><input type="text" name="experience" value="<?php echo $seeker->experience;?>" /></td>
                        </tr>
                        <tr>
                            <td>Objective : </td>
                            <td colspan="3">
                                <textarea name="objective" rows="5" cols="50"><?php echo $seeker->objective;?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Skills : </td>
                            <td><input type="text" name="skills" value="<?php echo $seeker->skills;?>" /></td>
                            <td>Area Of Work : </td>
                            <td>
                                <select name="areaOfWork">
                                    <?php
                                    $list1 = DBManager::getJobAreas();
                                    foreach($list1 as $str){
                                ?>
                                <option <?php if($seeker->areaOfWork==$str){ ?>selected="selected"<?php } ?>><?php echo $str?></option>
                                <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">
                                <input type="submit" value="Update Profile" />
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
