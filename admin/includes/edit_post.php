<?php

if(isset($_GET["id"])){
    $post_id = $_GET["id"];
    
    
}

$req = "select * from posts where post_id ='$post_id'";
$result = mysqli_query($connection, $req);
while($row = mysqli_fetch_assoc($result)){
    $get_title= $row["post_title"];
    $get_author= $row["post_author"];
    $get_tags= $row["post_tags"];
    $get_status= $row["post_status"];
    $get_category= $row["post_category_id"];
    $get_content= $row["post_content"];
    $get_image = $row["post_image"];}
    
    

if(isset($_POST["update"])){
    $title= $_POST["title"];
    $author= $_POST["author"];
    $tags= $_POST["tags"];
    $status= $_POST["status"];
    $category= $_POST["category"];
    $content= $_POST["content"];
    $image = $_FILES["image"]["name"];
    $image_temp = $_FILES["image"]["tmp_name"];
    move_uploaded_file($image_temp, "../images/$image");
    if(empty($image)){
        $qer = "select * from posts where post_id = $post_id";
        $result = mysqli_query($connection, $qer);
        while($row = mysqli_fetch_assoc($result)){
            $image = $row["post_image"];
        }
    }
    
    
    
    
    $query = "update posts set post_title = '$title', post_author = '$author', post_category_id ='$category', post_status='$status', post_image ='$image', post_date= now(), post_tags='$tags', post_content='$content' where post_id = '$post_id'";
    $update_post = mysqli_query($connection, $query);
    if(!$result){
        die("query failed" . mysqli_error($connection));
    }
    
        }
    
    


?>
    
    
    
    
    
       
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="title">Post title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $get_title?>">
    </div>
    
    
    <div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author" value="<?php echo $get_author?>">
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
        if($cat_id == $get_category){
                                         ?>
             
        <option value="<?php echo $cat_id;?>" selected><?php echo $cat_title;?></option>

       <?php }else{?>
            <option value="<?php echo $cat_id;?>"><?php echo $cat_title;?></option>
        <?php }} ?>
            
        
        
    </select>
    </div>
    
    <div class="form-group">
    <label for="status">Post Status</label>
    <input type="text" class="form-control" name="status" value="<?php echo $get_status?>">
    </div>
    
    
    <div class="form-group">
    <img width="400" src="../DFS/Post_img/<?php echo $get_image?>" alt="post_image">
    <input type="file" name="image">
    </div>
    
    
    <div class="form-group">
    <label for="tags">Post Tags</label>
    <input type="text" class="form-control" name="tags" value="<?php echo $get_tags?>">
    </div>
    
    
    <div class="form-group">
    <label for="content">Post Content</label>
        <textarea name="content" cols="30" rows="10" class="form-control"><?php echo $get_content?></textarea>  
    </div>
    
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update" value="Edit Post">
    </div>
    
    
    
   
    
        





<?php


?>
   

   

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</form>