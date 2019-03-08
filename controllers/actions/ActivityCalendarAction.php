<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/24/2019
 * Time: 8:28 PM
 */

namespace app\controllers\actions;


use yii\base\Action;

class ActivityCalendarAction extends Action
{
    public function run(){


        //add data source to pass as parameters
        return $this->controller->render('calendar');

    }
}