<?php
namespace SE;

class Event
{
    private static $redis = null;
    private static $eventDataName = 'eventQueue';
    private static $config = [];

    public function __construct()
    {
        self::$config = require_once 'config/config.php';

        self::$redis = new \Redis();
        self::$redis->connect(self::$config['redis']['host'], self::$config['redis']['port']);
        self::$redis->auth(self::$config['redis']['auth']);
        //读不超时
        self::$redis->setOption(\Redis::OPT_READ_TIMEOUT, -1);
    }

    /**
     * 注册事件
     */
    public function register($eventData)
    {
        //1.写入数据库[暂时不写]
        //2.写入队列
        self::$redis->rpush(self::$eventDataName, serialize($eventData));
    }

    /**
     * 执行事件
     */
    public function run()
    {
        set_time_limit(0);

        $eventData = self::$redis->blPop(self::$eventDataName, 0);
        //获取状态包含的所有事件
        $eventData = unserialize($eventData[1]);

        //获取后台开关--可改
        $switch = [
            'stateUserRegisterSuccess' => ['eventRedPacket'],
            'stateUserLoginSuccess' => ['eventCoupon'],
        ];

        //循环执行事件
        foreach ($eventData as $state => $data) {
            //后台开关未启用
            if (!isset($switch[$state]) || empty($switch[$state])) {
                echo "后台开关未启用\n";
                continue;
            }

            //配置中不存在状态
            if (!isset(self::$config['stateConfig'][$state])) {
                echo "配置中不存在状态\n";
                continue;
            }

            //配置中的事件
            $eventArr = self::$config['stateConfig'][$state]['event'];
            //后台中的事件
            $backEventArr = $switch[$state];

            //事件为空
            $activeEvent = array_intersect($eventArr, $backEventArr);
            if (empty($activeEvent)) {
                echo "事件为空\n";
                continue;
            }

            //循环所有事件，执行对应的操作
            $eventConfig = self::$config['eventConfig'];
            foreach ($activeEvent as $value) {
                if (!isset($eventConfig[$value])) {
                    echo "事件不存在\n";
                    continue;
                }

                //执行
                $class = $eventConfig[$value]['call'][0];
                $func = $eventConfig[$value]['call'][1] ?? false;
                if ($func) {
                    (new $class)->$func($data);
                } else {
                    $class($data);
                }
            }
        }
    }
}