$(document).ready(function() {

	/* Scroll to Contact Form */
	$(".contact, .header__content--home__cta__fre").on("click", function(e){
		e.preventDefault();
		$("html, body").animate({
			scrollTop: $(".footer__contact").offset().top
		}, 1000, function(){			
			$(".footer__contact__title.title").addClass("rtnColor");			
		});
	});

	/* Scroll to My Services */
	$(".header__content--home__cta__emp").on("click", function(e){
		e.preventDefault();
		$("html, body").animate({
			scrollTop: $("#my_services").offset().top - 50
		}, 1000);
	});

	/* Testimonials Carousel */
	$("#testimonials").owlCarousel({
		navigation : false,
	    slideSpeed : 300,
	    paginationSpeed : 400,
	    singleItem:true,
	    autoPlay: 10000
	})

	/* Cleanup empty p tags created by WP */
	$("p:empty").remove();

	/* Portfolio - Show More/Less Items */
	var port_items = $(".portfolio--main .portfolio__item").size(),
		shown = 3;

	$(".portfolio--main .portfolio__item:gt(" + shown + ")").hide();
	
	$(".more").on("click", function(){
		shown = $(".portfolio--main .portfolio__item:visible").size() + 3;
		console.log(shown);
		if( shown <= port_items ) {
			$(".portfolio--main .portfolio__item:lt(" + shown + ")").fadeIn("slow");
		} else {
			$(".portfolio--main .portfolio__item:lt(" + port_items + ")").fadeIn("slow");
			$(".less").css("display", "inline-block");
			$(".more").hide();
		}
	});

	$(".less").on("click", function(){
		shown = 2;			
		$("html, body").animate({
			scrollTop: $(".portfolio--main .container").offset().top - 100
			}, 1000, function(){
				$(".portfolio--main .portfolio__item:gt(" + shown + ")").fadeOut();
				$(".more").show();
				$(".less").hide();
			});								
	});		
		
		
		
		
	


});