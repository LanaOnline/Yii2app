<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/10/2019
 * Time: 4:50 PM
 */

namespace app\modules\admin\controllers;


use app\models\ActivityCrud;

class ActivitiesController extends DefaultController
{
    /**
     * Returns list of all activities for all users through DataProvider
     * @return string
     */
    public function actionData()
    {
        $data = new ActivityCrud();
        $dataProvider = $data->search(\Yii::$app->request->queryParams);

        return $this->render('data', ['dataProvider' => $dataProvider]);
    }

}