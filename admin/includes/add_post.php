<?php
if(isset($_POST["create"])){
    $title= $_POST["title"];
    $author= $_POST["author"];
    $tags= $_POST["tags"];
    $status= $_POST["status"];
    
    $query = "select * from category";
    
    
    
    
    $category = $_POST["category"];  
    $content= $_POST["content"];

    $image = $_FILES["image"]["name"];
    $image_temp = $_FILES["image"]["tmp_name"];
    
    $comment = 0;
    $date = date("d-m-y");
    
    
    move_uploaded_file($image_temp, "../DFS/Post_img/$image");
    
    $req = "insert into posts (post_author, post_title, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES ('$author','$title', '$date','$image','$content','$tags','$comment', '$status');";
    $result = mysqli_query($connection, $req);
    if($result){
        echo "<h1 style='color:green;'>inserted successfully</h1>";
    }
        
        
        
        }
    





?>
   

   
   
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="title">Post title</label>
    <input type="text" class="form-control" name="title">
    </div>
    
    
    <div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author">
    </div>
    
    
    <div class="form-group">
    <label for="category">Post Category :</label>
    <select name="category">
        <?php
        $req = "select * from categories";
        global $connection;
        $result = mysqli_query($connection, $req);
        while ($row = mysqli_fetch_assoc($result)){
        $cat_title = $row["cat_title"];
        $cat_id = $row["cat_id"];
                                         ?>          
        <option value="<?php echo $cat_id;?>" selected=""><?php echo $cat_title;?></option>

       <?php } ?>
        
        
        
    </select>
    </div>
    
    
    <div class="form-group">
    <label for="status">Post Status</label>
    <input type="text" class="form-control" name="status">
    </div>
    
    
    <div class="form-group">
    <label for="image">Post Image</label>
    <input type="file" name="image">
    </div>
    
    
    <div class="form-group">
    <label for="tags">Post Tags</label>
    <input type="text" class="form-control" name="tags">
    </div>
    
    
    <div class="form-group">
    <label for="content">Post Content</label>
        <textarea name="content" cols="30" rows="10" class="form-control"></textarea>  
    </div>
    
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create" value="Publish Post">
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</form>