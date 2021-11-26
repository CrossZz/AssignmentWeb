



<?php 
  if(isset($_POST["submit"])) {
    foreach ($_FILES['myImages']['tmp_name'] as $key => $image) {
      $name = $_FILES['myImages']['name'][$key] ;
      $tmpName = $_FILES['myImages']['tmp_name'][$key] ;
      $type = 'car';
      $directory = 'img/'.$type;
      $result = move_uploaded_file($tmpName, $directory.$name);
    }
    if ($result){
        echo "good";
    }

  }
?>