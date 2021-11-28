<?php
  include 'inc/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Car City</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/service.css">
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
               <li class="nav-item  ">
                  <a class="nav-link" href="./index.php">Home </a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link" href="./model.php">Models</a>
               </li>
               <li class="nav-item  active">
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
  <!-- CAROUSEL -->
  <section id="carousel">
    <!-- data-ride="carousel" -->
    <div id="carouselMovie" class="carousel slide carousel-fade" data-ride="">
      <div class="carousel-inner">
        <div class="carousel-item active item_1">

           <div class="carousel-item_overlay"></div>
           <div class="container carousel-caption ">

              <p class="title pb-1">HOME / SERVICE </p>
              <h5 style="font-size: 100px ; margin-top: 10%; word-spacing: 30px;"class="mb-2">SERVICE</h5>
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
      </div>
    </div>
  </section>
  <?php
      $i=0;
      $service_list = $service->show_service();
      if($service_list ){
        while($result = $service_list->fetch_assoc()){
          $i++;
          $type = 'service';
          $get_images= $image->get_images_by_typeID($result['serviceID'],$type);
            if($get_images){
                $images = mysqli_fetch_array($get_images);
    ?>
  
  <div class="modal modal-service" id="service<?php echo $i?>">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <div class="modal-header">
          <h2 class="modal-title"><?php echo $result['serviceName']?></h2>
          <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
        </div>


        <div class="modal-body">
          <h3><?php echo $result['serviceDesc']?></h3>
          <div class="modal-img">
            <img src="./img/service/<?php echo $images['typeID'].$images['name']?>" alt="">
          </div>
          <p><?php echo $result['serviceContent']?></p>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer" id="modal-footer">

        </div>

      </div>
    </div>
  </div>

  <?php
      }
    }
  }
  ?>
  <section id="intro_service">
    <h2 class="service_title">Service</h2>
    <?php
      $i=0;
      $service_list = $service->show_service();
      if($service_list ){
        while($result = $service_list->fetch_assoc()){
          $i++;
          $type = 'service';
          $get_images= $image->get_images_by_typeID($result['serviceID'],$type);
            if($get_images){
                $images = mysqli_fetch_array($get_images);
    ?>
    <div class="wrapper_service row" data-aos="fade-right" data-aos-duration="3000">
      <div class="service_img col-12 col-md-6" >
        <img src="./img/service/<?php echo $images['typeID'].$images['name']?>" alt="">
      </div>
      <div class="service_content col-12 col-md-6"  >
        <h3><?php echo $result['serviceName']?></h3>
        <p>
          <?php echo $result['serviceDesc']?>
        </p>
        <a class="readmore" data-toggle="modal" data-target="#service<?php echo $i?>">READ MORE >></a>
      </div>
    </div>
    <?php 
        }
      }
    }
    ?>
    
  </section>
  <!-- CONTACT -->

  <!-- FOOTER -->
  <footer id="footer">
    <div class="container">
      <div class="row pt-5">
        <div class="col-sm-3 col-12">
          <h4>GET IN TOUCH</h4>
          <ul class="footer_content">
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Give us feedback</a></li>
            <li><a href="#">Contact us</a></li>
          </ul>
        </div>
        <div class="col-sm-3 col-12">
          <h4>ABOUT CAR CITY</h4>
          <ul class="footer_content">
            <li><a href="#">About us</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Brand</a></li>
            <li><a href="#">News</a></li>
          </ul>
        </div>
        <div class="col-sm-3 col-12">
          <h4>LEGAL STUFF</h4>
          <ul class="footer_content">
            <li><a href="#">Term & Conditions</a></li>
            <li><a href="#">Privacy policy</a></li>
            <li><a href="#">Cookie policy</a></li>
          </ul>
        </div>
        <div class="col-sm-3 col-12">
          <h4>CONNECT WITH US</h4>
          <ul class="footer_content footer_icon">
            <li><a href="#"><i class="bi bi-facebook mr-2"></i> facebook</a></li>
            <li><a href="#"><i class="bi bi-twitter mr-2"></i>Twitter</a></li>
            <li><a href="#"><i class="bi bi-google mr-2"></i>Google +</a></li>
          </ul>
        </div>
      </div>
      <p class="footer_info mt-5 pb-3">2021 © Car City /<span><a href="#">Web design by HCMUT Students</a></span></p>
    </div>
  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
      $(".venobox").venobox();
    });
    $(".wrapper_service").click(function () {
      console.log("...");
      $("#myModal").show();
    })
  </script>
  <script type="text/javascript" src="./js/venobox.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>