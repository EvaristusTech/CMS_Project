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
    
    if (isset($_GET['category'])) {
        // code...
        $post_cat_id = $_GET['category'];


    if (is_admin($_SESSION['username'])) {
        // code...
            $var1 = "SELECT post_id, post_title, post_auther, post_date, post_image, post_content FROM posts WHERE post_catetory_id = ?";
           $query1 = mysqli_prepare($connection, $var1);
    } else {

        $var2 = "SELECT post_id, post_title, post_auther, post_date, post_image, post_content FROM posts WHERE post_catetory_id = ? AND post_status = ? ";
        $query2 = mysqli_prepare($connection, $var2); 

        $published = 'published';
    }
 
   
        // $post_item = mysqli_query($connection, $query);

    if (isset($query1)) {
        // code...
       mysqli_stmt_bind_param($query1, "i", $post_catetory_id);

       mysqli_stmt_excute($query1);

       mysqli_stmt_bind_result($query1, $post_id, $post_title, $post_auther, $post_date, $post_image, $post_content);

       $query = $query1

    } else {

        mysqli_stmt_bind_param($query2, "is", $post_catetory_id, $published);

       mysqli_stmt_excute($query2);

       mysqli_stmt_bind_result($query2, $post_id, $post_title, $post_auther, $post_date, $post_image, $post_content);

        $query = $query2

    }



        if (mysqli_stmt_num_rows($query) === 0) {
            // code...

            echo "<h1 class='text-center'>No Post Avaliable</h1>";
        } 
        // else{

        while (mysqli_stmt_fetch($query)):
            // code...
            // $post_id = $row['post_id'];
            // $post_catetory_id = $row['post_catetory_id'];
            // $post_title = strtoupper($row['post_title']);
            // $post_author = $row['post_author'];
            // $post_date = $row['post_date'];
            // $post_image = $row['post_image'];
            // $post_content = substr($row['post_content'], 0, 200);
            // $post_tags = $row['post_tags'];
            // $post_comment_count = $row['post_comment_count'];
            // $post_status = $row['post_status'];
       

            
?>







                <h1 class="page-header">
                   Page heading
                    <small>Secondary Text</small>

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
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


                

<?php endwhile;
    }
        else{
            header("location: index.php");
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