<?php require_once("includes/config.php"); ?>
<?php
$result = $db->SelectRows("tj_categories");
if (! $result) {
    $db->Kill();
}
$categories = $db->RecordsArray(MYSQL_ASSOC);
$categories_count = $db->RowCount();
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
					<h1>Job Categories</h1>
 					<p><a href="job_categories_add.php" class="button button-green">Add New</a></p>
					<div>
						<table class="data-table">
							<tr>
                            	<th class="center-text" width="75">#</th>
                                <th class="left-text">Category Name</th>
                                <th class="center-text" width="75">Parent Id</th>
                                <th  class="center-text" width="75">Status</th>
                                <th width="35">&nbsp;</th>
                                <th width="35">&nbsp;</th>
                            </tr>
                            <?php foreach($categories as $category){?>
                            <tr>
                                <td class="center-text"><?php echo $category['id'];?></td>
                                <td><?php echo $category['name'];?></td>
                                <td class="center-text"><?php echo $category['parent'];?></td>
                                <td class="center-text"><?php echo $category['status'];?></td>
                                <td class="center-text"><a href="job_categories_edit.php?id=<?php echo $category['id'];?>"><i class="fa fa-pencil"></i></a></td>
                                <td class="center-text"><a href="job_categories_delete.php?id=<?php echo $category['id'];?>"><i class="fa fa-remove"></i></a></td>
                            </tr>
                            <?php }?>
						</table>
						<?php if($categories_count==0){?>
                        <div class="alert center-text">
                        	<p>No data to display.</p>
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
</html>