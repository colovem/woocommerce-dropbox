<?php

if (!defined('ABSPATH')) {
die; 
}

if (!function_exists('add_filter')) {
header('Status: 403 Forbidden');
header('HTTP/1.1 403 Forbidden');
die;
}
   /**
    * Class WC_Dropbox_Integration
    */
    class WC_Dropbox_Integration extends WC_Integration {

     /**
      * This is the class constructor
      */
     public function __construct() {
         require_once('functions/construct.php');
     }

     /**
      * Initialize integration settings form fields.
      */
     public function init_form_fields() {
         require_once('functions/init_form_fields.php');
     }

     /**
      * Add dropins.js script to the <head> of admin page
      * Needs to be done this way because wp_register_script
      * does not allow data-attributes or ID.
      */
     public function add_dropbox_api_js() {
         require_once('functions/add_dropbox_api.php');
     }

     /**
      * Load the Dropbox API and our own script
      */
     public function add_scripts() {
         require_once('functions/add_scripts.php');
    }
}
