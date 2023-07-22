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
                          Welcome To Comments
                          <small>Author</small>
                      </h1>



<table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Auther</th>
                                  <th>Comment</th>
                                  <th>Email</th>
                                  <th>Status</th>
                                  <th>In Response To</th>
                                  <th>Date</th>
                                  <th>Approve</th>
                                  <th>Disapprove</th>
                                  <!-- <th>Edit</th>  -->
                                  <th>Delete</th>
                              </tr>
                          </thead>
                          <tbody>

<?php  


    $comment_post_id = mysqli_real_escape_string($connection, $_GET['id']);
    $query = "SELECT * FROM comments WHERE comment_post_id = $comment_post_id";

    $comment_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($comment_query)) {
        // code...
        $comment_id = $row['comment_id'];
        $comment_author = $row['comment_author'];
        $comment_post_id = $row['comment_post_id'];
        $comment_content = $row['comment_content'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];

        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";

      //   $query = "SELECT * FROM categories WHERE cat_id = {$post_catetory_id} ";
      //   $select_categories_id = mysqli_query($connection,$query);

      //   while ($row = mysqli_fetch_assoc($select_categories_id)) {
      //     // code...
      //     $cat_id = $row['cat_id'];
      //     $cat_title = $row['cat_title'];

      //   echo "<td>{$cat_title}</td>";


      // }



        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";




        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $select_post_id_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_post_id_query)) {
          // code...
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];

        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

 

        }









        echo "<td>{$comment_date}</td>";
        echo "<td><a href='comment.php?approve={$comment_id}'>Approve</a></td>";
        echo "<td><a href='comment.php?unapprove={$comment_id}'>unapprove</a></td>";
        
        // echo "<td><a href='posts.php?source=edit_post&p_id={}'>Edit</a></td>";
        echo "<td><a href='post_comment.php?delete={$comment_id}&id=" . $_GET['id']. "'>Delete</a></td>";
        echo "</tr>";



    }


if (isset($_GET['approve'])) {
  // code...
  $comment_id = $_GET['approve'];

  $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id ";

  $approve_comment_query = mysqli_query($connection, $query);

    header("location: comment.php");
  

  if (!$approve_comment_query) {
    // code...
    die('query failed' . mysqli_error($connection));

  }
}





if (isset($_GET['unapprove'])) {
  // code...
  $comment_id = $_GET['unapprove'];

  $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id ";

  $unapprove_comment_query = mysqli_query($connection, $query);

    header("location: comment.php");
  

  if (!$unapprove_comment_query) {
    // code...
    die('query failed' . mysqli_error($connection));

  }
}






if (isset($_GET['delete'])) {
  // code...
  $comment_id = $_GET['delete'];

  $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";

  $delete_query = mysqli_query($connection, $query);

    header("location: post_comment.php?id=" . $_GET['id'] . "");


  if (!$delete_query) {
    // code...
    die('query failed' . mysqli_error($connection));

  }
}


 ?>
<!-- 
                              <tr>
                                  <td>10</td>
                                  <td>Eva Tech</td>
                                  <td>Bootstrap framework</td>
                                  <td>Bootstrap</td>
                                  <td>Status</td>
                                  <td>Images</td>
                                  <td>Tags</td>
                                  <td>Comments</td>
                                  <td>Date</td>
                              </tr>
 -->                          </tbody>
                      </table>





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