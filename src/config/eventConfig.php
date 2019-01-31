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
        'call' => ['SE\\Red', 'send'], //实际调用的类空间。如果是静态方法，请使用: 'app\\user::sendPachet', 第二个参数不用传
        'desc' => '发红包', //描述
    ],

    /**
     * 用户ID
     * 优惠券ID
     */
    'eventCoupon' => [
        'call' => ['SE\\Coupon::send'],
        'desc' => '发优惠券',
    ],
];