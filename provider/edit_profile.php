<?php
    require_once './provider.inc.php';
    require_once './classes.inc.php';
    $provider = $_SESSION['provider'];
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
                <form action="manage_profile.php?action=edit" method="POST">
                       
                    <table width="100%" cellpadding="10">
                        <tr>
                            <td>Company Name : </td>
                            <td><?php echo $_SESSION["name"];?></td>
                        </tr>
                        <tr>
                            <td>Address : </td>
                            <td><input type="text" name="address" value="<?php echo $provider->address;?>" /></td>
                            <td>Website : </td>
                            <td><input type="text" name="website" value="<?php echo $provider->website;?>" /></td>
                        </tr>
                        <tr>
                            <td>City : </td>
                            <td><input type="text" name="city" value="<?php echo $provider->city;?>" /></td>
                            <td>Country : </td>
                            <td><input type="text" name="country" value="<?php echo $provider->country;?>" /></td>
                        </tr>
                        <tr>
                            <td>HR Name : </td>
                            <td><input type="text" name="hrname" value="<?php echo $provider->hrname;?>" /></td>
                            <td>HR Email : </td>
                            <td><input type="text" name="hremail" value="<?php echo $provider->hremail;?>" /></td>
                        </tr>
                        <tr>
                            <td>HR Phone : </td>
                            <td><input type="text" name="hrphone" value="<?php echo $provider->hrphone;?>" /></td>
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
