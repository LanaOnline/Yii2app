<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/24/2019
 * Time: 7:25 PM
 */
use yii\helpers\Html;

/** @var app\models\Activity $activity*/
?>

<div class="row">
    <div class="col-md-6">
        <h1>Просмотр активности</h1>

        <ul class="list-group">
            <li><label>Название</label>: <?= Html::encode($activity->title) ?></li>
            <li><label>Описание</label>: <?= Html::encode($activity->description) ?></li>
            <li><label>Дата начала</label>: <?= Html::encode($activity->startDate) ?></li>
            <li><label>Дата окончания</label>: <?= Html::encode($activity->endDate) ?></li>
            <li><label>Блокирующая</label>: <?= Html::encode($activity->is_blocked?'Да':'Нет') ?></li>
            <li><label>Повторяющаяся</label>: <?= Html::encode($activity->recurring?'Да':'Нет') ?></li>
        </ul>
        <?= Html::a('Редактировать', ['/activity/edit', 'id' => $activity->id], ['class' => 'btn btn-default']); ?>
        <?= Html::a('Вернуться в календарь', ['/activity/calendar'], ['class' => 'btn btn-default']); ?>
    </div>
</div>
