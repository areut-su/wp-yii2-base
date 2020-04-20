<?php

use areutWPYii2\WpYii2;

add_shortcode('WP_YII2_TEST', 'wp_yii2_test');

/**
 * @param array $atr
 */
function wp_yii2_test($atr)
{

    $out = '';
    if (!class_exists('areutWPYii2\WpYii2'))
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

        try
        {
            $out .= Yii::$app->runAction('site/test');
        }
        catch (Exception $e)
        {
            WpYii2::error($e);
        }
    }


    return $out;
}