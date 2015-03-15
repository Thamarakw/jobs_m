
<ul class="categories">
	<?php 
		$result=$db1->SelectRows("tj_categories", "", array("id", "name"), array("name"));
		//echo $db1->GetLastSQL();
		if(!$result){
			$db1->Kill();
		}
		
		$categories = $db1->RecordsArray(MYSQL_ASSOC);
	?>
    <table class="data-table">
    	<?php foreach($categories as $category){?>
    	<tr class="">
        	<td class=""><a href="jobs.php"><?php echo $category['name'];?></a></td>
        </tr>
        <?php }?>
    </table>
</ul>