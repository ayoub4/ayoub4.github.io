 
 <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>User Id</th>
                                   <th>Username</th>
                                   <th>Password</th>
                                   <th>First name</th>
                                   <th>Last name</th>
                                   <th>Email</th>
                                   <th>Image</th>
                                   <th>Role</th>
                                   <th>Make</th>
                               </tr>
                           </thead>
                           <tbody>
                       <?php 
                        $req = "select * from users";
                        global $connection;
                        $result = mysqli_query($connection, $req);
                        while($row = mysqli_fetch_assoc($result)){
                            $user_id = $row["user_id"];
                            $user_name = $row["user_name"];
                            $user_password = $row["user_password"];
                            $user_firstname = $row["user_firstname"];
                            $user_lastname = $row["user_lastname"];
                            $user_email = $row["user_email"];
                            $user_image = $row["user_image"];
                            $user_role = $row["user_role"];
                            
                            ?>
                            
                            
                            
                               <tr>
                                   <td><?php echo $user_id?></td>
                                   <td><?php echo $user_name?></td>
                                   <td><?php echo $user_password?></td>
                                   <td><?php echo $user_firstname?></td>
                                   <td><?php echo $user_lastname?></td>
                                    <td><?php echo $user_email?></td>
                                    <td><img src="../DFS/User_pic/<?php echo $user_image?>" alt="img" width="100px"></td>
                                    <td><?php echo $user_role?></td>
                                   <td><a href='users.php?admin=<?php echo $user_id?>'>Admin</a> <br><br><br>
                                   <a href='users.php?sub=<?php echo $user_id?>'>subscriber</a></td>
                                   <td><a href='users.php?source=edit_user&edit=<?php echo $user_id?>'>Edit</a></td>
                                   <td><a href='users.php?delete=<?php echo $user_id?>'>Delete</a></td>
                               </tr>
                           
                            
                       <?php }
                        
                        
                        ?>
                       
                      </tbody>
                       </table>