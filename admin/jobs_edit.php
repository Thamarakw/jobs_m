<?php require_once("includes/config.php"); ?>
<?php 
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$filters['id']=$id;            							                                            
	$result=$db->SelectRows("tj_jobs",$filters);							
	if (! $result) {
    	$db->Kill();
	}
	$job=$db->RowArray();		   
}

//Edit data
elseif(isset($_POST['id'])){
	$updates['company'] 		= MySQL::SQLValue($_POST["employer"]);
	$updates['category'] 		= MySQL::SQLValue($_POST["job_category"]);
	$updates['title'] 			= MySQL::SQLValue($_POST["job_title"]);
	$updates['description'] 	= MySQL::SQLValue($_POST["job_description"]);
	//$updates['publish_date'] 	= MySQL::SQLValue($_POST[""]);
	$updates['exp_date'] 		= MySQL::SQLValue($_POST["job_expire_date"]);
	$updates['status'] 			= MySQL::SQLValue(1);
	$updates['salary'] 			= MySQL::SQLValue($_POST["job_salary"]);
	$updates['negot_salary'] 	= MySQL::SQLValue($_POST["job_salary_negotiable"]);

	if (! $db->UpdateRows("tj_jobs", $updates, array("id" => $_POST['id']))) {		
		$db->Kill();		
	}
	else{
		$message="Record Changed";	
	}
	
	//Place changed data on form input itself
	$id=$_POST['id'];
	$filters['id']=$id;                                                         
	$result=$db->SelectRows("tj_jobs",$filters);							
	if (! $result) {
    	$db->Kill();
	}
	$job=$db->RowArray();    
}

var_dump($job);
//Retrieve data from employers table
$employers = $db->SelectRows("tj_employers");
if (! $employers) {
    $db->Kill();
}
$employers_array = $db->RecordsArray(MYSQL_ASSOC);

//Retrieve data from category table
$categories = $db->SelectRows("tj_categories");
if (! $categories) {
    $db->Kill();
}
$categories_array = $db->RecordsArray(MYSQL_ASSOC);

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
                   	<div class="content">
                        <form id="post-job" action="" method="post">
                        	<input type="hidden" name="id" value="">
                            <div class="row">
                                <p class="label">Employer:</p>
                                <p>
									<select name="employer">
                                        <option value="0" <?php echo ($job['company']==0)?'selected="selected"':'';?>>---</option>
                                        <?php foreach ($employers_array as $emp){?>		
                                        <option value="<?php echo $emp['id']?>" <?php echo ($emp['id']==$job['company'])?'selected="selected"':'';?>><?php echo $emp['company']?></option>      
                                        <?php }?>
                                    </select>
                                </p>
                            </div>
                            <div class="row">
                                <p class="label">Job Category:</p>
                                <p>
                                    <select name="job_category">
                                        <option value="0" <?php echo ($job['category']==0)?'selected="selected"':'';?>>-Root-</option>
                                        <?php foreach ($categories_array as $cat){?>		
                                        <option value="<?php echo $cat['id']?>" <?php echo ($cat['id']==$job['category'])?'selected="selected"':'';?>><?php echo $cat['name']?></option>      
                                        <?php }?>
                                    </select>
                                </p>
                            </div>
                            <div class="row">
                                <p class="label">Job Title: <span>(on home page only first 50 charactors will be displayed.)</span></p>
                                <p><input type="text" name="job_title" class="textbox" value="<?php echo $job['title']; ?>"></p>
                            </div>
                            <div class="row">
                                <p class="label">Job Description:</p>
                                <p><textarea name="job_description" class="textarea"></textarea></p>
                            </div>
                            <div class="row">
                                <p class="label">Job Advertising Image:</p>
                                <p><input type="file" name="job_image" ></p>
                            </div>
                            <div class="row">
                                <p class="label">Salary:</p>
                                <p><input type="text" name="job_salary" class="textbox" value="<?php echo $job['salary']; ?>"></p>
                            </div>
                            <div class="row">
                                <p class="label">Salary Negotiable: </p>
                                <!--<p><input type="checkbox" value="1" name="job_salary_negotiable"></p>-->
                                <p><input type="text" name="job_salary_negotiable" value="<?php echo $job['negot_salary']; ?>"></p>							
                            </div>
                            <hr>
                            <div class="row">
                                <p class="label">Expire Date:<span>(Default is 2 weeks from today)</span></p>
                                <p><input type="text" name="job_expire_date" class="textbox" value="<?php echo $job['exp_date']; ?>"></p>
                            </div>
                            <div class="row">
                                <p><input type="submit" value="Submit" name="job_submit"></p>
                            </div>
                        </form>
                    </div>
                    <div class="message">
						<?php  
                        if(isset($message)){
                        	echo $message;
                        }
                        ?>
                    </div>
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