<?php
/**
 * Plugin Name: Car Rental Plugin
 * Plugin URI: http://www.example.com/
 * Description: This plugin allow create car rental reserves, car managements, send car reserves, season managements, prices, etc .
 * Version: 1.0.0
 * Author: Maria Membreño
 * Author URI: http://www.example.com/
 * License: GPLv2 or later
 * Text Domain: car-rental
 */

define( 'CAR_RENTAL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CAR_RENTAL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

include CAR_RENTAL_PLUGIN_PATH."includes/load-admin.php";

$car_rental = new Car_Rental_Admin();
$car_rental::init();
register_activation_hook( __FILE__, array( 'Car_Rental_Admin', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Car_Rental_Admin', 'deactivate' ) );

