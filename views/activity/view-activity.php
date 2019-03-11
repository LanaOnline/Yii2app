<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/24/2019
 * Time: 7:25 PM
 */
use yii\helpers\Html;

/** @var app\models\Activity $activity*/
$this->title = 'Просмотр активности: ' . $activity->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Все активности'),
    'url' => ['/activity']
];
$this->params['breadcrumbs'][] = Yii::t('app', 'Просмотр активности');
?>

<div class="row">
    <div class="col-md-6">
        <h1>Просмотр активности</h1>
        <?= Html::a('Редактировать', ['/activity/edit', 'id' => $activity->id], ['class' => 'btn btn-primary']); ?>
        <?= Html::a('Календарь', ['/activity/calendar'], ['class' => 'btn btn-default']); ?>

        <ul class="list-group" style="margin-top: 1em;">
            <li class="list-group-item"><b>Название: </b><?= Html::encode($activity->title) ?></li>
            <li class="list-group-item"><b>Описание: </b><?= Html::encode($activity->description) ?></li>
            <li class="list-group-item"><b>Дата начала: </b><?= Html::encode($activity->startDate) ?></li>
            <li class="list-group-item"><b>Дата окончания: </b><?= Html::encode($activity->endDate) ?></li>
            <li class="list-group-item"><b>Блокирующая: </b><?= Html::encode($activity->is_blocked?'Да':'Нет') ?></li>
            <li class="list-group-item"><b>Повторяющаяся: </b><?= Html::encode($activity->recurring?'Да':'Нет') ?></li>
        </ul>
    </div>
</div>
