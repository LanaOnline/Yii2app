<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/24/2019
 * Time: 7:45 PM
 */

namespace app\controllers\actions;

use yii\base\Action;

class ActivityViewAction extends Action
{
    public function run(){
        //add data source to pass as parameters
        return $this->controller->render('view-activity');

    }
}