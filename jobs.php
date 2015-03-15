<?php include('includes/config.php');?>
<?php 

if(isset($_GET['name'])){
	$name=$_GET['name'];
	$filters['name']=$name;
	$result=$db1->SlectRows("tj_categories",$filters);
	if (! $result) {
    	$db->Kill();
	}
	$category=$db->RowArray();
}
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
					<div id="add-section">
                        <div class="row">
                            <p id="cat_name"><?php echo $category['name'];?></p>                   	
                        </div>                
                        	    
                        
                    </div>
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
