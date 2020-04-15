<?php
/**
 * Shot code Yii2 for WP
 *
 * @package
 * @link
 * @author    areut
 * @copyright areut
 * @license   GPL v3 or later
 *
 * Plugin Name:  Yii2 for WP
 * Description:
 * Version:      0.0.1
 * Plugin URI:
 * Author:       areut
 * Author URI:
 * Text Domain:
 * Domain Path:
 * Requires PHP: 7.0
 *
 */

use areutWPYii2\WpYii2;

include_once(__DIR__ . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'WpYii2.php');

WpYii2::add_action();

include_once(__DIR__ . DIRECTORY_SEPARATOR . 'shortcode' . DIRECTORY_SEPARATOR . 'test.php');