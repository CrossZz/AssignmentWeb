
<?php 
   $filepath= realpath(dirname(__FILE__)); 
   include_once ($filepath.'/../config/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>

 <?php 
    /**
     * 
     */
    class appointment
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
    	public function create_appointment($userID,$data)
    	{
            $content = mysqli_real_escape_string($this->db->link, $data['content']);
            $date = mysqli_real_escape_string($this->db->link, $data['time']);
            $store = mysqli_real_escape_string($this->db->link, $data['store']);

            if(empty($content) || empty($date) || empty($store)){
            	$alert= "<span class='error' > Must be not empty</span>";
            	return $alert;
            }
            else{
                $query_check = "SELECT * FROM appointment WHERE userID ='$userID' limit 1";
                $result_check = $this->db->select($query_check);
                if($result_check){
                    $query = "DELETE FROM appointment  WHERE userID='$userID' ";
                    $result = $this->db->delete($query);
                }
                // $state = "new";
            	$query ="INSERT INTO appointment (userID,content,store,date) VALUES('$userID','$content','$store','$date')"; 
            	$result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'> Add appointment  completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'> Add appointment  not completion</span>";
                    return $alert;
                }
            }
    	}

        public function show_appointment (){
            $userid=Session::get('user_id');
            $query = "SELECT * FROM appointment  WHERE userID = $userid limit 1";
            //lấy các phần tử trong bảng rồi sắp xếp theo catID
            $result = $this->db->select($query);
            return $result;
        }
        
        public function update_appointment_admin($data){
            $id = $data['id'];
            $state = mysqli_real_escape_string($this->db->link, $data['state']);
            $query ="UPDATE appointment SET state = '$state' WHERE ID = '$id'"; 
            $result = $this->db->update($query);
        }
        public function update_appointment ($data, $id){
           
            $content = mysqli_real_escape_string($this->db->link, $data['content']);
            $date = mysqli_real_escape_string($this->db->link, $data['date']);
            $store = mysqli_real_escape_string($this->db->link, $data['store']);
            //lấy catName gán vào link trong class database
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($content) || empty($date) || empty($store)){
                $alert= "<span class='error' > Must be not empty</span>";
                return $alert;
            }
            else{
                $query ="UPDATE appointment   SET content = '$content' WHERE ID = '$id'"; 
                $result = $this->db->update($query);
                if($result){
                    $alert="<span class ='success'> Update appointment  completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'> Update appointment  not completion</span>";
                    return $alert;
                }
            }
        }
        public function del_appointment ($id){
            $query = "DELETE FROM appointment  WHERE ID='$id' ";
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
        public function confirm_appointment ($id){
            $state = "finish";
            $query ="UPDATE appointment   SET state = '$state' WHERE ID = '$id'"; 
            $result = $this->db->update($query);
            if($result){
                $alert="<span class ='success'> Update appointment  completion</span>";
                return $alert;
            }
            else{
                $alert="<span class ='error'> Update appointment  not completion</span>";
                return $alert;
            }
        }
    }
 ?>