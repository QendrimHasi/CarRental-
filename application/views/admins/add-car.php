 <div class="container mt-5 mb-5">	
		<div class="row ">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 shadow-lg rounded p-3 mb-5 bg-white">
			<?php 
				if(validation_errors()!= false) {
				 echo '<div class="alert alert-danger" role="alert">';
						echo	validation_errors();
					echo'</div>';
					 }

			 ?>
			<?php echo form_open_multipart('Admins/addCar'); ?>
			<div class="form-horizontal" method="post" action="#">
									<div class=" mb-2 bg-danger text-white"></div>
									<div class="form-group">
										<label for="brandid" class="cols-sm-2 control-label">Brand</label>
										<div class="cols-sm-10">
											<div class="input-group">
												
												<select class="form-control" name="brandid" id="brandid">
													<?php 	foreach ($brands as $brand) : ?>
														<option value="<?php 	echo $brand['brandid']; ?>"><?php 	echo $brand['name']; ?></option>
													<?php 	endforeach; ?>
												</select>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label for="car_type" class="cols-sm-2 control-label">Car Type</label>
										<div class="cols-sm-10">
											<div class="input-group" id="car_type">
												
												<input type="text" class="form-control"  name="car_type" id="car_type"  placeholder="Enter the type of the car"/><br>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="build" class="cols-sm-2 control-label">Build</label>
										<div class="cols-sm-10">
											<div class="input-group" id="build">
												
												<input type="number" class="form-control"  name="build" id="build"  placeholder="2018"/><br>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="transmission" class="cols-sm-2 control-label">Transmission</label>
										<div class="cols-sm-10">
											<div class="input-group" id="transmission">
												
												<input type="text" class="form-control"  name="transmission" id="transmission"  placeholder="Transmission"/><br>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="fuel" class="cols-sm-2 control-label">Fuel</label>
										<div class="cols-sm-10">
											<div class="input-group" id="fuel">
												
												<input type="text" class="form-control"  name="fuel" id="fuel"  placeholder="Fuel"/><br>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="engine" class="cols-sm-2 control-label">Engine</label>
										<div class="cols-sm-10">
											<div class="input-group" id="engine">
												
												<input type="text" class="form-control"  name="engine" id="engine"  placeholder="V8"/><br>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="max_speed" class="cols-sm-2 control-label">Max Speed</label>
										<div class="cols-sm-10">
											<div class="input-group" id="max_speed">
												
												<input type="number" class="form-control"  name="max_speed" id="max_speed"  placeholder="350"/><br>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="price" class="cols-sm-2 control-label">Price/day</label>
										<div class="cols-sm-10">
											<div class="input-group" id="price">
												
												<input type="number" class="form-control"  name="price" id="price"  placeholder="15"/><br>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="userfile" class="cols-sm-2 control-label">Image</label>
										<div class="cols-sm-10">
											<div class="input-group" id="userfile">
																				<input type="file" class="form-control"  name="userfile" id="userfile"/><br>
											</div>
										</div>
									</div>
									<div class="form-group ">
										<button type="submit" id="submitbutton" class="btn btn-primary btn-lg btn-block login-button">Add</button>
									</div>
								</div>
				<?php echo form_close(); ?>			
		</div>
		<div class="col-lg-3"></div>
		
	</div>

 </div>