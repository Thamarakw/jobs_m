<?php require_once("includes/config.php"); ?>
<?php
$message='';
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$filters['id']=$id;                                                         
	$result=$db->SelectRows("tj_employers",$filters);							
	if (! $result) {
    	$db->Kill();
	}
	$employer=$db->RowArray();	
	var_dump($employer);
}
elseif(isset($_POST['id'])){
	$updates['company'] 		= MySQL::SQLValue($_POST["employer_name"]);
	$updates['address_line_1'] 	= MySQL::SQLValue($_POST["employer_address_line1"]);
	$updates['address_line_2'] 	= MySQL::SQLValue($_POST["employer_address_line2"]);
	$updates['city'] 			= MySQL::SQLValue($_POST["employer_city"]);
	$updates['name'] 			= MySQL::SQLValue($_POST["employer_contact_person"]);
	$updates['telephone'] 		= MySQL::SQLValue($_POST["employer_phone"]);
	$updates['email'] 			= MySQL::SQLValue($_POST["employer_email"]);
	$updates['status'] 			= MySQL::SQLValue(1);
	//if (! $db->UpdateRows("test", $values, array("id" => 1))) $db->Kill
	if (! $db->UpdateRows("tj_employers", $updates, array("id" => $_POST['id']))) $db->Kill;		//????????????
	
	$id=$_POST['id'];
	$filters['id']=$id;                                                         
	$result=$db->SelectRows("tj_employers",$filters);							
	if (! $result) {
    	$db->Kill();
	}
	$employer=$db->RowArray();    
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
<body class="employers">							  
	<div id="container">							
		<?php include("elements/header.php"); ?>		
		<div class="row">
			<aside class="left-column">
				<?php include("elements/left_sidebar.php"); ?>
			</aside>
			<section id="main">	
				<div class="main-inner">
					<h1>Edit Employer/Company</h1>
					<p class="breadcum"><a href="employers.php">Employers</a> &rarr; Add New</p>
					<div id="edit-employer-wrapper">
						<div class="content">
							 <form id="edit-employer" action="employers_edit.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="">
                                        <p class="label">Employer/ Company Name:</p>
                                        <p><input type="text" name="employer_name" class="textbox" value="<?php echo $employer['company'];?>"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">Address Line 1:</p>
                                        <p><input type="text" name="employer_address_line1" class="textbox" value="<?php echo $employer['address_line_1'];?>"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">Address Line 2:</p>
                                        <p><input type="text" name="employer_address_line2" class="textbox" value="<?php echo $employer['address_line_2'];?>"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">City:</p>
                                        <p><input type="text" name="employer_city" class="textbox" value="<?php echo $employer['city'];?>"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">Logo:</p>
                                        <p><input type="file" name="employer_logo_image" ></p>
                                        <div>
											<?php 
                                                
                                            ?>
                                    	</div>
                                    </div>
                                </div>
                                <!--<hr>-->
                                <div class="row">
                                    <div class="">
                                        <p class="label">Contact Person:</p>
                                        <p><input type="text" name="employer_contact_person" class="textbox" value="<?php echo $employer['name'];?>"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">Email:</p>
                                        <p><input type="text" name="employer_email" class="textbox" value="<?php echo $employer['email'];?>"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">Phone:</p>
                                        <p><input type="text" name="employer_phone" class="textbox" value="<?php echo $employer['telephone'];?>"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <p>	<input type="hidden" name="id" value="<?php echo $employer['id'];?>" >
                                        <input type="submit" value="Edit" name="category_submit" class="button button-blue"></p>
                                </div>
                            </form>	
                        </div>
						<div class="message">
							<?php																		
                                if(isset($message)){
                                    echo "aaa";
                                }
                            ?> 
						</div>                                                   
                    </div><!-- edit-employer-wrapper -->                     
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