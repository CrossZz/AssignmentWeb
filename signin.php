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