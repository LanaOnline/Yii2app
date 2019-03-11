<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/7/2019
 * Time: 8:24 PM
 */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
/** @var app\models\Activity $activity */
?>
<div class="col-md-6">
    <?php $form = ActiveForm::begin([
        'action' => '',
        'method' => 'POST',
        'id' => 'activity',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>
    <?=$form->field($activity, 'title'); ?>
    <?=$form->field($activity, 'description')->textarea(['rows' => 5]); ?>
    <!--?=$form->field($activity, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']);-->
</div>
<div class="col-md-6">
    <?=$form->field($activity, 'startDate')->input('date'); ?>
    <?=$form->field($activity, 'endDate')->input('date'); ?>
    <?=$form->field($activity, 'is_blocked')->checkbox(); ?>
    <?=$form->field($activity, 'recurring')->checkbox(); ?>
</div>
<div class="form-group col-md-12">
    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
</div>
<?php $form=ActiveForm::end(); ?>
<!--, ['value' => date('Y-m-d')]-->
