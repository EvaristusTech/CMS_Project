<?php

  if (isset($_POST['checkBoxArray'])) {
    // code...
    foreach ($_POST['checkBoxArray'] as $postValueId) {
      // code...
      $bulk_options = $_POST['bulk_options'];

      switch ($bulk_options ) {
        case 'published':
          // code...
          $query = "UPDATE posts SET post_status = '{$bulk_options}' ";
          $query .= "WHERE post_id = {$postValueId} ";
          $publish_query = mysqli_query($connection, $query);
            if (!$publish_query) {
              // code...
              die("Query Failed" . mysqli_error($connection));
            }
          break;

          case 'drafted':
            // code...
             $query = "UPDATE posts SET post_status = '{$bulk_options}' ";
             $query .= "WHERE post_id = {$postValueId} ";
              $draft_query = mysqli_query($connection, $query);
             if (!$draft_query) {
              // code...
              die("Query Failed" . mysqli_error($connection));
            }
            break;

             case 'delete':
            // code...
             $query = "DELETE FROM posts ";
             $query .= "WHERE post_id = {$postValueId}; ";
              $delete_query = mysqli_query($connection, $query);
             if (!$delete_query) {
              // code...
              die("Query Failed" . mysqli_error($connection));
            }
            break;
        
        default:
          // code...
          break;
      }


    }
  }





?>
<form action="" method="post">

  <table class="table table-bordered table-hover">

    <div style="padding: 0px;" id="bulkOptionContainer" class="col-xs-4">
      
      <select class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>
        <option value="published">Publish</option>
        <option value="drafted">Draft</option>
        <option value="delete">Delete</option>
      </select>
    </div>

    <div class="col-xs-4">
      <input type="submit" name="name" class="btn btn-success" value="Apply">
      <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
    </div>


                          <thead>
                              <tr>
                                  <th><input id="selectAllBoxes" type="checkbox"></th>
                                  <th>ID</th>
                                  <th>Auther</th>
                                  <th>Title</th>
                                  <th>Category</th>
                                  <th>Status</th>
                                  <th>Images</th>
                                  <th>Tags</th>
                                  <th>Comments</th>
                                  <th>View post</th>
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
        ?>

        <th><input class='checkBoxes' id='selectAllBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></th>

        <?php
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";

        $query = "SELECT * FROM categories WHERE cat_id = {$post_catetory_id} ";
        $select_categories_id = mysqli_query($connection,$query);

        while ($row = mysqli_fetch_assoc($select_categories_id)) {
          // code...
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];

        echo "<td>{$cat_title}</td>";


      }



        echo "<td>{$post_status}</td>";
        echo "<td><img width='100' height='100' src='../images/$post_image' alt='images'></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td><a href='../post.php?p_id={$post_id}'>View Posts</a></td>";
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
    header("location: posts.php");
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





</form> 