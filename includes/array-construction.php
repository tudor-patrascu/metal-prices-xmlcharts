<?php

// Include cURL import file
include MPX_PATH . '/includes/curl-import.php';

// Store received data
$mpxImportedJsonArray = mpx_import_data();

// Retrieve Selected Currencies array from Carbon Fields options
$mpxSelectedCurrencies = carbon_get_theme_option( 'crb_selected_currencies' );

// Prepare currencies array by filtering array to contain only selected currency data
$mpxPreparedCurrencies = $mpxImportedJsonArray;

$mpxPreparedCurrencies = array_filter($mpxPreparedCurrencies, function($currency) use ($mpxSelectedCurrencies) {
    if (in_array($currency, $mpxSelectedCurrencies)) {
        return true;
    }
}, ARRAY_FILTER_USE_KEY);

// Retrieve Selected Weights array from Carbon Fields options
$mpxSelectedWeights = carbon_get_theme_option( 'crb_selected_weights' );

// Prepare weights array from selected weights
$mpxPreparedWeights = array();

if (in_array('oz', $mpxSelectedWeights)) { 
	$mpxPreparedWeights['oz'] = 31.1034768;
	}
if (in_array('kg', $mpxSelectedWeights)) { 
	$mpxPreparedWeights['kg'] = 1000;
}

// Retrieve Selected Metals array from Carbon Fields options
$mpxSelectedMetals = carbon_get_theme_option( 'crb_selected_metals' );

// Prepare metals array using selected metals and weights structured as [metals][weights][pricemodifiers]
$mpxPreparedMetals = array();

// Create array containing Carbon fields price modifier option names
foreach ($mpxPreparedWeights as $weightKey => $preparedWeight) {
    foreach ($mpxSelectedMetals as $metalKey => $selectedMetal) {
    	$mpxPreparedMetals[$selectedMetal][$weightKey] = array("crb_" . $selectedMetal . "_" . $weightKey . "_sell", "crb_" . $selectedMetal . "_" . $weightKey . "_buy");
    }
}
// Retrieve price modifier values for each currency and weight from Carbon Fields
foreach($mpxSelectedMetals as $key => $selectedMetal) {
    foreach ($mpxPreparedWeights as $weightKey => $preparedWeight) {
        $mpxPreparedMetals[$selectedMetal][$weightKey][0] = carbon_get_theme_option($mpxPreparedMetals[$selectedMetal][$weightKey][0])/100;
        $mpxPreparedMetals[$selectedMetal][$weightKey][1] = carbon_get_theme_option($mpxPreparedMetals[$selectedMetal][$weightKey][1])/100;
    }
}

// Create symbols array
$mpxSymbols = array(
    'aud' => '$',
    'brl' => 'R$', 
    'cad' => '$',
    'chf' => 'F',
    'cny' => '¥',
    'eur' => '€',
    'gbp' => '£',
    'inr' => '₹',
    'jpy' => '¥',
    'mxn' => '$',
    'rub' => '₽',
    'usd' => '$',
    'zar' => 'R'  
);