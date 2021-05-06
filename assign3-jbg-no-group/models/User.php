<?php
    class User{
        private $userID;
        private $username;
        private $lastname;
        private $firstname;
        private $password;
        private $email;
        private $role;

        public function load($row){
            $this->setUserID($row['userID']);
            $this->setUsername($row['username']);
            $this->setLastName($row['lastname']);
            $this->setFirstName($row['firstname']);
            $this->setEmail($row['email']);
            $this->setPassword($row['password']);
            $this->setRole($row['role']);
        }

        public function setUserID($userID){
            $this->userID=$userID;
        }
        public function getUserID(){
            return $this->userID;
        }

        public function setUsername($username){
            $this->username=$username;
        }
        public function getUsername(){
            return $this->username;
        }

        public function setLastName($lastname){
            $this->lastname = $lastname;
        }
        public function getLastName(){
            return $this->lastname;
        }

        public function setFirstName($firstname){
            $this->firstname = $firstname;
        }
        public function getFirstName(){
            return $this->firstname;
        }

        public function setEmail($email){
            $this->email = $email;
        }
        public function getEmail(){
            return $this->email;
        }

        public function setPassword($password){
            $this->password = $password;
        }
        public function getPassword(){
            return $this->password;
        }
        
        public function setRole($role){
            $this->role = $role;
        }
        public function getRole(){
            return $this->role;
        }






    }
?>