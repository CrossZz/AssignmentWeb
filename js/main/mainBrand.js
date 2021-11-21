//Khai báo biến toàn cục
var dsh = new BrandList();
var validation = new Validation();

//Khi trang vừa load thì chạy code bên trong hàm getLocalStorage
getLocalStorage();

//Hàm rút gọn cú pháp document.getElementById
function getELE(id) {
  return document.getElementById(id);
}

// Xử lý UI khi thêm nhân viên
getELE("btnAddBrand").addEventListener("click", function () {
  //Xử lý button
  getELE("btnThemH").style.display = "block";
  getELE("btnCapNhat").style.display = "none";
  getELE("brandId").removeAttribute("disabled");
  getELE("formH").reset();
});

//btn.onclick = function(){}
//Khi gán hàm cho onclick không để dấu tròn (), để tránh hàm chạy khi trang vừa load
getELE("btnThemH").onclick = themHang;

//Khai báo hàm
function themHang() {
  //lấy thông tin hang
  var _bId = getELE("brandId").value;
  var _bName = getELE("brandName").value;
  var _bContent = getELE("brandContent").value;
  var _bImage = getELE("brandImage").value;

  console.log(_bId, _bName, _bContent, _bImage);

  var isValid = true;

  //& : cộng chuỗi bit
  // true: 1
  //false: 0
  // 1 & 0 => 0 (false)
  // 1 & 1 => 1 (true)
  //kiểm tra mã số (mã không được để trống, mã không được trùng)
  // isValid(mới) = isValid(cũ) & validation.kiemTraRong(_userId,"tbUserId","Mã nhân viên không được để trống");
  isValid &=
    validation.kiemTraRong(_bId, "tbBrandId", "Mã số không được để trống") &&
    validation.kiemTraMaTrung(
      dsh.brandArray,
      _bId,
      "tbBrandId",
      "Mã số bị trùng"
    );

  //kiểm tra tên hãng
  isValid &=
    validation.kiemTraRong(_bName, "tbBrandName", "Tên không được để trống") &&
    validation.kiemTraTen(_bName, "tbBrandName", "Tên phải là ký tự chữ");

  //Kiểm tra nội dung
  isValid &= validation.kiemTraRong(
    _bContent,
    "tbBrandContent",
    "Nội dung không được để trống"
  );

  // isValid == true
  if (isValid) {
    //Tạo instance(thể hiện)
    var h = new Brand(_bId, _bName, _bContent, _bImage);
    console.log(h);
    dsh.addBrand(h);
    console.log(dsh.brandArray);
    //Gọi hàm
    taoBang(dsh.brandArray);
    setLocalStorage();
  }
}

//Khai báo hàm
function taoBang(mang) {
  var tbody = getELE("tableDanhSach");
  // content chứa các thẻ tr(mỗi tr chứa thông tin 1 tin tuc)
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
                <td>${item.Id}</td>
                <td>${item.bName}</td>
                <td>${item.bContent}</td>
                <td>${item.bImage}</td>
                <td>
                    <button class="btn btn-danger" onclick="xoaHang('${item.Id}')" >Xóa</button>
                    <button data-toggle="modal"
                    data-target="#myModal" class="btn btn-info" onclick="hienThiChiTiet('${item.Id}')" >Sửa</button>
                </td>
            </tr>
        `;
  });
  tbody.innerHTML = content;
}

//Hàm xóa hang
//Khai báo hàm
function xoaHang(ma) {
  dsh.deleteBrand(ma);
  console.log("ok");
  taoBang(dsh.brandArray);
  setLocalStorage();
}
function hienThiChiTiet(ma) {
  //Lấy đối tượng nhân viên từ mảng
  var h = dsh.getDetail(ma);

  //Xử lý button
  getELE("btnThemH").style.display = "none";
  getELE("btnCapNhat").style.display = "block";

  //Điền thông tin tin tuc lên form
  getELE("brandId").value = h.Id;
  getELE("brandId").disabled = "true";

  getELE("brandName").value = h.bName;
  getELE("brandContent").value = h.bContent;
  getELE("brandImage").value = h.bImage;
}

getELE("btnCapNhat").onclick = capNhatHang;
function capNhatHang() {
  //lấy thông tin nhân viên
  var _bId = getELE("brandId").value;
  var _bName = getELE("brandName").value;
  var _bContent = getELE("brandContent").value;
  var _bImage = getELE("brandImage").value;

  //Tạo instance(thể hiện)
  var h = new Brand(_bId, _bName, _bContent, _bImage);
  console.log(h);
  // Cap nhat nguoi dung
  dsh.editBrand(h);
  taoBang(dsh.brandArray);
  setLocalStorage();
}

//Hàm lưu data xuống local storage (chỗ lưu trữ offline trong trình duyệt của người dùng)
//Khai báo hàm
function setLocalStorage() {
  //Lưu dữ liệu xuống LocalStorage
  //chỉ cho phép lưu trữ dữ liệu kiểu json
  //chuyển kiểu mảng sang kiểu json => dùng stringify của đối tương JSON
  localStorage.setItem("DSH", JSON.stringify(dsh.brandArray));
}
//Khai báo hàm
function getLocalStorage() {
  //Lấy dữ liệu từ localStorage
  // parse: chuyển json sang kiểu mảng
  //Kiểm tra localStorage
  if (localStorage.getItem("DSH") != null) {
    dsh.brandArray = JSON.parse(localStorage.getItem("DSH"));
    taoBang(dsh.brandArray);
  }
}

// C1: click button search rồi mới tìm kiếm
getELE("btnTimH").addEventListener("click", function () {
  var chuoiTK = getELE("searchName").value;
  var mangTK = [];
  mangTK = dsh.searchBrand(chuoiTK);
  taoBang(mangTK);
});

//C2: gõ từ khóa vào input và search liền
getELE("searchName").addEventListener("keypress", function () {
  var chuoiTK = getELE("searchName").value;
  var mangTK = [];
  mangTK = dsh.searchBrand(chuoiTK);
  taoBang(mangTK);
});
