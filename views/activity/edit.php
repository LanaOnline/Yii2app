<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/24/2019
 * Time: 7:43 PM
 */
use \yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $activity app\models\Activity */
$this->title = 'Редактировать активность: ' . $activity->title;
?>

<div class="row edit-activity">
    <div class="col-md-12">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
        <?= $this->render('_form', ['activity' => $activity]) ?>
    <div class="col-md-12">
        <hr/>
        <?= Html::a('Отмена', ['/activity/view', 'id' => $activity->id], ['class' => 'btn btn-default']); ?>
    </div>
</div><!-- edit-activity -->
