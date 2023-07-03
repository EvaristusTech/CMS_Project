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

    $query = "SELECT * FROM comments";
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
        echo "<td>some title</td>";
        echo "<td>{$comment_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={}'>Approve</a></td>";
        echo "<td><a href='posts.php?delete={}'>unapprove</a></td>";
        
        // echo "<td><a href='posts.php?source=edit_post&p_id={}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={}'>Delete</a></td>";
        echo "</tr>";



    }



if (isset($_GET['delete'])) {
  // code...
  $delete_id = $_GET['delete'];

  $query = "DELETE FROM posts WHERE post_id = {$delete_id}";

  $delete_query = mysqli_query($connection, $query);

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





