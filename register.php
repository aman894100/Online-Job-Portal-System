<?php
    include_once './DBManager.class.php';
    include_once './UserInfo.class.php';
    $template=1;
    if(isset($_POST['submit'])){
        $info = new UserInfo();
        $info->userName = $_REQUEST["userName"];
        $info->password = $_REQUEST["password"];
        $info->cpassword = $_REQUEST["cpassword"];
        $info->email = $_REQUEST["email"];
        $info->roleName=$_REQUEST["roleName"];
        $info->name = $_REQUEST["name"];
        $info->secretQuestion = $_REQUEST["secretQuestion"];
        $info->answer = $_REQUEST["answer"];
        DBManager::registerUser($info);
        $template=2;
    }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Registration Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="styles/style1.css" rel="stylesheet" type="text/css" />
        <!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
        <script type="text/javascript" src="js/cufon-yui.js"></script>
        <script type="text/javascript" src="js/arial.js"></script>
        <script type="text/javascript" src="js/cuf_run.js"></script>
        <!-- CuFon ends -->

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
                 <?php if($template==1) { ?>
                <form style="width: 600px" action="register.php" method="POST">
                    <fieldset>
                        <legend>Registration Form</legend>
                    <table border="0" cellpadding="5">
                        <tbody>
                            <tr>
                                <td>User Name : </td>
                                <td>
                                    <input type="text" name="userName" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>Password : </td>
                                <td>
                                    <input type="password" name="password" value="" />
                                </td>
                            </tr>
                           <tr>
                                <td>Confirm Password : </td>
                                <td>
                                    <input type="password" name="cpassword" value="" >
                                    
                                </td>
                            </tr> 
                            <tr>
                                <td>E-Mail ID : </td>
                                <td>
                                    <input type="text" name="email" value="" />
                                    
                                </td>
                            </tr>
                             <tr>
                                <td>Name : </td>
                                <td>
                                    <input type="text" name="name" value="" />
                                    
                                </td>
                            </tr>
                            <tr>
                                    <td>Role Name : </td>
                                    <td>
                                        <select name="roleName">
                                            <option value="JobSeeker" selected="selected">Job Seeker</option>
                                            <option value="JobProvider">Job Provider</option>
                                        </select>
                                    </td>
                            </tr>
                         
                            <tr>
                                    <td>Secret Question : </td>
                                    <td>
                                        <select name="secretQuestion">
                                            <option value="Favorite Color">Favorite Color</option>
                                            <option value="Favorite Food">Favorite Food</option>
                                            <option value="Favorite Movie">Favorite Movie</option>
                                            <option value="First School">First School</option>
                                        </select>
                                    </td>
                            </tr>                                 
                                    
                            <tr>
                                <td>Answer : </td>
                                <td>
                                    <input type="text" name="answer" value="" />
                                    
                                </td>
                            </tr> 
                            
                           <tr>
                                <td colspan="2" align="right">
                                    <input type="submit" name="submit" value="Register" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>                               
                </form>
                <?php } ?>
                <?php if($template==2) { ?>
                <h2>
                    Congratulations
                    <br>
                    You are successfully registered with Job Portal.com. 
                </h2>            
                <p>
                    Please login for unlocking your account.
                    <br><br><br>
                    <a class="link-style" href="login.php">Login</a>
                </p>
                <?php } ?>
                    
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer_resize">
            <p class="lf">&copy; Copyright Designed by Unisoft Technologies.</a></p>            </div>
        </div>
    </body>
</html>
