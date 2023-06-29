<?php

    include "includes/admin_header.php";

?>

    <div id="wrapper">

        <!-- Navigation -->




<?php

    include "includes/admin_nav.php";

?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome to admin panel
                            <small>author</small>
                        </h1>
                        <div class="col-xs-6">

                            <?php

                                if (isset($_POST['submit'])) {
                                    // code...
                                    $cat_title = $_POST['cat_title'];

                                    if ($cat_title == "" || empty($cat_title)) {
                                        // code...
                                        echo "<h5 style='color:red'>Empty field!!!</h5>";
                                    } else{
                                       $query = "INSERT INTO categories(cat_title) ";
                                       $query .= "VALUE('{$cat_title}')";

                                       $create_category_query = mysqli_query($connection, $query); 
                                       if (!$create_category_query) {
                                           // code...
                                            die('query failed' . mysqli_error($connection));
                                       }
                                    }
                                    
                                }

                            ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title" style="font-size: 20px">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add categories">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">

                

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Delete Category</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- find all categories -->
                                <?php 


                                     $query = "SELECT * FROM categories";
                                       $select_categories = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($select_categories)) {
                                        // code...
                                        $cat_title = $row['cat_title'];
                                        $cat_id = $row['cat_id'];


                                        echo "<tr>";
                                      echo "<td>{$cat_id}</td>";
                                       echo "<td>{$cat_title}</td>";
                                       echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                       echo "</tr>";
                                    }

                                ?>


                                <?php

                                    if (isset($_GET['delete'])) {
                                        // code...
                                        $delete_cat_id = $_GET['delete'];

                                        $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id} ";

                                        $delete_query = mysqli_query($connection, $query);

                                        header("location: categories.php");

                                    }


                                ?>

                                        
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php

    include "includes/admin_footer.php";

?>