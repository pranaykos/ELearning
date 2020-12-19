<?php

require_once("Database.php");

  class LEsson {
    private $db;
    
    public function __construct(){
      $this->db = new Database();
    }

    // Get All users
    // public function getUsers(){
    //   $this->db->query("SELECT * from accounts");
    //   $results = $this->db->resultset();

    //   return $results;
    // }

    // Get user By ID
    // public function getUserById($id){
    //   $this->db->query("SELECT * FROM accounts WHERE id = :id");

    //   $this->db->bind(':id', $id);
      
    //   $row = $this->db->single();

    //   return $row;
    // }

    // Get lessons by course id
    public function getLessonByCourseId($id){
      $this->db->query("SELECT * FROM lessons WHERE l_cid = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->resultset();

      return $row;
    }

    // Get user By ID
    // public function getUserByUsername($username){
    //   $this->db->query("SELECT * FROM accounts WHERE username = :username");

    //   $this->db->bind(':username', $username);
      
    //   $row = $this->db->single();

    //   return $row;
    // }

    // Add user
    public function addLesson($data){
      // Prepare Query
      $this->db->query("INSERT INTO `lessons` (`l_name`, `l_cid`, `l_vid`, `l_description`) VALUES (:NAMEE, :CID, :VIDEO, :DESCRIPTIONS );");


      // Bind Values
      $this->db->bind(':NAMEE', $data['name']);
      $this->db->bind(':CID', $data['courseid']);
      $this->db->bind(':VIDEO', $data['video']);
      $this->db->bind(':DESCRIPTIONS', $data['description']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // public function getUserCount(){
    //   return $this->db->rowCount();
    // }

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
    //   $this->db->query('UPDATE `accounts` SET `email` = :EMAIL, `username` = :USERNAME, `password` = :PASSWORDS, `profile_photo` = :PROFILES WHERE `accounts`.`id` = :ID;');

    //   // Bind Values
    //   $this->db->bind(':ID', $data['id']);
    //   $this->db->bind(':EMAIL', $data['email']);
    //   $this->db->bind(':USERNAME', $data['username']);
    //   $this->db->bind(':PASSWORDS', $data['password']);
    //   $this->db->bind(':PROFILES', $data['user_thumbnail']);
      
    //   //Execute
    //   if($this->db->execute()){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }

    // Update user
    // public function changeUserDetails($data){
      // Prepare Query
    //   $this->db->query('UPDATE `accounts` SET `email` = :EMAIL, `username` = :USERNAME, `password` = :PASSWORDS WHERE `accounts`.`id` = :ID;');

    //   // Bind Values
    //   $this->db->bind(':ID', $data['id']);
    //   $this->db->bind(':EMAIL', $data['email']);
    //   $this->db->bind(':USERNAME', $data['username']);
    //   $this->db->bind(':PASSWORDS', $data['password']);
      
    //   //Execute
    //   if($this->db->execute()){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }

    // Delete user
    // public function deletePost($id){
    //   // Prepare Query
    //   $this->db->query('DELETE FROM accounts WHERE id = :id');

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