<?php
    class Core{
        protected $currentController = 'Pages';
        protected $currentMethods = 'index';
        protected $params = [];


        public function __construct(){
            $url = $this->getUrl();
            if(file_exists('../app/controllers/' .ucwords($url[0]). '.php')){
              $this->currentController = ucwords($url[0]);
              unset($url[0]);  
            }

            require_once '../app/controllers/' .$this->currentController. '.php';
            $this->currentController = new $this->currentController;

            //Check for the second Url
            if(isset($url[1])){
                //Check method exits
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethods = $url[1];
                    unset($url[1]);
                }
            }
            
            $this->params = $url ? array_values($url): [];
            call_user_func_array([$this->currentController, $this->currentMethods], $this->params);
        }

        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }

?>