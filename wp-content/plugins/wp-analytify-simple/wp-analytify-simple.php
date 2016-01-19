<?php
/*
  Plugin Name: RentCafeAPI
  Plugin URI: http://herocreativelabs.com
  Description: RentCafeAPI allows Yardi customers to pull in floor plans and other details stored in their Yardi acocunt to display on their wordpress website
  Version: 1.0
  Author: Adnan
  Author URI: http://twitter.com/herocreativemedia
  License: GPLv2+
  Text Domain: RentCafeAPI
*/


class WP_Analytify_Simple{

  // Constructor
    function __construct() {

        add_action( 'admin_menu', array( $this, 'wpa_add_menu' ));
        register_activation_hook( __FILE__, array( $this, 'wpa_install' ) );
        register_deactivation_hook( __FILE__, array( $this, 'wpa_uninstall' ) );
    }

    /*
      * Actions perform at loading of admin menu
      */
    function wpa_add_menu() {

        add_menu_page( 'Analytify simple', 'RentCafe', 'manage_options', 'analytify-dashboard', array(
                          __CLASS__,
                         'wpa_page_file_path'
                        ), plugins_url('images/wp-analytics-logo.png', __FILE__),'2.2.9');

        add_submenu_page( 'analytify-dashboard', 'Analytify simple' . ' Dashboard', ' Dashboard', 'manage_options', 'analytify-dashboard', array(
                              __CLASS__,
                             'wpa_page_file_path'
                            ));

        add_submenu_page( 'analytify-dashboard', 'Analytify simple' . ' Settings', '<b style="color:#f9845b">Settings</b>', 'manage_options', 'analytify-settings', array(
                              __CLASS__,
                             'wpa_page_file_path'
                            ));
    }

    /*
     * Actions perform on loading of menu pages
     */
    function wpa_page_file_path() {



    }

    /*
     * Actions perform on activation of plugin
     */
    function wpa_install() {



    }

    /*
     * Actions perform on de-activation of plugin
     */
    function wpa_uninstall() {



    }

}

new WP_Analytify_Simple();

// Constructor
function __construct() {

 


  		 require_once( '/Applications/MAMP/htdocs/wordpress/wp-load.php' );
		$response = wp_remote_get( 'https://api.rentcafe.com/rentcafeapi.aspx?requestType=floorplan&companyCode=c00000008017' );
		echo $response['body']; 
    

    // $this->client = new Rent_Cafe();
    // $this->client->setApprovalPrompt( 'force' );
    // $this->client->setAccessType( 'offline' );
    // $this->client->setpropertyCode( 'p0467243' );
    // $this->client->setcompanyCode( 'C00000000429' );
    // $this->client->setRedirectUri( 'localhost:8888' );
     

    // try{

    //     $this->service = new Rent_Cafe_Analytics( $this->client );
    //     $this->wpa_connect();

    // }
    // catch ( Rent_Cafe_Exception $e ) {

    // }


    add_action( 'admin_menu', array( $this, 'wpa_add_menu' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'wpa_styles') );

    register_activation_hook( __FILE__, array( $this, 'wpa_install' ) );
    register_deactivation_hook( __FILE__, array( $this, 'wpa_uninstall' ) );
}