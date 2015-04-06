<?php 

/*
Template Name: Google Analytics Consulting
*/

get_header();

$the_query = new WP_Query( 'page_id=20' );

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<header class="jumbotron header header--ga">
	<div class="container">
		<h1 class="header__headline"><?php the_title(); ?></h1>		
		<p class="header__content header__content--ga"><?php the_content(); ?></p>		
	</div>
</header>

<section class="ga">
	<?php 
		$ga_svcs = get_post_meta($post->ID);
		foreach($ga_svcs as $key => $value) {
			if ( $key[0] == '_' )
        		continue;			
			echo '<div class="ga__svc">' . 	
					'<div class="container">' .
						'<div class="divider"></div>' .
						'<p class="ga__title title">' . $key . '</p>' .	
						$value[0] .
					'</div>' .
				'</div>';
		}
	?>
</section>

<?php endwhile;?>	
<?php endif; wp_reset_postdata(); ?>


<?php get_footer(); ?>