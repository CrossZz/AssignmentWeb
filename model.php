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

  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/venobox.css">
  <link rel="stylesheet" href="./css/style.css">
  <style type="text/css">
    
    #model2,#model3,#model4{
   display: none;
  }
  </style>
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
               <li class="nav-item">
                  <a class="nav-link" href="./index.php">Home </a>
               </li>
               <li class="nav-item  active">
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
  <!-- CAROUSEL -->
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

              <p class="title pb-1">HOME / MODELS </p>
              <h5 style="font-size: 100px ; margin-top: 10%; word-spacing: 30px;"class="mb-2">MODELS</h5>
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
  <!-- list models -->
  <section id="newin" class="container mt-5">
    <h2 class="newin_title">Models</h2>
    <div class="newin_content">
      <!-- row:display flex -->
      <div class="row">
        <?php  
          $i=0;
          $model_list = $model->show_model();
          if($model_list){
            while($model_item = $model_list->fetch_assoc()){
            $i++;
            $type = 'model';
            $get_images= $image->get_images_by_typeID($model_item['modelID'],$type);
              if($get_images){
                  $images = mysqli_fetch_array($get_images);
         ?>
       
        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
          <div class="newin_img text-white" id="img<?php echo $i?>">
            <img class="img-fluid" style="width: 100%;" src="./img/model/<?php echo $images['typeID'].$images['name']?>" alt="Hinh anh">

          </div>
          <div class="newin_name mt-5 text-center">
            <p><?php echo $model_item['modelName']?></p>
          </div>
        </div>
        <?php 
            }
          }
        }
        ?>
      </div>
    </div>
  </section>

  <!-- COMING SOON -->
  <section id="comingsoon">
    <?php  
      $i=0;
      $model_list = $model->show_model();
      if($model_list){
        while($result = $model_list->fetch_assoc()){
        $i++;
        $id_model = $result['modelID'];
        $type_model = 'model';
            $get_images_model= $image->get_images_by_typeID($id_model,$type_model);
              if($get_images_model){
                  $images_model = mysqli_fetch_array($get_images_model);
    ?>
    <div class="coming_background" id="model<?php echo $i?>">
      <div class="container pl-3">
        <h2 class="coming_title">MODELS</h2>
        <div class="row pt-5">
          <div class="col-md-6 col-12 d-flex align-item-center">
            <div class="coming_detail">
              <h1><?php echo $result['modelName']?></h1>
              <p class="text-white">
                <?php echo $result['modelDesc']?>
              </p>
              <a href="#">MORE INFO></a>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="coming_img">
              <img src="./img/model/<?php echo $images_model['typeID'].$images_model['name']?>" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
      <div class="coming_list">
        <div class="container">
          <div class="row">
              <?php 
                // echo $id_model;
                $car_list = $car->show_car_by_model($id_model);
                if($car_list){
                 
                  while($car_item = $car_list->fetch_assoc()){
                    // echo $car_item['carName'].'==';
                    $type = 'car';
                    $get_images = $image->get_images_by_typeID($car_item['carID'],$type);
                      if($get_images){
                        $images = mysqli_fetch_array($get_images);
              ?>
              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 coming_item">
                <a href="./product_detail.php?carid=<?php echo $car_item['carID']?>">
                  <img src="./img/car/<?php echo $images['typeID'].$images['name']?>" class="img-fluid" alt="image-car">
                </a>
                <p class="mt-4 mb-0 coming_name"><?php echo $car_item['carName']?></p>
                <p class="comingsoon_date">$<?php echo $car_item['carPrice']?></p>
              </div>
              <?php 
                  }
                }
              }
               ?>
          </div>
        </div>
      </div>
    </div>
    <?php 
        }
      }
    }
     ?>
    <!-- <div class="coming_background" id="model2">
      <div class="container pl-3">
        <h2 class="coming_title">COMING SOON</h2>
        <div class="row pt-5">
          <div class="col-md-6 col-12 d-flex align-item-center">
            <div class="coming_detail">
              <h3>NEW MODELS</h3>
              <h1>AUDI</h1>
              <P>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <span class="ml-2 coming_date">
                  <i class="bi bi-calendar-fill text-white"></i>
                  <span class="text-white"> 30 December, 2021</span>
                </span>
              </P>
              <p class="text-white">
                A new car model is going to satisfy the most demanding customers.
              </p>
              <a href="#">MORE INFO ></a>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="coming_img">
              <img src="./img/car2.jpg" class="img-fluid">

            </div>
          </div>
        </div>
      </div>
      <div class="coming_list">
        <div class="container">
          <div class="row pt-5">
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="coming_background" id="model3">
      <div class="container pl-3">
        <h2 class="coming_title">COMING SOON</h2>
        <div class="row pt-5">
          <div class="col-md-6 col-12 d-flex align-item-center">
            <div class="coming_detail">
              <h3>NEW MODELS</h3>
              <h1>HONDA</h1>
              <P>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <span class="ml-2 coming_date">
                  <i class="bi bi-calendar-fill text-white"></i>
                  <span class="text-white"> 30 December, 2021</span>
                </span>
              </P>
              <p class="text-white">
                A new car model is going to satisfy the most demanding customers.
              </p>
              <a href="#">MORE INFO ></a>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="coming_img">
              <img src="./img/car3.jpg" class="img-fluid">

            </div>
          </div>
        </div>
      </div>
      <div class="coming_list">
        <div class="container">
          <div class="row pt-5">
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="coming_background" id="model4">
      <div class="container pl-3">
        <h2 class="coming_title">COMING SOON</h2>
        <div class="row pt-5">
          <div class="col-md-6 col-12 d-flex align-item-center">
            <div class="coming_detail">
              <h3>NEW MODELS</h3>
              <h1>PORSCHE</h1>
              <P>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <span class="ml-2 coming_date">
                  <i class="bi bi-calendar-fill text-white"></i>
                  <span class="text-white"> 30 December, 2021</span>
                </span>
              </P>
              <p class="text-white">
                A new car model is going to satisfy the most demanding customers.
              </p>
              <a href="#">MORE INFO ></a>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="coming_img">
              <img src="./img/car1.jpg" class="img-fluid">

            </div>
          </div>
        </div>
      </div>
      <div class="coming_list">
        <div class="container">
          <div class="row pt-5">
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
            <div class="col-lg-2 col-md-4 col-12 coming_item">
              <a href="#">
                <img src="./img/huyndai.png" class="img-fluid">
              </a>
              <p class="mt-4 mb-0 coming_name">Huynhdai X50</p>
              <p class="comingsoon_date">01 December,2021</p>
            </div>
          </div>
        </div>
      </div> 
    </div> -->
  </section>


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
    $("#img1").click(function () {
      $("#model1").show();
      $("#model2").hide();
      $("#model3").hide();
      $("#model4").hide();
    });

    $("#img2").click(function () {
      $("#model2").show();
      $("#model1").hide();
      $("#model3").hide();
      $("#model4").hide();
    });
    $("#img3").click(function () {
      $("#model3").show();
      $("#model2").hide();
      $("#model1").hide();
      $("#model4").hide();

    });
    $("#img4").click(function () {
      $("#model4").show();
      $("#model2").hide();
      $("#model3").hide();
      $("#model1").hide();

    });

  </script>
  <script type="text/javascript" src="./js/venobox.min.js"></script>
</body>

</html>