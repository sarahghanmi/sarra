<?php if ( have_posts() ) :
	header('Content-Type: application/json');
	while ( have_posts() ) : the_post(); ?>
		<?php //$p = get_template_part( 'single-modulepost', get_post_format() );
        $hor = get_post_meta($post->ID , 'meta-horaire' , true);
        }
		?>
	<?php endwhile;
	$myJSON = json_encode($hor);
    echo $myJSON;
	?>
<?php else : ?>
	<?php// get_template_part( 'single-modulepost', 'none' ); ?>
<?php endif; ?>