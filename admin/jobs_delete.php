<?php require_once("includes/config.php"); ?>
<?php 
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$filters['id']=$id;                                                         
	$result=$db->SelectRows("tj_vacancies",$filters);							
	if (! $result) {
    // Show the error and kill the script
    	$db->Kill();
	}
	$vacancy=$db->RowArray();    
	//var_dump($employer);	
}
elseif(isset($_POST['id'])){
	$updates['company'] 	= MySQL::SQLValue($_POST["..."]);
	$updates['category']	= MySQL::SQLValue($_POST["..."]);
	$updates['title'] 		= MySQL::SQLValue($_POST["title"]);
	$updates['salary'] 		= MySQL::SQLValue($_POST["salary"]);
	$updates['exp_date'] 	= MySQL::SQLValue($_POST["exp_date"]);
	//if (! $db->UpdateRows("test", $values, array("id" => 1))) $db->Kill
	if (! $db->UpdateRows("tj_vacancies", $updates, array("id" => $_POST['id']))) $db->Kill;		
	
	$id=$_POST['id'];
	$filters['id']=$id;                                                         
	$result=$db->SelectRows("tj_vacancies",$filters);							
	if (! $result) {
    // Show the error and kill the script
    	$db->Kill();
	}
	$vacancy=$db->RowArray();   
}
?>

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
<body class="new-job-page">
	<div id="container">
		<?php include("elements/header.php"); ?>		
		<div class="row">
			<aside class="left-column">
			<?php include("elements/left_sidebar.php"); ?>
			</aside>
			<section id="main">	
				<div class="main-inner">
					<h1>Post a New Job</h1>
                    <p class="breadcum"><a href="jobs.php">Jobs</a> &rarr; Add New</p>
                    <?php  
						if(isset($message)){
                        	echo $message;
                        }
					?>
					<form id="post-job" action="" method="post">
						<div class="row">
							<p class="label">Employer:</p>
							<p>
								<select name="employer" class="dropdown">
									<option value="0">-Select Employer-</option>
                                    <?php foreach ($employers as $vacancies){?>
									<option value="<?php echo $employer['id']?>"><?php echo $employer['name']?></option>
                                    <?php }?>
								</select>
							</p>
						</div>
						<div class="row">
							<p class="label">Job Category:</p>
							<p>
								<select name="job_category" class="dropdown">
									<option value="0">-Select Job Category-</option>
                                    <?php foreach ($categories as $category){?>
                                    <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                                    <?php }?>
								</select>
							</p>
						</div>
						<div class="row">
							<p class="label">Job Title: <span>(on home page only first 50 charactors will be displayed.)</span></p>
							<p><input type="text" name="job_title" class="textbox" value="<?php echo $vacancy['title'];?>></p>
						</div>
						<div class="row">
							<p class="label">Job Description:</p>
							<p><textarea name="job_description" class="textarea" ></textarea></p>
						</div>
						<div class="row">
							<p class="label">Job Advertising Image:</p>
							<p><input type="file" name="job_image"></p>
						</div>
						<div class="row">
							<p class="label">Salary:</p>
							<p><input type="text" name="job_salary" class="textbox" value="<?php echo $vacancy['salary'];?>></p>
						</div>
						<div class="row">
							<p class="label">Salary Negotiable: <input type="checkbox" value="1" name="job_salary_negotiable"></p>							
						</div>
                        <hr>
                        <div class="row">
                        	<p class="label">Expire Date:<span>(Default is 2 weeks from today)</span></p>
                       		<p><input type="text" name="job_expire_date" class="textbox" value="<?php echo $vacancy['exp_date'];?>></p>
                        </div>
						<div class="row">
							<p><input type="submit" value="Submit" name="job_submit"></p>
						</div>
					</form>
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