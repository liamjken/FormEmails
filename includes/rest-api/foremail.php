<?php 

function rrd_rest_aip_email_form(WP_REST_Request $request) {
    // test to fix git update
    $form_data = $request->get_params();


    $title = $form_data['name'];
    $phone = $form_data['phone'];
    $email = $form_data['email'];
    $reason = $form_data['ServiceReq'];
    $desc = $form_data['desc'];

    $formContent = "
    <b>name:</b> $title 
    <b>email:</b> $email
    <b>phone:</b> $phone
    <b>Services Required:</b> $reason
    <b>Description:</b> $desc";

    // Store the form data in the database
    $post_id = wp_insert_post(array(
        'post_type' => 'emails',
        'post_status' => 'publish',
        'post_title' => $title,
        'post_content' => $formContent, // Set the form data as post content
    ));

    $services_required = isset($reason) ? $reason : '';
    wp_set_post_terms($post_id, $services_required, 'services-required');

    $from_phone = isset($phone) ? $phone : '';
    wp_set_post_terms($post_id, $from_phone, 'from-Phone');

    $from_email = isset($email) ? $email : '';
    wp_set_post_terms($post_id, $from_email, 'from-Email');

    // Return the ID of the created post
    return $post_id;
}