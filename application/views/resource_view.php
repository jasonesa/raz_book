
            <div role="main">
                <h1>Profile</h1>
                <!-- Start Sidebar -->
                <div class="column-one-third">
                    <img width="250" height="250" src="<?php echo $profile_picture ?>"/>
                </div>
                <div class="column-two-third">
                    <!-- Start Profile View -->
                    <section class="preview">
                        <h2><?php echo $resource -> name; ?></h2>
                        <p><strong>Position:</strong> <?php echo $resource -> position; ?></p>
                        <p><strong>Account:</strong> Razorfish Studio</p>
                        <p><strong>About me:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p><strong>Skills:</strong> 
						<?php
						$skills = $skills -> result();
						foreach ($skills as $skill) {
							$skill_name = (!next($skills)) ? $skill -> skillname : $skill -> skillname . ', ';
							echo $skill_name;
						}
					?>
						</p>
                        <p><strong>Portfolio:</strong> <a href="#">www.jasonzumbado.com</a></p>
                        <p></p>
                        <p><strong>Contact Jason:</strong></p>
                        <ul>
                            <li><p><strong>Skype:</strong> jasonzv</p></li>
                            <li><p><strong>AIM:</strong> jasonzv</p></li>
                            <li><p><strong>Email:</strong> <a href="#"><?php echo $resource->username;?></a> / <a href="#"><?php echo $resource->username;?></a></p></li>
                        </ul>
                        <a href="#" class="cta fl">View Resume</a>
                        <a href="#inline_content" class="cta confirm">Book</a>

                    </section>
                </div>
                <!-- Ends Sidebar -->
                <!-- This contains the hidden content for inline calls -->
                <div style='display:none'>
                	<?php if($starts!=null && $end!=null):?>
                    <div id='inline_content' style='padding:10px; background:#fff;'>
                        <p>You are about to book this resources from <?php echo urldecode($starts);?> to <?php echo urldecode($ends);?></p>
                        <form action="<?php echo base_url()?>reservation/book_resource" method="post">
                            <input type="hidden" name="resource_id" value="<?php echo $resource->idresource;?>"/>
                            <input type="hidden" name="start_date" value="<?php echo urldecode($starts);?>"/>
                            <input type="hidden" name="end_date" value="<?php echo urldecode($ends);?>"/>
                            <input type="text" name="reservation_name" placeholder="Add a name or description for the project" />
                            <input type="submit" class="cta bookNow" value="Book Now"/>  or  
                            <a id="click" class="cta" href="<?php echo base_url()?>reservation/all">Add to existent reservation</a>
                        </form>
                    </div>
                    <?php endif;?>
                    <div id='inline_content' style='padding:10px; background:#fff;'>
                    	<form action="<?php echo base_url()?>reservation/book_resource" method="post">
                            <input type="hidden" name="resource_id" value="<?php echo $resource->idresource;?>"/>
                            <p>You are about to book this resources from </p>
                            <input class="shortBox datePicker" name="start_date" type="text" placeholder="Select a Date" /><p> to </p>
                            <input class="shortBox datePicker" name="end_date" type="text" placeholder="Select a Date" />
                            <input type="text" class="projectName" name="reservation_name" placeholder="Add a name or description for the project" />
                            <!-- <input type="submit" class="cta bookNow" value="Book Now"/>  or  
                            <a id="click" class="cta" href="<?php echo base_url()?>reservation/all">Add to existent reservation</a> -->
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- Ends Main Container -->