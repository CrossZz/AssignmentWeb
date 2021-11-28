<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../config/database.php');
   include_once ($filepath.'/../helpers/format.php');
 ?>

<?php
	class image{
		private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}

    	public function upload_image($files, $type, $typeID)
    	{
            foreach ($_FILES['image']['tmp_name'] as $key => $image) {
                $name = $_FILES['image']['name'][$key] ;
                $tmpName = $_FILES['image']['tmp_name'][$key] ;

                $directory = 'img/'.$type.'/';
                move_uploaded_file($_FILES['image']['tmp_name'], $directory.$name);

                $query ="INSERT INTO image(typeID,type,name) VALUES('$typeID','$type','$name')"; 
                $result = $this->db->insert($query);
            }
            if($result){
                    $alert="<span class ='success'>Thêm image mới thành công!</span>";
                    return $alert;
            }
            else{
                $alert="<span class ='error'>Thêm image mới không thành công!</span>";
                return $alert;
            }
    	}

        public function get_images_by_typeID($typeID, $type){ 
            $query = "SELECT * FROM image WHERE typeID='$typeID' AND type='$type'";
            $result = $this->db->select($query);
            return $result;
        }
        
        public function get_images_by_type($type){ 
            $query = "SELECT * FROM image WHERE type='$type'";
            $result = $this->db->select($query);
            return $result;
        }
        
        public function del_image($type, $typeID){
            $query = "DELETE FROM image WHERE typeID='$id' AND type='$type'";
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