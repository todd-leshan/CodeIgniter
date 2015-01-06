<div id="container2" class="container">
	<div class="blog">
<?php
	$blog = $blogArray[0];
	//convert object to an array
	$blog    = get_object_vars($blog);
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
		echo 'No comments found!';
		echo $error105;
	}else
	{
		
	}
?>	
	</div>

	<div class="add_comment">
		
	</div>
</div>