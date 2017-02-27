<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://junjunvergara-manpowwa.com
 * @since      1.0.0
 *
 * @package    Whaa
 * @subpackage Whaa/admin/partials
 */
?>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form method="post" name="recruit_options" action="options.php">
        <?php 
            $options = get_option($this->plugin_name);
            print_r($options);
        ?>
        <?php
            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);
        ?>

        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">Name of Applicant</th>
                    <td><input class="regular-text" type="text" id="<?php echo $this->plugin_name; ?>-applicant_name" name="<?php echo $this->plugin_name; ?> [applicant_name]" /></td>
                </tr>
                <tr>
                    <th scope="row">Name of Illegal Recruiter</th>
                    <td><input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-recruiter_name" name="<?php echo $this->plugin_name; ?> [recruiter_name]" ></td>
                </tr>
                <tr>
                    <th scope="row">Date Applied</th>
                    <td><input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-date_applied" name="<?php echo $this->plugin_name; ?> [date_applied]" ></td>
                </tr>
            </tbody>
        </table>
        <?php submit_button(); ?>
    </form>
</div>