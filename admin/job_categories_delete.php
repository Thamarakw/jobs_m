<?php require_once("includes/config.php"); ?>
<?php
if(isset($_GET['id'])){		
	$id=$_GET['id'];
	$filters['id']=$id;                                                        
	$result=$db->SelectRows("tj_categories",$filters);							
	if (! $result) {
    	$db->Kill();
	}
	$category=$db->RowArray();
}
elseif(isset($_POST['id'])){
	$filter["id"] = $_POST['id'];													
	$result = $db->DeleteRows("tj_categories", $filter);
	if (! $result) {
		$db->Kill();
	}
	else{
		header("location:job_categories.php");
		exit;
	}
}

$result2=$db->SelectRows("tj_categories");
if(!$result2){
	$db->Kill();
}
$categories=$db->RecordsArray(MYSQL_ASSOC);
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
<body class="categories">
	<div id="container">
		<?php include("elements/header.php"); ?>
        <div class="row">
			<aside class="left-column">
            	<?php include("elements/left_sidebar.php"); ?>
			</aside>
			<section id="main">	
				<div class="main-inner">
                	<h1>Delete Job Category</h1>
                	<p class="breadcum"><a href="job_categories.php">Job Categories</a> &rarr; Add New</p>
                	<div id="delete-category-wrapper">                      	 
                    	<table width="" cellpadding="0" cellspacing="0" border="1">           
                        	<tr>                       
								<div class="row">
                            		<div class="">
                                		<p class="label">Category Name:</p>
                                		<p><input name="category_name" type="text" value="<?php echo $category['name'];?>"></p>
                            		</div>
								</div>
                       	</tr>
                            <tr>
								<div class="row">
                        			<div class="">
										<p class="label">Parent:</p>
										<p>
											<select name="job_category">
												<option value="0" <?php echo ($category['parent']==0)?'selected="selected"':'';?>>-Root-</option>
                                                <?php foreach ($categories as $cat){?>
												<option value="<?php echo $cat['id']?>" <?php echo ($category['parent']==$cat['id'])?'selected="selected"':'';?>><?php echo $cat['name']?></option>
                                                <?php }?>
											</select> 
										</p>
                           		 	</div>
                        		</div>
                        	</tr>
                            <tr>
								<div class="row">
                        			<div class="">
										<p class="label">Description:</p>
										<p><textarea name="description" ><?php echo $category['description'];?></textarea></p>
                          		</div>
								</div>
                        	</tr>
                            <tr>
								<div class="row">
                        			<div class="">
                            			<p class="label">Category Image:</p>
										<p><input type="file" name="category_image"></p>
                           			</div>
                        		</div>
                        	</tr>
                            <tr>
                       			<form id="new-category" action="job_categories_delete.php" method="post"> 
									<div class="row">                                                     
                            			<p>	<input type="hidden" name="id" value="<?php echo $category['id'];?>" >
                                			<input type="submit" value="Delete" name="category_submit" class="button button-blue"></p>
									</div>
								</form>
                       		</tr>
                    	</table>
                	</div><!-- delete-category-wrapper -->
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