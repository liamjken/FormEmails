<?php 

function rrd_rest_api_init() {
    register_rest_route('rrd/v1', '/formemail', [
        'methods' => 'POST',
        'callback' => 'rrd_rest_aip_email_form',
        'permission_callback' => '__return_true'
    ]);
}