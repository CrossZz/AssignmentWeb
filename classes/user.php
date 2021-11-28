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
         public function get_last_id()
        {
            $query = " SELECT userID FROM user order by userID desc LIMIT 1";
            $result = $this->db->select($query);
            return $result; 
        }
        public function show_all_user(){
            $query = "SELECT * FROM user order by userID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo userID
            $result = $this->db->select($query);
            return $result;
        }
        public function search_user($key){
            $keylog = mysqli_real_escape_string($this->db->link, $key);
            $query = "SELECT * FROM user WHERE userName LIKE '\%$keylog\%'";
            //lấy các phần tử trong bảng rồi sắp xếp theo userID
            $result = $this->db->select($query);
            return $result;
        }
        public function insert_user($data,$files) {
            $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
            $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
            $userPhone = mysqli_real_escape_string($this->db->link, $data['userPhone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['userPassword']));
            $userAddress = mysqli_real_escape_string($this->db->link, $data['userAddress']);
            $userRole = mysqli_real_escape_string($this->db->link, $data['userRole']);
            $query ="INSERT INTO user(userName,userEmail,userPhone,userPassword, userAddress, userRole) VALUES('$userName','$userEmail','$userPhone','$password','$userAddress','$userRole')"; 
            $result = $this->db->insert($query);
            if($result){
                $id = mysqli_fetch_array($this->get_last_id())[0];
                foreach ($files['myImages']['tmp_name'] as $key => $image) {
                    $name = $files['myImages']['name'][$key] ;
                    $tmpName = $files['myImages']['tmp_name'][$key] ;
                    $type = 'user';
                    $directory = '../img/'.$type.'/';
                    
                    $result = move_uploaded_file($tmpName, $directory.$id.$name);
                    if($name!=""){
                        $query ="INSERT INTO image(typeID,type,name,img) VALUES('$id','$type','$name','$tmpName')"; 
                        $result = $this->db->insert($query);
                    }
                }
            }
        }
        public function update_user($data,$files) {
            $userID = (int)mysqli_real_escape_string($this->db->link, $data['userID']);
            $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
            $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
            $userPhone = mysqli_real_escape_string($this->db->link, $data['userPhone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['userPassword']));
            $userAddress = mysqli_real_escape_string($this->db->link, $data['userAddress']);
            $userRole = mysqli_real_escape_string($this->db->link, $data['userRole']);
            $query ="UPDATE user SET userName='$userName',userEmail='$userEmail',userPhone='$userPhone',userPassword='$password',userAddress='$userAddress',userRole='$userRole' WHERE userID = '$userID'"; 
            $result = $this->db->update($query);
            if($result){
                $query ="DELETE FROM image WHERE type='user' AND typeID='$userID'"; 
                $result = $this->db->DELETE($query);
                foreach ($files['myImages']['tmp_name'] as $key => $image) {
                    $name = $files['myImages']['name'][$key] ;
                    $tmpName = $files['myImages']['tmp_name'][$key] ;
                    $type = 'user';
                    $directory = '../img/'.$type.'/';
                    
                    $result = move_uploaded_file($tmpName, $directory.$userID.$name);
                    if($name!=""){
                        $query ="INSERT INTO image(typeID,type,name,img) VALUES('$userID','$type','$name','$tmpName')"; 
                        $result = $this->db->insert($query);
                    }
                }
            }
        }
        public function create_user_admin($data){
            $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
            $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
            $userPhone = mysqli_real_escape_string($this->db->link, $data['userPhone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['userPassword']));
            $userAddress = mysqli_real_escape_string($this->db->link, $data['userAddress']);
            $userRole = mysqli_real_escape_string($this->db->link, $data['userRole']);
            $query ="INSERT INTO user(userName,userEmail,userPhone,userPassword, userAddress, userRole) VALUES('$userName','$userEmail','$userPhone','$password','$userAddress','$userRole')"; 
            $result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success' style='color:green;font-size:23px;'>Create account completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span style='color:red;font-size:23px;' class ='error'> Create account not completion</span>";
                    return $alert;
                }
        }
        public function update_user_admin($data){
            $userID = $data['userID'];
            $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
            $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
            $userPhone = mysqli_real_escape_string($this->db->link, $data['userPhone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['userPassword']));
            $userAddress = mysqli_real_escape_string($this->db->link, $data['userAddress']);
            $userRole = mysqli_real_escape_string($this->db->link, $data['userRole']);           
            $query ="UPDATE user  SET userName ='$userName',userEmail='$userEmail',userPhone='$userPhone',userAddress='$userAddress',userRole='$userRole',userPassword='$password'  WHERE userID = '$userID' ";
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
                      Session::set('user_login',true);
                      Session::set('user_id',$value['userID']);
                      Session::set('user_name',$value['userName']);
                      if($value['userRole'] ==='user'){
                        Session::set('user_role','user'); 
                        header('Location:index.php');
                      }
                      else{
                        Session::set('user_role','admin');
                        header('Location: ./admin/user.php');
                      }
                      
                 }else{
                     $alert= "<span style='color:red;font-size:23px;' > Name and password not match</span>";
                     return $alert;
                 }
            }
        }
        public function delete_user($id){
            $query = "DELETE FROM user WHERE userID = $id";
            $result = $this->db->delete($query);
            $querys = "SELECT * FROM user WHERE userID != $id";
            $results = $this->db->select($querys);
            return $results;
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
            
            $tmpName = $_FILES['image']['tmp_name'];
            if(!empty($file_name)){//chon anh
                $query ="DELETE FROM image WHERE type='user' AND typeID='$id'"; 
                $result = $this->db->DELETE($query);

                move_uploaded_file($_FILES['image']['tmp_name'], "img/user/$id$file_name");
                $type ='user';
                $query ="INSERT INTO image(typeID,type,name,img) VALUES('$id','$type','$file_name','$tmpName')"; 
                $result = $this->db->insert($query);

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
    }
 ?>