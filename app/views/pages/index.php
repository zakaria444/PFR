<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="jumbotron jumbotron-flud text-center" style="height: 440px;">
    <div class="container" style="background-image: url(<?php echo URLROOT; ?>../public/img/img1.jpg);background-size: 60%;HEIGHT: 300px;">
    <h1 class="display-3"    style=" color: #DDDDDD;"  ><?php echo $data['title']; ?></h1>
    <p class="lead"  style=" color: #DDDDDD;" ><?php echo $data['description']; ?></p>
    <a href="<?php echo URLROOT; ?>/contacts/index" class="btn btn-secondary pull-center">
      <i class="fa fa-pencil" ></i>  show prodact store</a>
    </div>
  </div> 


  <div class="row">
  <div class=" w-40 col-4 " >
    <div class="card card-body mb-3">
      <div class="cont" style="display:flex; ">
    <div class="title" style="margin-left: 30px;">
      <h4 class="card-title"  > Very First Sight</h4>
      <h4 style="border:0.5px solid; width: 50%;background-color: #FFF5EB;text-align: center;">DH</h4>
      </div>
      </div>
      <div class="bg-light p-2 mb-3">
      </div>
      <a href="<?php echo URLROOT; ?>/contacts/show/" class="btn btn-dark">More</a>
    </div>
    
  </div>
  <div class=" w-40 col-4 " >
    <div class="card card-body mb-3">
      <div class="cont" style="display:flex; ">
    <div class="title" style="margin-left: 30px;">
      <h4 class="card-title"   > 1001 Activities Book</h4>
      <h4 style="border:0.5px solid; width: 50%;background-color: #FFF5EB;text-align: center;">DH</h4>
      </div>
      </div>
      <div class="bg-light p-2 mb-3">
      </div>
      <a href="<?php echo URLROOT; ?>/contacts/show/" class="btn btn-dark">More</a>
    </div>
    </div>
    <div class=" w-40 col-4 " >
    <div class="card card-body mb-3">
      <div class="cont" style="display:flex; ">
    <div class="title" style="margin-left: 30px;">
      <h4 class="card-title"   > The Illustrated Stories</h4>
      <h4 style="border:0.5px solid; width: 50%;background-color: #FFF5EB;text-align: center;">DH</h4>
      </div>
      </div>
      <div class="bg-light p-2 mb-3">
      </div>
      <a href="<?php echo URLROOT; ?>/contacts/show/" class="btn btn-dark">More</a>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
