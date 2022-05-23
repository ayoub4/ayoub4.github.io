<?php include "includes/admin_header.php"?>
<?php
if(isset($_SESSION["user_id"])){
    $id = $_SESSION["user_id"];}
    



?>

    <div id="wrapper">

<?php include "includes/admin_nav.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Ayoub Mzari</small>
                        </h1>
     <?php               
    $req = "select * from users where user_id = '$id' ";
    global $connection;
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
    $image = $_FILES["image"]["name"];
    $image_temp = $_FILES["image"]["tmp_name"];
    move_uploaded_file($image_temp, "../images/$image");
        if(empty($image)){
        $qer = "select * from users where user_id = $id";
        $result = mysqli_query($connection, $qer);
        while($row = mysqli_fetch_assoc($result)){
            $image = $row["user_image"];
        }
    }  
        
        
    $query = "update users set user_name = '$username', user_firstname = '$firstname', user_lastname ='$lastname', user_email='$email', user_password ='$password', user_image='$image' where user_id=$id ";
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
    <img style="display:block" width="200" src="../images/<?php echo $image?>" alt="post_image">
    <br>
    <input type="file" name="image" value="<?php echo $image?>">
    </div>
    
    
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit" value="Edit Profile">
    </div>
    
    
    
    
    
    
    
    
    
    

    
    
</form>
    
    
    
    
   
                         </div>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   

<?php include "includes/admin_footer.php"?>