<?php

/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/28/2019
 * Time: 2:06 PM
 */

/* @var $this \yii\web\View */
/* @var $users array */
/* @var $userActivities array */
/* @var $firstActivity array */
/* @var $countRecurring array */
/* @var $allUserActivities array */
/* @var $activityReader array */

?>
<div class="row">
    <div  class="col-md-6">
        <pre>
            <?php print_r($users);?>
        </pre>
    </div>
    <div  class="col-md-6">
        <pre>
            <?php print_r($userActivities);?>
        </pre>
    </div>
    <div  class="col-md-6">
        <pre>
            <?php print_r($firstActivity);?>
        </pre>
    </div>
    <div  class="col-md-6">
        <pre>
            <?= 'Количество повторяющихся ативностей: '.$countRecurring;?>
        </pre>
    </div>
    <div  class="col-md-6">
        <pre>
            <?php print_r($allUserActivities);?>
        </pre>
    </div>
    <div  class="col-md-6">
        <pre>
            <?php forEach($activityReader as $item): ?>
            <?php print_r($item) ?>
                <br/>
            <?php endforeach; ?>
        </pre>
    </div>

</div>