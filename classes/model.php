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

        public function get_last_id()
    	{
            $query = " SELECT modelID FROM model order by modelID desc LIMIT 1";
            $result = $this->db->select($query);
            return $result;	
    	}
        public function create_model($data){
            $modelName = mysqli_real_escape_string($this->db->link, $data["modelName"]);
            $modelDesc = mysqli_real_escape_string($this->db->link, $data["modelDesc"]);
            $modelContent = mysqli_real_escape_string($this->db->link, $data["modelContent"]);

            $query ="INSERT INTO model(modelName, modelDesc,modelContent) VALUES('$modelName','$modelDesc','$modelContent')"; 
            $result = $this->db->update($query);
        }

    	public function insert_model($data,$files) {
            $modelName = mysqli_real_escape_string($this->db->link, $data['modelName']);
            $modelDesc = mysqli_real_escape_string($this->db->link, $data['modelDesc']);
            $modelContent = mysqli_real_escape_string($this->db->link, $data['modelContent']);
            $query ="INSERT INTO model(modelName,modelDesc,modelContent) VALUES('$modelName','$modelDesc','$modelContent')"; 
            $result = $this->db->insert($query);
            if($result){
                $id = mysqli_fetch_array($this->get_last_id())[0];
                $qr = "";
                $c = 0;
                foreach ($files['myImages']['tmp_name'] as $key => $image) {
                    $name = $files['myImages']['name'][$key] ;
                    $tmpName = $files['myImages']['tmp_name'][$key] ;
                    $type = 'model';
                    $directory = 'img/'.$type;-
                    
                    $result = move_uploaded_file($tmpName, $directory.$name);
                    if ($c==0){
                        $qr = $qr."('$id','$type','$name','$tmpName')";
                    }else{
                        $qr = $qr.",('$id','$type','$name','$tmpName')";
                    }
                    $c += 1;
                    // $query ="INSERT INTO image(typeID,type,name) VALUES('$id','$type','$name')"; 
                    // $result = $this->db->insert($query);
                }
                
                $query ="INSERT INTO image(typeID,type,name,img) VALUES".$qr; 
                $result = $this->db->insert($query);
            }
    	}
        public function update_model($data,$files) {
            $modelID = (int)mysqli_real_escape_string($this->db->link, $data['modelID']);
            $modelName = mysqli_real_escape_string($this->db->link, $data['modelName']);
            $modelDesc = mysqli_real_escape_string($this->db->link, $data['modelDesc']);
            $modelContent = mysqli_real_escape_string($this->db->link, $data['modelContent']);
            $query ="UPDATE model SET modelName='$modelName',modelDesc='$modelDesc',modelContent='$modelContent' WHERE modelID = '$modelID'"; 
            $result = $this->db->update($query);
            
            echo '<script>alert("Chọn hãng");</script>';
            if($result){
                $id = $modelID;
                $qr = "";
                $c = 0;
                foreach ($files['myImages']['tmp_name'] as $key => $image) {
                    $name = $files['myImages']['name'][$key] ;
                    $tmpName = $files['myImages']['tmp_name'][$key] ;
                    $type = 'model';
                    $directory = 'img/'.$type;-
                    
                    $result = move_uploaded_file($tmpName, $directory.$name);
                    if ($c==0){
                        $qr = $qr."('$id','$type','$name','$tmpName')";
                    }else{
                        $qr = $qr.",('$id','$type','$name','$tmpName')";
                    }
                    $c += 1;
                    // $query ="INSERT INTO image(typeID,type,name) VALUES('$id','$type','$name')"; 
                    // $result = $this->db->insert($query);
                }
                $query ="DELETE FROM image WHERE type='model' AND typeID='$modelID'"; 
                $result = $this->db->DELETE($query);
                $query ="INSERT INTO image(typeID,type,name,img) VALUES".$qr; 
                $result = $this->db->insert($query);
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
        
        public function del_model($id){
            $query = "DELETE FROM car WHERE carModel='$id' ";
            $result = $this->db->delete($query);
            if($result){
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