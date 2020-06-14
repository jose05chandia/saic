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
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath='@bower/KAdmin-Dark/';
    public $css = [
        
		'http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700',
        'http://fonts.googleapis.com/css?family=Oswald:400,700,300',
		
        'styles/jquery-ui-1.10.4.custom.min.css',
        'styles/font-awesome.min.css',
        'styles/bootstrap.min.css',
        'styles/animate.css',
        'styles/all.css',
        'styles/main.css',
        'styles/style-responsive.css',
        'styles/zabuto_calendar.min.css',
        'styles/pace.css',
        'styles/jquery.news-ticker.css',
		
        
		
		
    ];
    public $js = [

    
	//'script/jquery-1.10.2.min.js',
    'script/jquery-migrate-1.2.1.min.js',
    'script/jquery-ui.js',
    'script/bootstrap.min.js',
    'script/bootstrap-hover-dropdown.js',
   	'script/html5shiv.js',
    'script/respond.min.js',
    'script/jquery.metisMenu.js',
    'script/jquery.slimscroll.js',
    'script/jquery.cookie.js',
    'script/icheck.min.js',
    'script/custom.min.js',
    'script/jquery.news-ticker.js',
    'script/jquery.menu.js',
   	'script/pace.min.js',
   	'script/holder.js',
   	'script/responsive-tabs.js',
    'script/jquery.flot.js',
   	'script/jquery.flot.categories.js',
    'script/jquery.flot.pie.js',
   	'script/jquery.flot.tooltip.js',
    'script/jquery.flot.resize.js',
    'script/jquery.flot.fillbetween.js',
    'script/jquery.flot.stack.js',
    'script/jquery.flot.spline.js',
    'script/zabuto_calendar.min.js',
    //'script/index.js',
    'script/highcharts.js',
    'script/data.js',
    'script/drilldown.js',
    'script/exporting.js',
    'script/highcharts-more.js',
    'script/charts-highchart-pie.js',
    'script/charts-highchart-more.js',
    'script/main.js',
		
		
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
