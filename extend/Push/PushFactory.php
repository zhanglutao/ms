<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16 0016
 * Time: 上午 10:22
 */
use JPush\Client as JPush;
class PushFactory{
    private static $pushObj;
    private static $appKey;
    private static $password;
    private static $platform = array(
        'ios' => 'ios',
        'android' => 'android',
        'winphone' => 'winphone'
    );

    public function __construct($appKey,$password,$platformType)
    {
        $this->_setPushRoot($platformType);
        require_once PUSH_ROOT.$platformType.'/AutoLoader.php';
        switch ($platformType) {
            case 'JPush':
                self::$pushObj = new JPush($appKey, $password);
                break;
            case 'HWPush':
                self::$appKey = $appKey;
                self::$password = $password;
                break;
            case 'XMPush':
                self::$appKey = $appKey;
                self::$password = $password;
                break;
            default :
                self::$pushObj = new JPush($appKey, $password);
        }
    }

    private function _setPushRoot($platformType) {
        $extDir = dirname(__FILE__) . '/';
        !defined('PUSH_ROOT') && define('PUSH_ROOT', $extDir);
        switch (strtoupper($platformType)) {
            case 'JPUSH':
                !defined('JPUSH_ROOT') && define('JPUSH_ROOT', PUSH_ROOT);
                break;
            case 'XPUSH':
                !defined('XPUSH_ROOT') && define('XPUSH_ROOT', PUSH_ROOT);
                break;
            default :
                !defined('JPUSH_ROOT') && define('JPUSH_ROOT', PUSH_ROOT);
        }
    }

    /*
     * 向全平台所有用户推送
     * @param string    $msg
     * @param array     $extra
     * @param array     $platform
     * @param array     $option
     * return array
     **/
    public function sendNotice2All($msg, $extra = array(), $platform = array()) {
        return $this->_noticePayload($msg, $extra, $platform)->addAllAudience()->send();
    }

    //推送代码
    private function _noticePayload($msg, $extra, $platform) {
        $winphone = isset($extra['winphone']) ? $extra['winphone'] : array();
        $platform = $platform ? $platform : self::$platform;
        return self::$pushObj->push()
            ->setPlatform($platform)
            ->iosNotification($msg, isset($extra['ios']) ? $extra['ios'] : array())
            ->androidNotification($msg, isset($extra['android']) ? $extra['android'] : array())
            ->addWinPhoneNotification($msg, @$winphone['title'], @$winphone['open_page'], $winphone);
    }
}