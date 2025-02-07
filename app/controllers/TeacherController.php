<?php

require_once(__DIR__ . '/../models/Teacher.php');

class TeacherController extends BaseController
{

    private $teacherModal;

    public function __construct()
    {
        $this->teacherModal = new Teacher();
    }

    public function showDashboard()
    {
        if (isset($_SESSION['userID']) && $_SESSION['user_role'] == 'teacher') {
            $accounts = $this->teacherModal->getPendingAccounts();
            $subjects = $this->teacherModal->getPendingSubjects();
            $users = $this->teacherModal->getUsers();
            $approvedSubjects = $this->teacherModal->getSubjects();
            $this->render('teacher/dashboard', ['accounts' => $accounts ,
                                                 'subjects' => $subjects,
                                                 'users' => $users , 
                                                  'approvedSubjects' => $approvedSubjects
                                                ]);
            exit;
        } else {
            header("location: ../home");
            exit;
        }
    }

    public function validateAccount($userID)
    {
        if ($this->teacherValidation($_SESSION['userID'], $_SESSION['user_role'])) {
            $this->teacherModal->accountValidation($userID);
            header("location: ../../../teacher/dashboard");
        }
    }

    public function rejectAccount($userID)
    {
        if ($this->teacherValidation($_SESSION['userID'], $_SESSION['user_role'])) {
            $this->teacherModal->rejectValidation($userID);
            header("location: ../../../teacher/dashboard");
        }
    }

 


    private function teacherValidation($sessionID, $sessionRole)
    {
        if (isset($sessionID) && $sessionRole == 'teacher') {
            return true;
        } else {
            header("location: ../home");
            exit;
        }
    }
}
