<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('contact_message'); ?>
<div class="row mb-3">
  <div class="col-md-6">
    <h1>Prodact</h1>
    
  </div>
  
  <div class="col-md-6" >
    <a href="<?php echo URLROOT; ?>/contacts/add" style="margin: 5px;"  class="btn btn-primary pull-right">
      <i class="fa fa-pencil " ></i> Add Produit
    </a>
    <a href="<?php echo URLROOT; ?>/contacts/commande" style="margin: 5px;" class="btn btn-primary pull-right">
      <i class="fa fa-pencil " ></i> Show Commande
    </a>
    
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
       
        <a href="<?php echo URLROOT; ?>/contacts/show/<?php echo $contact->id_product; ?>" class="btn btn-dark">More</a>
  </div>
    </div>
   

<?php endforeach; ?>
  </div>
  



