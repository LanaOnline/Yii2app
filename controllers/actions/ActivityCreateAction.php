<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 11:00 PM
 */

namespace app\controllers\actions;


use app\components\ActivityComponent;
use yii\base\Action;
use yii\web\UploadedFile;

class ActivityCreateAction extends Action
{
    public function run(){

        /**
         * @var ActivityComponent $comp
         */
        $comp = \Yii::$app->activity;

        if (\Yii::$app->request->isPost) {
            $activity = $comp->getModel(\Yii::$app->request->post());
            $activity->imageFiles = UploadedFile::getInstances($activity, 'imageFiles');

            if ($comp->createActivity($activity)) {
                return $this->controller->render('create-confirm', ['activity' => $activity]);
            }
        } else {
            $activity = $comp->getModel();
        }
        return $this->controller->render('create',['activity' => $activity]);

    }
}