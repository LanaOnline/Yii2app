<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/8/2019
 * Time: 10:22 PM
 */

use yii\bootstrap\ActiveForm;

/* @var $model \app\models\Users */
?>

<div class="col-md-6">
    <?php $form = ActiveForm::begin([
        'method' => 'POST'
    ]) ?>

    <?=$form->field($model, 'email') ?>
    <?=$form->field($model, 'password')->passwordInput(); ?>
    <?=$form->field($model, 'password_match')->passwordInput(); ?>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Зарегистрировать</button>
    </div>

    <?php $form = ActiveForm::end(); ?>
</div>