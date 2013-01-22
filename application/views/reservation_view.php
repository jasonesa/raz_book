<?php
           	
           ?>
            <div role="main">
                 <h1>Create a reservation</h1>
                <!-- Start Sidebar -->
                <div class="column-three-third">
                    <!-- Start Profile View -->
                    <div class="createEdit">
                        <form  action="<?php echo base_url()?>reservation/book_resources" method="post">
                        	 <input type="hidden" name="reservation_id" value="<?php echo $id_reservation;?>"/>
                            <fieldset>
                                <label>Name:</label>
                                <input type="text" name="user" value="<?php echo $description;?>"/>
                            </fieldset>
                            <fieldset>
                                <label>Reporter:</label>
                                <input type="text" name="user" value="<?php echo $user_iduser;?>">
                            </fieldset>
                            <fieldset>
                                <label>Description:</label>
                                <textarea rows="8" cols="56"> <?php echo $description;?></textarea>
                            </fieldset>
                            <fieldset>
                                <label>Account:</label>
                                <input type="text" name="user">
                            </fieldset>
                            <fieldset>
                                <label>reservation Start:</label>
                                <input id="datepicker" type="text" name="start_date" value="<?php echo $starts; ?>" />
                                <label class="center">until</label>
                                <input id="datepickerTwo" type="text" name="end_date"  value="<?php echo $ends; ?>"/>
                            </fieldset>
                            <fieldset class="addRemove">
                                <label>Available Resources:</label>
                                <select multiple id="available">
                                    <?php foreach ($available_resources as $resource):?>
                                    <option value="<?php echo $resource->idresource?>"><a href="#"><?php echo $resource->name. ' ('.$resource->position.')'?></a></option>
                                    <?php endforeach;?>
                                </select>   
                            </fieldset>
                            <fieldset class="addRemove btnBox">
                                <label>Add</label>
                                <a href="#" class="cta add">&rarr;</a>
                                <label>Remove</label>
                                <a href="#" class="cta">&larr;</a>
                            </fieldset>
                            <fieldset class="addRemove">
                                <label>reservation assign members:</label>
                                <select multiple name="members[]" id="assigned">

                                    <?php foreach ($resources as $resource):?>
                                    <option value="<?php echo $resource->idresource?>"><a href="#"><?php echo $resource->name.' ('.$resource->position.')'?></a></option>
                                    <?php endforeach;?>
                                </select>    
                            </fieldset>
                            <fieldset>
                                <input type="submit" value="Create" class="cta" />
                            </fieldset>
                        </form> 
                    </div>
                </div>
                <!-- Ends Sidebar -->
            </div>
            <!-- Ends Main Container -->
          