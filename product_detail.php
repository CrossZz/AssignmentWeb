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
        $content = $_POST['content'];
        $email = $_POST['email'];
        $userid = Session::get('user_id');
        $check_appointment  = $appointment ->create_appointment($userid,$_POST);
      }
   }
?>
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
   <section id="product_detail">
   	<?php 
    $get_car= $car->get_details($id);
        if($get_car){
            while($result = $get_car->fetch_assoc()){
            	$type = 'car';
         		$get_images= $image->get_images_by_typeID($id,$type);
        			if($get_images){
            			$images = mysqli_fetch_array($get_images);
    ?>
      <div class="coming_background">
         <div class="container pl-3">
            <!-- <h2 class="coming_title">DETAIL</h2> -->
            <div class="row pt-5">
               <div class="col-md-6 col-12">
                  <div class="coming_img">
                     <img src="img/car/<?php echo $images['name']?>" class="img-fluid">
                  </div>
                  <?php
                  	}
                  ?>
               </div>
               <div class="col-md-6 col-12 d-flex align-item-center">
                  <div class="coming_detail">
                     <h3><?php echo $result['modelName'] ?></h3>
                     <h1><?php echo $result['carName'] ?></h1>
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
                     <p class="text-black">
                        <?php echo $result['carDesc'] ?>
                     </p>
                     <!-- Button trigger modal -->
                     <button class="btn" id="btnBook" data-toggle="modal"
                        data-target="#myModal">Book</button>

                     <!-- Modal -->

                  </div>
               </div>

            </div>
         </div>
         <?php 
	      }
	       } 
	     ?>
         <div class="coming_list">
         	<?php
         		$type = 'car';
         		$get_images= $image->get_images_by_typeID($id,$type);
        			if($get_images){
            			while($result = $get_images->fetch_assoc()){
         	?>
            <div class="container">
               <div class="row pt-5">
                  <div class="col-lg-2 col-md-4 col-12 coming_item">
                     <a href="#">
                        <img src="img/car/<?php echo $result['name']?>" class="img-fluid">
                     </a>
                  </div>
                  
               </div>
            </div>
            <?php 
		      }
		       } 
		     ?>
         </div>
         
   </section>
   <div class="products-detail-evaluate" style="margin-bottom: 30px;">
        <div class="center">
            <h2 class="ori-mtfont">FeedBack</h2>
        </div>
        <div class="products-detail-evaluate-item">
          <div class="user-name">
            Quang Huy
          </div>
          <p>tuyệt</p>
        </div>
        <div class="products-detail-evaluate-item">
          <div class="user-name">
            Quang Huy
          </div>
          <p>tuyệt</p>
        </div>
        <div class="products-detail-evaluate-item">
          <div class="user-name">
            Quang Huy
          </div>
          <p>tuyệt</p>
        </div>
        <div class="products-detail-evaluate-item">
          <div class="user-name">
            Quang Huy
          </div>
          <p>tuyệt</p>
        </div>
        <form style="width:80%;margin: 20px auto;" class="form-comment">
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Add Feedback</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
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
<!--                         <label for="store">Store</label>
                        <input type="text" placeholder="" name="store" id="store">
 -->                        <label for="store">Choose a Address:</label>
							<select name="store" id="store">
							  <option value="volvo">Store1</option>
							  <option value="saab">Store2</option>
							  <option value="mercedes">Store3</option>
							  <option value="audi">Store4</option>
							</select>
                     </div>
                     <div class="formbook-item">
                        <label for="address">Content</label>
                        <input type="text" placeholder="" name="address" id="address">
                     </div>
                     

                     <!-- Modal footer -->
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
</body>

</html>