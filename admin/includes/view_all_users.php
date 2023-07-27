  <table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Username</th>
                                  <th>Firstname</th>
                                  <th>Lastname</th>
                                  <th>Email</th>
                                  <th>Role</th>
                                  <th>Date</th>
                                  <th>Edit To Admin</th>
                                  <th>Edit To Subcriber</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </tr>
                          </thead>
                          <tbody>

<?php  

    $query = "SELECT * FROM users";
    $users_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($users_query)) {
        // code...
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
        $user_image = $row['user_image'];
        $randsalt = $row['randsalt'];
        $user_role = $row['user_role'];
        $reg_date = date('d/m/y');

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_firstname}</td>";

      //   $query = "SELECT * FROM categories WHERE cat_id = {$post_catetory_id} ";
      //   $select_categories_id = mysqli_query($connection,$query);

      //   while ($row = mysqli_fetch_assoc($select_categories_id)) {
      //     // code...
      //     $cat_id = $row['cat_id'];
      //     $cat_title = $row['cat_title'];

      //   echo "<td>{$cat_title}</td>";


      // }



        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";

        echo "<td>{$user_role}</td>";
        echo "<td>{$reg_date}</td>";



        // $query = "SELECT * FROM users WHERE user_id = $user_id ";
        // $select_user_id_query = mysqli_query($connection, $query);
        // while ($row = mysqli_fetch_assoc($select_user_id_query)) {
        //   // code...
        //   $user_id = $row['user_id'];
        //   // $post_title = $row['post_title'];

        // echo "<td><a href='../user.php?user_id=$user_id'>$post_title</a></td>";

 

        // }



        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='users.php?change_to_subcriber={$user_id}'>Subcriber</a></td>";
        
        echo "<td><a href='users.php?source=edit_users&user_id={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";



    }


if (isset($_GET['change_to_admin'])) {
  // code...
  $user_id = $_GET['change_to_admin'];

  $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $user_id ";

  $change_user_query = mysqli_query($connection, $query);

    header("location: users.php");
  

  if (!$change_user_query) {
    // code...
    die('query failed' . mysqli_error($connection));

  }
}





if (isset($_GET['change_to_subcriber'])) {
  // code...
  $user_id = escape($_GET['change_to_subcriber']);

  $query = "UPDATE users SET user_role = 'Subcriber' WHERE user_id = $user_id ";

  $change_subcrber_query = mysqli_query($connection, $query);

    header("location: users.php");
  

  if (!$change_subcrber_query) {
    // code...
    die('query failed' . mysqli_error($connection));

  }
}






if (isset($_GET['delete'])) {
  // code...


  if (isset($_SESSION['user_role'])) {

    $user_role = $_SESSION['user_role'];
    
      if ($user_role == 'Admin') {
   

      $user_id = mysqli_real_escape_string($connection, $_GET['delete']);

      $query = "DELETE FROM users WHERE user_id = {$user_id}";

      $delete_user_query = mysqli_query($connection, $query);

    header("location: users.php");


  if (!$delete_user_query) {
    // code...
    die('query failed' . mysqli_error($connection));
       }
    }
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




