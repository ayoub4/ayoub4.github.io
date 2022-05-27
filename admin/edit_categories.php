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
                       <div class="col-xs-6">
                          
                           
                       <form action="" method="post">
                           <div class="form-group">
                              <label for="cat_title"> Add Category</label>
                               <input class="form-control" type="text" name="cat_title">
                           </div>
                           <div class="form-group">
                               <input type="submit" name="submit" value="Add categorie" class="btn btn-primary">
                        </form>
                       </div>
                           </div>
                            <?php
                                insert();
                                delete();
                                
                        ?>     
                      
                       
                       
                       <div class="col-xs-6">
                         <table class="table table-bordered table-hover">
                               <thead>
                                   <tr>
                                       <th>ID</th>
                                       <th>Category title</th>
                                   </tr>
                               </thead>
                               <tbody>
                               <?php show();?>
                       
                         </tbody>
                           </table>
                       </div>
                       
                       <form action="" method="post">
                           <div class="form-group">
                              <label for="cat_edit"> Edit Category</label>
                               
                           <?php edit();?>
                           
                               
                               <br>
                               <div class="form-group">
                               <input type="submit" name="submitE" value="Edit categorie" class="btn btn-primary">
                               </div>
                                </form> 
                               </div>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   

<?php include "includes/admin_footer.php"?>