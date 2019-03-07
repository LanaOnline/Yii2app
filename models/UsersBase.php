<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
class UsersBase extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password_hash'], 'required'],
            [['date_created', 'date_updated'], 'safe'],
            [['email', 'token', 'fio'], 'string', 'max' => 150],
            [['password_hash'], 'string', 'max' => 300]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'token' => Yii::t('app', 'Token'),
            'fio' => Yii::t('app', 'Fio'),
            'date_created' => Yii::t('app', 'Date Created'),
            'date_updated' => Yii::t('app', 'Date Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::class, ['user_id' => 'id']);
    }
}
