<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../config/database.php');
   include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class service{
		private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}


        public function create_service($data){
            $serviceName = mysqli_real_escape_string($this->db->link, $data["serviceName"]);
            $serviceDesc = mysqli_real_escape_string($this->db->link, $data["serviceDesc"]);
            $serviceContent = mysqli_real_escape_string($this->db->link, $data["serviceContent"]);

            $query ="INSERT INTO service(serviceName, serviceDesc,serviceContent) VALUES('$serviceName','$serviceDesc','$serviceContent')"; 
            $result = $this->db->update($query);
        }

    	
    	public function show_service(){
            $query = "SELECT * FROM service order by serviceID desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getservicebyId($id){ 
            $query = "SELECT * FROM service WHERE serviceID='$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        
        public function del_service($id){
            $query = "DELETE FROM service WHERE serviceID='$id' ";
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
        public function update_service_admin($data){
            $serviceID = $data["serviceID"];
            $serviceName = mysqli_real_escape_string($this->db->link, $data["serviceName"]);
            $serviceDesc = mysqli_real_escape_string($this->db->link, $data["serviceDesc"]);
            $serviceContent = mysqli_real_escape_string($this->db->link, $data["serviceContent"]);

            $query ="UPDATE service  SET serviceName ='$serviceName',serviceContent = '$serviceContent', serviceDesc = '$serviceDesc' WHERE serviceID = '$serviceID'"; 
            $result = $this->db->update($query);
        }
	}
?>