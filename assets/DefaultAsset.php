<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DefaultAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style-list-prod.css',
        'css/font-awesome.min.css',
//        'https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',
        'css/fresco.css',
        'css/tcal.css',
        
    ];
    public $js = [
//        'jquery.cookie.js',
//        'jquery.accordion.js',
        'js/fresco.js',
        'js/tcal.js',
        'js/scripts.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
