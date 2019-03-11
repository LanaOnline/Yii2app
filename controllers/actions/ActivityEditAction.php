<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/24/2019
 * Time: 8:33 PM
 */

namespace app\controllers\actions;

use yii\base\Action;
use app\components\ActivityComponent;
use yii\web\HttpException;

class ActivityEditAction extends Action
{
    public function run($id){
        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;

        $activity = $comp->getActivity($id);

        if (!$activity) {
            throw new HttpException(401, 'Активность не найдена');
        }

        if(!\Yii::$app->rbac->canViewEditAll()){
            throw new HttpException(403,'No access to edit this activity');
        }

        if ($activity->load(\Yii::$app->request->post()) && $activity->save()) {
            return $this->controller->redirect(['/activity/view', 'id' => $activity->id]);
        }

        return $this->controller->render('edit', ['activity' => $activity]);
    }
}