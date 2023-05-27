<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/movie-detail.css">
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Heebo&family=Outfit:wght@300&family=Righteous&family=Squada+One&family=Staatliches&display=swap");
  </style>
  <title>Galaxy Cinema</title>
</head>

<body>
  <div style="padding-top: 100px;" class="app">
  <?php
// $content = "Nội dung trang web";

require_once  "views/layout/header.php";

echo $content;

require_once  "views/layout/footer.php";
?>

  </div>
</body>
<!-- 
    - custom js link
  -->
<script src="assets/js/script.js"></script>

<!-- 
    - ionicon link
  -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="script.js"></script>

</html>