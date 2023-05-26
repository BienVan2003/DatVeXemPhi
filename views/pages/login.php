<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/login.css">


    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Đăng nhập</header>
                <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                        ?>
                <form action="?controller=user&action=login" method="post">
                    <div class="field input-field">
                        <input name="email" id="email" type="email" placeholder="Email" class="input">
                    </div>

                    <div class="field input-field">
                        <input name="pass" id="pass" type="password" placeholder="Password" class="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="form-link">
                        <a href="#" class="forgot-pass">Quên mật khẩu?</a>
                    </div>
                    <div class="field button-field">
                        <button>Đăng nhập</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Bạn không có tài khoản? <a href="?controller=user&action=register" class="signup-link">Đăng ký</a></span>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="assets/js/login.js"></script>
</body>

</html>