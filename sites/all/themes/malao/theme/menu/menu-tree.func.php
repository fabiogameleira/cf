<?php
/**
 * @file
 * menu-tree.func.php
 */

/**
 * Bootstrap theme wrapper function for the secondary menu links.
 */
function malao_menu_tree__secondary(&$variables) {
    return '<ul class="menu secondary">' . $variables['tree'] . '</ul>';
}

// Menu malao
// Classe necessária para o tema Paper
// .navbar-nav
function malao_menu_tree__main_menu($variables) {
    return '<ul class="menu nav navbar-nav">' . $variables['tree'] . '</ul>';
}


// Menu dataprev Contato
// Classe necessária para o tema Paper
// .nav-pills
function malao_menu_tree__menu_contato($variables) {
    return '<ul class="menu nav nav-pills">' . $variables['tree'] . '</ul>';
}