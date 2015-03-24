<?php require_once("includes/config.php"); ?>
<?php
if($_POST)
{
	$values['company'] 			= MySQL::SQLValue($_POST["employer_name"]);
	$values['address_line_1'] 	= MySQL::SQLValue($_POST["employer_address_line1"]);
	$values['address_line_2'] 	= MySQL::SQLValue($_POST["employer_address_line2"]);
	$values['city'] 			= MySQL::SQLValue($_POST["employer_city"]);
	$values['name'] 			= MySQL::SQLValue($_POST["employer_contact_person"]);
	$values['telephone'] 		= MySQL::SQLValue($_POST["employer_phone"]);
	$values['email'] 			= MySQL::SQLValue($_POST["employer_email"]);  //$values['record_created'] = MySQL::SQLValue();	//$values['record_modified']= MySQL::SQLValue();
	$values['status'] 			= MySQL::SQLValue(1);									
	
	$employer_insert = $db->InsertRow("tj_employers", $values);
	if($employer_insert){
		$message = "<p>Record Saved</p>";					
		
		include("includes/class.upload.php");  //Start File upload   to test
		$dir_dest = "/wamp/www/jobs_m/imagesemployers_logos";
		$handle = new Upload($_FILES['employer_logo_image']);																							
		if ($handle->uploaded) {
			$handle->file_new_name_body = "emp_logo_".$employer_insert;							//?????????????
			$handle->Process($dir_dest);
			if ($handle->processed) {
	            $upload_message = "<p>Logo file upoladed.</p>";
	            $uploaded_data = $handle; //Experiment purpose. Remove later.			
	        } 
			else {
	            $upload_message = "<p>Logo file upolad error.</p>";
	            $uploaded_data = $handle; //Experiment purpose. Remove later.
	        }
		}
	}
	else{
		$message = "<p>Record Insert Error</p>";
	}
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
					<h1>Add New Employer/Company</h1>
					<p class="breadcum"><a href="employers.php">Employers</a> &rarr; Add New</p>
					<div id="new-employer-wrapper">
						<div class="content">
							<form id="new-employer" action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="">
                                        <p class="label">Employer/Company Name:</p>
                                        <p><input type="text" name="employer_name" class="textbox"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">Address Line 1:</p>
                                        <p><input type="text" name="employer_address_line1" class="textbox"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">Address Line 2:</p>
                                        <p><input type="text" name="employer_address_line2" class="textbox"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">City:</p>
                                        <p><input type="text" name="employer_city" class="textbox"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">Logo:</p>
                                        <p><input type="file" name="employer_logo_image"></p>
    
                                    </div>
                                </div>
                                <!--<hr>-->
                                <div class="row">
                                    <div class="">
                                        <p class="label">Contact Person:</p>
                                        <p><input type="text" name="employer_contact_person" class="textbox"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">Email:</p>
                                        <p><input type="text" name="employer_email" class="textbox"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <p class="label">Phone:</p>
                                        <p><input type="text" name="employer_phone" class="textbox"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <p><input type="submit" value="Submit" name="category_submit" class="button button-blue"></p>
                                </div>
                        	</form>	
						</div> 
                         <div class="message">
							 <?php																		
                             	if(isset($message)){
									echo $message;
                                }
							?>
                            <br/>
                            <?php	
                            	if(isset($upload_message)){
                                	echo $upload_message;
                                }
                            ?>
                         </div>                   
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