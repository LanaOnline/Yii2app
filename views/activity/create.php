<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 9:13 PM
 */
use yii\bootstrap\ActiveForm;
 ?>
<div class="row">
    <div class="col-md-6">
        <h2>Создание новой активности</h2>
        <?php $form=ActiveForm::begin([
            'action' => '',
            'method' => 'POST',
            'id' => 'activity',
            'options' => [
                'enctype' => ''
            ]
        ]); ?>
        <?=$form->field($activity, 'title'); ?>
        <?=$form->field($activity, 'description')->textarea(); ?>
        <?=$form->field($activity, 'email'); ?>
        <?=$form->field($activity, 'startDate'); ?>
        <?=$form->field($activity, 'is_blocked')->checkbox(); ?>
        <?=$form->field($activity, 'recurring')->checkbox(); ?>
        <?=$form->field($activity, 'image')->fileInput(); ?>


        <div class="form-group">
            <button type="submit" class="btn btn-default">Отправить</button>
        </div>
        <?php $form=ActiveForm::end(); ?>
    </div>
</div>
