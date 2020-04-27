<div class="container mt-5">
  <div class="row">
    <?php foreach ($cars as $car) : ?>
      <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
      <div class="card shadow-lg mx-3 mt-3 mb-3 " >
        <img class="card-img-top " src="<?php echo site_url();?>assets/images/cars/<?php echo $car['image']; ?>" alt="Card image cap">
          <div class="card-body">
             <h5 class="card-title"><?php echo $car['name']; ?></h5>
             <p class="card-text"><?php echo $car['type']; ?></p>

             <div class="row">
             	
             <div class="col"><a href="<?php echo site_url('/home/'.$car['carid']); ?>" class="btn btn-primary">More info</a></div>
             <div class="col"><?php echo form_open('Admins/delete/'.$car['carid']); ?>
           	<input type="submit" value="Delete" id="submitbutton" class="btn btn-danger btn-block login-button"></input>
           	<?php echo form_close(); ?></div>
             </div>
             
           	
           </div>
       </div>
    </div>
     <?php endforeach; ?>
  </div>
</div>