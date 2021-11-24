<!DOCTYPE html>
<?php
  include 'header.php';
?>
<?php
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
          <li>
            <a href="./image.php">
              <i class="fa fa-image"></i>
              Ảnh
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
                    <option>Chọn chức vụ</option>
                    <option>Quản lý</option>
                    <option>Nhân viên</option>
                    <option>Khách hàng</option>
                  </select>
                </div>
                <span class="sp-thongbao" id="tbUserRole"></span>
              </div>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer" id="modal-footer">
            <button id="btnThemND" type="button" class="btn btn-success">
              Thêm
            </button>
            <button id="btnCapNhat" type="button" class="btn btn-success">
              Cập nhật
            </button>
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
      
      function taoBang(mang) {
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
          content += `
                  <tr>
                      <td>${item["userID"]}</td>
                      <td>${item["userName"]}</td>
                      <td>${item["userEmail"]}</td>
                      <td>${item["userPhone"]}</td>
                      <td>${item["userAddress"]}</td>
                      <td>${item["userRole"]}</td>
                      <td>
                          <button class="btn btn-danger"   >Xóa</button>
                          <button data-toggle="modal"
                          data-target="#myModal" class="btn btn-info"   >Sửa</button>
                      </td>
                  </tr>
              `;
        });
        tbody.innerHTML = content;
      }
      console.log("abc");

      get_all_users();
    </script>
    <script src="./js/main/Data.js"></script>
    <script src="./js/main/DataList.js"></script>
    <script src="./js/main/Validation.js"></script>

    <script src="./js/main/mainUser.js"></script>
  </body>
</html>