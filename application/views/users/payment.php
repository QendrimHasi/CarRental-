   


    <?php 
          if (empty($cars)) {
            echo '<div class="display-4 text-center mt-5"> You dont have any payment to do.</div>';
          }
     ?>
    <?php foreach ($cars as $car) : ?>
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
            <?php echo form_open('Reservation/payment'); ?>
            <input type="hidden" name="reservation[]" value="<?php echo $car['rid'] ?>">
            <input type="hidden" name="reservation[]" value="<?php echo $car['amount'] ?>">
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_0BDqMZBh4SLmMsdJqov20EKS00ZYiBVIhX"
                data-amount="<?php echo $car['amount'] ?>00"
                data-name="<?php echo $car['name'] ?>"
                data-description="<?php echo $car['type']; ?>"
                data-locale="auto"
                data-currency="EUR"
            ></script>
            <?php echo form_close(); ?>

          </div>
        </div>
      </div>
    </div>
    
     <?php endforeach; ?>
