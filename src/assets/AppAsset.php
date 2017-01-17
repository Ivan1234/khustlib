<?php

namespace app\assets;

/*
 * @link http://www.yiiframework.com/
 *
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

use yii\helpers\FileHelper;
use yii\web\AssetBundle;

/**
 * Configuration for `backend` client script files.
 *
 * @since 4.0
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/web';

    public $js = [
        'js/waypoint.js',
        'js/jquery.counterup.js',
        'js/owl.carousel.js',
        'js/app.js',
    ];

    public $css = [
        // Note: less files require a compiler (available by default on Phundament Docker images)
        // use .css alternatively
        #'less/app.less',
        'css/owl/owl.carousel.css',
        'css/style.css',
        "https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic-ext",
        "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css",
        "https://fonts.googleapis.com/css?family=Cormorant+Infant:300,300i,400,400i,700,700i",
        "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        // if we recompile the less files from 'yii\bootstrap\BootstrapAsset' and include the css in app.css
        // we need set bundle to `false` in application config and remove the following line
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();

        // /!\ CSS/LESS development only setting /!\
        // Touch the asset folder with the highest mtime of all contained files
        // This will create a new folder in web/assets for every change and request
        // made to the app assets.
        if (getenv('APP_ASSET_FORCE_PUBLISH')) {
            $path = \Yii::getAlias($this->sourcePath);
            $files = FileHelper::findFiles($path);
            $mtimes = [];
            foreach ($files as $file) {
                $mtimes[] = filemtime($file);
            }
            touch($path, max($mtimes));
        }
    }
}
