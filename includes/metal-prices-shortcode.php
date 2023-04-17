<?php

// Generate initial table and button
function show_mpx_table()
{
    include MPX_PATH . '/includes/metal-prices-table.php';
    include MPX_PATH . '/includes/refresh-button.php';
    return $mpxDisplayTable . $mpxButtonDisplay;
}

// Create shortcode

add_shortcode('mpxtable', 'show_mpx_table');

// Enqueue styles and scripts

function mpx_enqueue_scripts() {
    wp_enqueue_style('mpx-style', get_site_url().'/wp-content/plugins/metal-prices-xmlcharts/includes/css/mpx-style.css',array(),null);
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&family=Raleway:wght@500;700&display=swap',array(),null);
    wp_enqueue_script( 'mpx-ajax', get_site_url().'/wp-content/plugins/metal-prices-xmlcharts/includes/js/mpx-ajax.js', array(), '1.0.0', true );
    wp_localize_script('mpx-ajax', 'mpx_ajax_var', array(
         'url' => admin_url('admin-ajax.php'),
         'nonce' => wp_create_nonce('ajax-nonce')
    ));
}
add_action('wp_enqueue_scripts', 'mpx_enqueue_scripts');

// Add action for refreshing table via AJAX

add_action('wp_ajax_refresh_table', 'mpx_refresh_data');
add_action('wp_ajax_nopriv_refresh_table', 'mpx_refresh_data');

// AJAX refresh table function

function mpx_refresh_data() {
    if ( ! wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ) {
        die ( 'Nonce verification failed!');
    }
    include MPX_PATH . '/includes/metal-prices-table.php';
    echo $mpxDisplayTable;
    wp_die();
}


