<?php 
require_once 'config.php';
require_once 'models/User.php';

$user = User::getUserByEmail('ladmin@gmail.com');

    print_r($_POST['email']);


?>