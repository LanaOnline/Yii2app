<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 11:00 PM
 */

namespace app\controllers\actions;


use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;

class ActivityCreateAction extends Action
{
    public function run(){

        /**
         * @var ActivityComponent $comp
         */
        $comp=\Yii::createObject([
            'class'=>ActivityComponent::class,
            'activity_class' => Activity::class
        ]);
        if (\Yii::$app->request->isPost) {
            $activity = $comp->getModel(\Yii::$app->request->post());
            $comp->createActivity($activity);
        } else {
            $activity = $comp->getModel();
        }

        return $this->controller->render('create',['activity'=>$activity]);
    }
}