<?php  

	if (isset($_GET['p_id'])) {
		// code...
		$the_post_id = $_GET['p_id'];
	}



    $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
    $select_posts_by_id = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
        // code...
        $post_id = $row['post_id'];
        $post_user = $row['post_user'];
        $post_catetory_id = $row['post_catetory_id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];

        // echo "<tr>";
        // echo "<td>{$post_id}</td>";
        // echo "<td>{$post_user}</td>";
        // echo "<td>{$post_title}</td>";
        // echo "<td>{$post_catetory_id}</td>";
        // echo "<td>{$post_status}</td>";
        // echo "<td><img width='100' height='100' src='../images/$post_image' alt='images'></td>";
        // echo "<td>{$post_tags}</td>";
        // echo "<td>{$post_comment_count}</td>";
        // echo "<td>{$post_date}</td>";
        // // echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        // // echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        // echo "</tr>";



    }

    if (isset($_POST['update_post'])) {
    	// code...
    	$post_title = $_POST['title'];
		$post_category_id = $_POST['post_category'];
		$post_user = $_POST['post_user'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];

		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		$post_content_count = 4;

		// moving images from temp location to file
		move_uploaded_file($post_image_temp, "../images/$post_image");

		if (empty($post_image)) {
			// code... 
			$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
			$select_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_assoc($select_image)) {
				// code...
				$post_image = $row['post_image'];
			}

		}


		$query = "UPDATE posts SET ";
		$query .= "post_title = '{$post_title}', ";
		$query .= "post_catetory_id = '{$post_category_id}', ";
		$query .= "post_date = now(), ";
		$query .= "post_user = '{$post_user}', ";
		$query .= "post_status = '{$post_status}', ";
		$query .= "post_tags = '{$post_tags}', ";
		$query .= "post_content = '{$post_content}', ";
		$query .= "post_image = '{$post_image}' ";
		$query .= "WHERE post_id = {$the_post_id} ";

		$post_update_query = mysqli_query($connection, $query);

		if (!$post_update_query) {
			// code...
			die('Query Failed' . mysqli_error($connection)); 
		}

		echo "<p class='bg-success text-center' style='padding: 20px; font-size:20px;'>Post Updated: <a class='btn btn-success' href='../post.php?p_id={$the_post_id}'> View Posts</a>  OR  <a class='btn btn-danger' href='posts.php'>Edit More Post</a></p>";

    }



?>



<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title">
	</div>

	<div class="form-group">
		<label for="post_category">Post Category Id</label>
		<select name="post_category" id="">

			<?php  

				$query = "SELECT * FROM categories";
				$select_categories = mysqli_query($connection,$query);

					if (!$select_categories) {
					// code...
					die('Query Failed' . mysqli_error($connection));
				}

				while ($row = mysqli_fetch_assoc($select_categories)) {
					// code...
					$cat_id = $row['cat_id'];
					$cat_title = $row['cat_title'];

				
					echo "<option value='$cat_id'>$cat_title</option>";

				}
				

			?>

			

		</select>	
	</div>

	<div class="form-group">
		<labe for="post_user">Users</label>
		<select name="post_user" id="">

		<?php echo "<option value='{$post_user}'>$post_user</option>";?>

			<?php  

				$user_query = "SELECT * FROM users";
				$select_users = mysqli_query($connection, $user_query);

					if (!$select_users) {
					// code...
					die('Query Failed' . mysqli_error($connection));
				}

				while ($row = mysqli_fetch_assoc($select_users)) {
					// code...
					$user_id = $row['user_id'];
					$username = $row['username'];

				
					echo "<option value='{$username}'>$username</option>";

				}
				

			?>

			

		</select>	
	</div>



	<div class="form-group">
		<label for="post auther">Post Status</label>
		<select name="post_status">
			<option value="<?php echo $post_status ?>"><?php echo $post_status ?></option>
			<?php
				if ($post_status == 'published') {
					// code...
					echo "<option value='drafted'>Draft</option>";
				} else {
					echo "<option value='published'>Publish</option>";
				}


			?>
		</select>
	</div>





	<!-- <div class="form-group">
		<label for="post status">Post Status</label>
		<input type="text" value="<?php echo $post_status; ?>" class="form-control" name="post_status">
	</div> -->

	<div class="form-group">
		<!-- <label for="post image">Post Image</label> -->
		<img width="100" src="../images/<?php echo $post_image; ?>">
		<input style="margin-top: 10px;" type="file" value="" name="image">

	</div>

	<div class="form-group">
		<label for="post tags">Post Tags</label>
		<input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post tags">Post Content</label>
		<textarea type="text" class="form-control" name="post_content" id="body" cols="30" rows="10"><?php echo $post_content; ?></textarea>
	</div>

	<div>
		<input type="submit" class="btn btn-primary" name="update_post" value="update Post">
	</div>
	
</form> 