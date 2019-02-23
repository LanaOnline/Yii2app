<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/21/2019
 * Time: 12:52 AM
 */

namespace app\controllers;


use app\base\BaseController;

class DayController extends BaseController
{
    public function actionIndex()
    {
        return "Контроллер сущности День";
    }
    public function actions()
    {
        return [
            'day'=>['class'=>ActivityCreateAction::class]
        ];
    }
}