<?php include "db.php"?>
<?php session_start();?>
<?php 
if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    
    
    $query = "select count(*) from users where user_email = '$email'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    if($row["count(*)"] != 0){
       $req = "select * from users where user_email = '$email'";
        $res = mysqli_query($connection, $req);
        while($r = mysqli_fetch_assoc($res)){
        $user_password = $r["user_password"];
        $username = $r["user_name"];
        $firstname = $r["user_firstname"];
        $lastname = $r["user_lastname"];
        $role = $r["user_role"];
        $id = $r["user_id"];
            
    }
        global $user_pass;
        if($password == $user_password){
            $_SESSION["Username"] = $username;
            $_SESSION["Firstname"] = $firstname;
            $_SESSION["Lastname"] = $lastname;
            $_SESSION["Role"] = $role;
            $_SESSION["user_id"] = $id;
            
            
            
            header("location: ../admin");
        }else{
            header("location: ../index.php");
            echo '<h1 style="color:red;">password incorrect</h1>';
        }
}else {
    echo 'email not found';
}}

?>