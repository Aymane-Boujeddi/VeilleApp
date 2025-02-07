<?php 
require_once(__DIR__.'/../config/db.php');
class User  {
    protected $conn;
    protected $username;
    protected $email;
    protected $password;
    protected $role;

public function __construct()
{
    $db = new Database();
    $this->conn = $db->getConnection();
}

public function register($name,$email,$password,$role) {
//    die("register");
    
        $result = $this->conn->prepare("INSERT INTO users (username, password, email, user_role) VALUES (:username, :password, :email, :user_role)");
        $result->execute([
            ":username" => $name ,
            ":password" => $password ,
            ":email" => $email ,
            ":user_role" => $role
        ]);
      
        
        
  
}

public function login($userData){
    
    try {
        $result = $this->conn->prepare("SELECT * FROM users WHERE email=?");
        $result->execute([$userData[0]]);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($userData[1], $user["password"])){
           
           return  $user ;
        
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

public function getStatistics() {
    $statistics = [];

    // Total number of users
    $query = $this->conn->prepare("SELECT COUNT(*) AS total_users FROM utilisateurs");
    $query->execute();
    $statistics['total_users'] = $query->fetch(PDO::FETCH_ASSOC)['total_users'];

    // Total number of published projects
    $query = $this->conn->prepare("SELECT COUNT(*) AS total_projects FROM projets");
    $query->execute();
    $statistics['total_projects'] = $query->fetch(PDO::FETCH_ASSOC)['total_projects'];

    // Total number of freelancers
    $query = $this->conn->prepare("SELECT COUNT(*) AS total_freelancers FROM utilisateurs WHERE role = '3'");
    $query->execute();
    $statistics['total_freelancers'] = $query->fetch(PDO::FETCH_ASSOC)['total_freelancers'];

    // Number of ongoing offers (status = 2)
    $query = $this->conn->prepare("SELECT COUNT(*) AS ongoing_offers FROM offres WHERE status = 2");
    $query->execute();
    $statistics['ongoing_offers'] = $query->fetch(PDO::FETCH_ASSOC)['ongoing_offers'];

    return $statistics;
}

public function getAllUsers($filter, $userToSearch =''){


      
        $query = "SELECT * FROM utilisateurs WHERE role != 1"; // by default we show all users except admins
        
        // add filter to query
        if ($filter == 'clients') {
            $query .= " AND role = 2";
        } elseif ($filter == 'freelancers') {
            $query .= " AND role = 3";
        }
        
        // add search condition to query
        if ($userToSearch) {
            $query .= " AND nom_utilisateur LIKE ?";
        }
        
        $resul = $this->conn->prepare($query);
        $resul->execute($userToSearch ? ["%$userToSearch%"] : []);
        
        // Fetch and return results
        $users = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $users;
   

}

}