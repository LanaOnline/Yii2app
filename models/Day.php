<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/21/2019
 * Time: 12:23 AM
 */

namespace app\models;

use yii\base\Model;

/**
 * Class Day
 * @package app\models
 */
class Day extends Model
{
    /**
     * @var bool working day or day off
     */
    public $day_off = false;
    /**
     * @var array of associated activities
     */
    public $active_events;

    function rules()
    {
        return [
            ['day_off', 'boolean'],
            ['active_events', 'array']
        ];
    }

    public function attributeLabels()
    {
        return [
            'day_off' => 'Выходной день',
            'active_events' => 'Ативности на сегодня'
        ];
    }

}