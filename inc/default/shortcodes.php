<?php 
function socials_func( ) {

	$output = '<div class="socials">';
	$output .= '<a href="http://www.facebook.com/pages/The-Bank/277573288939381" target="_blank" class="icon icon-facebook"></a>';
	$output .= '<a href="http://twitter.com/#!/TheBankAgency" class="icon icon-twitter" target="_blank"></a>';
	$output .= '<a href="http://youtube.com/thebank" class="icon icon-youtube" target="_blank"></a>';
	$output .= '</div>';

    return $output;
}
add_shortcode( 'socials', 'socials_func' );
 ?>
