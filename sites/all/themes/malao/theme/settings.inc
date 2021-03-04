<?php
/**
 * @file
 * settings.inc
 */

/**
 * Contains the form for the theme settings.
 *
 * @param array $form
 *   The form array, passed by reference.
 * @param array $form_state
 *   The form state array, passed by reference.
 */
function _malao_settings_form(&$form, $form_state) {
  // Do not add malao specific settings to non-bootstrap based themes.
  $theme = !empty($form_state['build_info']['args'][0]) ? $form_state['build_info']['args'][0] : FALSE;

  // Global settings.
  if ($theme === FALSE) {
    return;
  }
  // Other theme settings.
  elseif ($theme !== 'bootstrap') {

    $base_theme = bootstrap_get_theme_info($theme, 'base theme');
    if (!$base_theme || (!is_array($base_theme) && $base_theme !== 'bootstrap') || (is_array($base_theme) && !in_array('bootstrap', $base_theme))) {
      return;
    }
  }
  
  // Wrap global setting fieldsets in vertical tabs.
  //$form['general'] = array(
  //  '#type' => 'vertical_tabs',
  //  '#prefix' => '<h2><small>' . t('Override Global Settings') . '</small></h2>',
  //  '#weight' => -9,
  //);
  //$form['theme_settings']['#group'] = 'general';
  //$form['logo']['#group'] = 'general';
  //$form['favicon']['#group'] = 'general';
  
  // Do not add Bootstrap specific settings to global settings.
  //if (empty($form_state['build_info']['args'][0])) {
  //  unset($form['general']['#prefix']);
  //  return;
  //}

	$admin_images_path = drupal_get_path('theme', 'malao') . '/images/admin/';

  // Specific malao Settings.
    $form['malao'] = array(
    '#type' => 'vertical_tabs',
    '#attached' => array(
      'js'  => array(drupal_get_path('theme', 'malao') . '/js/malao.admin.js'),
    ),
    '#prefix' => '<h2><small>' . t('Malão Settings') . '</small></h2>',
    '#weight' => -50,
  );

  // Color scheme
  $form['color_scheme'] = array(
    '#type' => 'fieldset',
    '#title' => t('Color scheme'),
    '#group' => 'malao',
  );
  $form['color_scheme']['malao_color_scheme'] = array(
    '#type' => 'radios',
    '#title' => t('Select a color scheme'),
    '#default_value' => theme_get_setting('malao_color_scheme'),
    '#options' => array(
      'yellow' => t('Yellow') . '<br />' . theme('image', array('path' => $admin_images_path . 'color-scheme-yellow.png')),
      'green' => t('Green') . '<br />' . theme('image', array('path' => $admin_images_path . 'color-scheme-green.png')),
      'blue' => t('Blue') . '<br />' .  theme('image', array('path' => $admin_images_path . 'color-scheme-blue.png')),
      'white' => t('White') . '<br />' . theme('image', array('path' => $admin_images_path . 'color-scheme-white.png')),
    ),
    '#required' => TRUE,
  );

}
