<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 11:26 PM
 */

namespace app\components;


use app\models\Activity;
use app\models\ActivitySearch;
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
        $model->trigger($model::EVENT_MY_EVENT);
        return $model;
    }

    /**
     * @param $id
     * @return Activity|array|null|\yii\db\ActiveRecord
     */
    public function getActivity($id) {
        return $this->getModel()::find()->andWhere(['id' => $id])->one();
    }

    /**
     * @param $model Activity
     * @return bool
     */
    public function createActivity($model)
    {
        if ($model->validate())
        {
            $path = $this->getPathSaveFile();

            foreach ($model->imageFiles as $file) {
                $file->saveAs($path . $file->baseName . '.' . $file->extension);
            }

            return true;
        } else {
            return false;
        }

    }

    public function getPathSaveFile() {
        return \Yii::getAlias('@app/web/images/');
    }

    /**
     * @param $params
     * @return \yii\data\ActiveDataProvider
     */
    public function getSearchProvider($params){
        $model = new ActivitySearch();
        return $model->getDataProvider();
    }
}