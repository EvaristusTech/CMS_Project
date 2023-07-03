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

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>