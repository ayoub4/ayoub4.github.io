<?php
if(isset($_POST["add"])){
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $image = $_FILES["image"]["name"];
    $image_temp = $_FILES["image"]["tmp_name"];
    move_uploaded_file($image_temp, "../DFS/User_pic/$image");
    
    $req = "insert into users (user_name, user_firstname, user_lastname, user_email, user_password, user_role, user_image) values ('$username', '$firstname', '$lastname', '$email', '$password', '$role', '$image')";
    $result = mysqli_query($connection, $req);
    if($result){
        echo "<h1 style='color:green;'>User Added successfully</h1>";
    }else{
        echo "<h1 style='color:red;'>Insert Failed</h1>";}
        }
    





?>
   

   
   
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username">
    </div>
    
    
    <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" name="firstname">
    </div>
    
    <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" name="lastname">
    </div>
    
    
    <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email">
    </div>
    
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password">
    </div>
    
    
    <div class="form-group">
    <label for="image">User Image</label>
    <input type="file" name="image">
    </div>
    
    <div class="form-group">
    <label for="role">Role :</label>
    <select name="role">
        <option value="admin">Admin</option>
        <option value="guest">Guest</option>
    </select>
    </div>
    
    
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="add" value="Add user">
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</form>