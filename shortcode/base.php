<?php

use areutWPYii2\WpYii2;

add_shortcode('WP_YII2', 'wp_yii2_base');

/**
 * @param array $atr
 */
function wp_yii2_base($atr)
{

    $out = '';
    if (class_exists('areutWPYii2\WpYii2') && class_exists('Yii'))
    {
        $action = (is_array($atr) && isset($atr['action'])) ? $atr['action'] : 'site/about';
        try
        {
            $out = Yii::$app->runAction($action);
        }
        catch (Exception $e)
        {
            WpYii2::error($e);
        }

    }


    return $out;
}