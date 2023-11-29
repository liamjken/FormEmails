<?php 

function rrd_activate_plugin() {
    if(version_compare(get_bloginfo('version'), '5.9', '<')) {
        wp_die(__('You must update Wordpress to use this plugin', 'udemy-plus'));
    }

    rrd_register_email_form_post_type();
    flush_rewrite_rules();
}