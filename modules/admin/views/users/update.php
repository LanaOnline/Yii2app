<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/10/2019
 * Time: 1:23 PM
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = Yii::t('app', 'Редактировать пользователя: {name}', [
    'name' => $model->email,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Панель администирования'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Пользователи'), 'url' => ['/admin/users/data']];
$this->params['breadcrumbs'][] = ['label' => $model->email, 'url' => ['/admin/users/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редактировать');
?>
<div class="row users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>

    <div class="col-md-12">
        <hr/>
        <?=\yii\bootstrap\Html::a('Отмена', ['/admin/users/data'], ['class' => 'btn btn-default']); ?>
    </div>
</div>