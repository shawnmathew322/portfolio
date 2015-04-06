<?php 

/*
Template Name: Portfolio
*/

$args = array(
			'post_type' => 'project',
			'posts_per_page' => -1,
			'order' => 'ASC'
			);

$the_query = new WP_Query( $args );

get_header();

?>

<header class="jumbotron header header--portfolio">
	<div class="container">
		<h1 class="header__headline">Portfolio</h1>		
		<p class="header__content">View my past work below where I've helped clients build websites using HTML, CSS, Javascript and some PHP, usually when working with Wordpress.
		I've also helped clients setup or audit Google Analytics so they can pinpoint opportunities for improvement by measuring how people use their website.</p>
		<p class="header__content">You can filter projects by selecting on one of the service options next to the services tag.</p>
	</div>
</header>

<section class="portfolio portfolio--main">
	<div class="container">
		<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="row portfolio__item">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio__item-meta">
				<img src="<?php the_field('project_image'); ?>" class="img-responsive portfolio__item-meta__img">				 
				<p class="portfolio__item-meta__svcs"><?php the_terms($post->ID, 'service', '<span><i class="fa fa-tag fa-rotate-90"></i> SERVICES: </span>', ' '); ?></p>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio__item-content">
				<h3 class="portfolio__item-content__title"><?php echo get_the_title(); ?></h3>

				<p class="portfolio__item-content__descr"><?php the_field('project_description'); ?></p>
				
				<?php if( get_field('website_link') && get_the_title() !== "ASCAP" && get_the_title() !== "Union Fitness" ): ?>					
					<a href="http://<?php the_field('website_link'); ?>" target="_blank" class="pull-right portfolio__item-content__link">visit website</a>					
				
				<?php elseif( get_the_title() == "ASCAP" ): ?>
					<a href="http://<?php the_field('website_link'); ?>" target="_blank" class="pull-right portfolio__item-content__link">view guide</a>

				<?php elseif( get_the_title() == "Union Fitness" ): ?>
					<a href="http://<?php the_field('website_link'); ?>" target="_blank" class="pull-right portfolio__item-content__link">view code</a>
				<?php endif; ?> 
			</div>
		</div>

		<?php endwhile; else: ?>
			<p><?php _e('Sorry, no pages matched your criteria.'); ?></p>
		<?php endif; ?>
		<div class="portfolio__display-btns">
			<div class="btns more">VIEW MORE</div>
			<div class="btns less">BACK TO TOP</div>
		</div>		
	</div>
</section>









<?php get_footer(); ?>