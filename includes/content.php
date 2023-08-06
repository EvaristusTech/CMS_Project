<div class="col-md-8">


<?php

$per_page = 5;

if (isset($_GET['page'])) {
    // code...
    $page = $_GET['page'];
} else {
    $page = "";
}


if ($page == "" || $page == 1) {
    // code...
    $page_1 = 0;
} else {
    $page_1 = ($page * $per_page) - $per_page;
}


    $select_query_count = "SELECT * FROM posts WHERE post_status = 'published' ";
    $find_count = mysqli_query($connection, $select_query_count);
    $count = mysqli_num_rows($find_count);

    if ($count < 1) {
        // code...
        echo "<h1 class='text-center'>No Post Avaliable</h1>";

    } else {  

    $count = ceil($count / $per_page);





   
        $query = "SELECT * FROM posts LIMIT $page_1, $per_page"; 
        $post_item = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($post_item)) {
            // code...
            $post_id = $row['post_id'];
            $post_catetory_id = $row['post_catetory_id'];
            $post_title = strtoupper($row['post_title']);
            $post_author = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'], 0, 200);
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];


?>


                <h1><?php echo $count ?></h1>
                <h1 class="page-header"> 
                   Page heading
                    <small>Secondary Text</small>

                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post/<?php echo $post_id; ?>"> <?php echo $post_title ?></a>
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
