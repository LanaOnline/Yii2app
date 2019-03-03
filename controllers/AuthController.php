<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/1/2019
 * Time: 9:28 AM
 */

namespace app\controllers;


use app\components\UsersAuthComponent;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionSignIn() {
        /**
         * @var UsersAuthComponent $comp
         */
        $comp = \Yii::$app->auth;

        $model = $comp->getModel(\Yii::$app->request->post());

        return $this->render('sign-in',['model' => $model]);
    }

    public function actionRegistration() {
        /**
         * @var UsersAuthComponent $comp
         */
        $comp = \Yii::$app->auth;

        $model = $comp->getModel(\Yii::$app->request->post());

        if(\Yii::$app->request->isPost) {
            //add user to the db
            if ($comp->createNewUser($model)) {
                \Yii::$app->session->addFlash('success', 'Пользователь успешно зарегистрирован. ID: '. $model->id);
                return $this->redirect(['/']);
            }
        }

        return $this->render('registration', ['model' => $model]);
    }
}