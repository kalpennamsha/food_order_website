<?php include('config/constants.php');
include("auth_session.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Restaurant Website</title>
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <!-- Navbar Section Starts Here -->
   <section class="navbar">
      <div class="container">
         <div class="nav-info">
            <div class="logo">
               <a href="#" title="Logo">
                  <img src="images/logo.png" alt="Restaurant Logo">
               </a>
            </div>

            <div class="menu">
               <ul>
                  <li>
                     <a href="<?php echo SITEURL; ?>dashboard.php">Home</a>
                  </li>
                  <li>
                     <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                  </li>
                  <li>
                     <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                  </li>

                  <li>
                     <a href="<?php echo SITEURL; ?>admin/index.php">Admin</a>
                  </li>

                  <li><a href="logout.php">Logout</a></li>
               </ul>
            </div>
         </div>

      </div>
   </section>
   <!-- Navbar Section Ends Here -->