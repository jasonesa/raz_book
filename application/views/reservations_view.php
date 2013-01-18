 <div role="main">
                <h1>All Reservations</h1>
                <div class="column-three-third">
             
                    <!-- Start Project View -->
                    <?php foreach($reservations as $reservation):?>
                    	<section>
                        <img width="55" height="55" src="<?php echo base_url();?>images/boszbook-demo-img.jpg"/>
                        <a href="<?php echo $reservation->idreservation?>" class="editBtn">Edit</a>
                        <h3><a href="<?php echo $reservation->idreservation?>"><?php echo $reservation->description?></a></h3>
                        <p><strong>Account Lead:</strong> <?php echo $reservation->user_id?></p>
                        <p><strong>Project Description:</strong> <?php echo $reservation->description?>.</p>
                    </section>
                    	
                    <?php endforeach;?>
                 
                    <!-- Ends Project View -->
                    <ul class="pagination">
                        <li><a hrfe="#">&larr;</a></li>
                        <li><a hrfe="#" class="cta">1</a></li>
                        <li><a hrfe="#" class="cta">2</a></li>
                        <li><a hrfe="#" class="cta">3</a></li>
                        <li><a hrfe="#" class="cta">4</a></li>
                        <li><a hrfe="#" class="cta">5</a></li>
                        <li><a hrfe="#">&rarr;</a></li>
                    </ul>
                </div>
            </div>