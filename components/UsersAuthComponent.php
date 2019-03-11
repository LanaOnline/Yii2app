<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/3/2019
 * Time: 10:46 AM
 */

namespace app\components;

use app\models\Users;
use yii\base\Component;

class UsersAuthComponent extends Component
{
    /**
     * @param null $params
     * @return Users
     */
    public function getModel($params = null) {
        $model = new Users();
        if ($params) {
            $model->load($params);
        }
        return $model;
    }

    /**
     * @param $model Users
     * @return bool
     */
    public function authorizeUser(&$model):bool {
        $user = $this->getUserByEmail($model->email);

        if(!$user) {
            $model->addError('email', 'Пользователь не существует');
            return false;
        }

        if(!$this->validatePassword($model->password, $user->password_hash)) {
            $model->addError('password', 'Пароль неверный');
            return false;
        }
        $user->username = $user->email;//username is required by Yii

        return \Yii::$app->user->login($user, $model->rememberMe ? 3600*24*30 : 0);
    }

    public function validatePassword($pass, $hash) {//add this func to rules in auth scenario
        return \Yii::$app->security->validatePassword($pass, $hash);
    }

    public function getUserByEmail($email) {
        return $this->getModel()::find()->andWhere(['email' => $email])->one();
    }
    /**.
     * @param $model Users
     * @return bool
     */
    public function createNewUser($model):bool {
        if(!$model->validate(['email','password'])) {
            return false;
        }
        $model->password_hash = $this->hashPassword($model->password);

        if ($model->save()) {//calls validation before saving to db
            return true;
        }
        return false;
    }

    private function hashPassword($pass) {
        return \Yii::$app->security->generatePasswordHash($pass);
    }
}