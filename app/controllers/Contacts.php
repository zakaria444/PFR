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
        'contacts' => $contacts
      ];

      $this->view('contacts/index', $data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'prod_name' => trim($_POST['prod_name']),
          'prod_details' => trim($_POST['prod_details']),
          'prod_prix' => trim($_POST['prod_prix']),
          'prod_title' => $_POST['prod_title'],
          'user_id' => $_SESSION['user_id'],
          'prod_name_err' => '',
          'prod_details_err' => '',
          'prod_title_err' => '',
          'prod_prix_err' => ''
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
            flash('contact_message', 'Contact Added');
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
          'id' => $id,
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'address' => $_POST['address'],
          'number' => trim($_POST['number']),
          'user_id' => $_SESSION['user_id'],
          'name_err' => '',
          'email_err' => '',
          'number_err' => '',
          'address_err' => ''
        ];

        // Validate data
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name';
        }
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email text';

        }
        if(empty($data['address'])){
          $data['address_err'] = 'Please enter address text';
        }
        if(empty($data['number'])){
          $data['number_err'] = 'Please enter number text';
        }

        // Make sure no errors
        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['number_err'])&& empty($data['address_err'])){
          // Validated
          if($this->contactModel->updateContact($data)){
            flash('contact_message', 'Contact Updated');
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
        if($contact->user_id != $_SESSION['user_id']){
          redirect('contacts');
        }

        $data = [
          'id' => $id,
          'name' => $contact->name,
          'email' => $contact->email,
          'number' => $contact->number,
          'address' => $contact->address
        ];
  
        $this->view('contacts/edit', $data);
      }
    }

    public function show($id){
      $contact = $this->contactModel->getContactById($id);
      $user = $this->userModel->getUserById($contact->user_id);

      $data = [
        'contact' => $contact,
        'user' => $user
      ];

      $this->view('contacts/show', $data);
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
        $contact = $this->contactModel->getContactById($id);
        
        // Check for owner
        if($contact->user_id != $_SESSION['user_id']){
          redirect('contacts');
        }

        if($this->contactModel->deleteContact($id)){
          flash('contact_message', 'Contact Removed');
          redirect('contacts');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('contacts');
      }
    }
  }