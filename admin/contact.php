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
  if(isset($_POST["change"])) {
    $contact = new contact();
    $contact_list = $contact->change_state($_POST["change"]);
  }
  function get_all_products(){
    $contact = new contact();
    $contact_list = $contact->show_all_contact();
    $contacts = [];
    while ($each_brand = mysqli_fetch_array($contact_list)){
      array_push($contacts,$each_brand);
    }
    return $contacts;
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
          <li>
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
          <li class="active">
            <a href="./contact.php">
              <i class="fa fa-book"></i>
              Liên hệ
            </a>
          </li>
          <li>
            <a href="./store.php">
              <i class="fa fa-building"></i>
              Cửa hàng
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
                id="mainpage-btn"
                onclick="mainpage()"
              >
                Trang chủ
              </button>
              <script>
                var btn = document.getElementById('mainpage-btn');
                btn.addEventListener('click', function() {
                  document.location.href = '../index.php';
                });
              </script>
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
                    Danh sách liên hệ
                  </h3>
                </div>
                <!-- <div class="col-md-6 text-right">
                  <button
                    class="btn btn-primary"
                    id="btnThem"
                    data-toggle="modal"
                    data-target="#myModal"
                  >
                    
                  </button>
                </div> -->
              </div>
            </div>
            <!-- End Header -->

            <!-- Start Body -->
            <div class="card-body">
              <div class="row mb-3">
                <div class="col">
                  <div class="input-group">
                  <select class="form-control" id="cnt" onchange="searchContact()" >
                    <option value=0>Tất cả</option>
                    <option value=1>Đã xem</option>
                    <option value=2>Chưa xem</option>
                  </select>
                  </div>
                </div>
              </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col">
                  <div class="input-group">
                  </div>
                </div>
              </div>
              <table class="table table-bordered table-hover myTable">
                <thead class="text-primary">
                  <tr>
                    <th class="nowrap">
                      <span class="mr-1">Mã Số</span>
                      <!-- <i class="fa fa-arrow-up" id="SapXepTang"></i>
                      <i class="fa fa-arrow-down" id="SapXepGiam"></i> -->
                    </th>
                    <th>Mã khách hàng</th>
                    <th>Nội dung</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
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

    <!-- Bootstrap -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>


    <script>
      

      function get_all_contacts(){
        var contact=<?php echo json_encode(get_all_products());?>;
        taoBang(contact);
      }
      function getELE(id) {
        return document.getElementById(id);
      }
      function searchContact(){
          console.log("a");
        get_all_contacts();
      }
      function change(id){
        $.ajax({
            type: "POST",
            url: 'contact.php',
            data:{"change": id},
            success:function(result) {
                location.reload();
            }
            
        });
      }
      function taoBang(mang) {
        var search = 0;
        search = parseInt(getELE("cnt").value);
        var tbody = getELE("tableDanhSach");
        // content chứa các thẻ tr(mỗi tr chứa thông tin 1 nd)
        var content = "";
        // map: giúp duyệt mảng (ES6)
        //reduce: ES6
        // for: cú pháp dài, tốc độ duyệt mảng nhanh (ES5)
        //forEach (ES5)
        mang.map(function (item, index) {
          //item đại diện cho 1 phần tử trong mảng
          //item chính là 1 nd
          // content = `tr mới` + content(chứa các tr trước đó)
          var ct = ``;
          if(item["state"]=="Đã xem"){
            ct=`<td></td>`;
          }else if(item["state"]=="Chưa xem"){
            ct=`<td id="ct${item["contactID"]}"><button class="btn btn-success"  onclick="change(${item['contactID']})" >Đã xem</button></td>`;
          }
          
          if (search==0){
            content = content+`
                    <tr>
                        <td>${item["contactID"]}</td>
                        <td>${item["userID"]}</td>
                        <td>${item["content"]}</td>
                        <td>${item["email"]}</td>
                        <td>${item["state"]}</td>`+ct+
                        `
                    </tr>`;
          }else if(search==1 && item["state"]=="Đã xem"){
            content = content+`
                    <tr>
                        <td>${item["contactID"]}</td>
                        <td>${item["userID"]}</td>
                        <td>${item["content"]}</td>
                        <td>${item["email"]}</td>
                        <td>${item["state"]}</td>`+ct+
                        `
                    </tr>`;
          }else if(search==2 && item["state"]=="Chưa xem"){
            content = content+`
                    <tr>
                        <td>${item["contactID"]}</td>
                        <td>${item["userID"]}</td>
                        <td>${item["content"]}</td>
                        <td>${item["email"]}</td>
                        <td>${item["state"]}</td>`+ct+
                        `
                    </tr>`;
          }
          
          }
          );
        tbody.innerHTML = content;
        // console.log(content);
      }
      get_all_contacts();
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

    <script src="./js/main/main.js"></script>
  </body>
</html>