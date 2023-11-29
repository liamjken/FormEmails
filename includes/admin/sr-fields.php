<?php

function rrd_sr_add_form_fields() {
    ?>
    <div class="form-field">
    <label><?php _e('More info URL', 'formEmails'); ?></label>
    <input type="text" name="rrd_more_info_url"/>
    <p><?php _e('A URL someone can click to learn more information about this', 'formEmails') ?></p>
</div>
    <?php
}