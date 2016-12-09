<?php
use yii\helpers\Html;
?>
<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name[0]) ?></li>
    <li><label>Name</label>: <?= Html::encode($model->name[1]) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>
