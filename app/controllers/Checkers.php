<?php
    class Checkers extends Controller{
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }
            $this->userModel = $this->model('User');
        }

        public function index(){
            $user = $this->userModel->getUserByRegNo($_SESSION['user_regNo']);

            $data = [
                'user' => $user
            ];

            $this->view('checkers/index', $data);
        }

        public function buy(){
            $user = $this->userModel->getUserByRegNo($_SESSION['user_regNo']);

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $data = [
                        'user' => $user,
                        'content' => $_POST['content']
                    ];
                    $temp = $data['content'];
                    $int_temp = (int)$temp;
                    $count = $data['user']->token;
                    $count = $count + $int_temp;
                    $data['user']->token = $count;
                    if($this->userModel->updateUserTokenBuyer($data)){
                        redirect('admins/token');
                    }else{
                        die("Something went wrong");
                    }

                }else{
                    $data = [
                        'user' => $user,
                        'content' => ''
                    ];
    
                    $this->view('checkers/buy', $data);
                }
        }

    }

?>