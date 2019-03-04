<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 8:57 PM
 */

namespace app\models;

use yii\web\UploadedFile;

/**
 * Class Activity
 *
 * Describes a calendar event entity
 */
class Activity extends ActivityBase
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

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
 //           ['endDate', ['required' => false]], todo: figure out how to override parent 'required' rule
            [['title'],'string', 'min' => 2],
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
            'title' => 'Наименование активности',
            'startDate' => 'Дата начала',
            'endDate' => 'Дата окончания',
            'description' => 'Описание активности',
            'is_blocked' => 'Блокирующая (блокирует все другие события в этот день)',
            'recurring' => 'Повторяющаяся',
            'imageFiles' => 'Загрузить изображения'
        ];
    }
}