<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>
 <?php 
    class product
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
    	public function insert_product($data,$files)
    	{
           
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $vendor = mysqli_real_escape_string($this->db->link, $data['vendor']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            $file_name = $_FILES['image']['name'];
            
            $div =explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
            

            if($productName=="" || $category=="" || $vendor=="" || $description=="" || $price=="" || $file_name=="" || $type==""){
            	$alert= "<span class='error' >Không được để trống</span>";
            	return $alert;
            }
            else{
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$file_name");
            	$query ="INSERT INTO tbl_product(productName,categoryID,vendorID,description,price,type,image) VALUES('$productName','$category','$vendor','$description','$price','$type','$file_name')"; 
            	$result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'>Thêm mặt hàng thành công</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Thêm mặt hàng không thành công</span>";
                    return $alert;
                }
            }
    	}
        public function insert_slider($data,$files)
        {
           
            $title = mysqli_real_escape_string($this->db->link, $data['title']);

            $file_name = $_FILES['image']['name'];
            
            $div =explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
            

            if($file_name=="" || $title==""){
                $alert= "<span class='error' >Không được để trống</span>";
                return $alert;
            }
            else{
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$file_name");
                $query ="INSERT INTO tbl_slider(title,image) VALUES('$title','$file_name')"; 
                $result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'>Thêm slider thành công</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Thêm slider không thành công</span>";
                    return $alert;
                }
            }
        }
        public function show_product(){
            $query = "
            SELECT p.*,c.catName,v.vendorName
            FROM tbl_product as p,tbl_categori as c,tbl_vendor as v WHERE p.categoryID = c.catID AND p.vendorID= v.vendorID
             order by p.productID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }
        public function show_slider(){
            $query = "
            SELECT * FROM tbl_slider order by sliderID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }
        public function getProductById($id){//dùng cho khi edit hoặc delete 
            $query = "SELECT * FROM tbl_product WHERE productID='$id' ";
            //chọn phần tử trong bảng với đk catID= id 
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data,$files, $id){
           $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            

            $file_name = $_FILES['image']['name'];
            
            
            $div =explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
            

            if(empty($productName) || empty($category) || empty($description) || empty($price)){
                $alert= "<span class='error'>Không được để trống</span>";
                return $alert;
            }
            else{ 
                if(!empty($file_name)){//chon anh
                    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$file_name");
                     $query ="UPDATE tbl_product  SET productName ='$productName',categoryID='$category',description='$description',price='$price',type='$type',image='$file_name' WHERE productID = '$id'";
                }
                else{//khong chon anh
                    $query ="UPDATE tbl_product  SET productName ='$productName',categoryID='$category',description='$description',price='$price',type='$type' WHERE productID = '$id'";
                }
                 $result = $this->db->update($query);
                    if($result){
                        $alert="<span class ='success'>Cập nhật mặt hàng thành công</span>";
                         return $alert;
                    }
                    else{
                         $alert="<span class ='error'>Cập nhật mặt hàng không thành công</span>";
                          return $alert;
                    }
            }
        }
       
        public function delete_product($id){
            $query = "DELETE FROM tbl_product WHERE productID='$id' ";
            //chọn phần tử trong bảng với đk productID= id 
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success' >Xóa thành công</span>";
                return $alert;
            }
            else{
                $alert= "<span class='error' >Xóa không thành công</span>";
                return $alert;
            }
        }
        public function delete_slider($id){
            $query = "DELETE FROM tbl_slider WHERE sliderID='$id' ";
            //chọn phần tử trong bảng với đk productID= id 
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success' >Xóa thành công</span>";
                return $alert;
            }
            else{
                $alert= "<span class='error' >Xóa không thành công</span>";
                return $alert;
            }
        }
        ///////////////
        public function get_combo(){
            $query = "SELECT * FROM tbl_product WHERE type='combo'";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_discount(){
            $query = "SELECT * FROM tbl_product WHERE type='discount' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_drinks(){
            $query = "SELECT * FROM tbl_product WHERE type='drinks'";
            //chọn phần tử trong bảng với đk type= combo 
            $result = $this->db->select($query);
            return $result;
        }
        public function get_foods(){
            $query = "SELECT * FROM tbl_product WHERE type='foods'";
            //chọn phần tử trong bảng với đk type= combo 
            $result = $this->db->select($query);
            return $result;
        }
        public function get_details($id){
            $query = "
            SELECT p.*,c.catName,v.vendorName
            FROM tbl_product as p,tbl_categori as c,tbl_vendor as v WHERE p.categoryID = c.catID AND
             p.productID='$id' AND p.vendorID=v.vendorID";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }
         public function search($search){
            // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
            $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$search%' or type LIKE '%$search%'or description LIKE '%$search%'";
            // Thực thi câu truy vấn
            $result = $this->db->select($query);
            // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
           return $result;
        }
    }
 ?>