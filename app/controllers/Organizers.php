<?php
    class Organizers extends Controller{
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

            $this->view('organizers/index', $data);
        }

    }

?>