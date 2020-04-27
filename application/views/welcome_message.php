	<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>

  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active"  >
 <img src="<?php echo site_url();?>assets/images/bg/4.jpg"> 
       <div class=" carousel-caption  d-none d-md-block centered">
          <h2 class="display-4">Drive happy</h2>
          <h2 class="lead">It comes with the territory.</h2>
        </div>
      
    </div>
    <div class="carousel-item">
      <img src="<?php echo site_url();?>assets/images/bg/1.png">
      <div class=" carousel-caption rounded d-none d-md-block top-right">
      	 <h2 class="display-4">You choose where</h2>
         <h2 class="lead"> We take it there.</h2>

        </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo site_url();?>assets/images/bg/2.jpg">
      <div class=" carousel-caption  d-none d-md-block centered">
          <h2 class="display-4">If service counts</h2>
          <h2 class="lead"> Count on us.</h2>
        </div>
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<?php 
    if ($this->session->flashdata('email_send')) {
             echo '<div class="container mt-5">';
            echo '<div class="alert alert-success" role="alert">';
            echo  $this->session->flashdata('email_send');
            echo'</div>';
             echo '</div>';
    }
    if ($this->session->flashdata('email_dontsend')) {
             echo '<div class="container mt-5">';
            echo '<div class="alert alert-danger" role="alert">';
            echo  $this->session->flashdata('email_dontsend');
            echo'</div>';
             echo '</div>';
    }

    if(validation_errors()!= false) {
        echo '<div class="container text-center mt-5">';
            echo '<div class="alert alert-danger" role="alert">';
            echo    validation_errors();
            echo'</div>';
        echo'</div>';
    }

?>
<div class="container text-center">
	<h2 class="display-4 mt-5">Start your journey now</h2>
	<h2 class="lead"> Register here </h2>
	<a href="<?php echo site_url();?>users/register" class="btn btn-secondary  text-white mt-2" >Sign up</a>
</div>	

	

<div class="container mt-5">
	<hr class="bg-dark">
</div>
<div class="mb-5">
	<section class="gallery-block compact-gallery pt-4">

            <div class="heading ">
                <h2>Brands Gallery</h2>
            </div>
            <div class="row no-gutters pt-0">
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a class="lightbox" href="<?php echo site_url();?>assets/images/bg/vw-logo.jpg">
                        <img class="img-fluid image" src="<?php echo site_url();?>assets/images/bg/vw-logo.jpg">
                        <span class="description">
                            <span class="description-heading">Volkswagen</span>
                            
                        </span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a class="lightbox" href="<?php echo site_url();?>assets/images/bg/opel.png">
                        <img class="img-fluid image" src="<?php echo site_url();?>assets/images/bg/opel.png">
                        <span class="description">
                            <span class="description-heading">Opel</span>
                        </span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a class="lightbox" href="<?php echo site_url();?>assets/images/bg/jaguar.jpg">
                        <img class="img-fluid image" src="<?php echo site_url();?>assets/images/bg/jaguar.jpg">
                        <span class="description">
                            <span class="description-heading">Jaguar</span>
                        </span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a class="lightbox" href="<?php echo site_url();?>assets/images/bg/audi.jpg">
                        <img class="img-fluid image" src="<?php echo site_url();?>assets/images/bg/audi.jpg">
                        <span class="description">
                            <span class="description-heading">Audi</span>
                        </span>
                    </a>
                    </div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a class="lightbox" href="<?php echo site_url();?>assets/images/bg/porsche.jpg">
                        <img class="img-fluid image" src="<?php echo site_url();?>assets/images/bg/porsche.jpg">
                        <span class="description">
                            <span class="description-heading">Porsche</span>
                        </span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a class="lightbox" href="<?php echo site_url();?>assets/images/bg/maserati.jpg">
                        <img class="img-fluid image" src="<?php echo site_url();?>assets/images/bg/maserati.jpg">
                        <span class="description">
                            <span class="description-heading">Maserati</span>
                        </span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                     <a class="lightbox" href="<?php echo site_url();?>assets/images/bg/ferrari.jpg">
                        <img class="img-fluid image" src="<?php echo site_url();?>assets/images/bg/ferrari.jpg">
                        <span class="description">
                            <span class="description-heading">Ferrari</span>
                        </span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a class="lightbox" href="<?php echo site_url();?>assets/images/bg/rollsroyce.jpg">
                        <img class="img-fluid image" src="<?php echo site_url();?>assets/images/bg/rollsroyce.jpg">
                        <span class="description">
                            <span class="description-heading">Rolls Royce</span>
                        </span>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a class="lightbox" href="<?php echo site_url();?>assets/images/bg/lamborghini.png">
                        <img class="img-fluid image" src="<?php echo site_url();?>assets/images/bg/lamborghini.png">
                        <span class="description">
                            <span class="description-heading">Lamborghini</span>
                        </span>
                    </a>
                </div>
            </div>
    </section>
</div>

<!-- /gallery -->
<!-- contact us -->
<div class="container bg-light">
	<div class="container bg-white border mb-5">
	
		<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-5">
            <?php echo form_open('Welcome/email'); ?>

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Your name</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Your email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Subject</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Your message</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->
            <div class="text-center text-md-left">
                <button class="btn btn-secondary  text-white btn-block" >Send</button>
            </div>
            <?php echo form_close(); ?>
            <div class="status"></div>
        </div>
        <!--Grid column-->
    </div>

</section>

	</div>

	
</div>

