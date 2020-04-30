<?php
    class Pages extends Controller{
        public function __construct(){ }

        public function index(){

                if (isset($_SESSION['user_category'])){
                    if ($_SESSION['user_category'] == 'admin'){
                        redirect('admins');            
                    }
                }
                if (isset($_SESSION['user_category'])){
                    if ($_SESSION['user_category'] == 'volunteer'){
                        redirect('volunteers');
                    }
                }
                if (isset($_SESSION['user_category'])){
                    if ($_SESSION['user_category'] == 'category head') {
                        redirect('categoryheads');                    
                    }
                }
                if (isset($_SESSION['user_category'])){
                    if ($_SESSION['user_category'] == 'event head') {
                        redirect('eventheads');                    
                    }
                }
                if (isset($_SESSION['user_category'])){
                    if ($_SESSION['user_category'] == 'organizer') {
                        redirect('organizers');                    
                    }
                }
                if (isset($_SESSION['user_category'])){
                    if ($_SESSION['user_category'] == 'organizerhrd') {
                        redirect('organizerhrds');                    
                    }
                }
                if (isset($_SESSION['user_category'])){
                    if ($_SESSION['user_category'] == 'checker') {
                        redirect('checkers');                    
                    }
                }
                $data = [
                    'title' => 'Revels Tab'
                ];
                $this->view('pages/index', $data);
                    

        }
        public function about(){
            $data = [
                'title' => 'About Us',
                'description' => 'v4'
            ];
            $this->view('pages/about', $data);
        }
    }

?>