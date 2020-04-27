<div class="bg-secondary">
  <div class="bg ">
    <img src="<?php echo site_url();?>assets/images/bg/r4.jpg">
    
  </div>
</div>

<div class="container mt-3">
   <form action="">
          <div class="p-1 bg-white rounded rounded-pill shadow-lg mb-4">
            <div class="input-group ">
              <input type="text" id="filterInput" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control rounded border-0 bg-white">
              <div class="input-group-append">
                <button id="button-addon1" type="submit" disabled class="btn btn-link text-primary "><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </form>

</div>

       

<div class="container">
  <div class="row" id="cars">
    <?php foreach ($cars as $car) : ?>
      <div class="col col-lg-4 col-md-5 col-sm-6 col-xs-12">
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



  <script>
    let filterInput = document.getElementById('filterInput');
    filterInput.addEventListener('keyup', filterNames);

    function filterNames(){
      let filterValue = document.getElementById('filterInput').value.toUpperCase();
      let row = document.getElementById('cars');
      let card = row.querySelectorAll('div.col');
      for(let i = 0;i < card.length;i++){
        let h5 = card[i].getElementsByTagName('h5')[0];
        let p = card[i].getElementsByTagName('p')[0];
        if(h5.innerHTML.toUpperCase().indexOf(filterValue) > -1 || p.innerHTML.toUpperCase().indexOf(filterValue) > -1){
          card[i].style.display = '';
        } else {
          card[i].style.display = 'none';
        }
      }

    }
  </script>
</div>