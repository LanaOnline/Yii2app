<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/8/2019
 * Time: 5:08 PM
 */

use yii\grid\GridView;
use yii\helpers\Html;

/** @var \app\models\UsersCrud $dataProvider */
?>
<div class="row">
    <div class="col-md-12">
        <h1>Список зарегистрированных пользователей</h1>
        <p>
            <?= Html::a(Yii::t('app', 'Создать нового пользователя'), ['/admin/default/create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'email:email',
                'fio',
                'date_created',
                'date_updated',
                ['class' => 'yii\grid\ActionColumn']
            ]
        ]); ?>
    </div>
</div>
