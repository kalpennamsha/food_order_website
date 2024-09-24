<?php
include('config/constants.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registration Form</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<style>
   body {
      background-image: url(images/bg.jpg);
   }
</style>

<body>

   <div class="register">
      <h1 class="login-title">Registration</h1>
      <br>
      <?php
      if (isset($_SESSION['register'])) {
         echo $_SESSION['register'];
         unset($_SESSION['register']);
      }
      ?>
      <br>
      <form action="" class="text-center" method="post">
         Name:<br>
         <input type="text" class="register-input" name="name" placeholder="Enter Name" required /><br><br>
         Email:<br>
         <input type="email" class="register-input" name="email" placeholder="Enter email" required /><br><br>
         Password: <br>
         <input type="password" class="register-input" name="password" placeholder="Enter Password"><br><br>
         <input type="submit" class="login-button" name="submit" value="Register"><br><br>
         <p class="link">Already have an account? <a href="login.php">Login here</a></p>
      </form>
   </div>

</body>

</html>
<?php
if (isset($_POST['submit'])) {


   $name = stripslashes($_POST['name']);

   $name = mysqli_real_escape_string($conn, $name);


   $email = stripslashes($_POST['email']);
   $email = mysqli_real_escape_string($conn, $email);

   $password = stripslashes($_POST['password']);
   $password = mysqli_real_escape_string($conn, $password);



   $query = "INSERT into `tbl_user` (name, email, password)
      VALUES ('$name', '$email', '" . md5($password) . "')";
   $result = mysqli_query($conn, $query);
   if ($result) {
      $_SESSION['register'] = "<div class='success'>Registered Successful.</div>";
      header('location:' . SITEURL . 'login.php');
   } else {
      $_SESSION['register']  = "<div class='error text-center'> Required fields are missing</div>";
   }
}
?>