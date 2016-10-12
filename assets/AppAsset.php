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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
		'css/font.awesome.min.css',
		'css/ionicons.min.css',
		'css/AdminLTE.min.css',
		'css/_all.skins.min.css',
		'css/blue.css',
		'css/morris.css',
		'css/jquery-jvectormap-1.2.2.css',
		'css/datepicker3.css',
		'css/blue.css',
		'css/daterangepicker.bs3.css',
		'css/bootstrap3-wysihtml5.min.css',
    ];
    public $js = [
		'js/raphael.min.js',
		'js/morris.min.js',
		'js/jquery.sparkline.min.js',
		'js/jquery.knob.js',
		'js/moment.min.js',
		'js/daterangepicker.js',
		'js/bootstrap-datepicker.js',
		'js/bootstrap3-wysihtml5.all.min.js',
		'js/jquery.slimscroll.min.js',
		'js/raphael.min.js',
		'js/fastclick.min.js',
		'js/app.min.js',
		'js/dashboard.js',
		'js/demo.js',
		'js/jquery-ui.min.js',
		
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
