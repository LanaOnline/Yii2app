<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/6/2019
 * Time: 9:46 PM
 */

namespace app\behaviors;

use yii\base\Behavior;

class GetDateFunctionFormatBehavior extends Behavior
{
    public $attribute_name;

    public function getDate(){
        //owner - calls behavior
        $date = $this->owner->{$this->attribute_name};

        return \Yii::$app->formatter->asDate($date);
    }
}