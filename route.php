<?php
    $supported_controllers = array(
        'user' => array('index', 'login', 'register', 'logout', 'MovieDetail', 'SelectShowtime', 'Payment', 'save', 'delete'),
        'movie' => array('index', 'view', 'edit', 'save', 'delete'),
        'pages' => array('error')
    );

    if(!array_key_exists($controller, $supported_controllers) || !in_array($action, $supported_controllers[$controller])){
        $controller = 'pages';
        $action = 'error';
    }

    require_once("controllers/" . $controller. "_controller.php");
    // Ham ucfirst viet hoa chu cai dau
    // Bien className dung de noi ten
    // className se la ten class can dung
    $className = ucfirst($controller) . "Controller";
    

    $obj = new $className();//Tao object thong qua string
    $obj->$action();//Goi phuong thuc
?>