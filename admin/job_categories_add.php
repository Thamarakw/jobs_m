<?php require_once("includes/config.php"); ?>
<?php 
$message='';
if($_POST){
	$values['name']			= MySQL::SQLValue($_POST['category_name']);
	$values['parent']		= MySQL::SQLValue($_POST['parent']);
	$values['description']	= MySQL::SQLValue($_POST['description']);
	$values['status']		= MySQL::SQLValue($_POST['status']);
	
	$result = $db->InsertRow("tj_categories", $values);
	if($result){
		$message= "Record Saved.";
	}
	else{
		$message="<p>Record Insertion Error.</p>";
	}		
}

	$result2 = $db->SelectRows("tj_categories");
	if (! $result2) {
		$db->Kill();
	}
	$categories = $db->RecordsArray(MYSQL_ASSOC);
	//var_dump($categories);
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
<!-- Body -->
<body class="job_categories">
	<div id="container">
		<?php include("elements/header.php"); ?>
        <div class="row">
			<aside class="left-column">
            <?php include("elements/left_sidebar.php"); ?>
			</aside>
			<section id="main">	
				<div class="main-inner">
                	<h1>Add New Job Categories</h1>
                	<p class="breadcum"><a href="job_categories.php">Job Categories</a> &rarr; Add New</p>
                	<div id="new-job_category-wrapper">  
                    	<div class="content">                           
                            <form id="new-jobcategory" action="job_categories_add.php" method="post">
                                <div class="row">
                                    <div class=""> 
                                        <p class="label">Category Name:</p>
                                        <p><input name="category_name" type="text"></p>
                                    </div>
                                </div>                            
                                <div class="row">
                                    <div class="">
                                        <p class="label">Parent:</p>
                                        <p>
                                        <select name="parent">
                                            <option value="0">-Root-</option>
                                            <?php foreach ($categories as $category){?>
                                            <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>  
                                            <?php }?>
                                        </select>
                                        </p>
                                    </div>
                                </div>                            
                                <div class="row">
                                    <div class="">
                                        <p class="label">Description:</p>
                                        <p><textarea name="description"></textarea></p>
                                    </div>
                                </div>                          
                                <div class="row">
                                    <div class="">
                                        <p class="label">Status:</p>
                                        <select name="status" class="dropdown">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>                           
                                <div class="row">
                                    <div class="">
                                        <p class="label">Category Image:</p>
                                        <p><input type="file" name="category_image"></p>
                                    </div>
                                </div>                            
                                <div class="row">
                                    <p><input type="submit" value="Submit" name="category_submit" class="button button-blue"></p>
                                </div>
							</form>
                		</div>
                        <div class="message">      
                    		<?php echo $message; ?>
                    	</div>
                	</div><!-- new-category-wrapper -->
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