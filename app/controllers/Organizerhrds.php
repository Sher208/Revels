<?php
    class Organizerhrds extends Controller{
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

            $this->view('organizerhrds/index', $data);
        }

        public function token(){
            $count = 0;
            $user = $this->userModel->getAll();

            $data = [
                'user' => $user
            ];

            $this->view('organizerhrds/token', $data);
        }

        public function tokenup($id){
            $organizerhrds = $this->userModel->getAll();

            $data = [
                'organizerhrds' => $organizerhrds
            ];

            $this->view('organizerhrds/token', $data);
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                if(isset($_POST['token'])){
                    $user = $this->userModel->getUserById($id);
                    $count = $user->token;
                    $count = $count + 1;
                    $user->token = $count;
                    if($this->userModel->updateUserToken($user)){
                        redirect('organizerhrds/token');
                    }else{
                        die("Something went wrong");
                    }
                }else{
                    $this->view('organizerhrds/token', $data);
                }

            }else{
                $this->view('organizerhrds/token', $data);
            }
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
                        $this->view('organizerhrd/spend', $data);
                    }else{
                        die("Something went wrong");
                    }
                    }else{
                    $this->view('organizerhrd/spend', $data);
                    }
                }else{
                    $data = [
                        'id' => $user->id,
                        'token' => $user->token,
                        'count' => 0,
                        'spend_err' => ''
                    ];

                    $this->view('organizerhrd/spend', $data);
                }
        }

    }

?>