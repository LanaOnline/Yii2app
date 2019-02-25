<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/24/2019
 * Time: 7:43 PM
 */
use \yii\helpers\Html;
//add edit activity page view, pull data from db
?>

<div class="row">
    <div class="col-md-6">
        <h1>Редактирование активности</h1>
        <p>Вывести форму с заполненными полями</p>
        <?= Html::a('Отмена', ['/activity/view-activity'], ['class' => 'btn btn-primary']); ?>
    </div>
</div>
