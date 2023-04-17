<?php

// Retrieve "Add refresh button" option from Carbon Fields options

$mpxRefreshButton = carbon_get_theme_option( 'crb_refresh_button' );

// Check if option is set and create variable that contains button

$mpxButtonDisplay = '';

if ($mpxRefreshButton == true) {
    $mpxButtonDisplay = '<button id="mpx-table-refresh">Refresh</button>';
} 