<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function register(){
            //Sanitize POST Data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);



            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'name' => trim($_POST['name']),
                    'regNo' => trim($_POST['regNo']),
                    'phoneNo' => trim($_POST['phoneNo']),
                    'email' => trim($_POST['email']),
                    'category' => $_POST['category'],
                    'event' => $_POST['event'],
                    'token' => 0,
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'reg_err' => '',
                    'category_err' => '',
                    'event_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''             
                ];

                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter your email id';
                }

                if(empty($data['regNo'])){
                    $data['reg_err'] = 'Please enter your Registration Number';
                }elseif(strlen($data['regNo']) != 9){
                    $data['reg_err'] = 'Please enter a valid Registration Number';
                }elseif($this->userModel->findUserByRegNo($data['regNo'])){
                    $data['reg_err'] = 'Username is already Registered';
                }

                if(empty($data['phoneNo'])){
                    $data['phone_err'] = 'Please enter your Phone Number';
                }elseif(strlen($data['phoneNo']) != 10){
                    $data['phone_err'] = 'Please Enter a valid Phone Number';
                }

                if(empty($data['name'])){
                    $data['name_err'] = 'Please enter name';
                }

                if($data['category'] == 'None'){
                    $data['category_err'] = 'Please enter Your Field';
                }

                if($data['event'] == 'None'){
                    $data['event_err'] = 'Please enter Your Field';
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be atleast 6 Char';
                }

                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please confirm your password';
                }elseif($data['confirm_password'] != $data['password']){
                    $data['confirm_password_err'] = 'Your password doesnt match';
                }

                //Making sure err is empty
                if(empty($data['email_err']) && empty($data['event_err']) && empty($data['category_err']) && empty($data['phone_err']) && empty($data['reg_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    //Resgister User
                    if($this->userModel->register($data)){
                        flash('register_success', 'You are Registered and log in');
                        //redirect to login page
                        redirect('users/login');
                    }else{
                        die('Something Went Wrong');
                    }
                }else{
                    $this->view('users/register', $data);
                }
                
                }else{
                //Init Data
                $data = [
                    'name' => '',
                    'regNo' => '',
                    'phoneNo' => '',
                    'email' => '',
                    'category' => '',
                    'event' => '',
                    'token' => 0,
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'reg_err' => '',
                    'phone_err' => '',
                    'category_err' => '',
                    'event_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''           
                ];
                $this->view('users/register', $data);
            }
        }

        public function login(){
                
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'regNo' => trim($_POST['regNo']),
                    'password' => trim($_POST['password']),
                
                    'reg_err' => '',
                    'password_err' => ''        
                ];
                
                if(empty($data['regNo'])){
                    $data['reg_err'] = 'Please enter your registration Number';
                }


                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }

                if($this->userModel->findUserByRegNo($data['regNo'])){

                }else{
                    $data['reg_err'] ='No user found in the Database';
                }



                if(empty($data['reg_err']) && empty($data['password_err'])){
                    $loggedInUser = $this->userModel->login($data['regNo'], $data['password']);

                    if($loggedInUser){
                        $this->createUserSession($loggedInUser);
                    }else{
                        $data['password_err'] = 'Password incorrect';
                        $this->view('users/login', $data);
                    }
                }else{
                    $this->view('users/login', $data);
                }

            }else{
                //Init Data
                $data = [
                    'regNo' => '',
                    'password' => '',
                    'reg_err' => '',
                    'password_err' => ''           
                ];
                $this->view('users/login', $data);
            }
        }


        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_regNo'] = $user->regNo;
            $_SESSION['user_phoneNo'] = $user->phoneNo;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_category'] = $user->category;
            $_SESSION['user_event'] = $user->event;

            if($_SESSION['user_category'] == 'admin'){
                redirect('admins');
            }elseif($_SESSION['user_category'] == 'volunteer'){
                redirect('volunteers');
            }elseif($_SESSION['user_category'] == 'category head'){
                redirect('categoryheads');
            }elseif($_SESSION['user_category'] == 'event head'){
                redirect('eventheads');
            }elseif($_SESSION['user_category'] == 'organizer'){
                redirect('organizers');
            }elseif($_SESSION['user_category'] == 'organizerhrd'){
                redirect('organizerhrds');
            }elseif($_SESSION['user_category'] == 'checker'){
                redirect('checkers');
            }
            
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_regNo']);
            unset($_SESSION['user_phoneNo']);
            unset($_SESSION['user_category']);
            unset($_SESSION['user_event']);
            session_destroy();
            redirect('users/login');
        }


    }

?>