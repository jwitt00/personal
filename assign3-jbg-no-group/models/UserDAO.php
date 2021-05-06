<?php
    include_once 'User.php';

    class UserDAO {

        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "bloguser", "blogAssign3", "blogdb");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }
 
        public function addUser($user){
            $connection=$this->getConnection();

            $username=$user->getUsername();
            $lastname=$user->getLastName();
            $firstname=$user->getFirstName();
            $password=$user->getPassword();
            $email=$user->getEmail();
            $role=$user->getRole();




            $stmt = $connection->prepare("INSERT INTO users (username, lastname, firstname, password, email, role) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $username, $lastname, $firstname, $password, $email,$role );
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteUser($userid){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM users WHERE userID = ?");
            $stmt->bind_param("i", $userid);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getUsers(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $user = new User();
                $user->load($row);
                $users[]=$user;
            }    
            $stmt->close();
            $connection->close();
            return $users;
        }

        public function authenticate($username, $passwd){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? and password = ?;");
            $stmt->bind_param("ss",$username,$passwd); 
            $stmt->execute();
            $result = $stmt->get_result();
            $found=$result->fetch_assoc();
            $stmt->close();
            $connection->close();
            var_dump($found);
            return $found;
        }

        public function getRole($userID){

            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT role FROM users WHERE userID = ?;"); 
            $stmt->bind_param("i",$userID);
            $stmt->execute();
            $result = $stmt->get_result();
            $temp = $result->fetch_assoc();
            $stmt->close();
            $connection->close();
            $role = $temp['role'];
            return $role;
        }


    }
?>
