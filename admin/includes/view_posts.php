 
 <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Author</th>
                                   <th>Title</th>
                                   <th>Categorie</th>
                                   <th>Status</th>
                                   <th>Image</th>
                                   <th>Content</th>
                                   <th>Tags</th>
                                   <th>Comments</th>
                                   <th>Date</th>
                               </tr>
                           </thead>
                           <tbody>
                       <?php 
                        $req = "select * from posts";
                        $result = mysqli_query($connection, $req);
                        while($row = mysqli_fetch_assoc($result)){
                            $post_id = $row["post_id"];
                            $post_category_id = $row["post_category_id"];
                            $post_title = $row["post_title"];
                            $post_author = $row["post_author"];
                            $post_date = $row["post_date"];
                            $post_image = $row["post_image"];
                            $post_content = $row["post_content"];
                            $post_tags = $row["post_tags"];
                            $post_comment = $row["post_comment_count"];
                            $post_status = $row["post_status"];?>
                            
                            
                            
                               <tr>
                                   <td><?php echo $post_id?></td>
                                   <td><?php echo $post_author?></td>
                                   <td><?php echo $post_title?></td>
                                   
                                   
                                    <?php 
                                        $query = "select * from categories  where cat_id = '$post_category_id' ";
                                        global $connection;
                                        $res = mysqli_query($connection, $query);
                                        while ($row = mysqli_fetch_assoc($res)){
                                            $cat_title = $row["cat_title"];
                                            
                                            echo " <td>$cat_title</td>";}
                                         ?>
                                   <td><?php echo $post_status?></td>
                                   <td><img width="100" src="../DFS/Post_img/<?php echo $post_image ?>" alt="Post_image"></td>
                                   <td style="width:20px;"><?php echo $post_content?></td>
                                   <td><?php echo $post_tags?></td>
                                   <?php 
                                   $qer = "select count(*) from comments where comment_post_id = '$post_id'";
                                    $res = mysqli_query($connection, $qer);
                                    $row = mysqli_fetch_assoc($res);
                                    $count = $row["count(*)"];
                                        echo " <td>$count</td>";
                                   ?>
                                   <td><?php echo $post_date?></td>
                                   <td><a href='posts.php?delete=<?php echo $post_id?>'>Delete</a></td>
                                   <td><a href='posts.php?source=edit_post&id=<?php echo $post_id?>'>Edit</a></td>
                               </tr>
                           
                            
                       <?php }
                        
                        
                        ?>
                       
                      </tbody>
                       </table>