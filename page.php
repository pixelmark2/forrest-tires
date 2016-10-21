<?php

// Add full width body class
add_filter( 'body_class', 'ft_full_width_body_class' );
function ft_full_width_body_class( $classes ) {
	$classes[] = 'ft-full-width';
	return $classes;
}

//Add attributes
add_filter( 'genesis_attr_site-inner', 'ft_full_width_page_attributes_site_inner' );
function ft_full_width_page_attributes_site_inner( $attributes ) {
	$attributes['role']     = 'main';
	$attributes['itemprop'] = 'mainContentOfPage';

	return $attributes;
}

// Remove div.site-inner's div.wrap
add_filter( 'genesis_structural_wrap-site-inner', '__return_empty_string' );

// Display Header
get_header();

// Display Content
the_post(); // sets the 'in the loop' property to true.
the_content();

// Display Footer
get_footer();




?>










<div class="tire-landing-page-header">
	<img src="/wp-content/uploads/2016/10/MichelinLandingPageExample-2-300x161.png" alt="michelinlandingpageexample-2" width="300" height="161" class="alignnone size-medium wp-image-244" />
</div>
<div class="tire-landing-top">
	<div class="tire-landing-logo">
		<img class="alignnone size-medium wp-image-222" src="/wp-content/uploads/2016/10/Promise-Plan-Logo-Digital-300x255.png" alt="promise-plan-logo-digital" width="300" height="255" />

		YOUR SATISFACTION — OUR PROMISE

		• 30-Day Satisfaction Guarantee1
		• 3-Year Flat Tire Changing Assistance2
		• Limited Mileage Warranty3
	</div>

	<div class="tire-landing-desc">
		<h3>THE MICHELIN DIFFERENCE</h3>
		<h4>MORE SCIENCE INSIDE. MORE PERFORMANCE ON THE ROAD.
		MORE VALUE PER MILE.</h4>
		<p>To give drivers more of what they want most from their tires, Michelin designs every tire around a signature performance. Like toughness in an all-terrain tire or grip and control in an ultra-high performance tire. But Michelin believes you shouldn’t have to give up other performances in the process.</p>
		<p>It’s why Michelin packs more science inside its tires — so you can get more performance, and ultimately more value, out of them.</p>
	</div>
</div>

<div class="tire-lp-vids">
	<div class="ft-one-third">
		<div class="tire-post-image" style="background-image: url('/wp-content/uploads/2016/10/MichelinLandingPageExample-10-300x161.png');"></div>
			<a href="#"><h3>WHY CHOOSE MICHELIN® TIRES?</h3></a>
			<p>No one makes tires like Michelin. It’s because we insist our tires do more and deliver all the performances you need for safe everyday driving, giving you MICHELIN® Total PerformanceTM.</p>
	</div>



	<div class="ft-one-third">
		<div class="tire-post-image" style="background-image: url('/wp-content/uploads/2016/10/MichelinLandingPageExample-9-300x174.png');"></div>
			<a href="#"><h3>REDEFINING SAFETY WITH THE MICHELIN® PREMIER® FAMILY</h3></a>
			<p>MICHELIN® introduces a new automotive safety advance: a tire that stops shorter on wet roads than competitors' new tires – even when half-worn4</p>
	</div>


	<div class="ft-one-third">
		<div class="tire-post-image" style="background-image: url('/wp-content/uploads/2016/10/MichelinLandingPageExample-7-300x156.png');"></div>
			<a href="#"><h3>MICHELIN® DEFENDER® TIRE – UNCOMPROMISING LONGEVITY</h3></a>
			<p>The MICHELIN® Defender® tire offers our longest mileage warranty, exceptional safety and a quiet, comfortable ride.</p>
	</div>
</div>






<div class="featured-tires">
	<h2>FEATURED TIRES</h2>
	<div class="tire-row">
		<div class="ft-one-third">
			<img class="alignnone size-medium wp-image-223" src="http://skytopphotovideo.dev/wp-content/uploads/2016/10/Untitled-1-300x300.png" alt="untitled-1" width="300" height="300" />
		</div>

		<div class="ft-one-third">
			<h3>MICHELIN® PREMIER® A/S</h3>
			<p>From $ 145.00 per tire. Safe When New. Safe When Worn5. Even when half-worn, it's still safe, thanks to EverGripTM wet-braking technology. The MICHELIN® Premier® A/S tire still stops shorter on wet roads than leading competitors’ brand-new tires4.</p>
		</div>

		<div class="ft-one-third">
			<div class="tire-post-image" style="background-image: url('/wp-content/uploads/2016/10/Screen-Shot-2016-10-21-at-10.50.04-AM-300x133.png');"></div>
		</div>
	</div>
	<div class="tire-row">
		<div class="ft-one-third">
			<img class="alignnone size-medium wp-image-225" src="http://skytopphotovideo.dev/wp-content/uploads/2016/10/Untitled-111-300x300.png" alt="untitled-111" width="300" height="300" />
		</div>

		<div class="ft-one-third">
			<h3>MICHELIN® DEFENDER® LTX® M/S</h3>
			<p>From $157.00 per tire. Stronger. Longer.6 Get the proven tread design of the best-selling MICHELIN® LTX® M/S2 with EverTreadTM compound to provide durable treadlife, no matter the season.</p>
		</div>

		<div class="ft-one-third">
			<div class="tire-post-image" style="background-image: url('/wp-content/uploads/2016/10/Screen-Shot-2016-10-21-at-10.50.20-AM-300x128.png');"></div>
		</div>
	</div>

	<div class="tire-row">
		<div class="ft-one-third">
			<img class="alignnone size-medium wp-image-224" src="http://skytopphotovideo.dev/wp-content/uploads/2016/10/Untitled-11-300x300.png" alt="untitled-11" width="300" height="300" />
		</div>

		<div class="ft-one-third">
			<h3>MICHELIN® PREMIER® LTX®</h3>
			<p>From $164.00 per tire. Safe When New. Safe When Worn.5 Even when half-worn, the MICHELIN® Premier® LTX® tire still stops shorter on wet roads than leading competitors’ brand-new tires.7</p>
		</div>

		<div class="ft-one-third">
			<div class="tire-post-image" style="background-image: url('/wp-content/uploads/2016/10/Screen-Shot-2016-10-21-at-10.50.29-AM-300x124.png');"></div>
		</div>
	</div>

</div>


<div class="tlp-bottom-logo">
	<img class="alignnone size-medium wp-image-232" src="http://skytopphotovideo.dev/wp-content/uploads/2016/10/Screen-Shot-2016-10-21-at-11.10.07-AM-300x124.png" alt="screen-shot-2016-10-21-at-11-10-07-am" width="300" height="124" />
</div>