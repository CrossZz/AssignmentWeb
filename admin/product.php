<!DOCTYPE html>
<?php
  include 'header.php';
?>



<?php
  function console_log( $data ){
    echo '<script>';
    echo 'console.log("Àds")';
    echo '</script>';
  }
  if(isset($_POST["iden"])) {
    delete_car($_POST["iden"]);
  }
  


  if(isset($_POST["c_car"])) {
    create_car($_POST);
  }

  function search_car(){
    if(isset($_POST["search"])){
      $car = new car();
      $car_list = $car->search_car($_POST["keylog"]);
      $cars = [];
      while ($each_brand = mysqli_fetch_array($car_list)){
        array_push($cars,$each_brand);
      }
      return [];
    }
    else return get_all_cars();
  }
  function create_car($data){
    $car = new car();
    $car->insert_cars($data);
  }
  function delete_car($id){
    $car = new car();
    $car->delete_car($id);
  }
  function get_all_products(){
    $car = new car();
    $car_list = $car->show_car();
    $cars = [];
    while ($each_brand = mysqli_fetch_array($car_list)){
      array_push($cars,$each_brand);
    }
    return $cars;
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
                    Danh sách sản phẩm
                  </h3>
                </div>
                <div class="col-md-6 text-right">
                  <button
                    class="btn btn-primary"
                    id="btnAddProduct"
                    data-toggle="modal"
                    data-target="#myModal"
                  >
                    Thêm sản phẩm
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
                      placeholder="Tên sản phẩm"
                      id="searchName"
                    />
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="btnTimSp"
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
                    <th>Tên Hãng</th>
                    <th>Tên</th>
                    <th>Giá</th>
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

          <!-- Modal Header -->
          <!-- 	<div class="modal-header">
					<h4 class="modal-title" id="modal-title">Modal Heading</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div> -->

          <!-- Modal body -->
          <div class="modal-body">
            <form role="form" id="formSp">
              

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fa fa-briefcase"></i
                    ></span>
                  </div>
                  <select class="form-control" id="modelName">
                    <option value="" disabled selected>Chọn hãng</option>
                    <?php
                      $model = new model();
                      $model_list = $model->show_model();
                      $models = [];
                      while ($each_brand = mysqli_fetch_array($model_list)){
                        array_push($models,$each_brand);
                      }
                      foreach ($models as $value){
                        echo '<option value = "'.$value["modelID"].'">'.$value["modelName"].'</option>';
                      }
                    ?>
                  </select>
                </div>
                <span class="sp-thongbao" id="xbrandName"></span>
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
                    name="carName"
                    id="carName"
                    class="form-control input-sm"
                    placeholder="Tên sản phẩm"
                  />
                </div>
                <span class="sp-thongbao" id="xcarName"></span>
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
                    name="carPrice"
                    id="carPrice"
                    class="form-control input-sm"
                    placeholder="Giá"
                  />
                </div>
                <span class="sp-thongbao" id="xProductPrice"></span>
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
                    name="carDesc"
                    id="carDesc"
                    class="form-control input-sm"
                    placeholder="Mô tả"
                  />
                </div>
                <span class="sp-thongbao" id="xcarDesc"></span>
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
                    name="carContent"
                    id="carContent"
                    class="form-control input-sm"
                    placeholder="Nội dung"
                  />
                </div>
                <span class="sp-thongbao" id="tbcarContent"></span>
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
                    name="productImage"
                    id="productImage"
                    class="form-control input-sm"
                    placeholder="Ảnh"
                    multiple=""
                  />
                </div>
                <span class="sp-thongbao" id="tbProductImage"></span>
              </div>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer" id="modal-footer">
            <button id="btnThemSp" type="button" onclick = "add_car()" class="btn btn-success">
              Thêm
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




    <script>
      function get_all_cars(){
        var cars=<?php echo json_encode(get_all_products());?>;
        taoBang(cars);
      }
      function getELE(id) {
        return document.getElementById(id);
      }
      function del(id) {
        $.ajax({
            type: "POST",
            url: 'product.php',
            data:{"iden":id},
            success:function(result) {
              // get_all_cars();
              location.reload();
            }

        });
        
      }
      function search(){
        get_all_cars();
      }
      function add_car(){
        var modelName = parseInt(getELE("modelName").value);
        var carName = getELE("carName").value;
        var carPrice = getELE("carPrice").value;
        var carDesc = getELE("carDesc").value;
        var carContent = getELE("carContent").value;

        var data = [];
        $.ajax({
            type: "POST",
            url: 'product.php',
            data:{"c_car": 1,"modelName": modelName,"carName":carName,"carPrice":carPrice,"carDesc":carDesc,"carContent":carContent},
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
          if(item["carName"].toLowerCase().includes(search.toLowerCase())){
            content += `
                  <tr>
                      <td>${item["carID"]}</td>
                      <td>${item["modelName"]}</td>
                      <td>${item["carName"]}</td>
                      <td>${item["carPrice"]}</td>
                      <td>${item["carDesc"]}</td>
                      <td>${item["carContent"]}</td>
                      <td> </td>
                      <td>
                          <button class="btn btn-danger"  onclick="del(${item["carID"]})" >Xóa</button>
                      </td>
                  </tr>
              `;
        }
          }
          );
        tbody.innerHTML = content;
        // console.log(content);
      }

      get_all_cars();
    </script>
    <!-- Bootstrap -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

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

    <!-- <script src="./js/main/mainProduct.js"></script> -->
  </body>
</html>