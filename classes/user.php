<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../config/database.php');
   include_once ($filepath.'/../helpers/format.php');
 ?>
<?php 
    class user
    {
    	private $db;
    	private $fm;
    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
        public function show_all_user(){
            $query = "SELECT * FROM user order by userID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo userID
            $result = $this->db->select($query);
            return $result;
        }
        public function create_user($data){
            $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
            $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
            $userPhone = mysqli_real_escape_string($this->db->link, $data['userPhone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['userPassword']));
            $userAddress = mysqli_real_escape_string($this->db->link, $data['userAddress']);
            $userRole = 'user';
            if(empty($userName) || empty($userEmail) || empty($userPhone) || empty($password)){
                $alert= "<span class='error' style='color:red;font-size:23px;' > Must be not empty</span>";
                return $alert;
            }
            else{
                $query ="INSERT INTO user(userName,userEmail,userPhone,userPassword, userAddress, userRole) VALUES('$userName','$userEmail','$userPhone','$password','$userAddress','$userRole')"; 
                $result = $this->db->insert($query);
                header('Location:signin.php');
                if($result){
                    $alert="<span class ='success' style='color:green;font-size:23px;'>Create account completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span style='color:red;font-size:23px;' class ='error'> Create account not completion</span>";
                    return $alert;
                }
            }
        }
        public function signin_user($data){
            $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            if(empty($userEmail) || empty($password)){
                $alert= "<span  style='color:red;font-size:23px;' > Must be not empty</span>";
                return $alert;
            }
            else{
                 $query = "SELECT * FROM user WHERE userEmail='$userEmail' AND userPassword='$password' LIMIT 1 ";
                 $result=$this->db->select($query);
                 if($result==true){
                      $value= $result->fetch_assoc();
                      if($value['userRole'] ==='user'){
                      	Session::set('user_role','user'); 
                      }
                      else{
                      	Session::set('user_role','admin');
                      }
                      Session::set('user_login',true);
                      Session::set('user_id',$value['userID']);
                      Session::set('user_name',$value['userName']);
                      header('Location:index.php');
                 }else{
                     $alert= "<span style='color:red;font-size:23px;' > Name and password not match</span>";
                     return $alert;
                 }
            }
        }
        public function get_info(){
            $userid=Session::get('user_id');
            $query = "SELECT * FROM user WHERE userID = $userid";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_info_user_admin($id){
            $query = "SELECT * FROM user WHERE userID = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_info_user($data,$id){
            $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
            $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
            $userPhone = mysqli_real_escape_string($this->db->link, $data['userPhone']); 
            $userAddress = mysqli_real_escape_string($this->db->link, $data['userAddress']);           
            if(empty($userName) || empty($userEmail) || empty($userPhone)){
                $alert= "<span style='color:red;font-size:16px;'> Must be not empty</span>";
                return $alert;
            }
            else{                 
                    $query ="UPDATE user  SET userName ='$userName',userEmail='$userEmail',userPhone='$userPhone',userAddress='$userAddress'  WHERE userID = '$id' ";
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
         public function update_password_user($data,$id){
            $passwordOld = mysqli_real_escape_string($this->db->link, md5($data['passwordOld']));
            $passwordNew = mysqli_real_escape_string($this->db->link, md5($data['passwordNew']));           
            if(empty($passwordOld) || empty($passwordNew)){
                $alert= "<span style='color:red;font-size:16px;margin-left: 21%;'> Bạn chưa điền đầy đủ thông tin!</span>";
                return $alert;
            }
            else{ 
                    $query_check = "SELECT * FROM user WHERE userID = '$id' ";
                    $result_check = $this->db->select($query_check);
                    $result_check_final =$result_check->fetch_assoc();
                    if($result_check_final['password'] == $passwordOld){
                        $query ="UPDATE user  SET userPassword='$passwordNew' WHERE userID = '$id' ";
                        $result = $this->db->update($query);
                        if($result){
                              $alert= "<span style='color:green;font-size:16px;margin-left: 21%;'>Thay đổi mật khẩu thành công!</span>";
                              return $alert;
                        }
                        else{
                              $alert= "<span style='color:red;font-size:16px;margin-left: 21%;'> Thay đổi mật khẩu không thành công!</span>";
                              return $alert;
                        }

                    }
                    else{
                        $alert= "<span style='color:red;font-size:16px;margin-left: 21%;'>Thay đổi mật khẩu không thành công!</span>";
                        return $alert;
                    }
            }
        }
        // public function withdraw($amount,$id){      
        //      $query ="SELECT * FROM tbl_user WHERE userID = '$id' ";
        //      $result = $this->db->select($query);
        //      if($result){
        //         $x=$result->fetch_assoc();
        //         $balance=$x['balance'];
        //      }
        //      $new=$balance+$amount;
        //      $query ="UPDATE tbl_user SET balance=$new WHERE userID = '$id' ";
        //      $result = $this->db->update($query);
        //      return ;
        // }
        // public function compare($amount,$id){      
        //     $query ="SELECT * FROM tbl_user WHERE userID = '$id' ";
        //     $result = $this->db->select($query);
        //     if($result){
        //             $x=$result->fetch_assoc();
        //             $balance=$x['balance'];
        //     }
        //     if($balance<$amount)
        //       return false;
        //     else return true;
        // }
        // public function pay($amount,$id){      
        //     $query ="SELECT * FROM tbl_user WHERE userID = '$id' ";
        //     $result = $this->db->select($query);
        //     if($result){
        //             $x=$result->fetch_assoc();
        //             $balance=$x['balance'];
        //     }
        //     $new=$balance-$amount;
        //     $query ="UPDATE tbl_user SET balance=$new WHERE userID = '$id' ";
        //     $result = $this->db->update($query);
        //     Session::set('user_order',true); 
        //     // header('Location:success.php');
        //     Session::set('order_success',true);
        // }
    }
 ?>