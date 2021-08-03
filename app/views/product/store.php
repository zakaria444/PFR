<?php require APPROOT . '/views/inc/headeruser.php'; ?>


<?php flash('contact_message'); ?>
<div class="row mb-3">
  <div class="col-md-6">
    <h1>Prodact</h1>
  </div>
  <div class="col-md-6">
   
  </div>
</div>

 

<div class="row ">
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
      <a href="<?php echo URLROOT; ?>/contacts/showproduct/<?php echo $contact->id_product; ?>" class="btn btn-dark">More</a>
    </div>
    
  </div>
  
<?php endforeach; ?>
</div></div>





<div style="clear: both;"></div>
<br/>
<div class="table-responsive">

<table class="table">
  <tr><th colspan="5"><h3>Order details</h3></th></tr>
  <tr>
    <th width="40%">Product name</th>
    <th width="10%">Quantity</th>
    <th width="20%">Price</th>
    <th width="15%">Total</th>
    <th width="5%">Action</th>

  </tr>
  
  <?php
 
    $total = 0;
    foreach($_SESSION['shopping_cart']as $key=>$product):

      
  ?>
 
  <tr>
    <td><?php echo $product['name']?></td>
    <td><?php echo $product['quantity']?></td>
    <td><?php echo $product['prix']?></td>
    <td><?php echo number_format($product['quantity'] * $product['prix'], 2)?></td>
    <td>
      <a href="<?php echo URLROOT; ?>/contacts/remove/<?php echo $product->id; ?>">remve</a>
    </td>
    <td>
      <a href="<?php echo URLROOT; ?>/contacts/editorder/<?php echo $product->id; ?>">edit</a>
    </td>




  </tr>
  <?php endforeach; ?>
</div>
 