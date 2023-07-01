  <table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Auther</th>
                                  <th>Title</th>
                                  <th>Category</th>
                                  <th>Status</th>
                                  <th>Images</th>
                                  <th>Tags</th>
                                  <th>Comments</th>
                                  <th>Date</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </tr>
                          </thead>
                          <tbody>

<?php  

    $query = "SELECT * FROM posts";
    $post_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($post_query)) {
        // code...
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_catetory_id = $row['post_catetory_id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];

        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_catetory_id}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img width='100' height='100' src='../images/$post_image' alt='images'></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
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





