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
    if(isset($_GET["approve"])){
        $comment_id = $_GET["approve"];
        $req = "update comments set comment_status = 'approved' where comment_id = $comment_id;";
        global $connection;
        $result = mysqli_query($connection, $req);
        if(!$result){
            die("Failed");
        }
    }

if(isset($_GET["unapprove"])){
        $comment_id = $_GET["unapprove"];
        $req = "update comments set comment_status = 'unapproved' where comment_id = $comment_id;";
    global $connection;
        $result = mysqli_query($connection, $req);
        if(!$result){
            die("Failed");
        }
    }
    
    
    if(isset($_GET['delete'])){
        $comment_id = $_GET['delete'];
        $req = "delete from comments where comment_id ='$comment_id'";
        global $connection;
        $resultat = mysqli_query($connection, $req);
        if($resultat){
            echo "<h3 style='color:green;'>*Post deleted successfully*</h3>";
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
            
        case "add_post";
            include "includes/add_post.php";
                break;
        case "edit_post";
            include "includes/edit_post.php";
                break;
        case "23";
                echo "nice";
                break;
        case "4";
                echo "nice";
                break;
        default :
            include "includes/view_comments.php";
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