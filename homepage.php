<?php 

/*
Template Name: Homepage
*/

get_header();

$the_query = new WP_Query( 'page_id=11' );

?>

<header class="jumbotron header header--home">
	<div class="container">
    	<h1 class="header__headline header__headline--home">Build, measure and improve your website.</h1>
        <p class="header__subhead">Front End Developer + Google Analytics Consultant</p>        
        <p class="header__content header__content--home">
        I write HTML, CSS, and Javascript to build the user interface of client applications and websites.  I also help companies improve the online experience of 
        their website by implementing Google Analytics to accurately measure user and website behavior.        
        </p>
		<div class="header__content header__content--home-svcs">
			<p class="header__content header__content--home-svcs__title">Contact me if you need:</p>
	        <ul>        	        	
		        <li><i class="fa fa-desktop"></i> a web design to be developed into a responsive website</li>
		        <li><i class="fa fa-bar-chart"></i> help with setting up Google Analytics to measure what matters</li>
		        <li><i class="fa fa-line-chart"></i> help with using Google Analytics data to find out how to improve your website</li>		        
	        </ul>
        </div>	
        <p class="header__content header__content--home">I'm available for freelance/contract opportunities as well as for long term employment with the right organization.</p>
        <div class="header__content--home__cta">
        	<a href="#contact" class="header__content--home__cta__fre">
        		I need a Website/Google Analytics help
        		<i class="fa fa-arrow-right"></i>
        	</a>
        	<a href="#my_services" class="header__content--home__cta__emp">
        		View my services
        		<i class="fa fa-arrow-right"></i>
        	</a>
        </div>
    </div>              
</header>

<section id="my_services" class="services">
	<div class="container">
		<h1 class="section_title">MY SERVICES</h1>
		<div class="row">
			<?php 
				$my_svsc = get_post_meta($post->ID);
				foreach($my_svsc as $key => $value){					
					if( $key[0] == '_' )
	        			continue;
	        		if( $key[0] == 'G'){
	        			echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services__svc">' . 
							'<i class="fa fa-bar-chart fa-lg services__svc__ico"></i>' . 
							'<a class="title services__svc__title" href="/google-analytics-consulting">' . $key . '</a>' .
							'<p class="services__svc__content">' . $value[0] . '</p>' .											
						 '</div>';
	        		}elseif ($key[0] == 'F') {
	        			echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services__svc">' . 
							'<i class="fa fa-code fa-lg services__svc__ico"></i>' . 
							'<a class="title services__svc__title" href="/portfolio">' . $key . '</a>' .
							'<p class="services__svc__content">' . $value[0] . '</p>' .											
						 '</div>';
	        		}	        		
				}
			?>
		</div>		
	</div><!--container-->
</section><!--services-->

<section id="quotes" class="reccos">
	<div class="container">
		<div id="testimonials" class="owl-carousel owl-theme">
			<div class="reccos__contain">
				<p class="reccos__quote">
					<i class="fa fa-quote-left"></i>  Shawn’s implementation of analytics and his ability to help measure quantitative data help us wow our clients. 
					With his help we’ve been able to focus design and development on efforts that have a direct effect on improving 
					our clients goals.
				</p>
				<p class="reccos__quote">In addition, Shawn developed websites exactly as outlined and is very easy to work with.  <i class="fa fa-quote-right"></i></p>
				<p class="reccos__author">- Jacques Dupoux, <a class="studio-agency-link" href="http://dupo.is" target="_blank">DUPO.is</a></p>
				<div style="clear:both;"></div>
			</div>
			<div class="reccos__contain">
				<p class="reccos__quote">
					<i class="fa fa-quote-left"></i>  Shawn has been integral in developing successful websites that my clients have been more than happy with.
					He has helped produce results for my design studio and has always met every deadline.  <i class="fa fa-quote-right"></i>
				</p>				
				<p class="reccos__author">- Cristine Esguerra, <a class="studio-agency-link" href="http://constructcreativestudio.com" target="_blank">Construct Creative Studio</a></p>
				<div style="clear:both;"></div>
			</div>
			<div class="reccos__contain">
				<p class="reccos__quote">
					<i class="fa fa-quote-left"></i>  I cannot overstate how easy it is to work with Cristine and Shawn. They create top quality work at a more than reasonable rate. 
					Further, they quickly respond to immediate (and often, unexpected) organizational needs, perhaps better than any other external 
					contractor we currently work with. 
				</p>
				<p class="reccos__quote">I have already referred Cristine and Shawn to other colleagues and organizations and plan to 
					continue to do so.  <i class="fa fa-quote-right"></i>
				</p>
				<p class="reccos__author">- Client testimonial, <a class="studio-agency-link" href="http://constructcreativestudio.com" target="_blank">Construct Creative Studio</a></p>
				<div style="clear:both;"></div>
			</div>			
		</div>			      
	</div><!--container-->
</section><!--reccos-->




<?php get_footer(); ?>