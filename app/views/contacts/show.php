<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/contacts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<h4><?php echo $data['product']->prod_name; ?></h4>
<h4><?php echo $data['product']->prod_prix; ?></h4>
<h4><?php echo $data['product']->prod_details; ?></h4>
<h4><?php echo $data['product']->prod_title; ?></h4>




<?php if($data['product']->id_product == $_SESSION['id_product']) : ?>
  <hr>
  <a href="<?php echo URLROOT; ?>/contacts/edit/<?php echo $data['product']->id; ?>" class="btn btn-dark">Edit</a>

  <form class="pull-right" action="<?php echo URLROOT; ?>/contacts/delete/<?php echo $data['product']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>