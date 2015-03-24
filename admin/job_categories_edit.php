<?php require_once("includes/config.php"); ?>
<?php
//Retrieve clicked data row
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$filters['id']=$id;            							                                            
	$result=$db->SelectRows("tj_categories",$filters);							
	if (! $result) {
    	$db->Kill();
	}
	$category=$db->RowArray();		   
}

//Edit data
elseif(isset($_POST['id'])){
	$updates['name'] 		= MySQL::SQLValue($_POST["category_name"]);
	$updates['description'] = MySQL::SQLValue($_POST["description"]);
	$updates['parent'] 		= MySQL::SQLValue($_POST["job_category"]);
	$updates['status'] 		= MySQL::SQLValue($_POST["status"]);

	if (! $db->UpdateRows("tj_categories", $updates, array("id" => $_POST['id']))) {		
		$db->Kill();		
	}
	else{
		$message="Record Changed";	
	}
	
	//Place changed data on form input itself
	$id=$_POST['id'];
	$filters['id']=$id;                                                         
	$result=$db->SelectRows("tj_categories",$filters);							
	if (! $result) {
    	$db->Kill();
	}
	$category=$db->RowArray();    
}

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
<!-- Body -->
<body class="categories">
	<div id="container">
		<?php include("elements/header.php"); ?>
        <div class="row">
			<aside class="left-column">
            	<?php include("elements/left_sidebar.php"); ?>
			</aside>
			<section id="main">	
				<div class="main-inner">
                	<h1>Edit Job Categories</h1>
                	<p class="breadcum"><a href="job_categories.php">Job Categories</a> &rarr; Add New</p>
                	<div id="edit-category-wrapper">    
                    	<div class="content">          
                            <form id="new-category" action="job_categories_edit.php" method="post">                        
                                <div class="row">
                                    <div class="">
                                        <p class="label">Category Name:</p>
                                        <p><input name="category_name" type="text" value="<?php echo $category['name'];?>"></p>
                                    </div>
                                </div>                       
                                <div class="row">
                                    <div class="">
                                        <p class="label">Parent:</p>
                                        <p>
                                        <select name="job_category">
                                            <option value="0" <?php echo ($category['parent']==0)?'selected="selected"':'';?>>-Root-</option>
                                            <?php foreach ($categories_array as $cat){?>		
                                            <option value="<?php echo $cat['id']?>" <?php echo ($category['parent']==$cat['id'])?'selected="selected"':'';?>><?php echo $cat['name']?></option>      <!-- ??????????? -->
                                            <?php }?>
                                        </select>
                                        </p>
                                    </div>
                                </div>                        
                                <div class="row">
                                    <div class="">
                                        <p class="label">Description:</p>
                                        <p><textarea name="description" ><?php echo $category['description'];?></textarea></p>
                                    </div>
                                </div>                        
                                <div class="row">
                                    <div class="">
                                        <p class="label">Status:</p>
                                        <select name="status" class="dropdown">
                                            <option value="1" <?php echo ($category['status']==1)?'selected="selected"':'';?>>Yes</option>
                                            <option value="0" <?php echo ($category['status']==0)?'selected="selected"':'';?>>No</option>
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
                                    <p>	<input type="hidden" name="id" value="<?php echo $category['id'];?>" >
                                        <input type="submit" value="Edit" name="category_submit" class="button button-blue"></p>                     
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
                        
                        <!--TESTING : TO DELETE-->
                        <p>option value="0" <?php echo ($category['parent']==0)?'selected="selected"':'';?>:-Root-</p>
						<?php foreach ($categories as $cat){?>		<!-- ??????????? -->
                        <p>option value="<?php echo $cat['id']?>" <?php echo ($category['parent']==$cat['id'])?'selected="selected"':'';?>:<?php echo $cat['name']?></p>      <!-- ??????????? -->
                        <?php }?>
                       <!-- ------>
                        
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