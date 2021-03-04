<?php
/**
 * @file
 * bootstrap-search-form-wrapper.func.php
 */

/**
 * Theme function implementation for bootstrap_search_form_wrapper.
 */
function dataprev_theme_bootstrap_search_form_wrapper($variables) {
  $search_text = 'Buscar'; 
  $output = '<div class="input-group">';
  //added by fabio
  $output .= '<label for="edit-search-block-form--2" ><span class="label-buscar"> '. t('Search'). '</span></label>';
  $output .= $variables['element']['#children'];
  $output .= '<span class="input-group-btn">';
  $output .= '<button type="submit" class="btn btn-default" value="'.$search_text.'">';
  $output .= _bootstrap_icon('search');
  $output .= '<span class="btn-buscar"> '.$search_text.'</span></button>';
  $output .= '</span>';
  $output .= '</div>';
  return $output;
}
