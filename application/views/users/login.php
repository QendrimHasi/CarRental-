<div class="container ">
	<div class="row ">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 mt-5 shadow-lg rounded p-3 mb-5 bg-white">
			<?php 
				if(validation_errors()!= false) {
				 echo '<div class="alert alert-danger" role="alert">';
						echo	validation_errors();
					echo'</div>';
					 }

			 ?>

			<?php echo form_open('Users/login'); ?>
				<div class="form-horizontal">
									<div class=" mb-2 bg-danger text-white"></div>
									<div class="form-group">
										<label for="username" class="cols-sm-2 control-label">Username</label>
										<div class="cols-sm-10">
											<div class="input-group">
												
												<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label for="password" class="cols-sm-2 control-label">Password</label>
										<div class="cols-sm-10">
											<div class="input-group">
												
												<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
											</div>
										</div>
									</div>

									

									<div class="form-group ">
										<button type="submit" class="btn btn-secondary btn-lg btn-block login-button">Login</button>
									</div>
								</div>
			<?php echo form_close(); ?>		
		</div>
		<div class="col-lg-3"></div>
		
	</div>
</div>