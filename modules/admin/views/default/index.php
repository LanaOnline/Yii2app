<?php

?>
<div class="row admin-default-index">
    <div class="col-md-6 col-md-offset-3 text-center">
        <h1 style="margin-bottom: 2em;">Панель администрирования</h1>

        <h3>
            <?=\yii\bootstrap\Html::a('Управление пользователями', '/admin/users/data')?>
        </h3>
        <hr/>
        <h3>
            <?=\yii\bootstrap\Html::a('Просмотр всех активностей', '/admin/activities/data')?>
        </h3>
    </div>
</div>
