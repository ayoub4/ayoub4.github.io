<?php include 'includes/head.php' ?>
<?php include 'includes/nav.php' ?>

    
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               <?php
                if(isset($_GET["id"])){
                    $post_id = $_GET["id"];
                    $query = "select * from posts where post_id =$post_id ";
                    $result = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        $post_id = $row["post_id"];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];}
                        ?>
                      
                     

                <!-- First Blog Post -->
                <h2>
                    <h1><?php echo $post_title?></h1>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date?></p>
                <hr>
                <img class="img-responsive" src="DFS/Post_img/<?php echo $post_image?>" alt="" width="500">
                <hr>
                <p><?php echo $post_content?></p>
                <hr>
 <?php }?>
                
                 
                <!-- Comments Form -->
                
                
                
                
                         <?php 
                if(isset($_POST["create_comment"])){
                    $post = $_GET["id"];
                    $comment_author = $_POST["comment_author"];
                    $comment_email = $_POST["comment_email"];
                    $comment_content = $_POST["comment_content"];
                    $comment_status = "unapproved";
                    $q = "insert into comments (comment_post_id, comment_author, comment_date, comment_email, comment_content, comment_status) values ('$post', '$comment_author', now(), '$comment_email','$comment_content', '$comment_status') ";
                    $res = mysqli_query($connection, $q);
                    if(!$res){
                         echo mysqli_error($connection);
                    }
                }
                
                
                
                
                ?>

                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                       <div class="form-group">
                           <label for="comment_author">Full name</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        
                        <div class="form-group">
                           <label for="comment_email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                       
                        <div class="form-group">
                           <label for="comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

               
               
               
               <?php    
                
                if(isset($_GET["id"])){
                    $post_id = $_GET["id"];
                    $req = "select * from comments where comment_post_id =$post_id and comment_status = 'approved'";
                    $res = mysqli_query($connection, $req);
                    while($row = mysqli_fetch_assoc($res)){
                        $comment_content = $row["comment_content"];
                        $comment_author = $row["comment_author"];
                        $comment_date = $row["comment_date"];
                
                ?>
               
               
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img width="50" class="media-object" src="https://application.f21c.co.tz/static/images/login.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                <hr>
                <?php }}?>


               
               
                


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
<?php include 'includes/sidebar.php' ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include 'includes/footer.php' ?>