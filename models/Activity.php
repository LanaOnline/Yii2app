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
     * @var string
     */
    public $email;
    /**
     * @var UploadedFile
     */
    public $image;

    public function beforeValidate()
    {
        $this->loadFile();

        //convert user Date format to php format before validation
        if(!empty($this->startDate)) {
            $this->startDate = \DateTime::createFromFormat('d.m.Y', $this->startDate);
            if($this->startDate) {
                $this->startDate = $this->startDate->format('Y-m-d');
            }
        }
        return parent::beforeValidate();
    }

    public function loadFile()
    {
        /**
         * @var UploadedFile
         * image
         */
        $this->image = UploadedFile::getInstance($this, 'image');
        var_dump('file uploaded');

    }

    public function rules()
    {
        return [
            ['title','string','max' => 150, 'min' => 2],
            ['title', 'trim'],
            ['description','string'],
            [['title', 'startDate'], 'required'],
            ['startDate', 'date','format' => 'php:Y-m-d','message' => 'Формат даты должен быть dd.mm.yyyy'],
            ['is_blocked', 'boolean'],
            ['recurring', 'boolean'],
            ['email', 'email'],
            ['image', 'file', 'extensions' => ['jpg', 'png']]
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Наименование активности',
            'startDate' => 'Дата начала',
            'endDate' => 'Дата окончания',
            'idAuthor' => 'ID автора',
            'description' => 'Описание активности',
            'is_blocked' => 'Блокирующая (блокирует все другие события в этот день)',
            'recurring' => 'Повторяющаяся',
            'image' => 'Загрузить изображение'
        ];
    }
}