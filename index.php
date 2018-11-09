<?php
require 'header.php';
require 'login.php';
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Home Page</title>

   </head>
   <body>
     	<div class="view" style=" background-image: url('img/Images/bakground.jpg'); background-repeat: no-repeat; background-size:cover; background-position: center center;">
     <div class="container">
       <br>
       <h2 class="text-center">DIGITAL STUDENT RECORD BOOK</h2><br>

     </div>
     <br>
     <br>

      <div class="row" style="padding-bottom: 100px;">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="row">
           <div class="col-md-3">

          <!--image-->
           <div class="view view-cascade overlay">
             <img src="img/images/student.png"  class="img-fluid z-depth-1 rounded-circle"
             alt="Responsive image" style="display: block; margin: auto; width: 150px;height: 150px;">
             <a href="student.php">
            <div class="mask rgba-white-slight"></div>
             </a>
          </div><br>
          <!--/image-->
          <!--content-->
           <h3 style="background-color:rgba(138, 0, 204, 0.4); border-radius: 5px; text-align: center;"><b>Students</b></h3>
          <!--/ content-->
          </div>

          <div class="col-md-3">
            <!--image-->
             <div class="view view-cascade overlay">
               <img src="img/images/marks.png"  class="img-fluid z-depth-1 rounded-circle"
                alt="Responsive image" style="display: block; margin: auto; width: 150px;height: 150px;">
               <a  class="btn-floating pulse" href="marks.php">
               <div class="mask rgba-white-slight"></div>
               </a>
             </div><br>
            <!--/image-->
            <!--content-->
            <h3 style=" background-color:rgba(138, 0, 204, 0.4); border-radius: 5px; text-align: center;"><b>Marks</b></h3>
            <!--/ content-->
            </div>

            <div class="col-md-3">
             <!--image-->
               <div class="view view-cascade overlay">
                 <img src="img/images/statistics.png"  class="img-fluid z-depth-1 rounded-circle"
                  alt="Responsive image" style="display: block; margin: auto; width: 150px;height: 150px;">
                  <a href="statistics.php">
                 <div class="mask rgba-white-slight"></div>
                  </a>
               </div>
               <br>
            <!--/image-->
            <!--content-->
              <h3 style="background-color:rgba(138, 0, 204, 0.4); border-radius: 5px; text-align: center;"><b>Statistics</b></h3>
            <!--/ content-->
            </div>

            <div class="col-md-3">
              <!--image-->
                <div class="view view-cascade overlay">
                  <img src="img/images/payments.png"  class="img-fluid z-depth-1 rounded-circle" alt="Responsive image" style="display: block; margin: auto; width: 150px;height: 150px;  ">
                  <a href="payments.php">
                  <div class="mask rgba-white-slight"></div>
                  </a>
               </div>
              <!--/image-->
              <!--content-->
              <br>
               <h3 style="background-color:rgba(138, 0, 204, 0.4); border-radius: 5px; text-align: center;"><b>Payments</b></h3>
              <!--/ content-->
            </div>
          </div>
        <div class="col-md-1"></div>
      </div>
      </div>



   </body>
 </html>
<?php require 'footer.php'; ?>
