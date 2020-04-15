<?php


namespace areutWPYii2;

use areutYii2Wp\yii\Application;
use Exception;
use WP_User;
use Yii;
use yii\helpers\Html;

class WpYii2
{
    /**
     * @var $app Application
     */

    public static function add_action()
    {
        add_action('init', [static::class, 'init']);
        add_action('init', [static::class, 'sendCookie'], 100);
        add_action('wp_head', [static::class, 'sendHeaders']);
        add_action('wp_print_footer_scripts', [static::class, 'printJSFoter'], 250);
        add_action('wp_login', [static::class, 'login'], 250, 2);
        add_action('wp_logout', [static::class, 'logout'], 250);

    }

    /**
     * @param string  $user_login
     * @param WP_User $user
     */
    public static function login($user_login, $user)
    {
        try
        {
            Yii::$app->user->enableSession = true;
            if ($user instanceof WP_User)
            {
                $classUser = Yii::$app->user->identityClass;
                /* @var $classUser \yii\web\IdentityInterface */

                if ($mUser = $classUser::findIdentity($user->ID))
                {
                    Yii::$app->user->login($mUser, 0);
                    Yii::info("ok. login $user_login  user_id:{$user->ID})");
                }
                else
                {

                    Yii::warning("Err. login $user_login  user_id:{$user->ID})");
                }
            }
            else
            {
                Yii::warning("user not instanse WP_User:" . print_r($user, true));
            }


        }
        catch (Exception $e)
        {
            self::error($e);
        }
        Yii::$app->user->enableSession = false;
    }

    public static function logout()
    {
        try
        {
            Yii::$app->user->enableSession = true;
            Yii::$app->user->logout(true);
            Yii::$app->user->enableSession = false;
        }
        catch (Exception $e)
        {
            self::error($e);
        }
    }

    /**
     * set login cookie
     */
    public static function sendCookie()
    {

        try
        {
            if (get_current_user_id())
            {
                //update Yii auth cookie \Yii::$app->user->renewAuthStatus() срабатывает
                // wp - no login, Yii - login
                if (Yii::$app->user->isGuest && Yii::$app->user->enableAutoLogin)
                {
                    //autologin in yii2
                    self::login(wp_get_current_user()->user_login, wp_get_current_user());

                }
            }
        }
        catch (Exception $e)
        {
            self::error($e);
        }
        // disable send session
        // @todo add cookie
        Yii::$app->user->enableSession = false;

    }

    /**
     *
     */
    public static function sendHeaders()
    {
        class_exists(Html::class);
        echo Html::csrfMetaTags();
    }

    public static function init()
    {


        include_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '_config.php');

        require WP_YII2_PATH_EXT . '/yii/Yii.php';
        $yiiConfig = require WP_YII2_PATH_CONFIG . 'wp.php';


        try
        {
            (new  Application($yiiConfig));
        }
        catch (Exception $e)
        {
            self::error($e);
        }

    }

    public static function printJSFoter()
    {
        //@todo View class update
        //@todo filter clone js jQuery
        ob_start();
        ob_implicit_flush(false);
        Yii::$app->view->endBody();
        Yii::$app->view->endPage(true);
    }

    /**
     * @param Exception $e
     */
    public static function error($e)
    {
        $message = 'code:' . $e->getCode() . '. Mesage:' . $e->getMessage();
        if (defined('YII_ENV_DEV') && YII_ENV_DEV === true)
        {
            echo '<pre>' . $message . '</pre>';
        }
        else
        {
            Yii::error($message);
        }
    }

}