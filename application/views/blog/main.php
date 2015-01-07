<div id="container2" class="container">
	<div class="blog">
<?php
	if($body)
	{
		/*
		//stupid way to reverse an array
		$num_blog = sizeof($body);
		$blogArray = array();
		while($num_blog > 0)
		{
			array_push($blogArray,array_pop($body));
			$num_blog--;
		}
		*/
		$blogArray = array_reverse($body);
		foreach($blogArray as $blog)
		{
			$blog    = get_object_vars($blog);
			$blogID  = $blog['blogID'];
			$title   = $blog['title'];
			$content = $blog['content'];
			$image   = $blog['image'];
			$date    = $blog['date'];
			$user    = $blog['username'];
?>
	<p>
		<?php echo $user; ?>
		&nbsp posted at&nbsp
		<?php echo $date; ?>
	</p>
	<h3>
		<?php echo $title; ?>
	</h3>
	<p>
		<?php echo $content; ?>
	</p>
<?php
	if($image != null)
	{
?>
		<img class="blog-image" src="<?php echo base_url().$image; ?>">
<?php
	}
?>
	<div class="comment_link">
		<a class="comment" href="<?php echo site_url().'/comment_controller/blog_comment/'.$blogID; ?>">comments>>></a>
	</div>
	<hr>
<?php	
		}
		
	}else
	{
		echo 'No blog yet! Be the first one to post!';
	}
?>
	</div>
	<form id="addNewBlog" action="<?php echo site_url().'/addBlog_controller'?>" method="post" enctype="multipart/form-data">
		<span class='error'>
			<?php echo validation_errors(); ?>
		</span>
		<br>
		<span>All fields with * must be filled!</span>
		<br>
		<label class="blog_form" for="username">*Username:</label>
		<input type="text" name="username" id="username" required maxlength="30">
		<br>
		<label class="blog_form" for="title">*Title:</label>
		<input type="text" name="title" id="title" maxlength="50" required>
		<br>
		<label class="blog_form" for="content">*Content</label>
		<textarea class="blog" name="content" id="content" required placeholder="Maximum 200 characters..."></textarea>
		<br>
		<label class="blog_form" for="image">Upload image</label>
		<input type="file" name="image" id="image">
		<br>
		<button type="submit" name="submitBlog" id="submitBlog">Post</button>
	</form>
</div>

