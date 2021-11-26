<!DOCTYPE html>
<?php
  include 'header.php';
?>
<?php 
    $check_login = Session::get('user_login');
    if($check_login){
      if(Session::get('user_role') === 'user'){
        header('Location:http://localhost/AssignmentWeb/index.php');
      }
      else if(Session::get('user_role') === 'admin'){
        
      }else{
        header('Location: http://localhost/AssignmentWeb/index.php');
      }
    }else{
      header('Location: http://localhost/AssignmentWeb/index.php');
    }
?>
<?php
  function console_log( $data ){
    echo '<script>';
    echo 'console.log("Àds")';
    echo '</script>';
  }
  if(isset($_POST["iden"])) {
    delete_user($_POST["iden"]);
  }
  
  if(isset($_POST["u_user"])) {
    update_user($_POST);
  }

  // if(isset($_POST["search"])) {
  //   search_user($_POST);
  // }

  if(isset($_POST["c_user"])) {
    create_user($_POST);
  }

  function search_user(){
    if(isset($_POST["search"])){
      $user = new user();
      $user_list = $user->search_user($_POST["keylog"]);
      $users = [];
      while ($each_brand = mysqli_fetch_array($user_list)){
        array_push($users,$each_brand);
      }
      return [];
    }
    else return get_all_users();
  }
  function update_user($data){
    $user = new user();
    $user->update_user_admin($data);
  }
  function create_user($data){
    $user = new user();
    $user->create_user_admin($data);
  }
  function delete_user($id){
    $user = new user();
    $user->delete_user($id);
  }
  function get_all_users(){
    $user = new user();
    $user_list = $user->show_all_user();
    $users = [];
    while ($each_brand = mysqli_fetch_array($user_list)){
      array_push($users,$each_brand);
    }
    return $users;
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
          <strong>BS</strong>
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
              >
                Đăng Xuất
              </button>
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
                    Danh sách người dùng
                  </h3>
                </div>
                <div class="col-md-6 text-right">
                  <button
                    class="btn btn-primary"
                    id="btnThem"
                    data-toggle="modal"
                    data-target="#myModal"
                  >
                    Thêm người dùng
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
                      placeholder="Tên người dùng"
                      id="searchName"
                    />
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="btnTimNV"
                        ><i class="fa fa-search" onclick="search()"></i
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
                      <!-- <i class="fa fa-arrow-up" id="SapXepTang"></i>
                      <i class="fa fa-arrow-down" id="SapXepGiam"></i> -->
                    </th>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Chức Vụ</th>
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
            <form role="form" id="formNV">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-user"></i
                    ></span>
                  </div>
                  <input
                    type="text"
                    name="userId"
                    id="userId"
                    class="form-control input-sm"
                    placeholder="Mã số"
                  />
                </div>
                <span class="sp-thongbao" id="tbUserId"></span>
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
                    name="userName"
                    id="userName"
                    class="form-control input-sm"
                    placeholder="Họ và tên"
                  />
                </div>
                <span class="sp-thongbao" id="tbUserName"></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-envelope"></i
                    ></span>
                  </div>
                  <input
                    type="email"
                    name="userEmail"
                    id="userEmail"
                    class="form-control input-sm"
                    placeholder="Email"
                  />
                </div>
                <span class="sp-thongbao" id="tbUserEmail"></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-key"></i
                    ></span>
                  </div>
                  <input
                    type="password"
                    name="userPassword"
                    id="userPassword"
                    class="form-control input-sm"
                    placeholder="Mật khẩu"
                  />
                </div>
                <span class="sp-thongbao" id="tbUserPassword"></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-phone"></i
                    ></span>
                  </div>
                  <input
                    type="number"
                    name="userPhone"
                    id="userPhone"
                    class="form-control input-sm"
                    placeholder="Điện thoại"
                  />
                </div>
                <span class="sp-thongbao" id="tbUserPhone"></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-map-marker"></i
                    ></span>
                  </div>
                  <input
                    type="text"
                    name="userAddress"
                    id="userAddress"
                    class="form-control input-sm"
                    placeholder="Địa chỉ"
                  />
                </div>
                <span class="sp-thongbao" id="tbUserAddress"></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-briefcase"></i
                    ></span>
                  </div>
                  <select class="form-control" id="userRole">
                    <option value="" disabled selected>Chọn chức vụ</option>
                    <option>user</option>
                    <option>admin</option>
                  </select>
                </div>
                <span class="sp-thongbao" id="tbUserRole"></span>
              </div>
            <button id="btnThemND" type="button" onclick="add_user()" class="btn btn-success">
              Thêm
            </button>
            <button id="btnCapNhat" type="button" onclick="update_user()" class="btn btn-success">
              Cập nhật
            </button>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer" id="modal-footer">
            
            <button
              id="btnDong"
              type="button"
              class="btn btn-danger"
              data-dismiss="modal"
            >
              Đóng
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Date Picker -->
    <!-- <script src="js/jquery-ui.min.js"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- <script src="js/modal.js"></script> -->

    <!-- <script type="text/javascript">
      $(document).ready(function () {
        $("#sidebarCollapse").on("click", function () {
          $("#sidebar").toggleClass("active");
        });
      });
    </script> -->

    <script>
      function get_all_users(){
        var users=<?php echo json_encode(get_all_users());?>;
        taoBang(users);
      }
      function getELE(id) {
        return document.getElementById(id);
      }
      function del(id) {
        $.ajax({
            type: "POST",
            url: 'user.php',
            data:{"iden":id},
            success:function(result) {
              // get_all_users();
              location.reload();
            }

        });
        
      }
      
      function search(){
        get_all_users();
      }

      function add_user(){
        var validation = new Validation();
        var id = getELE("userId").value;
        var name = getELE("userName").value;
        var email = getELE("userEmail").value;
        var phone = getELE("userPhone").value;
        var password = getELE("userPassword").value;
        var address = getELE("userAddress").value;
        var role = getELE("userRole").value;
        var data = [];
        data["userId"] = id;
        data["userName"] = name;
        data["userEmail"] = email;
        data["userPhone"] = phone;
        data["userPassword"] = password;
        data["userAddress"] = address;
        data["userRole"] = role;
        // result = validation.checkuser(data);
        if (result != ""){
          alert(result);
          return;
        }
        $.ajax({
            type: "POST",
            url: 'user.php',
            data:{"c_user": 1,"id": id,"userName":name,"userEmail":email,"userPhone":phone,"userPassword":password,"userAddress":address,"userRole":role},
            success:function(result) {
              location.reload();
            }

        });
      }

      function update_user(){
        var id = parseInt(getELE("userId").value);
        var name = getELE("userName").value;
        var email = getELE("userEmail").value;
        var phone = getELE("userPhone").value;
        var password = getELE("userPassword").value;
        var address = getELE("userAddress").value;
        var role = getELE("userRole").value;
        var data = [];
        data["userID"] = id;
        data["userName"] = name;
        data["userEmail"] = email;
        data["userPhone"] = phone;
        data["userPassword"] = password;
        data["userAddress"] = address;
        data["userRole"] = role;
        $.ajax({
            type: "POST",
            url: 'user.php',
            data:{"u_user": 1,"userID": id,"userName":name,"userEmail":email,"userPhone":phone,"userPassword":password,"userAddress":address,"userRole":role},
            success:function(result) {
              location.reload();
            }

        });
      }


      function taoBang(mang) {
        var search = getELE("searchName").value;
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
          if(item["userName"].toLowerCase().includes(search.toLowerCase())){
            content += `
                  <tr>
                      <td>${item["userID"]}</td>
                      <td>${item["userName"]}</td>
                      <td>${item["userEmail"]}</td>
                      <td>${item["userPhone"]}</td>
                      <td>${item["userAddress"]}</td>
                      <td>${item["userRole"]}</td>
                      <td>
                          <button class="btn btn-danger"  onclick="del(${item["userID"]})" >Xóa</button>
                          <button data-toggle="modal"
                          data-target="#myModal" class="btn btn-info">Sửa</button>
                      </td>
                  </tr>
              `;
        }
          }
          );
        tbody.innerHTML = content;
        // console.log(content);
      }

      get_all_users();
    </script>
    <script src="./js/main/Data.js"></script>
    <script src="./js/main/DataList.js"></script>
    <script src="./js/main/Validation.js"></script>

    <!-- <script src="./js/main/mainUser.js"></script> -->
  </body>
</html>