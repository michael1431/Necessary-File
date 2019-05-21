<?php
include 'connection.php';

?>


<?php

$result="SELECT * FROM `student`";
$data= mysqli_query($link, $result);
?>
<table>
    <tr>
        <th>Name</th>
        <th>Class</th>
        <th>Image</th>
    </tr>
    


<?php
while($row= mysqli_fetch_array($data)){
   
   echo "<tr>
   
           <td>".$row['name']."</td>
            <td>".$row['class']."</td>
             <td> <img src='".$row['image']."' height ='100' width='100' /></td>

   
   </tr>";
   
    
    
    
    
    
    
    
}
?>
</table>
<?php






?>

