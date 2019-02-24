<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 11:26 PM
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;

class ActivityComponent extends Component
{
    /**
     *  Class of activity entity
     * @var string
     */
    public $activity_class;

    public function init()
    {
        parent::init();

        if (empty($this->activity_class))
        {
            throw new \Exception('Need attribute activity_class');
        }
    }

    /**
     * @return Activity
     */
    public function getModel($params = null)
    {
        /**
         * @var Activity $model
         */
        $model = new $this->activity_class;

        if ($params && is_array($params))
        {

            $model->load($params);
        }
        return $model;
    }

    /**
     * @param $model Activity
     */
    public function createActivity($model)
    {
        if ($model->validate())
        {
            $path = $this->getPathSaveFile();
            $name = mt_rand(0,9999).time().'.'.$model->image->getExtension();

            if (!$model->image->saveAs($path.$name))
            {
                $model->addError('image', 'Файл не удалось переместить');
                return false;
            }
            $model->image = $name;
            //add code to save file info to db
            return true;
        }
    }

    public function getPathSaveFile() {
        return \Yii::getAlias('@app/web/images/');
    }
}