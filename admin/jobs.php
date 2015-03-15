<?php require_once("includes/config.php"); ?>
<?php 
	$result=$db->SelectRows("tj_jobs");	
	if(!$result){
		$db->kill();
		$vacancies = false;	
		$vacancies_count=0;
	}
	elseif($db->RowCount()>0){	
		$vacancies = $db->RecordsArray(MYSQL_ASSOC);	
		$vacancies_count=$db->RowCount();
	}
	else{
		$vacancies = false;	
		$vacancies_count=0;	
	}
	
	
	$employers=$db->SelectRows("tj_employers", null, array("id", "company"));
	
	if(!$employers){
		$db->kill();
	}
	elseif($db->RowCount()>0){
		$employers_ass_array=$db->RecordsArray(MYSQL_ASSOC);
		$employers_array = array();
		$employers_array[0] = "NONE";
		foreach($employers_ass_array as $emp){
			$employers_array[$emp['id']] = $emp['company'];
		}
	}
	//var_dump($employers_array);
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
<body class="jobs">
	<div id="container">
		<?php include("elements/header.php"); ?>
		<div class="row">
			<aside class="left-column">
            	<?php include("elements/left_sidebar.php"); ?>
			</aside>
			<section id="main">	
				<div class="main-inner">
					<h1>Jobs</h1>
					<p><a href="jobs_add.php" class="button button-green">Add New</a></p>
					<div>
						<table class="data-table">
							<tr>
                            	<th class="center-text" width="75">#</th>
                            	<th class="left-text" >Employer</th>
                            	<th class="left-text" >Category</th>
                            	<th class="left-text" >Job Title</th>
                            	<th class="center-text" width="35">Status</th>
                                <th width="35">&nbsp;</th>
                             	<th width="35">&nbsp;</th>
                             	<th width="35">&nbsp;</th>
                            </tr>
                            <?php foreach ($vacancies as $vacancy){?>
							<tr class="inactive">
                            	<td class="center-text"><?php echo $vacancy['id'];?></td>
                                <td class=""><?php echo $employers_array[$vacancy['company']];?>
                                <?php //echo $vacancy['company'];?>
                                </td>
                            	<td><?php echo $vacancy['category'];?></td>
                            	<td class=""><?php echo $vacancy['title'];?></td>
                                <td class="center-text"><?php echo $vacancy['status'];?></td>
                            	<td class="center-text"><i class="fa fa-ban" title="Inactive"></i></td>
                                <td class="center-text"><a href="jobs_edit.php?id=<?php echo $vacancy['id'];?>"><i class="fa fa-pencil"></i></a></td>
                                <td class="center-text"><a href="jobs_delete.php?id=<?php echo $vacancy['id'];?>"><i class="fa fa-remove"></i></a></td>
                            </tr>
                            <?php }?>
						</table>
						<?php if($vacancies_count==0){?>
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
</html>