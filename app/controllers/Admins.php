<?php
    class Admins extends Controller{

        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }   

            

            $this->userModel = $this->model('User');
        }

        public function index(){

                $admins = $this->userModel->getUserByRegNo($_SESSION['user_regNo']);

                $data = [
                    'admins' => $admins
                ];
    
                $this->view('admins/index', $data);
        }


        public function token(){
            $categoryHeads = $this->userModel->getAll();

            $data = [
                'categoryHeads' => $categoryHeads
            ];

            $this->view('admins/token', $data);
        }
        
        public function confirm(){
            $members = $this->userModel->getAll();

            $data = [
                'members' => $members
            ];

            $this->view('admins/confirm', $data);
        }



        public function assignid($id){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            if($_SERVER['REQUEST_METHOD'] == 'POST'){


                $data = [
                    'id' => $id,
                    'event' => $_POST['event'],
                    'category' => $_POST['category'],
                    'category_err' => '',
                    'event_err' => ''
                ];

                if($data['user']->category == 'None'){
                    $data['category_err'] = 'Please enter category';
                }

                if($data['user']->event == 'None'){
                    $data['event_err'] = 'Please enter event';
                }

                if(empty($data['category_err']) && empty($data['event_err'])){
                    if($this->userModel->updateUser($data)){
                        redirect('admins/confirm');
                    }else{
                        die("Something went wrong");
                    }
                }else{
                    $this->view('admins/assign', $data);
                }

            }else{
                $data = [
                    // 'adders' => $adders,
                    'id' => $id,
                    'event' => '',
                    'category' => '',
                    'category_err' => '',
                    'event_err' => '',
                ];

                $this->view('admins/assign', $data);
            }

        }

        public function assign(){

            
                $data = [
                    // 'adders' => $adders,
                    'event' => '',
                    'category' => '',
                    'category_err' => '',
                    'event_err' => '',
                ];

                $this->view('admins/assign', $data);

        }


        public function tokenup($id){
            $categoryHeads = $this->userModel->getAll();

            $data = [
                'categoryHeads' => $categoryHeads
            ];

            $this->view('admins/token', $data);
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                if(isset($_POST['tokenValue'])){
                    $temp = $_POST['tokenValue'];
                    $user = $this->userModel->getUserById($id);
                    $count = $user->token;
                    $count = $count + $temp;
                    $user->token = $count;
                    if($this->userModel->updateUserToken($user)){
                        redirect('admins/token');
                    }else{
                        die("Something went wrong");
                    }
                }else{
                    $this->view('admins/token', $data);
                }

            }else{
                $this->view('admins/token', $data);
            }
        }
        


    }

?>