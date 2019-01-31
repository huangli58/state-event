<?php
/**
 * 状态定义 [后台从这里读出有哪些地方可以选择状态]
 * 在此处定义的状态及其对应事件
 *
 * 使用驼峰规则: 以 event 开头
 *
 * @author huangli
 */
return [
    //注册成功事件
    'stateUserRegisterSuccess' => [
        'event' => [ //定义可以使用哪些事件
            'eventRedPacket',
            'eventCoupon',
        ],
        'desc' => '用户注册成功', //描述
    ],

    //登录成功事件
    'stateUserLoginSuccess' => [
        'event' => [
            'eventCoupon',
        ],
        'desc' => '用户登录成功',
    ],
];