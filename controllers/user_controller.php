<?php
class UserController
{
    public function index()
    {
        require_once 'models/Movie.php';

        $movies = Movie::getAll();
        $data = array('movies' => $movies);
        ob_start();
        require_once 'views/layout/main.php';
        $content = ob_get_clean();
        require_once 'views/layout/template.php';
    }
    public function login()
    {
        require_once 'models/User.php';

        $email = '';
        $pass = '';
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['pass'])) {

                $email = $_POST['email'];
                $pass = $_POST['pass'];

                if (!empty($email) && !empty($pass)) {

                    $user = User::getUserByEmail($email);

                    if (isset($user)) {
                        if ($user->pass == md5($pass)) {
                            $error = 'Login thành công';
                            $_SESSION['id'] = $user->id;
                            $_SESSION['email'] = $user->email;
                            $_SESSION['fullName'] = $user->fullName;
                            $_SESSION['role'] = $user->role;
                        } else {
                            $error = 'Mật khẩu không chính xác';
                        }
                    } else {
                        $error = 'Email không tồn tại';
                    }
                } else {
                    $error =  'Vui lòng nhập đầy đủ email và mật khẩu';
                }
            }
        }
        if (isset($_SESSION['email'])) {
            header('Location: index.php');
            exit();
        }
        require_once 'views/pages/login.php';
    }
    public function logout()
    {
        session_destroy();
        header('Location: index.php');
    }
    public function register()
    {
        require_once 'models/User.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $fullName = $_POST['fullName'];
            $pass = $_POST['pass'];
            $repass = $_POST['repass'];

            if (empty($email) || empty($fullName) || empty($pass) || empty($repass)) {
                $error = "Vui lòng điền đầy đủ thông tin.";
            } else {
                // Kiểm tra định dạng email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error = "Định dạng email không hợp lệ.";
                } else {
                    // Kiểm tra mật khẩu và mật khẩu nhập lại có khớp nhau
                    if ($pass !== $repass) {
                        $error = "Mật khẩu và mật khẩu nhập lại không khớp.";
                    } else {
                        // Thực hiện xử lý đăng ký
                        // Tiếp tục lưu thông tin người dùng vào CSDL, gửi email xác nhận, vv.
                        if (User::getUserByEmail($email) != null) {
                            $error = "Email đã tồn tại!";
                        } else {
                            $newUser = new User('', $email, md5($pass), $fullName, 0);
                            User::insert(($newUser));
                            $error = "Đăng ký thành công!";
                            $user = User::getUserByEmail($email);
                            $_SESSION['id'] = $user->id;
                            $_SESSION['email'] = $user->email;
                            $_SESSION['fullName'] = $user->fullName;
                            $_SESSION['role'] = $user->role;

                            if (isset($_SESSION['email'])) {
                                header('Location: index.php');
                                exit();
                            }
                        }
                    }
                }
            }
        }

        require_once 'views/pages/register.php';
    }
    public function MovieDetail()
    {
        require_once 'models/Movie.php';
        $movie_id = $_GET['movie_id'];
        $movie = Movie::get($movie_id);
        ob_start();
        require_once 'views/movie/movieDetail.php';
        $content = ob_get_clean();
        require_once 'views/layout/template.php';
    }
    public function SelectShowtime()
    {
        require_once 'models/Schedule.php';
        $movie_id = $_GET['movie_id'];
        // $schedules = Schedule::getAllByMovieId($movie_id);


        ob_start();
        require_once 'views/movie/selectShowtime.php';
        $content = ob_get_clean();
        require_once 'views/layout/template.php';
    }
    public function Payment()
    {
        require_once 'models/Schedule.php';
        $schedule_id = $_GET['schedule_id'];



        ob_start();
        require_once 'views/movie/payment.php';
        $content = ob_get_clean();
        require_once 'views/layout/template.php';
    }
}
