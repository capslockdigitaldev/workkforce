<?php 
get_header();
?>
<div class="only_phone"> 
<?
get_sidebar('left');
?>
</div>
<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div class="even_banner" >
	<div class="left_hand">
		
		<img src="<?php echo $image[0]; ?>"> <?php endif; ?> 
	</div>
	<div class="right_hand">
		<h2><?php the_field('eventtitle'); ?></h2>
	</div>	
</div>
<div class="each_event_description">
    <p><i class="far fa-clock"></i> <?php the_field('time'); ?></p>
    <p><i class="fas fa-map-marker-alt"></i> <?php the_field('location'); ?></p> 
</div>
<div class="each_event_descript">
    <?php the_field('eventdescription'); ?>
</div>
<div class="each_event_descript eventcontact">
    <?php $email = get_field('contactemail'); 
    if ($email == ""){
    }
    else{
        echo "<h4>Contact</h4>";
        echo '<p><i class="far fa-envelope"></i> '.$email.'</p>';
    }
    $phone = get_field('contactphone'); 
    if ($phone == ""){
    }
    else{
        echo '<p><i class="fas fa-phone-alt"></i> '.$phone.'</p>';
    }
    ?>
    
</div>
<?php
get_footer();
?>

