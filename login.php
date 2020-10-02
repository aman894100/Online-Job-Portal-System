<?php
    require_once './DBManager.class.php';
    require_once './JobSeeker.class.php';
    require_once './UserInfo.class.php';
    require_once './JobProvider.class.php';
    $status = 0;
    if (isset($_POST['submit'])) {
        $userName = $_REQUEST['userName'];
        $password = $_REQUEST['password'];
        $info = DBManager::loginUser($userName, $password);
        if ($info) {
            session_start();
            $_SESSION['userName'] = $info->userName;
            $_SESSION['name'] = $info->name;
            $_SESSION['roleName'] = $info->roleName;
            $_SESSION['profile'] = $info->profileComplete;
            if ($info->roleName == 'JobSeeker') {
                $seeker = DBManager::getJobSeeker($userName);
                $_SESSION['seeker'] = $seeker;
                header('Location: seeker/index.php');
            } else {
                $provider = DBManager::getProvider($userName);
                $_SESSION['provider'] = $provider;
                header('Location: provider/index.php');
            }
        }else{
            $status=1;
            //header('Location: error.php');
        }
    }//else{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Home Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="styles/style1.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/cufon-yui.js"></script>
        <script type="text/javascript" src="js/arial.js"></script>
        <script type="text/javascript" src="js/cuf_run.js"></script>\
    </head>

    <body>
        <div class="main">
            <div class="header">
                <div class="header_resize">
                    <div class="logo"><h1><a href="index.php">Jobs For You<br /><small>A Job Portal</small></a></h1></div>
                    <div class="menu_nav">
                        <ul>
                            <li><a href="index.php"><span>Home</span></a></li>
                            <li><a href="login.php"><span>Login</span></a></li>
                            <li><a href="register.php"><span>Register</span></a> </li>
                            <li><a href="aboutUs.php"><span><span>About Us</span></span></a></li>
                            <li><a href="contactUs.php"><span><span>Contact Us</span></span></a></li>
                        </ul>
                    </div>
                    <div class="clr"></div>
                    <img src="images/bigpicture.jpg" width="970" height="239" alt="image" />
                    <div class="clr"></div>
                </div>
            </div>

            <div class="content">
                <div class="content_resize">
                    <div class="mainbar">
                        <div class="article">
                            <form style="width: 400px" action="login.php" method="POST">
                                <fieldset>
                                    <legend>Login Form</legend>
                                    <table border="0" cellpadding="10">
                                        <tbody>
                                            <tr>
                                                <td>User Name : </td>
                                                <td><input type="text" name="userName" required value="unisoft" /></td>
                                            </tr>
                                            <tr>
                                                <td>Password : </td>
                                                <td><input type="password" name="password" required value="abc123" /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="right">
                                                    <input type="submit" name="submit" value="Login" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </form>
                            <?php
                            if ($status == 1) {
                                ?>
                                <h2 style="color: red;">User ID/Password is Incorrect</h2>
                                <?php
                            }
                            ?>
                            <br><br>
                                    <p>
                                        <a class="link-style" href="register.php">New User : Sign Up</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="link-style" href="forgotpassword.php">Forgot Password</a>
                                    </p>
                        </div>
                    </div>


                    <div class="sidebar">
                        <div class="gadget">
                            <h2 class="star">Areas of Work</h2>
                            <ul class="sb_menu">
                                <?php
                                $list1 = DBManager::getJobAreas();
                                foreach ($list1 as $str) {
                                    ?>
                                    <li><?php echo $str ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>


                    <div class="clr"></div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer_resize">
                <p class="lf">&copy; Copyright. Designed by Unisoft Technologies.</a></p>
            </div>
        </div>
    </body>
</html>
<?php //} ?>