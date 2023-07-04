<?php

// include "database.php";


    if (isset($_POST['create_comment'])) {
        // code...
        $the_post_id = $_GET['p_id'];

        $comment_author = $_POST['comment_auther']; 
        $comment_email = $_POST['comment_email']; 
        $comment_content = $_POST['comment_content']; 

        // echo $comment_auther;

        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";

        $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now() )";


        $create_comment_query = mysqli_query($connection, $query);

        if (!$create_comment_query) {
            // code..
            die('Query Failed' . mysqli_error($connection));
        }
    

$query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
$query .= "WHERE post_id = $the_post_id ";

$update_comment_count = mysqli_query($connection, $query);

if (!$update_comment_count) {
    // code...
    die('Query Failed' . mysqli_error($connection));
}



    } 

?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <!-- <label for="author">author</label> -->
                            <input placeholder="Your Name" type="text" class="form-control" name="comment_auther">
                        </div>
                        <div class="form-group">
                            <!-- <label for="email">Email</label> -->
                            <input placeholder="Your Email" type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <textarea placeholder="leave a comment here." name="comment_content" class="form-control" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
<?php

$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
$query .= "AND comment_status = 'approved' ";
$query .= "ORDER BY comment_id DESC "; 
$display_comment_query = mysqli_query($connection, $query);

if (!$display_comment_query) {
    // code...
    die('Query Failed' . mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($display_comment_query)) {
    // code...
    $comment_id = $row['comment_id'];
    $comment_post_id = $row['comment_post_id'];
    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_content = $row['comment_content'];
    $comment_status = $row['comment_status'];
    $comment_date = $row['comment_date'];

    ?>

 <!-- Comment -->
                <div class="media">

                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

<?php    
}

?>



