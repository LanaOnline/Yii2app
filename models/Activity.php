<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 8:57 PM
 */

namespace app\models;

use app\behaviors\GetDateFunctionFormatBehavior;
use app\behaviors\LogMyBehavior;
use yii\web\UploadedFile;

/**
 * Class Activity
 *
 * Describes a calendar event entity
 * @mixin GetDateFunctionFormatBehavior
 */
class Activity extends ActivityBase
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
    const EVENT_MY_EVENT = 'my_event';

    public function beforeValidate()
    {
        // fill empty endDate before validation
        if(empty($this->endDate)) {
            $this->endDate = $this->startDate;
        }
        return parent::beforeValidate();
    }

    public function rules()
    {
        return array_merge([
            [['title'],'string', 'min' => 2, 'max' => 255],
            [['title'], 'trim'],
            [['startDate', 'endDate'], 'default', 'value' => date('Y-m-d')],
            ['startDate', 'compare', 'compareValue' => date('Y-m-d'), 'operator' => '>=', 'message' => 'Дата начала не может предшестовать сегодняшнему дню'],
            ['endDate', 'compare', 'compareAttribute' => 'startDate', 'operator' => '>=', 'message' => 'Дата окончания не может предшествовать дате начала'],
            [['is_blocked', 'recurring'], 'boolean'],
            [['imageFiles'], 'file', 'extensions' => ['jpg', 'png'], 'maxFiles' => 3]
        ], parent::rules());
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Наименование',
            'startDate' => 'Дата начала',
            'endDate' => 'Дата окончания',
            'description' => 'Описание',
            'is_blocked' => 'Блокирующая (блокирует все другие события в этот день)',
            'recurring' => 'Повторяющаяся',
            'imageFiles' => 'Загрузить изображения'
        ];
    }

    public function behaviors()
    {
        return [
            //array of behaviors
            [
                'class'=>GetDateFunctionFormatBehavior::class,
                'attribute_name' => 'date_created'
            ],
            LogMyBehavior::class
        ];
    }
}