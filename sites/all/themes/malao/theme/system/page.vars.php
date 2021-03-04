<?php
/**
 * @file
 * page.vars.php
 */

/**
 * Implements hook_preprocess_page().
 *
 * @see page.tpl.php
 */
 
 
function malao_preprocess_page(&$variables){

  // Search box.
  if (module_exists('search')) {
    $search_form = drupal_get_form('search_form');
    $search_box = drupal_render($search_form);
    $variables['search_box'] = $search_box;
  }

  // Set color scheme.
  _malao_set_color_scheme(theme_get_setting('malao_color_scheme'));

  if (isset($variables['node'])) {
  $node = $variables['node'];

	switch ($node->type) {
		case 'filiado': 
			$variables['title'] = 'Filiado';
			break;
		case 'acoes':			
			$variables['title'] = 'Ação';
			break;
		case 'assembleia':			
			$variables['title'] = 'Assembleia';
			break;			
		default:	

		break;
			
	}
  }
}

/**
 * Function to add the style of the selected color scheme.
 */
function _malao_set_color_scheme($color_scheme) {
  $scheme_path = drupal_get_path('theme', 'malao') . '/css/color_scheme/' . $color_scheme . '/styles.css';

  drupal_add_css($scheme_path, 'theme');
}
