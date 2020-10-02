<?php
    require_once './provider.inc.php';
    require_once './classes.inc.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Home Page : JobProvider</title>
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
            });
        </script> 
    </head>

    <body>
        <div class="main">
            <div class="header">
                <div class="header_resize">
                    <div class="logo"><h1><a href="index.php">Jobs For You<br /><small>Welcome :</small></a></h1></div>
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
                    <h3>You are requested to complete your profile for using the services of this website.</h3>
                    <form action="manage_profile.php?action=add" method="POST" enctype="multipart/form-data">
                       
                    <table width="100%" cellpadding="10">
                        <tr>
                            <td>Name : </td>
                            <td><?php echo $_SESSION['name'];?></td>
                        </tr>
                        <tr>
                            <td>Address : </td>
                            <td><input type="text" name="Address" value="" /></td>
                        </tr>
                        <tr>
                            <td>WebSite : </td>
                            <td><input type="text" name="Website" value="" /></td>
                        </tr>
                        <tr>
                            <td>HR Name : </td>
                            <td><input type="text" name="HRName" value="" /></td>
                            <td>HR Email : </td>
                            <td><input type="text" name="HREmail" value="" /></td>
                            
                        </tr>
                            <td>HR Phone : </td>
                            <td><input type="text" name="HRPhone" value="" /></td>
                        <tr>
                        </tr>
                        <tr>
                            <td>City : </td>
                            <td><input type="text" name="City" value="" /></td>
                            <td>Country : </td>
                            <td><input type="text" name="Country" value="" /></td>
                        </tr>
                        <tr>
                            <td>Logo : </td>
                            <td><input type="file" name="Logo"/><br>Please upload a .jpg file.</td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">
                                <input type="submit" value="Save Profile" />
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