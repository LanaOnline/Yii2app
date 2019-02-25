<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/24/2019
 * Time: 7:41 PM
 */
use yii\helpers\Html;
//add calendar view, pull data from db
?>


<div class="row">
    <div class="col-md-6">
        <h1>Календарь</h1>
        <p>Списки активностей по дням</p>
        <?= Html::a('Создать новую активность', ['/activity/create'], ['class' => 'btn btn-primary']); ?>
    </div>
</div>