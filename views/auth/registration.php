<?php

/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/1/2019
 * Time: 9:33 AM
 */

/* @var $this \yii\web\View */
/* @var $model \app\models\Users */
use yii\bootstrap\ActiveForm;

?>

<div class="row">
    <div class="col-md-6">
        <?php $form = ActiveForm::begin([
            'method' => 'POST'
            ]) ?>

        <?=$form->field($model, 'email') ?>
        <?=$form->field($model, 'password')->passwordInput(); ?>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Зарегистрироваться</button>
        </div>

        <?php $form = ActiveForm::end(); ?>
    </div>
</div>
