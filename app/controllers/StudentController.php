<?php
require_once(__DIR__ . '/../models/Student.php');
class StudentController extends BaseController {

    private $studentModal;

    public function __construct(){
        $this->studentModal = new Student();
    }

    public function showDashboard(){
        if(isset($_SESSION['userID']) && $_SESSION['user_role'] == 'student'){
            $this->render("/student/dashboard");
            exit;
        }else{
            header("location: ../home");
        }
    }
    public function addSuggestion(){
        if(isset($_POST['subject_name']) && isset($_SESSION['userID'])){
            $this->studentModal->addSuggestions($_POST['subject_name'],$_SESSION['userID']);
            header("location: ../student/dashboard");

        }
    }
}