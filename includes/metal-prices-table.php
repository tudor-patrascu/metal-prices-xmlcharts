<?php

include MPX_PATH . '/includes/array-construction.php';

// Retrieve "Display time of last refresh" from Carbon Fields options

$mpxShowTime = carbon_get_theme_option( 'crb_show_time' );

// Retrieve "Display flags" from Carbon Fields options

$mpxShowFlags = carbon_get_theme_option( 'crb_flags' );

// Build table using prepared arrays in array-construction.php and other options

function mpxBuildTable($currencies, $metals, $weights, $time, $flags, $symbols) {
  // +++ DESKTOP TABLE +++
  $table = '<div id="mpx-container">
              <table class="mpx-table maintable">
                <tbody>
                  <tr>
                    <th class="placeholder-cell"></th>';
  // Loop through metals array to create heading cells for each metal
  foreach($metals as $metalKey => $metal) {
    $table .= '     <th class="head-cell-'.$metalKey.'" colspan="3">'. __($metalKey,'metal-prices-xmlcharts').'</th>';
  }
  $table .= '     </tr>
                  <tr>
                    <th class="sell-buy-col"></th>';
  // Loop through metals array to create Sell/Buy/Market cells for each metal
  foreach($metals as $metalKey => $metal) {
    $table .= '     <th class="'.$metalKey.'-sell-buy-col">'.__('Sell','metal-prices-xmlcharts').'</th>
                    <th class="'.$metalKey.'-sell-buy-col">'.__('Buy','metal-prices-xmlcharts').'</th>
                    <th class="'.$metalKey.'-sell-buy-col last">'.__('Market','metal-prices-xmlcharts').'</th>';
  }
  $table .= '     </tr>';
  // Loop through currencies array to generate a row for each currency
  foreach ($currencies as $currencyKey => $currency) {
    // Loop through weights array to generate "Per weight" cells
    foreach ($weights as $weightKey => $weight) {
      $table.= '  <tr class="'.$weightKey.'-row">
                    <th class="per-weight">
                      <span class="pr-un">'.__(' per ' . $weightKey,'metal-prices-xmlcharts').'</span>
                    </th>';
      // Loop through metals array to generate selling, buying and market prices              
      foreach ($metals as $metalKey => $metal) {
        // Cells to create if "Display Flags" option is checked
        if ($flags == true) {
          $table .= '
                    <td class="sel '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey]*$metals[$metalKey][$weightKey][0],2,'.',',').'
                      <span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' <img src="'. get_site_url(). '/wp-content/plugins/metal-prices-xmlcharts/assets/flag'.$currencyKey.'.png" class="flagimg"></span>
                    </td>
                    <td class="buy '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey]*$metals[$metalKey][$weightKey][1],2,'.',',').'
                      <span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' <img src="'. get_site_url().'/wp-content/plugins/metal-prices-xmlcharts/assets/flag'.$currencyKey.'.png" class="flagimg"></span>
                    </td>
                    <td class="mrk '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey],2,'.',',').'
                      <span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' <img src="'. get_site_url().'/wp-content/plugins/metal-prices-xmlcharts/assets/flag'.$currencyKey.'.png" class="flagimg"></span>
                    </td>
          ';
        } else {
          // Cells to create if "Display Flags" option is not checked
          $table .= '
                    <td class="sel '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey]*$metals[$metalKey][$weightKey][0],2,'.',',').'
                      <span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' </span>
                    </td>
                    <td class="buy '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey]*$metals[$metalKey][$weightKey][1],2,'.',',').'
                      <span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' </span>
                    </td>
                    <td class="mrk '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey],2,'.',',').'
                      <span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' </span>
                    </td>
          ';
        }
      }
      $table .= '  </tr>';
    }
  // Add spacer row between each currency
    $table .= '    <tr class="spacerrow"></tr>';
  }
  // Close desktop table
  $table .= '    </tbody>
              </table>';

  // +++ MOBILE TABLES +++
  // Loop through metals array to create mobile tables for each metal
  foreach($metals as $metalKey => $metal) {
    $table .= '
              <table class="mpx-table mpx-mobile .'.$metalKey.'">
                <tbody>
                  <tr>
                    <th class="placeholder-cell"></th><th class="head-cell-'.$metalKey.'" colspan="3">'. __($metalKey,'metal-prices-xmlcharts').'</th>
                  </tr>
                  <tr>
                    <th class="sell-buy-col"></th>
                    <th class="'.$metalKey.'-sell-buy-col">'.__('Sell','metal-prices-xmlcharts').'</th>
                    <th class="'.$metalKey.'-sell-buy-col">'.__('Buy','metal-prices-xmlcharts').'</th>
                    <th class="'.$metalKey.'-sell-buy-col last">'.__('Market','metal-prices-xmlcharts').'</th>
                  </tr>
    ';              
    // Loop through currencies array to generate a row for each currency           
    foreach ($currencies as $currencyKey => $currency) {
      // Loop through weights array to generate "Per weight" cells
      foreach ($weights as $weightKey => $weight) {
        $table.= '<tr class="'.$weightKey.'-row">
                    <th class="per-weight"><span class="pr-un">'.__(' per ' . $weightKey,'metal-prices-xmlcharts').'</span></th>';
        if ($flags == true) {
          // Cells to create if "Display Flags" option is checked
          $table .= '
                    <td class="sel '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey]*$metals[$metalKey][$weightKey][0],2,'.',',').'<span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' <img src="'. get_site_url(). '/wp-content/plugins/metal-prices-xmlcharts/assets/flag'.$currencyKey.'.png" class="flagimg"></span></td>
                    <td class="buy '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey]*$metals[$metalKey][$weightKey][1],2,'.',',').'<span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' <img src="'. get_site_url().'/wp-content/plugins/metal-prices-xmlcharts/assets/flag'.$currencyKey.'.png" class="flagimg"></span></td>
                    <td class="mrk '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey],2,'.',',').'<span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' <img src="'. get_site_url().'/wp-content/plugins/metal-prices-xmlcharts/assets/flag'.$currencyKey.'.png" class="flagimg"></span></td>
          ';
        } else {
          // Cells to create if "Display Flags" option is not checked
          $table .= '
                    <td class="sel '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey]*$metals[$metalKey][$weightKey][0],2,'.',',').'<span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' </span></td>
                    <td class="buy '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey]*$metals[$metalKey][$weightKey][1],2,'.',',').'<span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' </span></td>
                    <td class="mrk '. $metalKey .'-cell '. $currencyKey .'-cell '. $weightKey .'-cell">'.number_format((float) $currencies[$currencyKey][$metalKey]*$weights[$weightKey],2,'.',',').'<span class="pr-un">'. $symbols[$currencyKey] .' '. strtoupper($currencyKey).' </span></td>
          ';
        }
      $table .= ' </tr>';
      }
  // Add spacer row between each currency
      $table .= ' <tr class="spacerrow"></tr>';
    }
  // Close each mobile table  
    $table .= ' </tbody>
              </table>';
  }
  // Display time of last refresh if option is checked
  if ($time == true) {
    $table .= '<span class="timedate">Last refreshed at: ' . current_time('Y-m-d H:i:s').'</span>';
  }
  $table .= '</div>';

  return $table;
}

// Generate table and store it to variable

$mpxDisplayTable = mpxBuildTable($mpxPreparedCurrencies, $mpxPreparedMetals, $mpxPreparedWeights, $mpxShowTime, $mpxShowFlags, $mpxSymbols);
