<?php
 error_reporting(E_ALL); ini_set('display_errors',0);
if (isset($_POST['submit'])) {
  $userName = $_POST['userName'];
  $password = $_POST['password'];

if ($userName=="binoj" && $password=="asd") {
  session_start();

  $_SESSION['susername'] = $userName;
  $_SESSION['spassword'] = $password;

  //require_once 'header.php';
}
}

if (isset($_POST['logout'])) {
  //session_start();
  session_unset();
// destroy the session
session_destroy();
//echo "session destroyed";
//echo "<script> location.href='index.php'; </script>";
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
     <link href="css/mdb.min.css" rel="stylesheet">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <title></title>
   </head>
   <body>
    <nav class="navbar navbar-expand-lg navbar-dark secondary-color">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
           <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="student.php">Student</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="marks.php">Marks</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="statistics.php">Statistics</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="payments.php">Payments</a>
         </li>
       </ul>
       <?php

      if (isset($_SESSION['susername'])){
        ?>
        <form action="index.php" method="post">

          <button type="submit" class="btn btn-outline-light my-2 my-sm-0" name="logout"  >Logout</button>
        </form>
        <?php
      }else {
        require 'login.php';
      ?>

      <form class="form-inline my-2 my-lg-0">

        <button class="btn btn-outline-light my-2 my-sm-0" data-toggle="modal" data-target="#myModal"  type="button">Login</button>
      </form>

      <?php
      }

       ?>

     </div>
   </nav>
   <script type="text/javascript" src="js/mdb.min.js"></script>
   </body>
 </html>
