
<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');
 ?>

 <?php 
    class admin
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
        public function get_info_admin(){
            $id=Session::get('adminID');
            $query = "SELECT * FROM tbl_admin WHERE adminID = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_info_admin($data,$id){
            $adminName = mysqli_real_escape_string($this->db->link, $data['adminName']);
            $adminEmail = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
            $adminUser = mysqli_real_escape_string($this->db->link, $data['adminUser']);           
            if(empty($adminName) || empty($adminEmail) || empty($adminUser)){
                $alert= "<span style='color:red;font-size:16px;'>Không được để trống</span>";
                return $alert;
            }
            else{                 
                    $query ="UPDATE tbl_admin  SET adminName ='$adminName',adminEmail='$adminEmail',adminUser='$adminUser' WHERE adminID = '$id' ";
                    $result = $this->db->update($query);
                    if($result){
                         $alert="<span style='color:green;font-size:16px;margin:2% 20%;'>Cập nhật thành công</span>";
                         return $alert;
                    }
                    else{
                         $alert="<span style='color:red;font-size:16px;margin:2% 35%;'>Cập nhật không thành công</span>";
                         return $alert;
                    }
            }
        }
        public function update_pass_admin($data,$id){
            $passwordOld = mysqli_real_escape_string($this->db->link, md5($data['passwordOld']));
            $passwordNew = mysqli_real_escape_string($this->db->link, md5($data['passwordNew']));           
            if(empty($passwordOld) || empty($passwordNew)){
                $alert= "<span style='color:red;font-size:16px;margin-left: 15%;'> Bạn chưa điền đầy đủ thông tin!</span>";
                return $alert;
            }
            else{ 
                $query_check = "SELECT * FROM tbl_admin WHERE adminID= '$id' ";
                $result_check = $this->db->select($query_check);
                $result_check_final =$result_check->fetch_assoc();
                if($result_check_final['adminPass'] == $passwordOld){
                    $query ="UPDATE tbl_admin  SET adminPass='$passwordNew' WHERE adminID = '$id' ";
                    $result = $this->db->update($query);
                    if($result){
                        $alert= "<span style='color:green;font-size:16px;margin-left: 15%;'>Thay đổi mật khẩu thành công!</span>";
                        return $alert;
                    }
                    else{
                        $alert= "<span style='color:red;font-size:16px;margin-left: 15%;'>Thay đổi mật khẩu không thành công!</span>";
                        return $alert;
                    }
                }
                    else{
                        $alert= "<span style='color:red;font-size:16px;margin-left: 15%;'>Thay đổi mật khẩu không thành công!</span>";
                        return $alert;
                    }
            }
        }
         public function show_admin(){            
            $id=Session::get('adminID');
            $query = "
            SELECT p.*
            FROM tbl_admin as p WHERE p.level != $id  order by p.adminID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }
        public function add_new_admin($data){
            $adminName = mysqli_real_escape_string($this->db->link, $data['adminName']);
            $adminEmail = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
            $adminUser = mysqli_real_escape_string($this->db->link, $data['adminUser']);
            $adminPass = mysqli_real_escape_string($this->db->link, md5($data['adminPass']));
            $role = mysqli_real_escape_string($this->db->link, $data['role']);
            $vendorname = mysqli_real_escape_string($this->db->link, $data['vendorname']);
            $vendorid = mysqli_real_escape_string($this->db->link, $data['vendorid']);
            $level = mysqli_real_escape_string($this->db->link, $data['level']);
            if($level!=3||$level!=4){
                $vendorname='';
                $vendorid=0;
            }
            if(empty($adminName) || empty($adminEmail) || empty($adminUser) || empty($adminPass)|| empty($role)|| empty($level)){
                $alert= "<span class='error' style='color:red;font-size:23px;' > Không được để trống</span>";
                return $alert;
            }
            else{
                $query ="INSERT INTO tbl_admin(adminName,adminEmail,adminUser,adminPass,role,vendorname,vendorid,level) VALUES('$adminName','$adminEmail','$adminUser','$adminPass','$role','$vendorname','$vendorid','$level')"; 
                $result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success' style='color:green;font-size:23px;'>Tạo tài khoản thành công</span>";
                    return $alert;
                }
                else{
                    $alert="<span style='color:red;font-size:23px;' class ='error'>Tạo tài khoản không thành công</span>";
                    return $alert;
                }
            }
        }
    }
 ?>