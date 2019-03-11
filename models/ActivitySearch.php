<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/6/2019
 * Time: 7:10 PM
 */

namespace app\models;

use yii\data\ActiveDataProvider;

class ActivitySearch extends Activity
{
    /**
     * @return ActiveDataProvider
     */
    public function getDataProvider()
    {
        $query = Activity::find();

        $provider = new ActiveDataProvider(
            [
                'query' => $query,
                'pagination' => [
                    'pageSize'=>10
                ],
                'sort' => [
                    'defaultOrder'=>
                        [
                            'startDate'=>SORT_DESC
                        ]
                ]
            ]);
        /** returns array of models for the current page*/
        $provider->getModels();
        /** returns total number of elements */
        $provider->getTotalCount();
        /** returns number of elements on the page */
        $provider->count;
        /** returns array of models' id's on the page */
        $provider->getKeys();


//        $query->andFilterWhere(['user_id'=>2]); //filter data by key

        return $provider;
    }
}