<!-- Ends Header -->
<!-- Starts Main Container -->
<div role="main">
	<h1>Bosz Digital Team</h1>
	<!-- ------------------------------------------------------------------------------ -->
	<div class="column-one-third maxHeight">
		<?php foreach($available_resources as $resource):?>
		<section class="preview">

			<img width="55" height="55" src="<?php echo base_url();?>images/boszbook-demo-img.jpg"/>
			<p>
				<strong><?php echo $resource->name?></strong>
				<input type="checkbox" name="" value="">
			</p>
			<p>
				<?php echo $resource->position?>
			</p>
			<ul>
				<li>
					<a href="<?php echo base_url().'resource/'. $resource->idresource.'/'.$starts.'/'.$ends?>">View more</a>
				</li>				
			</ul>
		</section>
		<?php endforeach; ?>
	</div>
	<!-- ------------------------------------------------------------------------------ -->

	<div class="column-one-third maxHeight">
		<?php foreach($available_resources as $resource):?>
		<section class="preview">

			<img width="55" height="55" src="<?php echo base_url();?>images/boszbook-demo-img.jpg"/>
			<p>
				<strong><?php echo $resource->name?></strong>
				<input type="checkbox" name="" value="">
			</p>
			<p>
				<?php echo $resource->position?>
			</p>
			<ul>
				<li>
					<a href="<?php echo base_url().'resource/'. $resource->idresource?>">View more</a>
				</li>
			</ul>
		</section>
		<?php endforeach; ?>
	</div>
	<!-- ------------------------------------------------------------------------------ -->
	<div class="column-one-third maxHeight">
		<?php foreach($available_resources as $resource):?>
		<section class="preview">

			<img width="55" height="55" src="<?php echo base_url();?>images/boszbook-demo-img.jpg"/>
			<p>
				<strong><?php echo $resource->name?></strong>
				<input type="checkbox" name="" value="">
			</p>
			<p>
				<?php echo $resource->position?>
			</p>
			<ul>
				<li>
					<a href="<?php echo base_url().'resource/'. $resource->idresource?>">View more</a>
				</li>
			</ul>
		</section>
		<?php endforeach; ?>
	</div>
	<!-- ------------------------------------------------------------------------------ -->
	<form id="bookMore" action="" method="post">
	    <!-- <input type="hidden" name="resource_id" value="<?php echo $resource->idresource;?>"/>
	    <input type="hidden" name="start_date" value="<?php echo urldecode($starts);?>"/>
	    <input type="hidden" name="end_date" value="<?php echo urldecode($ends);?>"/>
	    <input type="text" name="project_name" placeholder="Add a name or description for the project" /> -->

	    <input type="submit" class="cta bookNow" value="Book all"/>
	</form>

</div>

<!-- Ends Sidebar -->
<!-- Ends Main Container -->