<?php get_header(); 

if( is_tax() ) {
	global $wp_query;
	$term      = get_queried_object();
    $term_title = $term->name;
    $term_slug  = $term->slug;
    $term_id    = $term->term_id;
}

query_posts('post_type=project&&order=ASC&service='.$term_slug);

?>

<header class="jumbotron header header--portfolio_types">
	<div class="container">
		<h1 class="header__headline"><?php
			$service_type = single_tag_title("", false); 
			echo strtoupper( $service_type ); ?>
		</h1>		
		<?php 
			switch ($term_title) {
				case 'google analytics':
					echo "<p class='header__content'>My work with the below clients includes properly setting up Google Analytics on their website so they can measure what matters and auditing existing implementations to find any data tracking issues.</p>";
					break;
				case 'wordpress development':
					echo "<p class='header__content'>Below you'll find past work that involved either building custom Wordpress themes or editing existing themes to fit a client's brand.</p>";
					break;
				case 'front end development':
					echo "<p class='header__content'>All of my past work required me to use HTML, CSS, Javascript - as well as some PHP - to create websites for clients or to setup/audit a Google Analytics implementation.</p>";
					break;
				case 'responsive design':
					echo "<p class='header__content'>I build client's websites to provide an optimal viewing experience on all screen sizes - mobile, tablet and desktop.</p>";
					break;
				case 'squarespace development':
					echo "<p class='header__content'>I developed a custom theme using the Squarespace CMS and it's templating language, JSON-T.</p>";
					break;				
			}
		?>
	</div>
</header>

<section class="portfolio">
	<div class="container">
		<a href="/portfolio" class="portfolio__back-btn"><i class="fa fa-arrow-left"></i> Back to Main Portfolio</a>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
	</div>
</section>


<?php get_footer(); ?>