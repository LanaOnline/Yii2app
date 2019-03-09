<?php

/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/3/2019
 * Time: 3:35 PM
 */

/* @var $this \yii\web\View */
/* @var $model \app\models\Users */

use yii\bootstrap\ActiveForm;
?>

<div class="row">
    <div class="col-md-6">
        <h2>Авторизация</h2>
        <?php $form = ActiveForm::begin([
            'method' => 'POST'
        ]) ?>

        <?=$form->field($model, 'email') ?>
        <?=$form->field($model, 'password')->passwordInput() ?>
        <?=$form->field($model, 'rememberMe')->checkbox(); ?>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Войти</button>
        </div>

        <?php $form = ActiveForm::end(); ?>
    </div>
</div>
