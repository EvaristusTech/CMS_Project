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


    <div class='huge'><?php echo $post_count = recordCount('posts')
 ?></div>



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

    <div class='huge'><?php echo $comment_count = recordCount('comments')
 ?></div>

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

    <div class='huge'><?php echo $user_count = recordCount('users')
 ?></div>
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

    <div class='huge'><?php echo $category_count = recordCount('categories')
 ?></div>
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

    $post_draft_count = checkStatus('posts', 'post_status', 'drafted');   

    $post_published_count = checkStatus('posts', 'post_status', 'published'); 

    $unapproved_comment_count = checkStatus('comments', 'comment_status', 'unapproved'); 

    // $users_subcribers_count = checkUserRole('users', 'user_role', 'Subcriber'); 

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

     $element_text = ['Active Posts', 'Draft Posts', 'Published Posts', 'Pending Comment', 'Subcribers', 'Comments', 'Users', 'Categories'];
     $element_count = [$post_count, $post_draft_count, $post_published_count, $unapproved_comment_count, $users_subcribers_count, $comment_count, $user_count, $category_count];

     for($i = 0; $i < 8; $i++) {

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



