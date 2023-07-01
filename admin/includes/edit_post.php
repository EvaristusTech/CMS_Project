
<?php  

	if (isset($_GET['p_id'])) {
		// code...
		$the_post_id = $_GET['p_id'];
	}



    $query = "SELECT * FROM posts";
    $select_posts_by_id = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
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

        // echo "<tr>";
        // echo "<td>{$post_id}</td>";
        // echo "<td>{$post_author}</td>";
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
?>



<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title">
	</div>

	<div class="form-group">
		<label for="post_category">Post Category Id</label>
		<input type="text" value="<?php echo $post_catetory_id; ?>" class="form-control" name="post_category_id">
	</div>

	<div class="form-group">
		<label for="post auther">Post Author</label>
		<input type="text"value="<?php echo $post_author; ?>" class="form-control" name="auther">
	</div>

	<div class="form-group">
		<label for="post status">Post Status</label>
		<input type="text" value="<?php echo $post_status; ?>" class="form-control" name="post_status">
	</div>

	<div class="form-group">
		<label for="post image">Post Image</label>
		<input type="file" value="<?php echo $post_image; ?>" name="image">
	</div>

	<div class="form-group">
		<label for="post tags">Post Tags</label>
		<input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post tags">Post Content</label>
		<textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
	</div>

	<div>
		<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
	</div>
	
</form> 