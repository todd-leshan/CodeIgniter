


<?php foreach($menu as $link_text=>$link_url):?>


<?php echo '<a href='.$link_url.'>'; ?>
<?php echo $link_text; ?>

<?php echo '</a>'?>

<?php echo $separator; ?>

<?php endforeach; ?>
