<?php
// Code for form validation in php

if(isset($_POST['submit'])){
    if($_POST['name']==""){
        //jodi namefield ta khali hoi tahole error show korbe
        
        $error_msg['name']="Name field is required";
    }
    $name=$_POST['name'];
    // name e kono numeric value takbe na just character takbe
    if(!preg_match("/^[a-zA-Z -]*$/", $name)){
        $error_msg['name']="Only letter is allowed";
    }
    
    $roll=$_POST['roll'];
    if(empty($roll)){
        $error_msg['roll']= "Roll is required";
    }
    // roll numeric kina check korbo
   else if(!is_numeric($roll)){
       $error_msg['roll']="Only number input";
    }
    // 6 tar beshi number nibe na
    
    else if(strlen($roll)!=6){
        $error_msg['roll']="Only input 6 digit number";
    }
    
    $reg=$_POST['reg'];
    if(empty($reg)){
        $error_msg['reg']= "Registration is required";
    }
    // reg numeric kina check korbo
   else if(!is_numeric($reg)){
       $error_msg['reg']="Only number input";
    }
    // 6 tar beshi number nibe na
    
    else if(strlen($reg)!=6){
        $error_msg['reg']="Only input 6 digit number";
    }
    
    // select field validation
    
    $dept =$_POST['dept'];
    if($dept == "NULL"){
        $error_msg['dept'] = "Department is required";
    }
    
     
    $shift =$_POST['shift'];
    if($shift == "NULL"){
        $error_msg['shift'] = "Shift is required";
    }
    
     
    $sem =$_POST['sem'];
    if($sem == "NULL"){
        $error_msg['sem'] = "Semister is required";
    }
    
    // check radio button
    
  
   if(empty($_POST['sex'])){
       $error_msg['sex']='Gender is required';
   }
   
   //validate the username
   
   $uname=$_POST['username'];
   if(empty($uname)){
       $error_msg['uname']="Username is required";
   }
   else if(!(preg_match("/^[A-Za-z][A-Za-z0-9]{5,21}$/",$uname)))
   {
       $error_msg['uname']="Username is invalid";
   
       
   }
   
   // code for password
   
   $pass =$_POST['pass'];
   $pass2=$_POST['pass2'];
    if(empty($pass)){
        $error_msg['pass']="Password is required";
    }
    
     else if(strlen($pass)!=6){
        $error_msg['pass']="Only input 6 digit number";
    }

   
    if(empty($pass2)){
        $error_msg['pass2']="Confirm Password is required";
    }
    
    else if($pass != $pass2){
        $error_msg['pass3']="Password don't match";
    }
    // websiter validation
    
    
    $web =$_POST['website'];
    if(!filter_var($web,FILTER_VALIDATE_URL)){
        $error_msg['web']="Invalide web adress";
    }
    
    
    $email =$_POST['email'];
    if(empty($email)){
        $error_msg['email'] ="Email Must be required";
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_msg['email'] ="Invalide email address";
    }
    // image validatioin
    
   if($_FILES['img']['name']){
       
      if(($_FILES['img']['size'] <= (1024*1024)) and (($_FILES['img']['type']=="image/jpeg")
              or ($_FILES['img']['type']=="image/png"))){
          move_uploaded_file($_FILES['img']['tmp_name'],"upload/".time().rand()."-".$_FILES['img']['name']);
      }else{
          $error_msg['img']="Please upload a jpg or png format image and max size 1MB";
      }
       
       
       
   }else{
       $error_msg['img']="Image is required";
   }
   
   // validation of check box
   
   if(empty($_POST['agree'])){
       $error_msg['agree']='Check is required';
   }
   
   
}







?>

<html>
    <head>
        <title>form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        .error{
            color:red;
            padding-top: 5px;
            width: 100%
        }
    </style>
    
    </head>
    <body>
        <div class="container" style="margin-top:5%">
            <h1 class="alert alert-info col-lg-5 col-lg-offset-3" style="text-align: center">Registration Form</h1>
            
            <form class=" form-horizontal col-lg-5 col-lg-offset-3" method="POST" action="" enctype="multipart/form-data">
         
    <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
    <?php if(isset($error_msg['name'])){
     echo "<div class='error'>".$error_msg['name']."</div>";
    } ?>
  </div>
         
     <div class="form-group">
    <label for="roll">Roll</label>
    <input type="text" class="form-control" id="roll" name="roll" placeholder="Enter Your Roll">
    <?php if(isset($error_msg['roll'])){
     echo "<div class='error'>".$error_msg['roll']."</div>";
    } ?>
  </div>
         
  <div class="form-group">
    <label for="registration">Registration</label>
    <input type="registration" class="form-control" id="registration" placeholder="Enter Your Registration Number" name="reg">
  <?php if(isset($error_msg['reg'])){
     echo "<div class='error'>".$error_msg['reg']."</div>";
    } ?>
  </div>
         
    <div class="form-group">
            <select class="form-control" name="dept">
                <option value="NULL">--Select Department--</option>
                <option value="computer">Computer</option>
                <option value="civil">Civil</option>
                <option value="mechanical">Mechanical</option>
             </select>
        <?php if(isset($error_msg['dept'])){
     echo "<div class='error'>".$error_msg['dept']."</div>";
    } ?>
    </div>
         
      <div class="form-group">
          <select class="form-control" name="shift">
                <option value="NULL">--Select Shift--</option>
                <option value="day">Day</option>
                <option value="evening">Evening</option>
             
             </select>
          
              <?php if(isset($error_msg['shift'])){
     echo "<div class='error'>".$error_msg['shift']."</div>";
    } ?>
    </div>
         
     <div class="form-group">
         <select class="form-control" name="sem">
                <option value="NULL">--Select Semister--</option>
                <option value="first">1st</option>
                <option value="second">2nd</option>
             </select>
             <?php if(isset($error_msg['sem'])){
     echo "<div class='error'>".$error_msg['sem']."</div>";
    } ?>
    </div>
         
         
     <div class="form-group">
     <label class="radio-inline">
      <input type="radio" name="sex" id="inlineRadio1" value="male" <?php if(isset($sex) && $sex ='male') echo 'checked="checked"'; ?>> Male
      </label>
    <label class="radio-inline">
    <input type="radio" name="sex" id="inlineRadio2" value="female" <?php if(isset($sex) && $sex ='female') echo 'checked="checked"'; ?>> Female
   </label>
         
               <?php if(isset($error_msg['sex'])){
     echo "<div class='error'>".$error_msg['sex']."</div>";
    } ?>
      
  </div>
         
         
    <div class="form-group">
    <label for="username">Userame</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username">
 
      <?php if(isset($error_msg['uname'])){
     echo "<div class='error'>".$error_msg['uname']."</div>";
    } ?>
    </div>
    
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="pass" placeholder="Enter Your Password">
     <?php if(isset($error_msg['pass'])){
     echo "<div class='error'>".$error_msg['pass']."</div>";
    } ?>
   
     
  
  </div>
    
   <div class="form-group">
    <label for="cpassword"> Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="pass2" placeholder="Enter Your Password Again">
     <?php if(isset($error_msg['pass2'])){
     echo "<div class='error'>".$error_msg['pass2']."</div>";
    } ?>
    
     <?php if(isset($error_msg['pass3'])){
     echo "<div class='error'>".$error_msg['pass3']."</div>";
    } ?>
    
    
   
   </div>
  
    
  <div class="form-group">
    <label for="img">File input</label>
    <input type="file" id="img" name="img">
    <?php if(isset($error_msg['img'])){
     echo "<div class='error'>".$error_msg['img']."</div>";
    } ?>
    
  
  </div>
         
   <div class="form-group">
    <label for="website">Weebsite</label>
    <input type="text" class="form-control" id="website" name="website" placeholder="Enter Your Website">
     <?php if(isset($error_msg['web'])){
     echo "<div class='error'>".$error_msg['web']."</div>";
    } ?>
   </div>
         
   <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email">
 
    <?php if(isset($error_msg['email'])){
     echo "<div class='error'>".$error_msg['email']."</div>";
    } ?>
   </div>
    
  
    
  <div class="checkbox">
    <label>
        <input type="checkbox" name="agree" value="yes" <?php 
        if(isset($agree) and $agree='yes')
            echo 'checked="checked"';
        
        ?>> Check me out
    </label>
      <?php if(isset($error_msg['agree'])){
     echo "<div class='error'>".$error_msg['agree']."</div>";
    } ?>
  </div>
    
    </br>
    <button type="submit" name="submit" class="btn btn-success">Submit</button>
  
</form>

            
  </div>
</body>
    
</html>




