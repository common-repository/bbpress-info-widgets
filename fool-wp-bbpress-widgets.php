<?php

namespace MotleyFool\BbpressWidgets;

/**
 * @package   fool-bbpress-widgets
 * @author    The Motley Fool - Global Tech <globaltechteam@fool.com>
 * @license   GPL-2.0+
 * @link      http://fool.com
 * @copyright 2014 The Motley Fool
 *
 * @wordpress-plugin
 * Plugin Name:       bbPress Info Widgets
 * Plugin URI:        https://wordpress.org/plugins/bbpress-info-widgets/
 * Description:       Three widgets to display info about your bbPress forums, recent topics, and topic user is viewing.
 * Version:           1.0.1
 * Author:            The Motley Fool
 * Author URI:        www.fool.com
 * Text Domain:       fool-wp-bbpress-widgets
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /
 */

spl_autoload_register(__NAMESPACE__ ."\autoload");
function autoload($cls)
{
    $cls = ltrim($cls, '\\');
    if(strpos($cls, __NAMESPACE__) !== 0)
        return;

    $cls = str_replace(__NAMESPACE__, '', $cls);

    $path = plugin_dir_path(__FILE__) . 'FoolWidgets/' .
        str_replace('\\', DIRECTORY_SEPARATOR, $cls) . '.php';

    require_once($path);
}

// Register our widgets
add_action( 'widgets_init', function(){
    register_widget( 'MotleyFool\BbpressWidgets\BBPressTopicsWidget' );
    register_widget( 'MotleyFool\BbpressWidgets\BBPressForumWidget' );
    register_widget( 'MotleyFool\BbpressWidgets\BBPressTopicInfoWidget' );
});