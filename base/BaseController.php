<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 9:56 PM
 */

namespace app\base;

use yii\web\Controller;
use yii\web\HttpException;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        if(\Yii::$app->user->isGuest){
            throw new HttpException(401,'Нет доступа');//todo: implement redirect
        }
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result) //redefining method
    {
        $session = \Yii::$app->session;
        $session->set('lastPage', \Yii::$app->request->absoluteUrl);//remember last visited page

        return parent::afterAction($action, $result);
    }
}