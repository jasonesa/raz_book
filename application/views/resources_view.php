<!-- Ends Header -->
<!-- Starts Main Container -->
<div role="main">
	<h1>Bosz Digital Team</h1>
	<!-- ------------------------------------------------------------------------------ -->
	
	<?php
	//Separate resources by teams(html columns), could've been done with templates, choose this way because of performance
	$continue = true;
	$continue_inner = true;
	$current_team = $available_resources[1] -> table_id_team;
	while ($continue):
		$continue_inner = true;?>
		<div class="column-one-third maxHeight">
		<?php
		while ($continue_inner):
			$resource = current($available_resources);
			var_dump($resource);
			echo 'resonrce->table_id_team='.$resource -> table_id_team.' $current_team'.$current_team.'<br/>';
			if ($resource -> table_id_team != $current_team):
				$current_team = $resource -> table_id_team;
				$continue_inner = false;
				prev($available_resources);
			else:?>
				<section class="preview">
					<img width="55" height="55" src="<?php echo base_url(); ?>images/boszbook-demo-img.jpg"/>
					<p>
					<strong><?php echo $resource->name?></strong>
					<input type="checkbox" name="" value="">
					</p>
					<p><?php echo $resource -> position; ?></p>
					<a href="<?php echo base_url().'resource/'. $resource->idresource.'/'.$starts.'/'.$ends?>">View more</a>
				</section>
			<?php endif;
					next($available_resources);
					if (key($available_resources) === null) {
					$continue = false;
					$continue_inner = false;
					}
		endwhile;?>
		</div>
	<?php endwhile; ?>
	
	<!-- ------------------------------------------------------------------------------ -->

	<form id="bookMore" action="" method="post">
	    <input type="hidden" name="resource_id" value="<?php echo $resource -> idresource; ?>"/>
	    <input type="hidden" name="start_date" value="<?php echo urldecode($starts); ?>"/>
	    <input type="hidden" name="end_date" value="<?php echo urldecode($ends); ?>"/>
	    <input type="text" name="project_name" placeholder="Add a name or description for the project" />

	    <input type="submit" class="cta bookNow" value="Book all"/>
	</form>

</div>

<!-- Ends Sidebar -->
<!-- Ends Main Container -->