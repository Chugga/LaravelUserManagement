<?php

$config =  array(


    'pdf' => array(
        'enabled' => true,
        'binary' =>  base_path() . '/app/bin/wkhtmltopdf-linux',
        'options' => array(
            'orientation' => 'portrait',
            'page-size' => 'A4',
            'footer-center' => 'Page [page] of [toPage]'
        )
    ),
    'image' => array(
        'enabled' => true,
        'binary' => '/usr/local/bin/wkhtmltoimage',
        'options' => array()
    ),


);
//Windows Workaround Hack. This is just for portability
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $config['pdf']['binary'] = base_path() . '/app/bin/wkhtmltopdf.exe';
}
return $config;

