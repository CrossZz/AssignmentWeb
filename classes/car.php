<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../config/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>
 <?php 
    class car
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
        public function get_last_id()
        {
            $query = " SELECT carID FROM car order by carID desc LIMIT 1";
            $result = $this->db->select($query);
            return $result; 
        }
        public function insert_cars($data)
        {
            $carName = mysqli_real_escape_string($this->db->link, $data['carName']);
            $carModel = $data['modelName'];
            $carDesc = mysqli_real_escape_string($this->db->link, $data['carDesc']);
            $carPrice = mysqli_real_escape_string($this->db->link, $data['carPrice']);
            $carContent = mysqli_real_escape_string($this->db->link, $data['carContent']);

            $query ="INSERT INTO car(carName,carModel,carDesc,carPrice,carContent) VALUES('$carName','$carModel','$carDesc','$carPrice','$carContent')"; 
            $result = $this->db->insert($query);    
        }
    	public function insert_car($data,$files) {
            $carName = mysqli_real_escape_string($this->db->link, $data['carName']);
            $carModel = 0;
            $carModel = $data['modelName'];
            $carDesc = mysqli_real_escape_string($this->db->link, $data['carDesc']);
            $carPrice = mysqli_real_escape_string($this->db->link, $data['carPrice']);
            $carContent = mysqli_real_escape_string($this->db->link, $data['carContent']);

            $query ="INSERT INTO car(carName,carModel,carDesc,carPrice,carContent) VALUES('$carName','$carModel','$carDesc','$carPrice','$carContent')"; 
            $result = $this->db->insert($query);
            if ($result){
                $id = mysqli_fetch_array($this->get_last_id())[0];
                foreach ($files['myImages']['tmp_name'] as $key => $image) {
                    $name = $files['myImages']['name'][$key] ;
                    $tmpName = $files['myImages']['tmp_name'][$key] ;
                    $type = 'car';
                    $directory = '../img/'.$type.'/';
                    
                    $result = move_uploaded_file($tmpName, $directory.$id.$name);
                    if($name!=""){
                        $query ="INSERT INTO image(typeID,type,name,img) VALUES ('$id','$type','$name','$tmpName')"; 
                        $result = $this->db->insert($query);
                    }
                    
                }
            }
            
        }
        public function insert_slider($data,$files){
           
            $title = mysqli_real_escape_string($this->db->link, $data['title']);

            $file_name = $_FILES['image']['name'];
            
            $div =explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
            

            if($file_name=="" || $title==""){
                $alert= "<span class='error' >Không được để trống</span>";
                return $alert;
            }
            else{
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$file_name");
                $query ="INSERT INTO slider(title,image) VALUES('$title','$file_name')"; 
                $result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'>Thêm slider thành công</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Thêm slider không thành công</span>";
                    return $alert;
                }
            }
        }
        public function show_car(){
            $query = "
            SELECT c.*,m.modelName
            FROM car as c, model as m  WHERE c.carModel = m.modelID
             order by c.carID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }

        public function show_car_by_model($modelID){
            $query = "
            SELECT * FROM car WHERE carModel = '$modelID' ";
            $result = $this->db->select($query);
            return $result;
        }


        public function show_car_by_type($type){
            $query = "
            SELECT *
            FROM car   WHERE  type = '$type'
             order by carID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }


        public function show_slider(){
            $query = "
            SELECT * FROM slider order by sliderID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }
        public function getcarById($id){
            $query = "SELECT * FROM car WHERE carID='$id' ";

            $result = $this->db->select($query);
            return $result;
        }

        public function update_car($data,$files) {
            $carID = (int)mysqli_real_escape_string($this->db->link, $data['carID']);
            $carName = mysqli_real_escape_string($this->db->link, $data['carName']);
            $carModel = $data['modelName'];
            $carDesc = mysqli_real_escape_string($this->db->link, $data['carDesc']);
            $carPrice = mysqli_real_escape_string($this->db->link, $data['carPrice']);
            $carContent = mysqli_real_escape_string($this->db->link, $data['carContent']);
            $query ="UPDATE car SET carName ='$carName',carModel ='$carModel',carDesc ='$carDesc',carPrice ='$carPrice',carContent ='$carContent' WHERE carID = '$carID'"; 
            $result = $this->db->update($query);
            if ($result){
                $query ="DELETE FROM image WHERE type='car' AND typeID='$carID'"; 
                $result = $this->db->DELETE($query);
                foreach ($files['myImages']['tmp_name'] as $key => $image) {
                    $name = $files['myImages']['name'][$key] ;
                    $tmpName = $files['myImages']['tmp_name'][$key] ;
                    $type = 'car';
                    $directory = '../img/'.$type.'/';
                    
                    $result = move_uploaded_file($tmpName, $directory.$carID.$name);
                    if($name!=""){
                        $query ="INSERT INTO image(typeID,type,name,img) VALUES ('$carID','$type','$name','$tmpName')"; 
                        $result = $this->db->insert($query);
                    }
                }
            }
            
        }
       
        public function delete_car($id){
            $query = "DELETE FROM image WHERE typeID = $id AND type = 'car'";
            $result = $this->db->delete($query);
            $query = "DELETE FROM comment WHERE commentCarID = '$id'";
            $result = $this->db->delete($query);
            $query = "DELETE FROM car WHERE carID='$id' ";
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success' >Xóa thành công</span>";
                return $alert;
            }
            else{
                $alert= "<span class='error' >Xóa không thành công</span>";
                return $alert;
            }
        }
        public function delete_slider($id){
            $query = "DELETE FROM slider WHERE sliderID='$id' ";
            //chọn phần tử trong bảng với đk carID= id 
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success' >Xóa thành công</span>";
                return $alert;
            }
            else{
                $alert= "<span class='error' >Xóa không thành công</span>";
                return $alert;
            }
        }
        public function get_details($id){
            $query = "
            SELECT c.*,m.modelName
            FROM car as c,model as m WHERE c.carModel = m.modelID AND
             c.carID='$id'";

            $result = $this->db->select($query);
            return $result;
        }
        public function search($search){
            $query = "SELECT * FROM car WHERE carName LIKE '%$search%' or type LIKE '%$search%'or carDesc LIKE '%$search%'";
            $result = $this->db->select($query);
            return $result;
        }
    }
 ?>