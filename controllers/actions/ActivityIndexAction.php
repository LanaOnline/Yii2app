<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/6/2019
 * Time: 7:35 PM
 */

namespace app\controllers\actions;

use app\components\ActivityComponent;
use yii\base\Action;

class ActivityIndexAction extends Action
{
    public function run(){
        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;

        $dataprovider = $comp->getSearchProvider(\Yii::$app->request->queryParams);

//        \Yii::$app->request->logMeHere();
        \Yii::$app->logMeHere();//hooked in web.php as component
        return $this->controller->render('index',['provider' => $dataprovider]);
    }
}