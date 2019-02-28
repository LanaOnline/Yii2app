<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 8:57 PM
 */

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

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
     * Activity start date
     *
     * @var int
     */
    public $startDate;
    /**
     * Activity end date
     *
     * @var int
     */
    public $endDate;
    /**
     * Activity description
     *
     * @var string
     */
    public $description;
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
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function beforeValidate()
    {
        //convert user Date format to php format before validation
        if(!empty($this->startDate)) {
            $this->startDate = \DateTime::createFromFormat('d.m.Y', $this->startDate);
            if($this->startDate) {
                $this->startDate = $this->startDate->format('Y-m-d');
            }
        }
        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            ['title','string','max' => 150, 'min' => 2],
            ['title', 'trim'],
            ['description','string'],
            [['title', 'startDate'], 'required'],
            [['startDate','endDate'], 'date'],
            ['startDate', 'compare', 'compareValue' => date('Y-m-d'), 'operator' => '>=', 'message' => 'Дата начала не может предшестовать сегодняшнему дню'],
            ['endDate', 'compare', 'compareAttribute' => 'startDate', 'operator' => '>=', 'message' => 'Дата окончания не может предшествовать дате начала'],
            ['is_blocked', 'boolean'],
            ['recurring', 'boolean'],
            [['imageFiles'], 'file', 'extensions' => ['jpg', 'png'], 'maxFiles' => 3]
        ];
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