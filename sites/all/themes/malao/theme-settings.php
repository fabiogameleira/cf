<?php
/**
 * @file
 * theme-settings.php
 *
 * Provides theme settings for Bootstrap based themes when admin theme is not.
 *
 * @see theme/settings.inc
 */

/**
 * Include helpers functions.
 */
bootstrap_include('malao', 'theme/helpers.inc');

/**
 * Implements hook_form_FORM_ID_alter().
 */
function malao_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes.
  // @see https://drupal.org/node/943212
  if (isset($form_id)) {
    return;
  }
  // Include theme settings file.
  bootstrap_include('malao', 'theme/settings.inc');
  // Alter theme settings form.
  _malao_settings_form($form, $form_state);
}
