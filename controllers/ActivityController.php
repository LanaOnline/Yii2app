<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 8:48 PM
 */

namespace app\controllers;

use app\base\BaseController;
use app\components\ActivityComponent;
use app\controllers\actions\ActivityCalendarAction;
use app\controllers\actions\ActivityCreateAction;
use app\controllers\actions\ActivityEditAction;
use app\controllers\actions\ActivityViewAction;
use yii\web\HttpException;

class ActivityController extends BaseController
{
    public function actionIndex()
    {
        return "Контроллер активностей";
    }

    public function actions()
    {
        return [
            'create'=>['class'=>ActivityCreateAction::class],
//            'view-activity'=>['class'=>ActivityViewAction::class],
            'edit'=>['class'=>ActivityEditAction::class],
            'calendar'=>['class'=>ActivityCalendarAction::class]
        ];
    }

    /**
     * @param $id
     * @return string
     * @throws HttpException
     */
    public function actionView($id) {
        /**
         * @var ActivityComponent $comp
         */
        $comp = \Yii::$app->activity;

        $activity = $comp->getActivity($id);

        if (!$activity) {
            throw new HttpException(401, 'Активность не найдена');
        }

        if(!\Yii::$app->rbac->canViewEditAll()){
            if(!\Yii::$app->rbac->canViewActivity($activity)){
                throw new HttpException(403,'No access to view this activity');
            }
        }

        return $this->render('view-activity', ['activity' => $activity]);
    }
}