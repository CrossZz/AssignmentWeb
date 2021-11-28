<?php
  include 'inc/header.php';
?>
<?php 
      $check_login = Session::get('user_login');
     if($check_login){
        if(Session::get('user_role') === 'user'){
          header('Location:index.php');
        }
        else{
          header('Location: admin.php');
        }
    }
     
  ?>
<?php   
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $check_signin_user = $user->signin_user($_POST);
   }
 ?>
 <!DOCTYPE HTML>
<html lang="en">

<head>
   <title>Car City</title>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <link rel="stylesheet" href="./css/venobox.css">
   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="./css/signin.css">
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
               echo '            <button type="button" class="btn btn-signIn mx-3"><a href="./profile.php#info">My Profile</a></button>';
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
                  <a class="nav-link" href="./model.php">Models</a>
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
 <section id="carousel">
    <!-- data-ride="carousel" -->
    <div id="carouselMovie" class="carousel slide carousel-fade" data-ride="">
       <ol class="carousel-indicators justify-content-start">
          <li data-target="#carouselMovie" data-slide-to="0" class="active"></li>
          <li data-target="#carouselMovie" data-slide-to="1"></li>
          <li data-target="#carouselMovie" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner">
          <div class="carousel-item active item_1">

             <div class="carousel-item_overlay"></div>
             <div class="container carousel-caption ">

                <p class="title pb-1">FAST, FASTER, FASTER</p>
                <h5 class="mb-2">Super Car: New Generation</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                <div>

                   <button class="btn btn-trailer mt-5">
                      <a class="venobox" data-vbtype="video" href="https://youtu.be/Orw8CZpzIDU">
                         <span>Introduction Video</span>
                      </a>
                   </button>
                </div>
             </div>
          </div>
          <div class="carousel-item item_2">

             <div class="carousel-item_overlay"></div>
             <div class=" container carousel-caption">
                <p class="title pb-1">FAST, FASTER, FASTER</p>
                <h5 class="mb-2">Super Car: New Generation</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                <div>

                   <button class="btn btn-trailer mt-5">
                      <a class="venobox" data-vbtype="video" href="https://youtu.be/Orw8CZpzIDU">
                         <span>Introduction Video</span>
                      </a>
                   </button>
                </div>
             </div>
          </div>
          <div class="carousel-item item_3">

             <div class="carousel-item_overlay"></div>
             <div class="container carousel-caption">
                <p class="title pb-1">FAST, FASTER, FASTER</p>
                <h5 class="mb-2">Super Car: New Generation</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                <div>

                   <button class="btn btn-trailer mt-5">
                      <a class="venobox" data-vbtype="video" href="https://youtu.be/Orw8CZpzIDU">
                         <span>Introduction Video</span>
                      </a>
                   </button>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section id="signin">
    <div class="form-signin">
       <h3>SIGN IN</h3>
       <span><?php 
         if(isset($check_signin_user)){
          echo $check_signin_user;
         }
       ?></span>
       <form action="" method="POST" id="formsignin">
        
          <div class="form-item">
             <label for="email">Email</label>
             <input type="email" placeholder="abc@gmail.com" name="userEmail" id="email">
          </div>
          <div class="form-item">
             <label for="password">Password</label>
             <input type="password" placeholder="" name="password" id="password">
          </div>
          
          <button type="submit" name="submit" >Sign In</button>
       </form>
       <p>Don't you have an account? <a href="./signup.php#signup">Sign Up</a></p>
    </div>

 </section>

<?php
  include 'inc/footer.php';
?>