<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


/**
 *  Create a newsletter shortcode
 *  @usage [newsletter bg-color='' layout='']
 */
function newsletter_widget_func( $atts ){
	$a = shortcode_atts( array(
		'bg-color' => '#333',
		'layout' => 'large' // 'large'|'compact'
	), $atts );
	
	?>
	<div class="newsletter-container layout-<?php echo $a['layout'];?>">
		<h2>Subscribe to our newsletter</h2>
		<p>Get the latest news delivered to your inbox. Unsubscribe at any time.</p>
		<form>
			<input type="email" placeholder="Enter your email ">
			<button type="submit" style="background-color: <?php echo $a['bg-color']; ?>;">Subscribe</button>
		</form>
	</div>
	<?php
}
add_shortcode( 'newsletter', 'newsletter_widget_func' );
