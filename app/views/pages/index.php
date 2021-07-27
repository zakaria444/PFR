<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="jumbotron jumbotron-flud text-center" style="height: 440px;">
    <div class="container" style="background-image: url(<?php echo URLROOT; ?>../public/img/img1.jpg);background-size: 60%;HEIGHT: 300px;">
    <h1 class="display-3"    style=" color: #DDDDDD;"  ><?php echo $data['title']; ?></h1>
    <p class="lead"  style=" color: #DDDDDD;" ><?php echo $data['description']; ?></p>
    <a href="<?php echo URLROOT; ?>/contacts/index" class="btn btn-secondary pull-center">
      <i class="fa fa-pencil"></i>  show prodact store</a>
    </div>
  </div> 
<?php require APPROOT . '/views/inc/footer.php'; ?>
