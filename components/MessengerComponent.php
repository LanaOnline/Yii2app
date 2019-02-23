<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 9:42 PM
 */

namespace app\components;

use yii\base\Component;

class MessengerComponent extends Component
{
    public $message;

    public function init() {
        parent::init();
        $this->message = "Текст сообщения";
    }

    public function display($userMessage) {
        $this->message = $userMessage;

        return Html::encode($this->message);
    }
}