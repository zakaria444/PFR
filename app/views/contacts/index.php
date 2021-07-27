<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('contact_message'); ?>
<div class="row mb-3">
  <div class="col-md-6">
    <h1>Prodact</h1>
  </div>
  <div class="col-md-6">
    <a href="<?php echo URLROOT; ?>/contacts/add" class="btn btn-primary pull-right">
      <i class="fa fa-pencil " ></i> Add Produit
    </a>
  </div>
</div>

<div class="row">
<?php foreach ($data['product'] as $contact) : ?>
  <div class=" w-40 col-4 " >
    <div class="card card-body mb-3">
      <div class="cont" style="display:flex; ">
    <img src="data:image/png;base64,<?php echo $contact->img; ?> "  style="width:30%; ">
    <div class="title" style="margin-left: 30px;">
      <h4 class="card-title"   ><?php echo $contact->prod_name; ?></h4>
      <h4 style="border:0.5px solid; width: 50%;background-color: #FFF5EB;text-align: center;"><?php echo $contact->prod_prix; ?>DH</h4>
      </div>

      </div>
      <div class="bg-light p-2 mb-3">
      </div>
      <a href="<?php echo URLROOT; ?>/contacts/show/<?php echo $contact->id_product; ?>" class="btn btn-dark">More</a>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<style>

</style>