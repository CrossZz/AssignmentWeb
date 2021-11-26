<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../config/database.php');
   include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class post{
		private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}

    	public function show_post(){
            $query = "SELECT * FROM post order by postID desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function insert_posts($data){
            $postName = mysqli_real_escape_string($this->db->link, $data['postName']);;
            $postDesc = mysqli_real_escape_string($this->db->link, $data['postDesc']);
            $postContent = mysqli_real_escape_string($this->db->link, $data['postContent']);
               
            $query ="INSERT INTO post(postName,postDesc,postContent) VALUES('$postName','$postDesc','$postContent')";
            $result = $this->db->insert($query);
            if($result){
                 $alert="<span style='color:green;font-size:16px;margin:2% 20%;'>Cập nhật thành công</span>";
                 return $alert;
            }
            else{
                 $alert="<span style='color:red;font-size:16px;margin:2% 35%;'>Cập nhật không thành công</span>";
                 return $alert;
            }
        }
        public function update_posts($data){
            $postID = $data['postID'];
            $postName = mysqli_real_escape_string($this->db->link, $data['postName']);;
            $postDesc = mysqli_real_escape_string($this->db->link, $data['postDesc']);
            $postContent = mysqli_real_escape_string($this->db->link, $data['postContent']);
               
            $query ="UPDATE post  SET postName ='$postName',postDesc='$postDesc',postContent='$postContent' WHERE postID = '$postID' ";
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
        public function delete_post($id){
            $query = "DELETE FROM post WHERE postID='$id' ";
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