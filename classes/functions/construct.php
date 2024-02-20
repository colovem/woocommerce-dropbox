<?php

if (!defined('ABSPATH')) {
    die;
}
    $this->id                 = 'woocommerce-dropbox';
    $this->method_title       = __( 'WooCommerce Dropbox', 'woocommerce-dropbox' );
    $this->method_description = __( 'Easily add downloadable products right from your Dropbox folder. Before you can start using our plugin, you will need to make a Dropbox app.<br>Don\'t worry, it sounds more difficult than it actually is. Please carefully read <a href="http://wordpress.org/plugins/woocommerce-dropbox/installation/" target="_blank">these instructions</a>.', 'woocommerce-dropbox' );

    // Load the settings.
    $this->init_form_fields();
    $this->init_settings();

    // Define user set variables.
    $this->api_key            = $this->get_option( 'api_key' );

    // Actions
    add_action( 'woocommerce_update_options_integration_' . $this->id, array( $this, 'process_admin_options' ) );

    // Load custom scripts in the admin area
    if($this->api_key && is_admin()) {
        add_action( 'admin_head', array( $this, 'add_dropbox_api_js' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'add_scripts' ) );
    }
