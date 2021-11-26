
<?php 
   $filepath= realpath(dirname(__FILE__)); 
   include_once ($filepath.'/../config/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>

 <?php 
    /**
     * 
     */
    class comment
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
    	public function create_comment($userID,$commentContent,$commentPostID)
    	{
            $commentContent = $this->fm->validation($commentContent);//kiểm tra định dạng của dữ liệu nhập vào
           
            $commentContent = mysqli_real_escape_string($this->db->link, $commentContent);
            //lấy commentName gán vào link trong class database

            if(empty($commentContent)){
            	$alert= "<span class='error' > Must be not empty</span>";
            	return $alert;
            }
            else{
            	$query ="INSERT INTO comment(commentUserID,commentContent,commentPostID) VALUES('$userID','$commentContent','$commentPostID')"; 
            	$result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'> Add comment completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'> Add comment not completion</span>";
                    return $alert;
                }
            }
    	}
        public function get_comment($postID){
            $query = "SELECT * FROM comment WHERE commentPostID ='$postID' limit 1 ";
            //lấy các phần tử trong bảng rồi sắp xếp theo catID
            $result = $this->db->select($query);
            return $result;
        }

        public function get_all_comment(){
            $query = "SELECT * FROM comment order by commentID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo catID
            $result = $this->db->select($query);
            return $result;
        }
        public function update_comment($commentContent,$commentID){
            $commentContent = $this->fm->validation($commentContent);//kiểm tra định dạng của dữ liệu nhập vào
           
            $commentContent = mysqli_real_escape_string($this->db->link, $commentContent);
            //lấy catName gán vào link trong class database
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($commentContent)){
                $alert= "<span class='error' > Must be not empty</span>";
                return $alert;
            }
            else{
                $query ="UPDATE comment  SET commentContent = '$commentContent' WHERE commentID = '$id'"; 
                $result = $this->db->update($query);
                if($result){
                    $alert="<span class ='success'> Update comment completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'> Update comment not completion</span>";
                    return $alert;
                }
            }
        }
        public function del_comment($id){
            $query = "DELETE FROM comment WHERE commentID='$id' ";
            //chọn phần tử trong bảng với đk commentID= id 
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
    }
 ?>