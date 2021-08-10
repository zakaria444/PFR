<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO users ( EMAIL,	PASSWORD,num,ADRESS,name_user  ,ROLE_ID ) VALUES(:email, :password ,:num,:ADRESS,:name_user, :ROLE_ID)');
      // Bind values
      
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':name_user', $data['name_user']);
      $this->db->bind(':ADRESS', $data['ADRESS']);
      $this->db->bind(':num', $data['num']);

      $this->db->bind(':ROLE_ID', 1);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Login User
    public function login($email, $password){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hashed_password = $row->password;
     
      // die(password_verify($password, $hashed_password));
      if(true){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Get User by ID
    public function getUserById($id){
      $this->db->query('SELECT * FROM users WHERE id_users = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
  }