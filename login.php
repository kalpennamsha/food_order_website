<?php
include('config/constants.php');

?>
<html>

<head>
   <title>Login - Food Order System</title>
   <link rel="stylesheet" href="css/style.css">
</head>

<style>
   body {
      background-image: url(images/bg.jpg);
   }
</style>

<body>

   <div class="login">
      <h1 class="login-title">Login</h1>
      <br>

      <?php
      if (isset($_SESSION['register'])) {
         echo $_SESSION['register'];
         unset($_SESSION['register']);
      }

      if (isset($_SESSION['login'])) {
         echo $_SESSION['login'];
         unset($_SESSION['login']);
      }

      if (isset($_SESSION['no-login-message'])) {
         echo $_SESSION['no-login-message'];
         unset($_SESSION['no-login-message']);
      }
      ?>
      <br>

      <!-- Login Form Starts HEre -->
      <form action="" method="POST" class="text-center">
         Name: <br>
         <input type="text" class="login-input" name="name" placeholder="Enter Name" required><br><br>

         Password: <br>
         <input type="password" class="login-input" name="password" placeholder="Enter Password" required><br><br>

         <input type="submit" class="login-button" name="submit" value="Login">
         <br><br>
         <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
         <br><br>
      </form>
      <!-- Login Form Ends HEre -->

   </div>

</body>

</html>

<?php


if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);

   $raw_password = md5($_POST['password']);
   $password = mysqli_real_escape_string($conn, $raw_password);


   $sql = "SELECT * FROM tbl_user WHERE name='$name' AND password='$password'";


   $res = mysqli_query($conn, $sql);


   $count = mysqli_num_rows($res);

   if ($count == 1) {

      $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
      $_SESSION['username'] = $name;


      header('location:' . SITEURL . 'dashboard.php');
   } else {

      $_SESSION['login'] = "<div class='error text-center'>name or Password did not match.</div>";

      header('location:' . SITEURL . 'login.php');
   }
}

?>