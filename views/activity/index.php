<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/6/2019
 * Time: 7:37 PM
 */

use app\behaviors\GetDateFunctionFormatBehavior;
use yii\debug\models\timeline\DataProvider;
$this->title = Yii::t('app', 'Все активности');
$this->params['breadcrumbs'][] = Yii::t('app', 'Все активности');
?>

<div class="row">
    <div class="col-md-12">
        <?= /** @var DataProvider $provider */
        \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'tableOptions' => [
                'class'=>'table table-striped table-bordered table-hover'
            ],
            'rowOptions'=>function($model,$key,$index,$grid){
                $class=$index%2?'odd':'even';
                return [
                    'class'=>$class,
                    'index'=>$index,
                    'key'=>$key
                ];
            },
            'layout' => "{pager}\n{items}\n{summary}\n{pager}",
            'columns' => [
                ['class'=>\yii\grid\SerialColumn::class],
                'id',
                [
                    'attribute' => 'title',
                    'value' => function($model){
                        return \yii\helpers\Html::a(\yii\helpers\Html::encode($model->title),['/activity/view','id'=>$model->id]);
                    },
                    'format' => 'html'
                ],
                'description',
                [
                    'attribute' => 'startDate',
                    'label' => 'Дата начала и окончания',
                    'value' => function($model){
                        return Yii::$app->formatter->asDate($model->startDate).' - '.Yii::$app->formatter->asDate($model->endDate);
                    }
                ],
                [
                    'attribute' => 'user_id',
                    'label' => 'email',
                    'value' => function($model){
                        return $model->user->email;
                    }
                ],
                //easy way to get emails:
//                [
//                    'attribute' => 'user.email'
//                ],
                [
                    'label' => 'Дата создания',
                    'attribute' => 'date_created',
                    'value' => function($model){
                        /** @var $model \app\models\Activity */
                        //пример динамического подключения и отключения поведения
//                        $model->attachBehavior('getDateB',[
//                            'class' => GetDateFunctionFormatBehavior::class,
//                            'attribute_name' => 'startDate']);
//                        $model->detachBehavior('getDateB');
                        return $model->getDate();
                    }
                ]
            ]
        ]);?>
    </div>
</div>