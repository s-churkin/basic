<?php

namespace app\components;
use yii\web\Controller;

/**
 * Description of Log
 *
 * @author Sherla
 */
class Log  extends Controller {
    public function writeLog() {
        $controller = $this->owner;
        file_put_contents('log.txt', "{$_SERVER['REMOTE_ADDR']}|".time()."|".$controller::className()."|".$this->custom_info."\n", FILE_APPEND);
    }
}
