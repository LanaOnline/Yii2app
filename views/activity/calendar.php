<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/24/2019
 * Time: 7:41 PM
 */
use yii\helpers\Html;
//add calendar view, pull data from db
$this->title = Yii::t('app', 'Календарь');
$this->params['breadcrumbs'][] = Yii::t('app', 'Календарь');
?>


<div class="row">
    <div class="col-md-6">
        <h1>Календарь</h1>
        <?= Html::a('Создать новую активность', ['/activity/create'], ['class' => 'btn btn-primary']); ?>
        <p>Списки активностей по дням</p>
    </div>
</div>