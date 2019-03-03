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

    /**.
     * @param $model Users
     * @return bool
     */
    public function createNewUser($model):bool {
        if(!$model->validate(['email','password'])) {
            return false;
        }
        $model->password_hash = $this->hashPassword($model->password);

//        if(!$model->validate()) {
//            return false;
//        }
        if ($model->save()) {//calls validation before saving to db
            return true;
        }
        return false;
    }

    private function hashPassword($pass) {
        return \Yii::$app->security->generatePasswordHash($pass);
    }
}