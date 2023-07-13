
<?php  

	if (isset($_GET['user_id'])) {
		// code...
		$the_user_id = $_GET['user_id'];
	}



    $query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
    $select_users_by_id = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_users_by_id)) {
        // code...
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];
        // $salt = $row['randsalt'];
    }
// $hashed_password = crypt($user_password, $salt);



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

		$query = "SELECT randsalt FROM users";
		$select_randsalt_query = mysqli_query($connection, $query);
		if (!$select_randsalt_query) {
			// code...
			die("Query Failed" . mysqli_error($connection));
		}

		while ($row = mysqli_fetch_assoc($select_randsalt_query)) {
			// code...
			$salt = $row['randsalt'];
		}
		
		
  		 $hashed_password = crypt($user_password, $salt);



		// $query = "UPDATE users SET ";
		// $query .= "user_firstname = '{$user_firstname}', ";
		// $query .= "user_lastname = '{$user_lastname}', ";
		// $query .= "username = '{$username}', ";
		// $query .= "user_email = '{$user_email}', ";
		// $query .= "user_role = '{$user_role}', ";
		// $query .= "user_password = '{$hashed_password}' ";
		// $query .= "WHERE user_id = {$the_user_id} ";

		// $user_update_query = mysqli_query($connection, $query);

		// if (!$user_update_query) {
		// 	// code...
		// 	die('Query Failed' . mysqli_error($connection)); 
		// }


	}



?>


<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post auther">Firstname</label>
		<input type="text" value="<?php echo $user_firstname ;?>" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="post status">Lastname</label>
		<input type="text" value="<?php echo $user_lastname ;?>" class="form-control" name="user_lastname">
	</div>

<!-- 	<div class="form-group">
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
		<input type="submit" class="btn btn-primary" name="update_user" value="Update Users">
	</div>
	
</form>