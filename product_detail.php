<?php
  include 'inc/header.php';
?>
<?php 
    if(!isset($_GET['carid']) || $_GET['carid'] ==NULL){
     echo  "<script> window.location='index.php' </script>";
   }
   else{
    $id = $_GET['carid'];
   }
 ?>

 <?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_book'])) {
      $check_login = Session::get('user_login');
      if($check_login==false){
        $check_appointment  = "<span class ='error'>you need to signin</span>";
      }
      else{
        $userid = Session::get('user_id');
        $check_appointment  = $appointment ->create_appointment($userid,$_POST);
      }
   }
?> 

<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
      $check_login = Session::get('user_login');
      if($check_login==false){
        $check_comment  = "<span class ='error'>you need to signin</span>";
      }
      else{
        $content = $_POST['content'];
        $userid = Session::get('user_id');
        $postID = "";
        $check_comment  = $comment ->create_comment($userid,$content,$postID,$id);
      }
   }
?>
<?php
     if(isset($check_appointment)){
      echo '<script type="text/javascript">
       alert("Create Appointment To Test Car Successful!");
     </script>';
     }
?>
   <!-- CAROUSEL -->
   <?php 
    $get_car= $car->get_details($id);
        if($get_car){
            while($result = $get_car->fetch_assoc()){
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
   <link rel="stylesheet" href="./css/product_detail.css">
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
               <li class="nav-item">
                  <a class="nav-link" href="./index.php">Home </a>
               </li>
               <li class="nav-item   active">
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
      <div id="carouselMovie" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
         <ol class="carousel-indicators justify-content-start">
            <li data-target="#carouselMovie" data-slide-to="0" class="active"></li>
            <li data-target="#carouselMovie" data-slide-to="1"></li>
            <li data-target="#carouselMovie" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active item_1">

               <div class="carousel-item_overlay"></div>
               <div class="container carousel-caption ">

                  <p class="title pb-1">HOME / MODELS / CAR</p>
                  <h5 class="mb-2" style="font-size: 80px;margin-top: 30px;"><?php echo $result['carName']?></h5>
                  <p><?php echo $result['carDesc']?></p>
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
               <div class="container carousel-caption ">

                  <p class="title pb-1">HOME / MODELS / CAR</p>
                  <h5 class="mb-2" style="font-size: 80px;margin-top: 30px;"><?php echo $result['carName']?></h5>
                  <p><?php echo $result['carDesc']?></p>
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
               <div class="container carousel-caption ">

                  <p class="title pb-1">HOME / MODELS / CAR</p>
                  <h5 class="mb-2" style="font-size: 80px;margin-top: 30px;"><?php echo $result['carName']?></h5>
                  <p><?php echo $result['carDesc']?></p>
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
   
   <section>
     <div class="showroom-pricing" id="product-price">
      <div class="showroom-financial">
        <div class="financial-title">
          <span>PRICE</span>
        </div>
        <div class="financial-link">
          <p >$<?php echo $result['carPrice']?></p>
        </div>
      </div>
      <div class="showroom-financial">
        <div class="financial-title">
          <span>POWER (CV) / POWER (KW)</span>
        </div>
        <div class="financial-link">
          <p>770 CV / 566 kW</p>
        </div>
      </div>
      <div class="showroom-financial">
        <div class="financial-title">
          <span>0-100 km/h</span>
        </div>
        <div class="financial-link">
          <p>28s</p>
        </div>
      </div>
      <div class="showroom-financial">
        <div class="financial-title">
          <span>MAX SPEED</span>
        </div>
        <div class="financial-link">
          <p>350 km/h</p>
        </div>
      </div>
    </div>
   </section>
   <?php
          }
        }
     ?>


   <section class="showroom-pricing-contact">
     <button class="btn" id="btnBook" data-toggle="modal" data-target="#myModal">Book</button>
     <button class="btn gallery-btn" id="btnBook">View Gallery</button>
   </section>
   <div class="gallery-block">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 80%; margin-left: auto; margin-right: auto;height: auto;">
        
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img class="d-block w-100" src="img/car.jpg">          
          </div>
          <!-- <?php 
              $type = 'car';
              $get_images= $image->get_images_by_typeID($id,$type);
                if($get_images){
                    while($result = $get_images->fetch_assoc()){
            ?>
          <div class="carousel-item">
            <img class="d-block w-100" src="img/car/<?php echo $result['name']?>" alt="First slide">
          </div>
          <?php
              }
            }
          ?> -->
          <?php 
              $type = 'car';
              $get_images= $image->get_images_by_typeID($id,$type);
                if($get_images){
                  $images = $get_images-> fetch_all(MYSQLI_ASSOC);
                  foreach ($images as $result) {
            ?>
          <div class="carousel-item">
            <img class="d-block w-100" src="img/car/<?php echo $result['typeID'].$result['name']?>" alt="First slide">
          </div>
          <?php
              }
            }
          ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only" style="margin-top: 5%;color:black;">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="sr-only"  style="margin-top: 5%;color: black;">Next</span>
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
      </div>
    </div>
      <?php 
        $get_car= $car->get_details($id);
            if($get_car){
                while($result = $get_car->fetch_assoc()){
                  $type = 'car';
                  $get_images= $image->get_images_by_typeID($id,$type);
                    if($get_images){
                        $images = mysqli_fetch_array($get_images);
       ?>
    <div class="products-detail-overview" > 
      <div class="products-detail-overview-img" >
         <img src="img/car/<?php echo $images['typeID'].$images['name']?>" alt="">
      </div>
      <div class="products-detail-overview-info" style="width: 35%; display: flex; flex-direction: column; justify-content: center;padding-right: 10%;">
        <h1>Overview</h1>
        <p><?php echo $result['carContent']?></p>
      </div>
    </div>
      <?php
          }
        }
      }
      ?>
    <div class="torque-block">
      <div class="block">
        <h2>TECHNICAL SPECIFICATIONS</h2>
        <div class="zebra-table" id="vehicle-specs">
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Vehicle Name</strong></span>
              <span>BMW 8 Series</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Body Style</strong></span>
              <span>Coupe, Cabriolet, Sedan</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Drivetrain</strong></span>
              <span>All Wheel Drive</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>EPA Classification</strong></span>
              <span>Subcompact Cars, Midsize Cars</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Passenger Capacity</strong></span>
              <span>4, 5</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Base Curb Weight</strong></span>
              <span>4478, 4736, 4758</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>EnerGuide Estimate - City</strong></span>
              <span>13.5 (2021), 14 (2021)</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>EnerGuide Estimate - Hwy</strong></span>
              <span>9.5 (2021), 9.7 (2021)</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Engine Type</strong></span>
              <span>Twin Turbo Premium Unleaded V-8</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Displacement</strong></span>
              <span>4.4 L/268</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Fuel System</strong></span>
              <span>Gasoline Direct Injection</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>SAE Net Horsepower @ RPM</strong></span>
              <span>523 @ 5500</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>SAE Net Torque @ RPM</strong></span>
              <span>553 @ 1800</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Trans Type</strong></span>
              <span>8</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Trans Description Cont.</strong></span>
              <span>Automatic w/OD</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>First Gear Ratio (:1)</strong></span>
              <span>5.50</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Second Gear Ratio (:1)</strong></span>
              <span>3.52</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Third Gear Ratio (:1)</strong></span>
              <span>2.20</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Fourth Gear Ratio (:1)</strong></span>
              <span>1.72</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Fifth Gear Ratio (:1)</strong></span>
              <span>1.32</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Sixth Gear Ratio (:1)</strong></span>
              <span>1.00</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Reverse Ratio (:1)</strong></span>
              <span>3.99</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Final Drive Axle Ratio (:1)</strong></span>
              <span>2.81</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Suspension Type - Front</strong></span>
              <span>Double Wishbone</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Suspension Type - Rear</strong></span>
              <span>Multi-Link</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Suspension Type - Front (Cont.)</strong></span>
              <span>Double Wishbone</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Suspension Type - Rear (Cont.)</strong></span>
              <span>Multi-Link</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Front Tire Order Code</strong></span>
              <span>258, 258, 258, 258, , 258</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Rear Tire Order Code</strong></span>
              <span>258, 258, 258, 258, , 258</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Front Tire Size</strong></span>
              <span>P245/35YR20</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Rear Tire Size</strong></span>
              <span>P275/30YR20</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Front Wheel Size</strong></span>
              <span>20 X 8</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Rear Wheel Size</strong></span>
              <span>20 X 9</span>
            </div>
          </div>
          
          <div class="zebra-table-item zebra-table-item_odd">
            <div class="zebra-table-item-inner">
              <span><strong>Front Wheel Material</strong></span>
              <span>Aluminum</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Rear Wheel Material</strong></span>
              <span>Aluminum</span>
            </div>
          </div>
          
          <div class="zebra-table-item undefined">
            <div class="zebra-table-item-inner">
              <span><strong>Steering Type</strong></span>
              <span>Rack-Pinion</span>
            </div>
          </div>
        </div>
        <button class="btn show-more" id="btnBook">Show More</button>
      </div>
    </div>
   <div class="products-detail-evaluate" style="margin-bottom: 30px;">
        <div class="center">
            <h2 class="ori-mtfont">FeedBack</h2>
        </div>
        <?php
          $get_comments = $comment->get_comment_car($id);
          if($get_comments ){
                    while($result = $get_comments->fetch_assoc()){
        ?>
        <div class="products-detail-evaluate-item">
          <div class="user-name">
            <?php echo $result['userName']?>
          </div>
          <p><?php echo $result['commentContent']?></p>
           <p><?php echo $result['commentTime']?><p> 
        </div>
        <?php
          }
        }
        ?> 
        <form style="width:80%;margin: 20px auto;" class="form-comment" method="post" action="">
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Add Feedback</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
          </div>
          <button name="submit_comment" type="submit" id="btnBook"class="btn btn-primary">Submit</button>
          <?php if(isset($check_comment)){
            echo $check_comment;
          }?>
        </form>

      </div>
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
   <div class="modal fade" id="myModal">
      <div class="modal-dialog">
         <div class="modal-content">
            <h3>Book appointment</h3>
            <div class="modal-body">
               <div class="formbook">
                  <form action="" method="post" id="formbook">
                     <div class="formbook-item">
                        <label for="time">Time</label>
                        <input type="date" name="time" id="time">
                     </div>
                     <div class="formbook-item">
                     <label for="store">Choose a Address:</label>
        							<select name="store" id="store">
                          <?php
                            $store_list = $store->show_store();
                            if($store_list ){
                                while($result = $store_list->fetch_assoc()){
                              echo '<option value = "'.$result["storeName"].'">'.$result["storeName"].'</option>';
                              }
                            }
                          ?>
        							</select>
                     </div>
                     <div class="formbook-item">
                        <label for="">Content</label>
                        <textarea style="width: 300px;height: 100px;" type="text" placeholder="" name="content" id="address"></textarea>
                     </div>
    		            <div class="modal-footer" id="modal-footer">
    		               <input type="submit" name="submit_book" value="Book" id="btnFormBook">
    		            </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

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
   </script>
   <script type="text/javascript" src="./js/venobox.min.js"></script>
   <script type="text/javascript">
      // //Show Vehicle Specs
      const showMore = document.getElementsByClassName("show-more")[0];
      const zebraTable = document.getElementsByClassName("zebra-table")[0];
      showMore.addEventListener("click", () => {
        zebraTable.classList.toggle("zebra-show");
        // showMore.classList.toggle("show-more-hidden");
      });

      //Gallery-Carousel
      const galleryBlock = document.getElementsByClassName("gallery-block")[0];
      const galleryButton = document.getElementsByClassName("gallery-btn")[0];
      galleryButton.addEventListener("click", () => {
        galleryBlock.classList.toggle("show-gallery");
      });
    </script>
</body>

</html>