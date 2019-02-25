<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/24/2019
 * Time: 8:33 PM
 */

namespace app\controllers\actions;


use yii\base\Action;

class ActivityEditAction extends Action
{
    public function run(){
        //add data source to pass as parameters
        return $this->controller->render('edit');
    }
}