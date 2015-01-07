<div id="container2" class="container">
<a class='back_to_home' href="<?php echo base_url(); ?>">Back to Home</a>
	<div class="blog">
<?php
	$blog = $blogArray[0];
	//convert object to an array
	$blog    = get_object_vars($blog);
	$blogID  = $blog['blogID'];
	$title   = $blog['title'];
	$content = $blog['content'];
	$image   = $blog['image'];
	$date    = $blog['date'];
	$user    = $blog['username'];
?>
	<span>
		<?php echo $user; ?>
		&nbsp posted at&nbsp
		<?php echo $date; ?>
	</span>
	<br>
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
	<hr>
	</div>

	<div class="comment">
<?php
	if(sizeof($commentArray) < 1)
	{
		echo $error105;
	}else
	{
		$commentArray = array_reverse($commentArray);
		foreach($commentArray as $comment)
		{
			$comment  = get_object_vars($comment);
			$content  = $comment['content'];
			$date     = $comment['date'];
			$username = $comment['username'];
?>
	<p>
		<?php echo $username; ?>
		&nbsp replied at&nbsp
		<?php echo $date; ?>
	</p>
	<p>
		<?php echo $content; ?>
	</p>
<?php
		}
	}
?>	
	</div>

	<div class="add_comment">
	</div>

	<form id="addComment" action="<?php echo site_url().'/comment_controller/addComment/'.$blogID; ?>" method="post">
		<span class='error'>
			<?php echo validation_errors(); ?>
		</span>
		<br>
		<span>All fields with * must be filled!</span>
		<br>
		<label class="blog_form" for="username">*Username:</label>
		<input type="text" name="username" id="username" required maxlength="30">
		<br>
		<label class="blog_form" for="content">*Comment</label>
		<textarea class="blog" name="content" id="content" required placeholder="Maximum 200 characters..."></textarea>
		<br>
		<button type="submit" name="submitCom" id="submitCom">Post</button>
	</form>
</div>