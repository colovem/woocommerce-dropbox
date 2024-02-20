<?php

if (!defined('ABSPATH')) {
    die;
}
                $this->form_fields = array(
            'api_key' => array(
                'title'             => __( 'App key', 'woocommerce-dropbox' ),
                'type'              => 'text',
                'description'       => __( 'Please read <a href="http://wordpress.org/plugins/woocommerce-dropbox/installation/" target="_blank">these instructions</a> in order to obtain your app key.', 'woocommerce-dropbox' ),
                'desc_tip'          => false,
                'default'           => '',
                'placeholder'       => __( 'App key', 'woocommerce-dropbox' )
            )
        );