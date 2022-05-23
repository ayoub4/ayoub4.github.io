 
 <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Author</th>
                                   <th>Content</th>
                                   <th>Email</th>
                                   <th>Post_Title</th>
                                   <th>Status</th>
                                   <th>Date</th>
                                   <th>Approve</th>
                                   <th>Unapprove</th>
                               </tr>
                           </thead>
                           <tbody>
                       <?php 
                        $req = "select * from comments";
                        global $connection;
                        $result = mysqli_query($connection, $req);
                        while($row = mysqli_fetch_assoc($result)){
                            $comment_id = $row["comment_id"];
                            $comment_post_id = $row["comment_post_id"];
                            $comment_date = $row["comment_date"];
                            $comment_author = $row["comment_author"];
                            $comment_email = $row["comment_email"];
                            $comment_content = $row["comment_content"];
                            $comment_status = $row["comment_status"];
                            ?>
                            
                            
                            
                               <tr>
                                   <td><?php echo $comment_id?></td>
                                   <td><?php echo $comment_author?></td>
                                   <td><?php echo $comment_content?></td>
                                   <td><?php echo $comment_email?></td>
                                   
                                    <?php 
                                        $query = "select * from posts  where post_id = '$comment_post_id' ";
                                        global $connection;
                                        $res = mysqli_query($connection, $query);
                                        while ($row = mysqli_fetch_assoc($res)){
                                            $post_title = $row["post_title"];
                                            
                                            echo "<td><a href='../post.php?id=$comment_post_id'>$post_title</a></td>";}
                                         ?>
                                   
                                   <td><?php echo $comment_status?></td>
                                    <td><?php echo $comment_date?></td>
                                   <td><a href='comments.php?approve=<?php echo $comment_id?>'>Approve</a></td>
                                   <td><a href='comments.php?unapprove=<?php echo $comment_id?>'>Unapprove</a></td>
                                   <td><a href='comments.php?delete=<?php echo $comment_id?>'>Delete</a></td>
                               </tr>
                           
                            
                       <?php }
                        
                        
                        ?>
                       
                      </tbody>
                       </table>