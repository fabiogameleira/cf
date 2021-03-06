<?php
/**
 * @file
 * menu-link.func.php
 */

/**
 * Overrides theme_menu_link().
 */
function malao_menu_link(array $variables) {

    $element = $variables['element'];
    $sub_menu = '';

    $title = $element['#title'];

    if ($element['#below']) {

        // Prevent dropdown functions from being added to management menu so it
        // does not affect the navbar module.
        if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
            $sub_menu = drupal_render($element['#below']);
        }
        elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] >= 1)) {

            // Add our own wrapper.
            unset($element['#below']['#theme_wrappers']);
            $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
            
            // Generate as standard dropdown.
            $element['#attributes']['class'][] = 'dropdown';
            $element['#localized_options']['html'] = TRUE;

            if ($element['#theme'] == 'menu_link__menu_menu') {
                // Menu malao
                // Para mostrar o "ícone de setinha" nos itens pais que possuem subitens
                $caret = '<span class="caret"></span>';
                $title = $element['#title'] . ' ' . $caret;
            }
			
			if ($element['#theme'] == 'menu_link__menu_principal') {
                // Menu principal
                // Para mostrar o "ícone de setinha" nos itens pais que possuem subitens
                $caret = '<span class="caret"></span>';
                $title = $element['#title'] . ' ' . $caret;
            }
        }
    }

    $output = l($title, $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}