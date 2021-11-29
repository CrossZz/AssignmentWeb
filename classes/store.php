
<?php 
   $filepath= realpath(dirname(__FILE__)); 
   include_once ($filepath.'/../config/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>

 <?php 
    /**
     * 
     */
    class store
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
    	public function insert_store($storeName)
    	{
            $storeName = $this->fm->validation($storeName);//kiểm tra định dạng của dữ liệu nhập vào
           
            $storeName = mysqli_real_escape_string($this->db->link, $storeName);
            //lấy storeName gán vào link trong class database

            if(empty($storeName)){
            	$alert= "<span class='error' > Must be not empty</span>";
            	return $alert;
            }
            else{
            	$query ="INSERT INTO store(storeName) VALUES('$storeName')"; 
            	$result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'> Add store completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'> Add store not completion</span>";
                    return $alert;
                }
            }
    	}
        public function show_store(){
            $query = "SELECT * FROM store order by storeID desc LIMIT 1";
            //lấy các phần tử trong bảng rồi sắp xếp theo catID
            $result = $this->db->select($query);
            return $result;
        }
        public function get_store_by_ID($id){ //dùng cho khi edit hoặc delete 
            $query = "SELECT * FROM store WHERE storeID='$id' ";
            //chọn phần tử trong bảng với đk catID= id 
            $result = $this->db->select($query);
            return $result;
        }
        public function update_store($storeName, $id){
            $storeName = $this->fm->validation($storeName);//kiểm tra định dạng của dữ liệu nhập vào
           
            $storeName = mysqli_real_escape_string($this->db->link, $storeName);
            //lấy catName gán vào link trong class database
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($storeName)){
                $alert= "<span class='error' > Must be not empty</span>";
                return $alert;
            }
            else{
                $query ="UPDATE store  SET storeName ='$storeName' WHERE storeID = '$id'"; 
                $result = $this->db->update($query);
                if($result){
                    $alert="<span class ='success'> Update store completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'> Update store not completion</span>";
                    return $alert;
                }
            }
        }
        public function del_store($id){
            $query = "DELETE FROM store WHERE storeID='$id' ";
            //chọn phần tử trong bảng với đk storeID= id 
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success' > Delete completion</span>";
                return $alert;
            }
            else{
                $alert= "<span class='error' > Dalete not completion</span>";
                return $alert;
            }
        }
        public function update_store_($data){
            $storePhone = mysqli_real_escape_string($this->db->link, $data['storePhone']);
            $storeEmail = mysqli_real_escape_string($this->db->link, $data['storeEmail']);
            $query ="UPDATE store SET storePhone ='$storePhone', storeEmail ='$storeEmail' WHERE storeID    = 1"; 
            $result = $this->db->update($query);
        }
    }
 ?>