<?php
    require_once './DBManager.class.php';
    require_once './JobProvider.class.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Home Page</title>
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
                    <div class="mainbar">
                        <div class="article">
                            <h2>Companies hiring with us</h2>
                            <table width="100%" cellpadding="10">
                                <?php
                                    $list = DBManager::getJobProviders();
                                    $i=1;
                                    foreach($list as $jp){
                                        if($i%5==1) echo("<tr>");
                                ?>
                                <td align="center">
                                    <a href="<?php echo $jp->website; ?>"><img width="62" height="46" src="<?php echo $jp->logo; ?>"</a>
                                    <br>
                                    <?php echo $jp->companyName;?>    
                                </td>
                                <?php 
                                        if($i%3==0) echo("</tr>");
                                        $i++;
                                    } 
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="gadget">
                            <h2 class="star">Areas of Work</h2>
                            <ul class="sb_menu">
                                <?php
                                    $list1 = DBManager::getJobAreas();
                                    foreach($list1 as $str){
                                ?>
                                <li><?php echo $str?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="clr"></div>
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
