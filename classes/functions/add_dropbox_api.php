<?php

if (!defined('ABSPATH')) {
    die;
}
         echo '<script type="text/javascript" src="' . WCDB_URL . 'assets/js/dropins.js" id="dropboxjs" data-app-key="' . esc_attr( $this->api_key ) . '"></script>';