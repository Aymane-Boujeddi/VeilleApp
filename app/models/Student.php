<?php 
require_once "User.php";
class Student extends User {

    public function addSuggestions($title,$userID){
        $suggest = $this->conn->prepare("INSERT INTO subjects(subject_title,userID) values (:subject_name,:userID)");
        $suggest->execute([
            ":subject_name" => $title,
            ":userID" => $userID
        ]);
    }

}