<?php include('includes/config.php');?>  
<!DOCTYPE html>   
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<?php include('elements/default_head.php');?>
</head>
<!-- !Body -->
<body id="home">
	<div id="container">
		<?php include('elements/header.php');?>		
		<div class="row"> 
        	<aside class="left-column">        
				<?php include('elements/left_sidebar.php');?>
            </aside>
			<section class="main">	
				<div class="main-inner">
                	<div id="add-section">
                        <div id="info" class="row">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                            </ul>                   	
                        </div>
                        <div id="links" class="row">
                            <ul>
                                <li><a href="index.php">APPLY</a></li>
                                <li><a href="index.php">EMAIL</a></li>
                                <li><a href="index.php">PRINT</a></li>
                            </ul> 
                        </div>                                             
                        <div id="add-image" class="row">
                        	<img src="images/employers_logos/add 1.jpg" />	    
                        </div>
                    </div>
				</div><!-- /main-inner -->
			</section><!-- /main -->
            <aside id="featured-emp">
            	<div id="inner">
                	<div id="fea-emp-heading">Featured Employees</div>
                	<div class="emp"><a href=""><img src="images/employers_logos/emp_logo_5.jpg" width="100px" height="100px"></a></div>
                </div>
            </aside>
		</div>				
	</div>
		<footer>
			<nav>
				<ul>
					<li><a href="">Home</a></li>
					<li><a href="">Post Your Vacancy</a></li>
					<li><a href="">Contact us</a></li>
				</ul>
			</nav>
			<p>&copy; 2014, Thamara The Web Experts</p>
		</footer><!-- /footer -->

	</div><!--!/#container -->
	<!-- !Javascript - at the bottom for fast page loading -->
	<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script>!window.jQuery && document.write('<script src="js/jquery-1.4.2.min.js"><\/script>')</script>
	<script src="js/script.js?v=1"></script>
</body>

	<!-- <ul class="categories">
		<li><a href="">Accounting</a></li>
		<li><a href="">Administration</a></li>
		<li><a href="">Advertising</a></li>
		<li><a href="">Agriculture</a></li>
		<li><a href="">Apparrel</a></li>
		<li><a href="">Banking</a></li>
		<li><a href="">Beauty</a></li>
		<li><a href="">Engineering</a></li>
		<li><a href="">Health</a></li>
		<li><a href="">Hotels</a></li>
		<li><a href="">HR</a></li>
		<li><a href="">Information Technology</a></li>
		<li><a href="">Insurance</a></li>
		<li><a href="">Legal</a></li>
		<li><a href="">Management</a></li>
		<li><a href="">Manufacturing</a></li>
		<li><a href="">Marketing</a></li>
		<li><a href="">NGO</a></li>
		<li><a href="">Printing</a></li>
		<li><a href="">Science & Research</a></li>
		<li><a href="">Security</a></li>
		<li><a href="">Senior Positions</a></li>
		<li><a href="">Sports</a></li>
		<li><a href="">Teaching</a></li>
		<li><a href="">Tourism</a></li>
		<li><a href="">Agriculture</a></li>
	</ul>-->
</html>