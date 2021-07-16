<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('contact_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Prodact</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/contacts/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Produit
      </a>
    </div>
  </div>
  <?php foreach($data['product'] as $contact) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $contact->prod_name; ?></h4>
      <div class="bg-light p-2 mb-3">
      

       <img src="data:image/png;base64,<?php echo $contact->img; ?>">
      </div>
      <a href="<?php echo URLROOT; ?>/contacts/show/<?php echo $contact->id_product; ?>" class="btn btn-dark">More</a>
    </div>
  <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>