<?php require APPROOT . '/views/inc/headeruser.php'; ?>


<a href="<?php echo URLROOT; ?>/contacts/store" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<div class="show-prod d-flex" style="margin-top: 45px;">
<img src="data:image/png;base64,<?php echo $data['product']->img; ?>">
<div class="show-title "  style="margin-left: 30px;display: flex;flex-direction: column;justify-content: space-around;">
<h4><?php echo $data['product']->prod_name; ?></h4>
<h4><?php echo $data['product']->prod_details; ?></h4>
<h4><?php echo $data['product']->prod_title; ?></h4>
<h4 style="border:0.5px solid; width: 20%;background-color: #FFF5EB;text-align: center;"><?php echo $data['product']->prod_prix; ?>DH</h4>

</div>
</div>





  <hr>


  <form class="pull-right" action="<?php echo URLROOT; ?>/contacts/delete/<?php echo $data['product']->id_product; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
  <form class="pull-right" action="<?php echo URLROOT; ?>/contacts/addtocart/<?php echo $data['product']->id_product; ?>" method="post">
  <input type="hidden" name="prod_name" value="<?php echo $data['product']->prod_name; ?>">
  <input type="hidden" name="prod_prix" value="<?php echo $data['product']->prod_prix; ?>">

    <input type="submit" name="add-to-cart"  value="add to cart" class="btn btn-danger">
  </form>