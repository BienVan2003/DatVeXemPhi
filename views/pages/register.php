<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/login.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Đăng ký</header>
                <?php
                if (!empty($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
                ?>
                <form action="?controller=user&action=register" method="post">
                    <div class="field input-field">
                        <input name="email" type="email" placeholder="Email" class="input">
                    </div>

                    <div class="field input-field">
                        <input name="fullName" type="text" placeholder="Full name" class="input">
                    </div>

                    <div class="field input-field">
                        <input name="pass" type="password" placeholder="Create password" class="password">
                    </div>

                    <div class="field input-field">
                        <input name="repass" type="password" placeholder="Confirm password" class="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field button-field">
                        <button>Đăng ký</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Bạn đã có sẵn tài khoản? <a href="?controller=user&action=login" class="login-link">Đăng nhập</a></span>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript -->
    <script src="assets/js/login.js"></script>
</body>

</html>