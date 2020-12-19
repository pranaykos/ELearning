<?php

require_once("Database.php");

  class Admin {
    private $db;
    
    public function __construct(){
      $this->db = new Database();
    }

    // Get All admins
    public function getAdmins(){
      $this->db->query("SELECT * from admins");
      $results = $this->db->resultset();

      return $results;
    }

    // Get admin By ID
    public function getAdminById($id){
      $this->db->query("SELECT * FROM admins WHERE a_id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }

    // Get user By ID
    public function getAdminsByUsername($username){
      $this->db->query("SELECT * FROM admins WHERE a_username = :username");

      $this->db->bind(':username', $username);
      
      $row = $this->db->single();

      return $row;
    }

    // Add user
    // public function addUser($data){
    //   // Prepare Query
    //   $this->db->query("INSERT INTO `accounts` (`email`, `username`, `password`, `created`) VALUES (:EMAIL, :USERNAME, :PASS, CURRENT_TIMESTAMP);");


    //   // Bind Values
    //   $this->db->bind(':EMAIL', $data['email']);
    //   $this->db->bind(':USERNAME', $data['username']);
    //   $this->db->bind(':PASS', $data['password']);

    //   //Execute
    //   if($this->db->execute()){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }

    public function getAdminsCount(){
      return $this->db->rowCount();
    }

    // public function doesUserExist($username){
    //   $this->getUserByUsername($username);
    //   if($this->db->rowCount() == 1){
    //     return true;
    //   }else{
    //     return false;
    //   }
    // }

    // Update user
    // public function updateUser($data){
    //   // Prepare Query
    //   $this->db->query('UPDATE users SET username = :username, content = :content WHERE id = :id');

    //   // Bind Values
    //   $this->db->bind(':id', $data['id']);
    //   $this->db->bind(':title', $data['title']);
    //   $this->db->bind(':content', $data['content']);
      
    //   //Execute
    //   if($this->db->execute()){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }


    // Updating the password of admin
    public function updateAdmin($data){
      // Prepare Query
      $this->db->query('UPDATE `admins` SET `a_password` = :PASSWORDS WHERE `admins`.`a_id` = :ID;');

      // Bind Values
      $this->db->bind(':ID', $data['id']);
      $this->db->bind(':PASSWORDS', $data['password']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Delete user
    // public function deletePost($id){
    //   // Prepare Query
    //   $this->db->query('DELETE FROM users WHERE id = :id');

    //   // Bind Values
    //   $this->db->bind(':id', $id);
      
    //   //Execute
    //   if($this->db->execute()){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }
  }