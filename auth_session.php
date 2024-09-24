<?php


if (!isset($_SESSION['username'])) {

   $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Dashboard.</div>";

   header('location:' . SITEURL . 'login.php');
}
