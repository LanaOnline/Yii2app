<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/6/2019
 * Time: 10:11 PM
 */

namespace app\behaviors;

use app\models\Activity;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\log\Logger;

class LogMyBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'logMeHere',
            Activity::EVENT_MY_EVENT => 'logMeHere',
        ];
    }
    public function logMeHere(){
        \Yii::getLogger()->log('log behavior here',Logger::LEVEL_INFO);
    }
}