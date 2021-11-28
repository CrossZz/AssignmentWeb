<!DOCTYPE html>
<?php
  include 'header.php';
?>
<?php 
    $check_login = Session::get('user_login');
    if($check_login){
      if(Session::get('user_role') === 'user'){
        header('Location: ../index.php');
      }
      else if(Session::get('user_role') === 'admin'){
        
      }else{
        header('Location: ../index.php');
      }
    }else{
      header('Location: ../index.php');
    }
?>
<?php 
    if(isset($_POST["logout"])) {
      session_destroy();
      
    }
    if(isset($_POST["submit"])) {
      if ($_POST["serviceName"]==""){
        echo "<script type='text/javascript'>alert('Type Name');</script>";
      }else if($_POST["serviceDesc"]==""){
        echo "<script type='text/javascript'>alert('Type Description');</script>";
      }else if($_POST["serviceContent"]==""){
        echo "<script type='text/javascript'>alert('Type Content');</script>";
      }else{
        $service = new service();
        $service->insert_service($_POST,$_FILES);
        header('Location: service.php');
      }
      
    }
    if(isset($_POST["submit1"])) {
      if ($_POST["serviceID"]==""){
        echo "<script type='text/javascript'>alert('Choose Id to update');</script>";
      }else if ($_POST["serviceName"]==""){
        echo "<script type='text/javascript'>alert('Type Name');</script>";
      }else if($_POST["serviceDesc"]==""){
        echo "<script type='text/javascript'>alert('Type Description');</script>";
      }else if($_POST["serviceContent"]==""){
        echo "<script type='text/javascript'>alert('Type Content');</script>";
      }else{
        $service = new service();
        $service->update_service($_POST,$_FILES);
        header('Location: service.php');
      }
    }
?>
<?php
  function getimg(){
    $type='service';
    $image = new image();
    $image_list = $image->get_images_by_type($type);
    $images = [];
    while ($each_brand = mysqli_fetch_array($image_list)){
      array_push($images,$each_brand);
    }
    return $images;
  }
  if(isset($_POST["iden"])) {
    delete_service($_POST["iden"]);
  }
  function delete_service($id){
    $service = new service();
    $service->del_service($id);
  }
  function get_all_products(){
    $service = new service();
    $service_list = $service->show_service();
    $services = [];
    while ($each_brand = mysqli_fetch_array($service_list)){
      array_push($services,$each_brand);
    }
    return $services;
  }
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý</title>

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- JQuery UI -->
    <link rel="stylesheet" href="css/jquery-ui.min.css" />

    <!-- Animate -->
    <link rel="stylesheet" href="css/animate.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/modal.css" />

    <link rel="stylesheet" href="css/style.css" />

    <link rel="stylesheet" type="text/css" href="css/main.css" />
  </head>

  <body>
    <div class="wrapper">
      <!-- Sidebar Holder -->
      <nav id="sidebar">
        <div class="sidebar-header">
          <h3>Auto World</h3>
          <!-- <strong>BS</strong> -->
        </div>

        <ul class="list-unstyled components">
          <li class="active">
            <a href="./user.php">
              <i class="fa fa-user"></i>
              Người dùng
            </a>
          </li>
          <li>
            <a href="./product.php">
              <i class="fa fa-product-hunt"></i>
              Sản phẩm
            </a>
          </li>
          <li>
            <a href="./news.php">
              <i class="fa fa-newspaper-o"></i>
              Tin tức
            </a>
          </li>
          <li>
            <a href="./appointment.php">
              <i class="fa fa-calendar"></i>
              Lịch hẹn
            </a>
          </li>
          <li>
            <a href="./comment.php">
              <i class="fa fa-comment"></i>
              Bình luận
            </a>
          </li>
          <li>
            <a href="./brand.php">
              <i class="fa fa-car"></i>
              Hãng
            </a>
          </li>
          <li>
            <a href="./service.php">
              <i class="fa fa-server"></i>
              Dịch vụ
            </a>
          </li>
          <li>
            <a href="./contact.php">
              <i class="fa fa-book"></i>
              Liên hệ
            </a>
          </li>
        </ul>
        
      </nav>

      <!-- Page Content Holder -->
      <div id="content">
        <!-- Start Page Header -->
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <!-- <button
                type="button"
                id="sidebarCollapse"
                class="btn btn-info navbar-btn"
              >
                Hide
              </button> -->
              <button
                type="button"
                class="btn btn-info navbar-btn"
                id="logout-btn"
                onclick="logout()"
              >
                Đăng Xuất
              </button>
              <script>
              function logout() {
                $.ajax({
                type: "POST",
                url: 'user.php',
                data:{"logout": 1},
                success:function(result) {
                  location.reload();
                }

              });
              }
            </script>
            </div>
          </div>
        </nav>
        <!-- End Page Header -->

        <!-- Start Content -->
        <div class="container">
          <div class="card text-center">
            <!-- Start Header -->
            <div class="card-header myCardHeader">
              <div class="row">
                <div class="col-md-6">
                  <h3 class="text-left text-primary font-weight-bold">
                    Danh sách dịch vụ
                  </h3>
                </div>
                <div class="col-md-6 text-right">
                  <button
                    class="btn btn-primary"
                    id="btnAddService"
                    data-toggle="modal"
                    data-target="#myModal"
                  >
                    Thêm, sửa dịch vụ
                  </button>
                </div>
              </div>
            </div>
            <!-- End Header -->

            <!-- Start Body -->
            <div class="card-body">
              <div class="row mb-3">
                <div class="col">
                  <div class="input-group">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Tên dịch vụ"
                      id="searchName"
                    />
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="btnTimDv"
                        ><i class="fa fa-search"></i
                      ></span>
                    </div>
                  </div>
                </div>
              </div>
              <table class="table table-bordered table-hover myTable">
                <thead class="text-primary">
                  <tr>
                    <th class="nowrap">
                      <span class="mr-1">Mã Số</span>
                    </th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Nội dung</th>
                    <th>Ảnh</th>
                    <th><em class="fa fa-cog"></em></th>
                  </tr>
                </thead>
                <tbody id="tableDanhSach"></tbody>
              </table>
            </div>
            <!-- End Body -->

            <!-- Start Footer -->
            <div class="card-footer myCardFooter">
              <nav>
                <ul
                  class="pagination justify-content-center"
                  id="ulPhanTrang"
                ></ul>
              </nav>
            </div>
            <!-- End Footer -->
          </div>
        </div>
      </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <header class="head-form mb-0">
            <h2 id="header-title">Edit</h2>
          </header>

          <!-- Modal body -->
          <div class="modal-body">
            <form role="form" method = "post" enctype = "multipart/form-data" id="formDv">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-user"></i
                    ></span>
                  </div>
                  <input
                    type="text"
                    name="serviceID"
                    id="serviceID"
                    class="form-control input-sm"
                    placeholder="Mã số"
                  />
                </div>

                <span class="sp-thongbao" id="tbServiceId"></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-address-book"></i
                    ></span>
                  </div>
                  <input
                    type="text"
                    name="serviceName"
                    id="serviceName"
                    class="form-control input-sm"
                    placeholder="Tên sản phẩm"
                  />
                </div>
                <span class="sp-thongbao" id="tbServiceName"></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-address-book"></i
                    ></span>
                  </div>
                  <input
                    type="text"
                    name="serviceDesc"
                    id="serviceDesc"
                    class="form-control input-sm"
                    placeholder="Mô tả"
                  />
                </div>
                <span class="sp-thongbao" id="tbServiceDescription"></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-address-book"></i
                    ></span>
                  </div>
                  <input
                    type="text"
                    name="serviceContent"
                    id="serviceContent"
                    class="form-control input-sm"
                    placeholder="Nội dung"
                  />
                </div>
                <span class="sp-thongbao" id="tbServiceContent"></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-address-book"></i
                    ></span>
                  </div>
                  <input
                    type="file"
                    name="myImages[]"
                    id="serviceImage"
                    class="form-control input-sm"
                    placeholder="Ảnh"
                    multiple=""
                  />
                </div>
                <span class="sp-thongbao" id="tbServiceImage"></span>
              </div>
            <input type="submit" name="submit" value = "Thêm" class="btn btn-success">
            <input type="submit" name="submit1" value = "Sửa" class="btn btn-success">
            <button
              id="btnDong"
              type="button"
              class="btn btn-danger"
              data-dismiss="modal"
            >
              Đóng
            </button>
            </form>
          </div>

          <!-- Modal footer -->
          
        </div>
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>



    <script>
      

      function get_all_services(){
        var services=<?php echo json_encode(get_all_products());?>;
        taoBang(services);
      }
      function getELE(id) {
        return document.getElementById(id);
      }
      
      function del(id) {
        $.ajax({
            type: "POST",
            url: 'service.php',
            data:{"iden":id},
            success:function(result) {
              // get_all_cars();
              location.reload();
            }

        });
        
      }
      function search(){
        get_all_services();
      }
      function getimg(){
        var imgs=<?php echo json_encode(getimg());?>;
        imgs.map(function (item, index) {
          // key = 'service';
          id = 'imglist'.concat(item["typeID"]);
          if(getELE(id)&&item["name"]!=""){
            getELE(id).innerHTML += `<img style="width:50px;height:40px;" src="../img/service/${item["typeID"]}${item["name"]}"/>`;
          }
        });
      }
      function taoBang(mang) {
        var search = getELE("searchName").value;
        var tbody = getELE("tableDanhSach");
        var content = "";
        mang.map(function (item, index) {
          if(item["serviceName"].toLowerCase().includes(search.toLowerCase())){
            content += `
                  <tr>
                      <td>${item["serviceID"]}</td>
                      <td>${item["serviceName"]}</td>
                      <td>${item["serviceDesc"]}</td>
                      <td>${item["serviceContent"]}</td>
                      <td> 
                        <div id="imglist${item["serviceID"]}">
                        </div>
                      </td>
                      <td>
                          <button class="btn btn-danger"  onclick="del(${item["serviceID"]})">Xóa</button>
                      </td>
                  </tr>
              `;
        }
          }
          );
        tbody.innerHTML = content;
        getimg();
      }

      get_all_services();
    </script>



    <!-- Date Picker -->
    <!-- <script src="js/jquery-ui.min.js"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/datepicker.js"></script>

    <!-- <script src="js/modal.js"></script> -->

    <!-- <script type="text/javascript">
      $(document).ready(function () {
        $("#sidebarCollapse").on("click", function () {
          $("#sidebar").toggleClass("active");
        });
      });
    </script> -->

    <script src="./js/main/Data.js"></script>
    <script src="./js/main/DataList.js"></script>
    <script src="./js/main/Validation.js"></script>

    <!-- <script src="./js/main/mainService.js"></script> -->
  </body>
</html>