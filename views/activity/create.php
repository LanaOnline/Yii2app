<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 9:13 PM
 */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/** @var app\models\Activity $activity */
?>
<div class="row">
    <div class="col-md-6 create-activity">
        <h2>Создание новой активности</h2>
        <?php $form = ActiveForm::begin([
            'action' => '',
            'method' => 'POST',
            'id' => 'activity',
            'options' => [
                'enctype' => 'multipart/form-data'
            ]
        ]); ?>
        <?=$form->field($activity, 'title'); ?>
        <?=$form->field($activity, 'description')->textarea(); ?>
        <?=$form->field($activity, 'startDate')->input('date', ['value' => date('Y-m-d')]); ?>
        <?=$form->field($activity, 'endDate')->input('date'); ?>
        <?=$form->field($activity, 'is_blocked')->checkbox(); ?>
        <?=$form->field($activity, 'recurring')->checkbox(); ?>
        <?=$form->field($activity, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']); ?>
        <?=$form->field($activity, 'user_id')->hiddenInput(); ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
        </div>
        <?php $form=ActiveForm::end(); ?>
        <hr/>
        <?=\yii\helpers\Html::a('Вернуться в календарь', '/activity/calendar'); ?>
    </div><!-- create-activity -->
</div>
