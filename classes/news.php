<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../config/database.php');
   include_once ($filepath.'/../helpers/format.php');
 ?>

<?php
	class news{
		private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}

    	public function create_news($title, $content)
    	{
            $title = mysqli_real_escape_string($this->db->link, $title);
            $content = mysqli_real_escape_string($this->db->link, $content);

            if(empty($title) || empty($content)){
            	$alert= "<span class='error'>Bạn chưa điền thông tin!</span>";
            	return $alert;
            }
            else{
            	$query ="INSERT INTO news(title, content) VALUES('$title','$content')"; 
            	$result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'>Thêm news mới thành công!</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Thêm news mới không thành công!</span>";
                    return $alert;
                }
            }
    	}
    	public function show_news(){
            $query = "SELECT * FROM news order by newsID desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getnewsbyId($id){ 
            $query = "SELECT * FROM news WHERE newsID='$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_news($title,$content,$id){
           
            $title = mysqli_real_escape_string($this->db->link, $title);
            $content = mysqli_real_escape_string($this->db->link, $content);

            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($title)|| empty($content)){
                $alert= "<span class='error' >Bạn chưa điền thông tin đầy đủ!</span>";
                return $alert;
            }
            else{
                $query ="UPDATE news  SET title ='$title' AND content = '$content' WHERE newsID = '$id'"; 
                $result = $this->db->update($query);
                if($result){
                    $alert="<span class ='success'>Thay đổi thông tin thành công!</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Thay đổi thông tin không thành công!</span>";
                    return $alert;
                }
            }
        }
        public function del_news($id){
            $query = "DELETE FROM news WHERE newsID='$id' ";
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