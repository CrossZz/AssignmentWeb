<?php 
  include 'config/session.php';
  Session::init();
 ?>
 <?php 
   include_once 'config/database.php';
   include_once 'helpers/format.php';
   spl_autoload_register(function($className){
   	   include_once "classes/".$className.".php";
   });
   $db = new Database();
   $fm = new Format();
   $user= new user();
   $store = new store();
   $contact = new contact();
   $model = new model();
   $car = new car();
   $appointment = new appointment();
   $image = new image();
 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
   <title>Car City</title>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="./css/venobox.css">
   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="./css/signin.css">
   <link rel="stylesheet" href="./css/signup.css">
   <link rel="stylesheet" href="./css/aboutus.css">
   <link rel="stylesheet" href="./css/profile.css">
   <link rel="stylesheet" href="./css/service.css">
   <link rel="stylesheet" href="./css/product_detail.css">
</head>

<body>
   <!-- NAVBAR -->
   <header class="header">
      <div class="container pt-3">
         <p class="text-right">
         	<?php 
		          if(isset($_GET['userid'])){ 
		          	Session::destroy();
		          }
		    ?>
         	<?php 
		   	 $check_login = Session::get('user_login');
		   	 if($check_login){
		   	 	echo '<button type="button" class="btn btn-signIn mx-3"><a href="?userid='.Session::get('user_id').'" >Logout</a></button>';
		   	 }
		   	 else{
                 echo '<button type="button" class="btn btn-signIn mx-3"><a href="./signin.php#signin">Sign In</a></button>';
		   	 }
		   	 ?> 
           <!--  <button type="button" class="btn btn-signIn mx-3"><a href="./signin.php#signin">Sign In</a></button> -->
            <i class="bi bi-search text-white"></i>
         </p>
      </div>
      <nav class=" container navbar navbar-expand-lg navbar-dark py-0">
         <a class="navbar-brand" href="#">
            <!-- <img src="./img/logo.svg" alt="Hình ảnh "> -->
            <span>Car City</span>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMovie"
            aria-controls="navbarMovie" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarMovie">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="./index.php">Home </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./brand.php">Brand</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./service.php">
                     Service
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./news.php">News</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="aboutus.php">About Us</a>
               </li>
            </ul>
         </div>
      </nav>
   </header>