<?php

/**
 * Plugin Name: Metal Prices XMLCharts
 * Description: Metal Prices Plugin for XMLCharts.com
 * Author: Tudor Patrascu
 * Author URI: https://github.com/tudor-patrascu
 * Version: 0.1
 * Text Domain: metal-prices-xmlcharts
 */

 if( !defined('ABSPATH'))
 {
    exit;
 }

if(!class_exists('MetalPricesXMLCharts')){

 class MetalPricesXMLCharts {
   public function __construct() 
   {
      define('MPX_PATH', (plugin_dir_path( __FILE__ )));
      require_once(MPX_PATH.'vendor/autoload.php');

   }
   public function initialize() 
   {
      
      include_once(MPX_PATH . 'includes/options-page.php');
      
      include_once(MPX_PATH . 'includes/metal-prices-shortcode.php');

   }

 }

 $metalsPlugin = new MetalPricesXMLCharts;
 $metalsPlugin->initialize();

}