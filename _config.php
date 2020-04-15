<?php

//  wp disable      error_handler()
define('YII_ENABLE_ERROR_HANDLER', false);

if (!defined('WP_YII2_PATH_EXT'))
{
    define('WP_YII2_PATH_EXT', ABSPATH . '/../yii2-basic/site/extension/yii2-wp/');
}

if (!defined('WP_YII2_PATH_SITE'))
{
    define('WP_YII2_PATH_SITE', ABSPATH . '/../yii2-basic/site/');

}

if (!defined('WP_YII2_PATH_CONFIG'))
{
    define('WP_YII2_PATH_CONFIG', ABSPATH . '/../yii2-basic/site/');

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