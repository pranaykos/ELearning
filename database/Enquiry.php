<?php

require_once("Database.php");

  class Enquiry {
    private $db;
    
    public function __construct(){
      $this->db = new Database();
    }

    // Add Question
    public function addQuestion($data){
      // Prepare Query
      $this->db->query("INSERT INTO `enquiry` (`q_id`, `q_name`, `q_email`, `q_question`) VALUES (NULL, :NAMEE, :EMAIL, :QUESTION);");


      // Bind Values
      $this->db->bind(':NAMEE', $data['name']);
      $this->db->bind(':EMAIL', $data['email']);
      $this->db->bind(':QUESTION', $data['question']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }