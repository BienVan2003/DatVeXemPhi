<?php 
    require_once("config.php");
    require_once("function.php");
echo '<script>alert("hello");</script>';
    if($_POST['type'] == 'Order')
    {
            msg_error2("Vui lòng đăng nhập để thanh toán !");
    }

