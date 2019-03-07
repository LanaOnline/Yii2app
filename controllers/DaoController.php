<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/28/2019
 * Time: 1:14 PM
 */

namespace app\controllers;

use app\base\BaseController;
use app\components\DaoComponent;

class DaoController extends BaseController
{
    public function actionTest() {
        /**
         * @var DaoComponent $dao
         */
        $dao = \Yii::$app->dao;

        $dao->insertTest();

        $users = $dao->getAllUsers();
        $userActivities = $dao->getUserActivities();
        $firstActivity = $dao->getFirstActivity();
        $countRecurring = $dao->countRecurringActivities();
        $allUserActivities = $dao->getAllUserActivities('1');
        $activityReader = $dao->getActivityReader();

        return $this->render('test', [
            'users' => $users,
            'userActivities' => $userActivities,
            'firstActivity' => $firstActivity,
            'countRecurring' => $countRecurring,
            'allUserActivities' => $allUserActivities,
            'activityReader' => $activityReader]);
    }
}