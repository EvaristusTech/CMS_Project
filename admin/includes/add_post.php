<?php

	if (isset($_POST['create_post'])) {
		// code...
		$post_title = $_POST['title'];
		$post_category_id = $_POST['post_category'];
		$post_auther = $_POST['auther'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];

		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		// $post_content_count = 4;


		// moving images from temp location to file
		move_uploaded_file($post_image_temp, "../images/$post_image");


		$query = "INSERT INTO posts(post_catetory_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
		$query .= "VALUES({$post_category_id},'{$post_title}','{$post_auther}','now()','{$post_image}','{$post_content}','{$post_tags}','{$post_status}' ) ";

		$add_post_query = mysqli_query($connection, $query);

		if (!$add_post_query) {
			// code...
			die('Query Failed' . mysqli_error($connection));
		}

	}



?>


<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
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
		<label for="post auther">Post Author</label>
		<input type="text" class="form-control" name="auther">
	</div>

	<div class="form-group">
		<label for="post status">Post Status</label>
		<input type="text" class="form-control" name="post_status">
	</div>

	<div class="form-group">
		<label for="post image">Post Image</label>
		<input type="file" name="image">
	</div>

	<div class="form-group">
		<label for="post tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post tags">Post Content</label>
		<textarea type="text" class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
	</div>

	<div>
		<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
	</div>
	
</form>