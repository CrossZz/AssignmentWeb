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
        public function create_user($data){
            $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
            $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
            $userPhone = mysqli_real_escape_string($this->db->link, $data['userPhone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['userPassword']));
            $userAddress = mysqli_real_escape_string($this->db->link, $data['userAddress']);
            $userRole = 'user';
            $avatar = 'avatar_default.png';
            if(empty($userName) || empty($userEmail) || empty($userPhone) || empty($password)){
                $alert= "<span class='error' style='color:red;font-size:23px;' > Must be not empty</span>";
                return $alert;
            }
            else{
                $query ="INSERT INTO user(userName,userEmail,userPhone,userPassword, userAddress, userRole,avatar) VALUES('$userName','$userEmail','$userPhone','$password','$userAddress','$userRole','$avatar')"; 
                $result = $this->db->insert($query);
                if($result){
                    header('Location:signin.php');
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
            $passwordOld = mysqli_real_escape_string($this->db->link, $data['passwordOld']);
            $passwordNew = mysqli_real_escape_string($this->db->link, $data['passwordNew']);  
            $passwordConfirm = mysqli_real_escape_string($this->db->link, $data['passwordConfirm']);  
            if(empty($passwordOld) || empty($passwordNew) || empty($passwordConfirm)){
                $alert= "<span style='color:red;font-size:16px;margin-left: 21%;'>Must not be empty</span>";
                return $alert;
            }
            if($passwordNew != $passwordConfirm){
                $alert= "<span style='color:red;font-size:16px;margin-left: 21%;'>Password confirm not match</span>";
                return $alert;
            }
            else{ 
                    $query_check = "SELECT * FROM user WHERE userID = '$id' ";
                    $result_check = $this->db->select($query_check);
                    $result_check_final =$result_check->fetch_assoc();
                    if($result_check_final['userPassword'] == md5($passwordOld)){
                        $passwordNew = md5($passwordNew);
                        $query ="UPDATE user  SET userPassword='$passwordNew' WHERE userID = '$id' ";
                        $result = $this->db->update($query);
                        if($result){
                              $alert= "<span style='color:green;font-size:16px;margin-left: 21%;'>Change password successful!</span>";
                              return $alert;
                        }
                        else{
                              $alert= "<span style='color:red;font-size:16px;margin-left: 21%;'>Error!</span>";
                              return $alert;
                        }

                    }
                    else{
                        $alert= "<span style='color:red;font-size:16px;margin-left: 21%;'>Error!</span>";
                        return $alert;
                    }
            }
        }
        public function update_avatar($files,$id){
            $file_name = $_FILES['image']['name'];
            
            $div =explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
            
            if(!empty($file_name)){//chon anh
                move_uploaded_file($_FILES['image']['tmp_name'], "img/avatar/$file_name");
                $query ="UPDATE user  SET avatar='$file_name'  WHERE userID = '$id' ";
                $result = $this->db->update($query);
                if($result){
                     $alert="<span style='color:green;font-size:16px;margin:2% 20%;'>Update avatar successful</span>";
                     return $alert;
                }
                else{
                     $alert="<span style='color:red;font-size:16px;margin:2% 35%;'>Error</span>";
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