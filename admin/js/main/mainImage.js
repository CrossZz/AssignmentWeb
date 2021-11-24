//Khai báo biến toàn cục
var dsa = new ImageList();
var validation = new Validation();

//Khi trang vừa load thì chạy code bên trong hàm getLocalStorage
getLocalStorage();

//Hàm rút gọn cú pháp document.getElementById
function getELE(id) {
  return document.getElementById(id);
}

// Xử lý UI khi thêm ảnh
getELE("btnAddImage").addEventListener("click", function () {
  //Xử lý button
  getELE("btnThemA").style.display = "block";
  getELE("btnCapNhat").style.display = "none";
  getELE("imageId").removeAttribute("disabled");
  getELE("formA").reset();
});

//btn.onclick = function(){}
//Khi gán hàm cho onclick không để dấu tròn (), để tránh hàm chạy khi trang vừa load
getELE("btnThemA").onclick = themAnh;

//Khai báo hàm
function themAnh() {
  //lấy thông tin lich hen
  var _iId = getELE("imageId").value;
  var _iName = getELE("imageName").value;
  var _iImage = getELE("imageImage").value;

  console.log(_iId, _iName, _iImage);

  var isValid = true;

  //& : cộng chuỗi bit
  // true: 1
  //false: 0
  // 1 & 0 => 0 (false)
  // 1 & 1 => 1 (true)
  //kiểm tra mã số (mã không được để trống, mã không được trùng)
  // isValid(mới) = isValid(cũ) & validation.kiemTraRong(_userId,"tbUserId","Mã ảnh không được để trống");
  isValid &=
    validation.kiemTraRong(_iId, "tbImageId", "Mã số không được để trống") &&
    validation.kiemTraMaTrung(
      dsa.imageArray,
      _iId,
      "tbImageId",
      "Mã số bị trùng"
    );

  //Kiểm tra tên ảnh
  isValid &= validation.kiemTraRong(
    _iName,
    "tbImageName",
    "Tên ảnh không được để trống"
  );

  // isValid == true
  if (isValid) {
    //Tạo instance(thể hiện)
    var a = new Images(_iId, _iName, _iImage);
    console.log(a);
    dsa.addImage(a);
    console.log(dsa.imageArray);
    //Gọi hàm
    taoBang(dsa.imageArray);
    setLocalStorage();
  }
}

//Khai báo hàm
function taoBang(mang) {
  var tbody = getELE("tableDanhSach");
  // content chứa các thẻ tr(mỗi tr chứa thông tin 1 lich hen)
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
                <td>${item.iName}</td>
                <td>${item.iImage}</td>
                <td>
                    <button class="btn btn-danger" onclick="xoaAnh('${item.Id}')" >Xóa</button>
                    <button data-toggle="modal"
                    data-target="#myModal" class="btn btn-info" onclick="hienThiChiTiet('${item.Id}')" >Sửa</button>
                </td>
            </tr>
        `;
  });
  tbody.innerHTML = content;
}

//Hàm xóa ảnh
//Khai báo hàm
function xoaAnh(ma) {
  dsa.deleteImage(ma);
  console.log("ok");
  taoBang(dsa.imageArray);
  setLocalStorage();
}
function hienThiChiTiet(ma) {
  //Lấy đối tượng ảnh từ mảng
  var a = dsa.getDetail(ma);

  //Xử lý button
  getELE("btnThemA").style.display = "none";
  getELE("btnCapNhat").style.display = "block";

  //Điền thông tin tin tuc lên form
  getELE("imageId").value = a.Id;
  getELE("imageId").disabled = "true";

  getELE("imageName").value = a.iName;
  getELE("imageImage").value = a.iImage;
}

getELE("btnCapNhat").onclick = capNhatAnh;
function capNhatAnh() {
  //lấy thông tin ảnh
  var _iId = getELE("imageId").value;
  var _iName = getELE("imageName").value;
  var _iImage = getELE("imageImage").value;

  //Tạo instance(thể hiện)
  var a = new Images(_iId, _iName, _iImage);
  console.log(a);
  // Cap nhat nguoi dung
  dsa.editImage(a);
  taoBang(dsa.imageArray);
  setLocalStorage();
}

//Hàm lưu data xuống local storage (chỗ lưu trữ offline trong trình duyệt của người dùng)
//Khai báo hàm
function setLocalStorage() {
  //Lưu dữ liệu xuống LocalStorage
  //chỉ cho phép lưu trữ dữ liệu kiểu json
  //chuyển kiểu mảng sang kiểu json => dùng stringify của đối tương JSON
  localStorage.setItem("DSA", JSON.stringify(dsa.imageArray));
}
//Khai báo hàm
function getLocalStorage() {
  //Lấy dữ liệu từ localStorage
  // parse: chuyển json sang kiểu mảng
  //Kiểm tra localStorage
  if (localStorage.getItem("DSA") != null) {
    dsa.imageArray = JSON.parse(localStorage.getItem("DSA"));
    taoBang(dsa.imageArray);
  }
}

// C1: click button search rồi mới tìm kiếm
getELE("btnTimA").addEventListener("click", function () {
  var chuoiTK = getELE("searchName").value;
  var mangTK = [];
  mangTK = dsa.searchImage(chuoiTK);
  taoBang(mangTK);
});

//C2: gõ từ khóa vào input và search liền
getELE("searchName").addEventListener("keypress", function () {
  var chuoiTK = getELE("searchName").value;
  var mangTK = [];
  mangTK = dsa.searchImage(chuoiTK);
  taoBang(mangTK);
});