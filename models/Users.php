<?php

namespace app\models;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $password_hash
 * @property string $token
 * @property string $fio
 * @property string $date_created
 * @property string $date_updated
 *
 * @property Activity[] $activities
 */
class Users extends UsersBase
{
    public $password;

    public function rules()
    {
        return array_merge([
            ['password','string','min' => 4],//add autonomous rule for password check with RegEx
            ['email', 'unique', 'message' => 'Такой email уже зарегистрирован']
        ], parent::rules());
    }
}
