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
<body class="">
	<div id="container">
            <?php include("elements/header.php"); ?>
		
		<div class="row">
			<aside class="left-column">
                            <?php include("elements/left_sidebar.php"); ?>
			</aside>

			<section id="main">	
				<div class="main-inner">

                                    <h1>Administrator Profile</h1>
                                    
                                    <div id="admin-profile-wrapper">
                                        
					<form id="admin-profile" action="" method="post">
                                                <div class="row">
                                                    <div class="">
							<p class="label">Name:</p>
							<p>
                                                            <input type="text" name="user_name" value="Administrator">
							</p>
                                                    </div>
						</div>
                                            
						<div class="row">
                                                    <div class="">
							<p class="label">Email:</p>
							<p>
                                                            <input type="text" name="user_email" value="manjula@comtechlanka.com">
							</p>
                                                    </div>
						</div>
                                                <div class="row">
                                                    <div class="">
							<p class="label">Current Password:</p>
							<p>
                                                            <input type="password" name="current_password">
							</p>
                                                    </div>
						</div>
                                            <hr>
                                            <h3>Change Password</h3>
                                            <p>Only use if you want to change the password.</p><br>
                                                <div class="row">
                                                    <div class="">
							<p class="label">New Password:</p>
							<p>
                                                            <input type="password" name="new_password">
							</p>
                                                    </div>
						</div>
                                                <div class="row">
                                                    <div class="">
							<p class="label">Confirm New Password:</p>
							<p>
                                                            <input type="password" name="confirm_password">
							</p>
                                                    </div>
						</div>
                                            
						<div class="row">
                                                    <p><input type="submit" value="Submit" name="category_submit" class="button button-blue"></p>
						</div>
					</form>
                                    </div><!-- new-employer-wrapper -->
				</div><!-- /main-inner -->
			</section><!-- /main -->
		</div>		
		
            <?php include("elements/footer.php"); ?>

	</div><!--!/#container -->
	<!-- !Javascript - at the bottom for fast page loading -->
	<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script>!window.jQuery && document.write('<script src="js/jquery-1.4.2.min.js"><\/script>')</script>
	<script src="js/script.js?v=1"></script>
</body>
</html>