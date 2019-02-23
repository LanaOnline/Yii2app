<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/21/2019
 * Time: 12:38 AM
 */

namespace app\components;

use yii\base\Component;

class DayComponent extends Component
{
    public function getActiveEvents($day) {

        return $day->active_events;
    }
}