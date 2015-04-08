<?php 

/*
Template Name: About
*/

/***Add Comment for github **/
get_header();

$the_query = new WP_Query( 'page_id=71' );

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<header class="jumbotron header header--about">
		<div class="container">
			<h1 class="header__headline"><?php the_title(); ?></h1>				
		</div>
	</header>
	<section class="about">
		<div class="container">
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 about__img">
				<img style="width: 150px;" src="../wp-content/themes/portfolio/img/abt-pic.jpg">	
			</div>		
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 about__main">										
				<?php 
					$about_meta = get_post_meta($post->ID);
					foreach($about_meta as $key => $value){
						if( $key[0] == '_' )
        					continue;
        				if( $key == 'certifications' ){
        					echo '<div class="about__main__content about__main__content--certs">' . $value[0] . '</div>';
        				}else {
        					echo '<p class="about__main__content">' . $value[0] . '</p>';
        				}
					}
				?>
				<p class="about__main__content"><em>(Work can be done remotely or onsite if needed and I am open to relocating for full time positions)</em></p>
			</div>		
		</div>
	</section>

<?php endwhile;?>	
<?php endif; wp_reset_postdata(); ?>



<?php get_footer(); ?>