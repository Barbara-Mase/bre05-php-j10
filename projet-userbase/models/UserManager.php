<?php

class UserManager {

    private array $users = [];


    public function __construct() {
        
        $host = "db.3wa.io";
        $port = "3306";
        $dbname = "barbaramase_userbase_poo";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

        $user = "barbaramase";
        $password = "a00b6c174df6836deabe8330debe5e49";

        $this->db = new PDO(
            $connexionString,
            $user,
            $password
        );
    }



    public function getUsers() : array {
        return $this->users;
    }

    public function setUsers(array $users) : void {
        $this->users = $users;
    }

    public function loadUsers() : array {
        
        
        $query = $this->db->prepare('SELECT * FROM users');
        
        $query->execute();
        
        $usersQuery = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $newUsersTable = [];
        
        foreach($usersQuery as $userQuery) {
	        $newUser = new User($userQuery["username"], $userQuery["email"], $userQuery["password"], $userQuery["role"]);
	        $newUsersTable[] = $newUser;
        }
        
        return $users = $this->setUsers($newUsersTable);
        

    }

    public function saveUser() : void {

    }

    public function deleteUser() : void {

    }
}
?>