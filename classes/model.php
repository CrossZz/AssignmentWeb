<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../config/database.php');
   include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class model{
		private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}


        public function create_model($data){
            $modelName = mysqli_real_escape_string($this->db->link, $data["modelName"]);
            $modelDesc = mysqli_real_escape_string($this->db->link, $data["modelDesc"]);
            $modelContent = mysqli_real_escape_string($this->db->link, $data["modelContent"]);

            $query ="INSERT INTO model(modelName, modelDesc,modelContent) VALUES('$modelName','$modelDesc','$modelContent')"; 
            $result = $this->db->update($query);
        }

    	public function insert_model($modelName, $modelDesc)
    	{
            $modelName = mysqli_real_escape_string($this->db->link, $modelName);
            $modelDesc = mysqli_real_escape_string($this->db->link, $modelDesc);

            if(empty($modelName) || empty($modelDesc)){
            	$alert= "<span class='error'>Bạn chưa điền thông tin!</span>";
            	return $alert;
            }
            else{
            	$query ="INSERT INTO model(modelName, modelDesc) VALUES('$modelName','$modelDesc')"; 
            	$result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'>Thêm model mới thành công!</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Thêm model mới không thành công!</span>";
                    return $alert;
                }
            }
    	}
    	public function show_model(){
            $query = "SELECT * FROM model order by modelID desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getmodelbyId($id){ 
            $query = "SELECT * FROM model WHERE modelID='$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_model($modelName,$modelDesc,$id){
           
            $modelName = mysqli_real_escape_string($this->db->link, $modelName);
            $modelDesc = mysqli_real_escape_string($this->db->link, $modelDesc);

            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($modelName)|| empty($modelDesc)){
                $alert= "<span class='error' >Bạn chưa điền thông tin đầy đủ!</span>";
                return $alert;
            }
            else{
                $query ="UPDATE model  SET modelName ='$modelName' AND modelDesc = '$modelDesc' WHERE modelID = '$id'"; 
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
        public function del_model($id){
            $query = "DELETE FROM model WHERE modelID='$id' ";
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
        public function update_model_admin($data){
            $modelID = $data["modelID"];
            $modelName = mysqli_real_escape_string($this->db->link, $data["modelName"]);
            $modelDesc = mysqli_real_escape_string($this->db->link, $data["modelDesc"]);
            $modelContent = mysqli_real_escape_string($this->db->link, $data["modelContent"]);

            $query ="UPDATE model  SET modelName ='$modelName',modelContent = '$modelContent', modelDesc = '$modelDesc' WHERE modelID = '$modelID'"; 
            $result = $this->db->update($query);
        }
	}
?>