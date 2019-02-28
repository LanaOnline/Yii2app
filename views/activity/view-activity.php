<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/24/2019
 * Time: 7:25 PM
 */
use yii\helpers\Html;

?>

<div class="row">
    <div class="col-md-6">
        <h1>Просмотр активности</h1>

        <ul class="list-group">
            <li class="list-group-item">Название: </li>
            <li class="list-group-item">Описание: </li>
            <li class="list-group-item">Блокирующая: </li>
            <li class="list-group-item">Повторяющаяся: </li>
            <li class="list-group-item">Загруженные изображения: .</li>
        </ul>
        <?= Html::a('Редактировать', ['/activity/edit'], ['class' => 'btn btn-default']); ?>
        <?= Html::a('Вернуться в календарь', ['/activity/calendar'], ['class' => 'btn btn-default']); ?>
    </div>
</div>
