* 操作完成时，写入状态，并将有效事件写入 => 读出记录，即可逐一执行
* 操作完成时，只写入状态，不写入事件 => 读出记录，并查找有效事件，然后逐一执行