<?php

	if (isset($_POST['create_post'])) {
		// code...
		$post_title = $_POST['title'];
		$post_category_id = $_POST['post_category_id'];
		$post_auther = $_POST['auther'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];

		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		$post_content_count = 4;


		// moving images from temp location to file
		move_uploaded_file($post_image_temp, "../images/$post_image");
	}



?>



<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>

	<div class="form-group">
		<label for="post_category">Post Category Id</label>
		<input type="text" class="form-control" name="post_category_id">
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
		<textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
	</div>

	<div>
		<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
	</div>
	
</form>