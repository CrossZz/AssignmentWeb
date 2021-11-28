<?php
  include 'inc/header.php';
?>

<?php 
    $check_login = Session::get('user_login');
    if(!$check_login){
        header('Location: signin.php?#formsignin');
    }   
?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_profile'])) {
      $id= Session::get('user_id');
      $check_update_info= $user->update_info_user($_POST, $id);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_password'])) {
      $id= Session::get('user_id');
      $check_update_password= $user->update_password_user($_POST, $id);
    }
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_avatar'])) {
        $id= Session::get('user_id');
        $check_update_avatar= $user->update_avatar($_FILES, $id);
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
   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="./css/profile.css">
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
               <li class="nav-item   active">
                  <a class="nav-link" href="./index.php">Home </a>
               </li>
               <li class="nav-item ">
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
    
                <p class="title pb-1">HOME / PROFILE</p>
                <h5 class="mb-2" style="margin-top:50px;">MY PROFILE</h5>
                <p>You can view and change my information, password, appointment</p>
                <div>
    
                  <button class="btn btn-trailer mt-5">
                    <a class="venobox" data-vbtype="video" href="https://youtu.be/Orw8CZpzIDU">
                      <span>Introduction Video</span>
                    </a>
                  </button>
                </div>
              </div>
            </div>
            <!-- <div class="carousel-item item_2">
    
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
          </div> -->
    
          
        </div>
      </section>
    <div class="container" id="info">
        <?php 
            $get_info_user=$user->get_info();
            if($get_info_user){
                $result = $get_info_user->fetch_assoc();
                $type = 'user';
                $get_images= $image->get_images_by_typeID($result['userID'],$type);
                  if($get_images){
                      $images = mysqli_fetch_array($get_images);
                  }
            }
        ?> 
        <div class="view-account">
            <section class="module">
                <div class="module-inner">
                    <div class="side-bar">
                        <div class="user-info">
                            <img class="img-profile img-circle img-responsive center-block"
                                src="img/user/<?php echo $images['typeID'].$images['name'] ?>" alt="avatar">
                            <ul class="meta list list-unstyled">
                                <li class="name"><?php echo $result['userName'] ?></li>
                            </ul>
                        </div>
                        <nav class="side-menu">
                            <ul class="nav">
                                <li class="active" id="profile"><a href="#info"><span class="fa fa-user"></span> Profile</a>
                                </li>
                                <li id="password"><a href="#info"><span class="fa fa-cog"></span> Password</a></li>
                                <li id="reminders"><a href="#info"><span class="fa fa-clock-o"></span> Reminders</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-panel profile">
                        <h2 class="title">Profile</h2>
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group avatar">
                                    <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                        <img class="img-rounded img-responsive"
                                            src="img/user/<?php echo $images['typeID'].$images['name'] ?>" alt="avatar">
                                    </figure>
                                    <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                        <!-- <input type="file" name="image" class="file-uploader pull-left"> -->
                                        <input type="file" name="image"/>
                                        <input type="submit" name="submit_avatar" class="btn btn-primary btn-default-alt pull-left" value="Update Avatar" />
                                    </div>
                                    <?php  
                                        if(isset($check_update_avatar)){
                                            echo $check_update_avatar;
                                        }
                                    ?>
                                </div>
                        </form>
                        <form class="form-horizontal" method="post" action="">
                            <fieldset class="fieldset">
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">User Name</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="userName" value="<?php echo $result['userName'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Address</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="userAddress" value="<?php echo $result['userAddress'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="userEmail" value="<?php echo $result['userEmail'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Phone</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="userPhone" value="<?php echo $result['userPhone'] ?>">
                                    </div>
                                </div>

                            </fieldset>

                            <hr>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                    <input class="btn btn-primary" name="submit_profile" type="submit" value="Update Profile">
                                </div>
                            </div>
                            <?php  
                                if(isset($check_update_info)){
                                    echo $check_update_info;
                                }
                            ?>
                        </form>
                    </div>
                    <div class="content-panel password">
                        <h2 class="title">Password</h2>
                        <form class="form-horizontal" method="post" action="">
                            <fieldset class="fieldset">
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Password</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="password" name="passwordOld" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">New Password</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="password" name="passwordNew" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Confirm Password</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="password" name="passwordConfirm" class="form-control" value="">
                                    </div>
                                </div>

                            </fieldset>

                            <hr>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                    <input class="btn btn-primary" name="submit_password" type="submit" value="Update Password">
                                </div>
                            </div>
                            <?php  
                                if(isset($check_update_password)){
                                    echo $check_update_password;
                                }
                            ?>
                        </form>
                    </div>
                    <div class="content-panel reminders">
                        <h2 class="title">Reminders</h2>
                        <form class="form-horizontal">
                            <fieldset class="fieldset">


                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Time</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" value="7:00 AM, 8/10/2021" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Address</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" value="123 Q1" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Store</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" value="123 Q1" disabled>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Confirm Password</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="password" class="form-control" value="">
                                    </div>
                                </div> -->

                            </fieldset>

                            <hr>
                            <!-- <div class="form-group">
                                <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                    <input class="btn btn-primary" type="submit" value="Update Password">
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
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
            <p class="footer_info mt-5 pb-3">2021 © Car City /<span><a href="#">Web design by HCMUT Students</a></span>
            </p>
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
        $("#profile").click(function () {
            $(".content-panel.profile").show();
            $(".content-panel.password, .content-panel.reminders").hide();
            $("#profile").addClass("active");
            $("#password,#reminders").removeClass("active");
        })
        $("#password").click(function () {
            $(".content-panel.password").show();
            $(".content-panel.reminders, .content-panel.profile").hide();
            $("#password").addClass("active");
            $("#profile,#reminders").removeClass("active");
        })
        $("#reminders").click(function () {
            $(".content-panel.password, .content-panel.profile").hide();
            $(".content-panel.reminders").show();
            $("#reminders").addClass("active");
            $("#password,#profile").removeClass("active");
        })
    </script>
    <script type="text/javascript" src="./js/venobox.min.js"></script>
</body>

</html>