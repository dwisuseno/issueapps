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

        // 'css/site.css',

        // 'css/custom.css',

    ];

    public $js = [
        // 'js/ajax-modal-popup.js',


        'js/main.js',

        'https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js',

        // 'assets/2bc509a6/js/bootstrap.js',

        // 'js/exporting.js',

        // 'js/sb-admin-2.js',

        // 'dist/css/bootstrap.min.css',
        // 'dist/css/font-awesome.min.css',
        // 'dist/js/sidenav.js',
        'dist/js/adminlte.js'

    ];

    public $depends = [

        'yii\web\YiiAsset',

        'yii\bootstrap\BootstrapAsset',

    ];





}

