<?php
  include 'inc/header.php';
?>
<?php 
  if(!isset($_GET['newsid']) || $_GET['newsid'] == NULL){
     echo  "<script> window.location='index.php' </script>";
  }
  else{
    $id = $_GET['newsid'];
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
        $carID = "";
        $check_comment  = $comment ->create_comment($userid,$content,$id,$carID);
      }
   }
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
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/venobox.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/news_detail.css">
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
               <li class="nav-item">
                  <a class="nav-link" href="./model.php">Models</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./service.php">
                     Service
                  </a>
               </li>
               <li class="nav-item  active">
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
  <?php 
    $get_news= $post->getpostbyId($id);
        if($get_news){
            while($result = $get_news->fetch_assoc()){
   ?>
  <section id="carousel">
    <!-- data-ride="carousel" -->
    <div id="carouselMovie" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
      <div class="carousel-inner">
        <div class="carousel-item active item_1">
            <div class="carousel-item_overlay"></div>
             <div class="container carousel-caption ">

                <p class="title pb-1">HOME / NEWS </p>
                <h5 class="mb-2" style="font-size: 80px;margin-top: 30px;"><?php echo $result['postName']?></h5>
                <p><?php echo $result['postDesc']?></p>
                <div>
                </div>
             </div>
        </div>
      </div>


    </div>
  </section>
  <!-- NEW IN -->
   <?php 
      $type = 'post';
      $get_images= $image->get_images_by_typeID($id,$type);
        if($get_images){
          $images = $get_images-> fetch_all(MYSQLI_ASSOC);
    ?>
  <section id="news">
    <h2 class="news_title">Details</h2>
    <div class="news_content">
      <h1><?php echo $result['postName']?></h1>
      <h5><?php echo $result['time']?></h5>
      <p><?php echo $result['postDesc']?></p>
      <div class="news_img">
        <img src="./img/post/<?php echo $images[0]['typeID'].$images[0]['name']?>" alt="">
      </div>
      <p><?php echo $result['postContent']?></p>

      <div class="news_img">
        <img src="./img/post/<?php echo $images[1]['typeID'].$images[1]['name']?>" alt="">
      </div>
      <p><?php echo $result['postContent']?></p>
    </div>

  </section>
  <?php 
    }
    }
  } 
  ?>

  <div class="products-detail-evaluate" style="margin-bottom: 30px;">
        <div class="center">
            <h2 class="ori-mtfont">FeedBack</h2>
        </div>
        <?php
          $get_comments = $comment->get_comment_post($id);
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
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>