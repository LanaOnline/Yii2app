<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/10/2019
 * Time: 8:44 PM
 * @var \app\models\Activity $model
 */
?>

<h2>Событие стартует сегодя</h2>
<strong><?=$model->title?></strong>
<p style="color: green;">Дата старта:<?=Yii::$app->formatter->asDatetime($model->startDate);?></p>
