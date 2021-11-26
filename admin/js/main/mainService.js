//Khai báo biến toàn cục
var dsdv = new ServiceList();
var validation = new Validation();

//Khi trang vừa load thì chạy code bên trong hàm getLocalStorage
getLocalStorage();

//Hàm rút gọn cú pháp document.getElementById
function getELE(id) {
  return document.getElementById(id);
}

// Xử lý UI khi thêm dịch vụ
getELE("btnAddService").addEventListener("click", function () {
  //Xử lý button
  getELE("btnThemDv").style.display = "block";
  getELE("btnCapNhat").style.display = "none";
  getELE("serviceId").removeAttribute("disabled");
  getELE("formDv").reset();
});

//btn.onclick = function(){}
//Khi gán hàm cho onclick không để dấu tròn (), để tránh hàm chạy khi trang vừa load
getELE("btnThemDv").onclick = themDichVu;

//Khai báo hàm
function themDichVu() {
  //lấy thông tin dịch vụ
  var _sId = getELE("serviceId").value;
  var _sName = getELE("serviceName").value;
  var _sDescription = getELE("serviceDescription").value;
  var _sContent = getELE("serviceContent").value;
  var _sImage = getELE("serviceImage").value;

  console.log(_sId, _sName, _sDescription, _sContent, _sImage);

  var isValid = true;

  //& : cộng chuỗi bit
  // true: 1
  //false: 0
  // 1 & 0 => 0 (false)
  // 1 & 1 => 1 (true)
  //kiểm tra mã số (mã không được để trống, mã không được trùng)
  // isValid(mới) = isValid(cũ) & validation.kiemTraRong(_userId,"tbUserId","Mã dịch vụ không được để trống");
  isValid &=
    validation.kiemTraRong(_sId, "tbServiceId", "Mã số không được để trống") &&
    validation.kiemTraMaTrung(
      dsdv.serviceArray,
      _sId,
      "tbServiceId",
      "Mã số bị trùng"
    );

  //kiểm tra tên dịch vụ
  isValid &=
    validation.kiemTraRong(
      _sName,
      "tbServiceName",
      "Tên không được để trống"
    ) &&
    validation.kiemTraTen(_sName, "tbServiceName", "Tên phải là ký tự chữ");

  //kiểm tra mô tả
  isValid &= validation.kiemTraRong(
    _sDescription,
    "tbServiceDescription",
    "Mô tả không được để trống"
  );

  //kiểm tra nội dung
  isValid &= validation.kiemTraRong(
    _sContent,
    "tbServiceContent",
    "Nội dung không được để trống"
  );

  // isValid == true
  if (isValid) {
    //Tạo instance(thể hiện)
    var dv = new Service(_sId, _sName, _sDescription, _sContent, _sImage);
    console.log(dv);
    dsdv.addService(dv);
    console.log(dsdv.serviceArray);
    //Gọi hàm
    taoBang(dsdv.serviceArray);
    setLocalStorage();
  }
}

//Khai báo hàm
function taoBang(mang) {
  var tbody = getELE("tableDanhSach");
  // content chứa các thẻ tr(mỗi tr chứa thông tin 1 dịch vụ)
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
                <td>${item.sName}</td>
                <td>${item.sDescription}</td>
                <td>${item.sContent}</td>
                <td>${item.sImage}</td>
                <td>
                    <button class="btn btn-danger" onclick="xoaDichVu('${item.Id}')" >Xóa</button>
                    <button data-toggle="modal"
                    data-target="#myModal" class="btn btn-info" onclick="hienThiChiTiet('${item.Id}')" >Sửa</button>
                </td>
            </tr>
        `;
  });
  tbody.innerHTML = content;
}

//Hàm xóa dịch vụ
//Khai báo hàm
function xoaDichVu(ma) {
  dsdv.deleteService(ma);
  console.log("ok");
  taoBang(dsdv.serviceArray);
  setLocalStorage();
}
function hienThiChiTiet(ma) {
  //Lấy đối tượng dịch vụ từ mảng
  var dv = dsdv.getDetail(ma);

  //Xử lý button
  getELE("btnThemDv").style.display = "none";
  getELE("btnCapNhat").style.display = "block";

  //Điền thông tin tin tuc lên form
  getELE("serviceId").value = dv.Id;
  getELE("serviceId").disabled = "true";

  getELE("serviceName").value = dv.sName;
  getELE("serviceDescription").value = dv.sDescription;
  getELE("serviceContent").value = dv.sContent;
  getELE("serviceImage").value = dv.sImage;
}

getELE("btnCapNhat").onclick = capNhatDichVu;
function capNhatDichVu() {
  //lấy thông tin dịch vụ
  var _sId = getELE("serviceId").value;
  var _sName = getELE("serviceName").value;
  var _sDescription = getELE("serviceDescription").value;
  var _sContent = getELE("serviceContent").value;
  var _sImage = getELE("serviceImage").value;

  //Tạo instance(thể hiện)
  var dv = new Service(_sId, _sName, _sDescription, _sContent, _sImage);
  console.log(dv);
  // Cap nhat dich vu
  dsdv.editService(dv);
  taoBang(dsdv.serviceArray);
  setLocalStorage();
}

//Hàm lưu data xuống local storage (chỗ lưu trữ offline trong trình duyệt của người dùng)
//Khai báo hàm
function setLocalStorage() {
  //Lưu dữ liệu xuống LocalStorage
  //chỉ cho phép lưu trữ dữ liệu kiểu json
  //chuyển kiểu mảng sang kiểu json => dùng stringify của đối tương JSON
  localStorage.setItem("DSDV", JSON.stringify(dsdv.serviceArray));
}
//Khai báo hàm
function getLocalStorage() {
  //Lấy dữ liệu từ localStorage
  // parse: chuyển json sang kiểu mảng
  //Kiểm tra localStorage
  if (localStorage.getItem("DSDV") != null) {
    dsdv.serviceArray = JSON.parse(localStorage.getItem("dsdv"));
    taoBang(dsdv.serviceArray);
  }
}

// C1: click button search rồi mới tìm kiếm
getELE("btnTimDv").addEventListener("click", function () {
  var chuoiTK = getELE("searchName").value;
  var mangTK = [];
  mangTK = dsdv.searchService(chuoiTK);
  taoBang(mangTK);
});

//C2: gõ từ khóa vào input và search liền
getELE("searchName").addEventListener("keypress", function () {
  var chuoiTK = getELE("searchName").value;
  var mangTK = [];
  mangTK = dsdv.searchService(chuoiTK);
  taoBang(mangTK);
});