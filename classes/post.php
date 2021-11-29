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
        public function get_last_id()
        {
            $query = " SELECT postID FROM post order by postID desc LIMIT 1";
            $result = $this->db->select($query);
            return $result; 
        }
        public function getpostbyId($id){ 
            $query = "SELECT * FROM post WHERE postID='$id' ";
            $result = $this->db->select($query);
            return $result;
        }
    	public function show_post(){
            $query = "SELECT * FROM post order by postID desc";
            $result = $this->db->select($query);
            return $result;
        }
         public function insert_post($data,$files) {
            $postName = mysqli_real_escape_string($this->db->link, $data['postName']);
            $postDesc = mysqli_real_escape_string($this->db->link, $data['postDesc']);
            $postContent = mysqli_real_escape_string($this->db->link, $data['postContent']);
            $query ="INSERT INTO post(postName,postDesc,postContent) VALUES('$postName','$postDesc','$postContent')"; 
            $result = $this->db->insert($query);
            if($result){
                $id = mysqli_fetch_array($this->get_last_id())[0];
                foreach ($files['myImages']['tmp_name'] as $key => $image) {
                    $name = $files['myImages']['name'][$key] ;
                    $tmpName = $files['myImages']['tmp_name'][$key] ;
                    $type = 'post';
                    $directory = '../img/'.$type.'/';
                    
                    $result = move_uploaded_file($tmpName, $directory.$id.$name);
                    if($name!=""){
                        $query ="INSERT INTO image(typeID,type,name,img) VALUES('$id','$type','$name','$tmpName')"; 
                        $result = $this->db->insert($query);
                    }
                }
                
                
            }
        }
        public function update_post($data,$files) {
            $postID = (int)mysqli_real_escape_string($this->db->link, $data['postID']);
            $postName = mysqli_real_escape_string($this->db->link, $data['postName']);
            $postDesc = mysqli_real_escape_string($this->db->link, $data['postDesc']);
            $postContent = mysqli_real_escape_string($this->db->link, $data['postContent']);
            $query ="UPDATE post SET postName='$postName',postDesc='$postDesc',postContent='$postContent' WHERE postID = '$postID'"; 
            $result = $this->db->update($query);
            
            if($result){
                $query ="DELETE FROM image WHERE type='post' AND typeID='$postID'"; 
                $result = $this->db->DELETE($query);
                foreach ($files['myImages']['tmp_name'] as $key => $image) {
                    $name = $files['myImages']['name'][$key] ;
                    $tmpName = $files['myImages']['tmp_name'][$key] ;
                    $type = 'post';
                    $directory = '../img/'.$type.'/';
                    
                    $result = move_uploaded_file($tmpName, $directory.$postID.$name);
                    if($name!=""){
                        $query ="INSERT INTO image(typeID,type,name,img) VALUES('$postID','$type','$name','$tmpName')"; 
                        $result = $this->db->insert($query);
                    }
                }
                
                
            }
        }
        public function delete_post($id){
            $query = "DELETE FROM image WHERE typeID = $id AND type = 'post'";
            $result = $this->db->delete($query);
            $query = "DELETE FROM comment WHERE commentPostID = '$id'";
            $result = $this->db->delete($query);
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