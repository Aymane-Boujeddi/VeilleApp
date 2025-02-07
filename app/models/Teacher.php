<?php

require_once __DIR__ . "/User.php";

class Teacher extends User {


    public function validateAccounts($userID){
        $validate = $this->conn->prepare("UPDATE users SET user_status = :status where userID = :userID");
        $validate->execute([
            ":status" => "approved" ,
            ":userID" => $userID
        ]);
    }
    public function getPendingAccounts(){
        $query = $this->conn->prepare("SELECT * from users where user_status = :suspended and user_status = :pending");
         $query->execute([
            ":pending" => "pending",
            ":suspended" => "suspended"
        ]);
        return $query->fetchAll(PDO::FETCH_OBJ);
       
    }
    public function getPendingSubjects(){
        $query = $this->conn->prepare("SELECT s.* , us.username FROM subjects s
                                        JOIN users us on us.userID = s.userID
                                        WHERE subject_status = :status");
        $query->execute([
            ":status" => "pending"
        ]);
       return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getUsers(){
        $query = $this->conn->prepare("SELECT * from users where user_status = :status ");
        $query->execute([
           ":status" => "approved"
       ]);
       return $query->fetchAll(PDO::FETCH_OBJ);

    }
    public function getSubjects(){
        $query = $this->conn->prepare("SELECT s.* , us.username FROM subjects s
                                        JOIN users us on us.userID = s.userID
                                        WHERE subject_status = :status");
        $query->execute([
            ":status" => "approved"
        ]);
       return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    
    public function accountValidation($userID) {
        $validate = $this->conn->prepare("UPDATE users SET user_status = :status where userID = :userID");
        $validate->execute([
            ":status" => "approved" , 
            ":userID" => $userID
        ]);

    }
    public function rejectValidation($userID){
        $reject = $this->conn->prepare("DELETE FROM users WHERE userID = :userID");
        $reject->execute([
            ":userID" => $userID
        ]);
    }
}