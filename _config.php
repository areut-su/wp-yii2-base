<?php

//  wp disable      error_handler()
if (!defined('YII_ENABLE_ERROR_HANDLER'))
{
    define('YII_ENABLE_ERROR_HANDLER', false);
}


if (!defined('WP_YII2_PATH'))
{
    define('WP_YII2_PATH', ABSPATH . '../yii2-basic/');
}

if (!defined('WP_YII2_FILE_CONFIG'))
{
    define('WP_YII2_FILE_CONFIG', WP_YII2_PATH . 'config/wp.php');
//    define('WP_YII2_FILE_CONFIG', WP_YII2_PATH . 'site/config/wp.php');
}

if (!defined('WP_YII2_PATH_VENDOR'))
{
    define('WP_YII2_PATH_VENDOR', WP_YII2_PATH . 'vendor/');

}

if (!defined('WP_YII2_PATH_EXT'))
{
    define('WP_YII2_PATH_EXT', WP_YII2_PATH . 'areut/yii2-wp/');
//    define('WP_YII2_PATH_EXT', WP_YII2_PATH . 'site/extension/yii2-wp/');
}


if (
    defined('WP_DEBUG') && WP_DEBUG === true
    && defined('WP_DEBUG_DISPLAY')
    && WP_DEBUG_DISPLAY === true
    && !defined('YII_ENV_DEV')
)
{
    define('YII_ENV_DEV', true);

}