<?php
    class User{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }


        //Register
        public function register($data){
            $this->db->query('INSERT INTO users (name, regNo ,phoneNo, email, category, event, token, password) VALUES(:name, :regNo , :phoneNo, :email, :category, :event, :token, :password)');
            //Binding
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':regNo', $data['regNo']);
            $this->db->bind(':phoneNo', $data['phoneNo']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':event', $data['event']);
            $this->db->bind(':token', $data['token']);
            $this->db->bind(':password', $data['password']);

            //Excecute 
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function findUserByRegNo($regNo){
            $this->db->query('SELECT * FROM users WHERE regNo= :regNo');
            $this->db->bind(':regNo', $regNo);
            $row = $this->db->single();

            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function findUserByCategory($category){
            $this->db->query('SELECT * FROM users WHERE category= :category');
            $this->db->bind(':category', $category);
            $row = $this->db->single();

            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function getUserById($id){
            $this->db->query('SELECT * FROM users WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();

            return $row;
        }

        public function getUserByRegNo($regNo){
            $this->db->query('SELECT * FROM users WHERE regNo= :regNo');
            $this->db->bind(':regNo', $regNo);
            $row = $this->db->single();

            return $row;
        }

        public function getAll(){
            $this->db->query('SELECT * FROM users');
            $result = $this->db->resultSet();

            return $result;
        }

        public function updateUser($data){
            $this->db->query('UPDATE users SET category = :category, event = :event WHERE id = :id');
            //Binding
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':event', $data['event']);

            //Excecute 
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        
        public function updateUserToken($user){
            $this->db->query('UPDATE users SET token = :token WHERE id = :id');
            //Binding
            $this->db->bind(':id', $user->id);
            $this->db->bind(':token', $user->token);

            //Excecute 
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function updateUserTokenSpend($data){
            $this->db->query('UPDATE users SET token = :token WHERE id = :id');
            //Binding
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':token', $data['token']);

            //Excecute 
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        
        public function login($regNo , $password){
            $this->db->query('SELECT * FROM users WHERE regNo = :regNo');
            $this->db->bind(':regNo', $regNo);

            $row = $this->db->single();

            $hashed_password = $row->password;

            if(password_verify($password, $hashed_password)){
                return $row;
            }else{
                return false;
            }
        }

        public function updateUserTokenBuyer($data){
            $this->db->query('UPDATE users SET token = :token WHERE id = :id');
            //Binding
            $this->db->bind(':id', $data['user']->id);
            $this->db->bind(':token', $data['user']->token);

            //Excecute 
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }



?>