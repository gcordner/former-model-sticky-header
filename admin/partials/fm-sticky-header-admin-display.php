<?php
/**
 * Provide a admin area view for the plugin
 *
 * @link       https://former-model.com
 * @since      1.0.0
 *
 * @package    Fm_Sticky_Header
 * @subpackage Fm_Sticky_Header/admin/partials
 */
?>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <form method="post" action="options.php">
        <?php
            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);
            submit_button('Save Settings');
        ?>
    </form>
</div>