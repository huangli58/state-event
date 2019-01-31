<?php
/**
 * 配置内容
 */
$stateConfig = require_once 'StateConfig.php';
$eventConfig = require_once 'EventConfig.php';

return [
    'redis' => [
        'host' => '127.0.0.1',
        'port' => '6379',
        'auth' => '123456',
    ],
    'stateConfig' => $stateConfig,
    'eventConfig' => $eventConfig,
];