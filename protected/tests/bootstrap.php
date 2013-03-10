<?php

// change the following paths if necessary
$yiit='F:\Master\Programming\Web Programming\framework\yii-1.1.5.r2654\framework\yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
