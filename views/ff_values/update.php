<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ff_values */

$this->title = 'Изменение значения реквизита';
$this->params['breadcrumbs'][] = ['label' => 'Дерево объектов', 'url' => ['ff_content/index']];
$this->params['breadcrumbs'][] = ['label' => 'Значения реквизитов', 'url' => ['index', 'id' => $model->instance_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ff-values-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
