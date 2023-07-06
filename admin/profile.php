<?php

    include "includes/admin_header.php";

?>

<?php


if (isset($_SESSION['username'])) {
    // code...

    $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($connection, $query);

        if (!$select_user_profile_query) {
            // code...
            die("Query Failed" . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($select_user_profile_query)) {
            // code...
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
            // $user_image = $row['user_image'];
            // $randsalt = $row['randsalt'];
            $user_role = $row['user_role'];
            // $reg_date = date('d/m/y');
        }

}

?>

<?php

    if (isset($_POST['update_user'])) {
        // code...
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];

        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];

        $user_role = $_POST['user_role'];
        $user_password = $_POST['user_password'];
        // $user_date = date('d-m-y');
        // $post_content_count = 4;


        // moving images from temp location to file
        // move_uploaded_file($post_image_temp, "../images/$post_image");


        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE username = '{$username}' ";

        $user_update_query = mysqli_query($connection, $query);

        if (!$user_update_query) {
            // code...
            die('Query Failed' . mysqli_error($connection)); 
        }


    }
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
                          Welcome To Admin
                          <small>Author</small>
                      </h1>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post auther">Firstname</label>
        <input type="text" value="<?php echo $user_firstname ;?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post status">Lastname</label>
        <input type="text" value="<?php echo $user_lastname ;?>" class="form-control" name="user_lastname">
    </div>

<!--    <div class="form-group">
        <label for="post image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="post tags">Username</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="post tags">Email</label>
        <input type="email" value="<?php echo $user_email ;?>" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="post tags">Role</label>
        <select name="user_role" id="">
            <option value="subcriber"><?php echo $user_role ;?></option>
<?php
    
    if ($user_role == 'Admin') {
        // code...
        echo "<option value='subcriber'>Subcriber</option>";
    }else {
        echo "<option value='admin'>Admin</option>";
    }

?>

        </select>
    </div>

    <div class="form-group">
        <label for="post tags">Password</label>
        <input type="text" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
    </div>

    <div>
        <input type="submit" class="btn btn-primary" name="update_user" value="Update Profile">
    </div>
    
</form>

                    

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