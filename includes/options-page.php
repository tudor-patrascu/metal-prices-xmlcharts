<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', 'load_carbon_fields');
add_action('carbon_fields_register_fields', 'create_options_page');

function load_carbon_fields()
{
    \Carbon_Fields\Carbon_Fields::boot();
}

function create_options_page()
{
    Container::make( 'theme_options', __( 'Metal Prices', 'metal-prices-xmlcharts' ) )
    ->set_icon('dashicons-grid-view')
    ->add_fields( array(

            Field::make( 'separator', 'crb_separator_metals_weights', __( 'Metals & Weights Setup', 'metal-prices-xmlcharts' ) ),
            Field::make( 'set', 'crb_selected_metals', __( 'Precious metals to display', 'metal-prices-xmlcharts' ) )
            ->add_options( array(
                'gold' => __('Gold', 'metal-prices-xmlcharts' ),
                'silver' => __('Silver', 'metal-prices-xmlcharts' ),
                'platinum' => __('Platinum', 'metal-prices-xmlcharts' ),
                'palladium' => __('Palladium', 'metal-prices-xmlcharts' )
            ) )
            ->set_default_value( array('gold', 'silver', 'platinum', 'palladium') )
            ->set_help_text( __('Select which precious metals to display on the table.', 'metal-prices-xmlcharts') )
            ->set_required( true )
            ,
            Field::make( 'set', 'crb_selected_weights', __( 'Show prices in', 'metal-prices-xmlcharts' ) )
            ->add_options( array(
                'oz' => __('ounces', 'metal-prices-xmlcharts' ),
                'kg' => __('kilograms', 'metal-prices-xmlcharts' )
            ) )
            ->set_help_text( __('Select which weights to display on the table.', 'metal-prices-xmlcharts') )
            ->set_default_value( 'kg' )
            ->set_required( true )
            ,
            Field::make( 'separator', 'crb_separator_price_modifiers', __( 'Price Modifiers Setup', 'metal-prices-xmlcharts' ) )
            ,
            Field::make( 'text', 'crb_gold_oz_buy', __( 'Gold Ounce Buying Percentage' ) )
            ->set_default_value( '97.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Buying price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'gold', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'oz', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_gold_oz_sell', __( 'Gold Ounce Selling Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '103.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Selling price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'gold', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'oz', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_gold_kg_buy', __( 'Gold Kg Buying Percentage' ) )
            ->set_default_value( '97.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Buying price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'gold', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'kg', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_gold_kg_sell', __( 'Gold Kg Selling Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '103.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Selling price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'gold', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'kg', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_silver_oz_buy', __( 'Silver Ounce Buying Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '97.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Buying price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'silver', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'oz', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_silver_oz_sell', __( 'Silver Ounce Selling Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '103.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Selling price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'silver', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'oz', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_silver_kg_buy', __( 'Silver Kg Buying Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '97.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Buying price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'silver', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'kg', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_silver_kg_sell', __( 'Silver Kg Selling Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '103.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Selling price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'silver', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'kg', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_platinum_oz_buy', __( 'Platinum Ounce Buying Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '97.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Buying price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'platinum', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'oz', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_platinum_oz_sell', __( 'Platinum Ounce Selling Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '103.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Selling price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'platinum', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'oz', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_platinum_kg_buy', __( 'Platinum Kg Buying Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '97.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Buying price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'platinum', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'kg', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_platinum_kg_sell', __( 'Platinum Kg Selling Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '103.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Selling price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'platinum', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'kg', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_palladium_oz_buy', __( 'Palladium Ounce Buying Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '97.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Buying price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'palladium', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'oz', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_palladium_oz_sell', __( 'Palladium Ounce Selling Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '103.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Selling price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'palladium', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'oz', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_palladium_kg_buy', __( 'Palladium Kg Buying Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '97.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Buying price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'palladium', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'kg', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'text', 'crb_palladium_kg_sell', __( 'Palladium Kg Selling Percentage', 'metal-prices-xmlcharts' ) )
            ->set_default_value( '103.5' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '0' )
            ->set_attribute( 'max', '500' )
            ->set_attribute( 'step', '0.01' )
            ->set_help_text( __('Selling price as a percentage compared to market prices. (0%-500%)', 'metal-prices-xmlcharts') )
            ->set_width( 50 )
            ->set_conditional_logic( array(
                'relation' => 'AND',
                array(
                    'field' => 'crb_selected_metals',
                    'value' => 'palladium', 
                    'compare' => 'INCLUDES'
                    ),
                array(
                    'field' => 'crb_selected_weights',
                    'value' => 'kg', 
                    'compare' => 'INCLUDES'
                    )
                )
            )
            ->set_required( true )
            ,
            Field::make( 'separator', 'crb_separator_currency', __( 'Currencies Setup', 'metal-prices-xmlcharts' ) ),
            Field::make( 'set', 'crb_selected_currencies', __( 'Selected Currencies', 'metal-prices-xmlcharts' ) )
            ->add_options( array(
                'aud' => 'AUD',
                'brl' => 'BRL',
                'cad' => 'CAD',
                'chf' => 'CHF',
                'cny' => 'CNY',
                'eur' => 'EUR',
                'gbp' => 'GBP',
                'inr' => 'INR',
                'jpy' => 'JPY',
                'mxn' => 'MXN',
                'rub' => 'RUB',
                'usd' => 'USD',
                'zar' => 'ZAR',
            ) )
            ->set_default_value( array('usd', 'eur', 'gbp') )
            ,
            Field::make( 'separator', 'crb_separator_other', __( 'Other Options', 'metal-prices-xmlcharts' ) ),
            Field::make( 'checkbox', 'crb_flags', __('Display flags', 'metal-prices-xmlcharts') )
            ->set_option_value( 'yes' )
            ->set_default_value( 'yes' )
            ,
            Field::make( 'checkbox', 'crb_market_prices', __('Display market price', 'metal-prices-xmlcharts') )
            ->set_option_value( 'yes' )
            ->set_default_value( 'yes' )
            ,
            Field::make( 'checkbox', 'crb_refresh_button', __('Add refresh button', 'metal-prices-xmlcharts') )
            ->set_option_value( 'yes' )
            ->set_default_value( 'yes' )
            ,
            Field::make( 'checkbox', 'crb_show_time', __('Display time of last refresh', 'metal-prices-xmlcharts') )
            ->set_option_value( 'yes' )
            ->set_default_value( 'yes' )
            
                
        ) 
    );
}