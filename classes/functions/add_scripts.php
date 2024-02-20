<?php

if (!defined('ABSPATH')) {
    die;
}
        // register scripts/styles
        wp_register_style( 'woocommerce-dropbox', WCDB_URL . 'assets/css/woocommerce-dropbox.css', false, WCDB_VERSION );
        wp_register_script( 'woocommerce-dropbox', WCDB_URL . 'assets/js/woocommerce-dropbox.js', array( 'jquery', 'underscore' ), WCDB_VERSION );

        // enqueue scripts/styles
        wp_enqueue_style( 'woocommerce-dropbox' );
        wp_enqueue_script( 'woocommerce-dropbox' );

        // register translations
        $translation_array = array(
            'choose_from_dropbox' => __( 'Choose from Dropbox', 'woocommerce-dropbox' )
        );
        wp_localize_script( 'woocommerce-dropbox', 'woocommerce_dropbox_translation', $translation_array );