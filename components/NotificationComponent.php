<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/10/2019
 * Time: 8:18 PM
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\mail\MailerInterface;

class NotificationComponent extends Component
{
    /** @var MailerInterface */
    public $mailer;
    /**
     * @param $activities Activity[]
     * @return \Generator
     */
    public function sendTodayNotification($activities){//todo: pass interface as argument
        foreach ($activities as $activity){
            $result = $this->mailer->compose('notification',['model'=>$activity])
                ->setFrom('geekbrains@onedeveloper.ru')//todo: set From, To, attachment
                ->setTo(['anat-gor@ya.ru',$activity->user->email])
                ->setSubject('Yii2app: cобытие сегодня')
                ->setCharset('utf-8')
                ->attach( \Yii::getAlias('@app/web/images/x_7b5dd7b3.jpg') )
                ->send();
            yield ['result' => $result,'email' => $activity->user->email];
        }
    }
}