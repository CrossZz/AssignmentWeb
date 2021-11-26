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