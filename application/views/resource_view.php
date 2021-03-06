
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
                        <p><strong>About me:</strong><?php echo $resource -> description; ?></p>
                        <p><strong>Skills:</strong> 
						<?php
						$skills = $skills -> result();
						foreach ($skills as $skill) {
							$skill_name = (!next($skills)) ? $skill -> skillname : $skill -> skillname . ', ';
							echo $skill_name;
						}
					?>
						</p>
                        <p><strong>Portfolio:</strong> <a href="#">www.<?php echo $resource -> name?>.com</a></p>
                        <p></p>
                        <p><strong>Contact <?php echo $resource->name?>:</strong></p>
                        <ul>
                            <li><p><strong>Skype:</strong><?php echo $resource -> skype?></p></li>
                            <li><p><strong>AIM:</strong><?php echo $resource -> aim?></p></li>
                            <li><p><strong>Email:</strong> <a href="#"><?php echo $resource->username;?></a> / <a href="#"><?php echo $resource->email_alt;?></a></p></li>
                        </ul>
                        <?php if($resume):?>
                        <a href="<?php echo $resume;?>" target="_blank" class="cta fl">View Resume</a>
                        <?php endif;?>
                        <a href="#inline_content" class="cta confirm">Book</a>

                    </section>
                </div>
                <!-- Ends Sidebar -->
                <!-- This contains the hidden content for inline calls -->
                <div style='display:none'>
                    <div id='inline_content' style='padding:10px; background:#fff;'>
                        <form action="<?php echo base_url()?>reservation/book_resource" method="post">
                            <input type="hidden" name="resource_id" value="<?php echo $resource->idresource;?>"/>
                            <p>You are about to book this resources from <?php echo urldecode($starts);?></p>
                            <input type="<?php echo $input_kind;?>" name="start_date" class="shortBox datePicker" value="<?php echo urldecode($starts);?>"/>
                            <p>to <?php echo  urldecode($ends);?></p>
                            <input type="<?php echo $input_kind;?>" name="end_date" class="shortBox datePicker" value="<?php echo urldecode($ends);?>"/>
                            <input type="text" class="rName" name="reservation_name" placeholder="Add a name or description for the project" />
                            <input type="submit" class="cta bookNow" value="Book Now"/>  or  
                            <a id="click" class="cta" href="<?php echo base_url()?>reservation/all">Add to existent reservation</a>
                        </form>
                    </div>             
                </div>
            </div>
            <!-- Ends Main Container -->