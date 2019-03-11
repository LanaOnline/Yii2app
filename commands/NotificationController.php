<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/10/2019
 * Time: 7:29 PM
 */

namespace app\commands;


use app\components\NotificationComponent;
use yii\helpers\Console;
use yii\console\Controller;

class NotificationController extends Controller
{
    /**
     * any parameter name
     * @var $param
     */
    public $param;

    /**
     * Creates short console commands (-p=value1)
     * @return array
     */
    public function optionAliases()
    {
        return ['p'=>'param'];
    }

    /**
     * Override options
     * @param string $actionID
     * @return array
     */
    function options($actionID)
    {
        return ['param'];
    }

    /**
     * echos back params passed with notification/params --param=value1
     */
    public function actionParams(){
        echo 'param='.$this->param.PHP_EOL;
    }

    /**
     * Default action
     * @param array ...$args
     */
    public function actionIndex(...$args){
        //edit output format: green color
        echo $this->ansiFormat('this is console'.PHP_EOL,Console::FG_GREEN);
        echo 'param '.print_r($args).PHP_EOL;
    }

    /**
     * Sends daily notifications
     */
    public function actionNotification(){
        $activities = \Yii::$app->activity->getActivityToday();
        /** @var NotificationComponent $notif_comp */
        $notif_comp=\Yii::createObject(['class'=>NotificationComponent::class,
            'mailer'=>\Yii::$app->mailer]);
        foreach ($notif_comp->sendTodayNotification($activities) as $result){
            if($result['result']){
                echo $this->ansiFormat('Успешно отправлено письмо:'.$result['email'],Console::FG_GREEN);
            }else{
                echo $this->ansiFormat('Ошибка отправки письма:'.$result['email']);
            }
        }
    }

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
//    public function actionIndex($message = 'hello world')
//    {
//        echo $message . "\n";
//
//        return ExitCode::OK;
//    }
}