<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        // 'adminLte/fontawesome-free/css/all.min.css',
        // 'adminLte/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        // 'adminLte/icheck-bootstrap/icheck-bootstrap.min.css',
        // 'adminLte/jqvmap/jqvmap.min.css',
        // 'adminLte/dist/css/adminlte.min.css',
        // 'adminLte/overlayScrollbars/css/OverlayScrollbars.min.css',
        // 'adminLte/summernote/summernote-bs4.min.css',
        // 'adminLte/daterangepicker/daterangepicker.css',
    ];
    public $js = [
        // 'adminLte/bootstrap/js/bootstrap.bundle.min.js',
        // 'adminLte/chart.js/Chart.min.js',
        // 'adminLte/sparklines/sparkline.js',
        // 'adminLte/jqvmap/jquery.vmap.min.js',
        // 'adminLte/jqvmap/maps/jquery.vmap.usa.js',
        // 'adminLte/jquery-knob/jquery.knob.min.js',
        // 'adminLte/moment/moment.min.js',
        // 'adminLte/daterangepicker/daterangepicker.js',
        // 'adminLte/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
        // 'adminLte/summernote/summernote-bs4.min.js',
        // 'adminLte/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        // 'adminLte/dist/js/adminlte.js',
        // 'adminLte/dist/js/demo.js',
        // 'adminLte/dist/js/pages/dashboard.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
