<h4 class="display-4 text-center mt-4">Your Payment ticket for this reservetion.</h4>
<?php foreach ($reservations as $res) : ?>
	<div class="container bg-white mt-3 shadow-lg">
      <div class="row">
        <div class="col-lg-6 mt-5 ">
          <div class="bg mt-4 mb-3 ">
             <img class="rounded text-center" src="<?php echo site_url();?>assets/images/cars/<?php echo $res['image']; ?>">
         </div>
        </div>
        <div class="col-lg-6">
          <div class="mt-5 mb-3">
            <h3 class=" display-4 text-dark ">Car</h3>
            <p><strong >Brand: </strong><?php echo $res['name']; ?></p>
            <p><strong >Type: </strong><?php echo $res['type']; ?></p>
            <p><strong>Built: </strong><?php echo $res['build']; ?></p>
            <p><strong>Transmission: </strong><?php echo $res['transmission']; ?></p>
            <p><strong>Fuel: </strong><?php echo $res['fuel']; ?></p>
            <p><strong>Engine: </strong><?php echo $res['engine']; ?></p>
            <p><strong>Max Speed: </strong><?php echo $res['max_speed']; ?></p>
            
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mt-3 mb-3">
            <h3 class=" display-4 text-dark">Reservation</h3>
            <p><strong>From: </strong> <?php echo $res['date_from'] ?></p>
            <p><strong>To: </strong> <?php echo $res['date_to'] ?></p>
            <p><strong>Amount: </strong> <?php echo $res['amount'] ?></p>
            
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mt-3 mb-3">
            <h3 class=" display-4 text-dark">User</h3>
            <p><strong >Email: </strong><?php echo $res['email']; ?></p>
            <p><strong>Username: </strong><?php echo $res['username']; ?></p>
            
          </div>
        </div>
      </div>
    </div>
<?php endforeach; ?>