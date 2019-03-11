<?php

/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/10/2019
 * Time: 4:53 PM
 */

use yii\bootstrap\Html;
use yii\grid\GridView;

/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'Просмотр всех активностей';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Панель администирования'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'startDate',
            'endDate',
            ['attribute' => 'is_blocked', 'label' => 'Блок.'],
            ['attribute' => 'recurring', 'label' => 'Повтор.'],
            ['attribute' => 'date_created', 'label' => 'Дата создания'],
            ['attribute' => 'date_updated', 'label' => 'Отредактирована'],
            'user_id',
            ['attribute' => 'user.email'],

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

