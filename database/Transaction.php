<?php

require_once("Database.php");

  class Transaction {
    private $db;
    
    public function __construct(){
      $this->db = new Database();
    }

    // Get All transactions
    public function getAllTransactions(){
      $this->db->query("SELECT * FROM `c_transactions`");
      $results = $this->db->resultset();

      return $results;
    }

    // Get course By ID
    // public function getCourseById($id){
    //   $this->db->query("SELECT * FROM courses WHERE c_id = :id");

    //   $this->db->bind(':id', $id);
      
    //   $row = $this->db->single();

    //   return $row;
    // }

    // Get user By ID
    // public function getUserByUsername($username){
    //   $this->db->query("SELECT * FROM accounts WHERE username = :username");

    //   $this->db->bind(':username', $username);
      
    //   $row = $this->db->single();

    //   return $row;
    // }



    // Add Transaction
    public function addTransaction($data){
      // Prepare Query
      $this->db->query("INSERT INTO `c_transactions` (`order_id`, `txn_id`, `txn_amount`, `txn_date`, `status`, `bank_name`, `email_id`, `course_id`) VALUES (:ORDID, :TXNID, :AMOUNT, :DATEE, :STATUSS, :BANKNAME, :EMAIL, :COURSEID);");


      // Bind Values
      $this->db->bind(':ORDID', $data['order_id']);
      $this->db->bind(':TXNID', $data['txn_id']);
      $this->db->bind(':AMOUNT', $data['ammount']);
      $this->db->bind(':DATEE', $data["date"]);
      $this->db->bind(':STATUSS', $data['status']);
      $this->db->bind(':BANKNAME', $data['bank_name']);
      $this->db->bind(':EMAIL', $data['email']);
      $this->db->bind(':COURSEID', $data['courseid']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getTransactionCount(){
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

    // Delete Course
    // public function deleteCourse($id){
    //   // Prepare Query
    //   $this->db->query('DELETE FROM courses WHERE c_id = :id');

    //   // Bind Values
    //   $this->db->bind(':id', $id);
      
    //   //Execute
    //   if($this->db->execute()){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }

    public function test(){
      return "here";
    }
  }