<?php
if(isset($_GET["edit"])){
    $user_id = $_GET["edit"];
}


    $req = "select * from users where user_id = $user_id ";
    $res = mysqli_query($connection, $req);
    while($row = mysqli_fetch_assoc($res)){
    $username = $row["user_name"];
    $firstname = $row["user_firstname"];
    $lastname = $row["user_lastname"];
    $email = $row["user_email"];
    $password = $row["user_password"];
    $role = $row["user_role"];
    $image = $row["user_image"];}
    
        
        
    if(isset($_POST["edit"]))  {
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $image = $_FILES["image"]["name"];
    $image_temp = $_FILES["image"]["tmp_name"];
    move_uploaded_file($image_temp, "../images/$image");
        if(empty($image)){
        $qer = "select * from users where user_id = $user_id";
        $result = mysqli_query($connection, $qer);
        while($row = mysqli_fetch_assoc($result)){
            $image = $row["user_image"];
        }
    }  
        
        
    $query = "update users set user_name = '$username', user_firstname = '$firstname', user_lastname ='$lastname', user_email='$email', user_password ='$password', user_role = '$role', user_image='$image' where user_id=$user_id ";
    $update_user = mysqli_query($connection, $query);
    if(!$update_user){
        die("query failed" . mysqli_error($connection));
    }}
    
        
    





?>
   

   
   
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo $username?>">
    </div>
    
    
    <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" name="firstname" value="<?php echo $firstname?>">
    </div>
    
    <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" name="lastname" value="<?php echo $lastname?>">
    </div>
    
    
    <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $email?>">
    </div>
    
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" value="<?php echo $password?>">
    </div>
    
    
    <div class="form-group">
    <label for="image">User Image</label>
    <img style="display:block" width="200" src="../DFS/User_pic/<?php echo $image?>" alt="post_image">
    <br>
    <input type="file" name="image" value="<?php echo $image?>">
    </div>
    
    <div class="form-group">
    <label for="role">Role :</label>
    <select name="role">
        <option value="admin"><?php echo ucfirst($role)?></option>
        <?php 
        if($role == "admin"){
            echo "<option value='subscriber'>Subscriber</option>";
        }elseif($role == "subscriber"){
            echo "<option value='admin'>Admin</option>";
        } 
        
        ?>
    </select>
    </div>
    
    
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit" value="Edit User">
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</form>