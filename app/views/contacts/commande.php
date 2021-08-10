<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="<?php echo URLROOT; ?>/contacts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <?php 
   
    

    
    
    ?>

<table class="table">
  <tr><th colspan="5"><h3>Command  details</h3></th></tr>
  <tr>
    <th width="40%">Product name</th>
    <th width="10%">Quantity</th>
    <th width="20%">Price</th>
    <th width="15%">Num</th>
    <th width="15%">Adress</th>

    <th width="5%">Action</th>

  </tr>
 <?php
 foreach($data['product']as $key=>$data):
 ?>
  <tr>
    <td><?= $data->name?></td>
    <td><?= $data->quantity?></td>
    <td><?= $data->prix?>dh</td>
    <td><?= $data->num?></td>
    <td><?= $data->ADRESS?></td>
    
    <td>
      
      <button class="btn-danger"><a style="text-decoration:none; color:black; " href="<?php echo URLROOT;?>/contacts/deletcom/<?= $data->id;?>">Delete</a></button>
    </td>
    <?php endforeach?>
    <td>
    </td>




  </tr>




<tr>
 
</tr>
</table>
</div>
</body>
</html>