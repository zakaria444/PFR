<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/contacts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Produit</h2>
    <p>Create a Produit with this form</p>
    <form action="<?php echo URLROOT; ?>/contacts/add" method="post"  enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name produit: <sup>*</sup></label>
        <input type="text" name="prod_name" class="form-control form-control-lg <?php echo (!empty($data['prod_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['prod_name']; ?>">
        <span class="invalid-feedback"><?php echo $data['prod_name_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="number">Prix: <sup>*</sup></label>
        <input type="Number" name="prod_prix" class="form-control form-control-lg <?php echo (!empty($data['prod_prix_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['prod_prix']; ?>">
        <span class="invalid-feedback"><?php echo $data['prod_prix_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="details">details: <sup>*</sup></label>
        <textarea name="prod_details" class="form-control form-control-lg <?php echo (!empty($data['prod_details_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['prod_details']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['prod_details_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="title">title: <sup>*</sup></label>
        <input type="text" name="prod_title" class="form-control form-control-lg <?php echo (!empty($data['prod_title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['prod_title']; ?>">
        <span class="invalid-feedback"><?php echo $data['prod_title_err']; ?></span>
      </div>
      <label for="img">Select image:</label>
  <input type="file" id="img" name="img" accept="image/*">
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
