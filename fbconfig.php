<?php
    session_start();

    require_once 'Facebook/src/Facebook/autoload.php';
    
    $FB = new \Facebook\Facebook([
        'app_id' => '393457228257733',
        'app_secret' => 'a529c2f38c7c8bcd6c151b3221aab1b3',
        'default_graph_version' => 'v4.0'
    ]);
    
    $helper = $FB->getRedirectLoginHelper();
?>