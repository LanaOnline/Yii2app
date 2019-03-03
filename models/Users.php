<?php

namespace app\models;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $password_hash
 * @property string $password_match
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
    public $password_match;

    public function rules()
    {
        return array_merge([
            ['password','string','min' => 4],//add autonomous rule for password check with RegEx
            ['password_match','compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'],
            ['email', 'unique', 'message' => 'Такой email уже зарегистрирован']
        ], parent::rules());
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Ваш email',
            'password' => 'Введите пароль',
            'password_match' => 'Подтвердите пароль',
        ];
    }
}
