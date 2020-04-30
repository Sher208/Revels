<?php
    require_once 'helpers/session_helper.php';
    require_once 'config/config.php';

    require_once 'helpers/Redirect.php';
    
    spl_autoload_register(function($className){
        require_once 'libraries/'.$className.'.php';
    });

    require_once 'phpqrcode/qrlib.php'
?>