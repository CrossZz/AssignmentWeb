<!doctype html>
<html lang="en">

<head>
  <title>Car City</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/venobox.css">
  <link rel="stylesheet" href="./css/service.css">
</head>

<body>
  <!-- NAVBAR -->
  <header class="header">
    <div class="container pt-3">
      <p class="text-right">
        <!-- <i class="bi bi-telephone-fill text-white"></i> -->
        <!-- mx trái phải -->
        <!-- <span class="border-right mx-2 pr-2 text-white">0991879222</span> -->
        <button type="button" class="btn btn-signIn mx-3"><a href="./signin.php#signin">Sign In</a></button>
        <i class="bi bi-search text-white"></i>
      </p>
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
          <li class="nav-item ">
            <a class="nav-link" href="./brand.php">Brand</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./service.php">
              Service
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">About Us</a>
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

      <!-- <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a> -->
    </div>
  </section>
  <!-- NEW IN -->
  <section id="newin" class="container mt-5">
    <h2 class="newin_title">Brands</h2>
    <div class="newin_content">
      <!-- row:display flex -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
          <div class="newin_img text-white">
            <img class="img-fluid" style="width: 100%;" src="./img/logo-hyundai.png" alt="Hinh anh">
            
          </div>
          <div class="newin_name mt-5 text-center">
            <p>Huyndai</p>
            
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 text-center">
          <div class="newin_img text-white">
            <img class="img-fluid" style="width: 100%;" src="./img/logo-audi.png" alt="Hinh anh">
            
          </div>
          <div class="newin_name mt-5 text-center">
            <p>Audi</p>
            
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
          <div class="newin_img text-white">
            <img class="img-fluid" style="width: 100%;" src="./img/logo-honda.png" alt="Hinh anh">
            
          </div>
          <div class="newin_name mt-5 text-center">
            <p>Honda</p>
            
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
          <div class="newin_img text-white">
            <img class="img-fluid" style="width: 100%" src="./img/logo-porsche.png" alt="Hinh anh">
          </div>
          <div class="newin_name mt-5 text-center">
            <p>Porsche</p>
            
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <!-- COMING SOON -->
  <section id="comingsoon">
    <div class="coming_background">
      <div class="container pl-3">
        <h2 class="coming_title">COMING SOON</h2>
        <div class="row pt-5">
          <div class="col-md-6 col-12 d-flex align-item-center">
            <div class="coming_detail">
              <h3>NEW MODELS</h3>
              <h1>HUYNDAI</h1>
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
              <img src="./img/audi.jpg" class="img-fluid">
              <!-- <a class="venobox" data-vbtype="video" href="https://youtu.be/S-UPJyEHmM0">
                <i class="bi bi-play-fill d-block"></i>
              </a> -->
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
  </section>
  <!-- CONTACT -->
  <section id="contact">
    <div class="container">
      <div class="contact_content">
        <p class="text-center">Need help? Contact our support team on</p>
        <p class="contact_number text-center">0330 123 4567</p>
      </div>
    </div>
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.504638855697!2d106.65550931411646!3d10.772608262211527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec17709146b%3A0x54a1658a0639d341!2zMjY4IEzDvSBUaMaw4budbmcgS2nhu4d0!5e0!3m2!1svi!2s!4v1636181749492!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
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
  </script>
  <script type="text/javascript" src="./js/venobox.min.js"></script>
</body>

</html>