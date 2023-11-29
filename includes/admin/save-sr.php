<?php 

function rrd_save_cuisine_meta($termID) {
    if(!isset($_POST['rrd_more_info_url'])) {
        return;
    }

   add_term_meta(
        $termID,
        'more_info_url',
        sanitize_url($_POST['rrd_more_info_url'])
);
}