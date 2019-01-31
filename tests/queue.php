<?php
/**
 * 执行定时任务
 */
set_time_limit(0);

$baseDir = dirname(__DIR__);
require_once $baseDir . '/vendor/autoload.php';

$event = new SE\Event();
while (true) {
    //执行事件
    $event->run();
}