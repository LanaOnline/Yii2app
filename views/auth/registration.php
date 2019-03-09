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

?>

<div class="row">
    <div class="col-md-6">
        <h2>Регистрация пользователя</h2>
        <?= CreateUserWidget::widget(['model' => $model]) ?>
    </div>
</div>
