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
use yii\web\HttpException;
use yii\web\UploadedFile;

class ActivityCreateAction extends Action
{
    public function run(){

        //check user permissions
        if(!\Yii::$app->rbac->canCreateActivity()){
            throw new HttpException(403,'Нет доступа к созданию');
        }

        /**
         * @var ActivityComponent $comp
         */
        $comp = \Yii::$app->activity;

        if (\Yii::$app->request->isPost) {
            $activity = $comp->getModel(\Yii::$app->request->post());
            //get active user id from session
            $activity->user_id = \Yii::$app->session->get('__id');
            //get images
            $activity->imageFiles = UploadedFile::getInstances($activity, 'imageFiles');

            if ($comp->createActivity($activity)) {
//                return $this->controller->redirect(['/activity/view', 'id' => $activity->id]); todo: get id
                return $this->controller->render('create-confirm', ['activity' => $activity]);
            }
        } else {
            $activity = $comp->getModel();
        }
        return $this->controller->render('create',['activity' => $activity]);

    }
}