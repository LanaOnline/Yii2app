<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 11:26 PM
 */

namespace app\components;


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

        if (empty($this->activity_class)) {
            throw new \Exception('Need attribute activity_class');
        }
    }

    /**
     * @return Activity
     */
    public function getModel($params = null) {
        /**
         * @var Activity $model
         */
        $model = new $this->activity_class;

        if ($params && is_array($params)) {

            $model->load($params);
        }
        return $model;
    }
    public function createActivity($model) {

        return $model->validate();
    }
}