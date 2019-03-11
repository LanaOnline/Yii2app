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
use yii\filters\PageCache;

class DaoController extends BaseController
{
//    public function behaviors()
//    {
//        return [
//            ['class'=>PageCache::class,
//                'only' => ['test'],
//                'duration' => 10]
//        ];
//    }

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

    public function actionCache(){
//        \Yii::$app->cache->set('key1','value1'); //set different key for different users
//         $value = \Yii::$app->cache->get('key1'); //get
//        \Yii::$app->cache->delete('key1'); //delete
//        \Yii::$app->cache->flush();//clears all cache
        //clear cache from console: 'php yii cache/flush-all'

        $value=\Yii::$app->cache->getOrSet('key1',function (){
            return 'value3';
        });
        echo $value;
    }
}