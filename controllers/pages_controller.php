<?php
    class PagesController{
        public function error(){
            //Hàm này khởi động bộ đệm đầu ra đệm (output buffering)
            //Nó cho phép chúng ta chứa đầu ra của script trong bộ đệm 
            //để xử lý nó trước khi nó được gửi đến trình duyệt.
            ob_start();
            $message = "URL Not Found";
            require_once('views/pages/error.php');
            //nội dung được sinh ra trong error.php sẽ được gán vào biến $content
            $content = ob_get_clean();
            //Biến content trong template.php
            require_once('views/layout/template.php');
        }

    }
?>