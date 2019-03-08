<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/20/2019
 * Time: 9:13 PM
 */

/** @var app\models\Activity $activity */
?>
<div class="row create-activity">
    <div class="col-md-12">
        <h2>Создать новую активность</h2>
    </div>
        <?= $this->render('_form', ['activity' => $activity]) ?>
    <div class="col-md-12">
        <hr/>
        <?=\yii\helpers\Html::a('Вернуться в календарь', '/activity/calendar', ['class' => 'btn btn-default']); ?>
    </div>
</div><!-- create-activity -->
