
<?php 
   $filepath= realpath(dirname(__FILE__)); 
   include_once ($filepath.'/../config/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>

 <?php 
    /**
     * 
     */
    class contact
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
    	public function create_contact($userID,$content,$email)
    	{
           
            $content = mysqli_real_escape_string($this->db->link, $content);
            $email = mysqli_real_escape_string($this->db->link, $email);
            //lấy content gán vào link trong class database

            if(empty($content) || empty($email)){
            	$alert= "<span style='color:red;' > Must be not empty</span>";
            	return $alert;
            }
            else{
                $state = "new";
            	$query ="INSERT INTO contact(userID, content, email, state) VALUES('$userID','$content','$email','$state')"; 
            	$result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'> Add contact completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'> Add contact not completion</span>";
                    return $alert;
                }
            }
    	}
        public function get_contact($id){
            $query = "SELECT * FROM contact WHERE contactID ='$id' limit 1";
            //lấy các phần tử trong bảng rồi sắp xếp theo catID
            $result = $this->db->select($query);
            return $result;
        }
        public function change_state($id){
            $query = "UPDATE contact SET state ='Đã xem' WHERE contactID = '$id' ";
            //lấy các phần tử trong bảng rồi sắp xếp theo catID
            $result = $this->db->update($query);
            return $result;
        }
        public function show_all_contact(){
            $query = "SELECT * FROM contact order by contactID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo catID
            $result = $this->db->select($query);
            return $result;
        }

        // public function update_contact($contactContent,$contactID){
        //     $contactContent = $this->fm->validation($contactContent);//kiểm tra định dạng của dữ liệu nhập vào
           
        //     $contactContent = mysqli_real_escape_string($this->db->link, $contactContent);
        //     //lấy catName gán vào link trong class database
        //     $id = mysqli_real_escape_string($this->db->link, $id);

        //     if(empty($contactContent)){
        //         $alert= "<span class='error' > Must be not empty</span>";
        //         return $alert;
        //     }
        //     else{
        //         $query ="UPDATE contact  SET contactContent = '$contactContent' WHERE contactID = '$id'"; 
        //         $result = $this->db->update($query);
        //         if($result){
        //             $alert="<span class ='success'> Update contact completion</span>";
        //             return $alert;
        //         }
        //         else{
        //             $alert="<span class ='error'> Update contact not completion</span>";
        //             return $alert;
        //         }
        //     }
        // }
        public function del_contact($id){
            $query = "DELETE FROM contact WHERE contactID='$id' ";
            //chọn phần tử trong bảng với đk contactID= id 
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
        public function confirm_contact($id){
            $state = "finish";
            $query ="UPDATE contact  SET state = '$state' WHERE contactID = '$id'"; 
            $result = $this->db->update($query);
            if($result){
                $alert="<span class ='success'> Update contact completion</span>";
                return $alert;
            }
            else{
                $alert="<span class ='error'> Update contact not completion</span>";
                return $alert;
            }
        }
    }
 ?>