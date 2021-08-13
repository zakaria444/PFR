<?php require APPROOT . '/views/inc/headeruser.php'; ?>


<?php flash('contact_message'); ?>
<div class="d-flex justify-content-center" style="border: solid;">
<img src="<?php echo URLROOT; ?>/img/1006.jpg" class="img-fluid" alt="Responsive image"style=" width: 90%;
    height: 200px;">
</div>
<div >
  <div>
    <h1  style="margin:30px 0px 30px 0px" class="d-flex justify-content-center">Prodact</h1>
  </div>
  
</div>

 


<div class="container mt-2" >
  
  <div id="categorie" class="row" >
     <?php foreach ($data['product'] as $contact) : ?>
    <div  style="width:100%"  class="col-md-3 col-sm-6 item">
      <div style="width:100%; margin:30px;border:solid 1px;  border-radius:10px;padding: 20px;box-shadow: 10px 5px 5px #464848;"  class="card item-card card-block">
   
    <div ><img src="data:image/png;base64,<?php echo $contact->img; ?> "  style="width:100%; "></div>  
      <h4 class="card-title"   ><?php echo $contact->prod_name; ?></h4>
      <h4 style="border:0.5px solid; width: 50%;background-color: #FFF5EB;text-align: center;"><?php echo $contact->prod_prix; ?>DH</h4>
       
        <a href="<?php echo URLROOT; ?>/contacts/showproduct/<?php echo $contact->id_product; ?>" class="btn btn-dark">More</a>
  </div>
    </div>
   

<?php endforeach; ?>
  </div>
  
</div> 







<div style="clear: both;"></div>
<br/>
<?php if(!empty($_SESSION['shopping_cart'])){  ?>
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
    <td><?php echo $product['prix']?>Dh</td>
    <td><?php echo number_format($product['quantity'] * $product['prix'], 2)?>Dh</td>
    <td>
      <button class="btn-danger"><a style="text-decoration:none; color:black; " href="<?php echo URLROOT; ?>/contacts/remove/<?php echo $product['id']; ?>">Remove</a></button>
    </td>
    <td>
    </td>




  </tr>

<?php
$total =$total +($product['quantity'] * $product['prix']);

endforeach ?>

<tr>
  <td colspan="3" align="right" > Total</td>
  <td  align="right"> <?php echo number_format($total,2);?>DH</td>
  <td></td>
</tr>
<tr>
  <td colspan="5">
  <div class="d-grid gap-2 col-6 mx-auto" style="display: flex ;justify-content: center;">
  
  <a href="<?php echo URLROOT; ?>/contacts/checkout/" type="button" class="btn btn-secondary">CHECKOUT</a>
</div>
  
 
      
  </td>
</tr>
</table>
</div>
 <?php   } ?>
 <?php require APPROOT . '/views/inc/footer.php'; ?>
