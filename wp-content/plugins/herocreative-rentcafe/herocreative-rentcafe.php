<?php

/*
 *	Plugin Name: Hero Creative Media RentCafe Integration
 *	Plugin URI: http://heroreativemedia.com
 *	Description: Provides apartment communities to pull in prices, availability and floor 
 *  plans for property.
 *	Version: 1.0
 *	Author: Brenden Martin
 *	Author URI: http://heroreativemedia.com
 *	License: GPL2
 *
*/

/*
 *	Assign global variables
 *
*/

$plugin_url = WP_PLUGIN_URL . '/herocreative-rentcafe';
$options = array();
$display_json = true;


/*
 *	Add a link to our plugin in the admin menu
 *	under 'Settings > Treehouse Badges'
 *
*/

function herocreative_rentcafe_menu() {

	/*
	 * 	Use the add_options_page function
	 * 	add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function ) 
	 *
	*/

	add_options_page(
		'Official RentCafe Integration Plugin',
		'RentCafe Integration',
		'manage_options',
		'herocreative-rentcafe',
		'herocreative_rentcafe_options_page'
	);

}
add_action( 'admin_menu', 'herocreative_rentcafe_menu' );

function herocreative_rentcafe_options_page() {

	if( !current_user_can( 'manage_options' ) ) {

		wp_die( 'You do not have suggicient permissions to access this page.' );

	}

	

	global $plugin_url;
	global $options;
	global $display_json;


	if( isset( $_POST['herocreative_form_submitted'] ) ) {

		$hidden_field = esc_html( $_POST['herocreative_form_submitted'] );

		if( $hidden_field == 'Y' ) {

			$herocreative_companycode = esc_html( $_POST['herocreative_companycode'] );
			$herocreative_propertycode = esc_html( $_POST['herocreative_propertycode'] );

			$herocreative_data = 	herocreative_rentcafe_get_data( $herocreative_companycode, $herocreative_propertycode );

			$options['herocreative_companycode']	= $herocreative_companycode;
			$options['herocreative_propertycode']	= $herocreative_propertycode;
			$options['herocreative_data']		= $herocreative_data;

			update_option( 'herocreative_data', $options );

		}

	}

	$options = get_option( 'herocreative_rentcafe' );

	if( $options != '' ) {

		$herocreative_companycode = $options['herocreative_companycode'];
		$herocreative_proprtycode = $options['herocreative_propertycode'];
		$herocreative_data 		  =	$options['herocreative_data'];

	}

	require( 'inc/options-page-wrapper.php' );


}

function herocreative_rentcafe_get_data( $herocreative_companycode, $herocreative_propertycode ) {

	$json_feed_url = 'https://api.rentcafe.com/rentcafeapi.aspx?requestType=floorplan&companyCode=' . $herocreative_companycode . '&propertyCode=' . $herocreative_propertycode ;
	$args = array( 'timeout' => 120 );

	$json_feed = wp_remote_get( $json_feed_url, $args );

	$herocreative_data = json_decode( $json_feed['body'] );

	return $herocreative_data;

} 

// function herocreative_rentcafe_styles() {

// 	wp_enqueue_style('herocreative_rentcafe_styles', plugins_url('herocreative-rentcafe/herocreative-rentcafe.css'));

// }

// add_action('admin_head', 'herocreative_rentcafe_styles');

function your_css_and_js() {
wp_register_style('your_css_and_js', plugins_url('style.css',__FILE__ ));
wp_enqueue_style('your_css_and_js');
wp_register_script( 'your_css_and_js', plugins_url('script.js',__FILE__ ));
wp_enqueue_script('your_css_and_js');
}
add_action( 'admin_init','your_css_and_js');


?>