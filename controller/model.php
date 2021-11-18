<?php 
   $filepath= realpath(dirname(__FILE__)); 
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>
 <?php 
    class model
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
    	public function insert_model($catName)
    	{
            $catName = $this->fm->validation($catName);//kiểm tra định dạng của dữ liệu nhập vào
           
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            //lấy catName gán vào link trong class database

            if(empty($catName)){
            	$alert= "<span class='error' >Bạn chưa điền thông tin!</span>";
            	return $alert;
            }
            else{
            	$query ="INSERT INTO tbl_categori(catName) VALUES('$catName')"; 
            	$result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'>Thêm danh mục mới thành công!</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Thêm danh mục mới không thành công!</span>";
                    return $alert;
                }
            }
    	}
        public function show_model(){
            $query = "SELECT * FROM tbl_categori order by catID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo catID
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyId($id){ //dùng cho khi edit hoặc delete 
            $query = "SELECT * FROM tbl_categori WHERE catID='$id' ";
            //chọn phần tử trong bảng với đk catID= id 
            $result = $this->db->select($query);
            return $result;
        }
        public function update_model($catName, $id){
            $catName = $this->fm->validation($catName);//kiểm tra định dạng của dữ liệu nhập vào
           
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            //lấy catName gán vào link trong class database
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($catName)){
                $alert= "<span class='error' >Bạn chưa điền thông tin đầy đủ!</span>";
                return $alert;
            }
            else{
                $query ="UPDATE tbl_categori  SET catName ='$catName' WHERE catID = '$id'"; 
                $result = $this->db->update($query);
                if($result){
                    $alert="<span class ='success'>Thay đổi thông tin thành công!</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Thay đổi thông tin không thành công!</span>";
                    return $alert;
                }
            }
        }
        public function del_model($id){
            $query = "DELETE FROM tbl_categori WHERE catID='$id' ";
            //chọn phần tử trong bảng với đk catID= id 
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success' >Xóa thành công!</span>";
                return $alert;
            }
            else{
                $alert= "<span class='error' >Xóa không thành công!</span>";
                return $alert;
            }
        }
    }
 ?>