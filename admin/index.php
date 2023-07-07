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
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                       



                    </div>
                </div>
                <!-- /.row -->



                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php

    $query = "SELECT * FROM posts";
    $select_all_posts = mysqli_query($connection, $query);
    $post_count = mysqli_num_rows($select_all_posts);

    echo "<div class='huge'>{$post_count}</div>";


?>

                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

<?php

    $query = "SELECT * FROM comments";
    $select_all_comments = mysqli_query($connection, $query);
    $comment_count = mysqli_num_rows($select_all_comments);

    echo "<div class='huge'>{$comment_count}</div>";


?>

                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php

    $query = "SELECT * FROM users";
    $select_all_users = mysqli_query($connection, $query);
    $user_count = mysqli_num_rows($select_all_users);

    echo "<div class='huge'>{$user_count}</div>";


?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php

    $query = "SELECT * FROM categories";
    $select_all_category = mysqli_query($connection, $query);
    $category_count = mysqli_num_rows($select_all_category);

    echo "<div class='huge'>{$category_count}</div>";


?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

<?php

    $query = "SELECT * FROM posts WHERE post_status = 'drafted' ";
    $select_all_draft_posts = mysqli_query($connection, $query);
    $post_draft_count = mysqli_num_rows($select_all_draft_posts);

    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
    $select_all_unapproved_comment = mysqli_query($connection, $query);
    $unapproved_comment_count = mysqli_num_rows($select_all_unapproved_comment);

    $query = "SELECT * FROM users WHERE user_role = 'Subcriber' ";
    $select_all_subcribers = mysqli_query($connection, $query);
    $users_subcribers_count = mysqli_num_rows($select_all_subcribers);


?>
                <div class="row">
                    
                <script type="text/javascript">
                  google.charts.load('current', {'packages':['bar']});
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Data', 'count'],

                      <?php 

     $element_text = ['Active Posts', 'Draft Posts', 'Pending Comment', 'Subcribers', 'Comments', 'Users', 'Categories'];
     $element_count = [$post_count, $post_draft_count, $unapproved_comment_count, $users_subcribers_count, $comment_count, $user_count, $category_count];

     for($i = 0; $i < 7; $i++) {

        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
     }









                       ?>



                      // ['Posk', 1000],
                   
                    ]);

                    var options = {
                      chart: {
                        title: '',
                        subtitle: '',
                      }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                  }
                </script>

                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>


                </div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php

    include "includes/admin_footer.php";

?>



