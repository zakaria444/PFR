<?php
  class Contacts extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->contactModel = $this->model('Contact');
      $this->userModel = $this->model('User');
    }

    public function index(){
      // Get posts
      $contacts = $this->contactModel->getContacts();

      $data = [
        'product' => $contacts
      ];

      $this->view('contacts/index', $data);
    }
    public function store(){
      
        // Get posts
        $contacts = $this->contactModel->getContacts();
  
        $data = [
          'product' => $contacts
        ];
  
        $this->view('product/store', $data);
      }

    


    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $image_base64 = base64_encode(file_get_contents($_FILES['img']['tmp_name']) );
        // Insert record
        


        $data = [
          
          'prod_name' => trim($_POST['prod_name']),
          'prod_details' => trim($_POST['prod_details']),
          'prod_prix' => trim($_POST['prod_prix']),
          'prod_title' => $_POST['prod_title'],
          'user_id' => $_SESSION['user_id'],
          'prod_name_err' => '',
          'prod_details_err' => '',
          'prod_title_err' => '',
          'prod_prix_err' => '',
          'img' => $image_base64
        ];

        // Validate data
        if(empty($data['prod_name'])){
          $data['prod_name_err'] = 'Please enter name';
        }
        if(empty($data['prod_details'])){
          $data['prod_details_err'] = 'Please enter details text';
        }
        if(empty($data['prod_prix'])){
          $data['prod_prix_err'] = 'Please enter number text';
        }
        if(empty($data['prod_title'])){
          $data['prod_title_err'] = 'Please enter title text';
        }
        

        // Make sure no errors
        if(empty($data['prod_name_err']) && empty($data['prod_details_err'])&& empty($data['prod_prix_err'])&& empty($data['prod_title_err'])){
          // Validated
          if($this->contactModel->addContact($data)){
            flash('contact_message', 'Product Added');
            redirect('contacts');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('contacts/add', $data);
        }

      } else {
        $data = [
          'prod_name' => '',
          'prod_details' => '',
          'prod_prix' => '',
          'prod_title' => '',
        ];
  
        $this->view('contacts/add', $data);
      }
    }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id_product' => $id,
          'prod_name' => trim($_POST['prod_name']),
          'prod_details' => trim($_POST['prod_details']),
          'prod_prix' => $_POST['prod_prix'],
          'prod_title' => trim($_POST['prod_title']),
          'user_id' => $_SESSION['user_id'],
          'prod_name_err' => '',
          'prod_details_err' => '',
          'prod_prix_err' => '',
          'prod_title_err' => ''
        ];

        // Validate data
        if(empty($data['prod_name'])){
          $data['prod_name_err'] = 'Please enter Prod Name';
        }
        if(empty($data['prod_details'])){
          $data['prod_details_err'] = 'Please enter Prod Details';

        }
        if(empty($data['prod_prix'])){
          $data['prod_prix_err'] = 'Please enter  Prod Prix';
        }
        if(empty($data['prod_title'])){
          $data['prod_title_err'] = 'Please enter Prod Title';
        }

        // Make sure no errors
        if(empty($data['prod_name_err']) && empty($data['prod_details_err']) && empty($data['prod_prix_err'])&& empty($data['prod_title_err'])){
          // Validated
          if($this->contactModel->updateContact($data)){
            flash('contact_message', 'Product Updated');
            redirect('contacts');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('contacts/edit', $data);
        }

      } else {
        // Get existing post from model
        $contact = $this->contactModel->getContactById($id);

        // Check for owner
        // if($contact->user_id != $_SESSION['user_id']){
        //   redirect('contacts');
        // }

        $data = [
          'id' => $id,
          'prod_name' => $contact->prod_name,
          'prod_details' => $contact->prod_details,
          'prod_prix' => $contact->prod_prix,
          'prod_title' => $contact->prod_title
        ];
  
        $this->view('contacts/edit', $data);
      }
    }

    public function show($id){
      $contact = $this->contactModel->getContactById($id);
      $user = $this->userModel->getUserById($contact->id_product);

      $data = [
        'product' => $contact,
        'user' => $user
      ];

      $this->view('contacts/show', $data);
    }
    public function showproduct($id){
      $contact = $this->contactModel->getContactById($id);
      $user = $this->userModel->getUserById($contact->id_product);

      $data = [
        'product' => $contact,
        'user' => $user
      ];

      $this->view('product/showproduct', $data);

    }


    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
       
        
        // Check for owner
        

        if($this->contactModel->deleteContact($id)){
          flash('contact_message', 'Product Removed');
          redirect('contacts');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('contacts');
      }
    }
  
  public function addtocart(){
    session_start();
    $prodducy_ids=array();
    session_destroy();
    //chek if add to cart button has been submit 
    if(filter_input(INPUT_POST, 'add-to-cart')){
      if(isset($_SESSION['shopping_cart'])){
        //keep track how mnay product are in the shopping cart 
        $count =count($_SESSION['shopping_cart']);
        //create sequantial array for matching array keys to products id's
        $prod_ids =array_column($_SESSION['shopping_cart'],'id_product');




      }else
      {//if shopping cart dosen't exite crate first product with array key 0
        $_SESSION['shopping_cart'][0]=array
        (
          'id'=>filter_input(INPUT_GET,'id_product'),
          'name'=>filter_input(INPUT_POST,'prod_name'),
          'prix'=>filter_input(INPUT_POST,'prod_prix'),




        );

      }
    }
print_r($_SESSION);
  }
}