<?php include 'includes/db.php' ?>
<?php session_start();?>
<?php
if(isset($_POST["add"])){
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $image = $_FILES["image"]["name"];
    $image_temp = $_FILES["image"]["tmp_name"];
    $remember = $_POST["remember"];
    $role = "null";
    move_uploaded_file($image_temp, "../images/$image");
    
    $req = "insert into users (user_name, user_firstname, user_lastname, user_email, user_password, user_image) values ('$username', '$firstname', '$lastname', '$email', '$password', '$image')";
    $result = mysqli_query($connection, $req);
    if($result){
        echo "<h1 style='color:green;'>Signed up successfully</h1>";
    }else{
        echo "<h1 style='color:red;'>Try again</h1>";}
    
    
    
    
    if($_POST["remember"] == "remember me"){
            $_SESSION["Username"] = $username;
            $_SESSION["Firstname"] = $firstname;
            $_SESSION["Lastname"] = $lastname;
            $_SESSION["Role"] = $role;
            $_SESSION["user_id"] = $id;
            
            
            
            header("location: ../index.php");
    }
        }
    





?>
   
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <title>Sign up</title>
</head>
<body class="d-flex align-items-center justify-content-center">
   <div class="jumbotron d-flex align-items-center justify-content-center col-5 mt-2">
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
    
    
    <div class="form-group text-center">
    <input type="checkbox" name="remember" value="remember me">
    <label for="remember">Remember me</label>
    </div>
    
    
    <div class="form-group text-center">
    <input type="submit" class="btn btn-primary" name="add" value="Register">
    </div>
    

    
</form>
   </div>
</body>
</html>