<?php
include '../includes/db.php';
function insert(){
    
    if(isset($_POST['submit'])){
                                    $cat_title = $_POST["cat_title"];
                                
                                    if($cat_title == "" || empty($cat_title)){
                                        echo "<h3 style='color:red;'>*This field cannot be empty*</h3>";
                                    }else{
                                    $req = "insert into categories (cat_title) values ('$cat_title')";
                                        global $connection;
                                    $resultat = mysqli_query($connection, $req);
                                    if($resultat){
                                            echo "<h3 style='color:green;'>*Category inserted successfully*</h3>";
                                        }else{
                                            echo "<h3>Insert failed</h3>";
                                        }
                                    }
                                       }
}

    function delete(){
                                if(isset($_GET['delete'])){
                                        $cat_id = $_GET['delete'];
                                        $req = "delete from categories where cat_id ='$cat_id'";
                                    global $connection;
                                        $resultat = mysqli_query($connection, $req);
                                        if($resultat){
                                                echo "<h3 style='color:green;'>*Category deleted successfully*</h3>";
                                            }else{
                                                echo "<h3>Delete failed</h3>";
                                            }
                                        }
                                       
    }
    function show() {
                                    $query = "select * from categories";
                                    global $connection;
                                    $result = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($result)){
                                            $cat_title = $row['cat_title'];
                                            $cat_id = $row['cat_id'];
                                        
                                        ?>         
                               
                                   <tr>
                                       <td><?php echo $cat_id?></td>
                                       <td><?php echo $cat_title?></td>
                                       <td><a href="categories.php?delete=<?php echo $cat_id?>">Delete</a></td>
                                       <td><a href="edit_categories.php?edit=<?php echo $cat_id?>">Edit</a></td>
                                   </tr>
                               
                         <?php }?>
                                        
        
        <?php
        
    }
    
    function edit(){
        
                                
                                    if(isset($_GET["edit"])){
                                        $cat_id = $_GET["edit"];
                                        $req = "select * from categories where cat_id = '$cat_id'";
                                        global $connection;
                                        $result = mysqli_query($connection, $req);
                                        while ($row = mysqli_fetch_assoc($result)){
                                            $cat_title = $row["cat_title"];
                                         ?>
                                        
                                        <input class="form-control" type="text" name="cat_edit" value=<?php echo $cat_title?> >
                                        
                                     <?php   
                                    
                                                }
                                    
                                                     }
                               
                                    if(isset($_POST["submitE"])){
                                        $cat_title = $_POST["cat_edit"];
                                        $cat_id = $_GET["edit"];
                                        $req = "update categories set cat_title = '$cat_title' where cat_id = '$cat_id'";
                                        global $connection;
                                        $result = mysqli_query($connection, $req);
                                        header("location: categories.php");
                                        if($result){
                                            echo "<h3 style='color:green;'>*Category edited successfully*</h3>";
                                        }else {
                                            echo "<h3>edit failed</h3>";
                                        }
                                        
                                    }

        
        
        
    }

function confirm(){
    if(!$result){
        die("query failed" . mysqli_error($connection));
    }
}

    
    ?>