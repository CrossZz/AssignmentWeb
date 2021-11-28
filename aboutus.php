<?php
  include 'inc/header.php';
?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $check_login = Session::get('user_login');
      if($check_login==false){
        $check_contact = "<span class ='error'>you need to signin</span>";
      }
      else{
        $content = $_POST['content'];
        $email = $_POST['email'];
        $userid = Session::get('user_id');
        $check_contact = $contact->create_contact($userid,$content,$email);
      }
   }
     
?>
<?php 
   $carcity = $store->get_store_by_ID(1)->fetch_assoc();

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
   <link rel="stylesheet" href="./css/aboutus.css">
</head>

<body>
   <!-- NAVBAR -->
   <header class="header">
      <div class="container pt-3">
         <div class="text-right" style="display: flex; justify-content: flex-end; padding-right: 20px;">
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
           <form>
              <input style="height:35px; margin-right:10px;" type="text" name="search" value="Search Car..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input style="display:none;background:#f2945d; color:black;" type="submit" name="ok" value="ok">
            </form>
            <?php
              if (isset($_REQUEST['ok'])) {
                  global $search;
                  $search = addslashes($_GET['search']);
                  if (empty($search)) {
                    echo "Not empty";
                  } 
                  else {
                    $check_search = $car->search($search);
                    Session::set('search_value',$search);
                      // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                      if ($check_search) {
                          header('Location:search.php#newin');
                      } 
                      else {
                          echo "No result";
                      }                   
                  }
                }
            ?>
          <i class="bi bi-search text-white"></i>
         </div>
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
               <li class="nav-item ">
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
               <li class="nav-item ">
                  <a class="nav-link" href="./news.php">News</a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link" href="aboutus.php">About Us</a>
               </li>
            </ul>
         </div>
      </nav>
   </header>
<section id="carousel">
  <!-- data-ride="carousel" -->
  <div id="carouselMovie" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
     <!-- <ol class="carousel-indicators justify-content-start">
        <li data-target="#carouselMovie" data-slide-to="0" class="active"></li>
        <li data-target="#carouselMovie" data-slide-to="1"></li>
        <li data-target="#carouselMovie" data-slide-to="2"></li>
     </ol> -->
     <div class="carousel-inner">
        <div class="carousel-item active item_1">

           <div class="carousel-item_overlay"></div>
           <div class="container carousel-caption ">

              <p class="title pb-1">HOME / ABOUT US</p>
              <h5 style="font-size: 80px ; margin-top: 10%; word-spacing: 30px;"class="mb-2">ABOUT  US</h5>
              <p></p>
              <div>

                 <button class="btn btn-trailer mt-5">
                    <a class="venobox" data-vbtype="video" href="https://youtu.be/Orw8CZpzIDU">
                       <span>Introduction Video</span>
                    </a>
                 </button>
              </div>
           </div>
        </div>
       <!--  <div class="carousel-item item_2">

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
        </div> -->
     </div>
  </div>
</section>
<section id="contactwithus">
  <div class="form-contact">
     <h3>CONTACT WITH US</h3>
     <span><?php 
         if(isset($check_contact)){
          echo $check_contact;
         }
       ?></span>
     <form action="" method="POST" id="formcontact">
      
        <div class="formcontact-item">
           <label for="email">Email</label>
           <input type="email" placeholder="abc@gmail.com" name="email" id="emailcontact">
        </div>
        <div class="formcontact-item">
           <label for="content">Content</label>
           <textarea name="content" id="contentcontact" cols="90" rows="10"></textarea>
        </div>
        
        <button type="submit" name="submit">Send</button>
     </form>
     <p>Your request will be answered as fast as possible</p>
  </div>

</section> 
<!-- CONTACT  -->
<section id="contact">
  <div class="container">
    <div class="contact_content">
      <p class="text-center">Need help? Contact our support team on</p>
      <p class="contact_number text-center">
         <?php 
            echo $carcity["storePhone"];
         ?>
      </p>
    </div>
  </div>
  <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.504638855697!2d106.65550931411646!3d10.772608262211527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec17709146b%3A0x54a1658a0639d341!2zMjY4IEzDvSBUaMaw4budbmcgS2nhu4d0!5e0!3m2!1svi!2s!4v1636181749492!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</section>

<?php
  include 'inc/footer.php';
?>