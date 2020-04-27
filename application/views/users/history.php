<div class="container-fluid ">
	<div class="display-4 px-4 mt-2">You're resevations:</div>
	<?php if (empty($reservedcars)) :     ?>
		<div class="display-4 text-center text-danger px-4 mt-2">You dont have any reservation.</div>
	<?php endif; ?>

	<?php foreach ($reservedcars as $car):?>
	 <div class="container bg-white mt-3 shadow-lg">
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
            <p><strong>From: </strong> <?php echo $car['date_from'] ?></p>
            <p><strong>To: </strong> <?php echo $car['date_to'] ?></p>
            <p><strong>Amount: </strong> <?php echo $car['amount'] ?></p>
            <?php echo form_open('Users/payticket/'.$car['rid']); ?>
            <input type="submit" value="Pay Ticket" id="submitbutton" class="btn btn-secondary btn-block login-button"></input>
            <?php echo form_close(); ?>
            
          </div>
        </div>
      </div>
    </div>
	<?php endforeach; ?>


	<div class="display-4 px-4 mt-5">You are using:</div>
	<?php if (empty($usingcars)) :     ?>
			<div class="display-4 text-center text-danger px-4 mt-2">You aren't using any car.</div>
	<?php endif; ?>
	<?php foreach ($usingcars as $car):?>
	 <div class="container bg-white mt-3 shadow-lg">
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
            <p><strong>From: </strong> <?php echo $car['date_from'] ?></p>
            <p><strong>To: </strong> <?php echo $car['date_to'] ?></p>
            <p><strong>Amount: </strong> <?php echo $car['amount'] ?></p>
            
          </div>
        </div>
      </div>
    </div>
	<?php endforeach; ?>




	<div class="display-4 px-4 mt-5">You have used:</div>
	<?php if (empty($usedcars)) :     ?>
			<div class="display-4 text-center text-danger px-4 mt-2">You haven't used any car.</div>
	<?php endif; ?>
	<div class="container"> 
		<div class="row">
			<?php foreach ($usedcars as $car):?>
			      <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
			      <div class="card shadow-lg mx-3 mt-3 mb-3 " >
			        <img class="card-img-top " src="<?php echo site_url();?>assets/images/cars/<?php echo $car['image']; ?>" alt="Card image cap">
			          <div class="card-body">
			             <h5 class="card-title"><?php echo $car['name']; ?></h5>
			             <p class="card-text"><?php echo $car['type']; ?></p>
			             <a href="<?php echo site_url('/home/'.$car['carid']); ?>" class="btn btn-primary">More info</a>
			           </div>
			       </div>
			    </div>
			<?php endforeach; ?>
	 	</div>
	</div>
	<div class="mt-5 "></div>

</div>