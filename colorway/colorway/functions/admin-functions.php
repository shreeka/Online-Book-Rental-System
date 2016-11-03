<?php
/* ----------------------------------------------------------------------------------- */
/* Admin Backend */
/* ----------------------------------------------------------------------------------- */

function optionsframework_admin_head() {

    //Tweaked the message on theme activate
    ?>
    <script type="text/javascript">
        jQuery(function () {

            var message = '<p><?php _e('This theme comes with an ', 'colorway'); ?><a href="<?php echo admin_url('admin.php?page=optionsframework'); ?>"><?php _e('options panel</a> to configure settings. This theme also supports widgets, please visit the ', 'colorway'); ?><a href="<?php echo admin_url('widgets.php'); ?>"><?php _e('widgets settings page</a> to configure them.', 'colorway'); ?></p>';
            jQuery('.themes-php #message2').html(message);

        });
    </script>
    <?php
}

add_action('admin_head', 'optionsframework_admin_head');
?>
