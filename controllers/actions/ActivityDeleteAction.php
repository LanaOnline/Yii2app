<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/7/2019
 * Time: 10:14 PM
 */

namespace app\controllers\actions;


use app\components\ActivityComponent;
use yii\base\Action;
use yii\web\HttpException;

class ActivityDeleteAction extends Action
{
    public function run($id)
    {
        /** @var ActivityComponent $comp */
        If (!\Yii::$app->activity->getActivity($id)->delete()) {
            throw new HttpException(401, 'Не получилось удалить активность');
        };

        return $this->controller->redirect(['/activity/calendar']);
    }
}