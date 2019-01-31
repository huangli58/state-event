<?php
/**
 * 事件定义 [后台管理从这里读出事件用来展示]
 * 必须定义事件需要提供的参数
 *
 * 使用驼峰规则: 以 event 开头
 *
 * @author huangli
 */
return [
    /**
     * 用户ID
     * 红包金额
     */
    'eventRedPacket' => [
        'call' => ['SE\\Event\\Red', 'send'],
        'desc' => '发红包', //描述
    ],

    /**
     * 用户ID
     * 优惠券ID
     */
    'eventCoupon' => [
        'call' => ['SE\\Event\\Coupon::send'],
        'desc' => '发优惠券',
    ],
];