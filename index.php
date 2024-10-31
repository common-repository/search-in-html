<?php
/*
	* Plugin Name: Search in HTML
	* Plugin URL: https://www.diletec.com.br
	* Description: Procura uma palavra na página estática
	* Version: 0.9.2
	* Author: Daniel Souza - Diletec
	* Author URI: https://www.diletec.com.br
	*
*/

class SearchHtmlMenu{
 
    public function ativar(){
 	  	add_option('SearchHtml', '');
    }
    public function desativar(){
     	delete_option('SearchHtml');
    }
    public function criarMenu(){
        add_menu_page('SearchHtml', 'Search Html',10, 'search-in-html/includes/config.php');
    }
 
}
 
$pathPlugin = substr(strrchr(dirname(__FILE__),DIRECTORY_SEPARATOR),1).DIRECTORY_SEPARATOR.basename(__FILE__);
// Função ativar
register_activation_hook( $pathPlugin, array('SearchHtmlMenu','ativar'));
// Função desativar
register_deactivation_hook( $pathPlugin, array('SearchHtmlMenu','desativar'));
//Ação de criar menu
add_action('admin_menu', array('SearchHtmlMenu','criarMenu'));

if (!defined('SEARCHSH'))
    define('SEARCHSH', trim(dirname(plugin_basename(__FILE__)), '/'));

if (!defined('SEARCHSH_PLUGIN_URL'))
    define('SEARCHSH_PLUGIN_URL', WP_PLUGIN_URL . '/' . SEARCHSH);

$dir = dirname(__FILE__);
wp_enqueue_style( 'search-html', SEARCHSH_PLUGIN_URL . '/shStyle.css', '', '1.1', 'screen');


wp_enqueue_script('jquery');
wp_enqueue_script('core');

wp_register_script( 'shfil', SEARCHSH_PLUGIN_URL . '/search-fil.js', '', '1.1');
wp_enqueue_script( 'shfil' );
wp_register_script( 'mk', SEARCHSH_PLUGIN_URL . '/mk.js', '', '7.0');
wp_enqueue_script( 'mk' );

function shortSH(){
	echo '<input type="text" value="" class="sh">';
}
shortSH();
add_shortcode("shortSH", shortSH);