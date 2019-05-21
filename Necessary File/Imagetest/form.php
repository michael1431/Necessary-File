<?php

include 'connection.php';
error_reporting(0);



?>


<form action="" method="post" enctype="multipart/form-data">
    
   
    Name:<input type="text" name="myname" value=""/>
    Class:<input type="text" name="myclass" value=""/>
    Image:<input type="file" name="myimage" value=""/>
    <input type="submit" name="submit" value="Submit">
    
 
    
</form>

<?php
if($_POST['submit']){
    
   
    $name=$_POST['myname'];
    $class=$_POST['myclass'];
    
    $filename=$_FILES['myimage']['name'];
    $tmpname=$_FILES['myimage']['tmp_name'];
    $folder ="student/".$filename;
    move_uploaded_file($tmpname,$folder);
    
   
        $result="INSERT INTO `student`(`id`, `name`, `class`, `image`) VALUES ('','$name','$class','$folder')";
        $data= mysqli_query($link, $result);
        if($data){
            echo "Data insert successfully";
        }
    else{
        echo 'Data Not inserted';
    }
    
    
    
}







?>
