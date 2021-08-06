<?php
  class Contact {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getContacts(){
      $this->db->query('SELECT * from product');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addContact($data){
      $this->db->query('INSERT INTO product (prod_name, prod_details, prod_prix, prod_title, img) VALUES(:prod_name, :prod_details, :prod_prix, :prod_title, :img)');
      // Bind values
      $this->db->bind(':prod_name', $data['prod_name']);
      $this->db->bind(':prod_details', $data['prod_details']);
      $this->db->bind(':prod_prix', $data['prod_prix']);
      $this->db->bind(':prod_title', $data['prod_title']);
      $this->db->bind(':img', $data['img']);
      

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateContact($data){
      $this->db->query('UPDATE product SET prod_name = :prod_name, prod_details = :prod_details, prod_prix = :prod_prix, prod_title = :prod_title WHERE id_product = :id');
      // Bind values
      $this->db->bind(':id', $data['id_product']);
      $this->db->bind(':prod_name', $data['prod_name']);
      $this->db->bind(':prod_details', $data['prod_details']);
      $this->db->bind(':prod_prix', $data['prod_prix']);
      $this->db->bind(':prod_title', $data['prod_title']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
public function checkout($data){
  $this->db->query('INSERT INTO checkout (name, prix, quantity, user_name) VALUES(:name, :prix, :quantity, :user_name)');
  $this->db->bind(':name', $data['name']);
  $this->db->bind(':prix', $data['prix']);
  $this->db->bind(':quantity', $data['quantity']);
  $this->db->bind(':user_name', $data['user_name']);
  
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }

}
    public function getContactById($id){
      $this->db->query('SELECT * FROM product WHERE id_product = :id_product');
      $this->db->bind(':id_product', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deleteContact($id){
      $this->db->query('DELETE FROM product WHERE id_product = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }