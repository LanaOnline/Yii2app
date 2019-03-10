<?php

use app\widgets\CreateUserWidget\CreateUserWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Users */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Панель администирования'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Пользователи'), 'url' => ['/admin/users/data']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Создать нового пользователя');
?>
<div class="row users-create">
    <div class="col-md-12">
        <h1>Создать нового пользователя</h1>
    </div>

    <?= CreateUserWidget::widget(['model' => $model]) ?>

    <hr/>
    <div class="col-md-12">
        <?=\yii\bootstrap\Html::a('Отмена', ['/admin/users/data'], ['class' => 'btn btn-default']); ?>
    </div>

</div>
