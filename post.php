<?php

    include "includes/database.php";

?>
<?php

    include "includes/header.php";

?>

    <!-- Navigation -->
<?php

    include "includes/nav.php";

?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
<div class="col-md-8">


<?php

    if (isset($_GET['p_id'])) {
        // code...
        $the_post_id = $_GET['p_id'];


        $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id ";
        $send_query = mysqli_query($connection, $view_query);
        if (!$send_query) {
            // code...
            die("Query Failed" . mysqli_error($connection));
        }


        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin') {
            // code...
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id "; 
        }else{
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id AND post_status = 'published ' "; 
        }

    

   
        // $query = "SELECT * FROM posts WHERE post_id = $the_post_id "; 
        $post_item = mysqli_query($connection, $query);

     if (mysqli_num_rows($post_item) < 1) {
            // code...

            echo "<h1 class='text-center'>No Post Avaliable</h1>";
        } else{

        while ($row = mysqli_fetch_assoc($post_item)) {
            // code...
            $post_id = $row['post_id'];
            $post_catetory_id = $row['post_catetory_id'];
            $post_title = strtoupper($row['post_title']);
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
       


?>







                <h1 class="page-header">
                  Posts

                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"> <?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="./images/<?php echo $post_image ?>" alt=""></a>
                <hr>
                <p><?php echo $post_content ?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                <hr>


                

<?php
    }
    include "includes/comment.php"; 
       } 
   }

?>






            </div>



            <!-- Blog Sidebar Widgets Column -->
           
<?php

    include "includes/sidebar.php";

?>


        </div>
        <!-- /.row -->

        <hr>


<?php

    include "includes/footer.php";

?>