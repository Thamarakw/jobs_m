<?php require_once("includes/config.php"); ?>
<?php
$employers = $db->SelectRows("tj_employers");		// Execute the select. 
//var_dump($result);	
if (! $employers) {    // If we have an error
    $db->Kill();   // Show the error and kill the script
}
$employers_array = $db->RecordsArray(MYSQL_ASSOC);	
//var_dump($employers);
$employers_count = $db->RowCount();
//var_dump($employers_count);
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
					<h1>Employers/Companies</h1>
					<p><a href="employers_add.php" class="button button-green">Add New</a></p>
                    <div>
                        <table class="data-table">
                            <tr>
                                <th class="center-text" width="55">#</th>
                                <th class="left-text">Employer/Company</th>
                                <th class="left-text">Contact Person</th>
                                <th class="left-text"width="200">E-Mail</th>
                                <th width="35">&nbsp;</th>
                                <th width="35">&nbsp;</th>
                            </tr>
                            <?php foreach($employers_array as $employer){?>
                            <tr>
                                <td class="center-text"><?php echo $employer['id'];?></td>
                                <td class=""><?php echo $employer['company'];?></td>
                                <td class=""><?php echo $employer['name'];?></td>
<!-- <a href="mailto: ..... -->	<td class=""><a href="mailto:<?php echo $employer['email'];?>"><?php echo $employer['email'];?></a></td>
                                <td class="center-text"><a href="employers_edit.php?id=<?php echo $employer['id'];?>"><i class="fa fa-pencil"></i></a></td>
                                <td class="center-text"><a href="employers_delete.php?id=<?php echo $employer['id']?>"><i class="fa fa-remove"></i></a></td>
                            </tr>
                            <?php }?>
                        </table>
                        <?php if($employers_count==0){?>
                            <div class="alert center-text">
                                No data to display.
                            </div>
                        <?php }?>
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
</html>`