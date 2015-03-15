<?php include('includes/config.php');?>
<?php 
	$result=$db1->SelectRows("tj_vacancies");
	if(!$result){
		$db1->Kill();
	}
	$titles=$db1->RecordsArray(MYSQL_ASSOC);
		//var_dump($titles);
?>
    
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
					<h1 class="heading_one">Latest Jobs Posted</h1>	
                    <table>
                    	<?php foreach ($titles as $title) {?>				
                        <ul class="jobs_style_1">
                            <li>
                                <div>
                                    <p class="job_title"><a href="add.php"><?php echo $title['title'];?></a></p>
                                    <p class="job_company"><?php echo $title['company'];?></p>
                                </div>
                            </li>
                        </ul>
                        <?php }?>
                    </table>      
				</div><!-- /main-inner -->               
			</section><!-- /main -->
            <aside id="featured-emp">
            	<div id="inner">
                	<div id="fea-emp-heading">Featured Employers</div>
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
</html>



                    <!--  
					<ul class="jobs_style_1">
						<li>
							<div>
								<p class="job_title"><a href="">Graphic Designer - Colombo</a></p>
								<p class="job_company">Some Details about the job</p>
							</div>
						</li>
						<li>
							<div>
								<p class="job_title"><a href="">Web Designer - Negombo</a></p>
								<p class="job_company">Some Details about the job</p>
							</div>
						</li>
						<li>
							<div>
								<p class="job_title"><a href="">PHP Developer - Colombo</a></p>
								<p class="job_company">Some Details about the job</p>
							</div>
						</li>
						<li>
							<div>
								<p class="job_title"><a href="">Office Assistant - Gampaha</a></p>
								<p class="job_company">Some Details about the job</p>
							</div>
						</li>
						<li>
							<div>
								<p class="job_title"><a href="">Engineer - Colombo</a></p>
								<p class="job_company">Some Details about the job</p>
							</div>
						</li>
						<li>
							<div>
								<p class="job_title"><a href="">Graphic Designer - Colombo</a></p>
								<p class="job_company">Some Details about the job</p>
							</div>
						</li>
						<li>
							<div>
								<p class="job_title"><a href="">Graphic Designer - Colombo</a></p>
								<p class="job_company">Some Details about the job</p>
							</div>
						</li>
						<li>
							<div>
								<p class="job_title"><a href="">Graphic Designer - Colombo</a></p>
								<p class="job_company">Some Details about the job</p>
							</div>
						</li>
					</ul>-->