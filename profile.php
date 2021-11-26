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
    <div class="container" id="info">
        <?php 
            $get_info_user=$user->get_info();
            if($get_info_user){
                $result = $get_info_user->fetch_assoc();
            }
        ?> 
        <div class="view-account">
            <section class="module">
                <div class="module-inner">
                    <div class="side-bar">
                        <div class="user-info">
                            <img class="img-profile img-circle img-responsive center-block"
                                src="img/avatar/<?php echo $result['avatar'] ?>" alt="avatar">
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
                                            src="img/avatar/<?php echo $result['avatar'] ?>" alt="avatar">
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