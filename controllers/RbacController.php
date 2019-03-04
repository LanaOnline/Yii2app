<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/3/2019
 * Time: 7:11 PM
 */

namespace app\controllers;

use app\components\RbacComponent;
use yii\web\Controller;

class RbacController extends Controller
{
    /**
     * @var RbacComponent
     */
    public function actionGen() {
        \Yii::$app->rbac->generateRbacRules();
    }
}