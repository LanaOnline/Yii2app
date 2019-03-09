<?php



use app\widgets\CreateUserWidget\CreateUserWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Users */

?>
<div class="row users-create">
    <div class="col-md-12">
        <h1>Создать нового пользователя</h1>
    </div>

    <?= CreateUserWidget::widget(['model' => $model]) ?>

    <hr/>
    <div class="col-md-12">
        <?=\yii\bootstrap\Html::a('Отмена', ['/default/users'], ['class' => 'btn btn-default']); ?>
    </div>

</div>
