<?php
/**
 * 此处是用户注册成功后的测试
 */
$baseDir = dirname(__DIR__);
require_once $baseDir . '/vendor/autoload.php';

$event = new SE\Event();

//发布一个或者多个状态
$eventData = [
    //状态key => 参数
    'stateUserRegisterSuccess' => [
        'userId' => 1, //用户id
        'redId' => 1, //红包id
        'couponId' => 2, //优惠券id
        //...其他可能需要的数据
    ],

    //状态key => 参数
    'stateUserLoginSuccess' => [
        'userId' => 1, //用户id
        'redId' => 1, //红包id
        'couponId' => 2, //优惠券id
        //...其他可能需要的数据
    ],

    //可以多个状态
];
$event->register($eventData);