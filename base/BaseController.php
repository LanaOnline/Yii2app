<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 9:56 PM
 */

namespace app\base;

use yii\web\Controller;

class BaseController extends Controller
{
    public function afterAction($action, $result) //redefying method
    {
        $session = \Yii::$app->session;
        $session->set('lastPage', \Yii::$app->request->absoluteUrl);//remember last visited page

        return parent::afterAction($action, $result);
    }
}