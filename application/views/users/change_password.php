 <div class="container mt-5 mb-5">	
		<div class="row ">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 shadow-lg rounded p-3 mb-4 bg-white">
			<?php 
				if(validation_errors()!= false) {
				 echo '<div class="alert alert-danger" role="alert">';
						echo	validation_errors();
					echo'</div>';
					 }

			 ?>
			<?php echo form_open('Users/update'); ?>
			<div class="form-horizontal" method="post" action="#">
									<div class=" mb-2 bg-danger text-white"></div>
									<div class="form-group">
										<label for="oldpassword" class="cols-sm-2 control-label">Old Password</label>
										<div class="cols-sm-10">
											<div class="input-group">
												
												<input type="password" class="form-control" name="oldpassword" id="oldpassword"  placeholder="Enter your Old Password"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="newpassword" class="cols-sm-2 control-label">New Password</label>
										<div class="cols-sm-10">
											<div class="input-group">
												
												<input type="password" class="form-control" name="newpassword" id="newpassword"  placeholder="Enter your new Password"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="confirm" class="cols-sm-2 control-label">Confirm New Password</label>
										<div class="cols-sm-10">
											<div class="input-group">
												
												<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your New Password"/>
											</div>
										</div>
									</div>
									<div class="form-group ">
										<button type="submit" id="submitbutton" class="btn btn-secondary btn-lg btn-block login-button">Update</button>
									</div>
								</div>
								<?php echo form_close(); ?>	
		</div>
		<div class="col-lg-3"></div>
		
	</div>

 </div>
