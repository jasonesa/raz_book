<!-- Ends Header -->
<!-- Starts Main Container -->
<div role="main">
	<h1>Bosz Digital Team</h1>
	<!----------------------------------------------------------------------------------->
	<div class="column-one-third maxHeight">
		<?php foreach($available_resources as $resource):?>
		<section class="preview">

			<img width="55" height="55" src="<?php echo base_url();?>images/boszbook-demo-img.jpg"/>
			<p>
				<strong><?php echo $resource->name?></strong>
			</p>
			<p>
				<?php echo $resource->position?>
			</p>
			<ul>
				<li>
					<a href="<?php echo base_url().'resource/'. $resource->idresource.'/'.$starts.'/'.$ends?>">View more</a>
				</li>
				<li>
					&bullet;
				</li>
				<li>
					<a href="#">Book</a>
				</li>
			</ul>
		</section>
		<?php endforeach; ?>

	</div>
	<!----------------------------------------------------------------------------->

	<div class="column-one-third maxHeight">
		<?php foreach($available_resources as $resource):?>
		<section class="preview">

			<img width="55" height="55" src="<?php echo base_url();?>images/boszbook-demo-img.jpg"/>
			<p>
				<strong><?php echo $resource->name?></strong>
			</p>
			<p>
				<?php echo $resource->position?>
			</p>
			<ul>
				<li>
					<a href="<?php echo base_url().'resource/'. $resource->idresource?>">View more</a>
				</li>
				<li>
					&bullet;
				</li>
				<li>
					<a href="#">Book</a>
				</li>
			</ul>
		</section>
		<?php endforeach; ?>
	</div>
	<!----------------------------------------------------------------------------->
	<div class="column-one-third maxHeight">
		<?php foreach($available_resources as $resource):?>
		<section class="preview">

			<img width="55" height="55" src="<?php echo base_url();?>images/boszbook-demo-img.jpg"/>
			<p>
				<strong><?php echo $resource->name?></strong>
			</p>
			<p>
				<?php echo $resource->position?>
			</p>
			<ul>
				<li>
					<a href="<?php echo base_url().'resource/'. $resource->idresource?>">View more</a>
				</li>
				<li>
					&bullet;
				</li>
				<li>
					<a href="#">Book</a>
				</li>
			</ul>
		</section>
		<?php endforeach; ?>
	</div>
	<!----------------------------------------------------------------------------->
</div>

<!-- Ends Sidebar -->
<!-- Ends Main Container -->