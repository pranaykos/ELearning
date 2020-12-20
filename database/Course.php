<?php

require_once("Database.php");

  class Course {
    private $db;
    
    public function __construct(){
      $this->db = new Database();
    }

    // Get All courses
    public function getCourses(){
      $this->db->query("SELECT * from courses");
      $results = $this->db->resultset();

      return $results;
    }

    // Get course By ID
    public function getCourseById($id){
      $this->db->query("SELECT * FROM courses WHERE c_id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }


    // Get course By ID
    public function getCourseNameById($id){
      $this->db->query("SELECT courses.c_name FROM courses WHERE c_id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }

    public function getCoursesOfUserByEmail($email){
      $this->db->query("SELECT courses.c_id, courses.c_image ,courses.c_name, courses.c_desc FROM c_transactions JOIN courses ON c_transactions.course_id = courses.c_id WHERE c_transactions.email_id = :EMAIL");

      $this->db->bind(":EMAIL", $email);

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


    public function getCourseOrderByCatagories(){
      $this->db->query("SELECT * FROM `courses` ORDER BY `c_catagory`");

      $results = $this->db->resultset();

      return $results;
    }

    // Add user
    public function addCourse($data){
      // Prepare Query
      $this->db->query("INSERT INTO `courses` (`c_name`, `c_desc`, `c_author`, `c_sell`, `c_created`, `c_duration`, `c_original_price`, `c_selling_price`, `c_image`, `c_catagory`) VALUES (:NAMEE, :DESCRIPPTION, :AUTHOR, :TSELL, CURRENT_TIMESTAMP, :DURATION, :OPRICE, :SPRICE, :IMAGES, :CATAGORY);");


      // Bind Values
      $this->db->bind(':NAMEE', $data['name']);
      $this->db->bind(':DESCRIPPTION', $data['description']);
      $this->db->bind(':AUTHOR', $data['author']);
      $this->db->bind(':TSELL', 0);
      $this->db->bind(':DURATION', $data['duration']);
      $this->db->bind(':OPRICE', $data['oprice']);
      $this->db->bind(':SPRICE', $data['sprice']);
      $this->db->bind(':IMAGES', $data['image']);
      $this->db->bind(':CATAGORY', $data['catagory']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getCoursesCount(){
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

    // Update COurse
    public function updateCourse($data){
      // Prepare Query
      $this->db->query('UPDATE `courses` SET `c_name` = :NAMEE, `c_desc` = :DESCRIPTIONS, `c_author` = :AUTHOR, `c_duration` = :DURATION, `c_original_price` = :OPRICE, `c_selling_price` = :SPRICE WHERE `courses`.`c_id` = :ID;');

      // Bind Values
      $this->db->bind(':ID', $data['id']);
      $this->db->bind(':NAMEE', $data['name']);
      $this->db->bind(':AUTHOR', $data['author']);
      $this->db->bind(':DESCRIPTIONS', $data['description']);
      $this->db->bind(':DURATION', $data['duration']);
      $this->db->bind(':OPRICE', $data['oprice']);
      $this->db->bind(':SPRICE', $data['sprice']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Delete Course
    public function deleteCourse($id){
      // Prepare Query
      $this->db->query('DELETE FROM courses WHERE c_id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function test(){
      return "here";
    }
  }