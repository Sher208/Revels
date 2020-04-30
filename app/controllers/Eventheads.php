<?php
    class Eventheads extends Controller{
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

            $this->view('eventheads/index', $data);
        }

        public function spend(){


            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $user = $this->userModel->getUserByRegNo($_SESSION['user_regNo']);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
               

                $data = [
                    'id' => $user->id,
                    'token' => $user->token,
                    'count' => $_POST['spend'],
                    'spend_err' => ''
                ];
                
                if(empty($data['count'])){
                    $data['spend_err'] = "Please enter the number here";
                }

                if(empty($data['spend_err'])){
                    $data['token'] = $data['token'] - $data['count'];
                    
                    if($this->userModel->updateUserTokenSpend($data)){
                        $this->view('eventheads/spend', $data);
                    }else{
                        die("Something went wrong");
                    }
                    }else{
                    $this->view('eventheads/spend', $data);
                    }
                }else{
                    $data = [
                        'id' => $user->id,
                        'token' => $user->token,
                        'count' => 0,
                        'spend_err' => ''
                    ];

                    $this->view('eventheads/spend', $data);
                }
        }


    }

?>