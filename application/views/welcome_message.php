
            <!-- Ends Header -->
            <!-- Starts Main Container -->
            <div role="main">
                <h1>Section Title</h1>
                
                 <div class="column-two-third">
                    <!-- Start reservation View -->
                    <div class="finderContent">
                        <h3>Find available members</h3>
                        <form action="<?php echo base_url()?>resource/all" method="get">
                            <fieldset>
                                <label>Start Date: </label>
                                <input class="shortBox datePicker" name="start_date" type="text" placeholder="Select a Date" />
                            </fieldset>
                            <fieldset><label>End Date: </label>
                                <input class="shortBox datePicker" name="end_date" placeholder="Select a Date" type="text" /></fieldset>
                            <!--fieldset>
                                <label>Skills: </label>
                                <input type="text" />
                            </fieldset-->
                            <fieldset>
                                <input class="cta" type="submit" value="Find" />
                            </fieldset>
                        </form>
                    
                    </div>
                    <!-- Ends reservation View -->
                </div>
             <aside>
                    <h2>Recent reservations</h2>
                    <a href="#" class="viewAll">view all</a>
                    <!--?php print_r($resources);?-->
			<?php foreach ($resources as $resource):?>
                                        
                   <section class="preview">
                        <img width="55" height="55" src="<?php echo base_url(); ?>images/boszbook-demo-img.jpg"/>
                        <p><strong><a href="<?php echo base_url().'resource/'.$resource->idresource?>"><?php echo $resource->name?></a></strong></p>
                        <p><strong>Position: </strong><?php echo $resource->position?></p>
                        <!--p><strong>reservation Description:</strong> <?php echo $reservation->description?></p-->
                    </section>         
		<?php endforeach; ?>		
		</aside>
		</div>
		
                <!-- Ends Sidebar -->
            <!-- Ends Main Container -->