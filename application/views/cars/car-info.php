<div class="container rounded bg-white shadow-lg mt-5 mb-5">
   	<div class="container pb-3">
   		<?php 
			if(validation_errors()!= false) {
				echo '<div class="alert mt-5 alert-danger" role="alert">';			 
				echo	validation_errors();					
				echo'</div>';				
			 }					
		?>	
						 			
   		<div class="row">
   			<div class="col-lg-6  ">
   				<div class="bg mt-4 mb-3 ">
   					 <img class="rounded" src="<?php echo site_url();?>assets/images/cars/<?php echo $car['image']; ?>">
 				 </div>
   			</div>
   			<div class="col-lg-6">
   				<div class="mt-3 mb-3">
   					<h3 class=" display-4 text-dark"><?php echo $car['name'] ?></h3>
						<p><strong >Type: </strong><?php echo $car['type']; ?></p>
						<p><strong>Built: </strong><?php echo $car['build']; ?></p>
						<p><strong>Transmission: </strong><?php echo $car['transmission']; ?></p>
						<p><strong>Fuel: </strong> <?php echo $car['fuel'] ?></p>
						<p><strong>Engine: </strong> <?php echo $car['engine'] ?></p>
						<p><strong>Max Speed: </strong> <?php echo $car['max_speed'] ?></p>
						<p><strong>Price/Day: </strong> <?php echo $car['price_day'] ?></p>

   				</div>
   			</div>
   		</div>

   		<div class="mt-5">
   			<div class="text-center mb-3">
   				<div class="row">
   					<div class="col"> <p class="rounded text-white shadow rounded-pill bg-primary">In Use</p></div>
   					<div class="col"> <p class="rounded border shadow rounded-pill bg-white">Free to use</p></div>
   				</div> 
   			</div>
   			<div class="row">
   				<div class="col-lg-6 col-md-12 col-sm-12 text-center mb-5">
   					<h3 class=" display-4 text-dark mb-3"><?php echo $currentmonthname; ?></h3>
   					<div class="calendar-container bg-white shadow-lg rounded">
					  <div class="calendar">
					  	<span >Mon</span>
					  	<span >Tue</span>
					  	<span >Wed</span>
					  	<span >Thu</span>
					  	<span >Fri</span>
					  	<span >Sat</span>
					  	<span >Sun</span>
					    <?php 
					    	for($i=1;$i<=$firstmonthcounter;$i++){
					    		echo '<div class="day"></div>';
					    	}	    	
					    	for($i=1;$i<=$cmlastday;$i++){
					    		$flage=false;
					    		foreach ($reservations as $reservation) {
					    			$date = new DateTime(date('Y').'-'.$currentmonth.'-'.$i);
					    			$day=$date->format('Y-m-d');
					    			if($reservation['date_from']<=$day && $reservation['date_to']>=$day){
					    				$flage=true;
					    			}
					    		}
					    		if ($flage) {
					    			echo '<div class="day bg-primary text-white">'.$i.'</div>';
					    		}else{
					    		echo '<div class="day">'.$i.'</div>';
					    		}
					    	}
					     ?>
					  </div>
					</div>
   				</div>
   				<div class="col-lg-6 col-md-12 col-sm-12 mb-5 text-center">
   					<h3 class=" display-4 text-dark mb-3"><?php echo $nextmonthname; ?></h3>
   					<div class="calendar-container bg-white shadow-lg rounded">
					  <div class="calendar">
					  	<span >Mon</span>
					  	<span >Tue</span>
					  	<span >Wed</span>
					  	<span >Thu</span>
					  	<span >Fri</span>
					  	<span >Sat</span>
					  	<span >Sun</span>
					    <?php 
					   		for($i=1;$i<=$secondmonthcounter;$i++){
					    		echo '<div class="day"></div>';
					    	}
					    	
					    	for($i=1;$i<=$nmlastday;$i++){
					    		$flage=false;
					    		foreach ($reservations as $reservation) {
					    			$date = new DateTime(date('Y').'-'.$nextmonth.'-'.$i);
					    			$day=$date->format('Y-m-d');
					    			if($reservation['date_from']<=$day && $reservation['date_to']>=$day ){
					    				$flage=true;
					    			}
					    		}

					    		if ($flage) {
					    			echo '<div class="day bg-primary text-white">'.$i.'</div>';
					    		}else{
					    		echo '<div class="day">'.$i.'</div>';
					    		}
					    	}
					     ?>
					  </div>
					</div>
   				</div>
   			</div>
   			
   		</div>
		<?php if ($this->session->userdata('loggedin') && $car['activity']==0) : ?>
   		<div class="mb-5">

			    <h2 class="h1-responsive font-weight-bold text-center my-4">Order here</h2>
			    <div class="row">
			        <div class="col-md-12 mb-md-0 mb-5">

			        	<?php echo form_open('Reservation/reserve'); ?>
			            <div class="row">
			                    <div class="col-md-6">
			                        <div class="md-form mb-0">
			                            <input class="form-control" name="datefrom" type="date">
			                            <label for="name" class="">Date from</label>
			                        </div>
			                    </div>
			                    <div class="col-md-6">
			                        <div class="md-form mb-0">
			                             <input class="form-control" name="dateto" type="date">
			                            <label for="email" class="">Date to</label>
			                        </div>
			                    </div>
			                </div>
			                <input type="hidden" id="carid" name="car[]" value="<?php echo $car['carid'] ?>">
			                <input type="hidden" id="carid" name="car[]" value="<?php echo $car['price_day'] ?>">
			            	<div class="form-group ">
										<button type="submit" id="submitbutton" class="btn btn-primary btn-block login-button">Reserve</button>
									</div>
			            <?php echo form_close(); ?>
			        </div>
			    </div>

			</div>
			<?php endif; ?>
   	</div>
   </div>