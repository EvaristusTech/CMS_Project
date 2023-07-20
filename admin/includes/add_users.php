<?php

	if (isset($_POST['create_user'])) {
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

    $user_password = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 10) ); 


		$query = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_role, user_password ) ";

		$query .= "VALUES('{$user_firstname}','{$user_lastname}','{$username}','{$user_email}','{$user_role}','{$user_password}' ) ";

		$add_user_query = mysqli_query($connection, $query);

		if (!$add_user_query) {
			// code...
			die('Query Failed' . mysqli_error($connection));
		}

		echo "User Created: " . " " . "<a herf='./users.php'>View Users</a>";



	}



?>


<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post auther">First Name</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="post status">Lastname</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>

<!-- 	<div class="form-group">
		<label for="post image">Post Image</label>
		<input type="file" name="image">
	</div> -->

	<div class="form-group">
		<label for="post tags">Username</label>
		<input type="text" class="form-control" name="username">
	</div>

	<div class="form-group">
		<label for="post tags">Email</label>
		<input type="email" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="post tags">Role</label>
		<select name="user_role" id="">
			<option value="subcriber">Select Options</option>
			<option value="admin">Admin</option>
			<option value="subcriber">Subcriber</option>
		</select>
	</div>

	<div class="form-group">
		<label for="post tags">Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>

	<div>
		<input type="submit" class="btn btn-primary" name="create_user" value="Add users">
	</div>
	
</form>