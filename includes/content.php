<div class="col-md-8">


<?php


    $select_query_count = "SELECT * FROM posts";
    $find_count = mysqli_query($connection, $select_query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count / 5);





   
        $query = "SELECT * FROM posts "; 
        $post_item = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($post_item)) {
            // code...
            $post_id = $row['post_id'];
            $post_catetory_id = $row['post_catetory_id'];
            $post_title = strtoupper($row['post_title']);
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'], 0, 200);
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];


            if ($post_status == 'published') {
                // code...

?>


                <h1><?php echo $count ?></h1>
                <h1 class="page-header"> 
                   Page heading
                    <small>Secondary Text</small>

                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"> <?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="auther_post.php?auther=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="./images/<?php echo $post_image ?>" alt=""></a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


                

<?php

     }
        
        }

?>






            </div>
