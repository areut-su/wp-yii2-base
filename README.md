Plugins WP Yii2 use in WP
===========


Installation
------------
define in wp-config

    define('WP_YII2_PATH_EXT', ABSPATH . '/../yii2-basic/....../yii2-wp/');
    define('WP_YII2_PATH_SITE', ABSPATH . '/../yii2-basic/site/');
    define('WP_YII2_PATH_CONFIG', WP_YII2_PATH_SITE . 'config/');

    see \wp-yii2-base\_config.php
                
Usage
--------------
    WP
      see: wp-yii2-base\shortcode\test.php
      
      
    Yii2: 
     public function actionAbout()
         {
             if (defined('ABSPATH'))
             {
                 return $this->renderPartial('about');
             }
     
             return $this->render('about');
      }






