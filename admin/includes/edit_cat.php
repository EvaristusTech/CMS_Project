 <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title" style="font-size: 20px">Edit Category</label>

                                    <?php  

                                    if (isset($_GET['edit'])) {
                                         // code...
                                        $cat_id = $_GET['edit'];


                                        $query ="SELECT * FROM categories WHERE cat_id = {$cat_id} ";
                                        $edit_select_categories = mysqli_query($connection, $query);
                                         while ($row = mysqli_fetch_assoc($edit_select_categories)) {
                                        // code...
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title']; 


                                    ?>

                                    <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">

                                    <?php
                                       }

                                     } 

                                  


                                    ?>

                                 <?php
                                        // update query

                                    if (isset($_POST['update_cat'])) {
                                        // code...
                                        $edit_cat_title = $_POST['cat_title'];

                                        $query = "UPDATE categories SET cat_title = '{$edit_cat_title}' WHERE cat_id = {$cat_id} ";

                                        $update_query = mysqli_query($connection, $query);
                                        if (!$update_query) {
                                            // code...
                                            die("Query Failed" . mysqli_error($connection));
                                        }

                                        header("location: categories.php");

                                    }


                                ?>



                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_cat" value="update categories">
                                </div>
                            </form>