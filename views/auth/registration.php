<?php

/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/1/2019
 * Time: 9:33 AM
 */

/* @var $this \yii\web\View */
/* @var $model \app\models\Users */

use app\widgets\CreateUserWidget\CreateUserWidget;

$this->title = Yii::t('app', 'Регистрация');
$this->params['breadcrumbs'][] = Yii::t('app', 'Регистрация пользователя');
?>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h2 style="margin-bottom: 2em;">Регистрация</h2>
        <?= CreateUserWidget::widget(['model' => $model]) ?>
    </div>
</div>
