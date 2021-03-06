<?php
/*-----------------------------------------------------------------
！！！！警告！！！！
以下为系统文件，请勿修改
-----------------------------------------------------------------*/

//不能非法包含或直接执行
if (!defined("IN_BAIGO")) {
    exit("Access Denied");
}

require(BG_PATH_INC . "common.inc.php"); //通用
$arr_set = array(
    "base"          => true, //基本设置
    "db"            => true, //连接数据库
    "dsp_type"      => "result",
);
fn_chkPHP($arr_set);

require(BG_PATH_FUNC . "init.func.php"); //初始化
fn_init($arr_set);

$ctrl_pm = new CONTROL_API_PM(); //初始化短信

switch ($GLOBALS["method"]) {
    case "POST":
        switch ($GLOBALS["act"]) {
            case "send":
                $ctrl_pm->ctrl_send(); //发送
            break;

            case "del":
                $ctrl_pm->ctrl_del(); //删除
            break;

            case "status":
                $ctrl_pm->ctrl_status(); //状态
            break;

            case "rev":
            case "revoke":
                $ctrl_pm->ctrl_revoke(); //撤回
            break;
        }
    break;

    default:
        switch ($GLOBALS["act"]) {
            case "check":
                $ctrl_pm->ctrl_check(); //验证是否有新短信
            break;

            case "read":
                $ctrl_pm->ctrl_read(); //读取
            break;

            case "list":
                $ctrl_pm->ctrl_list(); //列出
            break;
        }
    break;
}
