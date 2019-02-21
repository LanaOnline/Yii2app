<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 8:57 PM
 */

namespace app\models;

use yii\base\Model;
/**
 * Class Activity
 *
 * Describes a calendar event entity
 */
class Activity extends Model
{
    /**
     * Activity name
     *
     * @var string
     */
    public $title;
    /**
     * Activity start day
     *
     * @var int
     */
    public $startDay;
    /**
     * Activity end day
     *
     * @var int
     */
    public $endDay;
    /**
     * Author id
     *
     * @var int
     */
    public $idAuthor;
    /**
     * Activity description
     *
     * @var string
     */
    public $body;
    /**
     * Activity state
     *
     * @var boolean
     */
    public $is_blocked = false;
    /**
     * Is activity recurring
     *
     * @var bool
     */
    public $recurring = false;

    function rules()
    {
        return [
            ['title','string','max' => 150, 'min' => 2],
            [['title', 'startDay'], 'required'],
            ['is_blocked', 'boolean'],
            ['recurring', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Наименование активности',
            'startDay' => 'Дата начала',
            'endDay' => 'Дата окончания',
            'idAuthor' => 'ID автора',
            'body' => 'Описание активности',
            'is_blocked' => 'Блокирующая (блокирует все другие события в этот день)',
            'recurring' => 'Повторяющаяся'
        ];
    }
}