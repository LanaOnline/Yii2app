<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/23/2019
 * Time: 1:06 PM
 */
use yii\helpers\Html;

?>

<div class="row">
    <p>Вы отправили на сервер следующую информацию:</p>

    <ul>
        <li><label>Название</label>: <?= Html::encode($activity->title) ?></li>
        <li><label>Описание</label>: <?= Html::encode($activity->description) ?></li>
        <li><label>Блокирующая</label>: <?= Html::encode($activity->is_blocked?'Да':'Нет') ?></li>
        <li><label>Повторяющаяся</label>: <?= Html::encode($activity->recurring?'Да':'Нет') ?></li>
        <li>Пользователь загрузил изображений: <?= count($activity->imageFiles) ?> .</li>
    </ul>
    <?= Html::a('Создать новую активность', ['/activity/create'], ['class' => 'btn btn-primary']); ?>
</div>
