/**
 * Chứa nhiều danh sách (nhiều đối tượng nv)
 * + userArray
 *
 * Phương thức:
 * + thêm nd (thêm một phần tử vào mảng)
 *
 * + cập nhật nv (thay đổi giá trị của phần tử trong mảng)
 * + tìm kiếm nv (tìm kiếm phần tử trong mảng)
 *
 *
 * + xóa nd (xóa một phần tử ra khỏi mảng)
 * _ Dựa vào vị trí(index) trong mảng xóa phần tử ra khỏi mảng
 * _Dựa vào mã người dùng để xác định vị trí của nv trong mảng
 * _ tạo hàm tìm vị trí
 *  viTri = -1
 * Nếu không tìm thấy nhân viên thì viTri = -1
 * Ngược lại tìm thấy nhân viên thì viTri >-1
 *
 * deleteUser: dựa vào kết quả của hàm tìm vị trí để xóa nv ra khỏi mảng
 */

 function UserList() {
    //Thuộc tính
    this.userArray = [];
  
    //Phương thức them user
    this.addUser = function (nv) {
      this.userArray.push(nv);
    };
  
    // Phuong thuc tim vi tri nguoi dung
    this.searchIndex = function (ma) {
      var userIndex = -1;
      this.userArray.map(function (item, index) {
        if (item.Id == ma) {
          //tìm thấy nhân viên trong mảng
          userIndex = index;
        }
      });
  
      return userIndex;
    };
  
    // Phuong thuc xoa user
    this.deleteUser = function (ma) {
      var userIndex = this.searchIndex(ma);
      console.log(userIndex);
      if (userIndex != -1) {
        //tìm thấy user
        this.userArray.splice(userIndex, 1);
      }
    };
  
    // Phuong thuc lay thong tin chi tiet
    this.getDetail = function (ma) {
      var userIndex = this.searchIndex(ma);
      var user = "";
      if (userIndex != -1) {
        user = dsnd.userArray[userIndex];
      }
      return user;
    };
  
    // Phuong thuc chinh sua nguoi dung
    this.editUser = function (us) {
      var userIndex = this.searchIndex(us.Id);
      if (userIndex != -1) {
        dsnd.userArray[userIndex] = us;
      }
    };
  }
  
  function ProductList() {
    this.productArray = [];
  
    this.addProduct = function (p) {
      this.productArray.push(p);
    };
  
    this.searchIndex = function (ma) {
      var productIndex = -1;
      this.productArray.map(function (item, index) {
        if (item.Id == ma) {
          productIndex = index;
        }
      });
  
      return productIndex;
    };
  
    this.deleteProduct = function (ma) {
      var productIndex = this.searchIndex(ma);
      console.log(productIndex);
      if (productIndex != -1) {
        this.productArray.splice(productIndex, 1);
      }
    };
  
    this.getDetail = function (ma) {
      var productIndex = this.searchIndex(ma);
      var product = "";
      if (productIndex != -1) {
        product = dssp.productArray[productIndex];
      }
  
      return product;
    };
  
    this.editProduct = function (p) {
      var productIndex = this.searchIndex(p.Id);
      if (productIndex != -1) {
        dssp.productArray[productIndex] = p;
      }
    };
  }
  
  function NewsList() {
    this.newsArray = [];
  
    this.addNews = function (p) {
      this.newsArray.push(p);
    };
  
    this.searchIndex = function (ma) {
      var newsIndex = -1;
      this.newsArray.map(function (item, index) {
        if (item.Id == ma) {
          newsIndex = index;
        }
      });
  
      return newsIndex;
    };
  
    this.deleteNews = function (ma) {
      var newsIndex = this.searchIndex(ma);
      console.log(newsIndex);
      if (newsIndex != -1) {
        this.newsArray.splice(newsIndex, 1);
      }
    };
  
    this.getDetail = function (ma) {
      var newsIndex = this.searchIndex(ma);
      var news = "";
      if (newsIndex != -1) {
        news = dstt.newsArray[newsIndex];
      }
  
      return news;
    };
  
    this.editNews = function (n) {
      var newsIndex = this.searchIndex(n.Id);
      if (newsIndex != -1) {
        dstt.newsArray[newsIndex] = n;
      }
    };
  }
  
  function AppointmentList() {
    this.appointmentArray = [];
  
    this.addAppointment = function (p) {
      this.appointmentArray.push(p);
    };
  
    this.searchIndex = function (ma) {
      var appointmentIndex = -1;
      this.appointmentArray.map(function (item, index) {
        if (item.Id == ma) {
          appointmentIndex = index;
        }
      });
  
      return appointmentIndex;
    };
  
    this.deleteAppointment = function (ma) {
      var appointmentIndex = this.searchIndex(ma);
      console.log(appointmentIndex);
      if (appointmentIndex != -1) {
        this.appointmentArray.splice(appointmentIndex, 1);
      }
    };
  
    this.getDetail = function (ma) {
      var appointmentIndex = this.searchIndex(ma);
      var appointment = "";
      if (appointmentIndex != -1) {
        appointment = dslh.appointmentArray[appointmentIndex];
      }
  
      return appointment;
    };
  
    this.editAppointment = function (n) {
      var appointmentIndex = this.searchIndex(n.Id);
      if (appointmentIndex != -1) {
        dslh.appointmentArray[appointmentIndex] = n;
      }
    };
  }
  
  function BrandList() {
    this.brandArray = [];
  
    this.addBrand = function (p) {
      this.brandArray.push(p);
    };
  
    this.searchIndex = function (ma) {
      var brandIndex = -1;
      this.brandArray.map(function (item, index) {
        if (item.Id == ma) {
          brandIndex = index;
        }
      });
  
      return brandIndex;
    };
  
    this.deleteBrand = function (ma) {
      var brandIndex = this.searchIndex(ma);
      console.log(brandIndex);
      if (brandIndex != -1) {
        this.brandArray.splice(brandIndex, 1);
      }
    };
  
    this.getDetail = function (ma) {
      var brandIndex = this.searchIndex(ma);
      var brand = "";
      if (brandIndex != -1) {
        brand = dsh.brandArray[brandIndex];
      }
  
      return brand;
    };
  
    this.editBrand = function (n) {
      var brandIndex = this.searchIndex(n.Id);
      if (brandIndex != -1) {
        dsh.brandArray[brandIndex] = n;
      }
    };
  }
  
  function ImageList() {
    this.imageArray = [];
  
    this.addImage = function (p) {
      this.imageArray.push(p);
    };
  
    this.searchIndex = function (ma) {
      var imageIndex = -1;
      this.imageArray.map(function (item, index) {
        if (item.Id == ma) {
          imageIndex = index;
        }
      });
  
      return imageIndex;
    };
  
    this.deleteImage = function (ma) {
      var imageIndex = this.searchIndex(ma);
      console.log(imageIndex);
      if (imageIndex != -1) {
        this.imageArray.splice(imageIndex, 1);
      }
    };
  
    this.getDetail = function (ma) {
      var imageIndex = this.searchIndex(ma);
      var image = "";
      if (imageIndex != -1) {
        image = dsa.imageArray[imageIndex];
      }
  
      return image;
    };
  
    this.editImage = function (n) {
      var imageIndex = this.searchIndex(n.Id);
      if (imageIndex != -1) {
        dsa.imageArray[imageIndex] = n;
      }
    };
  
    this.searchImage = function (chuoiTK) {
      var mangTimKiem = [];
  
      this.imageArray.map(function (item) {
        var tenThuong = item.iName.toLowerCase();
        var chuoiTKThuong = chuoiTK.trim().toLowerCase();
        // Nguyen Van (tên)=> nguyen van
        // NGUYEN  (chuỗi tìm) => nguyen
        //indexOf: nếu tìm thấy ký tự chữ trùng với tên nguoi dung thi trả về vị trí chữ tìm thấy
        if (tenThuong.indexOf(chuoiTKThuong) > -1) {
          //Tìm thấy
          mangTimKiem.push(item);
        }
      });
  
      return mangTimKiem;
    };
  }
  
  function ServiceList() {
    this.serviceArray = [];
  
    this.addService = function (p) {
      this.serviceArray.push(p);
    };
  
    this.searchIndex = function (ma) {
      var serviceIndex = -1;
      this.serviceArray.map(function (item, index) {
        if (item.Id == ma) {
          serviceIndex = index;
        }
      });
  
      return serviceIndex;
    };
  
    this.deleteService = function (ma) {
      var serviceIndex = this.searchIndex(ma);
      console.log(serviceIndex);
      if (serviceIndex != -1) {
        this.serviceArray.splice(serviceIndex, 1);
      }
    };
  
    this.getDetail = function (ma) {
      var serviceIndex = this.searchIndex(ma);
      var service = "";
      if (serviceIndex != -1) {
        service = dsdv.serviceArray[serviceIndex];
      }
  
      return service;
    };
  
    this.editService = function (n) {
      var serviceIndex = this.searchIndex(n.Id);
      if (serviceIndex != -1) {
        dsdv.serviceArray[serviceIndex] = n;
      }
    };
  
    this.searchService = function (chuoiTK) {
      var mangTimKiem = [];
  
      this.serviceArray.map(function (item) {
        var tenThuong = item.sName.toLowerCase();
        var chuoiTKThuong = chuoiTK.trim().toLowerCase();
        // Nguyen Van (tên)=> nguyen van
        // NGUYEN  (chuỗi tìm) => nguyen
        //indexOf: nếu tìm thấy ký tự chữ trùng với tên nguoi dung thi trả về vị trí chữ tìm thấy
        if (tenThuong.indexOf(chuoiTKThuong) > -1) {
          //Tìm thấy
          mangTimKiem.push(item);
        }
      });
  
      return mangTimKiem;
    };
  }
  
  //prototype
  // Các hàm dùng để tìm kiếm
  UserList.prototype.searchUser = function (chuoiTK) {
    var mangTimKiem = [];
  
    this.userArray.map(function (item) {
      var tenThuong = item.userName.toLowerCase();
      var chuoiTKThuong = chuoiTK.trim().toLowerCase();
      // Nguyen Van (tên)=> nguyen van
      // NGUYEN  (chuỗi tìm) => nguyen
      //indexOf: nếu tìm thấy ký tự chữ trùng với tên nguoi dung thi trả về vị trí chữ tìm thấy
      if (tenThuong.indexOf(chuoiTKThuong) > -1) {
        //Tìm thấy
        mangTimKiem.push(item);
      }
    });
  
    return mangTimKiem;
  };
  
  ProductList.prototype.searchProduct = function (chuoiTK) {
    var mangTimKiem = [];
  
    this.productArray.map(function (item) {
      var tenThuong = item.pName.toLowerCase();
      var chuoiTKThuong = chuoiTK.trim().toLowerCase();
      // Nguyen Van (tên)=> nguyen van
      // NGUYEN  (chuỗi tìm) => nguyen
      //indexOf: nếu tìm thấy ký tự chữ trùng với tên nguoi dung thi trả về vị trí chữ tìm thấy
      if (tenThuong.indexOf(chuoiTKThuong) > -1) {
        //Tìm thấy
        mangTimKiem.push(item);
      }
    });
  
    return mangTimKiem;
  };
  
  NewsList.prototype.searchNews = function (chuoiTK) {
    var mangTimKiem = [];
  
    this.newsArray.map(function (item) {
      var tenThuong = item.nName.toLowerCase();
      var chuoiTKThuong = chuoiTK.trim().toLowerCase();
      // Nguyen Van (tên)=> nguyen van
      // NGUYEN  (chuỗi tìm) => nguyen
      //indexOf: nếu tìm thấy ký tự chữ trùng với tên nguoi dung thi trả về vị trí chữ tìm thấy
      if (tenThuong.indexOf(chuoiTKThuong) > -1) {
        //Tìm thấy
        mangTimKiem.push(item);
      }
    });
  
    return mangTimKiem;
  };
  
  BrandList.prototype.searchBrand = function (chuoiTK) {
    var mangTimKiem = [];
  
    this.brandArray.map(function (item) {
      var tenThuong = item.bName.toLowerCase();
      var chuoiTKThuong = chuoiTK.trim().toLowerCase();
      // Nguyen Van (tên)=> nguyen van
      // NGUYEN  (chuỗi tìm) => nguyen
      //indexOf: nếu tìm thấy ký tự chữ trùng với tên nguoi dung thi trả về vị trí chữ tìm thấy
      if (tenThuong.indexOf(chuoiTKThuong) > -1) {
        //Tìm thấy
        mangTimKiem.push(item);
      }
    });
  
    return mangTimKiem;
  };