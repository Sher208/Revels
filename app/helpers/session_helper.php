<?php
    session_start();

    function flash($name ='', $message='', $class='alert alert-success'){
        if(!empty($name)){
            if(!empty($message) && empty($_SESSION[$name])){
                if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }

                if(!empty($_SESSION[$name.'_class'])){
                    unset($_SESSION[$name.'_class']);
                }


                $_SESSION[$name] = $message;
                $_SESSION[$name.'_class'] = $class;
            }elseif(empty($message) && !empty($_SESSION[$name])){
                $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
                echo '<div class="'.$class.'" id = "msg-flash">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name.'_class']);
            }
        }
    }

    function isLoggedIn(){
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_category'])){
            return true;
        }else{
            return false;
        }
    }



    function curPageURL() {
        $pageURL = 'http';
        if(isset($_SERVER["HTTPS"]))
        if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }

?>