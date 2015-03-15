<?php require_once("includes/config.php"); ?>
<!DOCTYPE html>   
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<?php include("elements/default_head.php"); ?>
</head>
<!-- !Body -->
<body class="user-login">
    <div id="container">
        <div class="row">
            <div class="user-login-wrapper">
                <form action="index.php" method="post">
                    <table id="user-login">
                        <tr>
                            <th colspan="2">Jobs Administrator</th>
                        </tr>
                        <tr>
                            <td colspan="2" class="error">Invalid Username/Password.</td>
                        </tr>
                        <tr>
                            <td class="right-text">Username</td>
                            <td><input type="text" name="username" id="username"></td>
                        </tr>
                        <tr>
                            <td class="right-text">Password</td>
                            <td><input type="password" name="password" id="password"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="right-text"><input type="submit" name="submit" value="Login" class="button"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>    			

    </div><!--!/#container -->
    
    <!-- !Javascript - at the bottom for fast page loading -->
    <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script>!window.jQuery && document.write('<script src="js/jquery-1.4.2.min.js"><\/script>')</script>
    <script src="js/script.js?v=1"></script>
</body>
</html>