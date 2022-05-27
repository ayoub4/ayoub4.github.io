<?php include "includes/admin_header.php"?>
<?php include "functions.php"?>

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
    if(isset($_GET["sub"])){
        $user_id = $_GET["sub"];
        $req = "update users set user_role = 'subscriber' where user_id = $user_id;";
        global $connection;
        $result = mysqli_query($connection, $req);
        if(!$result){
            die("Failed");
        }
    }

if(isset($_GET["admin"])){
        $user_id = $_GET["admin"];
        $req = "update users set user_role = 'admin' where user_id = $user_id;";
    global $connection;
        $result = mysqli_query($connection, $req);
        if(!$result){
            die("Failed");
        }
    }
    
    
    if(isset($_GET['delete'])){
        $user_id = $_GET['delete'];
        $req = "delete from users where user_id ='$user_id'";
        global $connection;
        $resultat = mysqli_query($connection, $req);
        if($resultat){
            echo "<h3 style='color:green;'>*User deleted successfully*</h3>";
                }else{
            echo "<h3>Delete failed</h3>";
        }
    }
    
    
    
    if(isset($_GET["source"])){
        $source = $_GET["source"];
        
    }else{
        $source =""; 
    }


    switch($source){
            
        case "add_user";
            include "includes/add_user.php";
                break;
        case "edit_user";
            include "includes/edit_user.php";
                break;
        case "23";
                echo "nice";
                break;
        case "4";
                echo "nice";
                break;
        default :
            include "includes/view_users.php";
                        break;   
                        
                          }
    
    
    
    
    
    ?>
                         </div>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   

<?php include "includes/admin_footer.php"?>